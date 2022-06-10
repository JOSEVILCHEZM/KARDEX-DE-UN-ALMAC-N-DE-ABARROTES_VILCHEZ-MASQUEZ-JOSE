<?php
require_once 'model/pago_credito_p.php';
//require_once 'model/detalle_pago_credito_p.php';
require_once 'model/proveedor.php';
require_once 'model/compra.php';
//require_once 'controller/pago_credito_p.Controller.php';

class Pago_credito_pController{
    
    private $model;
    private $modelo;
    private $mensaje;
    private $oProveedor;
    private $oCompra;
    
    private $pago_credito_pCont;
    
    public function __CONSTRUCT(){
        $this->model = new Pago_credito_p();
        //$this->modelo = new Detalle_pago_credito_p();
        $this->mensaje = array("nell", "nell");
        $this->oProveedor = new Proveedor();
        
        $this->oCompra = new Compra();

        //$this->pago_credito_pCont= new Pago_credito_pController();
    }
    
    public function Index(){
        $activar =14;
        
        require_once 'view/header.php';
        require_once 'view/PagoCreditoProveedor/viewPago_credito_p.php';
        require_once 'view/footer.php';
        
    }
    
    public function Guardar(){
        
        /*

        $data = new Pago(); 

        $data->id_detalle_credito_p = $_REQUEST['id_detalle_credito_p'];
        $data->ticket = $_REQUEST['ticket'];
        $data->total = $_REQUEST['total'];
        $data->id_pago_credito_p_fk = $_REQUEST['id_credito_p'];
        
        //$this->pago_credito_cCont->ActualizarPagoCredito($_REQUEST['id'],$_REQUEST['total']);
        
        if($data->id_detalle_credito_p > 0 ){
            $this->modelo->Actualizar($data);
            $this->mensaje=array("A", "Pago Crédito Actualizado Correctamente");
        } else {
            $this->modelo->Registrar($data);
            $this->modelo->ActualizarPagoCreditoProveedor($data->id_detalle_credito_p,$data->total);
            $this->mensaje=array("R", "Pago Crédito Registrado Correctamente");
        }
        
        //$this -> pago_credito_pCont->Index();

        $this -> Index();
        */
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id_credito_p']);
        $this->mensaje=array("E", "Pago Eliminado Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    
    public function ActualizarPagoCredito($id,$cantidad)
	{
       $this->model->ActualizarPagoCreditoProveedor($id,$cantidad);
	}
    
}