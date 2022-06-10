<?php
class Cliente
{
	private $pdo;
    
    public $id;
    public $tipoPersona;
    public $tipoDocumento;
    public $numDocumento;
    public $nombre;
    public $aPaterno;
    public $aMaterno;
    public $sexo;
    public $direccion;
    public $referencia;
    public $telefono;
    public $tefAdicional;
    public $correo;
    public $razonSocial;
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

			$stm = $this->pdo->prepare("SELECT * FROM CLIENTE");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function numClientes()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from cliente");
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
			          ->prepare("SELECT * FROM CLIENTE WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM cliente WHERE (SELECT COUNT(*) FROM pre_venta WHERE pre_venta.id_cliente_fk =cliente.id)=0 AND cliente.id = ?");			          

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
			$sql = "UPDATE CLIENTE SET 
						tipoPersona  = ? ,
                        tipoDocumento  = ? ,
                        numDocumento  = ? ,
                        nombre  = ? ,
                        aPaterno  = ? ,
                        aMaterno  = ? ,
                        sexo  = ? ,
                        direccion =? ,
                        referencia  = ? ,
                        telefono  = ? ,
                        tefAdicional  = ? ,
                        correo  = ? ,
                        razonSocial  = ? ,
                        estado =? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->tipoPersona, 
                        $data->tipoDocumento,
                        $data->numDocumento,
                        $data->nombre,
                        $data->aPaterno, 
                        $data->aMaterno,
                        $data->sexo, 
                        $data->direccion,
                        $data->referencia,
                        $data->telefono,
                        $data->tefAdicional, 
                        $data->correo,
                        $data->razonSocial,
                        $data->estado,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Cliente $data)
	{
		try 
		{
		$sql = "INSERT INTO CLIENTE (tipoPersona,tipoDocumento,numDocumento,nombre,aPaterno,aMaterno,sexo,direccion,referencia,telefono,tefAdicional,correo,razonSocial,estado) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->tipoPersona, 
                    $data->tipoDocumento,
                    $data->numDocumento,
                    $data->nombre,
                    $data->aPaterno, 
                    $data->aMaterno,
                    $data->sexo, 
                    $data->direccion,
                    $data->referencia,
                    $data->telefono,
                    $data->tefAdicional, 
                    $data->correo,
                    $data->razonSocial,
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}