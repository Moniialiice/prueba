<?php
defined('BASEPATH') OR exit('No direct script access allowed');

define('DOMPDF_ENABLE_AUTOLOAD', false);
require_once ('vendor/dompdf/dompdf/src/Autoloader.php');

class Pdf {

  public function generate($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = "portrait")
  {
    $dompdf = new DOMPDF();
    $dompdf->load_html($html);
    $dompdf->set_paper($paper, $orientation);
    $dompdf->render();
    if ($stream) {
        $dompdf->stream($filename.".pdf", array("Attachment" => 0));
    } else {
        return $dompdf->output();
    }
  }
}
    
    

 if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();

    }    
    public $day, $m, $year, $oficio;
    public function data($day,$m,$year,$oficio){
        $this->dia = $day;
        $this->mes = $m;
        $this->an = $year;
        $this->of = $oficio;
    }    
    public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'header.png';
		$this->Image($image_file, '', '', 190, 25, 'PNG', '', 'LTR', false, 100, '', false, false, 0, false, false, false);
        // Set font
        $a = $this->an;
        switch($a){ 
            /*case '2016':
                $l = ''
				echo "\"2016. AÑO DEL CENTENARIO DE LAS CONSTITUCIONES MEXICANA Y MEXIQUENSE DE 1017\".";
			break;
			case '2017':
				echo "\"2017. AÑO DEL CENTENARIO DE LA INSTALACIÓN DEL CONGRESO CONSTITUYENTE\".";
			break;
			case '2018':
				echo "\"2018. AÑO DEL BICENTENARIO DEL NATALICIO DE IGNACIO RAMÍREZ CALZADA, EL NIGROMANTE\".";
			break;*/
			case '2019':
				$f = '"2019. AÑO DEL CENTÉSIMO ANIVERSARIO LUCTUOSO DE EMILIANO ZAPATA SALAZAR, EL CAUDILLO DEL SUR".';
			break;
			case '2020':
				$f = '"2020. AÑO DE LAURA MÉNDEZ DE CUENCA; EMBLEMA DE LA MUJER MEXIQUENSE".';
				//Año de Laura Méndez de Cuenca; emblema de la mujer mexiquense\".";
		}
        $this->SetFont('helvetica', 'B', 10);
        $this->SetY(40);
        // Title
        $this->Cell(0, 0, $f, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->SetY(59);
        $d = $this->dia;
        $me = $this->mes;
        $a = $this->an;
        $o = $this->of;
        $f = '<b>
                METEPEC, ESTADO DE MEXICO A '.$d.' DE '.$me.' DE '.$a.'  <br>
                OFICIO '.$o.'.</b>';
        $this->MultiCell(0, 10, $f, 0, 'R', 0, 1, '', '', true, null, true);     
    }
    // Page footer
    public function Footer() {
        $image_file = K_PATH_IMAGES.'pie_pagina.png';
		$this->Image($image_file, '', '', 185, 17, 'PNG', '', 'LTR', false, 100, '', false, false, 0, false, false, false);
        // Position at 15 mm from bottom
        $this->SetY(-28);
        // Set font
        $this->SetFont('helvetica', 0, 8);
        $this->Cell(0, 10, '-------------------------------------------------- hoja '.$this->getAliasNumPage().'/'.$this->getAliasNbPages().'--------------------------------------------------', 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
    public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 15, $fontsize = 10, $fontstyle = 'B', $align = 'R') {
        $this->SetXY($x+20, $y); // 20 = margin left
        $this->SetFont('helvetica', $fontstyle, $fontsize);
        //$this->MultiCell($width, $height, $textval, 0, false, $align);
        $this->MultiCell($width, $height, $textval, 0, 'R', 0, 1, '', '', true, null, true);
    }
}
/* application/libraries/Pdf.php */
