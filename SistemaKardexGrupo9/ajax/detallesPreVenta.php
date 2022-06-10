<?php

require_once '../model/database.php';
require_once '../model/productos_venta.php';
require_once '../model/producto.php';

$lProductosVenta = new ProductoVenta();
$Producto= new Producto();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Ticket</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>";                                 
$i=1; foreach($lProductosVenta->Listar($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->id_preventa ."</td>
              <td>". $Producto->Obtener($r->id_producto)->nombre ."</td>
              <td>". $r->cantidad ."</td>
              <td>". $r->ticket_preventa_fk ."</td>
              <td>". (($Producto->Obtener($r->id_producto)->precioUnitario)*($r->cantidad)) ."</td>
            </tr>";
   endforeach;

echo "<tbody>
      </table>";
      
?>