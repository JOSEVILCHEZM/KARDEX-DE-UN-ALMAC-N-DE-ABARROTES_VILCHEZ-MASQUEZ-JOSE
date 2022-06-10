<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Producto</li>
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
                  <th>ID°</th>
                  <th>Img</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>Unidad</th>
                  <th>Precio</th>
                  <th>Moneda</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; foreach($this->model->Listar() as $r): ?>
                <tr>
                  <td><?php echo $r->id; ?></td> 
                  <td><?php echo "<img src='imagenes/fotoProductos/".$r->imagen."' style='width: 70px;height: 70px;'>"; ?></td>
                  <td><?php echo $r->nombre; ?></td>
                  <td><?php echo $r->descripcion; ?></td>
                  <td><?php echo $r->cantidad; ?></td>
                  <td><?php echo ($r->unidad==1?"g.":"Kg."); ?></td>
                  <td><?php echo $r->precioUnitario; ?></td>
                  <td><?php echo ($r->moneda==1?"Soles":"Dolares"); ?></td>
                  <td><?php echo $r->estado == 1 ? 'Activo' : 'Desactivado'; ?></td>
                  <td>
                      <a href="" data-toggle="modal" data-target="#modal-lg" onclick="javascript:showFunctionModal(
                         '<?php echo $r->id; ?>',
                         '<?php echo $r->imagen; ?>',
                         '<?php echo $r->nombre?>',
                         '<?php echo $r->descripcion; ?>',
                         '<?php echo $r->cantidad; ?>',
                         '<?php echo $r->unidad?>',
                         '<?php echo $r->precioUnitario; ?>',
                         '<?php echo $r->moneda; ?>',
                         '<?php echo $r->estado?>',
                         'Modificar' );">
                          <i class="fas fa-edit"></i>&nbsp &nbsp                 
                      </a>
                      <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Producto&a=Eliminar&id=<?php echo $r->id; ?>"><i class="fas fa-trash-alt"></i></a>
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
                      <form class="form-horizontal" action="?c=Producto&a=Guardar" method="post" enctype="multipart/form-data">
                       
                           <input type="hidden" id="id" name="id">
                           <input type="hidden" id="estado" name="estado">
                       

                            <div class="row">
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="nombre"> ( <i class="fas fa-pencil-alt"></i>)  Nombre</label>
                                    <input type="text" id="nombre" name="nombre" maxlength="50" required  class="form-control" placeholder="Ingresar nombre">
                                  </div>
                                </div>
                                
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="descripcion">Descripción</label>
                                    <input type="text" id="descripcion" name="descripcion" maxlength="100"   class="form-control" placeholder="Ingresar Descripción">
                                  </div>
                                </div>
                                
                            </div> 
                            
                            <div class="row">
                                <div class="col-sm-12">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="imagen">Seleccionar Imagen</label>
                                    <input type="file" id="imagen" name="imagen" maxlength="100"   class="form-control" placeholder="Ingresar imagen" onChange="validarImg(imagen.files);">
                                  </div>
                                </div>
                                
                            </div> 
                            
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label>  ( <i class="fas fa-pencil-alt"></i>)  Unidad</label>
                                      <select class="form-control select2bs4" id="unidad" name="unidad" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">g.</option>
                                        <option value="2">Kg.</option>
                                      </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="cantidad"> ( <i class="fas fa-pencil-alt"></i>)  Cantidad</label>
                                    <input type="text" id="cantidad" name="cantidad" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="15" required placeholder="Ingrese cantidad">
                                  </div>
                                </div>
                                
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-sm-6">
                                  <div class="form-group">
                                      <label> ( <i class="fas fa-pencil-alt"></i>)  Moneda</label>
                                      <select class="form-control select2bs4" id="moneda" name="moneda" style="width: 100%;">
                                        <option value="-1">Seleccionar</option>
                                        <option value="1">Soles</option>
                                        <option value="2">Dolares</option>
                                      </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                  <!-- text input -->
                                  <div class="form-group">
                                    <label for="precioUnitario"> ( <i class="fas fa-pencil-alt"></i>)  Precio Unitario</label>
                                    <input type="text" id="precioUnitario" name="precioUnitario" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="15" required placeholder="Ingrese Precio Unitario">
                                  </div>
                                </div>
                                
                            </div>
                            
       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary" id="botonfooterModal" onclick="return valida('unidad','moneda','','',2);">Save changes</button>
            </div>
            
            
            </form>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      
      
      <!--Para Validar con AJAX-->
      <div id="prueba">
          
      </div>
      
      
      
      <script>
          
          function limpiarNumero(obj) {
                /* El evento "change" sólo saltará si son diferentes */
                obj.value = obj.value.replace(/\D/g, '');
            }


            function showFunctionModal(id,imagen,nombre,descripcion,cantidad,unidad,precioUnitario,moneda,estado,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Producto";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    
                    /*document.getElementById("imagen").value=imagen;*/
                    document.getElementById("nombre").value=nombre;
                    document.getElementById("descripcion").value=descripcion;
                    document.getElementById("cantidad").value=cantidad;
                    document.getElementById("unidad").value=unidad;
                    (unidad=='1'?$("#select2-unidad-container").text("g."):$("#select2-unidad-container").text("Kg."));
                    document.getElementById("precioUnitario").value=precioUnitario;
                    document.getElementById("moneda").value=moneda;
                    (moneda=='1'?$("#select2-moneda-container").text("Soles"):$("#select2-moneda-container").text("Dolares"));
                    document.getElementById("estado").value=estado;
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Producto";
                    
                    
                }

                //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
            }

        </script>



<script>
 
    
    /*Para Validar que el file sea en formato imagen */
    function validarImg(){    
        if(imagen.files[0].type=="image/jpeg" || imagen.files[0].type=="image/jpg"|| imagen.files[0].type=="image/png"){
           
            if(imagen.files[0].size<900000){
               alert("Imagen Aceptada-");
            }else{
                alert("El tamaño es muy grande");
                imagen.value="";
            }
        }else{
            alert("Tiene que ser un Formato de Imagen");
            imagen.value="";
        }
        
    }
    
              
</script>


