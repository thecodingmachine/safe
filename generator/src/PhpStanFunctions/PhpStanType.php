<?php

declare(strict_types=1);

namespace Safe\PhpStanFunctions;

use Safe\XmlDocParser\ErrorType;
use Safe\XmlDocParser\Type;

/**
 * This class will parse the type from either parameters or return as given by phpstan and generate appropriate doc-block comments or typehints
 */
class PhpStanType
{
    public const NO_SIGNATURE_TYPES = [
        'resource',
        'mixed',
        '\OCI-Lob',
        '\OCI-Collection',
    ];

    private bool $nullable;

    private bool $falsable;

    /**
     * @var string[]
     */
    private array $types;

    public function __construct(string|\SimpleXMLElement $data, bool $writeOnly = false)
    {
        if ($data instanceof \SimpleXMLElement) {
            if (isset($data['class']) && ((string)$data['class']) === 'union') {
                $data = implode('|', (array)$data->type);
            } else {
                $data = (string)$data;
            }
        }

        if (\preg_match('/__benevolent\<(.*)\>/', $data, $regs)) {
            $data = $regs[1];
        }

        //weird case: null|false => null
        if ($data === 'null|false') {
            $this->nullable = false;
            $this->falsable = true;
            $this->types = ['null'];
            return;
        }
        //first we try to parse the type string to have a list as clean as possible.
        $nullable = false;
        $falsable = false;
        // Let's make the parameter nullable if it is by reference and is used only for writing.
        if ($writeOnly && $data !== 'resource' && $data !== 'mixed') {
            $data .= '|null';
        }

        $returnTypes = $this->explodeTypes($data);
        //remove 'null' from the list to identify if the signature type should be nullable
        if (($nullablePosition = \array_search('null', $returnTypes, true)) !== false) {
            $nullable = true;
            \array_splice($returnTypes, (int) $nullablePosition, 1);
        }
        //remove 'false' from the list to identify if the function return false on error
        if (($falsablePosition = \array_search('false', $returnTypes, true)) !== false) {
            $falsable = true;
            \array_splice($returnTypes, (int) $falsablePosition, 1);
        }
        $count = \count($returnTypes);
        if ($count === 0) {
            $returnType = '';
        }
        foreach ($returnTypes as &$returnType) {
            $returnType = \trim($returnType);
            if (str_contains($returnType, '?')) {
                $nullable = true;
                $returnType = \str_replace('?', '', $returnType);
            }
            // remove the parenthesis only if we are not dealing with a callable
            if (!str_contains($returnType, 'callable')) {
                $returnType = \str_replace(['(', ')'], '', $returnType);
            }

            // here we deal with some weird phpstan typings
            if (str_contains($returnType, '__stringAndStringable')) {
                $returnType = 'string';
            }

            if ($returnType === 'positive-int' ||
                str_contains($returnType, 'int<') ||
                str_contains($returnType, 'int-mask<') ||
                is_numeric($returnType) ||
                # constants like FTP_ASCII, FTP_BINARY
                (defined($returnType) && is_numeric(constant($returnType)))
            ) {
                $returnType = 'int';
            }

            if (str_contains($returnType, 'list<')) {
                $returnType = \str_replace('list', 'array', $returnType);
            }

            $returnType = Type::toRootNamespace($returnType);
        }
        sort($returnTypes);
        $this->types = array_unique($returnTypes);
        $this->nullable = $nullable;
        $this->falsable = $falsable;
    }

    /**
     * Given two PhpStanTypes (eg, one from phpstan's internal type
     * hint database, and one from PHP's XML documentation), come
     * up with the most useful type data
     */
    public static function selectMostUsefulType(
        ?PhpStanType $phpStanType,
        PhpStanType $phpDocType,
        ?ErrorType $errorType = null
    ): PhpStanType {
        // If phpstan's database doesn't mention this function at all,
        // use the PHPDoc type
        if (is_null($phpStanType)) {
            return $phpDocType;
        }
        // If phpstan claims something is a `resource`, use php docs.
        // (Ideally phpstan would have correct types, or less-ideally
        // we would ignore it whenever it mentions a resource at all,
        // but that results in too many false positives, so we only
        // ignore these very specific cases...)
        if ($phpStanType->getDocBlockType($errorType) === "resource" ||
            $phpStanType->getDocBlockType($errorType) === "resource|string" ||
            $phpStanType->getDocBlockType($errorType) === "array|resource|string"
        ) {
            return $phpDocType;
        }
        // If phpstan has information, and we don't specifically
        // distrust it, then use it
        return $phpStanType;
    }

