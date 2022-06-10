<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pre-Venta</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
            <li class="breadcrumb-item ">Mantenimiento</li>
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
                  <th>Fecha</th>
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
                    <td><?php echo $r->fecha; ?></td>
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
        <h4 class="modal-title" id="tituloModal" align='center'>Pre-Venta</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form id="formulario" class="form-horizontal" action="?c=Preventa&a=Guardar" method="post" onsubmit="return validar();" enctype="multipart/form-data">


          <input type="hidden" id="idP" name="idP">
          <input type="hidden" id="estado" name="estado">

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="id_cliente_fk">Cliente</label>
                <select class="form-control select2bs4" id="id_cliente_fk" name="id_cliente_fk" required style="width: 100%;">

                  <option value="-1">Seleccionar</option>

                  <?php $i = 1;
                  foreach ($this->model->ListarCLientes() as $r) : ?>
                    <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?> <?php echo $r->aPaterno; ?> <?php echo $r->aMaterno; ?></option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-sm-4">
              <div class="form-group">
                <label for="medio_pago">Medio de pago</label>
                <select class="form-control select2bs4" id="medio_pago" name="medio_pago" required style="width: 100%;">
                  <option value="-1">Seleccionar</option>
                  <option value="0">Débito</option>
                  <option value="1">Crédito</option>
                </select>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="form-group">
                <label for="moneda">Moneda</label>
                <select class="form-control select2bs4" id="moneda" name="moneda" required style="width: 100%;">
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
                <input type="text" id="ticket_de_ventaJA" name="ticket_de_ventaJA" maxlength="11" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"   required class="form-control"  placeholder="Ticket" value="<?php echo $this->model->GenerarCorrelativo()?>" readonly>
                <input type="hidden" id="ticket_de_venta" name="ticket_de_venta" maxlength="11"  required class="form-control" >
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
                <input type="text" id="descuentoJA" name="descuentoJA" onKeyPress="validacionDescuento(event);" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" maxlength="3" required class="form-control" placeholder="Ingresar Descuento" value="0">
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

            <div class="form-group">
              <div class="table-responsive">

                <button type="button" name="add" id="add" class="btn btn-success">Agregar</button>
                <hr />

                <table class="table table-bordered table-striped table-responsive-sm" id="dynamic_field">

                  <thead class="thead-dark">
                    <tr>
                      <th>Item</th>
                      <th>Producto</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Total</th>
                    </tr>
                  </thead>

                  <tbody>

                  </tbody>

                </table>

              </div>
            </div>

          </div>

          <hr />

      </div>

      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="LlenarTicket()">Guardar cambios</button>
      </div>

      </form>

      <!--
      <form id="form" name="form" method="post">
        <a href="#" onclick="AgregarCampos();">Agregar Nota</a>
        <ul id="campos"></ul>
      </form>
      -->

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
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

      /*
      select: function (event, item) {
      	var params = {
      		equipo: item.item.value
      	};
      	$.get("getEquipo.php", params, function (response) {
      		var json = JSON.parse(response);
      		if (json.status == 200){
      			$("#nombre").html(json.nombre);
      			//$("#avatar").attr("src", json.icono);
      		}else{

      		}
      	}); // ajax
      }
      */

    });
  });
</script>

<script>
    
 function LlenarTicket(){
     var ticket_de_ventaJAaa = document.getElementById("ticket_de_ventaJA").value;
      document.getElementById("ticket_de_venta").value = ticket_de_ventaJAaa;
 }
    
  function validacionDescuento(event) {

    document.getElementById("descuento").addEventListener("keypress", validacionDescuento);

    var key = event.which || event.keyCode,
      value = event.target.value,
      n = value + String.fromCharCode(key);
    if (isNaN(n) || n < 0 || n > 100)
      event.preventDefault();
  }
</script>

