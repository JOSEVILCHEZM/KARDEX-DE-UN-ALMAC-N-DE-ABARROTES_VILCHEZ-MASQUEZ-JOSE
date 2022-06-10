<?php
class Compra
{
    private $pdo;

    public $id_compra;
    public $ticket_de_compra;
    public $precio_unitario_pollo;
    public $peso_total_pollo;
    public $id_proveedor_fk;
    public $medio_pago;
    public $moneda;
    public $peso_agua;
    public $precio_unitario_agua;
    public $total_bandejas;
    public $subtotal;
    public $total;

    public function __CONSTRUCT()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Listar()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM compra");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Obtener($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM compra WHERE id_compra = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerTicket($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("SELECT * FROM compra WHERE ticket_de_compra = ?");


            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function EliminarProductosCompra($id){
		try{

			$stm = $this->pdo
						->prepare("DELETE compra,productos_compra FROM compra JOIN productos_compra ON compra.ticket_de_compra = productos_compra.ticket_compra_fk WHERE productos_compra.ticket_compra_fk = ?");

			$stm->execute(array($id));
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

    public function Eliminar($id)
    {
        try {
            $stm = $this->pdo
                ->prepare("DELETE FROM compra WHERE id_compra = ?");

            $stm->execute(array($id));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function Actualizar($data)
    {
        try {
            $sql = "UPDATE compra SET 
						ticket_de_compra = ?, 
						precio_unitario_pollo = ?,
                        peso_total_pollo = ?,
						id_proveedor_fk = ?, 
						medio_pago = ?,
                        moneda = ?,
                        peso_agua = ?,
                        precio_unitario_agua = ?,
                        total_bandejas = ?,
                        subtotal = ?,
                        total = ?
				    WHERE id_compra = ?";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->ticket_de_compra,
                        $data->precio_unitario_pollo,
                        $data->peso_total_pollo,
                        $data->id_proveedor_fk,
                        $data->medio_pago,
                        $data->moneda,
                        $data->peso_agua,
                        $data->precio_unitario_agua,
                        $data->total_bandejas,
                        $data->subtotal,
                        $data->total,
                        $data->id_compra
                    )
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerCredito($id)
	{
		try 
		{
			$stm = $this->pdo
			          ->prepare("SELECT * FROM pago_credito_p WHERE id_proveedor_fk = ?");

			$stm->execute(array($id));
			return $stm->fetch(PDO::FETCH_OBJ);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function ActualizarTotal($mas, $id)
	{
		try 
		{
			$sql = "UPDATE pago_credito_p SET deuda = ?, total = ? WHERE id_credito_p = ?";

			$this->pdo->prepare($sql)
			     ->execute(
				    array(
                        $mas,
                        $mas,
                        $id
					)
				);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function RegistrarPagoCreditoP(Pago_credito_p $data)
	{
		try 
		{
		$sql = "INSERT INTO pago_credito_p (id_proveedor_fk,id_compra_fk,deuda,total,estado) 
		        VALUES (?,?,?,?,?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->id_proveedor_fk,
                    $data->id_compra_fk,
                    $data->deuda,
                    $data->total,
                    $data->estado
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Registrar(Compra $data)
    {
        try {

            $sql = "INSERT INTO compra (ticket_de_compra,
            precio_unitario_pollo,
            peso_total_pollo,
            id_proveedor_fk,
            medio_pago,
            moneda,
            peso_agua,
            precio_unitario_agua,
            total_bandejas,
            subtotal,
            total) 
		        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $this->pdo->prepare($sql)
                ->execute(
                    array(
                        $data->ticket_de_compra,
                        $data->precio_unitario_pollo,
                        $data->peso_total_pollo,
                        $data->id_proveedor_fk,
                        $data->medio_pago,
                        $data->moneda,
                        $data->peso_agua,
                        $data->precio_unitario_agua,
                        $data->total_bandejas,
                        $data->subtotal,
                        $data->total
                    )
                );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ListarProveedor()
    {
        try {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM PROVEEDOR");
            $stm->execute();

            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistraProductoCompra($contador, $id_producto, $ticket, $cantidad, $peso_bandeja, $peso_por_bandeja, $precio_unitario, $pollos, $total, $bandeja)
    {

        try {

            if ($contador > 0) {
                for ($i = 0; $i < $contador; $i++) {
                    if (trim($id_producto[$i] != '') || trim($cantidad[$i] != '') || trim($peso_bandeja[$i] != '') || trim($peso_por_bandeja[$i] != '') || trim($precio_unitario[$i] != '') || trim($pollos[$i] != '') || trim($total[$i] != '') || trim($bandeja[$i] != '') ) {

                        $val1 = $id_producto[$i];
                        $val2 = $ticket;
                        $val3 = $cantidad[$i];
                        $val4 = 1;
                        $val5 = 1;
                        $val6 = $precio_unitario[$i];
                        $val7 = 1;
                        $val8 = $total[$i];
                        $val9 = 1;

                        $sql = "INSERT INTO productos_compra (id_producto_fk,
                        ticket_compra_fk,
                        cantidad,
                        peso_bandeja,
                        peso_por_bandeja,
                        precio_unitario,
                        pollos,
                        total,
                        bandeja) VALUES (?,?,?,?,?,?,?,?,?)";

                        $this->pdo->prepare($sql)
                            ->execute(
                                array(
                                    $val1,
                                    $val2,
                                    $val3,
                                    $val4,
                                    $val5,
                                    $val6,
                                    $val7,
                                    $val8,
                                    $val9
                                )
                            );
                    }
                }
            }

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

}
