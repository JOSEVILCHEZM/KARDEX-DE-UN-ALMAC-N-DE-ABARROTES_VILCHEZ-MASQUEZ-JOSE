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
        $this->Cell(70, 10,utf8_decode('Reporte Créditos Proveedor'), 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        /*$this->Cell(30,10,'Ticket',1,0,'C',0);
        $this->Cell(50,10,'Fecha',1,0,'C',0);
        $this->Cell(40,10,'Deuda',1,0,'C',0);
        $this->Cell(40,10,utf8_decode('Total Crédito'),1,0,'C',0);
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

$consulta = "SELECT pago_credito_p.deuda as deuda,
pago_credito_p.total as totalcredito,
proveedor.razonSocial as apellido,
detalle_pago_credito_p.fecha as fecha,
detalle_pago_credito_p.ticket as ticket,
detalle_pago_credito_p.total as total
FROM pago_credito_p
INNER JOIN proveedor
ON pago_credito_p.id_proveedor_fk = proveedor.id
INNER JOIN detalle_pago_credito_p
ON pago_credito_p.id_credito_p = detalle_pago_credito_p.id_pago_credito_p_fk
WHERE pago_credito_p.id_proveedor_fk=$idA";

$resultado = $mysqli->query($consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 15);

/*while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40,10,$row['deuda'],1,0,'C',0);
    $pdf->Cell(40,10,$row['totalcredito'],1,0,'C',0);
    $pdf->Cell(50,10,$row['fecha'],1,0,'C',0);
    $pdf->Cell(30,10,$row['ticket'],1,0,'C',0);
    $pdf->Cell(30,10,$row['total'],1,1,'C',0);
}*/

$proveedor=$resultado->fetch_assoc();
$pdf->Cell(20,10,'Nombre:',0,0,'C',0);
$pdf->Cell(100,10,$proveedor['apellido'],0,0,'l',0);
$pdf->Cell(70,10,date("H:i:s"),0,1,'C',0);
$pdf->Ln(5);

$pdf->Cell(30,10,'Ticket',1,0,'C',0);
$pdf->Cell(50,10,'Fecha',1,0,'C',0);
$pdf->Cell(40,10,utf8_decode('Total Crédito'),1,0,'C',0);
$pdf->Cell(40,10,'Deuda',1,0,'C',0);
$pdf->Cell(30,10,'Total',1,1,'C',0);

$extra=false;
do{  
    if($extra){
        $pdf->Cell(30,10,$row['ticket'],1,0,'C',0);
        $pdf->Cell(50,10,$row['fecha'],1,0,'C',0);
        $pdf->Cell(40,10,$row['totalcredito'],1,0,'C',0);
        $pdf->Cell(40,10,$row['deuda'],1,0,'C',0);
        $pdf->Cell(30,10,$row['total'],1,1,'C',0);
        
    }else{

        $pdf->Cell(30,10,$proveedor['ticket'],1,0,'C',0);
        $pdf->Cell(50,10,$proveedor['fecha'],1,0,'C',0);
        $pdf->Cell(40,10,$proveedor['totalcredito'],1,0,'C',0);
        $pdf->Cell(40,10,$proveedor['deuda'],1,0,'C',0);
        $pdf->Cell(30,10,$proveedor['total'],1,1,'C',0);
    }
    $extra=true;
    
}while($row = $resultado->fetch_assoc());




$pdf->Output();
