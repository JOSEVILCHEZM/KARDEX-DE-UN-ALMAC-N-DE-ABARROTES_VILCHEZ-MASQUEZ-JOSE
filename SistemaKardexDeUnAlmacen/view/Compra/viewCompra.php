<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Compra</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
            <li class="breadcrumb-item ">Módulo: Compras</li>
            <li class="breadcrumb-item active">Compra</li>
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
            <a href="" data-toggle="modal" data-target="#modal-xl" onclick="javascript:showFunctionModal(
                         '','','','','','','','','','','','','Nuevo' );">
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
                  <th>Ticket de Compra</th>
                  <th>Proveedor</th>
                  <th>Medio pago</th>
                  <th>Moneda</th>

                  <th>Total</th>
                  <th>Acción</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1;
                foreach ($this->model->Listar() as $r) : ?>
                  <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $r->id_compra; ?></td>
                    <td><?php echo $r->ticket_de_compra; ?></td>

                    <td><?php echo $this->oProveedor->Obtener($r->id_proveedor_fk)->referencia ?> - <?php echo $this->oProveedor->Obtener($r->id_proveedor_fk)->razonSocial ?></td>
                    <td><?php echo $r->medio_pago == 1 ? 'Crédito' : 'Débito'; ?></td>
                    <td><?php echo $r->moneda == 1 ? 'Dólar' : 'Soles'; ?></td>

                    <td><?php echo $r->total; ?></td>

                    <td>
                      

                      <a onclick="javascript:listar('<?php echo $r->ticket_de_compra; ?>');" href="" data-toggle="modal" data-target="#modal-xlL"><i class="fas fa-comment"></i></a>
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
<div class="modal fade" id="modal-xlL">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModalL" align='center'>Lista de Compras</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formulario" class="form-horizontal" action="#" method="post" enctype="multipart/form-data">

          <div class="row">

            <div class="card-body " id="mostrar">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Ticket</th>
                    <th>Cantidad</th>
                    <th>Peso bandeja</th>
                    <th>Peso por bandeja</th>
                    <th>Precio unitario</th>
                    <th>Pollos</th>
                    <th>Total</th>
                    <th>Bandeja</th>
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
<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="tituloModal" align='center'>Compra</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formulario" class="form-horizontal" action="?c=Compra&a=Guardar" method="post" onsubmit="return validar();" enctype="multipart/form-data">

          <input type="hidden" id="id_compra" name="id_compra">

          <!--
          <input id="tag">
                      -->

          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label for="ticket">Ticket de compra</label>
                <input type="text" id="ticket_de_compra" name="ticket_de_compra" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" maxlength="11" required class="form-control" placeholder="ingresar Compra">
              </div>
            </div>

            

            

            <div class="col-sm-6">
              <div class="form-group">
                <label for="id_proveedor_fk">Proveedor</label>
                <select class="form-control select2bs4" id="id_proveedor_fk" name="id_proveedor_fk" required style="width: 100%;">

                  <option value="-1">Seleccionar</option>

                  <?php $i = 1;
                  foreach ($this->model->ListarProveedor() as $r) : ?>
                    <option value="<?php echo $r->id; ?>"><?php echo $r->razonSocial; ?> - <?php echo $r->referencia; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

          </div>

          <div class="row">

            

            <div class="col-sm-6">
              <div class="form-group">
                <label for="medio_pago">Medio de pago</label>
                <select class="form-control select2bs4" id="medio_pago" name="medio_pago" required style="width: 100%;">
                  <option value="-1">Seleccionar</option>
                  <option value="0">Débito</option>
                  <option value="1">Crédito</option>
                </select>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="moneda">Moneda</label>
                <select class="form-control select2bs4" id="moneda" name="moneda" required style="width: 100%;">
                  <option value="-1">Seleccionar</option>
                  <option value="0">Soles</option>
                  <option value="1">Dólar</option>
                </select>
              </div>
            </div>

          </div>



          <div class="row">

            <div class="col-sm-6">
              <div class="form-group">
                <label for="subtotal">Subtotal</label>
                <input type="text" id="subtotalJA" name="subtotalJA" maxlength="10" disabled required class="form-control" placeholder="Ingresar Subtotal" value="0">
                <input type="hidden" id="subtotal" name="subtotal" value="0">
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="descuento">Total</label>
                <input type="text" id="totalJA" name="totalJA" maxlength="10" disabled required class="form-control" placeholder="Ingresar Descuento" value="0">
                <input type="hidden" id="totalL" name="totalL" value="0">
              </div>
            </div>

            <div id="tablas">
              <div class="form-group">
                <div class="table-responsive">

                  <button type="button" name="add" id="add" class="btn btn-success">Agregar</button>
                  <hr />

                  <table class="table table-bordered table-striped table-responsive-sm" id="dynamic_field">

                    <thead class="thead-dark">
                      <tr>
                        <th>Producto</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>

                        <th>Precio unitario</th>

                        <th>Total</th>
                      
                      </tr>
                    </thead>

                    <tbody>

                    </tbody>

                  </table>

                </div>
              </div>
            </div>

          </div>

          <hr />

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="botonfooterModal">Guardar cambios</button>
      </div>

      </form>

    </div>
  </div>
