<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    }
    //función carga templates, el formulario para generar oficio con el $id del oficio entrada
    public function index($id)
    {
        //$id = $this->encrypt->decode($enID);
        $datos ['datos'] = $this->Oficio_model->datosEntrada($id); //datos de tabla oficio entrada
        $eSeguimiento = $this->Oficio_model->entradaSeguimiento($id); //obtiene id de oficio seguimiento
        $eCaptura = $this->Oficio_model->capturaSeguimiento($id); //verifica si oficio seg existe en tabla captura
        //si se ejecuta eSeguimiento 
        if($eSeguimiento){
            $idoficio = $eSeguimiento[0]->id_oficioseg; //id de oficioSeguimiento
            $this->actualizarOficio($idoficio); //carga formulario de actualización
        }elseif($eCaptura){
            $idcaptura = $eCaptura[0]->id_ofseg;
            $this->actualizarOficioCaptura($idcaptura);
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
            $this->form_validation->set_rules('termino', 'Termino', 'required');
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
                $LID = $this->Oficio_model->lastID(); //consulta el id del ultimo resgistro de oficio seguimiento
                $name = 'MAX(id_oficioseg)'; // nombre de la columna que devuelve consulta
                $LIDO = $LID[0]->$name; //se obtiene sólo el id del ultimo registro
                $last = $this->Oficio_model->lastNom($LIDO); //consulta nomenclatura del ultimo registro                                
                $ext = $last[0]->nomenclatura; //toma campo nomenclatura
                $nom = explode("/",$ext); //corta nomenclatura en cada diagonal
                $nomen = $nom[0]; //nomenclatura del ultimo registro
                $num = $nom[1]; //número consecutivo de la nomenclatura
                $ans = $nom[2]; //año de nomenclatura del ultimo registro
                //cambia formato de fecha
                $date = $fecha;
                $ext = explode('/',$date);
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0];
                //cambia formato fecha termino 
                $datet = $termino;
                $espaciot = explode(" ", $datet);
                $fect = explode("/", $espaciot[0]);
                $fechat = $fect[2]."-".$fect[1]."-".$fect[0]." ".$espaciot[1].":00";     
                //dependiendo del tipo de oficio carga nomeclatura
                switch ($tipoOficio)
                {
                    case '400LIA000': 
                        if($nomen == $tipoOficio && $ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                            $consecutivo = $this->generaNomenclatura($num+1,1,4); //manda datos para generar consecutivo
                            $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$year; //crea nomenclatura coordinador
                            //inserta los datos 
                            $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                            if($insertOficio == true){                    
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
                                $nomenclatura = '400LIA000/0001/'.$year; //carga primera nomenclatura del año
                                //llama función para insertar datos
                                $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                                if($insertOficio == true){                    
                                    //id oficio seguimiento 
                                    $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                    $ido = $idoficio[0]->id_oficioseg;
                                    //una vez insertado muestra datos en actualizar oficio
                                    $this->actualizarOficio($ido);
                                }else{
                                    $this->session->set_flashdata('Error','Consulta administrador');                    
                                    $this->index($ide);
                                }
                            }
                        break;    
                    case '400LI0010':
                       if($nomen == $tipoOficio && $ans == $year){ //si tipo oficio y año es igual a nomenclatura del ultimo registro
                        $consecutivo = $this->generaNomenclatura($num+1, 1, 4); //manda datos para generar consecutivo                           
                        $nomenclatura = $tipoOficio.'/'.$consecutivo[0].'/'.$year; //genera nomenclatura secretario
                        $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $fechat, $observaciones, $atencion, $asunto, $ide);               
                        if($insertOficio == true){                    
                            //id oficio seguimiento 
                            $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                            $ido = $idoficio[0]->id_oficioseg;
                            //una vez insertado muestra datos en actualizar oficio
                            $this->actualizarOficio($ido);
                        }else{
                            $this->session->set_flashdata('Error','Consulta administrador');                    
                            $this->index($ide);
                        }}else{
                            $nomenclatura = '400LI0010/0001/'.$year;
                            $insertOficio = $this->Oficio_model->insert_Oficio($oficina, $peticionario, $requiriente, $colaboracion, $amparo, $solicitudes, $gestion, $cursos, $juzgados, $rh, $telefonia, $estadistica, $ri, $boletas, $conocimiento, $conase, $toluca, $mexico, $zoriente, $fgeneral, $vicefiscalia, $oficialia, $informacion, $central, $servicio, $otrad, $diligencia, $personalmente, $gestionar, $archivo, $otrar, $nomenclatura, $fecha1, $termino, $observaciones, $atencion, $asunto, $ide);               
                            if($insertOficio == true){                    
                                //id oficio seguimiento 
                                $idoficio = $this->Oficio_model->getIDO($nomenclatura);
                                $ido = $idoficio[0]->id_oficioseg;
                                //una vez insertado muestra datos en actualizar oficio
                                $this->actualizarOficio($ido);
                            }else{
                                $this->session->set_flashdata('Error','Consulta administrador');                    
                                $this->index($ide);
                            }
                        }
                    break;    
                }
            }else{ 
                    //tomamos los datos del formulario en un array
                    $datos = array();
                    $datos['fecha'] = $fecha;
                    $datos['asunto'] = $asunto;
                    $datos['observaciones'] = $observaciones;                
                    $datos['termino'] = $termino;
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
        if($this->input->post()){
            //recibe datos del formulario
            $search = $this->input->post('busqueda');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida que los campos feccha no esten vacios
            $this->form_validation->set_rules('date1','Fecha Oficio Inicio','required');
            $this->form_validation->set_rules('date2','Fecha Oficio Final','required');
            if($this->form_validation->run()==true){
                //cambiamos formato de fecha
                $ext = explode("/",$date1);
                $year = $ext[2];
                $mont = $ext[1];
                $day = $ext[0];
                $fecha1 = $year."-".$mont."-".$day;
                $ext2 = explode("/",$date2);
                $year2 = $ext2[2];
                $mont2 = $ext2[1];
                $day2 = $ext2[0];
                $fecha2 = $year2."-".$mont2."-".$day2;
                $datos['datos'] = $this->Oficio_model->searchDate($search,$fecha1,$fecha2);
                $this->load->view('all_oficio', $datos);
            }else{
                $datos = array();
                $datos['busqueda'] = $search;
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                $this->load->view('all_oficio',$datos);
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
        }    
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
    //carga formulario de datos oficio seguimiento de captura
    public function actualizarOficioCaptura($id)
    { 
        //consulta los datos del oficio por el id de oficio
        $datos ['datos'] = $this->Oficio_model->reportCaptura($id);
        //manda datos de la consulta a la vista para mostrar el formulario correspondiente 
            $this->load->view('templates/head');
            $this->load->view('consulta_captura',$datos); //formulario para visualizar oficio e imprimir
            $this->load->view('templates/footer');    
    }
    //función para craar pdf
    public function imprimirOficio($id)
    {
        $datos['dato'] = $this->Oficio_model->reportOficio($id);
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
     //reporte en excel
    public function reportExcelOS()
    {
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        //cambiamos formato de fecha
        $ext = explode("/",$date1);
        $year = $ext[2];
        $mont = $ext[1];
        $day = $ext[0];
        $fecha1 = $year."-".$mont."-".$day;
        $ext2 = explode("/",$date2);
        $year2 = $ext2[2];
        $mont2 = $ext2[1];
        $day2 = $ext2[0];
        $fecha2 = $year2."-".$mont2."-".$day2;
        $datos['datos'] = $this->Oficio_model->searchDate($search,$fecha1,$fecha2);
        //creamos objeto de spreadsheet 
        $spreadsheet = new Spreadsheet();
        //agrega columnas de encabezado
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A1', 'NO. OFICIO')
        ->setCellValue('B1', 'FECHA')
        ->setCellValue('C1', 'SE REMITE')
        ->setCellValue('D1', 'SOLICITUD')
        ->setCellValue('E1', 'PLAZO')
        ->setCellValue('F1', 'ATENCIÓN');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);
       
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(60);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(100);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(16);
         
        foreach ($datos as $dato)
        {
            $row = count($dato);
            //dirigido a 
            if($dato[0]->conase == 1){ $conase = 'CONASE';}else{ $conase = '';}
            if($dato[0]->fiscal_general == 1){ $fgeneral = 'FISCAL GENERAL';}else{ $fgeneral = '';}
            if($dato[0]->vicefiscalia){ $vfisccalia = 'VICEFISCALIA';}else{ $vfisccalia='';}
            if($dato[0]->zona_oriente == 1){ $zo = 'ZONA ORIENTE'; }else{$zo='';}
            if($dato[0]->valle_toluca == 1){ $vt = 'VALLE DE TOLUCA';}else{$vt='';}
            if($dato[0]->oficialia_mayor == 1){ $om = 'OFICIALIA MAYOR';}else{$om = '';}
            if($dato[0]->valle_mexico == 1){ $vm = 'VALLE DE MÉXICO';}else{$vm='';}
            if($dato[0]->informacion_estadistica == 1){ $infoe = 'DEPARTAMENTO DE INFORMACIÓN Y ESTADÍSTICA';}else{$infoe='';}
            if($dato[0]->central_juridico == 1){ $centralj = 'CENTRAL JURÍDICO';}else{$centralj='';}
            if($dato[0]->servicio_carrera == 1){ $servicioc = 'SERVICIO DE CARRERA';}else{$servicioc='';}
            if($dato[0]->otra != ""){ $otra = $dato[0]->otra; }else{$otra = '';}

            $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A'.$row, $dato[0]->nomenclatura)
            ->setCellValue('B'.$row, $dato[0]->fecha)
            ->setCellValue('C'.$row, $conase." ".$fgeneral." ".$vfisccalia." ".$zo." ".$vt." ".$om." ".$vm." ".$infoe." ".$centralj." ".$servicioc." ".$otra)
            ->setCellValue('D'.$row, $dato[0]->asunto)
            ->setCellValue('E'.$row, $dato[0]->termino)
            ->setCellValue('F'.$row, $dato[0]->nombre." ".$dato[0]->apellidop." ".$dato[0]->apellidom);
            $row ++;
        }

        //se crea objeto para guardar archivo xlsx
        $writer = new Xlsx($spreadsheet);
        //nombre del archivo a descargar
        $filename = 'excel_oficio';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //linea que descarga el archivo
        $writer->save('php://output');
    }

}