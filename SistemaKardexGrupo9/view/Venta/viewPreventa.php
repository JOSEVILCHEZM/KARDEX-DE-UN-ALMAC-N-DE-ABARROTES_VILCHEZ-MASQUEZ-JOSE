<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pre Venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
            <li class="breadcrumb-item ">Ventas</li>
            <li class="breadcrumb-item active">Pre-Venta</li>
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
          <div class="card-header">
            <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '','','','','','','','','Nuevo' );">
              <button type="button" class="btn btn-primary">Nuevo</button>
            </a>
          </div>
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
                    <td><?php echo $r->id_cliente_fk; ?></td>
                    <td><?php echo $r->medio_pago == 1 ? 'Crédito' : 'Débito'; ?></td>
                    <td><?php echo $r->moneda == 1 ? 'Dólar' : 'Soles'; ?></td>
                    <td><?php echo $r->ticket_de_venta; ?></td>
                    <td><?php echo $r->subtotal; ?></td>
                    <td><?php echo $r->descuento; ?></td>
                    <td><?php echo $r->total_a_pagar; ?></td>

                    <td>
                      <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $r->id_cliente_fk; ?>',
                         '<?php echo $r->medio_pago; ?>',
                         '<?php echo $r->moneda ?>',
                         '<?php echo $r->ticket_de_venta; ?>',
                         '<?php echo $r->subtotal; ?>',
                         '<?php echo $r->descuento ?>',
                         '<?php echo $r->total_a_pagar; ?>',
                         'Modificar' );">
                        <i class="fas fa-edit"></i>&nbsp &nbsp
                      </a>
                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Preventa&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fas fa-trash-alt"></i></a>
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
        <h4 class="modal-title" id="tituloModal" align='center'>Default Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form class="form-horizontal" action="?c=Preventa&a=Guardar" method="post" enctype="multipart/form-data">

          <!--
          ?c=Preventa&a=Guardar
          -->

          <input type="hidden" id="id" name="id">
          <input type="hidden" id="estado" name="estado">

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="id_cliente_fk">Cliente</label>
                <select class="form-control select2bs4" id="id_cliente_fk" name="id_cliente_fk" style="width: 100%;">
                  <option>Seleccionar</option>

                  <?php $i = 1;
                  foreach ($this->model->ListarCLientes() as $r) : ?>
                    <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?> <?php echo $r->aPaterno; ?> <?php echo $r->aMaterno; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="producto">Producto</label>
                <select class="form-control select2bs4" id="producto" name="producto" style="width: 100%;">
                  <option>Seleccionar</option>

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
                <label for="canPro"></label>
                <input type="text" id="canPro" name="canPro" required class="form-control" placeholder="Cantidad del producto" value="0">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="idPro"></label>
                <input type="text" id="idPro" name="idPro" required class="form-control" placeholder="ID" value="0">
              </div>
            </div>
          </div>


          <div class="row">

            <div class="col-sm-4">
              <div class="form-group">
                <label for="medio_pago">Medio de pago</label>
                <select class="form-control select2bs4" id="medio_pago" name="medio_pago" style="width: 100%;">
                  <option>Seleccionar</option>
                  <option value="0">Débito</option>
                  <option value="1">Crédito</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="moneda">Moneda</label>
                <select class="form-control select2bs4" id="moneda" name="moneda" style="width: 100%;">
                  <option>Seleccionar</option>
                  <option value="0">Soles</option>
                  <option value="1">Dólar</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="ticket">Ticket de venta</label>
                <input type="text" id="ticket_de_venta" name="ticket_de_venta" maxlength="11" required class="form-control" placeholder="ingresar ticket de venta">
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="text" id="subtotal" name="subtotal" maxlength="50" required class="form-control" placeholder="Ingresar Subtotal" value="0">
              </div>
            </div>

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="descuento">Descuento</label>
                <input type="text" id="descuento" name="descuento" maxlength="50" required class="form-control" placeholder="Ingresar Descuento">
              </div>
            </div>

            <div class="col-sm-4">
              <!-- text input -->
              <div class="form-group">
                <label for="total">Total a pagar</label>
                <input type="text" id="total_a_pagar" name="total_a_pagar" maxlength="50" required class="form-control" placeholder="Ingresar total a pagar" value="0">
              </div>
            </div>

          </div>

          <hr />

          <!--
          <table class="table">

            <thead class="thead-dark">
              <tr>
                <th scope="col">Item</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
                <th scope="col"></th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <th scope="row">
                  <input type="text" id="item" name="item" maxlength="50" required class="form-control" placeholder="Item">
                </th>

                <td>
                  <input type="text" disabled id="producto" name="producto" maxlength="50" required class="form-control" placeholder="Producto">
                </td>

                <td>
                  <input type="text" id="cantidad" name="cantidad" maxlength="50" required class="form-control" placeholder="Cantidad">
                </td>

                <td>
                  <input type="text" id="precio" name="precio" maxlength="50" required class="form-control" placeholder="Precio">
                </td>

                <td>
                  <input type="text" disabled id="total" name="total" maxlength="50" required class="form-control" placeholder="Total">
                </td>

                <td>
                  <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-edit"></i></button>
                </td>

              </tr>

            </tbody>
          </table>
          -->

          <from>
            <h2>Comprar productos</h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info" onclick="agregarProducto()">Agregar</button>
            <hr />

            <input type="hidden" id="ListaPro" name="ListaPro" value="" required />

            <table id="TablaPro" class="table">

              <thead class="thead-dark">
                <tr>
                  <th scope="col">Item</th>
                  <th scope="col">Producto</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Total</th>
                  <th scope="col"></th>
                </tr>
              </thead>

              <tbody id="ProSelected">
                <tr>

                </tr>
              </tbody>
            </table>

            <!--Agregue un boton en caso de desear enviar los productos para ser procesados-->
            <div class="form-group">
              <button type="submit" id="guardar" name="guardar" class="btn btn-lg btn-default pull-right">Guardar</button>
            </div>
          </from>

          <!-- Modal -->
          <div class="modal fade" id="myModal" role="dialog">

            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">

                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Agregar producto a la lista</h4>
                </div>

                <div class="modal-body">
                  <div class="form-group">
                    <label>Producto</label>
                    <select class="selectpicker form-control" id="pro_id" name="pro_id" data-width='100%'>
                      <option value="Lentes">Lentes</option>
                      <option value="Casco">Casco</option>
                      <option value="Gorra">Gorra</option>
                    </select>
                  </div>
                </div>

                <div class="modal-footer">
                  <!--Uso la funcion onclick para llamar a la funcion en javascript-->
                  <button type="button" onclick="agregarProducto()" class="btn btn-default" data-dismiss="modal">Agregar</button>
                </div>
              </div>

            </div>
          </div>


      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="botonfooterModal">Guardar cambios</button>
      </div>


      </form>

      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <label for="idPrueba"></label>
            <input type="text" id="idPrueba" name="idPrueba" required class="form-control" placeholder="Id">
          </div>
        </div>
      </div>

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  function select_producto() {

    var id = $("#producto").val();

    document.getElementById("idPro").value = "id=" + id;

  }
