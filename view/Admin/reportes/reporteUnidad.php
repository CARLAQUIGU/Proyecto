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

$this->Write(100,'Reporte de Unidad Educativa');
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
$this->Image('imagen/pie.png',20,270,170);
$this->Write(10,'Av.  Illimani ,  Nro  1953 ,  Central Piloto : 2202153 -  Central  Telefonica  :  2202507 - 2202721 - 2202164 / Fax : 2201964 -2202650 - 2256320');
}
}
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetFillColor(92, 132, 204);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(20,10,'Cod Sie',1,0,'C',1);
$pdf->Cell(70,10,'Nombre',1,0,'C',1);
$pdf->Cell(50,10,'Direccion',1,0,'C',1);
$pdf->Cell(10,10,'Es',1,0,'C',1);
$pdf->Cell(20,10,'Tipo',1,0,'C',1);
$pdf->Cell(20,10,'Distrito',1,1,'C',1);

$query="SELECT u.cod_sie, u.nombre, u.direccion, u.espacio, u.tipo,d.distrito , u.id_distrito FROM unidad_educativa u 
        inner join distrito d on u.id_distrito=d.id  where u.estado=1 ";
$resultado=$con->query($query);

while ($row=$resultado->fetch_assoc())
{
$pdf->Cell(20,25,utf8_decode($row['cod_sie']),1,0,'C');
$pdf->Cell(70,25,utf8_decode($row['nombre']),1,0,'C');
$pdf->Cell(50,25,utf8_decode($row['direccion']),1,0,'C');
$pdf->Cell(10,25,utf8_decode($row['espacio']),1,0,'C');
$pdf->Cell(20,25,utf8_decode($row['tipo']),1,0,'C');
$pdf->Cell(20,25,utf8_decode($row['distrito']),1,1,'C');

}
$pdf->Output('I','Usuarios.pdf');
?>