<?php
require_once 'model/producto.php';

class ProductoController{
    
    private $model;
    private $mensaje;
    
    public function __CONSTRUCT(){
        $this->model = new Producto();
        $this->mensaje = array("nell", "nell");
    }
    
    public function Index(){
        $activar=4;
        
        require_once 'view/header.php';
        require_once 'view/Mantenimiento/Producto/viewProducto.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $oProveedor = new Proveedor();
        
        if(isset($_REQUEST['id'])){
            $oProveedor = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/curso-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $oProducto = new Producto();
 
        $oProducto->id = $_REQUEST['id'];       
        $oProducto->nombre= $_REQUEST['nombre'];
        $oProducto->descripcion= $_REQUEST['descripcion'];
        $oProducto->cantidad= $_REQUEST['cantidad'];
        $oProducto->unidad= $_REQUEST['unidad'];
        $oProducto->precioUnitario= $_REQUEST['precioUnitario'];
        $oProducto->moneda= $_REQUEST['moneda'];
        $oProducto->estado= $_REQUEST['estado'];
        
        
        
        
        if ($_FILES['imagen']!=null)
        { 
            if($_FILES['imagen']['name']!=""){
                
                $archivo = $oProducto->nombre.$_FILES['imagen']['name'];
                $ruta = "imagenes/fotoProductos/" . $archivo;
                move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
                $oProducto->imagen = $archivo;
                /*Para eliminar la foto anterior*/
                if($oProducto->id > 0){
                    if($this->model->Obtener($oProducto->id)->imagen!="foto-producto.png"){
                    /*$oProducto->imagen = $this->model->Obtener($oProducto->id)->imagen;*/  
                        if(file_exists ( "imagenes/fotoProductos/".$this->model->Obtener($oProducto->id)->imagen )){
                            
                            unlink("imagenes/fotoProductos/".$this->model->Obtener($oProducto->id)->imagen);
                        }
                        
                    }
                }
            }else{
                if($oProducto->id > 0){
                    $oProducto->imagen = $this->model->Obtener($oProducto->id)->imagen;
                }else{
                    
                    $oProducto->imagen = "foto-producto.png";
                }
            }
        }
        
        
        
        
        if($oProducto->id > 0 ){
            
            $this->model->Actualizar($oProducto);
            $this->mensaje=array("A", "Producto Actualizado Correctamente");
        }else{
            $this->model->Registrar($oProducto);
            $this->mensaje=array("R", "Producto Registrado Correctamente");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $num =$this->model->Eliminar($_REQUEST['id']);
        if($num==0){
           $this->mensaje=array("I", "No se puede eliminar tiene operaciones "); 
        }else{
            $this->mensaje=array("E", "Cliente Eliminado Correctamente ");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
}