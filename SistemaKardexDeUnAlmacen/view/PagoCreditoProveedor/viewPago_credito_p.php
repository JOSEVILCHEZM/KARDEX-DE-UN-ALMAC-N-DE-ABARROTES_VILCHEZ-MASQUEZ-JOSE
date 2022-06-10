<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Créditos Proveedores</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
            <li class="breadcrumb-item ">Pago Crédito Proveedor</li>
            <li class="breadcrumb-item active">Créditos Proveedores</li>
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
          <!--
          <div class="card-header">
            <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '','','','','','','','Nuevo' );">
              <button type="button" class="btn btn-primary">Nuevo</button>

            </a>

          </div>
            -->
          <!-- /.card-header -->
          <div class="card-body ">
            <table id="example1" class="table table-bordered table-striped table-responsive-sm">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>N° de documento</th>
                  <th>Proveedor</th>
                  <th>Moneda</th>
                  <th>Compra Ticket</th>
                  <th>Total Compra</th>
                  <th>Deuda</th>
                  <th>Fecha</th>
                  <th>Estado</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($this->model->Listar() as $r) : ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $this->oProveedor->Obtener($r->id_proveedor_fk)->numDocumento ?></td>
                    <td><?php echo $this->oProveedor->Obtener($r->id_proveedor_fk)->razonSocial ?></td>
                    <td><?php echo $this->oCompra->ObtenerTicket($r->id_compra_fk)->moneda == 1 ? 'Soles' : 'Dólar'; ?></td>
                    <td><?php echo $this->oCompra->ObtenerTicket($r->id_compra_fk)->ticket_de_compra ?></td>
                    <td><?php echo $r->total ?></td>

                    <td><?php echo $r->deuda; ?></td>
                    <td><?php echo $this->oCompra->ObtenerTicket($r->id_compra_fk)->fecha ?></td>
                    <td><?php echo $r->estado == 0 ? 'Sin Pagar' : 'Pagado'; ?></td>

                    <td>

                      <a class="pagoCredito" href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id_credito_p; ?>',
                         '<?php echo $this->oProveedor->Obtener($r->id_proveedor_fk)->numDocumento; ?>',
                         '<?php echo $this->oProveedor->Obtener($r->id_proveedor_fk)->razonSocial; ?>',
                         '<?php echo $this->oCompra->ObtenerTicket($r->id_compra_fk)->fecha; ?>',
                         '<?php echo $r->total; ?>',
                         '<?php echo $r->deuda; ?>',
                         '<?php echo $r->estado; ?>',
                         'Modificar' );">
                        <i class="fas fa-shopping-cart"></i>&nbsp &nbsp
                      </a>
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



<!-- /.MODAL -->
<div class="modal fade" id="modal-lg">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModal" align='center'>Pagar Crédito</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="?c=Detalle_pago_credito_p&a=Guardar" method="post" enctype="multipart/form-data">

          <input type="hidden" id="id_credito_p" name="id_credito_p">

          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="numDocumento"> Número Documento</label>
                <input type="text" id="numDocumento" name="numDocumento" maxlength="50" required class="form-control" placeholder="Ingresar Número de Documento" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" readonly>
              </div>
            </div>

            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="razonSocial"> Razón Social</label>
                <input type="text" id="razonSocial" name="razonSocial" maxlength="50" required class="form-control" placeholder="Ingresar razón social" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            
            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="fechCompra"> Fecha de compra</label>
                <input type="text" id="fechaCompra" name="fechaCompra" class="form-control" maxlength="9" required placeholder="Ingrese Fecha de compra" readonly>
              </div>
            </div>
            
            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="totalCompra"> Total de compra</label>
                <input type="text" id="totalCompra" name="totalCompra" class="form-control" maxlength="9" required placeholder="Ingrese Compra" readonly>
              </div>
            </div>
            
            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="deuda"> Deuda</label>
                <input type="text" id="deuda" name="deuda" class="form-control" maxlength="9" required placeholder="Ingrese Salario" readonly>
              </div>
            </div>

          </div>



          <div class="row">
            <div class="card-body " id="mostrar">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Ticket</th>
                    <th>Total</th>
                  </tr>
                </thead>

                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>

          <input type="hidden" id="id_detalle_credito_p" name="id_detalle_credito_p" value="0">

          <!--
          <div class="row">

            <div class="col-sm-12">
              <div class="form-group row">
                <label class="col-sm-5" >Usted ha pagado</label><strong><label class="col-sm-5" id="pagadoLabel" name="pagadoLabel">$0.0</label></strong><label class="col-sm-5">de</label><strong><label class="col-sm-5" id="totalLabel" name="totalLabel">$0.0</label></strong>
              </div>
            </div>

          </div>
          -->

          <div class="row">
            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="ticketPago"> Ticket de pago</label>
                <input type="text" id="ticketPago" name="ticketPago" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" maxlength="9" required placeholder="Ingrese Ticket de pago">
              </div>
            </div>

            <div class="col-sm-6">
              <!-- text input -->
              <div class="form-group">
                <label for="totalPagar"> Total a pagar</label>
                <input type="text" id="totalPagar" name="totalPagar" class="form-control" maxlength="9" required placeholder="Ingrese Total a pagar">
              </div>
            </div>  
          </div>

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="botonfooterModal">Pagar</button>
      </div>

      </form>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
  }


  function showFunctionModal(id, 
  numDocumento, 
  razonSocial, 
  fechaCompra, 
  totalCompra, 
  deuda, 
  estado, 
  accion) {

    if (accion == 'Nuevo') {
      document.getElementById("id_credito_p").value = '';

      document.getElementById("botonfooterModal").innerHTML = "Registrar";
      document.getElementById("tituloModal").innerHTML = "Pagar Crédito";
    } else if (accion == "Modificar") {

      document.getElementById("id_credito_p").value = id;
      document.getElementById("numDocumento").value = numDocumento;
      document.getElementById("razonSocial").value = razonSocial;
      document.getElementById("fechaCompra").value = fechaCompra;
      document.getElementById("totalCompra").value = totalCompra;
      document.getElementById("deuda").value = deuda;
      
      document.getElementById("estado").value = estado;

/*
      document.getElementById("totalLabel").innerHTML = totalCompra;
      document.getElementById("totalLabel").value = totalCompra;
*/
      
      document.getElementById("botonfooterModal").innerHTML = "Pagar";
      document.getElementById("tituloModal").innerHTML = "Pagar Crédito";

    }

  }
</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!--TRAER ELEMENTOS AJAX (Pagos de trabajadores)-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>
  var jQuery_2_2_4 = $.noConflict(true);
  $(document).ready(function(e) {

    $(".pagoCredito").click(function() {
      mostrarDescuentos($("#id_credito_p").val());
    });

    function mostrarDescuentos(id) {
      var parametros = {
        "id": id,
      };

      jQuery_2_2_4.ajax({
        data: parametros,
        url: 'ajax/pagoCreditoProveedor.php',
        type: 'POST',
        beforesend: function() {
          $("#mostrar").html("");
        },
        success: function(response) {
          $("#mostrar").html(response);
        }
      });

    }

  });
</script>