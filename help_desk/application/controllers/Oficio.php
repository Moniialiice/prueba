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
        $datos ['datos'] = $this->Oficio_model->datosEntrada($id); //datos de tabla oficio entrada
        $eSeguimiento = $this->Oficio_model->entradaSeguimiento($id); //obtiene id de oficio seguimiento
        //si se ejecuta eSeguimiento 
        if($eSeguimiento){
            $idoficio = $eSeguimiento[0]->id_oficioseg; //id de oficioSeguimiento
            $this->actualizarOficio($idoficio); //carga formulario de actualización
        }else{            
            //carga el vista para nuevo oficio seguimiento
            $this->load->view('templates/head');
            $this->load->view('genera_oficio',$datos);
            $this->load->view('templates/footer');
        }        
    }
    //valida los datos para insertar en la base 
    public function createOficioVal()
    {
        $ide = $this->input->post('entrada');   

        if($this->input->post())
        {
            //carga el tipo de nomenclatura
            $tipoOficio = $this->input->post('tipoOficio');   
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $fecha = $this->input->post('fecha');
            $asunto = $this->input->post('asunto');
            $observaciones = $this->input->post('observaciones');
            $termino = $this->input->post('termino');
            //valida los datos del formulario
            $this->form_validation->set_rules('fecha','Fecha','required');
            $this->form_validation->set_rules('asunto','Asunto','required');
            $this->form_validation->set_rules('observaciones', 'Observaciones', 'required');
            //etiquetad
            $colaboracion = $this->input->post('colaboracion');
            $amparo = $this->input->post('amparos');
            $solicitudes = $this->input->post('solicitudes');
            $gestion = $this->input->post('gestion');
            $cursos = $this->input->post('cursos');
            $juzgados = $this->input->post('juzgados');
            $rh = $this->input->post('rh');
            $estadistica = $this->input->post('estadistica');
            $telefonia = $this->input->post('telefonia');
            $ri = $this->input->post('ri');
            $boletas = $this->input->post('boletas');
            $conocimiento = $this->input->post('conocimiento');
            //dirigido a
            $conase = $this->input->post('conase');
            $toluca = $this->input->post('toluca');
            $mexico = $this->input->post('mexico');
            $zoriente = $this->input->post('zoriente');
            $fgeneral = $this->input->post('fgeneral');
            $vicefiscalia = $this->input->post('vicefiscalia');
            $oficialia = $this->input->post('oficialia');
            $informacion = $this->input->post('informacion');
            $central = $this->input->post('central');
            $servicio = $this->input->post('servicio');
            $otrad = $this->input->post('otrad');
            //ruta oficio
            $diligencia = $this->input->post('diligencias');
            $personalmente = $this->input->post('personalmente');
            $gestionar = $this->input->post('gestionar');
            $archivo = $this->input->post('archivo');
            $otrar = $this->input->post('otrar');
            //informar a
            $oficina = $this->input->post('oficina');
            $peticionario = $this->input->post('peticionario');
            $requiriente = $this->input->post('requiriente');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                $year = date('Y'); //carga el año en curso del servidor     
                //dependiendo del tipo de oficio carga la nomeclatura   
                if( $tipoOficio == '400LIA000' ){
                    $LID = $this->Oficio_model->lastID(); //consulta el id del ultimo resgistro de oficio seguimiento
                    $name = 'MAX(id_oficioseg)'; // nombre de la columna que devuelve consulta
                    $LIDO = $LID[0]->$name; //se obtiene sólo el id deñ ultimo registro
                    $last = $this->Oficio_model->lastNom($LIDO); //consulta nomenclatura del ultimo registro 
                    $ext = $last[0]->nomenclatura; //toma campo nomenclatura          
                    $nom = explode("/",$ext); //corta nomenclatura en cada diagonal
                    $num = $nom[1]; //número consecutivo de la nomenclatura
                    //$consecutivo = 0001; //si es nuevo folio comentar la linea anterior y posterior dar de alta oficio seguimiento 
                    $consecutivo = $num + 1;
                    //$this->generate_numbers($num,'1','4');  
                    $nomenclatura = '400LIA000/'.$consecutivo.'/'.$year;                               
                }else{
                    //oficio secretariado 
                    $LID = $this->Oficio_model->lastID(); //consulta el id del ultimo registro del oficio seguimiento
                    $name = 'MAX(id_oficioseg)'; //nombre de la columna que devuelve consulta
                    $LIDO = $LID[0]->$name; //se obtiene sólo el id del ultimo registro 
                    $last = $this->Oficio_model->lastNom($LIDO); //ultima nomenclatura en la tabla cordinador
                    $ext = $last[0]->nomenclatura; //toma campo nomenclatura          
                    $nom = explode("/",$ext); //corta nomenclatura en cada diagonal
                    $num = $nom[1]; //número consecutivo de la nomenclatura
                    //$consecutivo = 0000; //si es nuevo folio comentar la linea anterior y posterior dar de alta oficio seguimiento 
                    $consecutivo = $num + 1;
                    //$this->generate_numbers($num,'1','4');  
                    $nomenclatura = '400LI0010/'.$consecutivo.'/'.$year;
                }
                //formato de fecha
                $date = array();
                $date = $fecha;
                $ext = explode('/',$date);
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0]; 
                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $termino, $observaciones, $atencion, $asunto, $ide);
                
                if ($insertOficio == true){                    
                    //id oficio seguimiento 
                    $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                    $ido = $idoficio[0]->id_oficioseg;
                    //una vez insertado muestra datos en actualizar oficio
                    $this->actualizarOficio($ido);
                }else{
                    $this->session->set_flashdata('Error','Consulta administrador');                    
                    $this->index($ide);
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['fecha'] = $fecha;
                $datos['asunto'] = $asunto;
                $datos['observaciones'] = $observaciones;
                $datos['datos'] = $this->Oficio_model->datosEntrada($ide);
                //envia datos del array a la vista
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

    //ejemplo consecutivo
    function generate_numbers($start, $count, $digits) 
    {
        $result = array();
        for ($n = $start; $n < $start + $count; $n++) {
           $result[] = str_pad($n, $digits, "0", STR_PAD_LEFT);
        }
        return $result;
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
        //recibe datos del formulario
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('datepicker');
        $date2 = $this->input->post('datepickerf');
        //código de la paginación
        //datos de la consulta oficio  
        $datos['datos'] = $this->Oficio_model->searchDate($search,$date1,$date2);
        $this->load->view('all_oficio', $datos);
    }
    //carga formulario de actualización
    public function actualizarOficio($id)
    {
        //consulta los datos del oficio por el id de oficio
        $datos ['datos'] = $this->Oficio_model->report($id);
        //manda datos de la consulta a la vista para mostrar el formulario correspondiente 
            $this->load->view('templates/head');
            $this->load->view('consulta_oficio',$datos); //formulario para visualizar oficio e imprimir
            $this->load->view('templates/footer');    
    }
    //función para descargar archivo seguimiento o final
    public function descarga($name)
    {
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //función de actualización dependiendo del termino del Oficio
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
        //$pdf->IncludeJS("print();"); D
        $pdf->Output($pdfFilePath, 'I');
    }

}