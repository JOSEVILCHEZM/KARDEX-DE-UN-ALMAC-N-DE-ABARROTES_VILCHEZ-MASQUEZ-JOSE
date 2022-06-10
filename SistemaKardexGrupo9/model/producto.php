<?php
class Producto
{
	private $pdo;
    
    public $id;
    public $nombre;
    public $descripcion;
    public $catidad;
    public $unidad;
    public $precioUnitario;
    public $moneda;
    public $estado;
    
    public $imagen;

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

			$stm = $this->pdo->prepare("SELECT * FROM PRODUCTO");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
    public function numProducto()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("select * from producto");
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
			          ->prepare("SELECT * FROM PRODUCTO WHERE id = ?");
			          

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
			            ->prepare("DELETE FROM producto WHERE (SELECT COUNT(*) FROM productos_preventa WHERE productos_preventa.id_producto =producto.id)=0 AND (SELECT COUNT(*) FROM productos_compra WHERE productos_compra.id_producto_fk =producto.id)=0 AND producto.id= ?");			          

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
			$sql = "UPDATE PRODUCTO SET 
						nombre  = ? ,
                        descripcion  = ? ,
                        cantidad  = ? ,
                        unidad  = ? ,
                        precioUnitario  = ? ,
                        moneda  = ? ,
                        estado  = ? ,
                        imagen =? 
				        WHERE id = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $data->nombre, 
                        $data->descripcion,
                        $data->cantidad,
                        $data->unidad,
                        $data->precioUnitario, 
                        $data->moneda,
                        $data->estado, 
                        $data->imagen,
                        $data->id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function Registrar(Producto $data)
	{
		try 
		{
		$sql = "INSERT INTO PRODUCTO (nombre,descripcion,cantidad,unidad,precioUnitario,moneda,estado,imagen) 
		        VALUES (?,?,?,?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->nombre, 
                    $data->descripcion,
                    $data->cantidad,
                    $data->unidad,
                    $data->precioUnitario, 
                    $data->moneda,
                    $data->estado, 
                    $data->imagen,
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}