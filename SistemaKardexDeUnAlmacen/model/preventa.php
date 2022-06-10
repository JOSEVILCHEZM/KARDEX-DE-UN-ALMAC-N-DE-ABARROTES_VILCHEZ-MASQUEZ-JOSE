<?php
class PreVenta
{
    private $pdo;
    
    public $id;
    public $id_cliente_fk;
    public $medio_pago;
    public $moneda;
    public $ticket_de_venta;
    public $subtotal;
    public $descuento;
	public $total_a_pagar;
	public $fecha;

    public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
        }
        
	}

	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM pre_venta");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM pre_venta WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM pre_venta WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE pre_venta SET 
						id_cliente_fk = ?, 
						medio_pago = ?,
                        moneda = ?,
						ticket_de_venta = ?, 
						subtotal = ?,
                        descuento = ?,
                        total_a_pagar = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->id_cliente_fk, 
                        $data->medio_pago,
                        $data->moneda,
                        $data->ticket_de_venta,
                        $data->subtotal,
                        $data->descuento,
						$data->total_a_pagar,
						$data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(PreVenta $data)
	{
		try 
		{

		$sql = "INSERT INTO pre_venta (id_cliente_fk,medio_pago,moneda,ticket_de_venta,subtotal,descuento,total_a_pagar) 
		        VALUES (?, ?, ?, ?, ?, ? ,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_cliente_fk, 
                    $data->medio_pago,
                    $data->moneda,
                    $data->ticket_de_venta,
                    $data->subtotal,
                    $data->descuento,
                    $data->total_a_pagar
                )
			);

		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function RegistraProductoVenta($contador, $valor1, $valor2, $valor3){
		
		try
		{ 

			if ($contador > 0) {
				for ($i = 0; $i < $contador; $i++) {
					if (trim($valor1[$i] != '') || trim($valor2[$i] != '')) {
	
						$val1 = $valor1[$i];
						$val2 = $valor2[$i];
						$val3 = $valor3;
	
						$sql = "INSERT INTO productos_preventa (id_producto,cantidad,ticket_preventa_fk) VALUES (?,?,?)";

						$this->pdo->prepare($sql)
							->execute(
								array(
									$val1, 
									$val2,
									$val3
								)
							);
					}
				}
			}

			/*
			$connect = mysqli_connect("localhost", "root", "", "bdsistemapollos");

			$number = count($_POST["producto"]);
	
			if ($number > 0) {
				for ($i = 0; $i < $number; $i++) {
					if (trim($_POST["producto"][$i] != '') || trim($_POST["cantidad"][$i] != '') || trim($_POST["total"][$i] != '')) {
	
						$valor1 = $_POST["producto"][$i];
						$valor2 = $_POST["cantidad"][$i];
						$valor3 = $_POST["total"][$i];
	
						$sql = "INSERT INTO productos_preventa (cantidad,id_producto,id_preventa_fk) VALUES ($valor1,$valor2,$valor3)";
	
						//$sql = "INSERT INTO productos_preventa VALUES('" . mysqli_real_escape_string($connect, $_POST["producto"][$i]). "')";
	
						mysqli_query($connect, $sql);
					}
				}

			} else {
			}
			*/

		} catch(Exception $e){
			die($e->getMessage());
		}

	}

	public function ListarClientes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM CLIENTE");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ListarProductos()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM PRODUCTO");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    public function RegistrarPagoCreditoC(Pago_credito_c $data)
	{
		try 
		{
		$sql = "INSERT INTO pago_credito_c(total_venta, saldo, amortizado, id_Cliente) VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->total_venta,
                    $data->saldo,
                    $data->amortizado,
                    $data->id_Cliente,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
     public function ObtenerCredito($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM pago_credito_c WHERE id_Cliente = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function ActualizarTotal($mas, $id,$saldo)
	{
		try 
		{
			$sql = "UPDATE pago_credito_c SET total_venta = ?, saldo= ? WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $mas,
                        $saldo,
                        $id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function numPreventa()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from pre_venta");
			$stm->execute();

			return $stm->rowCount(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function GenerarCorrelativo()
	{
		
        $contadorCorrelativo=$this->numPreventa();
        $contadorCorrelativo++;
        
        $valor="";
        if($contadorCorrelativo<10){
            $valor = "0000000".$contadorCorrelativo;
        }else if($contadorCorrelativo<100){
            $valor = "000000".$contadorCorrelativo;
        }else if($contadorCorrelativo<1000){
            $valor = "00000".$contadorCorrelativo;
        }else if($contadorCorrelativo<10000){
            $valor = "0000".$contadorCorrelativo;
        }else if($contadorCorrelativo<100000){
            $valor = "000".$contadorCorrelativo;
        }else if($contadorCorrelativo<1000000){
            $valor = "00".$contadorCorrelativo;
        }else if($contadorCorrelativo<10000000){
            $valor = "0".$contadorCorrelativo;
        }else {
            $valor = "".$contadorCorrelativo;
        }
        return $valor;
	}

}