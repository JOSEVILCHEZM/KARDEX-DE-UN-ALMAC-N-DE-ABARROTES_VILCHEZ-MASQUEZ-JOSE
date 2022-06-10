<?php
class Usuario
{
	private $pdo;
    
    public $id;
    public $user;
    public $password;
    public $estado;
    public $id_Trabajador;
    public $id_Perfil;

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

			$stm = $this->pdo->prepare("SELECT * FROM USUARIO");
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
			          ->prepare("SELECT * FROM USUARIO WHERE id = ?");
			          

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    
    public function Validar($user,$pass)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM USUARIO WHERE user=? AND password=?;");
			          
			$stm->execute(array($user,$pass));
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
			            ->prepare("DELETE FROM USUARIO WHERE id = ?");			          

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
			$sql = "UPDATE USUARIO SET 
						user  = ? ,
                        password  = ? ,
                        estado  = ? ,
                        id_Trabajador  = ? ,
                        id_Perfil =? 
				    WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->user, 
                        crypt($data->password,'$2a$07$usesomesillystringforsalt$'),
                        $data->estado, 
                        $data->id_Trabajador,
                        $data->id_Perfil, 
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Usuario $data)
	{
		try 
		{
		$sql = "INSERT INTO USUARIO (user,password,estado,id_Trabajador,id_Perfil) 
		        VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->user, 
                    crypt($data->password,'$2a$07$usesomesillystringforsalt$'),
                    $data->estado, 
                    $data->id_Trabajador,
                    $data->id_Perfil
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}