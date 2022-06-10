<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kardex Cliente</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
            <li class="breadcrumb-item ">Reportes</li>
            <li class="breadcrumb-item active">Kardex del Cliente</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">

      <form id="formulario" class="form-horizontal" action="?c=ReporteK&a=KardexCliente" method="post" enctype="multipart/form-data">

        <div class="card">

          <!-- /.card-header -->
          <div class="card-body ">

            <h3>BUSCAR</h3>
            <br />

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="id_cliente_fk">Cliente</label>
                  <select class="form-control" id="id_cliente_fk" name="id_cliente_fk" required style="width: 100%;">

                    <option value="-1">Seleccionar</option>

                    <?php $i = 1;
                    foreach ($this->model->ListarCLientes() as $r) : ?>
                      <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?> <?php echo $r->aPaterno; ?> <?php echo $r->aMaterno; ?></option>
                    <?php endforeach; ?>

                  </select>
                </div>
              </div>

              <!--
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="id_fecha">Fecha</label>
                  <input type="date" class="form-control" id="id_fecha" name="id_fecha">
                </div>
              </div>
              -->

            </div>

            <div class="row">
              <div class="col-sm-9">
                <div class="form-group">
                  <input type="button" class="btn btn-primary" id="botonfooterModal" name="botonfooterModal" value="Buscar...">
                </div>
              </div>
              
              <div class="col-sm-3">
                <div class="form-group">
                   <a onclick="generarPDF(id_cliente_fk.value)" >
                    <button type="button" class="btn btn-success">Generar Reporte PDF</button>
                   </a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

        </div>
        <!-- /.card -->
        
      </form>

      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card">

          <div class="row">
            <div class="card-body " id="mostrar">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>DOC.</th>
                    <th>Cliente</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                  </tr>
                </thead>

                <tfoot>
                </tfoot>
              </table>
            </div>
          </div>

          <!--
          <div class="card-body ">
            <table id="example1" class="table table-bordered table-striped table-responsive-sm">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fecha</th>
                  <th>DOC.</th>
                  <th>Descripción</th>
                  <th>Kilos</th>
                  <th>Precio</th>
                  <th>Total</th>
                  
                </tr>
              </thead>
              <tbody>

                <?php $i = 1;
                foreach ($this->model->Listar(0) as $r) : ?>
                  <tr>
                    <td><?php echo $i++; ?></td>

                    <td><?php echo $r->fecha ?></td>
                    <td><?php echo $r->numdoc ?></td>
                    <td><?php echo $r->nombre ?></td>
                    <td><?php echo $r->cant ?></td>
                    <td><?php echo $r->preciouni ?></td>
                    <td><?php echo $r->total ?></td>

                  </tr>


                <?php endforeach; ?>

              </tbody>
              <tfoot>
              </tfoot>
            </table>
          </div>
          -->

        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<script>
  function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
  }

  function volver() {
    alert("LA");
  }
</script>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!--TRAER ELEMENTOS AJAX (Pagos de trabajadores)-->
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<script>
    
    
    function generarPDF(id) {
      var a = document.createElement('a');
      a.target="_blank";
      a.href="?c=ReporteK&a=KardexCliente&id="+id;
      a.click();
    }
    
    
    
    
  var jQuery_2_2_4 = $.noConflict(true);

  $(document).ready(function(e) {

    $("#botonfooterModal").click(function() {
      mostrarDescuentos($("#id_cliente_fk").val());
    });
   

    function mostrarDescuentos(id) {

      //alert(id);

      var parametros = {
        "id": id,
      };

      jQuery_2_2_4.ajax({
        data: parametros,
        url: 'ajax/kardexCliente.php',
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