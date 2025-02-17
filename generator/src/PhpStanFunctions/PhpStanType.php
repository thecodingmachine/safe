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

        // Let's make the parameter nullable if it is by reference and is used only for writing.
        if ($writeOnly && $data !== 'resource' && $data !== 'mixed') {
            $data .= '|null';
        }

        $returnTypes = $this->explodeTypes($data);
        $anyNullable = false;
        foreach ($returnTypes as &$returnType) {
            $returnType = \trim($returnType);
            if (str_contains($returnType, '?')) {
                $anyNullable = true;
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
        if ($anyNullable) {
            $returnTypes[] = 'null';
        }
        $this->types = array_unique($returnTypes);
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
        // If we're turning an error marker into an exception, remove
        // the error marker from the return types
        if (in_array('false', $returnTypes) && $errorType === ErrorType::FALSY) {
            $returnTypes = array_diff($returnTypes, ['false']);
        }
        if (in_array('null', $returnTypes) && $errorType === ErrorType::NULLSY) {
            $returnTypes = array_diff($returnTypes, ['null']);
        }
        sort($returnTypes);
        $type = join('|', $returnTypes);
        // If the function only returns a boolean, since false is for error, true is for success.
        // Let's replace this with a "void".
        if ($type === 'bool' && $errorType === ErrorType::FALSY) {
            return 'void';
        }
        return $type;
    }

    public function getSignatureType(?ErrorType $errorType = null): string
    {
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
            } elseif (str_contains($type, 'true')) {
                $type = 'bool'; // php8.1 doesn't support "true" as a typehint
            } elseif (str_contains($type, 'non-falsy-string')) {
                $type = 'string'; // phpstan string type to generic string
            } elseif (str_contains($type, 'non-empty-string')) {
                $type = 'string';
            }
        }
        // filter out duplicates due to input types like "array<string>|array<int>"
        $types = array_unique($types);
        sort($types);

        // If we're turning false/null into exceptions, then
        // remove false/null from the return types
        if ($errorType === ErrorType::FALSY) {
            $types = array_diff($types, ['false']);
        }
        if ($errorType === ErrorType::NULLSY) {
            $types = array_diff($types, ['null']);
        }
        // remove "null" from the union so we can add "?" later
        $nullable = in_array('null', $types);
        $types = array_diff($types, ['null']);
        if (count($types) === 0) {
            return '';
        } elseif (count($types) === 1) {
            $finalType = array_values($types)[0];
            if ($finalType === 'bool' && !$nullable && $errorType === ErrorType::FALSY) {
                // If the function only returns a boolean, since false is for
                // error, true is for success. Let's replace this with a "void".
                return 'void';
            }
            return ($nullable !== false ? '?' : '').$finalType;
        } else {
            return '';
        }
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
