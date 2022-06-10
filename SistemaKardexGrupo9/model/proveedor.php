<?php
class Proveedor
{
	private $pdo;
    
    public $id;
    public $documento;
    public $numDocumento;
    public $razonSocial;
    public $direccion;
    public $referencia;
    public $telefono;
    public $tefAdicional;
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

			$stm = $this->pdo->prepare("SELECT * FROM PROVEEDOR");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function numProveedor()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from proveedor");
			$stm->execute();

			return $stm->rowCount(PDO::FETCH_OBJ);
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
			          ->prepare("SELECT * FROM PROVEEDOR WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM proveedor WHERE (SELECT COUNT(*) FROM compra WHERE compra.id_proveedor_fk =proveedor.id)=0 AND proveedor.id= ?");			          

			$stm->execute(array($id));
            return $stm->rowCount(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Actualizar($data)
	{
		try 
		{
			$sql = "UPDATE PROVEEDOR SET 
						documento  = ? ,
                        numDocumento  = ? ,
                        razonSocial  = ? ,
                        direccion  = ? ,
                        referencia  = ? ,
                        telefono  = ? ,
                        tefAdicional  = ? ,
                        estado =? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->documento, 
                        $data->numDocumento,
                        $data->razonSocial,
                        $data->direccioin,
                        $data->referencia, 
                        $data->telefono,
                        $data->tefAdicional, 
                        $data->estado,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Proveedor $data)
	{
		try 
		{
		$sql = "INSERT INTO PROVEEDOR (documento,numDocumento,razonSocial,direccion,referencia,telefono,tefAdicional,estado) 
		        VALUES (?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->documento, 
                    $data->numDocumento,
                    $data->razonSocial,
                    $data->direccioin,
                    $data->referencia, 
                    $data->telefono,
                    $data->tefAdicional, 
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}