</div>
<!-- /.modal -->

<div id="pruebaEEE">
    
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var items = <?= json_encode($array); ?>

    $("#tag").autocomplete({
      source: items
    });
  });
</script>

<script>
  // CANTIDAD = SUBTOTAL * Precio. Unit. Agua

  $(document).ready(function() {

    $("#precio_unitario_pollo").on("keyup", function(evento) {

      var valor = document.getElementById("precio_unitario_pollo").value;

      document.getElementById("precio_unitario_aguaJA").value = valor;
      document.getElementById("precio_unitario_agua").value = valor;

    });

    $("#peso_agua").on("keyup", function(evento) {

      var valor = document.getElementById("peso_agua").value;

      document.getElementById("peso_total_polloJA").value = '-' + valor;
      document.getElementById("peso_total_pollo").value = '-' + valor;

      multiplica(valor, document.getElementById("precio_unitario_agua").value);

    });

  });
</script>

<script>
  function alerta() {
    alert("JA");
  }

  function multiplica(peso_agua, peso_uni_agua) {

    var m = peso_agua * peso_uni_agua;

    document.getElementById("totalL").value = '-' + m;
    document.getElementById("totalJA").value = '-' + m;
  }
</script>

<script type="text/javascript">
  function listar(id) {

    var parametros = {
      "id": id,
    };

    $.ajax({
      data: parametros,
      url: 'ajax/detallesCompra.php',
      type: 'POST',
      beforesend: function() {
        $("#mostrar").html("");
      },
      success: function(response) {
        $("#mostrar").html(response);
      }
    });

  }


  function peso_bandeja(peso_bandeja) {

    

  }

  function totalBandejas(peso_bandeja, peso_por_bandeja, bandeja) {

    var peso_ban = parseFloat(document.getElementById(peso_bandeja).value);
    var peso_por_ban = parseFloat(document.getElementById(peso_por_bandeja).value);
    //var bandeja = parseFloat(document.getElementById(bandeja).value);

    var totalBan = peso_ban / peso_por_ban;

    document.getElementById("total_bandejasJA").value = totalBan.toFixed(2);
    document.getElementById("total_bandejas").value = totalBan.toFixed(2);

    document.getElementById(bandeja).value = totalBan.toFixed(2);

  }

  function loc(producto, precio_unitario) {

    document.getElementById(producto).value = "JUAJUA";
    document.getElementById(precio_unitario).value = "LOL";

  }

  function prod(item, precio_unitario, cant) {
    
    document.getElementById("cantidad"+cant).value=item;
    document.getElementById("precio"+cant).value=cant;
  }

  function multiplicar2(cantidad,precio, total) {
    var cantidad2;
    var precio2;
    var subtotal;
    var m3;

    //Para mostrar el Subtotal de las compras de los Items
    cantidad2 = document.getElementById(cantidad).value;
    precio2 = document.getElementById(precio).value;
    m3=cantidad2*precio2;
    

    //Retiramos el subTotal del item al subTotal general
    subtotal = document.getElementById("subtotalJA").value;
    subtotal = subtotal - parseFloat(document.getElementById(total).value);

    //Para Actualizar el subtotal del Item
    document.getElementById(total).value = m3.toFixed(2);

    //Para el subtotal General
    var totalGeneral =parseFloat(subtotal)+ m3;
    document.getElementById("subtotalJA").value= totalGeneral;
    document.getElementById("subtotal").value= totalGeneral;

    document.getElementById("totalJA").value= totalGeneral;
    document.getElementById("totalL").value= totalGeneral;
  }

  function multiplicar(cantidad, total) {

    var m3;
    var m4;
    var m5;

    m1 = document.getElementById(cantidad).value;
    m2 = document.getElementById("precio_unitario_aguaJA").value;

    m3 = parseFloat(m1) * parseFloat(m2);

    document.getElementById("subtotalJA").value = m3.toFixed(2);
    document.getElementById("subtotal").value = m3.toFixed(2);

    m4 = parseFloat(m3) + parseFloat(document.getElementById("totalJA").value);

    document.getElementById("totalJA").value = m4.toFixed(2);
    document.getElementById("totalL").value = m4.toFixed(2);

    m5 = parseFloat(m1) + parseFloat(document.getElementById("peso_total_pollo").value);

    document.getElementById("peso_total_pollo").value = m5.toFixed(2);
    document.getElementById("peso_total_polloJA").value = m5.toFixed(2);

    document.getElementById(total).value = m3.toFixed(2);

  }

  function volver() {
    document.getElementById("subtotal").value = "0";
    document.getElementById("total_a_pagar").value = "0";
  }

  function updateTotal() {
    var descuento = document.getElementById("descuento").value;

    var total = 0; //
    var total_a_pagar;

    var list = document.getElementsByClassName("input");
    var values = [];

    for (var i = 0; i < list.length; ++i) {
      values.push(parseFloat(list[i].value));
    }

    total = values.reduce(function(previousValue, currentValue, index, array) {
      return previousValue + currentValue;
    });

    if (descuento === 0) {
      total_a_pagar = total;
    } else {
      total_a_pagar = total - total * (descuento / 100);
    }

    document.getElementById("total_a_pagar").value = total_a_pagar;
    document.getElementById("total_a_pagarJA").value = total_a_pagar;

    document.getElementById("subtotal").value = total;
    document.getElementById("subtotalJA").value = total;

  }

  function subtotal() {
    var total = 0;

    cantidad = $('input[name="producto[]"]').length;

    for (k = 0; k < cantidad; k++) {
      total += document.getElementById("total" + k).value;
    }

    document.getElementById("subtotal").value = total;

  }

  function colocar(id, nombre, precio) {

    alert(id);
    /*
    m3 = document.getElementById(id).value;
    m4 = document.getElementById(nombre).value;

    r = m3*m4;

    document.getElementById(precio).value=r;
    */

    /*
        var parametros = {
          "id": m3,
        };

        $.ajax({
          data: parametros,
          url: 'ajax/detallesProducto.php',
          type: 'POST',
          beforesend: function() {
            $("#mostrar").html("");
          },
          success: function(response) {
            $("#mostrar").html(response);
          }
        });
    */

  }
