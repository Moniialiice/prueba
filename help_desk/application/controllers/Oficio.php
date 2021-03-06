<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
require_once ('vendor/dompdf/dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Oficio extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper(array('download','file','url','html','form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Oficio_model');
        $this->load->model('Bitacora_model');
        $this->load->library(array('form_validation'));
        $this->load->library('calendar');
        //$this->load->library('curl');

        ini_set('max_execution_time', 0);
        ini_set('memory_limit','-1');
    }
    //función carga templates, el formulario para generar oficio con el $id del oficio entrada
    public function index($id)
    {
        //$id = $this->encrypt->decode($enID);
        $ide = base64_decode($id);
        $datos ['datos'] = $this->Oficio_model->datosEntrada($ide); //datos de tabla oficio entrada
        $eSeguimiento = $this->Oficio_model->entradaSeguimiento($ide); //obtiene id de oficio seguimiento
        $eCaptura = $this->Oficio_model->capturaSeguimiento($ide); //verifica si oficio seg existe en tabla captura
        //si se ejecuta eSeguimiento 
        if($eSeguimiento){
            $idoficio = $eSeguimiento[0]->id_oficioseg; //id de oficioSeguimiento
            $this->actualizarOficio($idoficio); //carga formulario de actualización
        }elseif($eCaptura){
            $idcaptura = $eCaptura[0]->id_ofseg;
            $this->actualizarOficioCaptura($idcaptura);
        }else{            
            //carga el vista para nuevo oficio seguimiento
            $this->load->view('templates/head');
            $this->load->view('genera_oficio',$datos);
            $this->load->view('templates/footer');
        }                
    }
    //ejemplo consecutivo
    function generaNomenclatura($start,$count,$digits) 
    {
        $result = array();
        for ($n = $start; $n < $start + $count; $n++) {
           $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
        }
        return $result;
    }
    //valida los datos para insertar en la base 
    public function createOficioVal()
    {
        $ide = $this->input->post('entrada');
        if($this->input->post())
        {
            //carga el tipo de nomenclatura
            $tipoOficio = $this->input->post('tipoOficio');   
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $fecha = $this->input->post('fecha');
            $asunto = $this->input->post('asunto');
            $observaciones = $this->input->post('observaciones');
            $termino = $this->input->post('termino');
            //valida los datos del formulario
            $this->form_validation->set_rules('fecha','Fecha','required');
            $this->form_validation->set_rules('asunto','Asunto','required');
            $this->form_validation->set_rules('observaciones', 'Observaciones', 'required');
            $this->form_validation->set_rules('termino', 'Termino', 'required');
            //etiquetad
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
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                $year = date('Y'); //carga el año en curso del servidor
                //cambia formato de fecha
                $date = $fecha;  
                $ext = explode('/',$date); 
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0];
                //cambia formato fecha termino 
                $datet = $termino;
                $espaciot = explode(" ", $datet);
                $fect = explode("/", $espaciot[0]);
                $fechat = $fect[2]."-".$fect[1]."-".$fect[0]." ".$espaciot[1].":00";           
                //dependiendo del tipo de oficio carga nomeclatura
                if($this->Oficio_model->getNomAtendido($tipoOficio)){
                    $nomaten = $this->Oficio_model->getNomAtendido($tipoOficio); //consulta ultima nomenclatura en atendido
                    $nomate = $nomaten[0]->nomenclatura_aten; //asigna la nomenclatura a la variable $nomate
                    $nomat = explode("/",$nomate); //corta nomenclatura en cada diagonal 
                    $nomena = $nomat[0]; //nomenclatura
                    $numa = $nomat[1]; //número consecutivo
                    $ansa = $nomat[2]; //año
                }else{
                    $numa = 0;
                    $ansa = $year;
                }
                if($this->Oficio_model->getNom($tipoOficio)){
                    $nomcon = $this->Oficio_model->getNom($tipoOficio); //consulta última nomenclatura en seguimiento                       
                    $nomc = $nomcon[0]->nomenclatura; //se obtiene ultima nomenclatura de seguimiento
                    $nom = explode("/",$nomc); //corta nomenclatura en cada diagonal
                    $nomen = $nom[0]; //nomenclatura del ultimo registro
                    $num = $nom[1]; //número consecutivo de la nomenclatura
                    $ans = $nom[2]; //año de nomenclatura del ultimo registro
                }else{
                    $num = 0;
                    $ans = $year;
                }
                switch ($tipoOficio)
                {
                    case '400LIA000':
                        if($numa>$num){                                        
                            if($ansa == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($numa+1,1,5); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ansa; //crea nomenclatura coordinador
                                //inserta los datos 
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                    //id oficio seguimiento 
                                    $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                    $ido = $idoficio[0]->id_oficioseg;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }else{
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                //id oficio seguimiento 
                                $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                $ido = $idoficio[0]->id_oficioseg;
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }
                        }else{
                            if($ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($num+1,1,5); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ans; //crea nomenclatura coordinador
                                //inserta los datos 
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                    //id oficio seguimiento 
                                    $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                    $ido = $idoficio[0]->id_oficioseg;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }else{
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                //id oficio seguimiento 
                                $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                $ido = $idoficio[0]->id_oficioseg;
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }
                        }    
                        break; 
                    case '400LI0010':
                        if($numa>$num){      
                            if($ansa == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($numa+1, 1, 5); //manda datos para generar consecutivo                           
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$year; //genera nomenclatura secretario
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                    //id oficio seguimiento 
                                    $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                    $ido = $idoficio[0]->id_oficioseg;
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en actualizar oficio
                                    $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }else{
                                    $nomenclatura = '400LI0010/0041/'.$year;
                                    $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                    if($insertOficio == true){                    
                                        //id oficio seguimiento 
                                        $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                        $ido = $idoficio[0]->id_oficioseg;
                                        $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                        $fec_bit = date('Y-m-d'); //fecha el servidor
                                        $hor_bit = date('H:i:s'); //fecha el servidor
                                        //inserta registros en la bitacora
                                        $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                        //una vez insertado muestra datos en actualizar oficio
                                        $this->actualizarOficio($ido);
                                    }else{
                                        $this->session->set_flashdata('Error','Consulta administrador');                    
                                        $this->index($ide);
                                }
                            }
                        }else{
                            if($ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($num+1, 1, 5); //manda datos para generar consecutivo                           
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$year; //genera nomenclatura secretario
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                    //id oficio seguimiento 
                                    $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                    $ido = $idoficio[0]->id_oficioseg;
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en actualizar oficio
                                    $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }else{
                                    $nomenclatura = '400LI0010/0041/'.$year;
                                    $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                    if($insertOficio == true){                    
                                        //id oficio seguimiento 
                                        $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                        $ido = $idoficio[0]->id_oficioseg;
                                        $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                        $fec_bit = date('Y-m-d'); //fecha el servidor
                                        $hor_bit = date('H:i:s'); //fecha el servidor
                                        //inserta registros en la bitacora
                                        $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                        //una vez insertado muestra datos en actualizar oficio
                                        $this->actualizarOficio($ido);
                                    }else{
                                        $this->session->set_flashdata('Error','Consulta administrador');                    
                                        $this->index($ide);
                                }
                            }
                        }    
                    break;    
                }
            }else{ 
                    //tomamos los datos del formulario en un array
                    $datos = array();
                    $datos['fecha'] = $fecha;
                    $datos['asunto'] = $asunto;
                    $datos['observaciones'] = $observaciones;                
                    $datos['termino'] = $termino;
                    $datos['datos'] = $this->Oficio_model->datosEntrada($ide);
                    //envia datos del array a la vista
                    $this->load->view('templates/head');
                    $this->load->view('genera_oficio',$datos); 
                    $this->load->view('templates/footer');
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->index($ide);
        }
    }
    //carga formulario de busqueda
    public function busquedaOficio()
    {
        $this->load->view('templates/head');
        $this->load->view('busqueda_oficio');
        $this->load->view('templates/footer');
    }
    //muestra consulta de oficio por la búsqueda
    public function consultaOficio()
    {
        if($this->input->post()){
            //recibe datos del formulario
            $search = $this->input->post('busqueda');
            $asunto = $this->input->post('asunto');
            $tipCon = $this->input->post('tipoCon');
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
                $id = $this->session->userdata('id_usuario'); //id del usuario logeado
                $fec_bit = date('Y-m-d'); //fecha actual del servidor
                $hor_bit = date('H:i:s'); //fecha actual del servidor
                //inserción de registros en la bitacora
                $this->Bitacora_model->insertBitacora($id,'Búsqueda Oficio Seguimiento '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
                switch($this->session->userdata('id_tipoUsuario')){
                    case '1':
                        if($tipCon == 1){                            
                            $datos['datos'] = $this->Oficio_model->searchDate($search,$asunto,$fecha1,$fecha2);
                            $this->load->view('all_oficio', $datos);
                        }if($tipCon == 2){                            
                            $datos['datos'] = $this->Oficio_model->searchDateTur($search,$asunto,$fecha1,$fecha2);
                            $this->load->view('all_oficio', $datos);    
                        }if($tipCon == 3){                            
                            $datos['datos'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                            $this->load->view('all_oficio', $datos);    
                        }
                    break;
                    case '2':
                        if($tipCon == 1){                            
                            $datos['datos'] = $this->Oficio_model->searchDate($search,$asunto,$fecha1,$fecha2);
                            $datos['aten'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                            $this->load->view('all_oficio', $datos);
                        }if($tipCon == 2){                            
                            $datos['datos'] = $this->Oficio_model->searchDateTur($search,$asunto,$fecha1,$fecha2);                            
                            $this->load->view('all_OficioSeg', $datos);    
                        }if($tipCon == 3){                            
                            $datos['datos'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                            $this->load->view('all_OficioAtendido', $datos);    
                        }
                    break;                    
                    case '5':
                        if($tipCon == 1){                            
                            $datos['datos'] = $this->Oficio_model->searchDate($search,$fecha1,$fecha2);
                            $datos['aten'] = $this->Oficio_model->searchDateAten($search,$fecha1,$fecha2);
                            $this->load->view('all_oficio', $datos);
                        }if($tipCon == 2){                            
                            $datos['datos'] = $this->Oficio_model->searchDateTur($search,$fecha1,$fecha2);                            
                            $this->load->view('all_OficioSeg', $datos);    
                        }if($tipCon == 3){                            
                            $datos['datos'] = $this->Oficio_model->searchDateAten($search,$fecha1,$fecha2);
                            $this->load->view('all_OficioAtendido', $datos);    
                        }
                    break;
                }                
            }else{
                $datos = array();
                $datos['busqueda'] = $search;
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                $this->load->view('all_oficio',$datos);
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
        }    
    }
    //carga formulario de actualización
    public function actualizarOficio($id)
    { 
        //consulta los datos del oficio por el id de oficio
        $datos ['datos'] = $this->Oficio_model->report($id);
        $id_u = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Oficio_model->getNomBit($id);
        $nomen = $nom[0]->nomenclatura;
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id_u,'Consulta oficio seguimiento '.$nomen.'.',$fec_bit,$hor_bit);
        //manda datos de la consulta a la vista para mostrar el formulario correspondiente 
            $this->load->view('templates/head');
            $this->load->view('consulta_oficio',$datos); //formulario para visualizar oficio e imprimir
            $this->load->view('templates/footer');    
    }
    //carga formulario de datos oficio seguimiento de captura
    public function actualizarOficioCaptura($id)
    { 
        //consulta los datos del oficio por el id de oficio
        $datos ['datos'] = $this->Oficio_model->reportCaptura($id);
        //manda datos de la consulta a la vista para mostrar el formulario correspondiente 
            $this->load->view('templates/head');
            $this->load->view('consulta_captura',$datos); //formulario para visualizar oficio e imprimir
            $this->load->view('templates/footer');    
    }
    //función para crear archivo pdf de tramite de turno
    public function imprimirOficio($id){
        $io = base64_decode($id);
        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
        $datos['dato'] = $this->Oficio_model->reportOficio($io);
        $registro = $this->Oficio_model->reportOficio($io);
        $html = $this->load->view('oficio_pdf', $datos, true);
        $id_u = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Oficio_model->getNomBit($io);
        $nomen = $nom[0]->nomenclatura;
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id_u,'Descarga Trámite en Turno del oficio seguimiento '.$nomen.' en PDF.',$fec_bit,$hor_bit);        
        $dompdf->loadHtml($html);
        $dompdf->render();
        //$dompdf->stream("sample.pdf", array("Attachment"=>0)); //muestra pdf
        $dompdf->stream("tramite_turno.pdf");   //descarga pdf
    }
     //reporte en excel
    public function reportExcelOS()
    {
        $search = $this->input->post('busqueda');
        $asunto = $this->input->post('asunto');
        $tipCon = $this->input->post('tipoCon');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado
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
        ->setCellValue('A1', 'NO. OFICIO')
        ->setCellValue('B1', 'FECHA')
        ->setCellValue('C1', 'SE REMITE')
        ->setCellValue('D1', 'SOLICITUD')
        ->setCellValue('E1', 'PLAZO')
        ->setCellValue('F1', 'ATENCIÓN');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);
       
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(13);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(60);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(100);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        //validamos el tipo de usuario para la consulta de oficio seguimiento
        switch ($this->session->userdata('id_tipoUsuario')){            
            case '1':
                if($tipCon == 1){                            
                    $datos['datos'] = $this->Oficio_model->searchDate($search,$asunto,$fecha1,$fecha2);
                }if($tipCon == 2){                            
                    $datos['datos'] = $this->Oficio_model->searchDateTur($search,$asunto,$fecha1,$fecha2);
                }if($tipCon == 3){                            
                    $datos['datos'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                }
            break;
            case '2':
                if($tipCon == 1){                            
                    $datos['datos'] = $this->Oficio_model->searchDate($search,$asunto,$fecha1,$fecha2);
                }if($tipCon == 2){                            
                    $datos['datos'] = $this->Oficio_model->searchDateTur($search,$asunto,$fecha1,$fecha2);                            
                }if($tipCon == 3){                            
                    $datos['datos'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                }
            break;                    
            case '5':
                if($tipCon == 1){                            
                    $datos['datos'] = $this->Oficio_model->searchDate($search,$asunto,$fecha1,$fecha2);
                    $datos['aten'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                }if($tipCon == 2){                            
                    $datos['datos'] = $this->Oficio_model->searchDateTur($search,$asunto,$fecha1,$fecha2);                            
                }if($tipCon == 3){                            
                    $datos['datos'] = $this->Oficio_model->searchDateAten($search,$asunto,$fecha1,$fecha2);
                }
            break;
        }
        //muestra los datos de un array
        foreach ($datos as $dato)
        {
            $row = count($dato);
            for ($n=2; $n<=$row+1; $n++){
            //dirigido a 
            if($dato[$n-2]->conase == 1){ $conase = 'CONASE';}else{ $conase = '';}
            if($dato[$n-2]->fiscal_general == 1){ $fgeneral = ' FISCAL GENERAL';}else{ $fgeneral = '';}
            if($dato[$n-2]->vicefiscalia){ $vfisccalia = ' VICEFISCALIA';}else{ $vfisccalia='';}
            if($dato[$n-2]->zona_oriente == 1){ $zo = '  ORIENTE'; }else{$zo='';}
            if($dato[$n-2]->valle_toluca == 1){ $vt = ' VALLE DE TOLUCA';}else{$vt='';}
            if($dato[$n-2]->oficialia_mayor == 1){ $om = ' OFICIALIA MAYOR';}else{$om = '';}
            if($dato[$n-2]->valle_mexico == 1){ $vm = ' VALLE DE MÉXICO';}else{$vm='';}
            if($dato[$n-2]->informacion_estadistica == 1){ $infoe = ' DEPARTAMENTO DE INFORMACIÓN Y ESTADÍSTICA';}else{$infoe='';}
            if($dato[$n-2]->central_juridico == 1){ $centralj = ' CENTRAL JURÍDICO';}else{$centralj='';}
            if($dato[$n-2]->servicio_carrera == 1){ $servicioc = ' SERVICIO DE CARRERA';}else{$servicioc='';}
            if($dato[$n-2]->otra != ""){ $otra = $dato[$n-2]->otra; }else{$otra = '';}

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$n, $dato[$n-2]->nomenclatura)
            ->setCellValue('B'.$n, $dato[$n-2]->fecha)
            ->setCellValue('C'.$n, $conase.$fgeneral.$vfisccalia.$zo.$vt.$om.$vm.$infoe.$centralj." ".$servicioc." ".$otra)
            ->setCellValue('D'.$n, $dato[$n-2]->asunto)
            ->setCellValue('E'.$n, $dato[$n-2]->termino)
            ->setCellValue('F'.$n, $dato[$n-2]->nombre." ".$dato[$n-2]->apellidop." ".$dato[$n-2]->apellidom);
            }   
        }
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga reporte en Excel de la búsqueda '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
        //se crea objeto para guardar archivo xlsx
        $writer = new Xlsx($spreadsheet);
        //nombre del archivo a descargar
        $filename = 'excel_oficio';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //linea que descarga el archivo
        $writer->save('php://output');
    }

}