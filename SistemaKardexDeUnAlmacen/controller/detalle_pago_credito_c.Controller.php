<?php

require_once 'model/pago_credito_c.php';
require_once 'model/detalle_pago_credito_c.php';
require_once 'model/cliente.php';
require_once 'controller/pago_credito_c.Controller.php';

class Detalle_pago_credito_cController{
    
    private $model;
    private $mensaje;
    private $oCliente;
    private $pago_credito_cCont;
    private $PagoCC;
    
    public function __CONSTRUCT(){
        $this->model = new Detalle_pago_credito_c();
        $this->mensaje = array("nell", "nell");
        $this->oCliente = new Cliente();
        $this->PagoCC=new Pago_credito_c();
        
        $this->pago_credito_cCont= new Pago_credito_cController();
        
    }
    
    
    
    public function Index(){
        $activar =13;
        
        require_once 'view/header.php';
        require_once 'view/PagoCreditoCliente/viewDetallePago_credito_c.php';
        require_once 'view/footer.php';
        
    }
    
    public function Crud(){
        $oCurso = new Curso();
        
        if(isset($_REQUEST['id'])){
            $oCurso = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/curso-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $oDetalle_pago_credito_c = new Detalle_pago_credito_c();

        $oDetalle_pago_credito_c->id = $_REQUEST['id_DetallePagoCredito'];
        $oDetalle_pago_credito_c->ticket = $_REQUEST['ticket'];
        $oDetalle_pago_credito_c->total = $_REQUEST['total'];
        $oDetalle_pago_credito_c->id_PagoCredito = $_REQUEST['id'];
        
        $this->pago_credito_cCont->ActualizarPagoCredito($_REQUEST['id'],$_REQUEST['total']);
        if($oDetalle_pago_credito_c->id > 0 ){
            $this->model->Actualizar($oDetalle_pago_credito_c);
            $this->mensaje=array("A", "Pago Crédito Actualizado Correctamente");
        }else{
            $this->model->Registrar($oDetalle_pago_credito_c);
            $this->mensaje=array("R", "Pago Crédito Registrado Correctamente");
        }
        
        $this -> pago_credito_cCont->Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->mensaje=array("E", "Pago Eliminado Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }
}