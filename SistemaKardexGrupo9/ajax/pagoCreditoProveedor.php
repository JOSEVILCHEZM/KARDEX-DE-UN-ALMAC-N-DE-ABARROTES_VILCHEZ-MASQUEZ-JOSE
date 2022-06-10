<?php
require_once '../model/database.php';
require_once '../model/pago_credito_p.php';
    
$Pago_credito_p = new Pago_credito_p();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Ticket</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>";                                 
    foreach($Pago_credito_p ->ListaDetallesPagoCreditoProveedor($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->id_detalle_credito_p ."</td>
              <td>". $r->fecha ."</td>
              <td>". $r->ticket ."</td>
              <td>". $r->total ."</td>
            </tr>";
   endforeach;

echo "<tbody>
      </table>";

?>