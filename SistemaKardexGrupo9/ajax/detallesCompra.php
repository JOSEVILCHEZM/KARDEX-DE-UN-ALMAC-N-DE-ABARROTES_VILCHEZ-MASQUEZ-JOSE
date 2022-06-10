<?php

require_once '../model/database.php';
require_once '../model/productos_compra.php';
require_once '../model/producto.php';

$lProductosCompra = new ProductoCompra();
$Producto= new Producto();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Producto</th>
          <th>Ticket</th>
          <th>Cantidad</th>
  
          <th>Precio unitario</th>
         
          <th>Total</th>
      
        </tr>
        </thead>
        <tbody>";                                 
$i=1; foreach($lProductosCompra->Listar($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->id_productos_compra ."</td>
              <td>". $Producto->Obtener($r->id_producto_fk)->nombre ."</td>
              <td>". $r->ticket_compra_fk ."</td>
              <td>". $r->cantidad ."</td>
           
              <td>". $r->precio_unitario ."</td>
             
              <td>". $r->total ."</td>
             
            </tr>";
   endforeach;

echo "<tbody>
      </table>";


?>