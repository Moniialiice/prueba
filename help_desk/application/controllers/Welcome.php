<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		 parent::__construct();

		 $this->load->library('pagination');
		 $this->load->helper('url');
		 $this->load->library('session');
		 $this->load->library('encrypt');
		 $this->load->model('welcome_model');
		 $this->load->library(array('form_validation'));
		 //$this->load->library('curl');
	}

	public function index()
	{
		$peticiones ['peticiones'] = $this->welcome_model->get();

		$this->load->view('templates/head');
		$this->load->view('templates/index',$peticiones);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->view('templates/head');
		$this->load->view('templates/alta_incidente');
		$this->load->view('templates/footer');
	}

	public function view($id)
	{
		$peticiones['peticion'] = $this->welcome_model->get_peticion($id);
		//var_dump($peticiones);

			$html = $this->load->view('templates/info_pdf.php',$peticiones,true);

			//this the the PDF filename that user will get to download
			$pdfFilePath = "orden_servicio_."."pdf";
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
			$pdf->AddPage('P','LETTER');
			// salida de HTML contenido a pdf
			$pdf->writeHTML($html, true, false, true, false, '');
			//manda a imprimir al cargar el archivo
			//$pdf->IncludeJS("print();");
			$pdf->Output($pdfFilePath, 'I');

	}


	public function store()
	{
		$add = $this->welcome_model->store(
			$edo = 'ABIERTO',
			$nombre = $this->input->post('nombre'),
			$paterno = $this->input->post('nombre'),
			$materno = $this->input->post('nombre'),
			$telefono = $this->input->post('telefono'),
			$correo = $this->input->post('correo'),
			$asunto = $this->input->post('asunto'),
			$descripcion = $this->input->post('descripcion'),
			$marca = $this->input->post('marca'),
			$modelo = $this->input->post('modelo'),
			$serie = $this->input->post('serie')
		);

		if($add){
			$this->session->set_flashdata('corecto','Creado Correctamente');
		}else{
			$this->session->set_flashdata('incorrecto','No creado');
		}

		$this->index();
	}
}
