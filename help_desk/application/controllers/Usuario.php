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
            //inicia las validaciones por cada campo
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
                    //tomamos los datos del formulario en un array
                    $datos = array();
                    $datos['name'] = $name;
                    $datos['app'] = $app;
                    $datos['apm'] = $apm;
                    $datos['user'] = $user;
                    $datos['password'] = $pass;
                    //consulta el tipo de usuario para mostrar en el formulario
                    $tipo = $this->Usuario_model->tipoUsuario();
                    $datos['tipo'] = $tipo;
                    //consulta  las dependencias para mostrar en el formulario
                    $depen = $this->Usuario_model->getDependencia();
                    $datos['depen'] = $depen;
                    //se envian los datos del formulario a la vista
                    $this->load->view('templates/head');
                    $this->load->view('genera_usuario',$datos);
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
        //var_dump($search);
        $datos['datos'] = $this->Usuario_model->search_usuario($search);
        //$datos['datos'] = $this->Usuario_model->search_usuario($search);        
        $this->load->view('all_usuarios',$datos);    
    }
    //ejemplo de paginacion
    public function ejemplo()
    {
        //$search = $this->input->post('busqueda');
        //numero de registros mostrados
        $config['base_url'] = base_url().'paginacion/';
        $config['total_rows'] = $this->Usuario_model->filas();
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        /*Se personaliza la paginación para que se adapte a bootstrap*/
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['last_link'] = FALSE;
        $config['first_link'] = FALSE;
        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>'; 
        
        $this->pagination->initialize($config);
        $datos['datos'] = $this->Usuario_model->total_paginados($config['per_page'],$config['uri_segment']);
        //$datos['datos'] = $this->Usuario_model->search_usuario($search);
        //var_dump($datos);
        $this->load->view('templates/head');        
        $this->load->view('prueba',$datos);
        $this->load->view('templates/footer');
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
            //sí la vacidación es correcta
            if( $this->form_validation->run() == TRUE)
            {            
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
                //tomamos los datos en un array para emviar a la vista
                $datos=array();
                $datos['name'] = $name;
                $datos['app'] = $app;
                $datos['apm'] = $app;
                $datos['user'] = $user;
                $datos['usuario'] = $this->Usuario_model->muestraUsuario($i);                 
                $datos['tipu'] = $this->Usuario_model->tipoUsuarioId($i);
                $datos['dep'] = $this->Usuario_model->dependenciasId($i);
                //envia los datos al formulario en la vista
                $this->load->view('templates/head');
                $this->load->view('actualiza_usuario',$datos);
                $this->load->view('templates/footer');
            }                  
        }else{
            $this->session->set_flashdata('Error', 'Consultar administrador');
            $this->actualizarUsuario($i);
        }
    } 
}