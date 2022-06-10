<?php
class Detalle_pago_credito_p
{
	private $pdo;
    
    public $id_detalle_credito_p;
    public $fecha;
    public $ticket;
    public $total;
    public $id_pago_credito_p_fk;

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

			$stm = $this->pdo->prepare("SELECT * FROM detalle_pago_credito_p");
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
			          ->prepare("SELECT * FROM detalle_pago_credito_p WHERE id_detalle_credito_p = ?");
			          

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
			            ->prepare("DELETE FROM detalle_pago_credito_p WHERE id_detalle_credito_p = ?");			          

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
			$sql = "UPDATE detalle_pago_credito_p SET 
                        ticket  = ? ,
                        total  = ? ,
                        id_pago_credito_p_fk  = ?
				    WHERE id_detalle_credito_p = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->ticket, 
                        $data->total,
                        $data->id_pago_credito_p_fk,
                        $data->id_detalle_credito_p
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	//Lo del pago crédito Proveedor
	public function ActualizarPagoCreditoProveedor($id,$cantidad)
	{
		$oPagoCredito = $this->ObtenerC($id);
		
		$oPagoCredito->deuda=$oPagoCredito->deuda-$cantidad;

		if($oPagoCredito->deuda >= 0){
			$this->ActualizarC($oPagoCredito);
		}
		
	}

	public function ObtenerC($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM pago_credito_p WHERE id_credito_p = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ActualizarC($data)
	{
		try 
		{
			$sql = "UPDATE pago_credito_p SET 
						id_proveedor_fk  = ? ,
                        id_compra_fk  = ? ,
                        deuda  = ? ,
                        estado  = ?  
				    WHERE id_credito_p = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        
                        $data->id_proveedor_fk,
                        $data->id_compra_fk,
                        $data->deuda,
                        $data->estado,
                        $data->id_credito_p
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Detalle_pago_credito_p $data)
	{
		try 
		{

		$sql = "INSERT INTO detalle_pago_credito_p (ticket,total,id_pago_credito_p_fk) 
		        VALUES (?,?,?)";
		
		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->ticket,
                    $data->total,
                    $data->id_pago_credito_p_fk
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}