<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(70, 10,utf8_decode('Reporte Créditos Cliente'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);

       /* $this->Cell(30,10,'Ticket',1,0,'C',0);*/
        /*$this->Cell(70,10,'Fecha',1,0,'C',0);
        $this->Cell(30,10,'T. Venta',1,0,'C',0);
        $this->Cell(30,10,'Saldo',1,0,'C',0);
        $this->Cell(30,10,'Amortizado',1,0,'C',0);
        $this->Cell(30,10,'Total',1,1,'C',0);*/
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}

require 'cn.php';

$idA = $id;

$consulta = "SELECT pago_credito_c.total_venta as total_venta,
cliente.nombre as nombre,cliente.aPaterno as apellido,
pago_credito_c.saldo as saldo,
pago_credito_c.amortizado as amortizado,
detalle_pago_credito_c.fecha as fecha,
detalle_pago_credito_c.ticket as ticket,
detalle_pago_credito_c.total as total
FROM pago_credito_c
INNER JOIN cliente
ON pago_credito_c.id_Cliente = cliente.id
INNER JOIN detalle_pago_credito_c
ON pago_credito_c.id = detalle_pago_credito_c.id_PagoCredito
WHERE pago_credito_c.id_Cliente=$idA";

$resultado = $mysqli->query($consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 15);

/*while($row = $resultado->fetch_assoc()){
    $pdf->Cell(30,10,$row['ticket'],1,0,'C',0);
    $pdf->Cell(70,10,$row['fecha'],1,0,'C',0);
    $pdf->Cell(30,10,$row['total_venta'],1,0,'C',0);
    $pdf->Cell(30,10,$row['saldo'],1,0,'C',0);
    $pdf->Cell(30,10,$row['amortizado'],1,0,'C',0);
    $pdf->Cell(30,10,$row['total'],1,1,'C',0);
}*/


$cliente=$resultado->fetch_assoc();
$pdf->Cell(20,10,'Nombre:',0,0,'C',0);
$pdf->Cell(100,10,$cliente['apellido']." ".$cliente['apellido'],0,0,'l',0);
$pdf->Cell(70,10,date("H:i:s"),0,1,'C',0);
$pdf->Ln(5);

$pdf->Cell(70,10,'Fecha',1,0,'C',0);
$pdf->Cell(30,10,'T. Venta',1,0,'C',0);
$pdf->Cell(30,10,'Saldo',1,0,'C',0);
$pdf->Cell(30,10,'Amortizado',1,0,'C',0);
$pdf->Cell(30,10,'Total',1,1,'C',0);
$extra=false;
do{  
    if($extra){
        $pdf->Cell(70,10,$row['fecha'],1,0,'C',0);
        $pdf->Cell(30,10,$row['total_venta'],1,0,'C',0);
        $pdf->Cell(30,10,$row['saldo'],1,0,'C',0);
        $pdf->Cell(30,10,$row['amortizado'],1,0,'C',0);
        $pdf->Cell(30,10,$row['total'],1,1,'C',0);
        
    }else{

        $pdf->Cell(70,10,$cliente['fecha'],1,0,'C',0);
        $pdf->Cell(30,10,$cliente['total_venta'],1,0,'C',0);
        $pdf->Cell(30,10,$cliente['saldo'],1,0,'C',0);
        $pdf->Cell(30,10,$cliente['amortizado'],1,0,'C',0);
        $pdf->Cell(30,10,$cliente['total'],1,1,'C',0);
    }
    $extra=true;
    
}while($row = $resultado->fetch_assoc());



$pdf->Output();
