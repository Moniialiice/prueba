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
        $this->load->model('Bitacora_model');
        $this->load->library('form_validation');
        //$this->load->library('curl');
        $this->load->library('upload');
        $this->folder = 'document/recepcion/';
    }
    //muestra el formulario de oficio entrada
    public function generaEntrada()
    {
        $datos['num'] = $this->Entrada_model->lastID();
        $this->load->view('templates/head');
        $this->load->view('genera_entrada',$datos);
        $this->load->view('templates/footer');
    }
    //recibe datos del formulario los manda al modelo de Entrada_model para ingresar
    public function createOEntrada()
    {
        //recibe los datos sino envia mensaje de error 
        if($this->input->post())
        {  
            //recibimos datos del formulario
            $control = $this->input->post('control');
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
                        $query = $this->Entrada_model->createOficio($control,$no_oficio, $firma, $cargo, $peticion, $arch_entrada, $id_usuario, $fecha1, $fecha2, $fecha3);
                        if($query == TRUE)
                        {
                            $this->session->set_flashdata('Creado','Oficio creado');
                            redirect('nuevaEntrada');
                            $id = $this->session->userdata('id_usuario'); //id del usuario loggeado
                            $fec_bit = date('Y-m-d'); //fecha del servidor
                            $hor_bit = date('H:i:s'); //hora del servidor
                            //inserción de registros en bitacora
                            $this->Bitacora_model->insertBitacora($id,'Se ha creado el oficio recepción '.$no_oficio.'.',$fec_bit,$hor_bit);
                        }else{
                            $this->session->set_flashdata('No creado','Oficio no creado');
                            redirect('nuevaEntrada');
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
            $control = $this->input->post('control');
            $search = $this->input->post('busqueda');
            $firma = $this->input->post('firma');
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
                if($this->session->userdata('id_tipoUsuario') != 5){
                    $datos ['datos'] = $this->Entrada_model->searchFecha($control,$search,$firma,$fecha1,$fecha2);
                    $this->load->view('all_entrada',$datos);
                    $id = $this->session->userdata('id_usuario'); //id del usuario logeado
                    $fec_bit = date('Y-m-d'); //fecha actual del servidor
                    $hor_bit = date('H:i:s'); //fecha actual del servidor
                    //inserción de registros en la bitacora
                    $this->Bitacora_model->insertBitacora($id,'Búsqueda Oficio Recepción '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
                }else{
                    $id = $this->session->userdata('id_usuario');
                    $datos ['datos'] = $this->Entrada_model->reportFI($search, $fecha1 ,$fecha2, $id);
                    $this->load->view('all_entrada',$datos);
                }               
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
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //hora actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga de archivo recepción '.$name.'.',$fec_bit,$hor_bit);
        //datos del archivo para descargar
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //muestra todas las entradas que ha realizado el usuario
    public function reportEntradaId()
    {
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //hora actual del servidor
        //inserción de registros en la bitacora
        if($this->session->userdata('id_tipoUsuario') == 3){
            $this->Bitacora_model->insertBitacora($id,'Reporte Oficio Recepción Secretariado.',$fec_bit,$hor_bit);
        }if($this->session->userdata('id_tipoUsuario') == 4){
            $this->Bitacora_model->insertBitacora($id,'Reporte Oficio Recepción Captura.',$fec_bit,$hor_bit);
        }
        
        $datos ['datos'] = $this->Entrada_model->reportEntradaId($id);
        $this->load->view('templates/head');
        $this->load->view('report_entrada',$datos);
        $this->load->view('templates/footer');
    }
    //ejemplo de paginacion
    public function pagEntrada()
    {
        $id = $this->session->userdata('id_usuario');
        $pages = 1; //Número de registros mostrados por páginas
        $config['base_url'] = base_url() . 'entrada/pagina'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->Entrada_model->filas($id); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 200; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = ' Última'; //último link
        $config['next_link'] = ' Siguiente '; //siguiente link
        $config['prev_link'] = ' Anterior '; //anterior link
        $config['full_tag_open'] = '<div id="paginacion">'; //el div que debemos maquetar si queremos
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $datos["datos"] = $this->Entrada_model->total_paginados($id, $config['per_page'], $this->uri->segment(1));
        //cargamos la vista y el array data
        $this->load->view('report_entrada', $datos);
    }
    //función para reporte excel de los oficios recepción
    public function reportExcelEn()
    {
        $control = $this->input->post('control');
        $search = $this->input->post('busqueda');
        $firma = $this->input->post('firma');
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
        //creamos objeto de spreadsheet 
        $spreadsheet = new Spreadsheet();
        //agrega columnas de encabezado
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO. CONTROL')
        ->setCellValue('B1', 'NO. OFICIO')
        ->setCellValue('C1', 'DÍA Y HORA RECEPCIÓN')
        ->setCellValue('D1', 'FECHA Y HORA RECEPCIÓN')
        ->setCellValue('E1', 'FECHA REAL')
        ->setCellValue('F1', 'PETICIÓN')
        ->setCellValue('G1', 'FIRMA ORIGEN')
        ->setCellValue('H1', 'CARGO')
        ->setCellValue('I1', 'ATENCIÓN');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:I1')->applyFromArray($cell_st);                
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(100);        
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        //valida que tipo de consulta realizará deacuerdo al tipo de usuario
        $datos ['datos'] = $this->Entrada_model->searchFecha($control,$search,$firma,$fecha1,$fecha2);
        foreach ($datos as $dato) {            
            $row = count($dato);
            for ($n=2; $n<=$row+1; $n++){
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$n, $dato[$n-2]->control)
                ->setCellValue('B'.$n, $dato[$n-2]->no_oficioEntrada)
                ->setCellValue('C'.$n, $dato[$n-2]->fecha_ent)
                ->setCellValue('D'.$n, $dato[$n-2]->fecha_rec)
                ->setCellValue('E'.$n, $dato[$n-2]->fecha_real)
                ->setCellValue('F'.$n, $dato[$n-2]->peticion)
                ->setCellValue('G'.$n, $dato[$n-2]->firma_origen)
                ->setCellValue('H'.$n, $dato[$n-2]->cargo)
                ->setCellValue('I'.$n, $dato[$n-2]->nombre." ".$dato[$n-2]->apellidop." ".$dato[$n-2]->apellidom);
            }
        }
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //hora actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga reporte en Excel de la búsqueda '.$search.' oficio recepción con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);        
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