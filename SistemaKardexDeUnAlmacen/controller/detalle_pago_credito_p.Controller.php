<?php
//require_once 'model/pago_credito_p.php';
require_once 'model/detalle_pago_credito_p.php';
require_once 'model/proveedor.php';
require_once 'controller/pago_credito_p.Controller.php';

class Detalle_pago_credito_pController{
    
    private $modelo;
    private $mensaje;
    private $oProveedor;
    private $pago_credito_pCont;
    
    public function __CONSTRUCT(){
        
        $this->modelo = new Detalle_pago_credito_p();
        $this->mensaje = array("nell", "nell");
        $this->oProveedor = new Proveedor();

        $this->pago_credito_pCont= new Pago_credito_pController();
        
    }
    
    
    public function Index(){
        $activar =13;
        
        require_once 'view/header.php';
        require_once 'view/PagoCreditoCliente/viewPago_credito_c.php';
        require_once 'view/footer.php';
        
    }
    
    
    
    public function Guardar(){
        
        $oDetalle_pago_credito_p = new Detalle_pago_credito_p();

        $oDetalle_pago_credito_p->id_detalle_credito_p = $_REQUEST['id_detalle_credito_p'];
        $oDetalle_pago_credito_p->ticket = $_REQUEST['ticketPago'];
        $oDetalle_pago_credito_p->total = $_REQUEST['totalPagar'];
        $oDetalle_pago_credito_p->id_pago_credito_p_fk = $_REQUEST['id_credito_p'];
        
        //$this->pago_credito_cCont->ActualizarPagoCredito($_REQUEST['id'],$_REQUEST['total']);

        if($oDetalle_pago_credito_p->id_detalle_credito_p > 0 ){
            $this->modelo->Actualizar($oDetalle_pago_credito_p);
            $this->mensaje=array("A", "Pago Crédito Actualizado Correctamente");
        } else {
            $this->modelo->Registrar($oDetalle_pago_credito_p);
            $this->modelo->ActualizarPagoCreditoProveedor($oDetalle_pago_credito_p->id_pago_credito_p_fk,$oDetalle_pago_credito_p->total);
            $this->mensaje=array("R", "Pago Crédito Registrado Correctamente");
        }
        
        $this -> pago_credito_pCont->Index();

    }
    
    public function Eliminar(){
        $this->modelo->Eliminar($_REQUEST['id']);
        $this->mensaje=array("E", "Pago Eliminado Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }

}