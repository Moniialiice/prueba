<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();
//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'NO. OFICIO')
 ->setCellValue('B1', 'DÍA Y HORA RECEPCIÓN')
 ->setCellValue('C1', 'FECHA Y HORA RECEPCIÓN')
 ->setCellValue('D1', 'FECHA REAL')
 ->setCellValue('E1', 'FIRMA ORIGEN')
 ->setCellValue('F1', 'CARGO')
 ->setCellValue('G1', 'PETICIÓN')
 ->setCellValue('H1', 'ATENCIÓN');

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(22);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(20);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet

foreach ($datos as $dato){
    $arrayData = [$dato->no_oficioEntrada, $dato->fecha_ent, $dato->fecha_rec, $dato->fecha_real, $dato->firma_origen, $dato->cargo, $dato->peticion, $dato->nombre];
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
$fxls ='excel_recepcion.xlsx';
$writer->save($fxls);

//check if excel created
if(file_exists($fxls)) echo $fxls .' succesfully created';
else echo 'Unable to write: '. $fxls;