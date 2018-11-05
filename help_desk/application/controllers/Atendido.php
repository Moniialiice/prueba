<?php

defined('BASEPATH') OR exit('No direct script access allowed');

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
            $fecha = $this->input->post('fecha');
            $asunto = $this->input->post('asunto');
            $nombre = $this->input->post('nombre');
            $cargo = $this->input->post('cargo');
            $descripcion = $this->input->post('descripcion');
            $copia = $this->input->post('copia');
            //valida los datos del formulario
            $this->form_validation->set_rules('fecha','Fecha','required');
            $this->form_validation->set_rules('asunto','Asunto','required');
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('cargo','Cargo','required');
            $this->form_validation->set_rules('descripcion','Descripción','required');
            $this->form_validation->set_rules('copia','Con copia a', 'required');
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
                    $this->mostrarAtendido($segui);
                }else{
                    $this->session->set_flashdata('Error','Consulta administrador');                    
                    $this->index($segui);
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['fecha'] = $fecha;
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
        //recibe datos del formulario
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('datepicker');
        $date2 = $this->input->post('datepickerf');
        //código de la paginación
        //datos de la consulta oficio  
        $datos['datos'] = $this->Atendido_model->searchfechaAtendido($search,$date1,$date2);
        $this->load->view('all_atendido', $datos);
    }
    //función para descargar archivo seguimiento o final
    public function descarga($name)
    {
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
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
}