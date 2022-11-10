<?php 
require'fpdf/fpdf.php';

$pdf = new FPDF('L','mm','legal');

//$pdf= new FPDF();
$pdf->AddPage();
//el primer parametro es para indicar tipo de letra, el segundo el estilo negrita, subrayada etc., y el utlimo el tamaño de la letra
$pdf->SetFont('Arial','B',15);
//cell es para crear las celdas sus parametros son:
//tamaño horizontal de la celda, vertical, el texto,borde (0 o 1), el enter o espacio (0 o 1), y al final (L,R,C) es donde quedara el texto
$pdf->SetXY(100,50);
//$pdf->SetX(150);
$pdf->Cell(90,10,'Hola',1,1,'C');
$y=$pdf->GetY();
$pdf->SetY($y+10);
$pdf->Cell(90,10,'Mundo',1,1,'C');
$pdf->Cell(90,10,'Mundo',1,0,'C');
$pdf->Cell(90,10,'Mundo',1,0,'C');
//esta mejor el multicell
/*$pdf->MultiCell(90,10,'ojhsadifhpodhsfopiqhweoprfnjhdokfnoiujhhqopiweuyrpoiuadsfgklasdnjfiqawhefndnsaop;fihoipqwehflkjdhsanl    fgkjhgdaiojgkmb',1,'c',0);*/

$pdf->output();
 ?>
<?php 
require'fpdf/fpdf.php';


$pdf = new FPDF;
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(90,10,'Hola',1,1,'C');
$pdf->output();


 ?>