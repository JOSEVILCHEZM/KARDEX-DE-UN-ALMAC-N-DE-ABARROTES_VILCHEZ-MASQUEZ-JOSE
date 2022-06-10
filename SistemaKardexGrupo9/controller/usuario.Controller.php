<?php
require_once 'model/usuario.php';
require_once 'model/perfil.php';
require_once 'model/trabajador.php';

class UsuarioController{
    
    private $model;
    private $mensaje;
    private $oTrabajador;
    private $oPerfil;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->oPerfil = new Perfil();
        $this->oTrabajador = new Trabajador();
        $this->mensaje = array("nell", "nell");
    }
    
    public function Index(){
        $activar=6;
        
        require_once 'view/header.php';       
        require_once 'view/Mantenimiento/Usuario/viewUsuario.php';
        require_once 'view/footer.php';
    }
    
    
    public function ViewPerfileUsuario(){
        $activar=0;
        
        require_once 'view/header.php';
        require_once 'view/inicio/viewPerfilUsuario.php';
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
        $oUsuario = new Usuario();
        
        $oUsuario->id = $_REQUEST['id'];
        $oUsuario->user = $_REQUEST['user'];
        $oUsuario->password= $_REQUEST['password'];
        $oUsuario->estado= $_REQUEST['estado'];
        $oUsuario->id_Trabajador= $_REQUEST['id_Trabajador'];
        $oUsuario->id_Perfil= $_REQUEST['id_Perfil'];
        
        if($oUsuario->id > 0 ){
            $this->model->Actualizar($oUsuario);
            $this->mensaje=array("A", "Usuario Actualizado Correctamente");
        }else{
            $this->model->Registrar($oUsuario);
            $this->mensaje=array("R", "Usuario Registrado Correctamente");
        }
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        $this->mensaje=array("E", "Usuario Eliminado Correctamente");
        
        $this -> Index();
        //header('Location: index.php');
    }
}