<?php
require_once 'model/descuento.php';
require_once 'model/trabajador.php';

class DescuentoController{
    
    private $model;
    private $mensaje;
    private $oTrabajador;
    
    public function __CONSTRUCT(){
        $this->model = new Descuento();
        $this->mensaje = array("nell", "nell");
        $this->oTrabajador = new Trabajador();
    }
    
    public function Index(){
        $activar =7;
        
        require_once 'view/header.php';
        require_once 'view/Trabajador/Descuento/viewDescuento.php';
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
        $oDescuento = new Descuento();

        $oDescuento->id = $_REQUEST['id'];
        $oDescuento->motivo = $_REQUEST['motivo'];
        $oDescuento->monto = $_REQUEST['monto'];
        $oDescuento->estado = $_REQUEST['estado'];
        $oDescuento->id_Trabajador = $_REQUEST['id_Trabajador'];
        $oDescuento->fecha = date('Y-m-d');
        
        if($oDescuento->id > 0 ){
            $this->model->Actualizar($oDescuento);
            $this->mensaje=array("A", "Descuento Actualizado Correctamente");
        }else{
            $this->model->Registrar($oDescuento);
            $this->mensaje=array("R", "Descuento Registrado Correctamente");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->mensaje=array("E", "Descuento Eliminado Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }
}