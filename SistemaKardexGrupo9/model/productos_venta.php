<?php
class ProductoVenta
{
	private $pdo;
    
    public $id_preventa;
    public $cantidad;
    public $id_producto;
    public $ticket_preventa_fk;
    
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

			$stm = $this->pdo->prepare("SELECT * FROM productos_preventa WHERE ticket_preventa_fk = ?");
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