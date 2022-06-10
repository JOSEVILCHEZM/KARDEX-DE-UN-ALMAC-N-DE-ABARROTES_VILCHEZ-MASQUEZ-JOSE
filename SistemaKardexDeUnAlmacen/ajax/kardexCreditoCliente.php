<?php
require_once '../model/database.php';
require_once '../model/reporteCreditoC.php';
    
$ReporteCreditoC= new ReporteCreditoC();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>Total Venta</th>
          <th>Saldo</th>
          <th>Amortizado</th>
          <th>Fecha</th>
          <th>Ticket</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>";                                 
    foreach($ReporteCreditoC ->Listar($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->total_venta ."</td>
              <td>". $r->saldo ."</td>
              <td>". $r->amortizado ."</td>
              <td>". $r->fecha ."</td>
              <td>". $r->ticket ."</td>
              <td>". $r->total ."</td>
            </tr>";
   endforeach;

echo "<tbody>
      </table>";

?>