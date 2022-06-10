<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Créditos Clientes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Créditos Clientes</li>
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
                         '','','','','','','','','Nuevo' );">
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
                  <th>Tipo Cliente</th>
                  <th>N° Documento</th>
                  <th>Cliente</th>
                  <th>Total Venta</th>
                  <th>Saldo</th>
                  <th>Amortizado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr>  
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $this->oCliente-> Obtener($r->id_Cliente)->tipoPersona?></td>
                  <td><?php echo $this->oCliente-> Obtener($r->id_Cliente)->numDocumento?></td>
                  <td><?php echo $this->oCliente-> Obtener($r->id_Cliente)->nombre?></td>
                  <td><?php echo $r->total_venta; ?></td>
                  <td><?php echo $r->saldo; ?></td>
                  <td><?php echo $r->amortizado; ?></td>
                  
                  
                  
                  <td>
                     
                      <a class="pagoCredito" href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $this->oCliente-> Obtener($r->id_Cliente)->numDocumento; ?>',
                         '<?php echo $this->oCliente-> Obtener($r->id_Cliente)->nombre;?>',
                         '<?php echo $this->oCliente-> Obtener($r->id_Cliente)->aPaterno; ?>',
                         '<?php echo $this->oCliente-> Obtener($r->id_Cliente)->aMaterno; ?>',
                         '<?php echo $this->oCliente-> Obtener($r->id_Cliente)->razonSocial; ?>',
                         '<?php echo $r->total_venta; ?>',
                         '<?php echo $r->amortizado?>',
                         '<?php echo $r->saldo; ?>',
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
              <h4 class="modal-title" id="tituloModal" align='center'>Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                      <form class="form-horizontal" action="?c=Detalle_pago_credito_c&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           
                       

                            <div class="row">
                               <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="numDocumento">   Número Documento</label>
                                    <input type="text" id="numDocumento" name="numDocumento" maxlength="50" required  class="form-control" placeholder="Ingresar Número de Documento" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" readonly>
                                  </div>
                                </div>
                               
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="nombre">  Nombre</label>
                                    <input type="text" id="nombre" name="nombre" maxlength="50" required  class="form-control" placeholder="Ingresar nombre" readonly>
                                  </div>
                                </div>
                                
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="apellidos">  Apellidos</label>
                                    <input type="text" id="apellidos" name="apellidos" maxlength="50" required  class="form-control" placeholder="Ingresar Apellidos" readonly>
                                  </div>
                                </div>
                                
                            </div> 
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="razonSocial">Razón Social</label>
                                    <input type="text" id="razonSocial" name="razonSocial" maxlength="50"  class="form-control" placeholder="Ingresar Referencia" readonly>
                                  </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="total_venta">   Total Venta</label>
                                    <input type="text" id="total_venta" name="total_venta" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" required placeholder="Ingrese Salario" readonly>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="amortizado">   Amortizado</label>
                                    <input type="text" id="amortizado" name="amortizado" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" required placeholder="Ingrese Salario" readonly>
                                  </div>
                                </div>
                                <div class="col-sm-4">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="deuda">   Deuda</label>
                                    <input type="text" id="deuda" name="deuda" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" required placeholder="Ingrese Salario" readonly>
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
                            
                            <input type="hidden" id="id_DetallePagoCredito" name="id_DetallePagoCredito">
                            <div class="row">

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group row">
                                    <label class="col-sm-5" for="ticket">Ticket de Pago</label>
                                    <input type="text" id="ticket" name="ticket" class="form-control col-sm-4" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="10" required placeholder="total Descuento" value="<?php echo $this->oDetalle_pago_credito_c->GenerarCorrelativo() ?>" readonly>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group row">
                                    <label class="col-sm-5" for="total">Total a Pagar</label>
                                    <input type="text" id="total" name="total" class="form-control col-sm-4" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="10" required placeholder="total Descuento"  >
                                  </div>
                                </div>
                                
                            </div>
                            
                                            
       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonfooterModal">Save changes</button>
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


            function showFunctionModal(id,numDocumento,nombre,aPaterno,aMaterno,razonSocial,total_venta,amortizado,saldo,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Pagar Crédito";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    
                    document.getElementById("numDocumento").value=numDocumento;
                    document.getElementById("nombre").value=nombre;
                    document.getElementById("apellidos").value=aPaterno+" "+aMaterno;
                    document.getElementById("razonSocial").value=razonSocial;
                    document.getElementById("total_venta").value=total_venta;
                    document.getElementById("amortizado").value=amortizado;
                     document.getElementById("deuda").value=saldo;
                    
                    document.getElementById("botonfooterModal").innerHTML="Pagar";
                    document.getElementById("tituloModal").innerHTML="Pagar Crédito";  
                    
                }

            }

        </script>
        
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!--TRAER ELEMENTOS AJAX (Pagos de trabajadores)-->
<script   src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
<script>
    
    var jQuery_2_2_4 = $.noConflict(true);   
    $(document).ready(function(e){
        
        $(".pagoCredito").click(function() {    
            mostrarDescuentos($("#id").val());

        });

        
        function mostrarDescuentos(id){
                var parametros ={
                    "id":id,
                };

                jQuery_2_2_4.ajax({
                    data:parametros,
                    url: 'ajax/pagoCreditoCliente.php',
                    type:'POST',
                    beforesend:function(){
                        $("#mostrar").html("");
                    },
                    success:function(response){
                        $("#mostrar").html(response);
                    }
                });

            }
       
  });
              
</script>
        
        
        
        
        



