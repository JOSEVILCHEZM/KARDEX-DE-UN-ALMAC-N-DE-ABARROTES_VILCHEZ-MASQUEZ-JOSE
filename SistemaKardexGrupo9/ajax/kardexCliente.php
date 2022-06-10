<?php
require_once '../model/database.php';
require_once '../model/reporteK.php';
    
$ReporteK = new ReporteK();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>Fecha</th>
          <th>DOC.</th>
          <th>Cliente</th>
          <th>Kilos</th>
          <th>Precio</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>";                                 
    foreach($ReporteK ->Listar($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->fecha ."</td>
              <td>". $r->numdoc ."</td>
              <td>". $r->nombre ."</td>
              <td>". $r->cant ."</td>
              <td>". $r->preciouni ."</td>
              <td>". $r->total ."</td>
            </tr>";
   endforeach;

echo "<tbody>
      </table>";

?>