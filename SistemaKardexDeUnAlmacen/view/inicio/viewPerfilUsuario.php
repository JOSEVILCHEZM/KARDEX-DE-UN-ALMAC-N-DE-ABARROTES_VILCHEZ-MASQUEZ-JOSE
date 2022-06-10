<?php 
      require_once 'model/perfil.php';
      $User= unserialize($_SESSION['user']);   
      $User= (new Trabajador())->Obtener($User->id);
      $Usuario=unserialize($_SESSION['usuario']);
      $nomPerfil= (new Perfil())->Obtener($Usuario->id_Perfil) ;   
?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>"Eres genial"</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item active">Usuario Perfil</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="imagenes/perfilesUsuarios/<?php echo $User->foto; ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?php echo $User->nombre. " " .$User->aPaterno." ".$User->aMaterno?></h3>

                <p class="text-muted text-center"><?php echo $nomPerfil->nombre ?> </p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b><?php echo ($User->tipoDocumento==1?"DNI":"RUC")?></b> <a class="float-right"><?php echo $User->numDocumento?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Sexo</b> <a class="float-right"><?php echo ($User->sexo==0)?"Femenina" : "Masculino"?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Nacimiento</b> <a class="float-right"><?php echo  $User->fNacimiento ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Teléfono</b> <a class="float-right"><?php echo  $User->telefono ?></a>
                  </li>
                </ul>

               <!-- <a href="#" class="btn btn-primary btn-block"><b>Seguir</b></a>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Actividad</a></li>
                  <!--<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>-->
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Configuración</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div align="center">
                       <form class="form-horizontal" action="?c=Trabajador&a=GuardarImg" method="post" enctype="multipart/form-data">
                            <div class="card-body"> <!--card-body-2-->

                               <input type="hidden" value="<?php echo $User->id;?>" name="id_trabajdorModi">
                                <div class="cambiarimg">
                                    <label for="file"><img src="imagenes/iconos/camara.png"/></label>
                                    <input id="file" class="form-control" type="file"  name="file"  onchange="mostrarIMG(this);validarImg(file.files);"/>
                                </div>
                                <p class="demo">
                                <div class="avatar avatar-xxl" style="width: 20rem; height: 20rem">
                                    <img id="fondoPerfil" name="fondoPerfil" src="imagenes/perfilesUsuarios/<?php echo $User->foto;?>" alt="..." class="avatar-img rounded-circle">
                                </div>
                                </p>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-1 col-sm-10">
                                  <button type="submit" class="btn btn-danger">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="?c=Trabajador&a=Guardar" method="post" enctype="multipart/form-data">
                     
                     <input type="hidden" id="extra" name="extra" value="extra"> <!--Para utilizar el trabajador controller y devoverlo aqui-->
                     <input type="hidden" id="id" name="id" value="<?php echo  $User->id ?>">
                     <input type="hidden" id="estado" name="estado" value="<?php echo  $User->estado ?>">
                     <input type="hidden" id="tipoSalario" name="tipoSalario" value="<?php echo  $User->tipoSalario ?>">
                     <input type="hidden" id="salario" name="salario" value= "<?php echo  $User->salario  ?>">
                     <input type="hidden" id="fSalida" name="fSalida" value="<?php echo  $User->fSalida  ?>">
                     <input type="hidden" id="fIngreso" name="fIngreso" value="<?php echo  $User->fIngreso  ?>">
                     
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" id="nombre" name="nombre" maxlength="50" required  class="form-control" placeholder="Ingresar nombre" value="<?php echo  $User->nombre ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="aPaterno" class="col-sm-2 col-form-label">A.Paterno</label>
                        <div class="col-sm-10">
                          <input type="text" id="aPaterno" name="aPaterno" maxlength="50" required  class="form-control" placeholder="Ingresar Apellido Paterno" value="<?php echo  $User->aPaterno ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="aMaterno" class="col-sm-2 col-form-label">A.Materno</label>
                        <div class="col-sm-10">
                          <input type="text" id="aMaterno" name="aMaterno" maxlength="50" required  class="form-control" placeholder="Ingresar Apellido Materno" value="<?php echo  $User->aMaterno ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="sexo" class="col-sm-2 col-form-label">Sexo</label>
                        <div class="col-sm-10">
                          <select class="form-control select2bs4" id="sexo" name="sexo" style="width: 100%;">
                            <option>Seleccionar</option>
                            <option value="1" <?php echo  ($User->sexo==1?"selected":"") ; ?>>Masculino</option>
                            <option value="0" <?php echo  ($User->sexo==0?"selected":"") ; ?>>Femenino</option>
                          </select>  
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tipoDocumento" class="col-sm-2 col-form-label">T.Documento</label>
                        <div class="col-sm-10">
                          <select class="form-control select2bs4" id="tipoDocumento" name="tipoDocumento" style="width: 100%;" value="<?php echo  $User->tipoDocumento?>">
                            <option>Seleccionar</option>
                            <option value="1"  <?php echo  ($User->tipoDocumento==1?"selected":"") ; ?> >DNI </option>
                            <option value="2" <?php echo  ($User->tipoDocumento==2?"selected":"")  ?> >RUC</option>
                          </select> 
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">N.Documento</label>
                        <div class="col-sm-10">
                          <input type="text" id="numDocumento" name="numDocumento" maxlength="50" required  class="form-control" placeholder="Ingresar Número de Documento" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" value="<?php echo  $User->numDocumento ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="direccion" class="col-sm-2 col-form-label">Dirección</label>
                        <div class="col-sm-10">
                          <input type="text" id="direccion" name="direccion" maxlength="50" required  class="form-control" placeholder="Ingresar Dirección" value="<?php echo  $User->direccion ?>" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="referencia" class="col-sm-2 col-form-label">Referencia</label>
                        <div class="col-sm-10">
                          <input type="text" id="referencia" name="referencia" maxlength="50"   class="form-control" placeholder="Ingresar Referencia" value="<?php echo  $User->referencia ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                        <div class="col-sm-10">
                          <input type="text" id="telefono" name="telefono" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" pattern="[0-9]{9}" title="Son 9 Dígitos" required placeholder="Ingrese Teléfono" value="<?php echo  $User->telefono ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tefAdicional" class="col-sm-2 col-form-label">T.Adicional</label>
                        <div class="col-sm-10">
                          <input type="text" id="tefAdicional" name="tefAdicional" class="form-control" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)"
