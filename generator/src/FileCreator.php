<?php

namespace Safe;

use Complex\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FileCreator
{
    public function __construct()
    {
    }

    /**
     * This function generate an xls file
     *
     * @param string[] $protoFunctions
     * @param string $path
     */
    public function generateXlsFile(array $protoFunctions, string $path): void
    {
        $spreadsheet = new Spreadsheet();
        $numb = 1;
        $status = '';

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Function name');
        $sheet->setCellValue('B1', 'Status');

        foreach ($protoFunctions as $protoFunction) {
            if ($protoFunction) {
                if (strpos($protoFunction, '=') === false && strpos($protoFunction, 'json') === false) {
                    $status = 'classic';
                } elseif (strpos($protoFunction, 'json')) {
                    $status = 'json';
                } else {
                    $status = 'opt';
                }
                $sheet->setCellValue('A'.$numb, $protoFunction);
                $sheet->setCellValue('B'.$numb++, $status);
            }
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save($path);
    }

    /**
     * This function generate an improved php lib function in a php file
     *
     * @param Method[] $functions
     * @param string $path
     */
    public function generatePhpFile(array $functions, string $path): void
    {
        $path = rtrim($path, '/').'/';
        $phpFunctionsByModule = [];
        foreach ($functions as $function) {
            $writePhpFunction = new WritePhpFunction($function);
            $phpFunctionsByModule[$function->getModuleName()][] = $writePhpFunction->getPhpFunctionalFunction();
        }

        foreach ($phpFunctionsByModule as $module => $phpFunctions) {
            $module = \lcfirst($module);
            $stream = \fopen($path.$module.'.php', 'w');
            if ($stream === false) {
                throw new \RuntimeException('Unable to write to '.$path);
            }
            \fwrite($stream, "<?php\n
namespace Safe;

");
            foreach ($phpFunctions as $phpFunction) {
                \fwrite($stream, $phpFunction."\n");
            }
            \fclose($stream);
        }
    }


    /**
     * This function generate a PHP file containing the list of functions we can handle.
     *
     * @param Method[] $functions
     * @param string $path
     */
    public function generateFunctionsList(array $functions, string $path): void
    {
        $functionNames = array_map(function (Method $function) {
            return $function->getFunctionName();
        }, $functions);
        $stream = fopen($path, 'w');
        if ($stream === false) {
            throw new \RuntimeException('Unable to write to '.$path);
        }
        fwrite($stream, "<?php\n
return ".var_export($functionNames, true).";

");
        fclose($stream);
    }


    public function createExceptionFile(string $moduleName): void
    {
        if (!\class_exists("Safe\\Exceptions\\{$moduleName}Exception")) {
            \file_put_contents(
                __DIR__.'/../../generated/Exceptions/'.$moduleName.'Exception.php',
                <<<EOF
<?php
namespace Safe\Exceptions;

class {$moduleName}Exception extends AbstractSafeException
{
}

EOF
            );
        }
    }
}
