<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{
    function __construct()
    {
        parent::__construct();
    }

    public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'header.png';
		$this->Image($image_file, 16, 10, 180, 25, 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 15, '', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

    // Page footer
    public function Footer() {
       // Position at 15 mm from bottom
       //$image_file1 = base_url()."assets/img/footer.png";
       $this->SetY(-15);
       // Set font
       $this->SetFont('helvetica', 'I', 8);
       $this->Cell(0, 10, 'Página '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
/* application/libraries/Pdf.php */
