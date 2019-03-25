<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
require_once ('vendor/dompdf/dompdf/src/Autoloader.php');
use Dompdf\Dompdf;
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
    //función para crear pdf de bitacora
    public function imprimirBitacora(){
        $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
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
        $html = $this->load->view('bitacora_pdf', $datos, true);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $idu = $this->session->userdata('id_usuario'); //id del usuario logeado
        $fec_bit = date('Y-m-d'); //fecha actual del servidor
        $hor_bit = date('H:i:s'); //fecha actual del servidor
        //inserción de registros en la bitacora
        $this->Bitacora_model->insertBitacora($idu,'Descarga bitácora en PDF '.$search.' con fechas '.$date1.'-'.$date2.'.',$fec_bit,$hor_bit);
        //$dompdf->stream("sample.pdf", array("Attachment"=>0)); //muestra pdf
        $dompdf->stream("bitacora_".$fec_bit.".pdf");   //descarga pdf
    }
}    