    public function getDocBlockType(?ErrorType $errorType = null): string
    {
        $returnTypes = $this->types;
        //add back either null or false to the return types unless the target function return null or false on error (only relevant on return type)
        if ($this->falsable && $errorType !== ErrorType::FALSY) {
            $returnTypes[] = 'false';
        } elseif ($this->nullable && $errorType !== ErrorType::NULLSY) {
            $returnTypes[] = 'null';
        }
        $type = join('|', $returnTypes);
        if ($type === 'bool' && !$this->nullable && $errorType === ErrorType::FALSY) {
            // If the function only returns a boolean, since false is for error, true is for success.
            // Let's replace this with a "void".
            return 'void';
        }
        return $type;
    }

    public function getSignatureType(?ErrorType $errorType = null): string
    {
        //We edit the return type depending of the "onErrorType" of the function. For example, a function that is both nullable and "nullsy" will created a non nullable safe function. Only relevant on return type.
        $nullable = $errorType === ErrorType::NULLSY ? false : $this->nullable;
        $falsable = $errorType === ErrorType::FALSY ? false : $this->falsable;
        $types = $this->types;
        //no typehint exists for those cases
        if (\array_intersect(self::NO_SIGNATURE_TYPES, $types) !== []) {
            return '';
        }

        foreach ($types as &$type) {
            if (str_contains($type, 'callable(')) {
                $type = 'callable'; //strip callable type of its possible parenthesis and return (ex: callable(): void)
            } elseif (str_contains($type, 'array<') || str_contains($type, 'array{')) {
                $type = 'array'; //typed array has to be untyped
            } elseif (str_contains($type, '[]')) {
                $type = 'array'; //generics cannot be typehinted
            } elseif (str_contains($type, 'resource')) {
                $type = ''; // resource cant be typehinted
            } elseif (str_contains($type, 'null')) {
                $type = ''; // null is a real typehint
            } elseif (str_contains($type, 'true')) {
                $type = 'bool'; // php8.1 doesn't support "true" as a typehint
            } elseif (str_contains($type, 'non-falsy-string')) {
                $type = 'string'; // phpstan string type to generic string
            } elseif (str_contains($type, 'non-empty-string')) {
                $type = 'string';
            }
        }

        //if there are several distinct types, no typehint (we use distinct in case doc block contains several times the same type, for example array<int>|array<string>)
        if (count(array_unique($types)) > 1) {
            return '';
        }

        if (\in_array('void', $types) || ($types === [] && !$nullable && !$falsable)) {
            return 'void';
        }


        $finalType = $types[0] ?? '';
        if ($finalType === 'bool' && !$nullable && $errorType === ErrorType::FALSY) {
            // If the function only returns a boolean, since false is for error, true is for success.
            // Let's replace this with a "void".
            return 'void';
        }
        return ($nullable !== false ? '?' : '').$finalType;
    }

    public function isNullable(): bool
    {
        return $this->nullable;
    }

    public function isFalsable(): bool
    {
        return $this->falsable;
    }

    /**
     * @return array<string>
     */
    private function explodeTypes(string $data): array
    {
        $types = [];
        $depth = 0;
        $index = 0;

        foreach (\str_split($data) as $character) {
            if ($character === '<' || $character === '{') {
                $depth++;
            }

            if ($character === '>' || $character === '}') {
                $depth--;
            }

            if ($depth === 0 && $character === '|') {
                $index++;
                continue;
            }

            $types[$index] = ($types[$index] ?? '') . $character;
        }

        return $types;
    }
}
