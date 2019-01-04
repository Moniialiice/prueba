<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Captura extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper(array('download','file','url','html','form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Captura_model');
        $this->load->library(array('form_validation'));
        $this->load->library('calendar');
        $this->load->library('upload');
        //$this->load->library('curl');
        $this->folder = 'captura/';
    }
    //función para cargar vista de captura
    public function index(){
        $this->load->view('templates/head');
        $this->load->view('genera_captura');
        $this->load->view('templates/footer');
    }
    //función para dar de alta nuevo registro
    public function altaCaptura(){
        //id del usuario que realiza la captura
        $atencion = $this->input->post('atencion');
        //datos de oficio recepción
        $oficio_rec = $this->input->post('no_oficio');
        $fecha_r = $this->input->post('fecha_r');
        $fecha_rec = $this->input->post('fecha_rec');
        $fecha_recr = $this->input->post('fecha_real');
        $firma_origen_rec = $this->input->post('firma_r');
        $cargo_rec = $this->input->post('cargo_r');
        $peticion_rec = $this->input->post('peticion_r');
        //datos requeridos para subir archivo y ruta a guardar 
        $config['upload_path'] = $this->folder;
        $config['allowed_types'] = 'jpg|png|pdf';
        $config['max_size'] = 1000;
        //carga libreria archivos e inicializa el array config con los datos del archivo
        $this->load->library('upload',$config);
        $this->upload->initialize($config);
        //toma el datos de archivo entrada
        $this->upload->do_upload('entrada');                
        //carga los datos del archivo
        $upload_data = $this->upload->data();
        //toma el nombre del archivo
        $entrada = $upload_data['file_name'];
        //recibe datos de oficio seguimiento para insertar en la tabla de captura
        $nomenclatura = $this->input->post('nomenclatura');
        $fecha_seg = $this->input->post('fecha');
        $asunto_seg = $this->input->post('asunto');
        $observaciones = $this->input->post('observaciones');
        $termino = $this->input->post('termino');
        //etiquedas 
        $colaboracion = $this->input->post('colaboracion');
        $amparo = $this->input->post('amparos');
        $solicitudes = $this->input->post('solicitudes');
        $gestion = $this->input->post('gestion');
        $cursos = $this->input->post('cursos');
        $juzgados = $this->input->post('juzgados');
        $rh = $this->input->post('rh');
        $estadistica = $this->input->post('estadistica');
        $telefonia = $this->input->post('telefonia');
        $ri = $this->input->post('ri');
        $boletas = $this->input->post('boletas');
        $conocimiento = $this->input->post('conocimiento');
        //dirigido a
        $conase = $this->input->post('conase');
        $toluca = $this->input->post('toluca');
        $mexico = $this->input->post('mexico');
        $zoriente = $this->input->post('zoriente');
        $fgeneral = $this->input->post('fgeneral');
        $vicefiscalia = $this->input->post('vicefiscalia');
        $oficialia = $this->input->post('oficialia');
        $informacion = $this->input->post('informacion');
        $central = $this->input->post('central');
        $servicio = $this->input->post('servicio');
        $otrad = $this->input->post('otrad');
        //ruta oficio
        $diligencia = $this->input->post('diligencias');
        $personalmente = $this->input->post('personalmente');
        $gestionar = $this->input->post('gestionar');
        $archivo = $this->input->post('archivo');
        $otrar = $this->input->post('otrar');
        //informar a
        $oficina = $this->input->post('oficina');
        $peticionario = $this->input->post('peticionario');
        $requiriente = $this->input->post('requiriente');
        //recibe datos de oficio atendido
        $fecha_aten = $this->input->post('fecha_at');
        $nombre_aten = $this->input->post('nombre_at');
        $cargo_aten = $this->input->post('cargo_at');
        $descripcion_aten = $this->input->post('descripcion_at');
        $copia_aten = $this->input->post('copia_at');
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
        $archivo_aten = $upload_data['file_name'];
        //valida los datos recibidos de oficio recepción
            $this->form_validation->set_rules('no_oficio', 'No. de Oficio Recepción', 'required|is_unique[oficio_entrada.no_oficioEntrada]');
            $this->form_validation->set_rules('fecha_r', 'Día y Hora Recepción','required');
            $this->form_validation->set_rules('fecha_real', 'Fecha y Hora Recepción', 'required');
            $this->form_validation->set_rules('firma_r','Fecha Real', 'required');
            $this->form_validation->set_rules('cargo_r','Cargo','required');
            $this->form_validation->set_rules('peticion_r','Petición de entrada','required');
            //valida los datos del oficio seguimiento
            $this->form_validation->set_rules('nomenclatura', 'Nomenclatura','required|is_unique[oficio_seguimiento.nomenclatura]|min_length[19]|max_length[19]');
            $this->form_validation->set_rules('fecha', 'Fecha Oficio Seguimiento','required');
            $this->form_validation->set_rules('asunto', 'Asunto', 'required');
            $this->form_validation->set_rules('observaciones', 'Observaciones','required');
            $this->form_validation->set_rules('termino', 'Plazo', 'required');
            //valida los datos de oficio atendido
            $this->form_validation->set_rules('fecha_at','Fecha Atendido','required');
            $this->form_validation->set_rules('nombre_at', 'Nombre Atendido', 'required');
            $this->form_validation->set_rules('cargo_at','Cargo Atendido','required');
            $this->form_validation->set_rules('descripcion_at','Descripción atendido','required');
        if($this->form_validation->run()==TRUE){
            //cambia formato fecha entrada recepción
            $date = $fecha_r;
            $space = explode(" ", $date);
            $fec = explode("/", $space[0]);
            $fecha1 = $fec[2]."-".$fec[1]."-".$fec[0]." ".$space[1].":00";
            //cambia formato de fecha recepción
            $date2 = $fecha_rec;
            $space2 = explode(" ", $date2);
            $fec2 = explode("/", $space2[0]);
            $fecha2 = $fec2[2]."-".$fec2[1]."-".$fec2[0]." ".$space2[1].":00";
            //cambia formato de fecha real recepción
            $date3 = $fecha_recr;
            $space3 = explode('/',$date3);
            $fecha3 = $space3[2]."-".$space3[1]."-".$space3[0];
            //cambia formato de fecha nomenclatura
            $date4 = $fecha_seg;
            $space4 = explode('/',$date4);
            $fecha4 = $space4[2]."-".$space4[1]."-".$space4[0];
            //cambia formato fecha termino 
            $date5 = $termino;
            $space5 = explode(" ", $date5);
            $fec5 = explode("/", $space5[0]);
            $fecha5 = $fec5[2]."-".$fec5[1]."-".$fec5[0]." ".$space5[1].":00";
            //formato de fecha atendido
            $date6 = array();
            $date6 = $fecha_aten;
            $space6 = explode('/',$date6);
            $fecha6 = $space6[2]."-".$space6[1]."-".$space6[0];
            
            $insertCaptura = $this->Captura_model->insertaCaptura($oficio_rec, $fecha1, $fecha2, $fecha3, $firma_origen_rec, $cargo_rec, 
            $peticion_rec, $entrada, $oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, 
            $rh, $estadistica, $telefonia, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia,
            $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, 
            $fecha4, $asunto_seg, $observaciones, $fecha5, $atencion, $fecha6, $nombre_aten, $cargo_aten, $archivo_aten, $descripcion_aten, $copia_aten);
            
            if($insertCaptura == TRUE)
            {
                $this->session->set_flashdata('Creado','Oficio creado');
                $this->index();
            }else{
                $this->session->set_flashdata('No creado','Oficio no creado');
                $this->index();
            } 
        }else{
            $datos = array();
            //datos de oficio recepción
            $datos['no_oficio'] = $oficio_rec;
            $datos['fecha_r'] = $fecha_r;
            $datos['fecha_rec'] = $fecha_rec;
            $datos['firma_r'] = $firma_origen_rec;
            $datos['cargo_r'] = $cargo_rec;
            $datos['peticion_r'] = $peticion_rec;
            $datos['entrada'] = $entrada;
            //datos de oficio seguimiento
            $datos['nomenclatura'] = $nomenclatura;
            $datos['fecha'] = $fecha_seg;
            $datos['asunto'] = $asunto_seg;
            $datos['observaciones'] = $observaciones;
            $datos['termino'] = $termino;
            //datos de oficio atendido
            $datos['fecha_at'] = $fecha_aten;
            $datos['nombre_at'] = $nombre_aten;
            $datos['cargo_at'] = $cargo_aten;
            $datos['descripcion_at'] = $descripcion_aten;
            $datos['copia_at'] = $copia_aten;
            $this->load->view('templates/head');
            $this->load->view('genera_captura',$datos);
            $this->load->view('templates/footer');
        }
    }
    
    //consulta datos de oficio seguimiento en la tabla de captura
    public function busquedaOficioSeguimiento(){
        $this->load->view('templates/head');
        $this->load->view('busqueda_oficioCaptura');
        $this->load->view('templates/footer');
    }
    public function consultaOficioSeguimiento()
    {
        if($this->input->post()){
            //recibe datos del formulario
            $search = $this->input->post('busqueda');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida que los campos feccha no esten vacios
            $this->form_validation->set_rules('date1','Fecha Oficio Inicio','required');
            $this->form_validation->set_rules('date2','Fecha Oficio Final','required');
            if($this->form_validation->run()==true){
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
                $datos['datos'] = $this->Captura_model->searchDate($search,$fecha1,$fecha2);
                $this->load->view('all_oficio', $datos);
            }else{
                $datos = array();
                $datos['busqueda'] = $search;
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                $this->load->view('all_oficio',$datos);
            }
        }else{
            //mensaje de error 
            $this->session->set_flashdata('Error','Consultar administrador');
        }    
    }

}