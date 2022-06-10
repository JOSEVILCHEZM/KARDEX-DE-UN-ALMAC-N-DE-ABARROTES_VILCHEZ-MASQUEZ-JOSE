<?php
class Pago_credito_p
{
	private $pdo;
    
    public $id_credito_p;
    public $id_proveedor_fk;
    public $id_compra_fk;
	public $deuda;
	public $total;
    public $estado;

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

			$stm = $this->pdo->prepare("SELECT * FROM pago_credito_p");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}

	}
    
    
    public function ListaDetallesPagoCreditoProveedor($id)
	{
		try 
		{
            $result = array();
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle_pago_credito_p WHERE id_pago_credito_p_fk = ?");

			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			          ->prepare("SELECT * FROM pago_credito_p WHERE id_proveedor_fk = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id)
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

	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM pago_credito_p WHERE id_credito_p = ?");			          

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

	public function ActualizarTotal($mas, $id)
	{
		try 
		{
			$sql = "UPDATE pago_credito_p SET deuda = ? WHERE id_credito_p = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $mas,
                        $id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function Registrar(Pago_credito_p $data)
	{
		try 
		{
		$sql = "INSERT INTO pago_credito_p (id_proveedor_fk,id_compra_fk,deuda,estado) 
		        VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_proveedor_fk,
                    $data->id_compra_fk,
                    $data->deuda,
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    //Lo del pago crédito Cliente
    public function ActualizarPagoCreditoProveedor($id,$cantidad)
	{
		$oPagoCredito = $this->Obtener($id);
		
        $oPagoCredito->deuda=$oPagoCredito->deuda-$cantidad;
		
		$this->Actualizar($oPagoCredito);
		
	}
}