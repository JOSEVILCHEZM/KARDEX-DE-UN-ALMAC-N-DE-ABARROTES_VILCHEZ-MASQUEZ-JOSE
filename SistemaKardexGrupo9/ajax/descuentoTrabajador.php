<?php
require_once '../model/database.php';
require_once '../model/descuento.php';
require_once '../model/trabajador.php';
    
$lDescuentos = new Descuento();
$Trabajador= new Trabajador();
$s= new Trabajador();
$totalDescuento=0;

echo  "<table id='example1' class='table table-bordered table-striped table-responsive-sm'>
        <thead>
        <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>Motivo</th>
          <th>Monto</th>
        </tr>
        </thead>
        <tbody>";                                 
$i=1; foreach($lDescuentos->ListaDescuentosTrabajador($_POST['id']) as $r):                                           
     echo   "<tr>  
              <td>". $r->id ."</td>
              <td>". $r->fecha ."</td>
              <td>". $r->motivo ."</td>
              <td>". $r->monto ."</td>
            </tr>";
            $totalDescuento+=$r->monto ;
   endforeach;

echo "<tbody>
      </table>";

echo "<script> document.getElementById('totalDescuento').value=".$totalDescuento."</script>";
echo "<script> document.getElementById('salario').value="; 
echo $Trabajador->Obtener($_POST['id'])->salario ;
echo "</script>";
echo "<script> document.getElementById('total').value="; 
echo $Trabajador->Obtener($_POST['id'])->salario - $totalDescuento ;
echo "</script>";


?>