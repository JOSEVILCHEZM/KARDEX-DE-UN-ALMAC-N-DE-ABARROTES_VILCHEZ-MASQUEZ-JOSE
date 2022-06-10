<?php
require_once 'model/cliente.php';

class ClienteController{
    
    private $model;
    private $mensaje;
    
    public function __CONSTRUCT(){
        $this->model = new Cliente();
        $this->mensaje = array("nell", "nell");
    }
    
    public function Index(){
        $activar=3;
        
        require_once 'view/header.php';
        require_once 'view/Mantenimiento/Cliente/viewCliente.php';
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
        $oCliente = new Cliente();
        
        $oCliente->id = $_REQUEST['id'];
        $oCliente->tipoPersona = $_REQUEST['tipoPersona'];
        $oCliente->tipoDocumento= $_REQUEST['tipoDocumento'];
        $oCliente->numDocumento= $_REQUEST['numDocumento'];
        $oCliente->nombre= $_REQUEST['nombre'];
        $oCliente->aPaterno= $_REQUEST['aPaterno'];
        $oCliente->aMaterno= $_REQUEST['aMaterno'];
        $oCliente->sexo= $_REQUEST['sexo'];
        $oCliente->direccion = $_REQUEST['direccion'];
        $oCliente->referencia= $_REQUEST['referencia'];
        $oCliente->telefono= $_REQUEST['telefono'];
        $oCliente->tefAdicional= $_REQUEST['tefAdicional'];
        $oCliente->correo= $_REQUEST['correo'];
        $oCliente->razonSocial= $_REQUEST['razonSocial'];
        $oCliente->estado= $_REQUEST['estado'];
        
        if($oCliente->id > 0 ){
            $this->model->Actualizar($oCliente);
            $this->mensaje=array("A", "Cliente Actualizado Correctamente");
        }else{
            $this->model->Registrar($oCliente);
            $this->mensaje=array("R", "Cliente Registrado Correctamente");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $num=$this->model->Eliminar($_REQUEST['id']);
        
        if($num==0){
           $this->mensaje=array("I", "No se puede eliminar tiene operaciones "); 
        }else{
            $this->mensaje=array("E", "Cliente Eliminado Correctamente ");
        }
        
        
        $this -> Index();
        //header('Location: index.php');
    }
}