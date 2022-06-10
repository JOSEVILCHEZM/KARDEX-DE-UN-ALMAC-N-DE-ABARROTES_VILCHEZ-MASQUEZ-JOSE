<?php
require_once 'model/reporteK.php';
require_once 'model/reporteCreditoC.php';
require_once 'model/reporteCreditoP.php';

require_once 'model/cliente.php';
require_once 'model/proveedor.php';

class ReporteKController{
    
    private $model;
    private $mensaje;
    private $oProveedor;

    public function __CONSTRUCT(){
        
        $this->model = new ReporteK();
        $this->model2 = new ReporteCreditoC();
        $this->model2 = new ReporteCreditoP();

        $this->mensaje = array("nell", "nell");

        $this->oCliente = new Cliente();
        $this->oProveedor= new Proveedor();
    }
    
    public function Index(){
        $activar=15;
        
        require_once 'view/header.php';
        require_once 'view/Reporte/viewKardex.php';
        require_once 'view/footer.php';
    }
    
    public function ViewKProveedor(){
        $activar=18;
        
        require_once 'view/header.php';
        require_once 'view/Reporte/viewKardexProveedor.php';
        require_once 'view/footer.php';
    }

    public function ViewKGeneral(){
        $activar=19;
        
        require_once 'view/header.php';
        require_once 'view/Reporte/viewKardexGeneral.php';
        require_once 'view/footer.php';
    }

    public function Cliente(){
        $activar=16;
        
        require_once 'view/header.php';
        require_once 'view/Reporte/viewCreditoCliente.php';
        require_once 'view/footer.php';

    }

    public function Proveedor(){
        $activar=17;
        
        require_once 'view/header.php';
        require_once 'view/Reporte/viewCreditoProveedor.php';
        require_once 'view/footer.php';

    }

    public function ReporteKardex($id){

        $idCliente = $id;

        require_once 'pdf/ReporteProductos.php';
    }
    
    public function Guardar(){
        $oPago = new Pago();
        
        $this -> Index();
    }

    public function KardexCliente(){

        $id = $_REQUEST['id'];

        require_once 'pdf/ReporteKardexCliente.php';
    }
    
    public function KardexProveedor(){

        $id = $_REQUEST['id'];

        require_once 'pdf/ReporteKardexCliente.php';
    }
    
    public function CreditoCliente(){

        $id = $_REQUEST['id'];

        require_once 'pdf/ReporteCreditoCliente.php';
    }

    public function CreditoProveedor(){

        $id = $_REQUEST['id'];

        require_once 'pdf/ReporteKardexProveedor.php';
    }

}