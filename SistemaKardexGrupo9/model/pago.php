<?php
class Pago
{
	private $pdo;
    
    public $id;
    public $fecha;
    public $ticket;
    public $subtotal;
    public $totalDescuento;
    public $total;
    public $estado;
    public $id_Trabajador;

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

			$stm = $this->pdo->prepare("SELECT * FROM PAGO");
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
			          ->prepare("SELECT * FROM PAGO WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM PAGO WHERE id = ?");			          

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
			$sql = "UPDATE PAGO SET 
						
                        ticket  = ? ,
                        subtotal  = ? ,
                        totalDescuento  = ? ,
                        total  = ? ,
                        estado  = ? ,
                        id_Trabajador =? 
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

	public function Registrar(Pago $data)
	{
		try 
		{
		$sql = "INSERT INTO PAGO (fecha,ticket,subtotal,totalDescuento,total,estado,id_Trabajador) 
		        VALUES (?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->fecha,
                    $data->ticket,
                    $data->subtotal,
                    $data->totalDescuento, 
                    $data->total,
                    $data->estado,
                    $data->id_Trabajador,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    
    public function numPagos()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from pago");
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
		
        $contadorCorrelativo=$this->numPagos();
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