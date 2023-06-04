<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once '../classes/user-class.php';
include '../config/config.php';
require('../fpdf185/fpdf.php');

$user = new User();
$UserId_Login = $user->get_userid($_SESSION['UserId']);
$UserAccess = $user->get_access($UserId_Login);

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
   
    $this->Cell(0, 6, "System Users", 0, 1, 'L', 1);
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
$pdf->Cell(30, 12, "User Id", 1, 0, 'C');
$pdf->Cell(40, 12, "Full Name", 1, 0, 'C');
$pdf->Cell(40, 12, "Address", 1, 0, 'C');
$pdf->Cell(40, 12, "Contact Number", 1, 0, 'C');
$pdf->Cell(40, 12, "Access", 1, 0, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$count = 1;

if ($user->list_users() !== false) {
    foreach ($user->list_users() as $value) {
        extract($value);
        {
            $pdf->Cell(30, 12, $UserId, 0, 0, 'L');
            $pdf->Cell(40, 12, $FullName, 0, 0, 'L');
            $pdf->Cell(40, 12, $UserAddress, 0, 0, 'L');
            $pdf->Cell(40, 12, $ContactNum, 0, 0, 'L');
            $pdf->Cell(40, 12, $UserAccess, 0, 0, 'L');
            $pdf->Ln(6);
            $count++;
        }
    }
}

$pdf->SetFont('Arial', 'I', 12);
$pdf->Cell(176, 20, "--Nothing Follows--", 0, 0, 'C');
$pdf->Output();
?>
