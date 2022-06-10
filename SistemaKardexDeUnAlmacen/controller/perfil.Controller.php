<?php
require_once 'model/perfil.php';

class PerfilController{
    
    private $model;
    private $mensaje;
    
    public function __CONSTRUCT(){
        $this->model = new Perfil();
        $this->mensaje = array("nell", "nell");
    }
    
    public function Index(){
        $activar =1;
        
        require_once 'view/header.php';
        require_once 'view/Mantenimiento/Perfil/viewPerfil.php';
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
        $oPerfil = new Perfil();
        
        $oPerfil->id = $_REQUEST['id'];
        $oPerfil->nombre = $_REQUEST['nombre'];
        $oPerfil->estado = $_REQUEST['estado'];
        
        if($oPerfil->id > 0 ){
            $this->model->Actualizar($oPerfil);
            $this->mensaje=array("A", "Perfil Actualizado Correctamente");
        }else{
            $this->model->Registrar($oPerfil);
            $this->mensaje=array("R", "Perfil Registrado Correctamente");
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