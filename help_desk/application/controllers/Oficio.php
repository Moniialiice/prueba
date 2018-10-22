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
    //valida los datos para insertar en la base 
    public function createOficioVal()
    {
        $ide = $this->input->post('entrada');   

        if($this->input->post())
        {
            
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
                $this->consecutivo();


                //$query = $this->Oficio_model->datosEntrada($ide);
                //inserta en asunto etiquetas
                //$etiquetas = $this->Oficio_model->insert_etiquetas($colaboracion,$amparo,$solicitudes,$gestion,$cursos,$juzgados,$rh,$estadistica,$telefonia,$ri,$boletas,$conocimiento);
                //var_dump($etiquetas[0]);
                //inserta dirigido a
                // $dirigido = $this->Oficio_model->insert_destinatario($conase,$toluca,$mexico,$zoriente,$fgeneral,$vicefiscalia,$oficialia,$informacion,$central,$servicio,$otrad);
                
                //inserta en ruta oficio
               //$ruta = $this->Oficio_model->insert_ruta($diligencia,$personalmente,$gestionar,$archivo,$otrar);                
                
                //insertar informar 
                //$informar = $this->Oficio_model->insert_informar($oficina,$peticionario,$requiriente);
                //var_dump($informar);
                //var_dump($informar[0]->insert_informar($oficina,$peticionario,$requiriente));
                //insertar en la tabla oficio seguimiento
                //$query = $this->Oficio_model->createOficio($nomenclatura, $fecha, $etiquetas, $termino, $dirigido, $observaciones, $atencion, $ruta, $informar, $asunto, $ide);

                //si la inserción es correcta carga formulario de actualizar con el id del nuevo oficio
                //$this->actualizarOficio($query);

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
    //cargar número consecutivo para nomenclatura dependiendo del último resgstro de la tabla
    public function consecutivo()
    {
        //recibe el tipo de oficio (cordinador, secretario particular)
        $tipoOficio = $this->input->post('tipoOficio');   
        $year = date('Y'); //carga el año en curso del servidor     
        //dependiendo del tipo de oficio carga la nomeclatura   
        if( $tipoOficio == '400LIA000' ){
            $last = $this->Oficio_model->lastNom(); //ultima nomenclatura en la tabla cordinador
            $ext = $last[0]->nomenclatura; //toma campo nomenclatura          
            $nom = explode("/",$ext); //corta nomenclatura en cada diagonal
            $num = $nom[1]; //número consecutivo de la nomenclatura
            //$consecutivo = 0000; //si es nuevo folio comentar la linea anterior y posterior dar de alta oficio seguimiento 
            $consecutivo = $num + 1;
            //$this->generate_numbers($num,'1','4');  
            $nomenclatura = '400LIA000/'.$consecutivo.'/'.$year;
            var_dump($nomenclatura);
                     
        }else{
            //oficio secretariado 
            $last = $this->Oficio_model->lastNom(); //ultima nomenclatura en la tabla
            $ext = $last[0]->nomenclatura;          
            $nom = explode("/",$ext); //corta nomenclatura en cada diagonal
            $num = $nom[1]; //número consecutivo de la nomenclatura
            //$consecutivo = 0000; //si es nuevo folio comentar la linea anterior y posterior dar de alta oficio seguimiento 
            $consecutivo = $num + 1;  
            $nomenclatura = '400LI0010/'.$consecutivo.'/'.$year;
            var_dump($nomenclatura);
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
    
    public function prueba()
    {
        //recibe el tipo de Oficio    
        $tipo = $this->input->post('tipoOficio');
        $last = $this->Oficio_model->lastNom();
        $ext = $last[0]->nomenclatura;
        $nom = explode("/",$ext);
        $num = $nom[1]; //número inicial
        $digitos = 4;
        $count = 1;
        for ($n = $num; $n < $num + $count; $n++)
        {

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
        //obtiene el termino del oficio
        $termino = $this->Oficio_model->get_termino($id);
        //manda datos de la consulta a la vista, donde se valida el termino para mostrar el formulario correspondiente 
            $this->load->view('templates/head');
            if($termino[0]->termino != 0)
            {
                $this->load->view('actualiza_oficio',$datos); //formulario para modificar oficio
            }else{
                $this->load->view('consulta_oficio',$datos); //formulario para visualizar oficio e imprimir
            }
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
        //$pdf->IncludeJS("print();");
        $pdf->Output($pdfFilePath, 'I');
    }

    /**mysql> CALL simpleproc(@a);

mysql> SELECT @a; */


}