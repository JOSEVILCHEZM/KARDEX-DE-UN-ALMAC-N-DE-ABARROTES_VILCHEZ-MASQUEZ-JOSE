<?php
class ProductoCompra
{
	private $pdo;
    
    public $id_productos_compra;
    public $id_producto_fk;
    public $cantidad;
    public $peso_bandeja;
    public $peso_por_bandeja;
    public $precio_unitario;
    public $pollos;
    public $total;
    public $bandeja;
    
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

	public function Listar($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM productos_compra WHERE ticket_compra_fk = ?");
			$stm->execute(array($id));

			/*
			$stm = $this->pdo->prepare("SELECT * FROM productos_preventa");
			$stm->execute();
			*/

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
    
}