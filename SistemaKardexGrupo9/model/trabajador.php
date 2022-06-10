<?php
class Trabajador
{
	private $pdo;
    
    public $id;
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
    public $tipoSalario;
    public $salario;
    public $fNacimiento;
    public $fIngreso;
    public $fSalida;
    public $estado;
    public $remunerado;
    public $foto;
    
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

			$stm = $this->pdo->prepare("SELECT * FROM TRABAJADOR");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function numTrabajador()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from trabajador");
			$stm->execute();

			return $stm->rowCount(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function ListaTrabajadoresSinPagar()
	{
		try
		{
			$result = array();
            /*SELECT * FROM TRABAJADOR WHERE remunerado = 0;*/
			$stm = $this->pdo->prepare("SELECT * FROM TRABAJADOR;");
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
			          ->prepare("SELECT * FROM TRABAJADOR WHERE id = ?");
			          

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
			            ->prepare(" DELETE FROM trabajador WHERE (SELECT COUNT(*) FROM usuario WHERE usuario.id_Trabajador =trabajador.id)=0 AND (SELECT COUNT(*) FROM pago WHERE pago.id_Trabajador =trabajador.id)=0 AND (SELECT COUNT(*) FROM descuento WHERE descuento.id_Trabajador =trabajador.id)=0 AND trabajador.id= ?");			          

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
			$sql = "UPDATE TRABAJADOR SET 
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
                        tipoSalario  = ? ,
                        salario  = ? ,
                        fNacimiento  = ? ,
                        fIngreso  = ? ,
                        fSalida =? ,
                        estado = ?,
                        remunerado =?
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
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
                        $data->tipoSalario,
                        $data->salario,
                        $data->fNacimiento,
                        $data->fIngreso,
                        $data->fSalida,
                        $data->estado,
                        $data->remunerado,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function ActualizarImg($imagen,$id)
	{
		try 
		{       
            /*UPDATE trabajador SET foto="jiji.jpg" WHERE id=3;*/
			$sql = "UPDATE TRABAJADOR SET 
                        foto  = ? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $imagen,
                        $id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    
    
    
    
    
	public function Registrar(Trabajador $data)
	{
		try 
		{
		$sql = "INSERT INTO TRABAJADOR (tipoDocumento,numDocumento,nombre,aPaterno,aMaterno,sexo,direccion,referencia,telefono,tefAdicional,tipoSalario,salario,fNacimiento,fIngreso,fSalida,estado) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
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
                    $data->tipoSalario,
                    $data->salario,
                    $data->fNacimiento,
                    $data->fIngreso,
                    $data->fSalida,
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    
    public function CambiarAcancelado($id)
	{
		$objeto = new Trabajador();
        $objeto = $this->Obtener($id);
        $objeto->remunerado=1;
        $this->Actualizar($objeto); 
	}
    
    
    
}