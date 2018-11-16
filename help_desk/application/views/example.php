<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();

//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'No. Oficio')
 ->setCellValue('B1', 'Día y Hora Recepción')
 ->setCellValue('C1', 'Fecha y Hora Recepción')
 ->setCellValue('D1', 'Fecha Real')
 ->setCellValue('E1', 'Firma Origen')
 ->setCellValue('F1', 'Petición')
 ->setCellValue('G1', 'Atención');

$spreadsheet->setActiveSheetIndex(0)
->setCellValue('A1', 'No. Oficio')
->setCellValue('B1', 'Día y Hora Recepción')
->setCellValue('C1', 'Fecha y Hora Recepción')
->setCellValue('D1', 'Fecha Real')
->setCellValue('E1', 'Firma Origen')
->setCellValue('F1', 'Petición')
->setCellValue('G1', 'Atención');

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
$fxls ='excel-file_1.xlsx';
$writer->save($fxls);

//check if excel created
if(file_exists($fxls)) echo $fxls .' succesfully created';
else echo 'Unable to write: '. $fxls;