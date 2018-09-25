<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    // Page footer
    public function Footer() {
       // Position at 15 mm from bottom
       //$image_file1 = base_url()."assets/img/footer.png";
       $this->SetY(-15);
       // Set font
       $this->SetFont('helvetica', 'I', 8);
       //Footer formatea la fecha para que envie algo como: Viernes 23 de Marzo del 2018
       $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
       $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
       $dia= $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y');
       $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages()." ".$dia, 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
/* application/libraries/Pdf.php */
