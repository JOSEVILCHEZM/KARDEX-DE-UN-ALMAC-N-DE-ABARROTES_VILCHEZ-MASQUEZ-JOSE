<?php
require_once '../model/database.php';
require_once '../model/reporteCreditoP.php';
    
$ReporteCreditoP = new ReporteCreditoP();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>Deuda</th>
          <th>Total Crédito</th>
          <th>Fecha</th>
          <th>Ticket</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>";                                 
    foreach($ReporteCreditoP ->Listar($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->deuda ."</td>
              <td>". $r->totalcredito ."</td>
              <td>". $r->fecha ."</td>
              <td>". $r->ticket ."</td>
              <td>". $r->total ."</td>
            </tr>";
   endforeach;

echo "<tbody>
      </table>";

?>