</script>

<script>
  $(document).ready(function() {
    var i = 1;
    $('#add').click(function() {
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" id="\o' + i + '\" name="producto[]" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this);mostrarPrecio(\'' + i + '\',\o' + i + '.value\)" step="any" placeholder="Ingrese producto" class="form-control name_list data1" /></td><td><input type="text" name"nombre" disabled id="nombre' + i + '" step="any" placeholder="Nombre del producto" class="form-control name_list" /></td><td><input type="text" name="cantidad[]" id="cantidad' + i + '" onChange="multiplicar2(\'cantidad' + i + '\',\'precio' + i + '\',\'total' + i + '\');" placeholder="Cantidad" step="any" class="form-control name_list data2" /></td><td><input type="text" name="precio[]" id="precio' + i + '" onChange="prod(\'producto' + i + '\',\'precio' + i + '\',\'' + i + '\');" placeholder="Precio unitario" step="any" class="form-control name_list data5" /></td><td><input type="text" name="total[]" value="0" id="total' + i + '" onChange="multiplicar45(\'cantidad' + i + '\',\'total' + i + '\');" placeholder="Total" step="any" class="form-control name_list data7" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();

      updateTotal();
    });

    $('#submit').click(function() {
      $.ajax({
        url: "name.php",
        method: "POST",
        data: $('#add_name').serialize(),
        success: function(data) {
          alert(data);
          $('#add_name')[0].reset();
        }
      });
    });

  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $("input#item").on("keyup", function() {
      var valor = $(this).val();
      alert(valor);
    })

    //PAARA AGREGAR VALORES INICIALRS DE RESET
    $("#precio_unitario_pollo").val("0");
  })
