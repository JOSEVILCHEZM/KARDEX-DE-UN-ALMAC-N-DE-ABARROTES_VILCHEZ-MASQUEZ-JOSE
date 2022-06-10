<?php
class ReporteK
{
	private $pdo;
    
    public $fecha;
    public $documento;
    public $numDocumento;
    public $nombre;
    public $cantidad;
    public $precioUnitario;
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

			$stm = $this->pdo->prepare("SELECT pre_venta.fecha as fecha, 
            cliente.numDocumento as numdoc, 
            cliente.nombre as nombre, 
            productos_preventa.cantidad as cant, 
            producto.precioUnitario as preciouni, 
            productos_preventa.cantidad*producto.precioUnitario as total
            FROM pre_venta
            INNER JOIN cliente
            ON pre_venta.id_cliente_fk = cliente.id
            INNER JOIN productos_preventa
            ON pre_venta.ticket_de_venta = productos_preventa.ticket_preventa_fk
            INNER JOIN producto
            ON productos_preventa.id_producto = producto.id
            WHERE pre_venta.id_cliente_fk = ?");

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