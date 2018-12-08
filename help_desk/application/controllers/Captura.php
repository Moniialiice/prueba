<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Captura extends CI_Controller
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
        $this->folder = 'documentc/';
    }
    //función para cargar vista de captura
    public function index(){
        $this->load->view('templates/head');
        $this->load->view('genera_captura');
        $this->load->view('templates/footer');
    }

}