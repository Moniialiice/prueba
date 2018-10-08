<?php
/**
 * Created by PhpStorm.
 * User: MesaAyuda
 * Date: 21/08/2018
 * Time: 04:54 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

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
        $this->load->library(array('form_validation'));
        $this->load->library('calendar');
        $this->load->library('upload');
        //$this->load->library('curl');
        $this->folder = 'documents/';
    }
    //función carga templates, el formulario para generar oficio con el $id del oficio entrada
    public function index($id)
    {
        //$id = $this->encrypt->decode($enID);
        $datos ['datos'] = $this->Oficio_model->datosEntrada($id);
        $this->load->view('templates/head');
        $this->load->view('genera_oficio',$datos);
        $this->load->view('templates/footer');
    }
    //función recibe los datos del formulario para insertarlo en la base de datos
    public function createOficio()
    {
        //recibe el id de entrada
        $ide = $this->input->post('entrada');
        if($this->input->post()){            
            //los datos son enviados al modelo
            $query = $this->Oficio_model->create_oficio(
            //datos oficio
                    $nomenclatura = $this->input->post('nomenclatura'),
                    $fecha = $this->input->post('fecha'),
                    $asunto = $this->input->post('asunto'),
                    //etiquetas de asunto
                    $colaboracion = $this->input->post('colaboracion'),
                    $amparo = $this->input->post('amparos'),
                    $solicitudes = $this->input->post('solicitudes'),
                    $gestion = $this->input->post('gestion'),
                    $cursos = $this->input->post('cursos'),
                    $juzgados = $this->input->post('juzgados'),
                    $rh = $this->input->post('rh'),
                    $estadistica = $this->input->post('estadistica'),
                    $telefonia = $this->input->post('telefonia'),
                    $ri = $this->input->post('ri'),
                    $boletas = $this->input->post('boletas'),
                    $conocimiento = $this->input->post('conocimiento'),
                    //dirigido a
                    $conase = $this->input->post('conase'),
                    $toluca = $this->input->post('toluca'),
                    $mexico = $this->input->post('mexico'),
                    $zoriente = $this->input->post('zoriente'),
                    $fgeneral = $this->input->post('fgeneral'),
                    $vicefiscalia = $this->input->post('vicefiscalia'),
                    $oficialia = $this->input->post('oficialia'),
                    $informacion = $this->input->post('informacion'),
                    $central = $this->input->post('central'),
                    $servicio = $this->input->post('servicio'),
                    $otrad = $this->input->post('otrad'),
                    //ruta oficio
                    $diligencia = $this->input->post('diligencias'),
                    $personalmente = $this->input->post('personalmente'),
                    $gestionar = $this->input->post('gestionar'),
                    $archivo = $this->input->post('archivo'),
                    $otrar = $this->input->post('otrar'),
                    //informar a
                    $oficina = $this->input->post('oficina'),
                    $peticionario = $this->input->post('peticionario'),
                    $requiriente = $this->input->post('requiriente'),
                    //datos oficio    
                    $termino = $this->input->post('termino'),
                    $observaciones = $this->input->post('observaciones'),
                    $id_entrada = $this->input->post('entrada'),
                    $atencion = $this->input->post('atencion')
                );
                //si los datos son ingresados muestra mensaje
                if ($query) {
                    $this->session->set_flashdata('Creado', 'Oficio creado correctamente');
                    //carga el formulario
                    $this->index($ide);
                }else {
                    //mensaje de error si no inserta en la bas e de datos
                    $this->session->set_flashdata('No', 'Oficio no registrado');
                    $this->index($ide);
                }
        }else{
            $this->session->set_flashdata('Error','Error');
            $this->index($ide);
        }
    }
    //valida los datos para insertar en la base 
    public function createOficioVal()
    {
        $ide = $this->input->post('entrada');
        if($this->input->post())
        {
            //recibimos datos del formulario
            $fecha = $this->input->post('fecha');
            $asunto = $this->input->post('asunto');
            $observaciones = $this->input->post('observaciones');
            //valida los datos del formulario
            $this->form_validation->set_rules('fecha','Fecha','required');
            $this->form_validation->set_rules('asunto','Asunto','required');
            $this->form_validation->set_rules('observaciones', 'Observaciones', 'required');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {
                $query = $this->Oficio_model->createOficio(
                    $fecha = $this->input->post('fecha'),
                    $asunto = $this->input->post('asunto'),
                    $observaciones = $this->inut->post('observaciones')
                );
                //sí la inserción se ejecuta con exito, manda mensaje y carga formulario con los datos ingresados
                if($query==TRUE)
                {
                    $this->session->set_flashdata('Creado','Oficio creado correctamente');
                    $this->actualizarOficio($ide);
                }else{
                    $this->session->set_flashdata('No','Error en la inserción');
                    $this->index($ide);    
                    }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['fecha'] = $fecha;
                $datos['asunto'] = $asunto;
                $datos['observaciones'] = $observaciones;
                $datos['datos'] = $this->Oficio_model->datosEntrada($ide);
                //envia datos del array en la vista
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
        $search = $this->input->post('busqueda');
        $datos['datos'] = $this->Oficio_model->searchOficio($search);
            $this->load->view('templates/head');
            $this->load->view('all_oficio', $datos);
            $this->load->view('templates/footer');     
    }
    //carga formulario de actualización
    public function actualizarOficio($id)
    {
        //consulta los datos del oficio por el id de oficio
        $datos ['datos'] = $this->Oficio_model->report($id);
        //manda datos de la consulta a la vista, donde se valida el  termino para
            $this->load->view('templates/head');
            $this->load->view('consulta_oficio',$datos);
            $this->load->view('templates/footer');    
    }
    //función para descargar archivo seguimiento o final
    public function descarga($name)
    {
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //función de actualizzación dependiendo del termino del Oficio
    public function modificaOficio()
    {
        //recibe id de oficio seguimiento
        $id_oficio = $this->input->post('id_oficio');
        //
        if($this->input->post()){                       
            //valida si archivo opcional existe
            if( ! $this->input->post('opcional') ){
                //datos requeridos para subir archivo y ruta a guardar 
                $config['upload_path'] = $this->folder;
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size'] = 1000;
                //carga libreria archivos e inicializa el array config con los datos del archivo
                $this->load->library('upload',$config);
                $this->upload->initialize($config); 
                //recibe archivo opcional
                $this->upload->do_upload('opcional');
                //carga los datos del archivo
                $upload_data = $this->upload->data();            
                //toma el nombre del archivo opcional
                $arch_opcional = $upload_data['file_name'];
                //recibe archivo final
                $this->upload->do_upload('final');
                //carga datos del archivo final
                $upload_data1 = $this->upload->data();
                //toma el nombre del archivo final
                $arch_final = $upload_data1['file_name'];
                //datos del opficio enviados en el modelo para modificar
                $query = $this->Oficio_model->updateOficio(
                    $observaciones = $this->input->post('observaciones'),
                    $termino = $this->input->post('termino'),
                    $arch_opcional,
                    $arch_final,
                    $id_oficio); 
                if($query){
                    $this->session->set_flashdata('Modificado','Creado Correctamente');
                    $this->actualizarOficio($id_oficio);
                }else{
                    $this->session->set_flashdata('No','No creado');
                    $this->actualizarOficio($id_oficio);
                }                            
            }else{
                //datos requeridos para subir archivoa y ruta a guardar
                $config['upload_path'] = $this->folder;
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size'] = 1000;
                //libreria archivos e inicializa el array config con datos requeridos
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                //recibe archivo final
                $this->upload->do_upload('final');
                //carga datos del archivo final
                $upload_data1 = $this->upload->data();
                //toma el nombre del archivo final
                $arch_final = $upload_data1['file_name'];
                //datos del opficio enviados en el modelo para modificar
                $query = $this->Oficio_model->updateOficio(
                    $observaciones = $this->input->post('observaciones'),
                    $termino = $this->input->post('termino'),
                    $arch_opcional = $this->input->post('opcional'),
                    $arch_final,
                    $id_oficio); 
                if($query){
                    $this->session->set_flashdata('Modificado','Creado Correctamente');
                    $this->actualizarOficio($id_oficio);
                }else{
                    $this->session->set_flashdata('No','No creado');
                    $this->actualizarOficio($id_oficio);
                }
            }                    
        }else{
            //recibe formulario vacio
            $this->session->set_flashdata('Error','datos no recibidos');    
            $this->index($id_oficio);
        }
    }
    //función para craar pdf
    public function imprimirOficio($id)
    {
        $datos['dato'] = $this->Oficio_model->reportOficio($id);
        //var_dump($peticiones);
        $html = $this->load->view('oficio_pdf', $datos, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "oficio_seguimiento." . "pdf";
        //load TCPDF library
        $this->load->library('Pdf');
        //Tamaño de pdf
        //var_dump($data);
        $pdf = new Pdf('L', 'cm', 'Letter', true, 'UTF-8', false);
        $pdf->segundaHoja = false;
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetHeaderMargin(20);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(15);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('FGJEM');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage('P', 'LETTER');
        // salida de HTML contenido a pdf
        $pdf->writeHTML($html, true, false, true, false, '');
        //manda a imprimir al cargar el archivo
        //$pdf->IncludeJS("print();");
        $pdf->Output($pdfFilePath, 'I');
    }

}