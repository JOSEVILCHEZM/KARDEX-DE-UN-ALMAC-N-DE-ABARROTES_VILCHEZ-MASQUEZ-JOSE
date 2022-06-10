<?php
require_once 'model/usuario.php';
require_once 'model/trabajador.php';
require_once 'controller/inicio.controller.php';

class LoginController{
    
    private $model;
    private $oTrabajador;
    private $inicioController;
    
    public function __CONSTRUCT(){
        $this->model = new Usuario();
        $this->oTrabajador=new Trabajador();
        $this->inicioController=new InicioController();
    }
    
    public function Index(){
        require_once 'login/login.php';
    }
    
    //permite validar si existe el Usuario con esas credenciales
    public function Validar(){
        $oUsuario = new Usuario();
        if(isset($_REQUEST['user']) && isset($_REQUEST['pass']) && val_csrf()){
            $oUsuario = $this->model->Validar($_REQUEST['user'],encriptar($_REQUEST['pass']));
            if($oUsuario==null){
                require_once 'login/login.php';
            }else{
                $activar =0;
                
                $_SESSION['usuario']=serialize($oUsuario);
                $_SESSION['user']=serialize($this->oTrabajador->Obtener($oUsuario->id_Trabajador));
                
                $this->inicioController->Index();
                
            }
        }
        /*require_once 'login/login.php';*/
    }
    
    //permite validar si existe una session
	public function VaribleSeccion($variable_session){
		if(isset($_SESSION[$variable_session])){
			return true;
		}else{
			return false;
		}
	}
	//obtiene una variable de session
	public function EliminarSeccion(){
		try{
            if($this->VaribleSeccion("usuario")){
                session_unset($_SESSION["usuario"]); 
			    require_once 'login/login.php';
            }else{
			     require_once 'login/login.php';
            }
		}catch(Exception $ex){}
	}
    
    
}