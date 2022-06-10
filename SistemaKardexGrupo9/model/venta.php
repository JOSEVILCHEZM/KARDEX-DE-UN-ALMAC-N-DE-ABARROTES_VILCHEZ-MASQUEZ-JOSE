<?php
class Venta
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

	public function EliminarProductosVenta($id){
		try{

			$stm = $this->pdo
						->prepare("DELETE pre_venta,productos_preventa FROM pre_venta JOIN productos_preventa ON pre_venta.ticket_de_venta = productos_preventa.ticket_preventa_fk WHERE productos_preventa.ticket_preventa_fk = ?");

			$stm->execute(array($id));
		} catch(Exception $e){
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

	public function Registrar(Venta $data)
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

}