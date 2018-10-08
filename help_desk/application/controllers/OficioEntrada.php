<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 28/08/2018
 * Time: 01:41 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->folder = 'document/';
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
            $peticion = $this->input->post('peticion');
            $fecha = $this->input->post('fecha');
            $fecha_real = $this->input->post('fecha_real');
            //valida los datos del formulario
            $this->form_validation->set_rules('no_oficio', 'Oficio', 'required|is_unique[oficio_entrada.no_oficioEntrada]'); 
            $this->form_validation->set_rules('firma', 'Firma Origen', 'required');
            $this->form_validation->set_rules('peticion', ' Peticion', 'required');
            $this->form_validation->set_rules('fecha', 'Fecha', 'required');
            $this->form_validation->set_rules('fecha_real', 'Fecha Real', 'required');            
            //valida carga de archivo, si esta vacio manda mensaje
            if( ! $this->upload->do_upload('entrada')){
                $this->form_validation->set_rules('entrada','Archivo','required');
            } 
            //si existe algun error en los datos que contiene config, carga vista-formulario para mostrar mensaje error al igual que las validaciones
            if ($this->form_validation->run()==TRUE)
            {
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
                    $arch_entrada = $upload_data['file_name'];
                    //envia datos al modelo
                    $query = $this->Entrada_model->createOficio(
                    $no_oficio = $this->input->post('no_oficio'),
                    $firma = $this->input->post('firma'),
                    $peticion = $this->input->post('peticion'),
                    $arch_entrada,
                    $id_usuario = $this->input->post('id'),
                    $fecha = $this->input->post('fecha'),
                    $fecha_real = $this->input->post('fecha_real')
                    );
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
                $datos['peticion'] = $peticion;
                $datos['fecha'] = $fecha;
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
        $this->load->view('prueba');
        $this->load->view('templates/footer');
    }
    //arroja el resultado de la busqueda de los oficios
    public function consultaEntrada()
    {
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $datos ['datos'] = $this->Entrada_model->searchFecha($search,$date1,$date2);
        $this->load->view('templates/head');
        $this->load->view('all_entrada',$datos);
        $this->load->view('templates/footer');
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
}