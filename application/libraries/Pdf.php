<?php

require_once(APPPATH . 'third_party/fpdf/fpdf.php');

class Pdf extends FPDF {
    public function __construct() {
        parent::__construct();
    }

    public function generate($html, $filename = 'document') {
        ob_start();

        $this->AddPage();

        $this->SetFont('Arial', '', 12);  

        $this->MultiCell(0, 10, $html); 
        
        $this->Output('I', $filename . '.pdf'); 

        ob_end_clean();
    }
}
