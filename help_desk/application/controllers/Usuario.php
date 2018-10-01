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
    //inserta los datos del usuario
    public function altaUsuario()
    {
        //recibe los datos sino envia mensaje de error 
        if($this->input->post())
        {
            //recibe el usuario 
            $uExist = $this->input->post('user');
            //consulta a la base de datos para validar si existe
            $val = $this->Usuario_model->validaUs($uExist);
            //sí el usuario existe envía mensaje 
            if( $val == true)
            {
                //redirecciona y muestra mensaje usuario existente
                $this->session->set_flashdata('Existe','El Usuario ya existe');
                redirect('nuevoUsuario');
                //sino procede la inserción
            }else{
                //recibe contraseña
                $pass = $this->input->post('password');
                //encripta contraseña
                $passw = $this->encrypt->encode($pass);
                //se llama al modelo para ejecutar la inserción                
                $result = $this->Usuario_model->createUsuario(
                    $name = $this->input->post('name'),
                    $app = $this->input->post('app'),
                    $apm = $this->input->post('apm'),
                    $user = $this->input->post('user'),
                    $pass,
                    $activo = $this->input->post('activo'),
                    $tipoUser = $this->input->post('tipUsuario'),
                    $dependencia = $this->input->post('dependencia'));
                    //sí inserta los registros manda mensaje de creado
                if($result == true){
                    $this->session->set_flashdata('Creado', 'Usuario creado correctamente');
                    redirect('nuevoUsuario');
                    //sino error en la inserción
                }if($result == false){
                    $this->session->set_flashdata('No creado','Error en la inserción');
                    redirect('nuevoUsuario');
                } 
            }            
        }else{
            $this->session->set_flashdata('Error', 'Datos no ingresados');
            redirect('nuevoUsuario');
            }
    }
    public function altaUsuarioVal ()
    {
        $this->form_validation->set_message('required', '%s es obligatorio.');
        //$this->form_validation->set_message('numeric', '%s debe ser numérico.');

        if($this->input->post()) {
            $name = $this->input->post('name');
            $user = $this->input->post('user');
            $pass = $this->input->post('password');
            //Valida que los campos no esten vacios
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('user', 'Usuario', 'required');
            $this->form_validation->set_rules('password', 'Contraseña', 'required');

            //Sí la validación es correcta procede a insertar los datos en la base de datos
            if($this->form_validation->run() == TRUE){
                $this->Usuario_model->createUsuario($name,$user,$pass);
                redirect('generaUsuario');
            }else{
                $data = array();
                $data['name'] = $name;
                $data['user'] = $user;
                $data['password'] = $pass;
                //cargamos el formulario de nuevo
                $tipo ['tipo'] = $this->Usuario_model->tipoUsuario();
                $this->load->view('templates/head');
                $this->load->view('genera_usuario',$data);
                $this->load->view('templates/footer');
            }
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
    //función para modificar datos del usuario
    public function modificaUsuario()
    {
        $i = $this->input->post('id'); 
        if($this->input->post())
        {
            //recibe contraseña
            $pass = $this->input->post('password');
            //encripta contraseña
            //$passw = $this->encrypt->encode($pass);
            //sí el usuario existe envía mensaje
                //manda datos al modelo para la modificación
                $query = $this->Usuario_model->updateUsuario(
                        $id = $this->input->post('id'),
                        $name = $this->input->post('name'),
                        $app = $this->input->post('app'),
                        $apm = $this->input->post('apm'),
                        $activo = $this->input->post('activo'),
                        $user = $this->input->post('user'),
                        $pass,
                        $tipoUser = $this->input->post('tipUsuario'),
                        $dependencia = $this->input->post('dependencia'));  
                    //mensajes
                    if($query == TRUE){
                        $this->session->set_flashdata('Modificado','Datos modificados correctamente');
                        $this->actualizarUsuario($id);
                    }if($query == FALSE){
                        $this->actualizarUsuario($id);
                        $this->session->set_flasdata('No','Datos no modificados');
                    }                  
        }else{
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->actualizarUsuario($i);
        }
            
    }

}