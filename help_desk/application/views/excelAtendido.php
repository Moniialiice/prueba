<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();
//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'NO. OFICIO')
 ->setCellValue('B1', 'FECHA ATENDIDO')
 ->setCellValue('C1', 'DIRIGIDO A')
 ->setCellValue('D1', 'CARGO')
 ->setCellValue('E1', 'DESCRIPCIÓN')
 ->setCellValue('F1', 'ATENCIÓN');

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(100);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

var_dump($datos);
foreach ($datos as $dato){
    $arrayData = [$dato->nomenclatura, $dato->fecha_atendido, $dato->nombre_aten, $dato->cargo_aten, $dato->descripcion, $dato->nombre];
    $spreadsheet->getActiveSheet()
        ->fromArray(
            $arrayData,  // The data to set
            NULL,        // Array values with this value will not be set
            'A2'         // Top left coordinate of the worksheet range where
                        //    we want to set these values (default is A1)
        );
}
//make object of the Xlsx class to save the excel file
$writer = new Xlsx($spreadsheet);
$fxls ='excel-atendido.xlsx';
$writer->save($fxls);

//check if excel created
if(file_exists($fxls)) echo $fxls .' succesfully created';
else echo 'Unable to write: '. $fxls;