<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 22/08/2018
 * Time: 04:05 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $this->load->model('Bitacora_model');
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
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $activo = $this->input->post('activo');
            $tipoUser = $this->input->post('tipUsuario');
            $dependencia = $this->input->post('dependencia');
            //inicia las validaciones por cada campo
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('app', 'Apellido paterno', 'required');
            $this->form_validation->set_rules('apm', 'Apellido materno', 'required');
            //verifica si el usuario existe en la base de datos is_unique[tabla.columna]
            $this->form_validation->set_rules('email', 'Correo', 'required|is_unique[usuario.correo]');
            //verifica la confirmación de contraseña coincida con la contraseña 
            $this->form_validation->set_rules('password', 'Contraseña', 'min_length[8]|max_length[12]|required|matches[passwordr]');
            $this->form_validation->set_rules('passwordr', 'Repetir contraseña', 'required');
                //Sí la validación es correcta procede a insertar los datos en la base de datos
                if($this->form_validation->run() == TRUE){
                    $query = $this->Usuario_model->createUsuario($name, $app, $apm, $email, $pass, $activo, $tipoUser, $dependencia);
                    //sí se inserto los datos manda mensaje     
                    if($query == true){    
                        $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                        $fec_bit = date('Y-m-d'); //fecha el servidor
                        $hor_bit = date('H:i:s'); //hora el servidor
                        //inserta registros en la bitacora
                        $this->Bitacora_model->insertBitacora($idu,'Se ha creado usuario '.$email.'.',$fec_bit,$hor_bit);
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
                    $datos['email'] = $email;
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
        $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
        $fec_bit = date('Y-m-d'); //fecha el servidor
        $hor_bit = date('H:i:s'); //hora el servidor
        //inserta registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Búsqueda usuario '.$search.'.',$fec_bit,$hor_bit);
        //var_dump($search);
        $datos['datos'] = $this->Usuario_model->search_usuario($search);
        $this->load->view('all_usuarios',$datos);    
    }
    //ejemplo de paginacion
    public function ejemplo()
    {
        $search = $this->input->post('busqueda');
        $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
        $fec_bit = date('Y-m-d'); //fecha el servidor
        $hor_bit = date('H:i:s'); //hora el servidor
        //inserta registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Búsqueda usuario '.$search.'.',$fec_bit,$hor_bit);
        $pages = 2; //Número de registros mostrados por páginas
        $config['base_url'] = base_url() . 'muestraUsuario/'; // parametro base de la aplicación, si tenemos un .htaccess nos evitamos el index.php
        $config['total_rows'] = $this->Usuario_model->filas($search); //calcula el número de filas
        $config['per_page'] = $pages; //Número de registros mostrados por páginas
        $config['num_links'] = 200; //Número de links mostrados en la paginación
        $config['first_link'] = 'Primera'; //primer link
        $config['last_link'] = ' Última'; //último link
        $config['next_link'] = ' Siguiente '; //siguiente link
        $config['prev_link'] = ' Anterior '; //anterior link
        $config['full_tag_open'] = '<div id="paginacion" class="pagination">'; //el div que debemos maquetar si queremos
        $config['full_tag_close'] = '</div>'; //el cierre del div de la paginación
        $this->pagination->initialize($config); //inicializamos la paginación
        //el array con los datos a paginar ya preparados
        $datos["datos"] = $this->Usuario_model->total_paginados($search, $config['per_page'], $this->uri->segment(3));
        //cargamos la vista y el array data
        $this->load->view('prueba', $datos);
    }
    //carga vista con los  datos del usuario para modificar además de los tipos de usuario
    public function actualizarUsuario($id)
    { 
        $idu = base64_decode($id);
        $datos ['usuario'] = $this->Usuario_model->muestraUsuario($idu);                 
        $datos ['tipu'] = $this->Usuario_model->tipoUsuarioId($idu);
        $datos ['dep'] = $this->Usuario_model->dependenciasId($idu);
        $this->load->view('templates/head');
        $this->load->view('actualiza_usuario',$datos);
        $this->load->view('templates/footer');
    }
    //actualizar usuario con validaciones
    public function modificaUsuarioVal()
    {
        //recibe el id del usuario
        $i = $this->input->post('id');
        $u = base64_encode($i);
        if($this->input->post())
        {
            //recibe campos de formulario
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $app = $this->input->post('app');
            $apm = $this->input->post('apm');
            $activo = $this->input->post('activo');
            $email = $this->input->post('email');
            $pass = $this->input->post('password');
            $passn = $this->input->post('newps');
            $tipoUser = $this->input->post('tipUsuario');
            $dependencia = $this->input->post('dependencia');
            //formato para validar los datos del formulario
            $this->form_validation->set_rules('name', 'Nombre', 'required');
            $this->form_validation->set_rules('app', 'Apellido paterno', 'required');
            $this->form_validation->set_rules('apm', 'Apellido materno', 'required');
            $this->form_validation->set_rules('email', 'Correo', 'required');
            //sí la vacidación es correcta
            if( $this->form_validation->run() == TRUE)
            {            
                //si nueva contraseña es vacio
                if( !$this->input->post('newps'))
                {
                    //Sí la validación es correcta procede a insertar los datos en la base de datos
                    if($this->form_validation->run() == TRUE){
                        $query = $this->Usuario_model->updateUsuario($i, $name, $app, $apm, $activo, $email, $pass, $tipoUser, $dependencia);  
                        //sí se inserto los datos manda mensaje     
                        if($query == true){
                            $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                            $fec_bit = date('Y-m-d'); //fecha el servidor
                            $hor_bit = date('H:i:s'); //hora el servidor
                            //inserta registros en la bitacora
                            $this->Bitacora_model->insertBitacora($idu,'Se ha modificado usuario '.$email.'.',$fec_bit,$hor_bit);    
                            $this->session->set_flashdata('Modificado','Usuario creado correctamente');
                            $this->actualizarUsuario($u);
                        }else{
                            $this->session->set_flashdata('No', 'Datos no ingresados');
                            $this->actualizarUsuario($u);
                        }
                    }else{
                        $this->actualizarUsuario($u);
                    }
                //si es nueva contraseña procede a validar    
                }else{
                    //verifica la confirmación de contraseña coincida con la contraseña 
                    $this->form_validation->set_rules('newps', 'Contraseña', 'min_length[8]|max_length[12]|required|matches[newpsr]');
                    $this->form_validation->set_rules('newpsr', 'Repetir contraseña', 'required');
                    //Sí la validación es correcta procede a insertar los datos en la base de datos
                    if($this->form_validation->run() == TRUE){
                        $p = base64_encode($passn);
                        $query = $this->Usuario_model->updateUsuario($i, $name, $app, $apm, $activo, $email, $p, $tipoUser, $dependencia);  
                        //sí se inserto los datos manda mensaje     
                        if($query == true){
                            $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                            $fec_bit = date('Y-m-d'); //fecha el servidor
                            $hor_bit = date('H:i:s'); //fecha el servidor
                            //inserta registros en la bitacora
                            $this->Bitacora_model->insertBitacora($idu,'Se ha modificado usuario '.$email.'.',$fec_bit,$hor_bit);    
                            $this->session->set_flashdata('Modificado','Usuario creado correctamente');
                            $this->actualizarUsuario($u);
                        }else{
                            $this->session->set_flashdata('No', 'Datos no ingresados');
                            $this->actualizarUsuario($u);
                        }
                    }else{
                        $this->actualizarUsuario($idu);
                    }
                }    
            }else{
                //tomamos los datos en un array para enviar a la vista
                $datos=array();
                $datos['name'] = $name;
                $datos['app'] = $app;
                $datos['apm'] = $app;
                $datos['email'] = $email;
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
            $this->actualizarUsuario($idu);
        }
    }
    //muestra datos para modificar y actualizar contraseña
    public function perfilUsuario($id){
        $u = base64_decode($id);
        //consulta los datos de usuario 
        $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
        $fec_bit = date('Y-m-d'); //fecha el servidor
        $hor_bit = date('H:i:s'); //fecha el servidor
        //inserta registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Consultó su perfil.',$fec_bit,$hor_bit);
        $datos['usuario'] = $this->Usuario_model->muestraUsuario($u);                 
        $this->load->view('templates/head');
        $this->load->view('perfil',$datos);
        $this->load->view('templates/footer');
    }
    //modifica las contraseñas del usuario
    public function cambiarpass(){
        //recibe el id del usuario
        $i = $this->input->post('id');
        $u = base64_encode($i);
        if($this->input->post())
        {
            //recibe campos de formulario
            $id = $this->input->post('id');
            $pass = $this->input->post('newps');
            $passn = $this->input->post('newpsr');
            //formato para validar los datos del formulario      
            //verifica la confirmación de contraseña coincida con la contraseña 
            $this->form_validation->set_rules('newps', 'Contraseña', 'min_length[8]|max_length[12]|required|matches[newpsr]');
            $this->form_validation->set_rules('newpsr', 'Repetir contraseña', 'required');
            //Sí la validación es correcta procede a insertar los datos en la base de datos
            if($this->form_validation->run() == TRUE){
                $query = $this->Usuario_model->updatePassword($passn,$id);  
                //sí se inserto los datos manda mensaje     
                if($query == true){
                    $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                    $fec_bit = date('Y-m-d'); //fecha el servidor
                    $hor_bit = date('H:i:s'); //fecha el servidor
                    //inserta registros en la bitacora
                    $this->Bitacora_model->insertBitacora($idu,'Cambió su contraseña.',$fec_bit,$hor_bit);    
                    $this->session->set_flashdata('Modificado','Contraseña actualizada correctamente');
                    $this->perfilUsuario($u);
                }else{
                    $this->session->set_flashdata('No', 'Datos no ingresados');
                    $this->perfilUsuario($u);
                }      
            }else{
                //tomamos los datos en un array para emviar a la vista
                $datos=array();
                $datos['usuario'] = $this->Usuario_model->muestraUsuario($i);                 
                //envia los datos al formulario en la vista
                $this->load->view('templates/head');
                $this->load->view('perfil',$datos);
                $this->load->view('templates/footer');
            }                  
        }else{
            $this->session->set_flashdata('Error', 'Consultar administrador');
            $this->actualizarUsuario($i);
        }
    }
    //función para generar reportes de excel 
    //ejemplo de excel
    public function reportExcelUs()
    {
        $search = $this->input->post('busqueda');
        //creamos objeto de spreadsheet 
        $spreadsheet = new Spreadsheet();
        //agrega columnas de encabezado
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'IDENTIFICADOR')
        ->setCellValue('B1', 'NOMBRE')
        ->setCellValue('C1', 'CORREO')
        ->setCellValue('D1', 'ACTIVO');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($cell_st);                
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(40);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(30);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        //consulta datos en el modelo usuario
        $datos['datos'] = $this->Usuario_model->search_usuario($search);
        foreach ($datos as $dato) {            
            $row = count($dato);
            for ($n=2; $n<=$row+1; $n++){
                if($dato[$n-2]->activo == 1){ $activo = 'activo';}else{$activo = 'Inactivo';}
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$n, $dato[$n-2]->id_usuario)
                ->setCellValue('B'.$n, $dato[$n-2]->nombre." ".$dato[$n-2]->apellidop." ".$dato[$n-2]->apellidom)
                ->setCellValue('C'.$n, $dato[$n-2]->correo)
                ->setCellValue('D'.$n, $activo);
            }
        }
        $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
        $fec_bit = date('Y-m-d'); //fecha el servidor
        $hor_bit = date('H:i:s'); //hora el servidor
        //inserta registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga archivo Excel de usuario '.$search.'.',$fec_bit,$hor_bit);       
        //se crea objeto para guardar archivo xlsx
        $writer = new Xlsx($spreadsheet);
        //nombre del archivo a descargar
        $filename = 'excel_usuarios';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //linea que descarga el archivo
        $writer->save('php://output');    
    }  
}