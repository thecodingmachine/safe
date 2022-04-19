<?php


namespace Safe\PhpStanFunctions;

use Safe\Method;
use Safe\Type;

/**
 * This class will parse the type from either parameters or return as given by phpstan and generate appropriate doc-block comments or typehints
 */
class PhpStanType
{
    const NO_SIGNATURE_TYPES = [
        'resource',
        'mixed',
        '\OCI-Lob',
        '\OCI-Collection',
    ];
    /**
     * @var bool
     */
    private $nullable;
    /**
     * @var bool
     */
    private $falsable;
    /**
     * @var string[]
     */
    private $types;

    public function __construct(string $data, bool $writeOnly = false)
    {
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
        if (($nullablePosition = \array_search('null', $returnTypes)) !== false) {
            $nullable = true;
            \array_splice($returnTypes, (int) $nullablePosition, 1);
        }
        //remove 'false' from the list to identify if the function return false on error
        if (($falsablePosition = \array_search('false', $returnTypes)) !== false) {
            $falsable = true;
            \array_splice($returnTypes, (int) $falsablePosition, 1);
        }
        /** @var int $count */
        $count = \count($returnTypes);
        if ($count === 0) {
            throw new \RuntimeException('Error when trying to extract parameter type');
        }
        foreach ($returnTypes as &$returnType) {
            $pos = \strpos($returnType, '?');
            if ($pos !== false) {
                $nullable = true;
                $returnType = \str_replace('?', '', $returnType);
            }
            //remove the parenthesis only if we are not dealing with a callable
            if (\strpos($returnType, 'callable') === false) {
                $returnType = \str_replace(['(', ')'], '', $returnType);
            }
            //here we deal with some weird phpstan typings
            if ($returnType === 'non-empty-string') {
                $returnType = 'string';
            } elseif ($returnType === 'positive-int') {
                $returnType = 'int';
            } elseif (is_numeric($returnType)) {
                $returnType = 'int';
            }
            if (\strpos($returnType, 'list<') !== false) {
                $returnType = \str_replace('list', 'array', $returnType);
            }
            $returnType = Type::toRootNamespace($returnType);
        }
        $this->types = array_unique($returnTypes);
        $this->nullable = $nullable;
        $this->falsable = $falsable;
    }

    public function getDocBlockType(?int $errorType = null): string
    {
        $returnTypes = $this->types;
        //add back either null or false to the return types unless the target function return null or false on error (only relevant on return type)
        if ($this->falsable && $errorType !== Method::FALSY_TYPE) {
            $returnTypes[] = 'false';
        } elseif ($this->nullable && $errorType !== Method::NULLSY_TYPE) {
            $returnTypes[] = 'null';
        }

        $returnTypes = \array_map(fn (string $type) => \str_replace('array', '\array', $type), $returnTypes);

        $type = join('|', $returnTypes);
        if ($type === 'bool' && !$this->nullable && $errorType === Method::FALSY_TYPE) {
            // If the function only returns a boolean, since false is for error, true is for success.
            // Let's replace this with a "void".
            return 'void';
        }
        return $type;
    }

    public function getSignatureType(?int $errorType = null): string
    {
        //We edit the return type depending of the "onErrorType" of the function. For example, a function that is both nullable and "nullsy" will created a non nullable safe function. Only relevant on return type.
        $nullable = $errorType === Method::NULLSY_TYPE ? false : $this->nullable;
        $falsable = $errorType === Method::FALSY_TYPE ? false : $this->falsable;
        $types = $this->types;
        //no typehint exists for thoses cases
        if (\array_intersect(self::NO_SIGNATURE_TYPES, $types)) {
            return '';
        }

        foreach ($types as &$type) {
            if (\strpos($type, 'callable(') > -1) {
                $type = 'callable'; //strip callable type of its possible parenthesis and return (ex: callable(): void)
            } elseif (\strpos($type, 'array<') !== false || \strpos($type, 'array{') !== false) {
                $type = 'array'; //typed array has to be untyped
            } elseif (\strpos($type, '[]') !== false) {
                $type = 'iterable'; //generics cannot be typehinted and have to be turned into iterable
            } elseif (\strpos($type, 'resource') !== false) {
                $type = ''; // resource cant be typehinted
            } elseif (\strpos($type, 'null') !== false) {
                $type = ''; // null is a real typehint
            }
        }

        //if there are several distinct types, no typehint (we use distinct in case doc block contains several times the same type, for example array<int>|array<string>)
        if (count(array_unique($types)) > 1) {
            return '';
        } elseif (\in_array('void', $types) || (count($types) === 0 && !$nullable && !$falsable)) {
            return 'void';
        }


        $finalType = $types[0];
        if ($finalType === 'bool' && !$nullable && $errorType === Method::FALSY_TYPE) {
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
