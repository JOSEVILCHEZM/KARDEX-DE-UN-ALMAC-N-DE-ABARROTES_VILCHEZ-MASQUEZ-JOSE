<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pagos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Pago</li>
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
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Ticket</th>
                  <th>Fecha</th>
                  <th>Nombre</th>
                  <th>T. Salario</th>
                  <th>T. Descuento</th>
                  <th>Total</th>
                  <th>Estado</th>
                  <!--<th>Acciones</th>-->
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr>  
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $r->ticket; ?></td>
                  <td><?php echo $r->fecha; ?></td>
                  <td><?php echo $this->oTrabajador-> Obtener($r->id_Trabajador)->nombre?></td>
                  <td><?php echo $r->subtotal; ?></td>
                  <td><?php echo $r->totalDescuento; ?></td>
                  <td><?php echo $r->total; ?></td>
                  <td><?php echo $r->estado == 1 ? 'Activo' : 'Aplicado'; ?></td>
                 
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
                      <form class="form-horizontal" action="?c=Pago&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           <input type="hidden" id="estado" name="estado">
                           
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group puto" >
                                      <label for="id_Trabajador_Descuento">Seleccinar Trabajador</label>
                                      <select class="form-control select2bs4" id="id_Trabajador_Descuento" name="id_Trabajador_Descuento" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <?php foreach($this->oTrabajador->ListaTrabajadoresSinPagar() as $r): ?>
                                        <option value="<?php echo $r->id; ?>"><?php echo $r->nombre." ".$r->aPaterno. "/".$r->numDocumento ; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>
                                
                            </div> 

                            <div class="row">
                               <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="ticket">Ticket</label>
                                    <input type="text" id="ticket" name="ticket" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="10" required placeholder="Ingrese Ticket" value="<?php echo $this->model->GenerarCorrelativo()?>" readonly>
                                  </div>
                                </div>
                               
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="salario">Salario</label>
                                    <input type="text" id="salario" name="salario" maxlength="200" required  class="form-control" placeholder="ingresar salario" value="0" readonly>
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
                                      <th>Motivo</th>
                                      <th>Monto</th>
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

                                <div class="col-sm-5 offset-md-7">
                                  <!-- text input -->
                                  <div class="form-group row">
                                    <label class="col-sm-6" for="totalDescuento">Total Descuento</label>
                                    <input type="text" id="totalDescuento" name="totalDescuento" class="form-control col-sm-5" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="10" required placeholder="total Descuento" value="0" readonly >
                                  </div>
                                </div>
                                
                            </div>
                            <div class="row">

                                <div class="col-sm-5 offset-md-7">
                                  <!-- text input -->
                                  <div class="form-group row">
                                    <label class="col-sm-6" for="total">Total</label>
                                    <input type="text" id="total" name="total" class="form-control col-sm-5" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="10" required placeholder="Total" value="0" readonly>
                                  </div>
                                </div>
                                
                            </div>
    
                            
                            
                            

                            
       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="return valida('id_Trabajador_Descuento','','','',1);">Save changes</button>
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

          

            function showFunctionModal(id,fecha,ticket,subtotal,totalDescuento,total,estado,id_Trabajador,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Pago";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    
                    document.getElementById("motivo").value=motivo;
                    document.getElementById("monto").value=monto;
                    document.getElementById("estado").value=estado;
                    document.getElementById("id_Trabajador").value=id_Trabajador;
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Pago";  
                    
                }

                //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
            }

        </script>
        


        
        
        
        
        
        



