<?php 
require_once '../model/database.php';
require_once '../model/producto.php';
require_once '../model/trabajador.php';


$oProducto =new Producto();
$oProducto=$oProducto->Obtener($_POST['id_Producto']);
$numFila=$_POST['id'];
$precio;
$nombre;
if($oProducto!=null){
    $precio=$oProducto->precioUnitario;
    $nombre=$oProducto->nombre;
}else{
    $precio=0;
    $nombre="NO EXISTE";
}
?>
   

   
<script> 
    $("#precio"+<?php echo $numFila?>).val("<?php  echo $precio ?>");
    $("#nombre"+<?php echo $numFila?>).val("<?php  echo $nombre ?>");
</script>

