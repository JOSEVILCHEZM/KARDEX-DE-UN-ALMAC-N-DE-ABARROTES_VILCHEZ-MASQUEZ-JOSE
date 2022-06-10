<?php
require_once 'model/pago.php';
require_once 'model/trabajador.php';
require_once 'model/descuento.php';

class PagoController{
    
    private $model;
    private $mensaje;
    private $oTrabajador;
    
    public function __CONSTRUCT(){
        $this->model = new Pago();
        $this->mensaje = array("nell", "nell");
        $this->oTrabajador = new Trabajador();
        $this->oDescuento=new Descuento();
    }
    
    public function Index(){
        $activar =8;
        
        require_once 'view/header.php';
        require_once 'view/Trabajador/Pago/viewPago.php';
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
        $oPago = new Pago();

        $oPago->id = $_REQUEST['id'];
        $oPago->ticket = $_REQUEST['ticket'];
        $oPago->subtotal = $_REQUEST['salario'];
        $oPago->totalDescuento = $_REQUEST['totalDescuento'];
        $oPago->id_Trabajador = $_REQUEST['id_Trabajador_Descuento'];
        $oPago->total = $_REQUEST['total'];
        $oPago->estado = $_REQUEST['estado'];
        $oPago->fecha = date('Y-m-d');
        
        if($oPago->id > 0 ){
            $this->model->Actualizar($oPago);
            $this->mensaje=array("A", "Pago Actualizado Correctamente");
            
        }else{
            $this->model->Registrar($oPago);
            $this->mensaje=array("R", "Pago Registrado Correctamente");
            $this->oTrabajador->CambiarAcancelado($oPago->id_Trabajador);
            $this->oDescuento->ActualizarDescuentosCobrados($oPago->id_Trabajador,0);
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->mensaje=array("E", "Pago Eliminado Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }
}