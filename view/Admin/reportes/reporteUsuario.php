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

$this->Write(100,'Reporte de Usuarios');
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
$pdf->Cell(75,10,'Nombre',1,0,'C',1);
$pdf->Cell(27,10,'Usuario',1,0,'C',1);
$pdf->Cell(27,10,'Distrito',1,0,'C',1);
$pdf->Cell(40,10,'Nivel',1,0,'C',1);
$pdf->Cell(20,10,'Foto',1,1,'C',1);


$query="SELECT concat(d.nombre,' ',d.paterno,' ',d.materno)as nombres ,u.usuario, u.nivel, u.foto, dis.distrito FROM usuario u 
                      inner join director_distrital d on d.id=u.id_director
                      inner join distrito dis on d.id_distrito=dis.id";
$resultado=$con->query($query);

while ($row=$resultado->fetch_assoc())
{
$pdf->Cell(75,25,utf8_decode($row['nombres']),1,0,'C');
$pdf->Cell(27,25,utf8_decode($row['usuario']),1,0,'C');
$pdf->Cell(27,25,utf8_decode($row['distrito']),1,0,'C');
if($row['nivel']==1){
    $pdf->Cell(40,25,utf8_decode('ADMINISTRADOR'),1,0,'C');
}else{

    $pdf->Cell(40,25,utf8_decode('DIRECTOR'),1,0,'C');
}
$pdf->Cell(20,25, $pdf->Image('../../../img/'.$row['foto'], $pdf->GetX(), $pdf->GetY(),20),1,1,'C');

}
$pdf->Output('I','Usuarios.pdf');
?>