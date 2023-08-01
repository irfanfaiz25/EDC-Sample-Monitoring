<?php
require '../assets/fpdf185/fpdf.php';
// include '../fungsi.php';

// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

$pdf->SetFont('Times', 'B', 13);
$pdf->Cell(280, 10, 'DATA BUKU', 0, 0, 'C');

$pdf->Cell(10, 7, '', 0, 1);
$pdf->Cell(280, 10, 'PERPUSTAKAAN SD NEGERI CATUR', 0, 0, 'C');

$pdf->Cell(10, 15, '', 0, 1);
$pdf->SetFont('Times', 'B', 9);
$pdf->Cell(8, 7, 'NO', 1, 0, 'C');
$pdf->Cell(30, 7, 'NISN', 1, 0, 'C');
$pdf->Cell(55, 7, 'NAMA', 1, 0, 'C');
$pdf->Cell(20, 7, 'KELAS', 1, 0, 'C');
$pdf->Cell(55, 7, 'JENIS KELAMIN', 1, 0, 'C');


$pdf->Cell(10, 7, '', 0, 1);
$pdf->SetFont('Times', '', 10);
$pdf->Cell(8, 6, 1, 1, 0, 'C');
$pdf->Cell(30, 6, 'faiz', 1, 0);
$pdf->Cell(55, 6, 'hai', 1, 0);
$pdf->Cell(20, 6, 'halo', 1, 0);
$pdf->Cell(55, 6, 'Z', 1, 1);

$pdf->Output();