</script>

<script>
  function select_producto() {

    var id = $("#producto").val();

    document.getElementById("idPro").value = "id=" + id;

  }
  $(document).ready(function(e) {
    $("#id_producto").click(function() {
      mostrarParametros($("#id_producto").val());
    })

    function mostrarParametros(id) {
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
  });
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

  function validar() {

    cantidad = $('input[name="producto[]"]').length;

    //alert(cantidad);

    ticket_de_compra = document.getElementById("ticket_de_compra").value;
    precio_unitario_pollo = document.getElementById("precio_unitario_pollo").value;
    peso_total_pollo = document.getElementById("peso_total_pollo").value;
    id_proveedor_fk = document.getElementById("id_proveedor_fk").value;
    medio_pago = document.getElementById("medio_pago").value;
    moneda = document.getElementById("moneda").value;
    peso_agua = document.getElementById("peso_agua").value;
    precio_unitario_agua = document.getElementById("precio_unitario_agua").value;
    total_bandejas = document.getElementById("total_bandejas").value;
    subtotal = document.getElementById("subtotal").value;
    total = document.getElementById("totalL").value;

    if (id_proveedor_fk === "-1") {
      alert("Debe seleccionar un proveedor");
      return false;
    } else if (medio_pago === "-1") {
      alert("Debe seleccionar un medio");
      return false;
    } else if (moneda === "-1") {
      alert("Debe seleccionar una moneda");
      return false;
    } else if (cantidad === 0) {
      alert("No hay compras existentes");
      return false;
    }

    // LAS COMPRAS


    var c1 = 0;

    var c1Array = new Array();

    var inputsValuesC1 = document.getElementsByClassName('data1');
    nameValues = [].map.call(inputsValuesC1, function(dataInput) {
      c1Array.push(dataInput.value);
    });

    c1Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c1++;
      }

    });

    if (c1 > 0) {
      alert("campo 'producto' vacío");
      return false;
    }



    var c2 = 0;

    var c2Array = new Array();

    var inputsValuesC2 = document.getElementsByClassName('data2');
    nameValues = [].map.call(inputsValuesC2, function(dataInput) {
      c2Array.push(dataInput.value);
    });

    c2Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c2++;
      }

    });

    if (c2 > 0) {
      alert("campo 'cantidad' vacío");
      return false;
    }


    var c3 = 0;

    var c3Array = new Array();

    var inputsValuesC3 = document.getElementsByClassName('data3');
    nameValues = [].map.call(inputsValuesC3, function(dataInput) {
      c3Array.push(dataInput.value);
    });

    c3Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c3++;
      }

    });

    if (c3 > 0) {
      alert("campo 'peso bandeja' vacío");
      return false;
    }


    var c4 = 0;

    var c4Array = new Array();

    var inputsValuesC4 = document.getElementsByClassName('data4');
    nameValues = [].map.call(inputsValuesC4, function(dataInput) {
      c4Array.push(dataInput.value);
    });

    c4Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c4++;
      }

    });

    if (c4 > 0) {
      alert("campo 'peso por bandeja' vacío");
      return false;
    }


    var c5 = 0;

    var c5Array = new Array();

    var inputsValuesC5 = document.getElementsByClassName('data5');
    nameValues = [].map.call(inputsValuesC5, function(dataInput) {
      c5Array.push(dataInput.value);
    });

    c5Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c5++;
      }

    });

    if (c5 > 0) {
      alert("campo 'precio unitario' vacío");
      return false;
    }


    var c6 = 0;

    var c6Array = new Array();

    var inputsValuesC6 = document.getElementsByClassName('data6');
    nameValues = [].map.call(inputsValuesC6, function(dataInput) {
      c6Array.push(dataInput.value);
    });

    c6Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c6++;
      }

    });

    if (c6 > 0) {
      alert("campo 'pollo(s)' vacío");
      return false;
    }


    var c7 = 0;

    var c7Array = new Array();

    var inputsValuesC7 = document.getElementsByClassName('data7');
    nameValues = [].map.call(inputsValuesC7, function(dataInput) {
      c7Array.push(dataInput.value);
    });

    c7Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c7++;
      }

    });

    if (c7 > 0) {
      alert("campo 'total' vacío");
      return false;
    }


    var c8 = 0;

    var c8Array = new Array();

    var inputsValuesC8 = document.getElementsByClassName('data8');
    nameValues = [].map.call(inputsValuesC8, function(dataInput) {
      c8Array.push(dataInput.value);
    });

    c8Array.forEach(function(inputsValuesData) {
      if (inputsValuesData === "") {
        c8++;
      }

    });

    if (c8 > 0) {
      alert("campo 'pollo(s)' vacío");
      return false;
    }


    return true;
  }
