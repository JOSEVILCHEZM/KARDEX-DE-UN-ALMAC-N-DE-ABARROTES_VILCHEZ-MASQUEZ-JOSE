<?php
class ReporteCreditoC
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

			$stm = $this->pdo->prepare("SELECT pago_credito_c.total_venta as total_venta,
			pago_credito_c.saldo as saldo,
			pago_credito_c.amortizado as amortizado,
			detalle_pago_credito_c.fecha as fecha,
			detalle_pago_credito_c.ticket as ticket,
			detalle_pago_credito_c.total as total
			FROM pago_credito_c
			INNER JOIN detalle_pago_credito_c
			ON pago_credito_c.id = detalle_pago_credito_c.id_PagoCredito
			WHERE pago_credito_c.id_Cliente = ?");

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


}