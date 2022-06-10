<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ventas</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
            <li class="breadcrumb-item ">Mantenimiento</li>
            <li class="breadcrumb-item active">Venta</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">


        <div class="card">

          <!-- /.card-header -->
          <div class="card-body ">
            <table id="example1" class="table table-bordered table-striped table-responsive-sm table-responsive-sm">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>ID</th>
                  <th>Cliente</th>
                  <th>Medio de Pago</th>
                  <th>Moneda</th>
                  <th>Ticket de venta</th>
                  <th>Subtotal</th>
                  <th>Descuento</th>
                  <th>Total a pagar</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($this->model->Listar() as $r) : ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $r->id; ?></td>
                    <td><?php echo $this->oCliente->Obtener($r->id_cliente_fk)->nombre ?> <?php echo $this->oCliente->Obtener($r->id_cliente_fk)->aPaterno ?> <?php echo $this->oCliente->Obtener($r->id_cliente_fk)->aMaterno ?></td>
                    <td><?php echo $r->medio_pago == 1 ? 'Crédito' : 'Débito'; ?></td>
                    <td><?php echo $r->moneda == 1 ? 'Dólar' : 'Soles'; ?></td>
                    <td><?php echo $r->ticket_de_venta; ?></td>
                    <td><?php echo $r->subtotal; ?></td>
                    <td><?php echo $r->descuento; ?></td>
                    <td><?php echo $r->total_a_pagar; ?></td>

                    <td>
                      

                      <a onclick="javascript:listar('<?php echo $r->ticket_de_venta; ?>');" href="" data-toggle="modal" data-target="#modal-lgL"><i class="fas fa-comment"></i></a>

                    </td>

                  </tr>


                <?php endforeach; ?>
              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<!-- /.MODAL LISTA-->
<div class="modal fade" id="modal-lgL">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModal" align='center'>Lista de Ventas</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formulario" class="form-horizontal" action="#" method="post" enctype="multipart/form-data">


          <input type="hidden" id="id" name="id">
          <input type="hidden" id="estado" name="estado">

          <div class="row">

            <div class="card-body " id="mostrar">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Cantidad</th>
                    <th>Producto</th>
                    <th>Ticket</th>
                    <th>Total</th>
                  </tr>
                </thead>

                <tbody>

                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>

          </div>

          <hr />

      </div>

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- /.MODAL -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModal" align='center'>Pre-Venta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formulario" class="form-horizontal" action="?c=Venta&a=Guardar" method="post" zenctype="multipart/form-data">

          <!--
            action="?c=Preventa&a=Guardar"
          -->

          <input type="hidden" id="id" name="id">
          <input type="hidden" id="estado" name="estado">

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="id_cliente_fk">Cliente</label>
                <select class="form-control select2bs4" id="id_cliente_fk" name="id_cliente_fk" style="width: 100%;">

                  <option value="-1">Seleccionar</option>

                  <?php $i = 1;
                  foreach ($this->model->ListarCLientes() as $r) : ?>
                    <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?> <?php echo $r->aPaterno; ?> <?php echo $r->aMaterno; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>


          <!--
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="id_producto">Producto</label>
                <select class="form-control select2bs4" id="id_producto" name="id_producto" style="width: 100%;">

                  <option value="-1">Seleccionar</option>

                  <?php $i = 1;
                  foreach ($this->model->ListarProductos() as $r) : ?>
                    <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="can_pro"></label>
                <input type="text" id="can_pro" name="can_pro" required class="form-control" placeholder="Cantidad del producto" value="0">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="idPro"></label>
                <input type="text" id="id_pro" name="id_pro" required class="form-control" placeholder="ID" value="0">
              </div>
            </div>
          </div>
                  -->

          <div class="row">

            <div class="card-body " id="mostrar">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                  <tr>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                </tfoot>
              </table>
            </div>

          </div>

          <div class="row">

            <div class="col-sm-4">
              <div class="form-group">
                <label for="medio_pago">Medio de pago</label>
                <select class="form-control select2bs4" id="medio_pago" name="medio_pago" style="width: 100%;">
                  <option value="-1">Seleccionar</option>
                  <option value="0">Débito</option>
                  <option value="1">Crédito</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="moneda">Moneda</label>
                <select class="form-control select2bs4" id="moneda" name="moneda" style="width: 100%;">
                  <option value="-1">Seleccionar</option>
                  <option value="0">Soles</option>
                  <option value="1">Dólar</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="ticket">Ticket de venta</label>
                <input type="text" id="ticket_de_ventaJA" name="ticket_de_ventaJA" disabled onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" maxlength="11" required class="form-control" placeholder="ingresar ticket de venta">
                <input type="hidden" id="ticket_de_venta" name="ticket_de_venta" value="0">
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="text" id="subtotalJA" name="subtotalJA" maxlength="50" disabled required class="form-control" placeholder="Ingresar Subtotal" value="0">
                <input type="hidden" id="subtotal" name="subtotal" value="0">
              </div>
            </div>

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="descuento">Descuento</label>
                <input type="text" id="descuentoJA" name="descuentoJA" disabled onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" maxlength="50" required class="form-control" placeholder="Ingresar Descuento">
                <input type="hidden" id="descuento" name="descuento" value="0">
              </div>
            </div>

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="total">Total a pagar</label>
                <input type="text" id="total_a_pagarJA" name="total_a_pagarJA" disabled maxlength="50" required class="form-control" placeholder="Ingresar total a pagar" value="0">
                <input type="hidden" id="total_a_pagar" name="total_a_pagar" value="0">
              </div>
            </div>

          </div>

          <hr />

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="validar();">Guardar cambios</button>
      </div>

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script type="text/javascript">
  $(document).ready(function() {
    $("input#item").on("keyup", function() {
      var valor = $(this).val();
      alert(valor);
    })
  })
