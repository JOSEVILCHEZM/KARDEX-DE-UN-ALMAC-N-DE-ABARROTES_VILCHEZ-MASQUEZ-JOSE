<?php
require_once 'model/cliente.php';
require_once 'model/proveedor.php';
require_once 'model/trabajador.php';
require_once 'model/producto.php';

class InicioController{
    
    private $model;
    private $cliente;
    private $proveedor;
    private $trabajador;
    private $producto;
    
    public function __CONSTRUCT(){
        $this->cliente=new Cliente();
        $this->proveedor=new Proveedor();
        $this->trabajador=new Trabajador();
        $this->producto=new Producto();
    }
    
    public function Index(){
        $activar =0;
        
        require_once 'view/header.php';
        require_once 'view/inicio/pagInicio.php';
        require_once 'view/footer.php';
    }
    
    
}