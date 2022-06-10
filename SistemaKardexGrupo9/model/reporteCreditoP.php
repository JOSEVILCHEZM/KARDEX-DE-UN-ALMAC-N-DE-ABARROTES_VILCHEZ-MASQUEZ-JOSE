<?php
class ReporteCreditoP
{
	private $pdo;
    
    public $total_venta;
    public $saldo;
    public $amortizado;
    public $fecha;
    public $ticket;
    public $total;
    
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

			$stm = $this->pdo->prepare("SELECT pago_credito_p.deuda as deuda,
			pago_credito_p.total as totalcredito,
			detalle_pago_credito_p.fecha as fecha,
			detalle_pago_credito_p.ticket as ticket,
			detalle_pago_credito_p.total as total
			FROM pago_credito_p
			INNER JOIN detalle_pago_credito_p
			ON pago_credito_p.id_credito_p = detalle_pago_credito_p.id_pago_credito_p_fk
			WHERE pago_credito_p.id_proveedor_fk = ?");

			$stm->execute(array($id));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
    }
    
    public function ListarClientes()
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

	public function ListarProveedores()
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


}