maxlength="9" pattern="[0-9]{9}" title="Son 9 Dígitos" required placeholder="Ingrese Teléfono Adicional" value="<?php echo  $User->tefAdicional ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="fNacimiento" class="col-sm-2 col-form-label">F.Nacimiento</label>
                        <div class="col-sm-10">
                            <input type="text" id="fNacimiento" name="fNacimiento" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask value="<?php echo  $User->fNacimiento ?>">
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Actualizar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
 

<script>

    function limpiarNumero(obj) {
        /* El evento "change" sólo saltará si son diferentes */
        obj.value = obj.value.replace(/\D/g, '');
    }
</script>

<script>
        /*Mostrar la imagen en a la hora seleccionada*/
        function mostrarIMG(e){
            if(e.files && e.files[0]){
                // Comprobamos que sea un formato de imagen
                if (e.files[0].type.match('image.*')) {

                    var reader=new FileReader();

                    reader.onload=function(e) {
                        document.getElementById("fondoPerfil").src =e.target.result;
                    }

                    // indicamos que lea la imagen seleccionado por el usuario de su disco duro
                    reader.readAsDataURL(e.files[0]);
                }
            }
        }
    
    
        /*Para Validar que el file sea en formato imagen */
        function validarImg(){    
            if(file.files[0].type=="image/jpeg" || file.files[0].type=="image/jpg"|| file.files[0].type=="image/png"){

                if(file.files[0].size<900000){
                   /*alert("Imagen Aceptada-");*/
                }else{
                    alert("El tamaño es muy grande");
                    file.value="";
                }
            }else{
                alert("Tiene que ser un Formato de Imagen");
                file.value="";
            }

        }
    </script>


