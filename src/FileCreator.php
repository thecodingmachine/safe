<?php

namespace Safe;

use Complex\Exception;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class FileCreator
{
    public function __construct() {}

    /*
     * This function generate an xls file
     *
     * @param string[] $protoFunctions
     * @param string $path
     */
    public function generateXlsFile(array $protoFunctions, string $path): void {
        $spreadsheet = new Spreadsheet();
        $numb = 1;
        $status = '';

        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Function name');
        $sheet->setCellValue('B1', 'Status');

        foreach ($protoFunctions as $protoFunction) {
            if ($protoFunction){
                if (strpos($protoFunction, '=') === FALSE && strpos($protoFunction, 'json') === FALSE) {
                    $status = 'classic';
                } else if (strpos($protoFunction, 'json')) {
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

    /*
     * This function generate an improved php lib function in a php file
     *
     * @param string[]
     * @param string
     */
    public function generatePhpFile(array $phpFunctions, string $path): void {
        $stream = fopen($path, 'w');
        fwrite($stream, "<?php\n
        class FileWritingException extends \Exception {}
        ");
        foreach ($phpFunctions as $phpFunction) {
            fwrite($stream, $phpFunction."\n");
        }
        fclose($stream);
    }
}
