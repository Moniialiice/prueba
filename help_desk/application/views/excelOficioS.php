<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//object of the Spreadsheet class to create the excel data
$spreadsheet = new Spreadsheet();
//add some data in excel cells
$spreadsheet->setActiveSheetIndex(0)
 ->setCellValue('A1', 'NO. OFICIO')
 ->setCellValue('B1', 'FECHA')
 ->setCellValue('C1', 'SE REMITE')
 ->setCellValue('D1', 'SOLICITUD')
 ->setCellValue('E1', 'PLAZO')
 ->setCellValue('F1', 'ATENCIÓN');

//set style for A1,B1,C1 cells
$cell_st =[
 'font' =>['bold' => true],
 'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
 'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
];
$spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);

//set columns width
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(50);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(100);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);

$spreadsheet->getActiveSheet()->setTitle('Simple'); //set a title for Worksheet
foreach ($datos as $dato){ 
    if($dato->colaboracion == 1){}
        if($dato->recursos_humanos == 1){}
    if($dato->boletas_audiencia == 1){}
    if($dato->telefonia ==1){}            
    $arrayData = [$dato->nomenclatura, $dato->fecha, $dato->asunto, $dato->termino, $dato->nombre];
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
$fxls ='excel_OSeguimiento.xlsx';
$writer->save($fxls);

//check if excel created