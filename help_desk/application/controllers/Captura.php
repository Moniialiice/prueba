<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
require_once ('vendor/dompdf/dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
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
        $this->load->model('Bitacora_model');
        $this->load->library(array('form_validation'));
        $this->load->library('calendar');
        $this->load->library('upload');
        //$this->load->library('curl');
        ini_set('max_execution_time', 0);
        ini_set('memory_limit','-1');
    }
    //función para cargar vista de captura
    public function index(){
        //muestra los usuario difentes a coordinador y administrador
        $users = $this->Captura_model->getUsuarios();
        $atendido['atencion'] = $users;
        $this->load->view('templates/head');
        $this->load->view('captura/genera_captura',$atendido);
        $this->load->view('templates/footer');
    }
    //función para dar de alta nuevo registro
    public function altaCaptura(){
        //usuario que realizó la captura
        $Urecepcion = $this->input->post('atencion2');
        $Srecepción = $this->input->post('atencion1');
        $atencion = $this->input->post('atencion');
        //datos de oficio recepción
        $control = $this->input->post('ccontrol');
        $oficio_rec = $this->input->post('no_oficio');
        $fecha_r = $this->input->post('fecha_r');
        $fecha_rec = $this->input->post('fecha_rec');
        $fecha_recr = $this->input->post('fecha_real');
        $firma_origen_rec = $this->input->post('firma_r');
        $cargo_rec = $this->input->post('cargo_r');
        $peticion_rec = $this->input->post('peticion_r');
        //datos requeridos para subir archivo y ruta a guardar 
        $config_e['upload_path'] = './document/recepcion/.';
        $config_e['allowed_types'] = 'jpg|png|pdf';
        $config_e['max_size'] = 1000;
        $config_e['file_name'] = $oficio_rec;
        //carga libreria archivos e inicializa el array config con los datos del archivo
        $this->load->library('upload',$config_e);
        $this->upload->initialize($config_e);
        //toma el datos de archivo entrada
        $this->upload->do_upload('entrada');                
        //carga los datos del archivo
        $upload_entrada = $this->upload->data();
        //toma el nombre del archivo
        $entrada = $upload_entrada['file_name'];
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
        $nom_at = $this->input->post('nom_at');
        $fecha_aten = $this->input->post('fecha_at');
        $nombre_aten = $this->input->post('nombre_at');
        $cargo_aten = $this->input->post('cargo_at');
        $descripcion_aten = $this->input->post('descripcion_at');
        $copia_aten = $this->input->post('copia_at');
        //datos requeridos para subir archivo y ruta a guardar 
        $config_aten['upload_path'] = './document/atendido/.';
        $config_aten['allowed_types'] = 'jpg|png|pdf';
        $config_aten['max_size'] = 1000;
        $config_aten['file_name'] = $nomenclatura.$fecha_aten;
        //carga libreria archivos e inicializa el array config con los datos del archivo
        $this->load->library('upload',$config_aten);
        $this->upload->initialize($config_aten);
        //toma el datos de archivo entrada
        $this->upload->do_upload('archivo');                
        //carga los datos del archivo
        $upload_aten = $this->upload->data();
        //toma el nombre del archivo
        $archivo_aten = $upload_aten['file_name'];
        //valida los datos recibidos de oficio recepción
            $this->form_validation->set_rules('no_oficio', 'No. de Oficio Recepción', 'required|is_unique[captura_entrada.ccontrol]');
            $this->form_validation->set_rules('fecha_r', 'Día y Hora Recepción','required');
            $this->form_validation->set_rules('fecha_real', 'Fecha y Hora Recepción', 'required');
            $this->form_validation->set_rules('firma_r','Fecha Real', 'required');
            $this->form_validation->set_rules('cargo_r','Cargo','required');
            $this->form_validation->set_rules('peticion_r','Petición de entrada','required');
            //valida los datos del oficio seguimiento
            $this->form_validation->set_rules('nomenclatura', 'Nomenclatura','required|is_unique[captura.nomen_ofseg]|min_length[19]|max_length[22]');
            $this->form_validation->set_rules('fecha', 'Fecha Oficio Seguimiento','required');
            $this->form_validation->set_rules('asunto', 'Asunto', 'required');
            $this->form_validation->set_rules('observaciones', 'Observaciones','required');
            $this->form_validation->set_rules('termino', 'Plazo', 'required');
            //valida los datos de oficio atendido
            $this->form_validation->set_rules('nom_at', 'Nomenclatura Atendido','required|is_unique[captura_atendidos.nomenclatura_cap]|min_length[19]|max_length[22]');
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
            // 
            $insertCaptura = $this->Captura_model->insertaCaptura($oficio_rec, $fecha1, $fecha2, $fecha3, $firma_origen_rec, $cargo_rec, 
            $peticion_rec, $entrada, $oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, 
            $rh, $estadistica, $telefonia, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia,
            $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, 
            $fecha4, $asunto_seg, $observaciones, $fecha5, $atencion, $fecha6, $nombre_aten, $cargo_aten, $archivo_aten, $descripcion_aten, $copia_aten, $nom_at, $control);
            
            if($insertCaptura == TRUE)
            {
                $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                $fec_bit = date('Y-m-d'); //fecha el servidor
                $hora_bit = date('H:i:s'); //hora el servidor
                //inserta registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Captura creado, Oficio Recepción '.$oficio_rec.' Oficio Seguimiento '.$nomenclatura.'.',$fec_bit,$hora_bit);
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
            $datos['atencion'] = $atencion;
            $this->load->view('templates/head');
            $this->load->view('captura/genera_captura',$datos);
            $this->load->view('templates/footer');
        }
    }
    
    //función para cargar vista de captura
    public function indexA(){
        //muestra los usuario difentes a coordinador y administrador
        $users = $this->Captura_model->getUsuarios();
        $atendido['atencion'] = $users;
        $this->load->view('templates/head');
        $this->load->view('captura/genera_atendido_new',$atendido);
        $this->load->view('templates/footer');
    }
    //función para dar de alta nuevo registro
    public function altaAtendido(){
        $atencion = $this->input->post('atencion');
        //recibe datos de oficio atendido
        $nomenclatura_at = $this->input->post('nom');
        $fecha_aten = $this->input->post('date3');
        $nombre_aten = $this->input->post('nombre_at');
        $cargo_aten = $this->input->post('cargo_at');
        $descripcion_aten = $this->input->post('descripcion_at');
        $copia_aten = $this->input->post('copia_at');
        //datos requeridos para subir archivo y ruta a guardar 
        $config_aten['upload_path'] = './document/atendido/.';
        $config_aten['allowed_types'] = 'jpg|png|pdf';
        $config_aten['max_size'] = 1000;
        $config_aten['file_name'] = $nomenclatura_at.$fecha_aten;
        //carga libreria archivos e inicializa el array config con los datos del archivo
        $this->load->library('upload',$config_aten);
        $this->upload->initialize($config_aten);
        //toma el datos de archivo entrada
        $this->upload->do_upload('archivo');                
        //carga los datos del archivo
        $upload_aten = $this->upload->data();
        //toma el nombre del archivo
        $archivo_aten = $upload_aten['file_name'];
            //valida los datos de oficio atendido
            $this->form_validation->set_rules('nom', 'Nomenclatura','required|is_unique[oficio_seguimiento.nomenclatura]|min_length[19]|max_length[22]');
            $this->form_validation->set_rules('date3','Fecha Atendido','required');
            $this->form_validation->set_rules('nombre_at', 'Nombre Atendido', 'required');
            $this->form_validation->set_rules('cargo_at','Cargo Atendido','required');
            $this->form_validation->set_rules('descripcion_at','Descripción atendido','required');
        if($this->form_validation->run()==TRUE){
            //formato de fecha atendido
            $date6 = array();
            $date6 = $fecha_aten;
            $space6 = explode('/',$date6);
            $fecha6 = $space6[2]."-".$space6[1]."-".$space6[0];
            
            $insertCAtendido = $this->Captura_model->insertAtendido($nomenclatura_at, $fecha6, $nombre_aten, $cargo_aten, $descripcion_aten, $archivo_aten, $copia_aten, $atencion);            
            if($insertCAtendido == TRUE)
            {
                $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                $fec_bit = date('Y-m-d'); //fecha el servidor
                $hora_bit = date('H:i:s'); //hora el servidor
                //inserta registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Captura creado, Oficio Atendido '.$nomenclatura_at.'' ,$fec_bit,$hora_bit);
                $this->session->set_flashdata('Creado','Oficio Atendido creado');
                $this->indexA();
            }else{
                $this->session->set_flashdata('No creado','Oficio no creado');
                $this->indexA();
            } 
        }else{
            $datos = array();
            $datos['nom'] = $nomenclatura_at;
            $datos['fecha_at'] = $fecha_aten;
            $datos['nombre_at'] = $nombre_aten;
            $datos['cargo_at'] = $cargo_aten;
            $datos['descripcion_at'] = $descripcion_aten;
            $datos['copia_at'] = $copia_aten;
            $datos['atencion'] = $atencion;
            $this->load->view('templates/head');
            $this->load->view('captura/genera_atendido_new',$datos);
            $this->load->view('templates/footer');
        }
    }
    //consulta datos de oficio seguimiento en la tabla de captura
    public function busquedaOficioSeguimiento(){
        $this->load->view('templates/head');
        $this->load->view('captura/busqueda_oficioCaptura');
        $this->load->view('templates/footer');
    }
    public function consultaCapturaOS()
    {
        if($this->input->post()){
            //recibe datos del formulario
            $search = $this->input->post('busqueda');
            $asunto = $this->input->post('asunto');
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
                $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                $fec_bit = date('Y-m-d'); //fecha el servidor
                $hora_bit = date('H:i:s'); //hora el servidor
                //inserta registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Consulta Oficio Seguimiento Captura '.$search.'con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hora_bit);
                $datos['datos'] = $this->Captura_model->consultaOSCaptura($search, $asunto, $fecha1,$fecha2);
                $this->load->view('captura/all_oficioseg_Captura', $datos);
            }else{
                $datos = array();
                $datos['busqueda'] = $search;
                $datos['aseunto'] = $asunto;
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                $this->load->view('captura/all_oficioseg_Captura',$datos);
            }
        }else{
            //mensaje de error 
            $this->session->set_flashdata('Error','Consultar administrador');
        }    
    }
    //carga vista de busqueda atendido
    public function busquedaAtendido(){
        $this->load->view('templates/head');
        $this->load->view('captura/busqueda_atendidoCaptura');
        $this->load->view('templates/footer');
    }
    //consulta atendido de captura
    public function consultaCapturaAten(){
        if($this->input->post()){
            //recibe datos de la busqueda desc
            $search = $this->input->post('busqueda');
            $desc = $this->input->post('desc');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida que los datos no esten vacios
            $this->form_validation->set_rules('date1', 'Fecha Atendido Inicio', 'required');
            $this->form_validation->set_rules('date2', 'Fecha Atendido Final', 'required');
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
                $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                $fec_bit = date('Y-m-d'); //fecha el servidor
                $hora_bit = date('H:i:s'); //hora el servidor
                //inserta registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Búsqueda Oficio Atendido Captura'.$search.'con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hora_bit);
                $datos['datos'] = $this->Captura_model->consultaAtenCap($search, $desc, $fecha1,$fecha2); 
                $this->load->view('captura/all_atendido_Captura',$datos);
            }else{
                $datos = array();
                $datos['busqueda'] = $search;
                $datos['desc'] = $desc;
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                $this->load->view('captura/all_atendido_Captura',$datos);
            }
        }else{
            //mensaje de error
            $this->session->set_flashdata('Error','Consultar administrador');
        }
    }
    //carga vista de busqueda atendido
    public function busquedaEntrada(){
        $this->load->view('templates/head');
        $this->load->view('captura/busqueda_entradaCaptura');
        $this->load->view('templates/footer');
    }
    //consulta entrada de captura
    public function consultaEntradaAten(){
        if($this->input->post()){
            //recibe datos de la busqueda desc
            $control = $this->input->post('control');
            $search = $this->input->post('busqueda');
            $firma = $this->input->post('firma'); 
            $asunto = $this->input->post('asunto');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida que los datos no esten vacios
            $this->form_validation->set_rules('date1', 'Fecha Atendido Inicio', 'required');
            $this->form_validation->set_rules('date2', 'Fecha Atendido Final', 'required');
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
                $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                $fec_bit = date('Y-m-d'); //fecha el servidor
                $hora_bit = date('H:i:s'); //hora el servidor
                //inserta registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Búsqueda Oficio Atendido Captura'.$search.'con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hora_bit);
                $datos['datos'] = $this->Captura_model->searchCapFecha($control,$search,$asunto,$firma,$fecha1,$fecha2); 
                $this->load->view('captura/all_entrada_Captura',$datos);
            }else{
                $datos = array();
                $datos['busqueda'] = $search;
                $datos['control'] = $control;
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                $this->load->view('captura/all_entrada_Captura',$datos);
            }
        }else{
            //mensaje de error
            $this->session->set_flashdata('Error','Consultar administrador');
        }
    }
    //función para crear archivo pdf de tramite de turno
    public function imprimirOficioCap($id){
        $io = base64_decode($id);
        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
        $datos['dato'] = $this->Captura_model->reportOficioCap($io);
        $html = $this->load->view('captura/oficio_pdf', $datos, true);
        $nomen = $this->Captura_model->nomenSegBit($io);//consulta la nomenclatura por id del oficio
        $nom = $nomen[0]->nomen_ofseg; //
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hora_bit = date('H:i:s'); //hora actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga Trámite de Turno Oficio Seguimiento Captura '.$nom,$fec_bit,$hora_bit);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream("CapturaOficio_seguimiento.pdf", array("Attachment"=>0)); //muestra pdf
        //$dompdf->stream("tramite_turno.pdf");   //descarga pdf
    }
    //función para craar pdf de oficio seguimiento 
    public function imprimirOficioCap2($id)
    {
        $io = base64_decode($id);
        $datos['dato'] = $this->Captura_model->reportOficioCap($io);
        $nomen = $this->Captura_model->nomenSegBit($io);//consulta la nomenclatura por id del oficio
        $nom = $nomen[0]->nomen_ofseg; //
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hora_bit = date('H:i:s'); //hora actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga Trámite de Turno Oficio Seguimiento Captura.',$fec_bit,$hora_bit);
        $html = $this->load->view('captura/oficio_pdf', $datos, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "CapturaOficio_seguimiento." . "pdf";
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
        $pdf->Output($pdfFilePath, 'D');
    }
    //examplel helper
    public function imprimirAtendidoCap($id){     
        $this->load->library('Pdf');
        // create new PDF document
        $pdf = new Pdf('L', 'cm', 'Letter', true, 'UTF-8', false);    
        // set document information
        $pdf->SetCreator('FGJEM');
        $pdf->SetAuthor('Moni');
        $pdf->SetTitle('atendido_pdf');
        $pdf->SetMargins(15, 50, 15);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(20);
        $pdf->SetAutoPageBreak(TRUE, 20);
        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 023', PDF_HEADER_STRING);
        $ida = base64_decode($id);
        $datos['dato'] = $this->Captura_model->reportAtendidoCap($ida);
        $dato = $this->Captura_model->reportAtendidoCap($ida);    
        $date = $dato[0]->fecha_atenCap;
        //corta los datos de d,m,a
        $ext = explode("-",$date);
        $year = $ext[0];
        $mont = $ext[1];
        $day = $ext[2];
        //array convierte número de mes en nombre 
        $months = array (1=>'ENERO',2=>'FEBRERO',3=>'MARZO',4=>'ABRIL',5=>'MAYO', 6=>'JUNIO', 7=>'JULIO', 8=>'AGOSTO', 9=>'SEPTIEMBRE', 10=>'OCTUBRE',11=>'NOVIEMBRE',12=>'DICIEMBRE'); 
        $m = $months[(int)$mont];
        $oficio = $dato[0]->nomenclatura_cap;                  
        // set font
        $pdf->SetFont('helvetica', '', 10);
        $pdf->data($day,$m,$year,$oficio);
        $pdf->setPrintHeader(true);
        // add a page
        $pdf->AddPage();    
        $f = '<b>FISCALÍA GENERAL DE JUSTICIA DEL ESTADO DE MÉXICO.<br>
        COORDINACIÓN GENERAL DE COMBATE AL SECUESTRO.</b><br>';
        $pdf->CreateTextBox($f, 0, 50, 0, 10, 10, '','');    
        $html = $this->load->view('captura/atendido_pdf', $datos, true);
        $pdf->writeHTML($html, true, false, true, false, '');    
        //Close and output PDF document
        $pdf->Output('CapturaOficio_atendido.pdf', 'I');
    }
    //consulta oficio seguimiento por id del usuario
    public function consultaCapID(){
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hora_bit = date('H:i:s'); //hora actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Reporte Oficio Seguimiento Captura.',$fec_bit,$hora_bit);
        $datos['datos'] = $this->Captura_model->reportOficioID();
        $this->load->view('templates/head');
        $this->load->view('report_seguimiento',$datos);
        $this->load->view('templates/footer');
    }
    //consulta oficio atendido por el id del usuario
    public function consultaAtenId(){
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hora_bit = date('H:i:s'); //fecha actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Reporte Oficio Atendido Captura.',$fec_bit,$hora_bit);
        $datos['datos'] = $this->Captura_model->reportAtendidoID();
        $this->load->view('templates/head');
        $this->load->view('report_atendido',$datos); 
        $this->load->view('templates/footer');
    }

}