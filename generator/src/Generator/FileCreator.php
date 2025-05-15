<?php

declare(strict_types=1);

namespace Safe\Generator;

use Safe\Templating\Engine;
use Safe\XmlDocParser\ErrorType;
use Safe\XmlDocParser\Scanner;
use Safe\XmlDocParser\Method;

use function array_merge;
use function file_exists;

class FileCreator
{
    private Engine $engine;

    public function __construct(?Engine $engine = null)
    {
        $this->engine = $engine ?? new Engine();
    }

    /**
     * This function generate an improved php lib function in a php file
     *
     * @param Method[] $functions
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
            if (!\is_dir($path)) {
                \mkdir($path);
            }

            $this->dumpTemplate($path . $lcModule . '.php', 'Module.php.tpl', [
                '{{exceptionName}}' => self::toExceptionName($module),
                '{{functions}}' => \implode(PHP_EOL, $phpFunctions),
            ]);
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
        \fwrite($stream, "\n");
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
        $this->dumpTemplate($path, 'FunctionList.php.tpl', [
            '{{functionNames}}' => \implode(PHP_EOL, \array_map(static fn(string $name): string => \sprintf('\'%s\',', $name), $this->getFunctionsNameList($functions))),
        ]);
    }

    /**
     * Generates a configuration file for replacing all functions when using rector/rector.
     *
     * @param Method[] $functions
     */
    public function generateRectorFile(array $functions, string $path): void
    {
        $this->dumpTemplate($path, 'RectorConfig.php.tpl', [
            '{{functionNames}}' => \implode(PHP_EOL, \array_map(static fn(string $name): string => \sprintf('\'%1$s\' => \'Safe\\%1$s\',', $name), $this->getFunctionsNameList($functions))),
        ]);
    }

    public function createExceptionFile(string $moduleName): void
    {
        $exceptionName = self::toExceptionName($moduleName);

        $this->dumpTemplate(FileCreator::getSafeRootDir() . '/generated/Exceptions/'.$exceptionName.'.php', 'Exception.php.tpl', [
            '{{exceptionName}}' => $exceptionName,
        ]);
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

    /**
     * @param array<string, string> $context
     */
    private function dumpTemplate(string $target, string $template, array $context = []): void
    {
        $result = file_put_contents($target, $this->engine->generate($template, $context));

        if (false === $result) {
            throw new \RuntimeException(\sprintf('Could not write to "%s".', $target));
        }
    }
}
