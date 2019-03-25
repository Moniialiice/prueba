<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use Dompdf\Dompdf;

class Welcome extends CI_Controller
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
    


    function pdf()
    {
            // Composer's auto-loading functionality
    require_once ('vendor/dompdf/dompdf/src/Autoloader.php');


    //generate some PDFs!
    $dompdf = new DOMPDF();  //if you use namespaces you may use new \DOMPDF()
    $dompdf->loadHtml($html);
    $dompdf->render();
    $dompdf->stream("sample.pdf", array("Attachment"=>0));

    /* $this->load->library('pdf');
     // page info here, db calls, etc.     
     $html = $this->load->view('pdf', true);
     $this->Pdf->generate($html, 'filename');
     /*or
     $data = pdf_create($html, '', false);
     $this->Pdf->write_file('name', $data);*/
     //if you want to write it to disk and/or send it as an attachment  
    }

}   