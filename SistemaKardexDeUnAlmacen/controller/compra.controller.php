<?php
require_once 'model/compra.php';
require_once 'model/proveedor.php';
require_once 'model/pago_credito_p.php';

class CompraController
{

    private $model;
    private $modelo;
    private $mensaje;
    private $oProveedor;

    public function __CONSTRUCT()
    {
        $this->model = new Compra();
        $this->mensaje = array("nell", "nell");
        $this->oProveedor = new Proveedor();

        //$this->modelo = new Pago_credito_p();
    }

    public function Index()
    {
        $activar = 11;

        require_once 'view/header.php';
        require_once 'view/Compra/viewCompra.php';
        require_once 'view/footer.php';
    }

    public function Guardar()
    {

        $oPagoCredito = new Pago_credito_p();
        
        $oPagoCredito->id_proveedor_fk = $_REQUEST['id_proveedor_fk'];
        $oPagoCredito->id_compra_fk = $_REQUEST['ticket_de_compra'];
        $oPagoCredito->deuda = $_REQUEST['totalL'];
        $oPagoCredito->total = $_REQUEST['totalL'];
        $oPagoCredito->estado = 0;


        $oCompra = new Compra();
        
        /*
        $subtotal = isset($_REQUEST['subtotal']) ? $_REQUEST['subtotal'] : '0';
        $total_a_pagar = isset($_REQUEST['total_a_pagar']) ? $_REQUEST['total_a_pagar'] : '0';
        */
    
        $oCompra->id_compra = $_REQUEST['id_compra'];
        $oCompra->ticket_de_compra = $_REQUEST['ticket_de_compra'];
        $oCompra->precio_unitario_pollo = 111;
        $oCompra->peso_total_pollo = 0;
        $oCompra->id_proveedor_fk = $_REQUEST['id_proveedor_fk'];
        $oCompra->medio_pago = $_REQUEST['medio_pago'];
        $oCompra->moneda = $_REQUEST['moneda'];
        $oCompra->peso_agua = 222;
        
        $oCompra->precio_unitario_agua = 1;
        $oCompra->total_bandejas = 1;
        $oCompra->subtotal = $_REQUEST['subtotal'];
        $oCompra->total = $_REQUEST['totalL'];

        if($oCompra->id_compra > 0 ){
            $this->model->Actualizar($oCompra);
            $this->mensaje=array("A", "Compra Actualizado Correctamente");
        }else{
            $this->model->Registrar($oCompra);
            $this->model->RegistraProductoCompra(count($_POST["producto"]),$_POST["producto"],$_POST["ticket_de_compra"],$_POST["cantidad"],1,1,$_POST["precio"],1,$_POST["total"],1);
            
            // Verificamos si existe un crédito creado por el proveedor

            // Primero si es crédito 
            
            if($oCompra->medio_pago == 1){ // ES A CRÉDITO 
  
                $oCo = $this->model->ObtenerCredito($oCompra->id_proveedor_fk);

                $this->model->RegistrarPagoCreditoP($oPagoCredito);

                /*
                if($oCo == null){ // SI NO EXISTE 
                    $this->model->RegistrarPagoCreditoP($oPagoCredito);
                } else {
                    $this->model->ActualizarTotal($oPagoCredito->deuda+$oCo->deuda,$oCo->id_credito_p);
                }
                */
                
            }

            $this->mensaje=array("R", "Compra Registrado Correctamente");
        }

        $this -> Index();
        
    }

    public function Eliminar()
    {

        $this->model->EliminarProductosCompra($_REQUEST['ticket_de_compra']);
        $this->model->Eliminar($_REQUEST['id']);

        $this->mensaje = array("E", "Compra Eliminada Correctamente");

        $this->Index();
        
    }


}
