<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		 parent::__construct();

		 $this->load->library('pagination');
		 $this->load->helper('url');
		 $this->load->helper('form');
		 $this->load->library('session');
		 $this->load->library('encrypt');
		 $this->load->model('Usuario_model');
		 $this->load->library('form_validation');
		 //$this->load->library('curl');
	}
    //carga login del sistema
	public function index()
	{
		$data = array();
		$this->load->view('templates/head1');
		$this->load->view('login',$data);
		$this->load->view('templates/footer1');
	}
	//función recibe datos del formulario, valida para iniciar sesion
    public function validaDatos()
    {
        if($this->input->post())
        {
            $user = $this->input->post('username');
            $pass = $this->input->post('password');           

            //Validamos que los campos no esten vacios con la libreria
            $this->form_validation->set_rules('username', 'Usuario', 'required');
            $this->form_validation->set_rules('password', 'Contraseña', 'required');
            //Sino estan vacios los campos, se consulta los datos del usuario
            if ($this->form_validation->run() == TRUE)
            {
                $query = $this->Usuario_model->getDatos($user,$pass);
                //Sí se ejecuta con exito la consulta se almacenan los datos en un array
                if ($query) {
                    $data_user = array(
                        'id_usuario' => $query->id_usuario,
                        'usuario' => $query->usuario,
                        'id_tipoUsuario' => $query->id_tipoUsuario,
                        'activo' => $query->activo,
                        'correcto' => TRUE
                    );
                    //los datos del usuario se almacenan en un array en la función set_userdata de libreria session
                    $this->session->set_userdata($data_user);
                    //carga la función inicio, ingresando al sistema
                    redirect('index');
                }else {
                    //si usuario esta inactivo muestra mensaje
                    if($this->session->userdata('activo') == 0){
                        $this->session->set_flashdata('Activo', 'Consultar administrador');
                        redirect('home');
                    }else{
                        //si los datos son incorrectos muestra mensaje
                        $this->session->set_flashdata('Error', 'Verificar datos');
                        redirect('home');
                    }
                }
            } else {
                redirect('home');
            }
        }else{
            redirect('home');
        }
    }
    //si los datos son correctos accesa al sistema
    public function inicio()
    {
        //si la seesión es correcta carga las vistas del inicio del sistema
	    if($this->session->userdata('correcto')) {
	        $id = $this->session->userdata('id_usuario'); //carga el id del usuario de las sesiones
	        //carga el modelo para consultar los datos del usuario mediante el id
	        $data ['data'] = $this->Usuario_model->muestraUsuario($id);
	        //carga las vistas además de los datos del usuario
            $this->load->view('templates/head');
            $this->load->view('inicio',$data); //datos de usuario $data
            $this->load->view('templates/footer');
        }else{
            //redirecciona al login
	        redirect('Home');
	    }

    }
    //función para cerrar sesión
    public function cerrarSesion(){
        $user_data = array(
            'correcto' => FALSE
        );
        $this->session->set_userdata($user_data);
        $this->session->sess_destroy();
        //
        redirect('home');
    }
}
