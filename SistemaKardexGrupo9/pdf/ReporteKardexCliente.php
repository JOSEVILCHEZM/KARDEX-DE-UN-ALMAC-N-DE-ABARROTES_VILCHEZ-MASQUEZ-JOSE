<?php

require 'fpdf/fpdf.php';




require 'cn.php';

$idA = $id;

$consulta = "SELECT pre_venta.fecha as fecha, 
cliente.numDocumento as numdoc, 
cliente.nombre as nombre,cliente.aPaterno as apellido,
productos_preventa.cantidad as cant, 
producto.precioUnitario as preciouni, 
productos_preventa.cantidad*producto.precioUnitario as total
FROM pre_venta
INNER JOIN cliente
ON pre_venta.id_cliente_fk = cliente.id
INNER JOIN productos_preventa
ON pre_venta.ticket_de_venta = productos_preventa.ticket_preventa_fk
INNER JOIN producto
ON productos_preventa.id_producto = producto.id
WHERE pre_venta.id_cliente_fk = $idA";

$resultado = $mysqli->query($consulta);






class PDF extends FPDF
{
    
    // Cabecera de página
    function Header()
    {
        $this->Ln(20);
        // Logo
        /*$this->Image('imagenes/fotoProductos/uua.jpg',10,8,33);*/
        // Arial bold 15
        $this->SetFont('Arial', 'B', 15);
        // Movernos a la derecha
        $this->Cell(50);
        // Título
        $this->Cell(100, 10, 'Reporte de kardex de Cliente', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);
 
/*
        $this->Cell(70,10,'Fecha',1,0,'C',0);
        $this->Cell(30,10,'Nombre',1,0,'C',0);
        $this->Cell(30,10,'Cantidad',1,0,'C',0);
        $this->Cell(30,10,'Precio',1,0,'C',0);
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
    
    function ConsultarCliente(){
        
    }

}


$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 15);



$cliente=$resultado->fetch_assoc();
$pdf->Cell(20,10,'Nombre:',0,0,'C',0);
$pdf->Cell(100,10,$cliente['nombre']." ".$cliente['apellido'],0,0,'l',0);
$pdf->Cell(70,10,date("H:i:s"),0,1,'C',0);
$pdf->Ln(5);

$pdf->Cell(100,10,'Fecha',1,0,'C',0);
/*$pdf->Cell(30,10,'Nombre',1,0,'C',0);*/
$pdf->Cell(30,10,'Cantidad',1,0,'C',0);
$pdf->Cell(30,10,'Precio',1,0,'C',0);
$pdf->Cell(30,10,'Total',1,1,'C',0);

$extra=false;
do{  
    if($extra){
        $pdf->Cell(100,10,$row['fecha'],1,0,'C',0);
        /*$pdf->Cell(30,10,$row['nombre'],1,0,'C',0);*/
        $pdf->Cell(30,10,$row['cant'],1,0,'C',0);
        $pdf->Cell(30,10,$row['preciouni'],1,0,'C',0);
        $pdf->Cell(30,10,$row['total'],1,1,'C',0);
        
    }else{

        $pdf->Cell(100,10,$cliente['fecha'],1,0,'C',0);
       /* $pdf->Cell(30,10,$cliente['nombre'],1,0,'C',0);*/
        $pdf->Cell(30,10,$cliente['cant'],1,0,'C',0);
        $pdf->Cell(30,10,$cliente['preciouni'],1,0,'C',0);
        $pdf->Cell(30,10,$cliente['total'],1,1,'C',0);
    }
    $extra=true;
    
}while($row = $resultado->fetch_assoc());

$pdf->Output();
