<?php 
include 'reporte2.php';
require 'conexion.php';

$consulta="SELECT  Fecha,Cantidad,Marca,Tipo, max(Total) as maxi FROM ventas"; 
$resultado = mysqli_query($conexion,$consulta);

//-----------------------------------------------------------------

$consulta2="SELECT  Fecha,Cantidad,Marca,Tipo, min(Total) as mini FROM ventas"; 
$resultado2 = mysqli_query($conexion,$consulta2);

//-----------------------------------------------------------------

$pdf = new PDF/*('L','mm')*/;
$pdf->AliasNbPages();
$pdf->AddPage();
//-----------------------------------------------------------------
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(37,6,'Fecha',1,0,'C',1);
$pdf->Cell(37,6,'Cantidad',1,0,'C',1);
$pdf->Cell(37,6,'Marca',1,0,'C',1);
$pdf->Cell(37,6,'Tipo',1,0,'C',1);
$pdf->Cell(37,6,'Total',1,1,'C',1);
//-----------------------------------------------------------------
$pdf->SetFont('Arial','',10);
while ($row = $resultado->fetch_assoc()) {
$pdf->Cell(37,6,$row['Fecha'],1,0,'C',1);
$pdf->Cell(37,6,$row['Cantidad'],1,0,'C',1);
$pdf->Cell(37,6,$row['Marca'],1,0,'C',1);
$pdf->Cell(37,6,$row['Tipo'],1,0,'C',1);
$query="SELECT max(Total) as 'maxi' FROM ventas";
      $resu = mysqli_query($conexion,$query);
      $data= mysqli_fetch_array($resu);
      $maxi = $data['maxi'];
$pdf->Cell(37,6,$row['maxi'],1,1,'C',1);
}
//-----------------------------------------------------------------
$pdf->SetFont('Arial','',10);
while ($row = $resultado2->fetch_assoc()) {
$pdf->Cell(37,6,$row['Fecha'],1,0,'C',1);
$pdf->Cell(37,6,$row['Cantidad'],1,0,'C',1);
$pdf->Cell(37,6,$row['Marca'],1,0,'C',1);
$pdf->Cell(37,6,$row['Tipo'],1,0,'C',1);
$query2="SELECT min(Total) as 'mini' FROM ventas";
      $resu2 = mysqli_query($conexion,$query2);
      $data= mysqli_fetch_array($resu2);      
      $mini = $data['mini'];
$pdf->Cell(37,6,$row['mini'],1,1,'C',1);
}
$pdf->output();
 ?>