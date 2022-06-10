<?php
class ReporteKProveedor
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

			$stm = $this->pdo->prepare("SELECT compra.fecha as fecha, 
            proveedor.numDocumento as numdoc, 
            proveedor.razonSocial as nombre, 
            productos_compra.cantidad as cant, 
            producto.precioUnitario as preciouni, 
            productos_compra.cantidad*producto.precioUnitario as total
            FROM compra
            INNER JOIN proveedor
            ON compra.id_proveedor_fk = proveedor.id
            INNER JOIN productos_compra
            ON compra.ticket_de_compra = productos_compra.ticket_compra_fk
            INNER JOIN producto
            ON productos_compra.id_producto_fk = producto.id
            WHERE compra.id_proveedor_fk = ?");

			$stm->execute(array($id));

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function ListarGeneral($id)
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT
			tipo,    
			fecha,
			numdoc,
			nombre,
			cant,
			preciouni,
			total
		FROM
			(
			SELECT
				CONCAT('Ventas') AS tipo,
				pre_venta.fecha AS fecha,
				cliente.numDocumento AS numdoc,
				cliente.nombre AS nombre,
				productos_preventa.cantidad AS cant,
				producto.precioUnitario AS preciouni,
				productos_preventa.cantidad * producto.precioUnitario AS total
			FROM
				pre_venta
			INNER JOIN cliente ON pre_venta.id_cliente_fk = cliente.id
			INNER JOIN productos_preventa ON pre_venta.ticket_de_venta = productos_preventa.ticket_preventa_fk
			INNER JOIN producto ON productos_preventa.id_producto = producto.id
				
			UNION ALL
		
			SELECT
				CONCAT('Compras') AS tipo,
				compra.fecha AS fecha,
				proveedor.numDocumento AS numdoc,
				proveedor.razonSocial AS nombre,
				productos_compra.cantidad AS cant,
				producto.precioUnitario AS preciouni,
				productos_compra.cantidad * producto.precioUnitario AS total
			FROM
				compra
			INNER JOIN proveedor ON compra.id_proveedor_fk = proveedor.id
			INNER JOIN productos_compra ON compra.ticket_de_compra = productos_compra.ticket_compra_fk
			INNER JOIN producto ON productos_compra.id_producto_fk = producto.id
		) jugadores ORDER BY fecha;");

			$stm->execute();

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