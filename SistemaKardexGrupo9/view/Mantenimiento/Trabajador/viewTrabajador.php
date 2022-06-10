<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trabajador</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Trabajador</li>
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
                         '','','','','','','','','','','','','','','','','','Nuevo' );">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm table-responsive-sm">
                <thead>
                <tr>
                  <th>N°</th>
                  <th>Documento</th>
                  <th>N° Doc</th>
                  <th>Nombre</th>
                  <th>Sexo</th>
                  <th>Teléfono</th>
                 <!-- <th>F. Nacimineto</th>-->
                  <th>F. Ingreso</th>
                  <th>F. Salida</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr>
                  <td><?php echo $r->id; ?></td>
                  <td><?php echo ($r->tipoDocumento==1?"DNI":"RUC"); ?></td>
                  <td><?php echo $r->numDocumento; ?></td>
                  <td><?php echo $r->nombre; ?></td>
                  <td><?php echo $r->sexo == 1 ? 'M' : 'F'; ?></td>
                  <td><?php echo $r->telefono; ?></td>
                  <!--<td><?php echo $r->fNacimiento; ?></td>-->
                  <td><?php echo $r->fIngreso; ?></td>
                  <td><?php echo $r->fSalida; ?></td>
                  <td><?php echo $r->estado == 1 ? 'Activo' : 'Desactivado'; ?></td>
                  
                  <td>
                     
                      <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $r->tipoDocumento; ?>',
                         '<?php echo $r->numDocumento;?>',
                         '<?php echo $r->nombre; ?>',
                         '<?php echo $r->aPaterno; ?>',
                         '<?php echo $r->aMaterno?>',
                         '<?php echo $r->sexo; ?>',
                         '<?php echo $r->direccion; ?>',
                         '<?php echo $r->referencia;?>',
                         '<?php echo $r->telefono; ?>',
                         '<?php echo $r->tefAdicional; ?>',
                         '<?php echo $r->tipoSalario; ?>',
                         '<?php echo $r->salario; ?>',
                         '<?php echo $r->fNacimiento; ?>',
                         '<?php echo $r->fIngreso; ?>',
                         '<?php echo $r->fSalida;?>',
                         '<?php echo $r->estado; ?>',
                         'Modificar' );">
                          <i class="fas fa-edit"></i>&nbsp &nbsp                 
                      </a>
                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Trabajador&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fas fa-trash-alt"></i></a>
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
                      <form class="form-horizontal" action="?c=Trabajador&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           <input type="hidden" id="estado" name="estado">
                       
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="nombre"> ( <i class="fas fa-pencil-alt"></i>)  Nombre</label>
                                    <input type="text" id="nombre" name="nombre" maxlength="50" required  class="form-control" placeholder="Ingresar nombre">
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="aPaterno"> ( <i class="fas fa-pencil-alt"></i>)  Apellido Paterno</label>
                                    <input type="text" id="aPaterno" name="aPaterno" maxlength="50" required  class="form-control" placeholder="Ingresar Apellido Paterno">
                                  </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="aMaterno"> ( <i class="fas fa-pencil-alt"></i>)  Apellido Materno</label>
                                    <input type="text" id="aMaterno" name="aMaterno" maxlength="50" required  class="form-control" placeholder="Ingresar Apellido Materno">
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="sexo">Sexo</label>
                                      <select class="form-control select2bs4" id="sexo" name="sexo" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">Masculino</option>
                                        <option value="0">Femenino</option>
                                      </select>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                               <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="tipoDocumento"> ( <i class="fas fa-pencil-alt"></i>)  Tipo Documento</label>
                                      <select class="form-control select2bs4" id="tipoDocumento" name="tipoDocumento" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">DNI</option>
                                        <option value="2">RUC</option>
                                      </select>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="numDocumento"> ( <i class="fas fa-pencil-alt"></i>)  Número Documento</label>
                                    <input type="text" id="numDocumento" name="numDocumento" maxlength="8" required  class="form-control" placeholder="Ingresar Número de Documento" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)">
                                  </div>
                                </div>

                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="direccion"> ( <i class="fas fa-pencil-alt"></i>)  Dirección</label>
                                    <input type="text" id="direccion" name="direccion" maxlength="50" required  class="form-control" placeholder="Ingresar Dirección">
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="referencia">Referencia</label>
                                    <input type="text" id="referencia" name="referencia" maxlength="50"   class="form-control" placeholder="Ingresar Referencia">
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
                                    <input type="text" id="tefAdicional" name="tefAdicional" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" pattern="[0-9]{9}" title="Son 9 Dígitos"  placeholder="Ingrese Teléfono Adicional">
                                  </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="row">
                               <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="tipoSalario"> ( <i class="fas fa-pencil-alt"></i>)  Tipo Salario</label>
                                      <select class="form-control select2bs4" id="tipoSalario" name="tipoSalario" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">Día</option>
                                        <option value="2">Semana</option>
                                        <option value="3">Quincenal</option>
                                        <option value="4">Mes</option>
                                      </select>
                                    </div>
                                </div>
                               
                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="salario"> ( <i class="fas fa-pencil-alt"></i>)  Salario</label>
                                    <input type="text" id="salario" name="salario" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" required placeholder="Ingrese Salario">
                                  </div>
                                </div>

                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="fNacimiento"> ( <i class="fas fa-pencil-alt"></i>)  Fecha de Nacimiento:</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="fNacimiento" name="fNacimiento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                    
                                        
                                      </div>
                                      <!-- /.input group -->
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="fIngreso"> ( <i class="fas fa-pencil-alt"></i>)  Fecha de Ingreso:</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="fIngreso" name="fIngreso" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask required>
                    
                                        
                                      </div>
                                      <!-- /.input group -->
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label for="fSalida">Fecha de Salida:</label>
                                      <div class="input-group">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" id="fSalida" name="fSalida" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                    
                                        
                                      </div>
                                      <!-- /.input group -->
                                    </div>
                                </div>
                                
                            </div>

       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="return valida('tipoDocumento','sexo','tipoSalario','',3);">Save changes</button>
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


            function showFunctionModal(id,tipoDocumento,numDocumento,nombre,aPaterno,aMaterno,sexo,direccion,referencia,telefono,tefAdicional,tipoSalario,salario,fNacimiento,fIngreso,fSalida,estado,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Trabajador";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;

                    document.getElementById("tipoDocumento").value=tipoDocumento;
                    (tipoDocumento=='1'?$("#select2-tipoDocumento-container").text("DNI"):$("#select2-tipoDocumento-container").text("RUC"));
                    document.getElementById("numDocumento").value=numDocumento;
                    document.getElementById("nombre").value=nombre;
                    document.getElementById("aPaterno").value=aPaterno;
                    document.getElementById("aMaterno").value=aMaterno;
                    document.getElementById("sexo").value=sexo;
                    (sexo=='1'?$("#select2-sexo-container").text("Masculino"):$("#select2-sexo-container").text("Femenino"));
                    document.getElementById("direccion").value=direccion;
                    document.getElementById("referencia").value=referencia;
                    document.getElementById("telefono").value=telefono;
                    document.getElementById("tefAdicional").value=tefAdicional;               
                    document.getElementById("tipoSalario").value=tipoSalario;
                    if(tipoSalario=='1'){
                       $("#select2-tipoSalario-container").text("Día")
                    }else if(tipoSalario=='2'){
                       $("#select2-tipoSalario-container").text("Semana")   
                    }else if(tipoSalario=='3'){
                       $("#select2-tipoSalario-container").text("Quincenal")   
                    }else if(tipoSalario=='4'){
                       $("#select2-tipoSalario-container").text("Mes")   
                    }
                    document.getElementById("salario").value=salario;
                    document.getElementById("fNacimiento").value=fNacimiento;
                    document.getElementById("fIngreso").value=fIngreso;
                    document.getElementById("fSalida").value=fSalida;
                    document.getElementById("estado").value=estado;
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Trabajador";
                    
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



