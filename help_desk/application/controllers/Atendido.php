<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
require_once ('vendor/dompdf/dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
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
        $this->load->model('Bitacora_model');
        $this->load->library(array('form_validation','upload'));
        //$this->load->library('curl');
        $this->folder = 'document/atendido/';
    }
    //función carga templates, el formulario para generar oficio con el $id del oficio entrada
    public function index()
    {
        //carga el vista para nuevo oficio seguimiento
        $this->load->view('templates/head');
        $this->load->view('genera_atendido_new');
        $this->load->view('templates/footer');     
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
    //alta de oficio antendido con un nuevo número de oficio  
    public function createAtendido()
    {
        if($this->input->post())
        { 
            //nomenclatura para colocarlo al archivo atendido
            $tipoOficio = $this->input->post('tipoOficio');
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $valfile = $this->input->post('archivo');
            $fecha = $this->input->post('date1');
            $nombre = $this->input->post('nombre');
            $cargo = $this->input->post('cargo');
            $descripcion = $this->input->post('descripcion');
            $copia = $this->input->post('copia');
            //valida los datos del formulario
            $this->form_validation->set_rules('date1','Fecha','required');
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('cargo','Cargo','required');
            $this->form_validation->set_rules('descripcion','Descripción','required');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                $year = date('Y'); //carga el año en curso del servidor
                $ext = explode('/',$fecha); 
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0];
                $fecha2 = $ext[2]."_".$ext[1]."_".$ext[0];
                if($this->Atendido_model->getNomAtendido($tipoOficio)){
                    $nomaten = $this->Atendido_model->getNomAtendido($tipoOficio); //consulta ultima nomenclatura en atendido
                    $nomate = $nomaten[0]->nomenclatura_aten; //asigna la nomenclatura a la variable $nomate
                    $nomat = explode("/",$nomate); //corta nomenclatura en cada diagonal 
                    $nomena = $nomat[0]; //nomenclatura
                    $numa = $nomat[1]; //número consecutivo
                    $ansa = $nomat[2]; //año
                }else{
                    $numa = 0;
                    $ansa = $year;
                }
                if($this->Atendido_model->getNom($tipoOficio)){
                    $nomcon = $this->Atendido_model->getNom($tipoOficio); //consulta última nomenclatura en seguimiento                       
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
                        if($numa>$num){ // si consecutivo de atendido es mayor al consecutivo de seguimiento                            
                            if($ansa == $year){ //si año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($numa+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ansa; //crea nomenclatura coordinador
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //inserta datos
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }else{
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //llama función para insertar datos
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                //id oficio seguimiento 
                                $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                $ida = $idatendido[0]->id_oficioAtendido; 
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }
                        }else{
                            if($ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($num+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ans; //crea nomenclatura coordinador
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //inserta los datos 
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }else{
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //llama función para insertar datos
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                //id oficio seguimiento 
                                $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                $ida = $idatendido[0]->id_oficioAtendido;
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }
                        }   
                        break; 
                    case '400LI0010':
                        if($numa>$num){ // si consecutivo de atendido es mayor al consecutivo de seguimiento
                            if(isset($valfile)){
                                $archivo = "";
                            }else{
                                $config['upload_path'] = $this->folder;
                                $config['allowed_types'] = 'jpg|png|pdf';
                                $config['max_size'] = 2048;
                                $config['file_name'] = $nomena[0].'_'.$fecha2;
                                //carga libreria archivos e inicializa el array config con los datos del archivo
                                $this->load->library('upload',$config);
                                $this->upload->initialize($config);
                                //toma el datos de archivo entrada
                                $this->upload->do_upload('archivo');                
                                //carga los datos del archivo
                                $upload_data = $this->upload->data();
                                //toma el nombre del archivo
                                $archivo = $upload_data['file_name'];
                            }
                            if($ansa == $year){ //si año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($numa+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ansa; //crea nomenclatura coordinador
                                //inserta los datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }else{
                                $nomenclatura = '400LI0010/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido; 
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }
                        }else{
                            if($ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($num+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ans; //crea nomenclatura coordinador
                                //inserta los datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                } 
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }else{
                                $nomenclatura = '400LI0010/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                $insertAtendido = $this->Atendido_model->insert_Atendido($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $atencion); 
                                if($insertAtendido == true){                    
                                //id oficio seguimiento 
                                $idatendido = $this->Atendido_model->getIDAt($nomenclatura); 
                                $ida = $idatendido[0]->id_oficioAtendido;
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index();
                                }
                            }
                        }
                    break;    
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['date1'] = $fecha;
                $datos['nombre'] = $nombre;
                $datos['cargo'] = $cargo;
                $datos['descripcion'] = $descripcion;
                $copia['copia'] = $copia;
                //envia datos del array a la vista
                $this->load->view('templates/head');
                $this->load->view('genera_atendido_new'); 
                $this->load->view('templates/footer');
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->index();
        }
    } 
    public function inicio($id)
    {
        $ida = base64_decode($id);
        $datos ['datos'] = $this->Atendido_model->datosSeguimiento($ida); //datos de tabla oficio entrada
        $sAtendido = $this->Atendido_model->seguimientoAtendido($ida); //obtiene id de oficio seguimiento
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
        $ids = $this->input->post('segui');
        if($this->input->post())
        { 
            //nomenclatura para colocarlo al archivo atendido
            $nome = $this->input->post('nomen');
            $nom = explode('/',$nome);
            $tipoOficio = $nom[0];
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $valfile = $this->input->post('archivo');
            $fecha = $this->input->post('date1');
            $nombre = $this->input->post('nombre');
            $cargo = $this->input->post('cargo');
            $descripcion = $this->input->post('descripcion');
            $copia = $this->input->post('copia');
            //valida los datos del formulario
            $this->form_validation->set_rules('date1','Fecha','required');
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('cargo','Cargo','required');
            $this->form_validation->set_rules('descripcion','Descripción','required');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                $year = date('Y'); //carga el año en curso del servidor
                $ext = explode('/',$fecha); 
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0];
                $fecha2 = $ext[2]."_".$ext[1]."_".$ext[0];
                if($this->Atendido_model->getNomAtendido($tipoOficio)){
                    $nomaten = $this->Atendido_model->getNomAtendido($tipoOficio); //consulta ultima nomenclatura en atendido
                    $nomate = $nomaten[0]->nomenclatura_aten; //asigna la nomenclatura a la variable $nomate
                    $nomat = explode("/",$nomate); //corta nomenclatura en cada diagonal 
                    $nomena = $nomat[0]; //nomenclatura
                    $numa = $nomat[1]; //número consecutivo
                    $ansa = $nomat[2]; //año
                }else{
                    $numa = 0;
                    $ansa = $year;
                }
                if($this->Atendido_model->getNom($tipoOficio)){
                    $nomcon = $this->Atendido_model->getNom($tipoOficio); //consulta última nomenclatura en seguimiento                       
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
                        if($numa>$num){ // si consecutivo de atendido es mayor al consecutivo de seguimiento                            
                            if($ansa == $year){ //si año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($numa+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ansa; //crea nomenclatura coordinador
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //inserta datos
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }else{
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //llama función para insertar datos
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido; 
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }
                        }else{
                            if($ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($num+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ans; //crea nomenclatura coordinador
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //inserta los datos 
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }else{
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                //llama función para insertar datos
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                //id oficio seguimiento 
                                $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                $ida = $idatendido[0]->id_oficioAtendido;
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }
                        }   
                        break; 
                    case '400LI0010':
                        if($numa>$num){ // si consecutivo de atendido es mayor al consecutivo de seguimiento
                            if(isset($valfile)){
                                $archivo = "";
                            }else{
                                $config['upload_path'] = $this->folder;
                                $config['allowed_types'] = 'jpg|png|pdf';
                                $config['max_size'] = 2048;
                                $config['file_name'] = $nomena[0].'_'.$fecha2;
                                //carga libreria archivos e inicializa el array config con los datos del archivo
                                $this->load->library('upload',$config);
                                $this->upload->initialize($config);
                                //toma el datos de archivo entrada
                                $this->upload->do_upload('archivo');                
                                //carga los datos del archivo
                                $upload_data = $this->upload->data();
                                //toma el nombre del archivo
                                $archivo = $upload_data['file_name'];
                            }
                            if($ansa == $year){ //si año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($numa+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ansa; //crea nomenclatura coordinador
                                //inserta los datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }else{
                                $nomenclatura = '400LI0010/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido; 
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio atendido '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }
                        }else{
                            if($ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                                $consecutivo = $this->generaNomenclatura($num+1,1,4); //manda datos para generar consecutivo
                                $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$ans; //crea nomenclatura coordinador
                                //inserta los datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                } 
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                    //id oficio seguimiento 
                                    $idatendido = $this->Atendido_model->getIDAt($nomenclatura);
                                    $ida = $idatendido[0]->id_oficioAtendido;                                
                                    $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                    $fec_bit = date('Y-m-d'); //fecha el servidor
                                    $hor_bit = date('H:i:s'); //fecha el servidor
                                    //inserta registros en la bitacora
                                    $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                    //una vez insertado muestra datos en mostrar oficio
                                    $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }else{
                                $nomenclatura = '400LI0010/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                if(isset($valfile)){
                                    $archivo = "";
                                }else{
                                    $config['upload_path'] = $this->folder;
                                    $config['allowed_types'] = 'jpg|png|pdf';
                                    $config['max_size'] = 2048;
                                    $config['file_name'] = $nomenclatura.'_'.$fecha2;
                                    //carga libreria archivos e inicializa el array config con los datos del archivo
                                    $this->load->library('upload',$config);
                                    $this->upload->initialize($config);
                                    //toma el datos de archivo entrada
                                    $this->upload->do_upload('archivo');                
                                    //carga los datos del archivo
                                    $upload_data = $this->upload->data();
                                    //toma el nombre del archivo
                                    $archivo = $upload_data['file_name'];
                                }
                                $insertAtendido = $this->Atendido_model->insert_AtenSeg($nomenclatura, $fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $ids, $atencion); 
                                if($insertAtendido == true){                    
                                //id oficio seguimiento 
                                $idatendido = $this->Atendido_model->getIDAt($nomenclatura); 
                                $ida = $idatendido[0]->id_oficioAtendido;
                                $id = $this->session->userdata('id_usuario');//id del usuario loggeado
                                $fec_bit = date('Y-m-d'); //fecha el servidor
                                $hor_bit = date('H:i:s'); //fecha el servidor
                                //inserta registros en la bitacora
                                $this->Bitacora_model->insertBitacora($id,'Oficio seguimiento '.$nomenclatura.' creado.',$fec_bit,$hor_bit);
                                //una vez insertado muestra datos en mostrar oficio
                                $this->mostrarAtendido($ida);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->inicio($ids);
                                }
                            }
                        }
                    break;    
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['date1'] = $fecha;
                $datos['nombre'] = $nombre;
                $datos['cargo'] = $cargo;
                $datos['descripcion'] = $descripcion;
                $datos['copia'] = $copia;
                $datos['datos'] = $this->Atendido_model->datosSeguimiento($ids); //datos de tabla oficio entrada
                //envia datos del array a la vista
                $this->load->view('templates/head');
                $this->load->view('genera_atendido',$datos); 
                $this->load->view('templates/footer');
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->inicio($ids);
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
                $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
                $fec_bit = date('Y-m-d'); //fecha actual del servidor
                $hor_bit = date('H:i:s');
                //inserción de registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Búsqueda Oficio Atendido '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit, $hor_bit);
                switch($this->session->userdata('id_tipoUsuario')){
                    case '1':
                        //datos de la consulta oficio  
                        $datos['datos'] = $this->Atendido_model->searchfechaAtendido($search, $fecha1, $fecha2);
                        $this->load->view('all_atendido', $datos);
                    break;
                    case '2':
                        //datos de la consulta oficio
                        $datos['datos'] = $this->Atendido_model->searchfechaAtendido($search, $fecha1, $fecha2);
                        $this->load->view('all_atendido', $datos);
                    break;
                    case '5':
                        //datos de la consulta oficio
                        $datos['datos'] = $this->Atendido_model->searchAtenFI($search, $fecha1, $fecha2, $idu);
                        $this->load->view('all_atendido', $datos);
                    break;
                }                               
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
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Atendido_model->nomenBit($id); //consulta de nomenclatura por el id del asunto
        $nome = $nom[0]->nomenclatura_aten; //nomenclatura del oficio seguimiento
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Consulta oficio atendido del oficio: '.$nome.'.',$fec_bit,$hor_bit);
        //carga vistas, formulario de consulta
        $this->load->view('templates/head');
        $this->load->view('consulta_atendido',$datos);
        $this->load->view('templates/footer');
    }
    //vista de los datos atendido para actualizar
    public function updateAtendido($id)
    {
        $ida = base64_decode($id);
        //consulta datos del oficio atendido
        $datos['datos'] = $this->Atendido_model->consultaAtendido($ida);
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Atendido_model->nomenBit($ida); //consulta de nomenclatura por el id
        $nome = $nom[0]->nomenclatura_aten; //nomenclatura del oficio seguimiento
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Consulta oficio atendido del oficio: '.$nome.'.',$fec_bit,$hor_bit);
        //carga vistas, formulario de consulta
        $this->load->view('templates/head');
        $this->load->view('actualiza_atendido',$datos);
        $this->load->view('templates/footer');
    }
    //update de datos de atendido
    public function modifAtendido()
    {
        $ida = $this->input->post('aten'); //id atendido
        $a = base64_encode($ida);
        if($this->input->post())
        {
            $year = date('Y'); //carga el año en curso del servidor 
            $nom = $this->input->post('nomen');
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $valfile = $this->input->post('archivo');            
            $fecha1 = $this->input->post('old');
            $fecha2 = $this->input->post('date1');
            $nombre = $this->input->post('nombre');
            $cargo = $this->input->post('cargo');
            $descripcion = $this->input->post('descripcion');
            $copia = $this->input->post('copia');
            $nullarchivo = $this->input->post('archivo');
            if(empty($fecha1)){
                $fecha = $fecha2;
                $ext = explode('/',$fecha); 
                $farch = $ext[2]."_".$ext[1]."_".$ext[0];
            }else{
                $fecha = $fecha1;
                $ext = explode('-',$fecha); 
                $farch = $ext[0]."_".$ext[1]."_".$ext[2];
            }
            //valida los datos del formulario
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('cargo','Cargo','required');
            $this->form_validation->set_rules('descripcion','Descripción','required');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                $config['upload_path'] = $this->folder;
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size'] = 2048;
                $config['file_name'] = $nom.'_'.$farch;
                //carga libreria archivos e inicializa el array config con los datos del archivo
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                //toma el datos de archivo entrada
                if(empty($nullarchivo)){                            
                    if ( !$this->upload->do_upload('archivo'))
                    {
                        $query = $this->Atendido_model->updateAtendido($ida, $fecha, $nombre, $cargo, $descripcion, $copia, '');                  
                    }else{               
                        //carga los datos del archivo
                        $upload_data = $this->upload->data();
                        //toma el nombre del archivo
                        $archivo = $upload_data['file_name'];
                        $query = $this->Atendido_model->updateAtendido($ida, $fecha, $nombre, $cargo, $descripcion, $copia, $archivo);                   
                    }
                }else{
                    $query = $this->Atendido_model->updateAtendido($ida, $fecha, $nombre, $cargo, $descripcion, $copia, $nullarchivo);                      
                }
                //sí se inserto los datos manda mensaje     
                if($query == true){
                    $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                    $fec_bit = date('Y-m-d'); //fecha el servidor
                    $hor_bit = date('H:i:s'); //hora el servidor
                    //inserta registros en la bitacora
                    $this->Bitacora_model->insertBitacora($idu,'Se ha modificado oficio'.$nom.'.',$fec_bit,$hor_bit);    
                    $this->session->set_flashdata('Modificado','Usuario creado correctamente');
                    $this->updateAtendido($a);
                }else{
                    $this->session->set_flashdata('No', 'Datos no ingresados');
                    $this->updateAtendido($a);
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['date1'] = $fecha;
                $datos['nombre'] = $nombre;
                $datos['cargo'] = $cargo;
                $datos['descripcion'] = $descripcion;
                $datos['copia'] = $copia;
                $datos['datos'] = $this->Atendido_model->consultaAtendido($ida);
                //envia datos del array a la vista
                $this->load->view('templates/head');
                $this->load->view('actualiza_atendido',$datos); 
                $this->load->view('templates/footer');
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->updateAtendido($a);
        }        
    }
    //función para descargar archivo seguimiento o final
    public function descarga($name)
    {
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //hora del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga de archivo atendido '.$name.'.',$fec_bit,$hor_bit);
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //función paara imprimir atendido pdf
    public function imprimirOficioAtendido($id){
        $ida = base64_decode($id);
        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
        $datos['dato'] = $this->Atendido_model->reportOficioAtendido($ida);
        $html = $this->load->view('atendido_pdf', $datos, true);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Atendido_model->nomenBit($ida); //consulta de nomenclatura por el id del asunto
        $nome = $nom[0]->nomenclatura_aten; //nomenclatura del oficio seguimiento
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga Oficio Atendido en PDF de: '.$nome.'.',$fec_bit,$hor_bit);
        $dompdf->stream("oficio_atendido.pdf", array("Attachment"=>0)); //muestra pdf
        //$dompdf->stream("oficio_atendido.pdf");   //descarga pdf
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
        ->setCellValue('F1', 'NOMBRE');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);
            
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(100);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        
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

        //valida el tipo de consulta para obtener los datos deacuerdo al id del usuario        
        switch ($this->session->userdata('id_tipoUsuario')){
            case '1':
                $datos['datos'] = $this->Atendido_model->searchFechaAtendido($search,$fecha1,$fecha2);
            break;
            case '2':
                $datos['datos'] = $this->Atendido_model->searchFechaAtendido($search,$fecha1,$fecha2);
            break;            
            case '5':
                $datos['datos'] = $this->Atendido_model->searchAtenFI($search,$fecha1,$fecha2,$id);
            break;     
        }   
        foreach($datos as $dato){ 
            $row = count($dato);
            for ($n=2; $n<=$row+1; $n++)
            {      
                //var_dump($datos);
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$n, $dato[$n-2]->nomenclatura_aten)
                ->setCellValue('B'.$n, $dato[$n-2]->fecha_atendido)
                ->setCellValue('C'.$n, $dato[$n-2]->nombre_aten)  
                ->setCellValue('D'.$n, $dato[$n-2]->cargo_aten)
                ->setCellValue('E'.$n, $dato[$n-2]->descripcion)
                ->setCellValue('F'.$n, $dato[$n-2]->nombre." ".$dato[$n-2]->apellidop." ".$dato[$n-2]->apellidom);
            }
        }
        $fec_bit = date('Y-m-d H:i:s'); //fecha actual del servidor
        $hor_bit = date('Y-m-d H:i:s'); //hora actual del servidor        
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga reporte en Excel de la búsqueda '.$search.' oficio atendido con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
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
    //el motivo de este correo 
}