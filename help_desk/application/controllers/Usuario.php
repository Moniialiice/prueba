<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 22/08/2018
 * Time: 04:05 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pagination');
        $this->load->helper(array('url','form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Usuario_model');
        $this->load->library('form_validation');
    }
    //carga el formulario de alta usuario 
    public function generaUsuario()
    {
        //consulta el tipo de usuario para mostrar en el formulario
        $tipo = $this->Usuario_model->tipoUsuario();
        $datos ['tipo'] = $tipo;
        //consulta  las dependencias para mostrar en el formulario
        $depen = $this->Usuario_model->getDependencia();
        $datos ['depen'] = $depen;
        //carga las vistas y los datos de las consultas anteriores
        $this->load->view('templates/head');
        $this->load->view('genera_usuario',$datos);
        $this->load->view('templates/footer');
    }
    //inserta nuevo usuario con validaciones
    public function altaUsuarioVal()
    {
        if($this->input->post())
        {   
            //recibe datos de formulario
            $name = $this->input->post('name');
            $app = $this->input->post('app');
            $apm = $this->input->post('apm');
            $user = $this->input->post('user');
            $pass = $this->input->post('password');
            
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('app', 'Apellido paterno', 'required');
            $this->form_validation->set_rules('apm', 'Apellido materno', 'required');
            //verifica si el usuario existe en la base de datos is_unique[tabla.columna]
            $this->form_validation->set_rules('user', 'Usuario', 'required|is_unique[usuario.usuario]');
            //verifica la confirmación de contraseña coincida con la contraseña 
            $this->form_validation->set_rules('password', 'Contraseña', 'required|matches[passwordr]');
            $this->form_validation->set_rules('passwordr', 'Repetir contraseña', 'required');

                //Sí la validación es correcta procede a insertar los datos en la base de datos
                if($this->form_validation->run() == TRUE){
                    $query = $this->Usuario_model->createUsuario(
                        $name = $this->input->post('name'),
                        $app = $this->input->post('app'),
                        $apm = $this->input->post('apm'),
                        $user = $this->input->post('user'),
                        $pass = $this->iput->post('password'),
                        $passr = $this->iput->post('passwordr'),
                        $activo = $this->input->post('activo'),
                        $tipoUser = $this->input->post('tipUsuario'),
                        $dependencia = $this->input->post('dependencia'));
                    //sí se inserto los datos manda mensaje     
                    if($query == true){    
                        $this->session->set_flashdata('Creado','Usuario creado correctamente');
                        redirect('nuevoUsuario');
                    }else{
                        $this->session->set_flashdata('No', 'Datos no ingresados');
                        redirect('nuevoUsuario');
                    }
                }else{
                    $data = array();
                    $data['name'] = $name;
                    $data['app'] = $app;
                    $data['apm'] = $apm;
                    $data['user'] = $user;
                    $data['password'] = $pass;
                    //consulta el tipo de usuario para mostrar en el formulario
                    $tipo = $this->Usuario_model->tipoUsuario();
                    $data ['tipo'] = $tipo;
                    //consulta  las dependencias para mostrar en el formulario
                    $depen = $this->Usuario_model->getDependencia();
                    $data ['depen'] = $depen;
                    $this->load->view('templates/head');
                    $this->load->view('genera_usuario',$data);
                    $this->load->view('templates/footer');
                }
        }else{
            $this->session->flashdata('Error','Consultar administrador');
            }
    }
    //carga vista de busqueda de usuario
    public function busquedaUsuario()
    {
        $this->load->view('templates/head');
        $this->load->view('busqueda_usuario');
        $this->load->view('templates/footer');
    }
    //consulta los usuarios y muestra en la vista
    public function consultaUsuario()
    {
        $search = $this->input->post('busqueda');
        $datos['datos'] = $this->Usuario_model->search_usuario($search);
        $this->load->view('all_usuarios',$datos);
    }
    //carga vista con los  datos del usuario para modificar además de los tipos de usuario
    public function actualizarUsuario($id)
    { 
        $datos ['usuario'] = $this->Usuario_model->muestraUsuario($id);                 
        $datos ['tipu'] = $this->Usuario_model->tipoUsuarioId($id);
        $datos ['dep'] = $this->Usuario_model->dependenciasId($id);
        $this->load->view('templates/head');
        $this->load->view('actualiza_usuario',$datos);
        $this->load->view('templates/footer');
    }
    //actualizar usuario con validaciones
    public function modificaUsuarioVal()
    {
        //mensaje de error de la validación
        $this->form_validation->set_message('required', '%s es obligatorio.');
        //recibe el id del usuario
        $i = $this->input->post('id');
        if($this->input->post())
        {
            //recibe campos de formulario
            $name = $this->input->post('name');
            $app = $this->input->post('app');
            $apm = $this->input->post('apm');
            $user = $this->input->post('user');
            //formato para validar los datos del formulario
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('app', 'Apellido paterno', 'required');
            $this->form_validation->set_rules('apm', 'Apellido materno', 'required');
            $this->form_validation->set_rules('user', 'Usuario', 'required');
            //si nueva contraseña es vacio
            if( !$this->input->post('newps'))
            {
                //Sí la validación es correcta procede a insertar los datos en la base de datos
                if($this->form_validation->run() == TRUE){
                    $query = $this->Usuario_model->updateUsuario(
                        $id = $this->input->post('id'),
                        $name = $this->input->post('name'),
                        $app = $this->input->post('app'),
                        $apm = $this->input->post('apm'),
                        $activo = $this->input->post('activo'),
                        $user = $this->input->post('user'),
                        $pass = $this->input->post('password'),
                        $tipoUser = $this->input->post('tipUsuario'),
                        $dependencia = $this->input->post('dependencia'));  
                    //sí se inserto los datos manda mensaje     
                    if($query == true){    
                        $this->session->set_flashdata('Modificado','Usuario creado correctamente');
                        $this->actualizarUsuario($i);
                    }else{
                        $this->session->set_flashdata('No', 'Datos no ingresados');
                        $this->actualizarUsuario($i);
                    }
                }else{
                    $this->actualizarUsuario($i);
                }
            //si es nueva contraseña procede a validar    
            }else{
                //verifica la confirmación de contraseña coincida con la contraseña 
                $this->form_validation->set_rules('newps', 'Contraseña', 'required|matches[newpsr]');
                $this->form_validation->set_rules('newpsr', 'Repetir contraseña', 'required');
                //Sí la validación es correcta procede a insertar los datos en la base de datos
                if($this->form_validation->run() == TRUE){
                    $query = $this->Usuario_model->updateUsuario(
                        $id = $this->input->post('id'),
                        $name = $this->input->post('name'),
                        $app = $this->input->post('app'),
                        $apm = $this->input->post('apm'),
                        $activo = $this->input->post('activo'),
                        $user = $this->input->post('user'),
                        $pass = $this->input->post('newps'),
                        $tipoUser = $this->input->post('tipUsuario'),
                        $dependencia = $this->input->post('dependencia'));  
                    //sí se inserto los datos manda mensaje     
                    if($query == true){    
                        $this->session->set_flashdata('Modificado','Usuario creado correctamente');
                        $this->actualizarUsuario($i);
                    }else{
                        $this->session->set_flashdata('No', 'Datos no ingresados');
                        $this->actualizarUsuario($i);
                    }
                }else{
                    $this->actualizarUsuario($i);
                }
            }       
        }else{
            $this->session->set_flashdata('Error', 'Consultar administrador');
            $this->actualizarUsuario($i);
        }
    } 
}