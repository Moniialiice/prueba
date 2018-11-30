<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');
        
$writer = new Xlsx($spreadsheet);
 
$filename = 'PRUEBA';
 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
header('Cache-Control: max-age=0');
        
$writer->save('php://output'); // download file 