</script>

<script>
  function limpiarNumero(obj) {
    /* El evento "change" sólo saltará si son diferentes */
    obj.value = obj.value.replace(/\D/g, '');
  }


  function showFunctionModal(id_compra,
    ticket_de_compra,
    precio_unitario_pollo,
    peso_total_pollo,
    id_proveedor_fk,
    medio_pago,
    moneda,
    peso_agua,
    precio_unitario_agua,
    total_bandejas,
    subtotal,
    total,
    accion) {

    if (accion == 'Nuevo') {

      //document.getElementById("add").disabled = false;

      document.getElementById("ticket_de_compra").value = '';
      document.getElementById("precio_unitario_pollo").value = '';

      document.getElementById("peso_total_pollo").value = '';
      document.getElementById("peso_total_polloJA").value = '';

      document.getElementById("id_proveedor_fk").value = '-1';
      document.getElementById("medio_pago").value = '-1';
      document.getElementById("moneda").value = '-1';

      document.getElementById("peso_agua").value = '';

      document.getElementById("precio_unitario_agua").value = '';
      document.getElementById("precio_unitario_aguaJA").value = '';

      document.getElementById("total_bandejas").value = '0';
      document.getElementById("total_bandejasJA").value = '0';

      document.getElementById("totalL").value = '0';
      document.getElementById("totalJA").value = '0';

      document.getElementById("subtotal").value = '0';
      document.getElementById("subtotalJA").value = '0';

      $('#add').show();
      $('#tablas').show();

      document.getElementById("botonfooterModal").innerHTML = "Registrar";
      document.getElementById("tituloModal").innerHTML = "Nueva Compra";


    } else if (accion == "Modificar") {

      //document.getElementById("add").disabled = true;

      document.getElementById("id_compra").value = id_compra;

      document.getElementById("ticket_de_compra").value = ticket_de_compra;
      document.getElementById("precio_unitario_pollo").value = precio_unitario_pollo;

      document.getElementById("peso_total_pollo").value = peso_total_pollo;
      document.getElementById("peso_total_polloJA").value = peso_total_pollo;

      document.getElementById("id_proveedor_fk").value = id_proveedor_fk;
      document.getElementById("medio_pago").value = medio_pago;
      document.getElementById("moneda").value = moneda;

      document.getElementById("peso_agua").value = peso_agua;

      document.getElementById("precio_unitario_agua").value = precio_unitario_agua;
      document.getElementById("precio_unitario_aguaJA").value = precio_unitario_agua;

      document.getElementById("total_bandejas").value = total_bandejas;
      document.getElementById("total_bandejasJA").value = total_bandejas;

      document.getElementById("totalL").value = total;
      document.getElementById("totalJA").value = total;

      document.getElementById("subtotalJA").value = subtotal;

      $('#add').hide();
      $('#tablas').hide();

      document.getElementById("botonfooterModal").innerHTML = "Modificar";
      document.getElementById("tituloModal").innerHTML = "Modificar Compra";

    }

    //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
  }
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>

<script>
    
    var jQuery_2_2_4 = $.noConflict(true);   
    function mostrarPrecio(id,id_producto){
        
            var parametros ={
                "id":id,
                "id_Producto":id_producto,
            };

            jQuery_2_2_4.ajax({
                data:parametros,
                url: 'ajax/mostrarPrecio.php',
                type:'POST',
                beforesend:function(){
                    $("#pruebaEEE").html("");
                },
                success:function(response){
                    $("#pruebaEEE").html(response);
                }
            });

        }
    
              
</script>
