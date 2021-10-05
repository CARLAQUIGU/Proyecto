<?php
include 'fpdf.php';
require 'conexion.php';

class PDF extends FPDF
{
    function Header()
{
    //logo
$this->Image('imagen/escudo.png',55,10,100);
// tipo de letra
$this->SetFont('Arial','B',15);
// movernos a la derecha
$this-> Cell(2);
//titulo

$this->Write(100,'Reporte de Cargos');
//salto de linea
$this->Ln(60);
}
//pie de pagina
function Footer(){
    //posicion a 1,5 cm al final
$this->SetY(-15);
// Atial Italic
$this->SetFont ('Arial','I',8);
//Numeero de paginas 
$this->Image('imagen/pie.png',20,275,170);
$this->Write(10,'Av.  Illimani ,  Nro  1953 ,  Central Piloto : 2202153 -  Central  Telefonica  :  2202507 - 2202721 - 2202164 / Fax : 2201964 -2202650 - 2256320');
}
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(92, 132, 204);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'Nro',1,0,'C',1);
$pdf->Cell(160,10,'Cargo',1,1,'C',1);
$a=0;
$query="SELECT * from cargo";
$resultado=$con->query($query);
while ($row=$resultado->fetch_assoc())
{
    $a++;
$pdf->Cell(20,15,utf8_decode($a),1,0,'C');
$pdf->Cell(160,15,utf8_decode($row['cargo']),1,1,'C');

}
$pdf->Output();
?>