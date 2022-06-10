<?php
require_once 'model/preventa.php';
require_once 'model/cliente.php';
require_once 'model/pago_credito_c.php';

class PreventaController
{

    private $model;
    private $mensaje;
    private $oCliente;

    public function __CONSTRUCT()
    {
        $this->model = new Preventa();
        $this->mensaje = array("nell", "nell");
        $this->oCliente = new Cliente();
    }

    public function Index()
    {
        $activar = 9;

        require_once 'view/header.php';
        require_once 'view/Venta/viewPreventa1.php';
        require_once 'view/footer.php';
    }

    public function Crud()
    {
        $oProveedor = new Proveedor();

        if (isset($_REQUEST['id'])) {
            $oProveedor = $this->model->Obtener($_REQUEST['id']);
        }

        require_once 'view/header.php';
        require_once 'view/alumno/curso-editar.php';
        require_once 'view/footer.php';
    }

    public function Guardar()
    { 

        $oPreventa = new Preventa();

        $subtotal = isset($_REQUEST['subtotal']) ? $_REQUEST['subtotal'] : '0';
        $total_a_pagar = isset($_REQUEST['total_a_pagar']) ? $_REQUEST['total_a_pagar'] : '0';
        
        
        $oPagoCredito = new Pago_credito_c();
        
        $oPagoCredito->total_venta = $total_a_pagar;
        $oPagoCredito->saldo = $_REQUEST['total_a_pagar'];
        $oPagoCredito->amortizado = 0;
        $oPagoCredito->id_Cliente = $_REQUEST['id_cliente_fk'];
        
        /*
        if($subtotal == null){
            $subtotal = 0;
        } else {
            $subtotal = $_POST['subtotal'];
        }
        
        if($total_a_pagar == null){
            $total_a_pagar =0;
        } else {
            $subtotal = $_POST['total_a_pagar'];
        }
        */
    
        $oPreventa->id = $_REQUEST['idP'];
        $oPreventa->id_cliente_fk = $_REQUEST['id_cliente_fk'];
        $oPreventa->medio_pago= $_REQUEST['medio_pago'];
        $oPreventa->moneda= $_REQUEST['moneda'];
        $oPreventa->ticket_de_venta= $_REQUEST['ticket_de_venta'];
        $oPreventa->subtotal= $subtotal;
        $oPreventa->descuento= $_REQUEST['descuento'];
        $oPreventa->total_a_pagar= $total_a_pagar;
        
        if($oPreventa->id > 0 ){
            $this->model->Actualizar($oPreventa);
            $this->mensaje=array("A", "Pre-Venta Actualizado Correctamente");
        }else{
            $this->model->Registrar($oPreventa);
            $this->model->RegistraProductoVenta(count($_POST["producto"]),$_POST["producto"],$_POST["cantidad"],$_POST["ticket_de_venta"]);
            
            
            if($oPreventa->medio_pago == 1){ // ES A CRÉDITO 
  
                $oVe = $this->model->ObtenerCredito($oPreventa->id_cliente_fk);

                if($oVe == null){ // SI NO EXISTE 
                    $this->model->RegistrarPagoCreditoC($oPagoCredito);
                } else {
                    $nuevoTotal= $oPagoCredito->total_venta+$oVe->total_venta;
                    $this->model->ActualizarTotal($nuevoTotal,$oVe->id,$nuevoTotal-$oVe->amortizado);
                }
                
                
            }
            
            $this->mensaje=array("R", "Pre-Venta Registrado Correctamente");
        }

        $this -> Index();
        //header('Location: index.php');
                 
        

        //header('Location: index.php');


        /*
        $items1 = ($_POST['id']);
        $items2 = ($_POST['producto']);
        $items3 = ($_POST['cantidad']);
        $items4 = ($_POST['precio']);
        $items5 = ($_POST['total']);

        while(true){

            $item1 = current($items1);
            $item2 = current($items2);
            $item3 = current($items3);
            $item4 = current($items4);
            $item5 = current($items5);

            $id = (($item1 != false ) ? $item1 : ", &nbsp;");
            $producto = (($item2 != false ) ? $item2 : ", &nbsp;");
            $cantidad = (($item3 != false ) ? $item3 : ", &nbsp;");
            $precio = (($item4 != false ) ? $item4 : ", &nbsp;");
            $total = (($item5 != false ) ? $item5 : ", &nbsp;");
            $preventa=19;

            $valores = '('.$cantidad.','.$producto.','.$total.'),';
        
            $valoresQ = substr($valores,0,-1);

            $sql = "INSERT INTO productos_preventa (cantidad,id_producto,id_preventa_fk) VALUES $valoresQ";

            $sqlRes = $connect->query($sql);

            $item2 = next($items2);
            $item3 = next($items3);
            $item5 = next($items5);

            if($item2 === false && $item3 === false && $item4 === false) break;

        }
        
        $connect = mysqli_connect("localhost", "root", "", "testing");
        $number = count($_POST["name"]);
        if($number > 1)
        {
            for($i=0; $i<$number; $i++)
            {
                if(trim($_POST["name"][$i] != ''))
                {
                    $sql = "INSERT INTO tbl_name(name) VALUES('".mysqli_real_escape_string($connect, $_POST["name"][$i])."')";
                    mysqli_query($connect, $sql);
                }
            }
            echo "Data Inserted";
        }
        else
        {
            echo "Please Enter Name";
        }
        */
    }

    public function Eliminar()
    {
        $this->model->Eliminar($_REQUEST['id']);
        $this->mensaje = array("E", "Pre-Venta Eliminada Correctamente");

        $this->Index();
        //header('Location: index.php');
    }
}
