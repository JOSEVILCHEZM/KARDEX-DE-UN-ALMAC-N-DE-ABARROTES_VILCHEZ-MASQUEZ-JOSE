<?php
class Detalle_pago_credito_c
{
	private $pdo;
    
    public $id;
    public $fecha;
    public $ticket;
    public $total;
    public $id_PagoCredito;

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

			$stm = $this->pdo->prepare("SELECT * FROM detalle_pago_credito_c");
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
			          ->prepare("SELECT * FROM detalle_pago_credito_c WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM detalle_pago_credito_c WHERE id = ?");			          

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
			$sql = "UPDATE detalle_pago_credito_c SET 
						
                        ticket  = ? ,
                        total  = ? ,
                        id_PagoCredito  = ?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        
                        $data->ticket,
                        $data->subtotal,
                        $data->totalDescuento, 
                        $data->total,
                        $data->estado,
                        $data->id_Trabajador,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Detalle_pago_credito_c $data)
	{
		try 
		{
		$sql = "INSERT INTO detalle_pago_credito_c (ticket,total,id_PagoCredito) 
		        VALUES (?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    
                    $data->ticket,
                    $data->total,
                    $data->id_PagoCredito
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function numDetallePagoCredito()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from detalle_pago_credito_c");
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
		
        $contadorCorrelativo=$this->numDetallePagoCredito();
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