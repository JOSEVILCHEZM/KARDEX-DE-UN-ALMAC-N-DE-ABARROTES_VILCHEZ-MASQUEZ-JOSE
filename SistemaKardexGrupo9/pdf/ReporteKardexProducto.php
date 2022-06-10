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
        $this->Cell(70, 10, 'Reporte de kardex', 0, 0, 'C');
        // Salto de línea
        $this->Ln(20);

        $this->Cell(40,10,'numdoc',1,0,'C',0);
        $this->Cell(40,10,'nombre',1,0,'C',0);
        $this->Cell(40,10,'cant',1,0,'C',0);
        $this->Cell(40,10,'preciouni',1,0,'C',0);
        $this->Cell(30,10,'total',1,1,'C',0);

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

$id = 7;

/*
$this->pdo = Database::StartUp(); 

$stm = $this->pdo->prepare("SELECT pre_venta.fecha as fecha, 
cliente.numDocumento as numdoc, 
cliente.nombre as nombre, 
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
WHERE pre_venta.id_cliente_fk = ?");

$stm->execute(array($id));

$resultado = $stm->fetchAll(PDO::FETCH_OBJ);
*/

$consulta = "SELECT pre_venta.fecha as fecha, 
cliente.numDocumento as numdoc, 
cliente.nombre as nombre, 
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
WHERE pre_venta.id_cliente_fk = $id";

$resultado = $mysqli->query($consulta);

$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 15);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40,10,$row['numdoc'],1,0,'C',0);
    $pdf->Cell(40,10,$row['nombre'],1,0,'C',0);
    $pdf->Cell(40,10,$row['cant'],1,0,'C',0);
    $pdf->Cell(40,10,$row['preciouni'],1,0,'C',0);
    $pdf->Cell(30,10,$row['total'],1,1,'C',0);
}

$pdf->Output();
