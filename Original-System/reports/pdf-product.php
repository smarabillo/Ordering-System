<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../classes/record-class.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$product = new Product();

class PDF extends FPDF
{
    // Page header
    function Header()
{
    // Set the timezone to the desired one
    date_default_timezone_set('Asia/Manila');

    // Arial 12
    $this->SetFont('Arial', '', 12);

    // Background color
    $this->SetFillColor(200, 220, 255);

    // Title
    $this->Cell(0, 6, "RNC Steak House", 0, 1, 'L', 1);
    $this->Cell(0, 6, "Company Products", 0, 1, 'L', 1);
    $this->SetFont('Arial', 'BIU', 10);
    $this->Cell(0, 6, "Date Generated " . date("Y-m-d h:i:s A") . " ", 0, 1, 'L', 1);
    $this->SetFont('Arial', '', 12);

    // Line break
    $this->Ln(4);
}

    function BasicTable($header)
    {
        // Header
        foreach ($header as $col)
            $this->Cell(47, 7, $col, 0, 0, 'C');
        $this->Ln();
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

// Instantiate the inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// Custom Header
$pdf->Cell(30, 12, "Product Id", 1, 0, 'C');
$pdf->Cell(60, 12, "Product Name", 1, 0, 'C');
$pdf->Cell(70, 12, "Product Desc", 1, 0, 'C');
$pdf->Cell(30, 12, "Product Price", 1, 0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$count = 1;

if ($product->list_product() !== false) {
    foreach ($product->list_product() as $value) {
        extract($value);
        {
            $pdf->Cell(30, 12, $ProductId, 0, 0, 'L');
            $pdf->Cell(60, 12, $ProductName, 0, 0, 'L');
            $pdf->Cell(70, 12, $ProductDesc, 0, 0, 'L');
            $pdf->Cell(30, 12, $ProductPrice, 0, 0, 'L');
            $pdf->Ln(6);
            $count++;
        }
    }
}

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(176, 20, "--Nothing Follows--", 0, 0, 'C');
$pdf->Output();
?>
