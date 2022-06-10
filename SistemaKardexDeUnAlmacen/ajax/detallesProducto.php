<?php
require_once '../model/database.php';
require_once '../model/producto.php';
    
$Producto= new Producto();

echo "<script> document.getElementById('id_pro').value="; 
echo $Producto->Obtener($_POST['id'])->id;
echo "</script>";
echo "<script> document.getElementById('can_pro').value="; 
echo $Producto->Obtener($_POST['id'])->cantidad;
echo "</script>";

echo "<script> document.getElementById('producto').value="; 
echo $Producto->Obtener($_POST['id'])->nombre;
echo "</script>";

echo "<script> document.getElementById('precio').value="; 
echo $Producto->Obtener($_POST['id'])->precio;
echo "</script>";

?>