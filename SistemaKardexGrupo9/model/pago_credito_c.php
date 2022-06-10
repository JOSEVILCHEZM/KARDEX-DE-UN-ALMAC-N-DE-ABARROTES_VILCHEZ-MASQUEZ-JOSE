<?php
class Pago_credito_c
{
	private $pdo;
    
    public $id;
    public $total_venta;
    public $saldo;
    public $amortizado;
    public $id_Cliente;

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

			$stm = $this->pdo->prepare("SELECT * FROM pago_credito_c");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    
    public function ListaDetallesPagoCredito($id)
	{
		try 
		{
            $result = array();
			$stm = $this->pdo
			          ->prepare("SELECT * FROM detalle_pago_credito_c WHERE id_PagoCredito = ?");
			          
			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
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
			          ->prepare("SELECT * FROM pago_credito_c WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM pago_credito_c WHERE id = ?");			          

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
			$sql = "UPDATE pago_credito_c SET 
						
                        total_venta  = ? ,
                        saldo  = ? ,
                        amortizado  = ? ,
                        id_Cliente  = ?  
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        
                        $data->total_venta,
                        $data->saldo,
                        $data->amortizado,
                        $data->id_Cliente,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Pago_credito_c $data)
	{
		try 
		{
		$sql = "INSERT INTO pago_credito_c (total_venta,saldo,amortizado,id_Cliente) 
		        VALUES (?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->total_venta,
                    $data->saldo,
                    $data->amortizado,
                    $data->id_Cliente
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    //Lo del pago crédito Cliente
    public function ActualizarPagoCredito($id,$cantidad)
	{
        $oPagoCredito = $this->Obtener($id);
        $oPagoCredito->amortizado=$oPagoCredito->amortizado+$cantidad;
        $oPagoCredito->saldo=$oPagoCredito->total_venta-$oPagoCredito->amortizado;
        $this->Actualizar($oPagoCredito);
		
	}
}