</script>

<script type="text/javascript">
  function agregar() {

    var id_cliente_fk = document.getElementById("id_cliente_fk").value;
    var medio_pago = document.getElementById("medio_pago").value;
    var moneda = document.getElementById("moneda").value;
    var ticket_de_venta = document.getElementById("ticket_de_venta").value;
    var descuento = document.getElementById("descuento").value;
    var total_a_pagar = 0;
    var subtotal = 0;

    //var datos = $('#formulario').serialize();

    var datos = 'id_cliente_fk=' + id_cliente_fk + '&medio_pago=' + medio_pago + '&moneda=' + medio_pago + '&ticket_de_venta=' + ticket_de_venta + '&descuento=' + descuento + '&total_a_pagar=' + total_a_pagar + '&subtotal=' + total_a_pagar;

    alert(datos);

    $.ajax({
      type: "POST",
      url: "insertar.php",
      data: datos,
      success: function(r) {
        if (r == 1)
          alert("Agregado con éxito");
        else
          alert("Falló el servidor");
      }
    });

  }
</script>

<script>

  function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
  }


  function listar(id){
    
    var parametros = {
      "id": id,
    };

    $.ajax({
      data: parametros,
      url: 'ajax/detallesPreVenta.php',
      type: 'POST',
      beforesend: function() {
        $("#mostrar").html("");
      },
      success: function(response) {
        $("#mostrar").html(response);
      }
    });

  }

  function showFunctionModal(id, id_cliente_fk, medio_pago, moneda, ticket_de_venta, subtotal, descuento, total_a_pagar, accion) {

    if (accion == 'Nuevo') {
      document.getElementById("estado").value = 1;

      document.getElementById("id_cliente_fk").value = '-1';

      document.getElementById("medio_pago").value = '-1';
      document.getElementById("moneda").value = '-1';

      document.getElementById("ticket_de_venta").value = '';
      document.getElementById("subtotal").value = '';
      document.getElementById("descuento").value = '';
      document.getElementById("total_a_pagar").value = '';


      document.getElementById("botonfooterModal").innerHTML = "Registrar";
      document.getElementById("tituloModal").innerHTML = "Nuevo Pre-Venta";


    } else if (accion == "Modificar") {
      document.getElementById("id").value = id;

      document.getElementById("id_cliente_fk").value = id_cliente_fk;

      document.getElementById("medio_pago").value = medio_pago;
      document.getElementById("moneda").value = moneda;

      document.getElementById("ticket_de_venta").value = ticket_de_venta;
      document.getElementById("ticket_de_ventaJA").value = ticket_de_venta;

      document.getElementById("subtotal").value = subtotal;
      document.getElementById("subtotalJA").value = subtotal;

      document.getElementById("descuento").value = descuento;
      document.getElementById("descuentoJA").value = descuento;

      document.getElementById("total_a_pagar").value = total_a_pagar;
      document.getElementById("total_a_pagarJA").value = total_a_pagar;

      document.getElementById("botonfooterModal").innerHTML = "Modificar";
      document.getElementById("tituloModal").innerHTML = "Modificar Venta";

      /*document.getElementById("select2-unidad-container").innerHTML=unidad;*/

      /*if(documento=='DNI'){
           document.getElementById("documento").selectedIndex='1';
         }else{
           document.getElementById("documento").selectedIndex='2';
         }*/


    }

    //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
  }
</script>