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
            //nuevo número de oficio
            $OExist = $this->input->post('no_oficio');
            //validamos si el nuevo oficio ya esta registrado en la db
            $val = $this->Entrada_model->validaOf($OExist);
            //Sí el oficio existe manda mensaje sino procede el registro
            if($val == TRUE){
                $this->session->set_flashdata('Existente','Número de Oficio existente');
                redirect('nuevaEntrada');
            }else{
                //datos requeridos para subir archivo y ruta a guardar 
                $config['upload_path'] = $this->folder;
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size'] = 1000;
                //carga libreria archivos e inicializa el array config con los datos del archivo
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                //si existe algun error en los datos que contiene config, carga vista-formulario para mostrar mensaje error
                if ( ! $this->upload->do_upload('entrada')){
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('templates/head');
                    $this->load->view('genera_entrada', $error);
                    $this->load->view('templates/footer');
                }else{
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
                        $fecha_r = $this->input->post('fecha_real')
                    );
                    if($query == TRUE)
                    {
                        $this->session->set_flashdata('Creado','Oficio creado');
                        $this->generaEntrada();
                    }else{
                        $this->session->set_flashdata('No creado','Oficio no creado');
                        $this->generaEntrada();
                    }
                }
            }
        }else{
            $this->session->flashdata('Error','Datos no recibidos');
            redirect('nuevaEntrada');
        }    
    }
    //carga la vista para la busqueda  de oficios entrada
    public function busquedaEntrada ()
    {
        $this->load->view('templates/head');
        $this->load->view('busqueda_entrada');
        $this->load->view('templates/footer');
    }
    //arroja el resultado de la busqueda de los oficios
    public function consultaEntrada()
    {
        $search = $this->input->post('busqueda');
        $datos ['datos'] = $this->Entrada_model->searchOficioEntrada($search);
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