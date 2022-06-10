<?php
require_once '../model/database.php';
require_once '../model/pago_credito_c.php';
    
$Pago_credito_c = new Pago_credito_c();

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
    foreach($Pago_credito_c ->ListaDetallesPagoCredito($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->id ."</td>
              <td>". $r->fecha ."</td>
              <td>". $r->ticket ."</td>
              <td>". $r->total ."</td>
            </tr>";
   endforeach;

echo "<tbody>
      </table>";

/*echo "<script> document.getElementById('totalDescuento').value=".$totalDescuento."</script>";
echo "<script> document.getElementById('salario').value="; 
echo $Trabajador->Obtener($_POST['id'])->salario ;
echo "</script>";
echo "<script> document.getElementById('total').value="; 
echo $Trabajador->Obtener($_POST['id'])->salario - $totalDescuento ;
echo "</script>";*/


?>