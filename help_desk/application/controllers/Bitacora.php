<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Bitacora extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('download','file','url','html','form'));
        $this->load->library('session');
        $this->load->model('Bitacora_model');
        $this->load->library(array('form_validation'));
        //$this->load->library('curl');
    }
    //busqueda de bitacora por usuario y fechas 
    public function index(){
        $this->load->view('templates/head');
        $this->load->view('busqueda_bitacora');
        $this->load->view('templates/footer');
    }
    //arroja el resultado de la busqueda de los oficios
    public function consultaBit()
    {
        if($this->input->post())
        {
            //recibe datos de la búsqueda
            $search = $this->input->post('busqueda');
            $date1 = $this->input->post('date1');
            $date2 = $this->input->post('date2');
            //valida campos vacios
            $this->form_validation->set_rules('date1','Fecha Real Inicio','required');
            $this->form_validation->set_rules('date2','Fecha Real Final','required');
            //cambia formato de fecha 
            if($this->form_validation->run()==true)
            {
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
                $datos ['datos'] = $this->Bitacora_model->searchfechaBitacora($search,$fecha1,$fecha2);
                $this->load->view('all_bitacora',$datos);
                $id = $this->session->userdata('id_usuario'); //id del usuario logeado
                $fec_bit = date('Y-m-d'); //fecha actual del servidor
                $hor_bit = date('H:i:s'); //fecha actual del servidor
                //inserción de registros en la bitacora
                $this->Bitacora_model->insertBitacora($id,'Búsqueda en bitacora '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit, $hor_bit);      
            }else{
                $datos = array();
                $datos['date1'] = $date1;
                $datos['date2'] = $date2;
                //manda datos al formulario de búsqueda 
                $this->load->view('all_bitacora',$datos);
            }    
        }else{
            //menssaje de error sí no recibe datos
            $this->session->set_flashdata('Error', 'Consultar administrador');
        }
    }
    //función para generar pdf de oficio atendido
    public function imprimirBitacora()
    {
        //recibe datos de la búsqueda
        $search = $this->input->post('busqueda');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
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
        $datos ['datos'] = $this->Bitacora_model->searchfechaBitacora($search,$fecha1,$fecha2);
        //this the the PDF filename that user will get to download  
        $pdfFilePath = "bitacora_sigo." . "pdf";
        //load TCPDF library
        $this->load->library('Pdf');
        //Tamaño de pdf
        //var_dump($data);
        $pdf = new Pdf('L', 'cm', 'Letter', true, 'UTF-8', false);
        $pdf->segundaHoja = true;
        $pdf->setPrintHeader(true);
        $pdf->setPrintFooter(true);
        // set margins
        $pdf->SetMargins(15, 35, 15);
        $pdf->SetHeaderMargin(15);
        $pdf->SetFooterMargin(20);
        $pdf->SetAutoPageBreak(TRUE, 20);
        $html = $this->load->view('bitacora_pdf', $datos, true);
        $pdf->SetAuthor('FGJEM');
        $pdf->SetDisplayMode('real', 'default');
        $pdf->AddPage('P', 'LETTER');
        // salida de HTML contenido a pdf
        $pdf->writeHTML($html, true, false, true, false, '');
        //manda a imprimir al cargar el archivo
        //$pdf->IncludeJS("print();"); I
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga bitácora en PDF '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
        $pdf->Output($pdfFilePath, 'D');
    }



}    