<script type="text/javascript">
  function multiplicar(cantidad, precio, total) {
    m1 = document.getElementById(cantidad).value; //Dejo fijo los input y resulta.
    m2 = document.getElementById(precio).value; //Así funciona... pero cuando le entrego valores variables, no
    r = m1 * m2;
    document.getElementById(total).value = r;

    //document.getElementById("total_a_pagarJA").value="123";

    updateTotal();
    //subtotal();
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
      //total_a_pagar = total - total * (descuento / 100);
      total_a_pagar = total - descuento;
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
      var descuento = document.getElementById("descuentoJA").value;
      document.getElementById("descuento").value = descuento;
      
      i++;
      $('#dynamic_field').append('<tr id="row' + i + '"><td><input  id="\o' + i + '\" type="text" name="producto[]"  onkeyup="limpiarNumero(this);;" onchange="limpiarNumero(this);mostrarPrecio(\'' + i + '\',\o' + i + '.value\)" step="any" placeholder="Ingrese producto" class="form-control name_list data1" /></td><td><input type="text" name"nombre" id="nombre' + i + '"  disabled placeholder="Nombre Producto" step="any" class="form-control " /></td><td><input type="text" name="cantidad[]" id="cantidad' + i + '" onkeyup="limpiarNumero(this);" onChange="multiplicar(\'cantidad' + i + '\',\'precio' + i + '\',\'total' + i + '\');" placeholder="Cantidad" step="any" class="form-control name_list data2 " /></td><td><input type="text" id="precio' + i + '" name="precio[]" onChange="multiplicar(\'cantidad' + i + '\',\'precio' + i + '\',\'total' + i + '\');" placeholder="Precio" step="any" class="form-control name_list data3" /></td><td><input type="text" id="total' + i + '" name="total[]" disabled placeholder="Total" step="any" class="form-control name_list data4 input" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
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

  function agregarProducto() {

    //agrega();

      var sel = $('#pro_id').find(':selected').val(); //Capturo el Value del Producto
      var text = $('#pro_id').find(':selected').text(); //Capturo el Nombre del Producto- Texto dentro del Select

      var sptext = text.split();

      var newtr = '<tr class="item"  data-id="' + sel + '">';
      //newtr = newtr + '<td class="iProduct" >' + sel + '</td>';
      newtr = newtr + '<td> <input type="text" id="item" name="item" maxlength="50" required class="form-control" placeholder="Item" required /></td>';
      newtr = newtr + '<td><input type="text" id="producto" name="producto" maxlength="50" class="form-control" placeholder="Producto" required /></td>';
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

  function validar() {

    cantidad = $('input[name="producto[]"]').length;

    //alert(cantidad);

    id_cliente_fk = document.getElementById("id_cliente_fk").value;
    medio_pago = document.getElementById("medio_pago").value;
    moneda = document.getElementById("moneda").value;
    
    if (id_cliente_fk === "-1") {
      alert("Debe seleccionar un cliente");
      return false;
    } else if (medio_pago === "-1") {
      alert("Debe seleccionar un medio");
      return false;
    } else if (moneda === "-1") {
      alert("Debe seleccionar una moneda");
      return false;
    } else if (cantidad === 0) {
      alert("No hay ventas existentes");
      return false;
    }

    // LAS VENTAS


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
      alert("campo 'precio' vacío");
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
      alert("campo 'total' vacío");
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


  function showFunctionModal(id, id_cliente_fk, medio_pago, moneda, ticket_de_venta, subtotal, descuento, total_a_pagar, accion) {

    if (accion == 'Nuevo') {
      document.getElementById("estado").value = 1;

      document.getElementById("id_cliente_fk").value = '-1';

      document.getElementById("medio_pago").value = '-1';
      document.getElementById("moneda").value = '-1';

      document.getElementById("ticket_de_venta").value = '';
      document.getElementById("subtotal").value = '0';

      document.getElementById("descuento").value = '0';
      document.getElementById("descuentoJA").value = '0';

      document.getElementById("total_a_pagar").value = '0';


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
