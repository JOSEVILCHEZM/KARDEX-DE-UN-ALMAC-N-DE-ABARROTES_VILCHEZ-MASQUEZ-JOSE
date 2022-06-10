<?php
require_once 'model/venta.php';
require_once 'model/cliente.php';

class VentaController{
    
    private $model;
    private $mensaje;
    private $oCliente;
    
    public function __CONSTRUCT(){
        $this->model = new Venta();
        $this->mensaje = array("nell", "nell");
        $this->oCliente = new Cliente();
    }
    
    public function Index(){
        $activar = 10;
        
        require_once 'view/header.php';
        require_once 'view/Venta/viewVenta.php';
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
        $oPreventa = new Venta();
        
        $subtotal = isset($_REQUEST['subtotal']) ? $_REQUEST['subtotal'] : '0';
        $total_a_pagar = isset($_REQUEST['total_a_pagar']) ? $_REQUEST['total_a_pagar'] : '0';
        
        /*
        if($subtotal == null){
            $subtotal = 0;
        } else {
            $subtotal = $_POST['subtotal'];
        }
        
        if($total_a_pagar == null){
            $total_a_pagar =0;
        } else {
            $subtotal = $_POST['total_a_pagar'];
        }
        */
    
        $oPreventa->id = $_REQUEST['id'];
        $oPreventa->id_cliente_fk = $_REQUEST['id_cliente_fk'];
        $oPreventa->medio_pago= $_REQUEST['medio_pago'];
        $oPreventa->moneda= $_REQUEST['moneda'];
        $oPreventa->ticket_de_venta= $_REQUEST['ticket_de_venta'];
        $oPreventa->subtotal= $subtotal;
        $oPreventa->descuento= $_REQUEST['descuento'];
        $oPreventa->total_a_pagar= $total_a_pagar;
        
        if($oPreventa->id > 0 ){
            $this->model->Actualizar($oPreventa);
            $this->mensaje=array("A", "Venta Actualizado Correctamente");
        }else{
            $this->model->Registrar($oPreventa);
            $this->mensaje=array("R", "Venta Registrado Correctamente");
        }
        
        $this -> Index();
        //header('Location: index.php');
    
    }
    
    public function Eliminar(){
        
        $this->model->EliminarProductosVenta($_REQUEST['ticket_de_venta']);
        $this->model->Eliminar($_REQUEST['id']);

        $this->mensaje=array("E", "Venta Eliminada Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }
    
}