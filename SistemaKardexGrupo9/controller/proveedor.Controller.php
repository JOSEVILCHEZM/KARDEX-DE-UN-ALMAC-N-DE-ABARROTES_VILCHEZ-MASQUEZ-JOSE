<?php
require_once 'model/proveedor.php';

class ProveedorController{
    
    private $model;
    private $mensaje;
    
    public function __CONSTRUCT(){
        $this->model = new Proveedor();
        $this->mensaje = array("nell", "nell");
    }
    
    public function Index(){
        $activar=2;
        
        require_once 'view/header.php';
        require_once 'view/Mantenimiento/Perfil/viewProveedor.php';
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
        $oProveedor = new Proveedor();
        
        $oProveedor->id = $_REQUEST['id'];
        $oProveedor->documento = $_REQUEST['documento'];
        $oProveedor->numDocumento= $_REQUEST['numDocumento'];
        $oProveedor->razonSocial= $_REQUEST['razonSocial'];
        $oProveedor->direccioin= $_REQUEST['direccion'];
        $oProveedor->referencia= $_REQUEST['referencia'];
        $oProveedor->telefono= $_REQUEST['telefono'];
        $oProveedor->tefAdicional= $_REQUEST['tefAdicional'];
        $oProveedor->estado= $_REQUEST['estado'];
        
        if($oProveedor->id > 0 ){
            $this->model->Actualizar($oProveedor);
            $this->mensaje=array("A", "Proveedor Actualizado Correctamente");
        }else{
            $this->model->Registrar($oProveedor);
            $this->mensaje=array("R", "Proveedor Registrado Correctamente");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $num = $this->model->Eliminar($_REQUEST['id']);
        if($num==0){
           $this->mensaje=array("I", "No se puede eliminar tiene operaciones "); 
        }else{
            $this->mensaje=array("E", "Cliente Eliminado Correctamente ");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
}