<?php
require_once 'model/curso.php';

class CursoController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Curso();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/alumno/curso.php';
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
        $oCurso = new Curso();
        
        $oCurso->id = $_REQUEST['id'];
        $oCurso->Nombre = $_REQUEST['Nombre'];

        $oCurso->id > 0 
            ? $this->model->Actualizar($oCurso)
            : $this->model->Registrar($oCurso);
        
        $this -> Index();
        //header('Location: index.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['id']);
        
        $this -> Index();
        //header('Location: index.php');
    }
}