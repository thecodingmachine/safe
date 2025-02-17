<?php

declare(strict_types=1);

namespace Safe\Generator;

use Safe\XmlDocParser\ErrorType;
use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\Method;

use function array_merge;
use function file_exists;

class FileCreator
{

    /**
     * This function generate an improved php lib function in a php file
     *
     * @param Method[] $functions
     * @param Method[] $missingFunctions
     */
    public function generatePhpFile(
        // These aren't actually sensitive, they just fill the
        // stack traces with tons of useless information.
        #[\SensitiveParameter] array $functions,
        string $path
    ): void {
        $path = rtrim($path, '/').'/';
        $phpFunctionsByModule = [];
        foreach ($functions as $function) {
            $writePhpFunction = new WritePhpFunction($function);
            $phpFunctionsByModule[$function->getModuleName()][] = $writePhpFunction->getPhpFunctionalFunction();
        }

        foreach ($phpFunctionsByModule as $module => $phpFunctions) {
            $lcModule = \lcfirst($module);
            if (!is_dir($path)) {
                \mkdir($path);
            }
            $stream = \fopen($path.$lcModule.'.php', 'w');
            if ($stream === false) {
                throw new \RuntimeException('Unable to write to '.$path);
            }

            // Write file header
            \fwrite($stream, "<?php\n
namespace Safe;

use Safe\\Exceptions\\".self::toExceptionName($module). ';');

            // Write safe wrappers for non-safe functions
            foreach ($phpFunctions as $phpFunction) {
                \fwrite($stream, "\n".$phpFunction);
            }

            \fclose($stream);
        }
    }

    /**
     * @param string[] $versions
     */
    public function generateVersionSplitters(string $module, string $path, array $versions, bool $return = false): void
    {
        $lcModule = \lcfirst($module);
        $stream = \fopen($path.$lcModule.'.php', 'w');
        if ($stream === false) {
            throw new \RuntimeException('Unable to write to '.$path);
        }
        $return = $return ? "return " : "";
        \fwrite($stream, "<?php\n");
        foreach ($versions as $version) {
            if (file_exists("$path/$version/$lcModule.php")) {
                \fwrite($stream, "\nif (str_starts_with(PHP_VERSION, \"$version.\")) {");
                \fwrite($stream, "\n    {$return}require_once __DIR__ . '/$version/$lcModule.php';");
                \fwrite($stream, "\n}");
            }
        }
        \fclose($stream);
    }

    /**
     * @param Method[] $functions
     * @return string[]
     */
    private function getFunctionsNameList(array $functions): array
    {
        $functions = array_filter(
            $functions,
            fn($function) => $function->getErrorType() !== ErrorType::UNKNOWN
        );
        $functionNames = array_map(function (Method $function) {
            return $function->getFunctionName();
        }, $functions);
        $functionNames = array_merge($functionNames, Scanner::getSpecialCases());
        $functionNames = array_diff($functionNames, Scanner::getHiddenFunctions());
        natcasesort($functionNames);
        return $functionNames;
    }


    /**
     * This function generate a PHP file containing the list of functions we can handle.
     *
     * @param Method[] $functions
     */
    public function generateFunctionsList(array $functions, string $path): void
    {
        $functionNames = $this->getFunctionsNameList($functions);
        $stream = fopen($path, 'w');
        if ($stream === false) {
            throw new \RuntimeException('Unable to write to '.$path);
        }
        fwrite($stream, "<?php\n
return [\n");
        foreach ($functionNames as $functionName) {
            fwrite($stream, '    '.\var_export($functionName, true).",\n");
        }
        fwrite($stream, "];\n");
        fclose($stream);
    }

    /**
     * Generates a configuration file for replacing all functions when using rector/rector.
     *
     * @param Method[] $functions
     */
    public function generateRectorFile(array $functions, string $path): void
    {
        $functionNames = $this->getFunctionsNameList($functions);

        $stream = fopen($path, 'w');

        if ($stream === false) {
            throw new \RuntimeException('Unable to write to '.$path);
        }

        $header = <<<'TXT'
<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Renaming\Rector\FuncCall\RenameFunctionRector;

// This file configures rector/rector to replace all PHP functions with their equivalent "safe" functions.
return static function (RectorConfig $rectorConfig): void {
	$rectorConfig->ruleWithConfiguration(
		RenameFunctionRector::class,[
TXT;

        fwrite($stream, $header);

        foreach ($functionNames as $functionName) {
            fwrite($stream, "            '$functionName' => 'Safe\\$functionName',\n");
        }

        fwrite($stream, "        ]);\n};\n");
        fclose($stream);
    }

    public function createExceptionFile(string $moduleName): void
    {
        $exceptionName = self::toExceptionName($moduleName);
        if (!file_exists(FileCreator::getSafeRootDir() . '/lib/Exceptions/'.$exceptionName.'.php')) {
            \file_put_contents(
                FileCreator::getSafeRootDir() . '/generated/Exceptions/'.$exceptionName.'.php',
                <<<EOF
<?php
namespace Safe\Exceptions;

class {$exceptionName} extends \ErrorException implements SafeExceptionInterface
{
    public static function createFromPhpError(): self
    {
        \$error = error_get_last();
        return new self(\$error['message'] ?? 'An error occurred', 0, \$error['type'] ?? 1);
    }
}

EOF
            );
        }
    }

    public static function getSafeRootDir(): string
    {
        return __DIR__ . '/../../..';
    }

    /**
     * Generates the name of the exception class
     */
    public static function toExceptionName(string $moduleName): string
    {
        return str_replace('-', '', \ucfirst($moduleName)).'Exception';
    }
}
