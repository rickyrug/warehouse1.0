<?php
require('../fpdf.php');

$pdf = new FPDF('P','mm','A5');
$pdf->SetMargins(0,0);
$pdf->AddPage();
$pdf->Image('tl_blanco_2.jpg',0,0,148);
$pdf->SetFont('Arial','B',16);


$pdf->Output();
?>
