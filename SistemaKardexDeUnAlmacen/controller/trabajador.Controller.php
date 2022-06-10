<?php
require_once 'model/trabajador.php';

class TrabajadorController{
    
    private $model;
    private $mensaje;
    
    public function __CONSTRUCT(){
        $this->model = new Trabajador();
        $this->mensaje = array("nell", "nell");
    }
    
    public function Index(){
        $activar=5;
        
        require_once 'view/header.php';
        require_once 'view/Mantenimiento/Trabajador/viewTrabajador.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $oTrabajador = new Trabajador();
        
        if(isset($_REQUEST['id'])){
            $oTrabajador = $this->model->Obtener($_REQUEST['id']);
        }
        
        require_once 'view/header.php';
        require_once 'view/alumno/curso-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $oTrabajador = new Trabajador();
        
        $oTrabajador->id = $_REQUEST['id'];
        $oTrabajador->tipoDocumento= $_REQUEST['tipoDocumento'];
        $oTrabajador->numDocumento= $_REQUEST['numDocumento'];
        $oTrabajador->nombre= $_REQUEST['nombre'];
        $oTrabajador->aPaterno= $_REQUEST['aPaterno'];
        $oTrabajador->aMaterno= $_REQUEST['aMaterno'];
        $oTrabajador->sexo= $_REQUEST['sexo'];
        $oTrabajador->direccion = $_REQUEST['direccion'];
        $oTrabajador->referencia= $_REQUEST['referencia'];
        $oTrabajador->telefono= $_REQUEST['telefono'];
        $oTrabajador->tefAdicional= $_REQUEST['tefAdicional'];       
        $oTrabajador->tipoSalario= $_REQUEST['tipoSalario'];
        $oTrabajador->salario= $_REQUEST['salario'];
        $oTrabajador->fNacimiento= $_REQUEST['fNacimiento'];
        $oTrabajador->fIngreso= $_REQUEST['fIngreso'];
        $oTrabajador->fSalida= $_REQUEST['fSalida'];
        $oTrabajador->estado = $_REQUEST['estado'];
        
        if($oTrabajador->id > 0 ){
            $this->model->Actualizar($oTrabajador);
            $this->mensaje=array("A", "Trabajador Actualizado Correctamente");
            
        }else{
            $this->model->Registrar($oTrabajador);
            $this->mensaje=array("R", "Trabajador Registrado Correctamente");
        }
        
        if(isset($_REQUEST['extra'])){
            $activar=0;
            $_SESSION['user']=serialize($this->model->Obtener($oTrabajador->id));
            require_once 'view/header.php';
            require_once 'view/inicio/viewPerfilUsuario.php';
            require_once 'view/footer.php';
        }else{
            $this -> Index();
        }
        
        
        //header('Location: index.php');
    }
    
    public function GuardarImg(){
        $id = $_REQUEST['id_trabajdorModi'];
        if ($_FILES['file']!=null)
        { 
            if($_FILES['file']['name']!=""){
                
                $archivo = $id.$_FILES['file']['name'];
                $ruta = "imagenes/perfilesUsuarios/" . $archivo;
                move_uploaded_file($_FILES["file"]["tmp_name"], $ruta);
  
               
                /*Para eliminar la foto anterior*/
                if($this->model->Obtener($id)->foto!="foto-producto.png"){
                    if(file_exists ( "imagenes/perfilesUsuarios/".$this->model->Obtener($id)->foto )){  
                        unlink("imagenes/perfilesUsuarios/".$this->model->Obtener($id)->foto);
                    }

                }
                
                 $this->model->ActualizarImg($archivo,$id);
                
                $_SESSION['user']=serialize($this->model->Obtener($id));
                
            }else{
                /*if($oProducto->id > 0){
                    $oProducto->imagen = $this->model->Obtener($oProducto->id)->imagen;
                }else{
                    
                    $oProducto->imagen = "foto-producto.png";
                }*/
            }
        }
        
        $activar=0;
        require_once 'view/header.php';
        require_once 'view/inicio/viewPerfilUsuario.php';
        require_once 'view/footer.php';
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