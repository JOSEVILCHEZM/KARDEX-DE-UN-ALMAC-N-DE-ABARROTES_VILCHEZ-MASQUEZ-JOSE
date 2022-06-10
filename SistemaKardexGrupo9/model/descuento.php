<?php
class Descuento
{
	private $pdo;
    
    public $id;
    public $fecha;
    public $motivo;
    public $monto;
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

			$stm = $this->pdo->prepare("SELECT * FROM DESCUENTO");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function ListaDescuentosTrabajador($id)
	{
		try 
		{
            $result = array();
			$stm = $this->pdo
			          ->prepare("SELECT * FROM DESCUENTO WHERE id_Trabajador = ? and estado=1;");
			          

			$stm->execute(array($id));
			return $stm->fetchAll(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    public function ActualizarDescuentosCobrados($id,$estado)
	{
		try 
		{
			$sql = "UPDATE DESCUENTO SET 
                        estado  = ?  
				    WHERE id_Trabajador = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $estado,
                        $id
					)
				);
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
			          ->prepare("SELECT * FROM DESCUENTO WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM DESCUENTO WHERE id = ?");			          

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
			$sql = "UPDATE DESCUENTO SET 
						
                        motivo  = ? ,
                        monto  = ? ,
                        estado  = ? ,
                        id_Trabajador =? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        
                        $data->motivo,
                        $data->monto,
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

	public function Registrar(Descuento $data)
	{
		try 
		{
		$sql = "INSERT INTO DESCUENTO (fecha,motivo,monto,estado,id_Trabajador) 
		        VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->fecha, 
                    $data->motivo,
                    $data->monto,
                    $data->estado, 
                    $data->id_Trabajador
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}