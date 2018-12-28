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
        $this->load->model('Oficio_model');
        $this->load->library(array('form_validation'));
        $this->load->library('calendar');
        $this->load->library('upload');
        //$this->load->library('curl');
        $this->folder = 'documentc/';
    }
    //función para cargar vista de captura
    public function index(){
        $this->load->view('templates/head');
        $this->load->view('genera_captura');
        $this->load->view('templates/footer');
    }
    //función para dar de alta nuevo registro
    public function altaCaptura(){
        //datos de oficio recepción
        $oficio_rec = $this->input->post('no_oficio');
        $fecha_r = $this->input->post('fecha_r');
        $fecha_rec = $this->input->post('fecha_rec');
        $fecha_recr = $this->input->post('fecha_real');
        $firma_origen_rec = $this->input->post('firma_r');
        $cargo_rec = $this->input->post('cargo_r');
        $peticion_rec = $this->input->post('peticion_r');
        $entrada = $this->input->post('entrada');
        //recibe datos de oficio seguimiento
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
        $archivo_aten = $this->input->post('archivo');
        $descripcion_aten = $this->input->post('descripcion_at');
        $copia_aten = $this->input->post('copia_at');
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
    //prueba al recibir los datos par ala validación
    public function altaCaptura2(){
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
        //validamos los campos 
        $this->form_validation->set_rules('nomenclatura', 'Nomenclatura','required|is_unique[oficio_seguimiento.nomenclatura]|min_length[19]|max_length[19]');
        $this->form_validation->set_rules('fecha', 'Fecha Oficio Seguimiento','required');
        $this->form_validation->set_rules('asunto', 'Asunto', 'required');
        $this->form_validation->set_rules('observaciones', 'Observaciones','required');
        $this->form_validation->set_rules('termino', 'Plazo', 'required');
        if($this->form_validation->run()==TRUE){

        }else{
            $datos = array();
            $datos['nomenclatura'] = $nomenclatura;
            $datos['fecha'] = $fecha_seg;
            $datos['asunto'] = $asunto_seg;
            $datos['observaciones'] = $observaciones;
            $datos['termino'] = $termino; 
            $this->load->view('templates/head');
            $this->load->view('genera_captura');
            $this->load->view('templates/footer');
        }

    }
    //prueba de validación al recibir 
    public function altaCapturaAnt(){
        $fecha_aten = $this->input->post('fecha_at');
        $cargo_aten = $this->input->post('cargo_at');
        $descripcion_aten = $this->input->post('descripcion_at');
        $copia_aten = $this->input->post('copia_at');
        //inicia validación
        $this->form_validation->set_rules('fecha_at','Fecha Atendido','required');
        $this->form_validation->set_rules('cargo_at','Cargo Atendido','required');
        $this->form_validation->set_rules('descripcion_at','Descrión atendido','required');
        if($this->form_validation->run()==TRUE){

        }else{
            $datos = array();
            $datos['fecha_at'] = $fecha_aten;
            $datos['cargo_at'] = $cargo_aten;
            $datos['descripcion_at'] = $descripcion_aten;
            $datos['copia_at'] = $copia_aten;
            $this->load->view('templates/head');
            $this->load->view('genera_captura');
            $this->load->view('templates/footer');
        }
    }

}