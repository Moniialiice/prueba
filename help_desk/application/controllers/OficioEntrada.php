<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OficioEntrada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('download','file','url','html','form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Entrada_model');
        $this->load->library('form_validation');
        //$this->load->library('curl');
        $this->load->library('upload');
        $this->folder = 'document/recepcion/';
    }
    //muestra el formulario de oficio entrada
    public function generaEntrada()
    {
        $this->load->view('templates/head');
        $this->load->view('genera_entrada');
        $this->load->view('templates/footer');
    }
    //recibe datos del formulario los manda al modelo de Entrada_model para ingresar
    public function createOEntrada()
    {
        //recibe los datos sino envia mensaje de error 
        if($this->input->post())
        {  
            //recibimos datos del formulario
            $no_oficio = $this->input->post('no_oficio');
            $firma = $this->input->post('firma');
            $cargo = $this->input->post('cargo');
            $peticion = $this->input->post('peticion');
            $id_usuario = $this->input->post('id');
            $fecha = $this->input->post('fecha');
            $fecha_rec = $this->input->post('fecha_rec');
            $fecha_real = $this->input->post('fecha_real');
            //valida los datos del formulario
            $this->form_validation->set_rules('no_oficio', 'No. de Oficio', 'required|is_unique[oficio_entrada.no_oficioEntrada]'); 
            $this->form_validation->set_rules('firma', 'Firma Origen', 'required');
            $this->form_validation->set_rules('cargo', 'Cargo', 'required');
            $this->form_validation->set_rules('peticion', ' Peticion', 'required');
            $this->form_validation->set_rules('fecha', 'Día Recepción', 'required');           
            $this->form_validation->set_rules('fecha_rec', 'Fecha Recepción', 'required');
            $this->form_validation->set_rules('fecha_real', 'Fecha Real', 'required');        
            //** *//                  
            //si existe algun error en los datos que contiene config, carga vista-formulario para mostrar mensaje error al igual que las validaciones
            if ($this->form_validation->run()==TRUE)
            {
                //cambia formato fecha entrada 
                $date = $fecha;
                $espacio = explode(" ", $date);
                $fec = explode("/", $espacio[0]);
                $fecha1 = $fec[2]."-".$fec[1]."-".$fec[0]." ".$espacio[1].":00";
                //cambia formato de fecha recepción
                $date2 = $fecha_rec;
                $espacio2 = explode(" ", $date2);
                $fec2 = explode("/", $espacio2[0]);
                $fecha2 = $fec2[2]."-".$fec2[1]."-".$fec2[0]." ".$espacio2[1].":00";
                //cambia formato de fecha real
                $date3 = $fecha_real;
                $ext = explode('/',$date3);
                $fecha3 = $ext[2]."-".$ext[1]."-".$ext[0];
                    //datos requeridos para subir archivo y ruta a guardar 
                    $config['upload_path'] = $this->folder;
                    $config['allowed_types'] = 'jpg|png|pdf';
                    $config['max_size'] = 1000;
                    $config['file_name'] = $no_oficio;
                    //carga libreria archivos e inicializa el array config con los datos del archivo
                    $this->load->library('upload',$config);
                    $this->upload->initialize($config);
                    //toma el datos de archivo entrada
                    $this->upload->do_upload('entrada');                
                        //carga los datos del archivo
                        $upload_data = $this->upload->data();
                        //toma el nombre del archivo
                        $arch_entrada = $upload_data['file_name'];
                        //envia datos al modelo
                        $query = $this->Entrada_model->createOficio($no_oficio, $firma, $cargo, $peticion, $arch_entrada, $id_usuario, $fecha1, $fecha2, $fecha3);
                            
                        if($query == TRUE)
                            {
                                $this->session->set_flashdata('Creado','Oficio creado');
                                $this->generaEntrada();
                            }else{
                                $this->session->set_flashdata('No creado','Oficio no creado');
                                $this->generaEntrada();
                            }                    
            }else{
                //carga datos para mostrar en el formulario
                $datos = array();
                $datos['no_oficio'] = $no_oficio;
                $datos['firma'] = $firma;
                $datos['cargo'] = $cargo;
                $datos['peticion'] = $peticion;
                $datos['fecha'] = $fecha;
                $datos['fecha_rec'] = $fecha_rec;
                $datos['fecha_real'] = $fecha_real;
                //mandamos datos a la vista
                $this->load->view('templates/head');
                $this->load->view('genera_entrada',$datos);
                $this->load->view('templates/footer'); 
            }                      
        }else{
            $this->session->flashdata('Error','Datos no recibidos');
            redirect('nuevaEntrada');
        }    
    }
    //carga la vista para la busqueda de oficios entrada
    public function busquedaEntrada ()
    {
        $this->load->view('templates/head');
        $this->load->view('busqueda_entrada');
        $this->load->view('templates/footer');        
    }
    //arroja el resultado de la busqueda de los oficios
    public function consultaEntrada()
    {
        if($this->input->post())
        {
            //recibe datos de la búsqueda
            $search = $this->input->post('busqueda');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida campos vacios
            $this->form_validation->set_rules('date1','Fecha Real Inicio','required');
            $this->form_validation->set_rules('date2','Fecha Real Final','required');
            //cambia formato de fecha 
            if($this->form_validation->run()==true)
            {
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
                $datos ['datos'] = $this->Entrada_model->searchFecha($search,$fecha1,$fecha2);
                $this->load->view('all_entrada',$datos);
            }else{
                $datos = array();
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                //manda datos al formulario de búsqueda 
                $this->load->view('all_entrada',$datos);
            }    
        }else{
            //menssaje de error sí no recibe datos
            $this->session->set_flashdata('Error', 'Consultar administrador');
        }
    }
    //función para descagar archivos
    public function descarga($name)
    {
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //muestra todas las entradas que ha realizado el usuario
    public function reportEntradaId()
    {
        $id = $this->session->userdata('id_usuario');
        $datos ['datos'] = $this->Entrada_model->reportEntradaId($id);
        $this->load->view('templates/head');
        $this->load->view('report_entrada',$datos);
        $this->load->view('templates/footer');
    }
    //ejemplo de excel
    public function reportExcelEn()
    {
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
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
        $datos ['datos'] = $this->Entrada_model->searchFecha($search,$fecha1,$fecha2);        
        //creamos objeto de spreadsheet 
        $spreadsheet = new Spreadsheet();
        //agrega columnas de encabezado
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO. OFICIO')
        ->setCellValue('B1', 'DÍA Y HORA RECEPCIÓN')
        ->setCellValue('C1', 'FECHA Y HORA RECEPCIÓN')
        ->setCellValue('D1', 'FECHA REAL')
        ->setCellValue('E1', 'PETICIÓN')
        ->setCellValue('F1', 'FIRMA ORIGEN')
        ->setCellValue('G1', 'CARGO')
        ->setCellValue('H1', 'ATENCIÓN');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->applyFromArray($cell_st);
                
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(100);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(26);        
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(22);
        
        foreach ($datos as $dato) {
            $row = count($dato);
            
            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $dato[0]->no_oficioEntrada)
            ->setCellValue('B'.$row, $dato[0]->fecha_rec)
            ->setCellValue('C'.$row, $dato[0]->fecha_ent)
            ->setCellValue('D'.$row, $dato[0]->fecha_real)
            ->setCellValue('E'.$row, $dato[0]->peticion)
            ->setCellValue('F'.$row, $dato[0]->firma_origen)
            ->setCellValue('G'.$row, $dato[0]->cargo)
            ->setCellValue('H'.$row, $dato[0]->nombre." ".$dato[0]->apellidop." ".$dato[0]->apellidom);
        }
        
        //se crea objeto para guardar archivo xlsx
        $writer = new Xlsx($spreadsheet);
        //nombre del archivo a descargar
        $filename = 'excel_entrada';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //linea que descarga el archivo
        $writer->save('php://output');    
    }

}