</script>

<script type="text/javascript">
  // Refresca Producto: Refresco la Lista de Productos dentro de la Tabla
  // Si es vacia deshabilito el boton guardar para obligar a seleccionar al menos un producto al usuario
  // Sino habilito el boton Guardar para que pueda Guardar
  function RefrescaProducto() {
    var ip = [];
    var i = 0;
    $('#guardar').attr('disabled', 'disabled'); //Deshabilito el Boton Guardar
    $('.iProduct').each(function(index, element) {
      i++;
      ip.push({
        id_pro: $(this).val()
      });
    });
    // Si la lista de Productos no es vacia Habilito el Boton Guardar
    if (i > 0) {
      $('#guardar').removeAttr('disabled', 'disabled');
    }
    var ipt = JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
    $('#ListaPro').val(encodeURIComponent(ipt));
  }

  function agregarProducto() {

    var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
    var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select

    var sptext = text.split();

    var newtr = '<tr class="item"  data-id="' + sel + '">';
    //newtr = newtr + '<td class="iProduct" >' + sel + '</td>';
    newtr = newtr + '<td> <input type="text" id="item" name="item" maxlength="50" required class="form-control" placeholder="Item" required /></td>';
    newtr = newtr + '<td><input type="text" disabled id="producto" name="producto" maxlength="50" required class="form-control" placeholder="Producto" required /></td>';
    newtr = newtr + '<td><input type="text" id="cantidad" name="cantidad" maxlength="50" required class="form-control" placeholder="Cantidad" required /></td>';
    newtr = newtr + '<td><input type="text" id="precio" name="precio" maxlength="50" required class="form-control" placeholder="Precio" required /></td>';
    newtr = newtr + '<td><input type="text" disabled id="total" name="total" maxlength="50" required class="form-control" placeholder="Total" required /></td>';
    newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';

    $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected

    RefrescaProducto(); //Refresco Productos

    $('.remove-item').off().click(function(e) {
      $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
      if ($('#ProSelected tr.item').length == 0)
        $('#ProSelected .no-item').slideDown(300);
      RefrescaProducto();
    });
    $('.iProduct').off().change(function(e) {
      RefrescaProducto();
    });
  }
</script>


<script>

  function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
  }

  function showFunctionModal(id, id_cliente_fk, medio_pago, moneda, ticket_de_venta, subtotal, descuento, total_a_pagar, accion) {

    if (accion == 'Nuevo') {
      document.getElementById("estado").value = 1;

      document.getElementById("id_cliente_fk").value = '';

      document.getElementById("medio_pago").value = '';
      document.getElementById("moneda").value = '';

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
      document.getElementById("subtotal").value = subtotal;
      document.getElementById("descuento").value = descuento;
      document.getElementById("total_a_pagar").value = total_a_pagar;

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