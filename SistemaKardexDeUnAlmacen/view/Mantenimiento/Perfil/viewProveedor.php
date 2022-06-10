<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Proveedor</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Proveedor</li>
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
                         '','','','','','','','','','Nuevo' );">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Documento</th>
                  <th>N° Documento</th>
                  <th>Razon Social</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo ($r->documento==1?"DNI":"RUC"); ?></td>
                  <td><?php echo $r->numDocumento; ?></td>
                  <td><?php echo $r->razonSocial; ?></td>
                  <td><?php echo $r->direccion; ?></td>
                  <td><?php echo $r->telefono; ?></td>
                  <td><?php echo $r->estado == 1 ? 'Activo' : 'Desactivado'; ?></td>
                  <td>
                      <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $r->documento; ?>',
                         '<?php echo $r->numDocumento?>',
                         '<?php echo $r->razonSocial; ?>',
                         '<?php echo $r->direccion; ?>',
                         '<?php echo $r->referencia?>',
                         '<?php echo $r->telefono; ?>',
                         '<?php echo $r->tefAdicional; ?>',
                         '<?php echo $r->estado?>',
                         'Modificar' );">
                          <i class="fas fa-edit"></i>&nbsp &nbsp                 
                      </a>
                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Proveedor&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fas fa-trash-alt"></i></a>
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
                      <form class="form-horizontal" action="?c=Proveedor&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           <input type="hidden" id="estado" name="estado">
                       

                            <div class="row">
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label> ( <i class="fas fa-pencil-alt"></i>)  Razón Social</label>
                                    <input type="text" id="razonSocial" name="razonSocial" maxlength="50" required  class="form-control" placeholder="Razón Social">
                                  </div>
                                </div>
                                
                            </div> 
                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label> ( <i class="fas fa-pencil-alt"></i>)  Tipo Documento</label>
                                      <select class="form-control select2bs4" id="documento" name="documento" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">DNI</option>
                                        <option value="2">RUC</option>
                                      </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label> ( <i class="fas fa-pencil-alt"></i>)  N° Documento</label>
                                    <input type="text" id="numDocumento" name="numDocumento" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="8" required placeholder="Ingrese número de Documento">
                                  </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label> ( <i class="fas fa-pencil-alt"></i>)  Dirección</label>
                                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" maxlength="50" required>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Referencia</label>
                                    <input type="text" id="referencia" name="referencia" class="form-control" placeholder="Referencia" maxlength="50" >
                                  </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label> ( <i class="fas fa-pencil-alt"></i>)  Teléfono</label>
                                    <input type="text" id="telefono" name="telefono" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" pattern="[0-9]{9}" title="Son 9 Dígitos" required placeholder="Ingrese Teléfono">
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label>Teléfono Adicional</label>
                                    <input type="text" id="tefAdicioneal" name="tefAdicional" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" pattern="[0-9]{9}" title="Son 9 Dígitos"  placeholder="Ingrese Teléfono">
                                  </div>
                                </div>
                                
                            </div>
       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="return valida('documento','','','',1);">Save changes</button>
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

          

            function showFunctionModal(id,documento,numDocumento,razonSocial,direccion,referencia,telefono,tefAdicioneal,estado,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Proveedor";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    
                    document.getElementById("numDocumento").value=numDocumento;
                    document.getElementById("razonSocial").value=razonSocial;
                    document.getElementById("direccion").value=direccion;
                    document.getElementById("referencia").value=referencia;
                    document.getElementById("telefono").value=telefono;
                    document.getElementById("tefAdicioneal").value=tefAdicioneal;
                    document.getElementById("estado").value=estado;
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Proveedor";
                    
                    document.getElementById("documento").value=documento;
                    (documento=='1'?$("#select2-documento-container").text("DNI"):$("#select2-documento-container").text("RUC"));
             
                    
                    
                    
                }

                //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
            }

        </script>






