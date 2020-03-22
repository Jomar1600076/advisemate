<?php

// Include the main TCPDF library (search for installation path).
require_once('tcpdf/tcpdf.php');

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo.png';
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font

        $this->SetFont('helvetica', 'B', 14);
        // Title
        $html ='

                <style>
                    #lnu{
                        color: #000000;
                        font-family: helvetica;
                        font-size: 20pt;
                        text-style: italic;
                    }
                </style>
                    <table cellspacing="0" cellpadding="1" border="0" margin-left="2">
                        <tr>
                            <td id="lnu">Leyte Normal Univerity</td>
                        </tr>
                        <tr>
                            <td id="ad">Advisement Form</td>
                        </tr>
                    </table>
                ';
                $this->writeHTMLCell($w = 0, $h = 0, $x = '', $y = '', $html, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = 'top', $autopadding = true);
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}


$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
$pdf->SetCreator("Wael Salah");
$pdf->SetAuthor('Wael Salah');
$pdf->SetTitle('Demonstrating pdf with php');
 
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING, array(0, 6, 255), array(0, 64, 128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
 
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// ---------------------------------------------------------
 
// set default font subsetting mode
 
$pdf->AddPage();

$html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>
    table.first {
        color: #003300;
        font-family: helvetica;
        font-size: 12pt;
        border: 2px solid black;
    }
    td {
        border: 1px solid black;
    }
    h5{
        display:inline;
    }
</style>


<div class="container">
    <div>
    <h5>Student Number:____________________</h5><h5>Name:___________________________________________________</h5>
    <h5>SY:_____</h5><h5>Sem:_________</h5><h5>Year Level:_____</h5><h5>Program:________</h5><h5>Major:_____</h5>
    </div>
    <table class="first" cellpadding="4" cellspacing="0">
    <tr>
    <td width="100" align="center"><b>Subject Code</b></td>
    <td width="300" align="center"><b>Subject Description</b></td>
    <td width="140" align="center"><b>Pre-Requisite</b></td>
    <td width="100" align="center"><b>Subject Unit</b></td>
    </tr>
    <tr>
    <td width="100" align="center">1.</td>
    <td width="300">XXXX</td>
    <td width="140">XXXX</td>
    <td width="100">XXXX</td>
    </tr>

    </table>
</div>
EOF;
 
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
 
$pdf->Output('test.pdf', 'I');
// -----------------------------------------------------------------------------



//============================================================+
// END OF FILE
//============================================================+