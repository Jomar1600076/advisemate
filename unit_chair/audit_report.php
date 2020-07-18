<?php

// Include the main TCPDF library (search for installation path).
require "fpdf/fpdf.php";

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Times', 'B', 8);
        $this->Cell(500, 0, 'Advisement Form', 0, 0, 'C');
        $this->Ln();
        $this->Image('logo.png', 10, 7, -200);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(70, 10, 'Leyte Normal University', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Cell(70, 3, 'ADVISEMENT FORM', 0, 0, 'C');
        $this->Ln(15);
    }

    function tableHeader(){
        $this->SetMargins(30, 20, 30);
        $this->SetFont('Times', 'B', 12);
        $this->Cell(10, 10, '', 1, 0, 'C');
        $this->Cell(30, 10, 'Class Code', 1, 0, 'C');
        $this->Cell(30, 10, 'Course Code', 1, 0, 'C');
        $this->Cell(110, 10, 'Description', 1, 0, 'C');
        $this->Cell(20, 10, 'Units', 1, 0, 'C');
        $this->Cell(20, 10, 'Major', 1, 0, 'C');
        $this->Cell(20, 10, 'Minor ', 1, 0, 'C');
        $this->Ln();
    }

    function tableData(){
        $this->SetFont('Times', '', 12);
        $this->Cell(10, 10, '', 1, 0, 'C');
        $this->Cell(30, 10, 'hello', 1, 0, 'C');
        $this->Cell(30, 10, 'Nice', 1, 0, 'C');
        $this->Cell(110, 10, 'To Meet', 1, 0, 'C');
        $this->Cell(20, 10, 'you', 1, 0, 'C');
        $this->Cell(20, 10, '', 1, 0, 'C');
        $this->Cell(20, 10, '', 1, 0, 'C');
        $this->Ln();
                  
    }

    function footer(){
        $this->SetFont('Arial','',12);
        $this->Cell(130 ,10,'If Yes, Pls. Indicate Household No.:___________________________',0,0);
    }
}

$pdf = new myPDF();
$pdf->SetMargins(30, 10, 30);
$pdf->AliasNbPages();
$pdf->AddPage('L'. 'A4', 0);
$pdf->tableHeader();
$pdf->tableData();
$pdf->Output();

