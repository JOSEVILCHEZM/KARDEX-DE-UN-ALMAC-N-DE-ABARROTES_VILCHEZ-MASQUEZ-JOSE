<?php
require_once '../model/database.php';
require_once '../model/reporteK.php';
require_once '../model/reporteKProveedor.php';
    
$ReporteKProveedor = new ReporteKProveedor();

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>Operación</th>
          <th>Fecha</th>
          <th>DOC.</th>
          <th>Descripción</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>";                                 
    foreach($ReporteKProveedor ->ListarGeneral($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->tipo ."</td>
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