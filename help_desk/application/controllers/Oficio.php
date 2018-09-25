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
        //si el termino es 0 carga formulario sólo para visualizar e imprimir oficio
        //if ($datos->termino == "48 hrs" ) 
        //{
            $this->load->view('templates/head');
            $this->load->view('actualiza_oficio',$datos);
            $this->load->view('templates/footer');
        /*carga formulario para actualizar
        }else{
            $this->load->view('templates/head');
            $this->load->view('actualiza_oficio',$datos);
            $this->load->view('templates/footer');
        }*/
    }
    //función para descargar archivo seguimiento o final
    public function descarga()
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
            //datos requeridos para subir archivo y ruta a guardar 
            $config['upload_path'] = $this->folder;
            $config['allowed_types'] = 'jpg|png|pdf';
            $config['max_size'] = 1000;
            //carga libreria archivos e inicializa el array config con los datos del archivo
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            //si archivo final esta vacio o no cumple con los datos requeridos manda mensaje de error
            if ( ! $this->upload->do_upload('final')){
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('templates/head');
                $this->load->view('index',$ide);
                $this->load->view('templates/footer');
            }else{
                //carga los datos del archivo
                $upload_data = $this->upload->data();
                //toma el nombre del archivo final
                $arch_final = $upload_data['file_name'];
                //recibe archivo opcional
                $this->upload->do_upload('opcional');
                //toma el nombre del archivo opcional
                $arch_opcional = $upload_data['file_name'];            
                $add = $this->Oficio_model->updateOficio(
                    $nomenclatura = $this->input->post('nomenclatura'),
                    $asunto = $this->input->post('asunto'),
                    $fecha = $this->input->post('fecha'),
                    //etiqueta de asuntos
                    $colaboracion = $this->input->post('colaboracion'),
                    $amparo = $this->input->post('amparos'),
                    $solicitudes = $this->input->post('solicitudes'),
                    $gestion = $this->gestion->post('gestion'),
                    $cursos = $this->cursos->post('cursos'),
                    $juzgados = $this->input->post('juzgados'),
                    $rh = $this->input->post('rh'),
                    $telefonia = $this->input->post('telefonia'),
                    $estadistica = $this->input->post('estadistica'),
                    $ri = $this->input->post->post('ri'),
                    $boletas = $this->input->post('boletas'),
                    $conocimiento = $this->input->post('conocimiento'),
                    //dirigido a
                    $conase = $this->input->post('conase'),
                    $toluca = $this->input->post('toluca'),
                    $mexico = $this->input->post('mexico'),
                    $zoriente = $this->input->post('zoriente'),
                    $fgeneral = $this->input->post('fgeneral'),
                    $vicefiscalia = $this->input->post('vicefiscalia'),
                    $informacion = $this->input->post('informacion'),
                    $central = $this->input->post('central'),
                    $servicio = $this->input->post('servicio'),
                    $otrad = $this->input->post('otrad'),
                    //ruta de oficio
                    $diligencias = $this->input->post('diligencias'),
                    $personalmente = $this->input->post('personalmente'),
                    $gestionar = $this->input->post('gestionar'),
                    $archivo = $this->input->post('archivo'),
                    $otra = $this->input->post('otra'),
                    //informar
                    $oficna = $this->input->post('oficina'),
                    $peticiones = $this->input->post('peticiones'),
                    $requiere = $this->input->post('requiere'),
                    //
                    $termino = $this->input->post('termino'),
                    $observaciones = $this->input->post('observaciones'),
                    $arc_opcional,
                    $arch_final,
                    $id_entrada = $this->input->post('entrada')
                ); 
                if($add){
                    $this->session->set_flashdata('Corecto','Creado Correctamente');
                    $this->actualizarOficio($id_oficio);
                }else{
                    $this->session->set_flashdata('Incorrecto','No creado');
                    $this->actualizarOficio($id_oficio);
                } 
            }           
        }else{
            //recibe formulario vacio
            $this->session->set_flashdata('error','datos no recibidos');    
            $this->index($ide);
        }
    }
    //función para craar pdf
    public function imprimirOficio($id)
    {
        $datos['dato'] = $this->oficio_model->reportOficio($id);
        //var_dump($peticiones);
        $html = $this->load->view('templates/info_pdf.php', $datos, true);
        //this the the PDF filename that user will get to download
        $pdfFilePath = "orden_servicio_." . "pdf";
        //load TCPDF library
        $this->load->library('Pdf');
        //Tamaño de pdf
        //var_dump($data);
        $pdf = new Pdf('L', 'cm', 'Letter', true, 'UTF-8', false);
        $pdf->segundaHoja = true;
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