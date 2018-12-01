<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Atendido extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper(array('download','file','url','html','form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Atendido_model');
        $this->load->library(array('form_validation','upload'));
        //$this->load->library('curl');
        $this->folder = 'documenta/';
    }
    //función carga templates, el formulario para generar oficio con el $id del oficio entrada
    public function index($id)
    {
        //$id = $this->encrypt->decode($enID);
        $datos ['datos'] = $this->Atendido_model->datosSeguimiento($id); //datos de tabla oficio entrada
        $sAtendido = $this->Atendido_model->seguimientoAtendido($id); //obtiene id de oficio seguimiento
        //si se ejecuta eSeguimiento
        if($sAtendido){
            //$idatencion = $sAtendido[0]->id_oficioseg; //id de oficioSeguimiento
            $idatendido = $sAtendido[0]->id_oficioAtendido;
            $this->mostrarAtendido($idatendido); //carga formulario de actualización
        }else{            
            //carga el vista para nuevo oficio seguimiento
            $this->load->view('templates/head');
            $this->load->view('genera_atendido',$datos);
            $this->load->view('templates/footer');
        }        
    }
    //valida los datos para insertar en la base 
    public function createAtendidoVal()
    {
        //id de seguimiento
        $segui = $this->input->post('segui');
        if($this->input->post())
        { 
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $fecha = $this->input->post('date1');
            $asunto = $this->input->post('asunto');
            $nombre = $this->input->post('nombre');
            $cargo = $this->input->post('cargo');
            $descripcion = $this->input->post('descripcion');
            $copia = $this->input->post('copia');
            //valida los datos del formulario
            $this->form_validation->set_rules('date1','Fecha','required');
            $this->form_validation->set_rules('asunto','Asunto','required');
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('cargo','Cargo','required');
            $this->form_validation->set_rules('descripcion','Descripción','required');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                //formato de fecha
                $date = array();
                $date = $fecha;
                $ext = explode('/',$date);
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0];
                //datos requeridos para subir archivo y ruta a guardar 
                $config['upload_path'] = $this->folder;
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size'] = 1000;
                //carga libreria archivos e inicializa el array config con los datos del archivo
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                //toma el datos de archivo entrada
                $this->upload->do_upload('archivo');                
                    //carga los datos del archivo
                    $upload_data = $this->upload->data();
                    //toma el nombre del archivo
                    $archivo = $upload_data['file_name']; 
                    $insertOficio = $this->Atendido_model->insert_Atendido($fecha1, $asunto, $nombre, $cargo, $descripcion, $archivo, $copia, $segui, $atencion);
                
                if ($insertOficio == true){                    
                    //id oficio seguimiento 
                    $idatendido = $this->Atendido_model->getIDA($segui);
                    $ida = $idatendido[0]->id_oficioAtendido;
                    //una vez insertado muestra datos en actualizar oficio
                    $this->session->set_flashdata('Creado','Oficio creado');
                    $this->mostrarAtendido($ida);
                }else{
                    $this->session->set_flashdata('Error','Consulta administrador');                    
                    $this->index($segui);
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['date1'] = $fecha;
                $datos['asunto'] = $asunto;
                $datos['nombre'] = $nombre;
                $datos['cargo'] = $asunto;
                $datos['descripcion'] = $descripcion;
                $copia['copia'] = $copia;
                $datos['datos'] = $this->Atendido_model->datosSeguimiento($segui);
                //envia datos del array a la vista
                $this->load->view('templates/head');
                $this->load->view('genera_atendido',$datos); 
                $this->load->view('templates/footer');
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->index($ide);
        }
    }
    //carga formulario de busqueda
    public function busquedaAtendido()
    {
        $this->load->view('templates/head');
        $this->load->view('busqueda_atendido');
        $this->load->view('templates/footer');
    }
    //muestra consulta de oficio por la búsqueda
    public function consultaAtendido()
    {
        if($this->input->post())
        {
            //recibe datos del formulario
            $search = $this->input->post('busqueda');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida campos vacios
            $this->form_validation->set_rules('date1','Fecha Atendido Inicio','required');
            $this->form_validation->set_rules('date2','Fecha Atendido Final','required');
            //si la validación es correcta 
            if($this->form_validation->run()==true)
            {
                //cambiamos formato de fecha
                $ext = explode("/",$date1);
                $year = $ext[2];
                $mont = $ext[1];
                $day = $ext[0];
                $fecha1 = $year."-".$mont."-".$day;
                $ext2 = explode("/",$date2);
                $year2 = $ext2[2];
                $mont2 = $ext2[1];
                $day2 = $ext2[0];
                $fecha2 = $year2."-".$mont2."-".$day2;
                //datos de la consulta oficio  
                $datos['datos'] = $this->Atendido_model->searchfechaAtendido($search,$fecha1,$fecha2);
                $this->load->view('all_atendido', $datos);               
            }else{
                $datos = array();
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                //manda datos de la búsqueda al formulario
                $this->load->view('all_atendido', $datos);
            }            
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
        }        
    }    
    //consulta de oficio seguimiento atendido
    public function mostrarAtendido($id)
    {
        //consulta datos del oficio atendido
        $datos['datos'] = $this->Atendido_model->consultaAtendido($id);
        //carga vistas, formulario de consulta
        $this->load->view('templates/head');
        $this->load->view('consulta_atendido',$datos);
        $this->load->view('templates/footer');
    }
    //función para descargar archivo seguimiento o final
    public function descarga($name)
    {
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //función para generar pdf de oficio atendid
    public function imprimirOficioAtendido($id)
    {
        $datos['dato'] = $this->Atendido_model->reportOficioAtendido($id);
        $html = $this->load->view('atendido_pdf', $datos, true);
        //this the the PDF filename that user will get to download  
        $pdfFilePath = "oficio_atendido." . "pdf";
        //load TCPDF library
        $this->load->library('Pdf');
        //Tamaño de pdf
        //var_dump($data);
        $pdf = new Pdf('L', 'cm', 'Letter', true, 'UTF-8', false);
        $pdf->segundaHoja = false;
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetHeaderMargin(20);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(15);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('FGJEM');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage('P', 'LETTER');
        // salida de HTML contenido a pdf
        $pdf->writeHTML($html, true, false, true, false, '');
        //manda a imprimir al cargar el archivo
        //$pdf->IncludeJS("print();"); D
        $pdf->Output($pdfFilePath, 'I');
    }
    //reporte en excel 
    public function reportExcelA()
    {
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2'); 
        //creamos objeto de spreadsheet para excel 
        $spreadsheet = new Spreadsheet();
        //agrega columnas de encabezado
        $spreadsheet->setActiveSheetIndex(0)        
        ->setCellValue('A1', 'NO. OFICIO')
        ->setCellValue('B1', 'FECHA ATENDIDO')
        ->setCellValue('C1', 'DIRIGIDO A')
        ->setCellValue('D1', 'CARGO')
        ->setCellValue('E1', 'DESCRIPCIÓN')
        ->setCellValue('F1', 'ATENCIÓN');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);
            
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(100);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
        
        //cambiamos formato de fecha
        $ext = explode("/",$date1);
        $year = $ext[2];
        $mont = $ext[1];
        $day = $ext[0];
        $fecha1 = $year."-".$mont."-".$day;
        $ext2 = explode("/",$date2);
        $year2 = $ext2[2];
        $mont2 = $ext2[1];
        $day2 = $ext2[0];
        $fecha2 = $year2."-".$mont2."-".$day2;

        $datos['datos'] = $this->Atendido_model->searchFechaAtendido($search,$fecha1,$fecha2);
        for ($n = $start; $n < $start + $count; $n++) {
            $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
         }

        foreach ($datos as $dato)
        {   
            //var_dump($datos);
            $row = count($count);
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $dato->nomenclatura)
            ->setCellValue('B'.$row, $dato->fecha_atendido)
            ->setCellValue('C'.$row, $dato->nombre_aten)
            ->setCellValue('D'.$row, $dato->cargo_aten)
            ->setCellValue('E'.$row, $dato->descripcion)
            ->setCellValue('F'.$row, $dato->nombre); 
            $row ++;
        }

        //se crea objeto para guardar archivo xls
        $writer = new Xlsx($spreadsheet);
        //nombre del archivo a descargar 
        $filename = 'excel_atendido';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //linea que descarga el archivo
        $writer->save('php://output');
    }
}