<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuario</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Usuario</li>
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
                <a href="" data-toggle="modal" data-target="#modal-default" onclick="javascript:showFunctionModal(
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
                  <th>Usuario</th>
                  <!--<th>Contraseña</th>-->
                  <th>Nombre</th>
                  <th>Perfil</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $r->user; ?></td>
                  
                  <td><?php echo $this->oTrabajador-> Obtener($r->id_Trabajador)->nombre?></td>
                  <td><?php echo $this->oPerfil-> Obtener($r->id_Perfil)->nombre?></td>     
                  <td><?php echo $r->estado == 1 ? 'Activo' : 'Desactivado'; ?></td>
                  
                  <td>
                      <a href="" data-toggle="modal" data-target="#modal-default" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $r->user; ?>',
                         '<?php echo $r->password; ?>',
                         '<?php echo $r->estado; ?>',
                         '<?php echo $r->id_Trabajador; ?>',
                         '<?php echo $this->oTrabajador-> Obtener($r->id_Trabajador)->nombre; ?>',
                         '<?php echo $r->id_Perfil; ?>',
                         '<?php echo $this->oPerfil-> Obtener($r->id_Perfil)->nombre; ?>',
                         'Modificar' );">
                          <i class="fas fa-edit"></i>&nbsp &nbsp                 
                      </a>
                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Usuario&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fas fa-trash-alt"></i></a>
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
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-default">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="tituloModal" align='center'>Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                      <form class="form-horizontal" action="?c=Usuario&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           <input type="hidden" id="estado" name="estado">
                             

                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label for="id_Trabajador"> ( <i class="fas fa-pencil-alt"></i>)  Seleccinar Trabajador</label>
                                      <select class="form-control select2bs4" id="id_Trabajador" name="id_Trabajador" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <?php foreach($this->oTrabajador->Listar() as $r): ?>
                                        <option value="<?php echo $r->id; ?>"><?php echo $r->nombre." ".$r->aPaterno. "/".$r->numDocumento ; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>
                                
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                  <div class="form-group">
                                      <label for="id_Perfil"> ( <i class="fas fa-pencil-alt"></i>)  Seleccionar Perfil</label>
                                      <select class="form-control select2bs4" id="id_Perfil" name="id_Perfil" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <?php foreach($this->oPerfil->Listar() as $r): ?>
                                        <option value="<?php echo $r->id; ?>"><?php echo $r->nombre; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                </div>
                                
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="user"> ( <i class="fas fa-pencil-alt"></i>)  Usuario</label>
                                    <input type="text" id="user" name="user" maxlength="50" required  class="form-control" placeholder="Ingresar Usuario">
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="password"> ( <i class="fas fa-pencil-alt"></i>)  Contraseña</label>
                                    <input type="password" id="password" name="password" maxlength="50" required  class="form-control" placeholder="Ingresar Contraseña">
                                  </div>
                                </div>
                                
                            </div>
                            
                          

       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="return valida('id_Trabajador','id_Perfil','','',2);">Save changes</button>
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


            function showFunctionModal(id,user,password,estado,id_Trabajador,nombreTrabajador,id_Perfil,nombrePerfil,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Usuario";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    
                    document.getElementById("user").value=user;
                    document.getElementById("password").value=password;
                    document.getElementById("estado").value=estado;
                    document.getElementById("id_Trabajador").value=id_Trabajador;
                    $("#select2-id_Trabajador-container").text(nombreTrabajador); 
                    
                    document.getElementById("id_Perfil").value=id_Perfil;
                    $("#select2-id_Perfil-container").text(nombrePerfil);
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Usuario";
                    
                   
                    
                }

                //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
            }

        </script>



