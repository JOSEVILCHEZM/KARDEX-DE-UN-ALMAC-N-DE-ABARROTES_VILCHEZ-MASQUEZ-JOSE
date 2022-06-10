<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Descuentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Descuento</li>
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
                         '','','','','','','Nuevo' );">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered  table-responsive-sm">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Fecha</th>
                  <th>Nombre</th>
                  <th>Motivo</th>
                  <th>Monto</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr class="<?php echo $r->estado == 1 ? '' : 'table-active'; ?>">
                  <td><?php echo $r->id; ?></td>
                  <td><?php echo $r->fecha; ?></td>
                  <td><?php echo $this->oTrabajador-> Obtener($r->id_Trabajador)->nombre?></td>
                  <td><?php echo $r->motivo; ?></td>
                  <td><?php echo $r->monto; ?></td>
                  <td><?php echo $r->estado == 1 ? 'Activo' : 'Aplicado'; ?></td>
                  <td class="<?php echo $r->estado == 1 ? '' : 'SinFuncionar'; ?>"> 
                      <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $r->fecha; ?>',
                         '<?php echo $r->motivo?>',
                         '<?php echo $r->monto; ?>',
                         '<?php echo $r->estado; ?>',
                         '<?php echo $r->id_Trabajador?>',
                         'Modificar' );">
                          <i class="fas fa-edit"></i>&nbsp &nbsp                 
                      </a>
                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Descuento&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fas fa-trash-alt"></i></a>
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
                      <form class="form-horizontal" action="?c=Descuento&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           <input type="hidden" id="estado" name="estado">
                       
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label for="id_Trabajador"> ( <i class="fas fa-pencil-alt"></i>)  Seleccinar Trabajador</label>
                                      <select class="form-control select2bs4" id="id_Trabajador" name="id_Trabajador" style="width: 100%;">
                                        <option>Seleccionar</option>
                                        <?php foreach($this->oTrabajador->Listar() as $r): ?>
                                        <option value="<?php echo $r->id; ?>"><?php echo $r->nombre." ".$r->aPaterno. "/".$r->numDocumento ; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>
                                
                            </div> 

                            <div class="row">
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="motivo"> ( <i class="fas fa-pencil-alt"></i>)  Motivo</label>
                                    <input type="text" id="motivo" name="motivo" maxlength="200" required  class="form-control" placeholder="ingresar Motivo">
                                  </div>
                                </div>
                                
                            </div> 
                            <div class="row">

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="monto"> ( <i class="fas fa-pencil-alt"></i>)  Monto</label>
                                    <input type="text" id="monto" name="monto" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="10" required placeholder="Ingrese monto de Descuento">
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

          

            function showFunctionModal(id,fecha,motivo,monto,estado,id_Trabajador,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Descuento";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    
                    document.getElementById("motivo").value=motivo;
                    document.getElementById("monto").value=monto;
                    document.getElementById("estado").value=estado;
                    document.getElementById("id_Trabajador").value=id_Trabajador;
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Descuento";  
                    
                }

                //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
            }

        </script>



