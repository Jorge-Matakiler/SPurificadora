<?php 
require'fpdf/fpdf.php';

class PDF extends FPDF
{
      function Header()
      {
            $this->Image('imagenes/puri.jpg', 5, 5, 70 );
            $this->SetFont('Arial','B',15);
            $this->Cell(90);
            $this->Cell(90,10,'Dinero Total',0,0,'C');

            $this->Ln(45);
      }
      function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print current and total page numbers
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
 ?>