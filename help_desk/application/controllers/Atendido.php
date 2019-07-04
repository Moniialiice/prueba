<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
require_once ('vendor/dompdf/dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Atendido extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->helper(array('download','file','url','html','form'));
        $this->load->library('session');
        $this->load->library('encrypt');
        $this->load->model('Atendido_model');
        $this->load->model('Bitacora_model');
        $this->load->library(array('form_validation','upload'));
        //$this->load->library('curl');
        $this->folder = 'document/atendido/';
    }
    //función carga templates, el formulario para generar oficio con el $id del oficio entrada
    public function index($id)
    {
        $ida = base64_decode($id);
        $datos ['datos'] = $this->Atendido_model->datosSeguimiento($ida); //datos de tabla oficio entrada
        $sAtendido = $this->Atendido_model->seguimientoAtendido($ida); //obtiene id de oficio seguimiento
        //si se ejecuta eSeguimiento
        if($sAtendido){
            //$idatencion = $sAtendido[0]->id_oficioseg; //id de oficioSeguimiento
            $idatendido = $sAtendido[0]->id_oficioAtendido;
            $this->mostrarAtendido($idatendido); //carga formulario de actualización
        }else{            
            //carga el vista para nuevo oficio seguimiento
            $this->load->view('templates/head');
            $this->load->view('genera_atendido',$datos);
            $this->load->view('templates/footer');
        }        
    }
    //valida los datos para insertar en la base 
    public function createAtendidoVal()
    {
        //id de seguimiento
        $segui = $this->input->post('segui');
        if($this->input->post())
        { 
            //nomenclatura para colocarlo al archivo atendido
            $nomen = $this->input->post('nomen');
            //id del usuario que creo el oficio
            $atencion = $this->input->post('atencion');
            //recibimos datos del formulario
            $fecha = $this->input->post('date1');
            $nombre = $this->input->post('nombre');
            $cargo = $this->input->post('cargo');
            $descripcion = $this->input->post('descripcion');
            $copia = $this->input->post('copia');
            //valida los datos del formulario
            $this->form_validation->set_rules('segui','Nomenclatura','is_unique[oficio_atendido.id_oficioseg]');
            $this->form_validation->set_rules('date1','Fecha','required');
            $this->form_validation->set_rules('nombre','Nombre', 'required');
            $this->form_validation->set_rules('cargo','Cargo','required');
            $this->form_validation->set_rules('descripcion','Descripción','required');
            //sí la validación es correcta procede insetar en la base de datos
            if($this->form_validation->run()==TRUE)
            {   
                //formato de fecha2
                $date = array();
                $date = $fecha;
                $ext = explode('/',$date);
                $fecha1 = $ext[2]."-".$ext[1]."-".$ext[0];
                $fecha2 = $ext[2]."_".$ext[1]."_".$ext[0];                
                $nom = explode('/',$nomen);
                //datos requeridos para subir archivo y ruta a guardar 
                $config['upload_path'] = $this->folder;
                $config['allowed_types'] = 'jpg|png|pdf';
                $config['max_size'] = 1000;
                $config['file_name'] = $nom[0].'_'.$fecha2;
                //carga libreria archivos e inicializa el array config con los datos del archivo
                $this->load->library('upload',$config);
                $this->upload->initialize($config);
                //toma el datos de archivo entrada
                $this->upload->do_upload('archivo');                
                    //carga los datos del archivo
                    $upload_data = $this->upload->data();
                    //toma el nombre del archivo
                    $archivo = $upload_data['file_name']; 
                    $insertOficio = $this->Atendido_model->insert_Atendido($fecha1, $nombre, $cargo, $descripcion, $archivo, $copia, $segui, $atencion);                
                    if ($insertOficio == true){                    
                    //id oficio seguimiento 
                    $idatendido = $this->Atendido_model->getIDA($segui);
                    $ida = $idatendido[0]->id_oficioAtendido;
                    $idu = $this->session->userdata('id_usuario');//id del usuario loggeado
                    $fec_bit = date('Y-m-d'); //fecha el servidor
                    $hor_bit = date('H:i:s'); //fecha el servidor
                    //inserta registros en la bitacora
                    $this->Bitacora_model->insertBitacora($idu,'Oficio atendido creado, del oficio '.$nomen.' creado.',$fec_bit,$hor_bit);
                    //una vez insertado muestra datos en actualizar oficio
                    $this->session->set_flashdata('Creado','Oficio creado');
                    $this->mostrarAtendido($ida);
                }else{
                    $this->session->set_flashdata('Error','Consulta administrador');                    
                    $this->index($segui);
                }
            }else{
                //tomamos los datos del formulario en un array
                $datos = array();
                $datos['date1'] = $fecha;
                $datos['nombre'] = $nombre;
                $datos['cargo'] = $cargo;
                $datos['descripcion'] = $descripcion;
                $copia['copia'] = $copia;
                $datos['datos'] = $this->Atendido_model->datosSeguimiento($segui);
                //envia datos del array a la vista
                $this->load->view('templates/head');
                $this->load->view('genera_atendido',$datos); 
                $this->load->view('templates/footer');
            }
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
            $this->index($ide);
        }
    }
    //carga formulario de busqueda
    public function busquedaAtendido()
    {
        $this->load->view('templates/head');
        $this->load->view('busqueda_atendido');
        $this->load->view('templates/footer');
    }
    //muestra consulta de oficio por la búsqueda
    public function consultaAtendido()
    {
        if($this->input->post())
        {
            //recibe datos del formulario
            $search = $this->input->post('busqueda');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida campos vacios
            $this->form_validation->set_rules('date1','Fecha Atendido Inicio','required');
            $this->form_validation->set_rules('date2','Fecha Atendido Final','required');
            //si la validación es correcta 
            if($this->form_validation->run()==true)
            {
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
                $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
                $fec_bit = date('Y-m-d'); //fecha actual del servidor
                $hor_bit = date('H:i:s');
                //inserción de registros en la bitacora
                $this->Bitacora_model->insertBitacora($idu,'Búsqueda Oficio Atendido '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit, $hor_bit);
                switch($this->session->userdata('id_tipoUsuario')){
                    case '1':
                        //datos de la consulta oficio  
                        $datos['datos'] = $this->Atendido_model->searchfechaAtendido($search, $fecha1, $fecha2);
                        $this->load->view('all_atendido', $datos);
                    break;
                    case '2':
                        //datos de la consulta oficio
                        $datos['datos'] = $this->Atendido_model->searchfechaAtendido($search, $fecha1, $fecha2);
                        $this->load->view('all_atendido', $datos);
                    break;
                    case '5':
                        //datos de la consulta oficio
                        $datos['datos'] = $this->Atendido_model->searchAtenFI($search, $fecha1, $fecha2, $idu);
                        $this->load->view('all_atendido', $datos);
                    break;
                }                               
            }else{
                $datos = array();
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                //manda datos de la búsqueda al formulario
                $this->load->view('all_atendido', $datos);
            }            
        }else{
            //mensaje de error si  la inserción no se realiza
            $this->session->set_flashdata('Error','Consultar administrador');
        }        
    }    
    //consulta de oficio seguimiento atendido
    public function mostrarAtendido($id)
    {
        //consulta datos del oficio atendido
        $datos['datos'] = $this->Atendido_model->consultaAtendido($id);
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Atendido_model->nomenBit($id); //consulta de nomenclatura por el id del asunto
        $nome = $nom[0]->nomenclatura; //nomenclatura del oficio seguimiento
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Consulta oficio atendido del oficio: '.$nome.'.',$fec_bit,$hor_bit);
        //carga vistas, formulario de consulta
        $this->load->view('templates/head');
        $this->load->view('consulta_atendido',$datos);
        $this->load->view('templates/footer');
    }
    //función para descargar archivo seguimiento o final
    public function descarga($name)
    {
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //hora del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga de archivo atendido '.$name.'.',$fec_bit,$hor_bit);
        $data = file_get_contents($this->folder.$name);
        force_download($name,$data);
    }
    //función paara imprimir atendido pdf
    public function imprimirOficioAtendido($id){
        $ida = base64_decode($id);
        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
        $datos['dato'] = $this->Atendido_model->reportOficioAtendido($ida);
        $html = $this->load->view('atendido_pdf', $datos, true);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        $nom = $this->Atendido_model->nomenBit($ida); //consulta de nomenclatura por el id del asunto
        $nome = $nom[0]->nomenclatura; //nomenclatura del oficio seguimiento
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga Oficio Atendido en PDF de: '.$nome.'.',$fec_bit,$hor_bit);
        //$dompdf->stream("sample.pdf", array("Attachment"=>0)); //muestra pdf
        $dompdf->stream("oficio_atendido.pdf");   //descarga pdf
    }
    //reporte en excel 
    public function reportExcelA()
    {
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2'); 
        //creamos objeto de spreadsheet para excel 
        $spreadsheet = new Spreadsheet();
        //agrega columnas de encabezado
        $spreadsheet->setActiveSheetIndex(0)        
        ->setCellValue('A1', 'NO. OFICIO')
        ->setCellValue('B1', 'FECHA ATENDIDO')
        ->setCellValue('C1', 'DIRIGIDO A')
        ->setCellValue('D1', 'CARGO')
        ->setCellValue('E1', 'DESCRIPCIÓN')
        ->setCellValue('F1', 'NOMBRE');
        //se madan estilos para las colunas A1,B1,C1 cells
        $cell_st =[
        'font' =>['bold' => true],
        'alignment' =>['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        'borders'=>['bottom' =>['style'=> \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM]]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($cell_st);
            
        //tamaño de las celdas 
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setWidth(16);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(26);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setWidth(100);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(40);
        
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
        $id = $this->session->userdata('id_usuario'); //id del usuario logeado

        //valida el tipo de consulta para obtener los datos deacuerdo al id del usuario        
        switch ($this->session->userdata('id_tipoUsuario')){
            case '1':
                $datos['datos'] = $this->Atendido_model->searchFechaAtendido($search,$fecha1,$fecha2);
            break;
            case '2':
                $datos['datos'] = $this->Atendido_model->searchFechaAtendido($search,$fecha1,$fecha2);
            break;            
            case '5':
                $datos['datos'] = $this->Atendido_model->searchAtenFI($search,$fecha1,$fecha2,$id);
            break;     
        }   
        foreach($datos as $dato){ 
            $row = count($dato);
            for ($n=2; $n<=$row+1; $n++)
            {      
                //var_dump($datos);
                $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A'.$n, $dato[$n-2]->nomenclatura)
                ->setCellValue('B'.$n, $dato[$n-2]->fecha_atendido)
                ->setCellValue('C'.$n, $dato[$n-2]->nombre_aten)  
                ->setCellValue('D'.$n, $dato[$n-2]->cargo_aten)
                ->setCellValue('E'.$n, $dato[$n-2]->descripcion)
                ->setCellValue('F'.$n, $dato[$n-2]->nombre." ".$dato[$n-2]->apellidop." ".$dato[$n-2]->apellidom);
            }
        }
        $fec_bit = date('Y-m-d H:i:s'); //fecha actual del servidor
        $hor_bit = date('Y-m-d H:i:s'); //hora actual del servidor        
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($id,'Descarga reporte en Excel de la búsqueda '.$search.' oficio atendido con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
        //se crea objeto para guardar archivo xls
        $writer = new Xlsx($spreadsheet);
        //nombre del archivo a descargar 
        $filename = 'excel_atendido';
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        //linea que descarga el archivo
        $writer->save('php://output');
    }
    //el motivo de este correo 
}