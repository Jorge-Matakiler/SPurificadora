<?php                 

    include 'reporte1.php';
    require("conexion.php");
    $pdf = new PDF/*('L','mm')*/;
    
    $pdf->AliasNbPages();
    $pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(30,6,'Desde',1,0,'C',1);
$pdf->Cell(30,6,'Hasta',1,0,'C',1);
$pdf->Cell(30,6,'Cantidad',1,0,'C',1);
$pdf->Cell(30,6,'Marca',1,0,'C',1);
$pdf->Cell(30,6,'Tipo',1,0,'C',1);
$pdf->Cell(30,6,'Total',1,1,'C',1);
                    if(isset($_GET['from_date']) && isset($_GET['to_date']))
                                {
                                    $from_date = $_GET['from_date'];
                                    $to_date = $_GET['to_date'];
                                    $query = "SELECT     ventas.Fecha, ventas.Cantidad, ventas.Marca, ventas.Tipo, ventas.Total FROM ventas WHERE Fecha BETWEEN '$from_date' AND '$to_date' ";
                                    $query_run = mysqli_query($conexion, $query);
                                     if(mysqli_num_rows($query_run) > 0)
                                    {    
                                while ($fila = $query_run->fetch_assoc()){?>
<?php
$pdf->SetFont('Arial','',9);
$pdf->Cell(30,6,$fila['Fecha'],1,0,'C',1);
$pdf->Cell(30,6,$fila['Fecha'],1,0,'C',1);
$pdf->Cell(30,6,$fila['Cantidad'],1,0,'C',1);
$pdf->Cell(30,6,$fila['Marca'],1,0,'C',1);
$pdf->Cell(30,6,$fila['Tipo'],1,0,'C',1);
$pdf->Cell(30,6,'$'.$fila['Total'].'.00',1,1,'C',1); 
        }
    }
}
$pdf->output(); 
?>