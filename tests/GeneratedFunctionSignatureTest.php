<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class GeneratedFunctionSignatureTest extends TestCase
{
    /**
     * @return iterable<string, array{string}>
     */
    public static function generatedFunctions(): iterable
    {
        $file = sprintf(
            '%s/../generated/%d.%d/functionsList.php',
            __DIR__,
            PHP_MAJOR_VERSION,
            PHP_MINOR_VERSION
        );

        $functions = require $file;
        if (!is_array($functions)) {
            throw new RuntimeException(sprintf('Generated function list %s must return an array.', $file));
        }

        foreach ($functions as $functionName) {
            yield $functionName => [$functionName];
        }
    }

    /**
     * @dataProvider generatedFunctions
     */
    public function testParametersMatchNativeFunction(string $functionName): void
    {
        if (!function_exists($functionName)) {
            self::markTestSkipped(sprintf('The %s extension is not loaded.', $functionName));
        }

        $nativeFunction = new ReflectionFunction($functionName);
        $safeFunction = new ReflectionFunction('Safe\\' . $functionName);

        self::assertSame(
            self::parameterSignatures($nativeFunction),
            self::parameterSignatures($safeFunction)
        );
    }

    /**
     * @return list<array{
     *     name: string,
     *     type: string,
     *     allowsNull: bool,
     *     byReference: bool,
     *     variadic: bool,
     *     optional: bool,
     *     default: mixed
     * }>
     */
    private static function parameterSignatures(ReflectionFunction $function): array
    {
        return array_map(
            static function (ReflectionParameter $parameter): array {
                return [
                    'name' => $parameter->getName(),
                    #'type' => (string) $parameter->getType(),
                    'allowsNull' => $parameter->allowsNull(),
                    'byReference' => $parameter->isPassedByReference(),
                    'variadic' => $parameter->isVariadic(),
                    'optional' => $parameter->isOptional(),
                    'default' => $parameter->isDefaultValueAvailable() ? $parameter->getDefaultValue() : null,
                ];
            },
            $function->getParameters()
        );
    }
}
