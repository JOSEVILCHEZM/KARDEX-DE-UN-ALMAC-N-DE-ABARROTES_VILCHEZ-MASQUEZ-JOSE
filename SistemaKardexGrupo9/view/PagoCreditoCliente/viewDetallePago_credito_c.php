<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detalle Pago Crédito Cliente</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="?c=Inicio&a=Index">Inicio</a></li>
              <li class="breadcrumb-item ">Mantenimiento</li>
              <li class="breadcrumb-item active">Detalle Pago Crédito</li>
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
                <!--<a href="" data-toggle="modal" data-target="#modal-default" onclick="javascript:showFunctionModal(
                         '','','','Nuevo' );">
                    <button type="button" class="btn btn-primary">Nuevo</button>
                </a>-->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped table-responsive-sm">
                <thead>
                <tr>
                  <th>ID°</th>
                  <th>Fecha</th>
                  <th>Ticket</th>
                  <th>Total</th>
                  <th>Cliente</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($this->model->Listar() as $r): ?>
                <tr>
                  <td><?php echo $r->id; ?></td>
                  <td><?php echo $r->fecha; ?></td>
                  <td><?php echo $r->ticket; ?></td>
                  <td><?php echo $r->total; ?></td>
                  <td><?php echo $this->oCliente->Obtener($this->PagoCC->Obtener($r->id_PagoCredito)->id_Cliente)->nombre;; ?></td>
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
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="tituloModal" align='center'>Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                      <form class="form-horizontal" action="?c=Perfil&a=Guardar" method="post" enctype="multipart/form-data">
                       
                       <input type="hidden" id="id" name="id">
                       <input type="hidden" id="estado" name="estado">
                       
                        <div class="card-body">
                          <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label"> ( <i class="fas fa-pencil-alt"></i>) Nombre</label>
                            <div class="col-sm-9">
                              <input type="text" id="nombre" name="nombre" class="form-control" id="inputEmail3" required placeholder="Ingresar Nombre">
                            </div>
                          </div>

                          <!--<div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <div class="form-check">
                                <input  type="checkbox" class="form-check-input" id="exampleCheck2">
                                <label  class="form-check-label" for="exampleCheck2">Estado</label>
                              </div>
                            </div>
                          </div>-->
                        </div>
                        <!-- /.card-body -->
                        <!--<div class="card-footer">
                          <button type="submit" class="btn btn-info">Sign in</button>
                          <button type="submit" class="btn btn-default float-right">Cancel</button>
                        </div>-->
                        <!-- /.card-footer -->
                      
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

          

            function showFunctionModal(id,nombre,estado,accion) {
                
                if(accion=='Nuevo'){
                    document.getElementById("estado").value=1;
                    document.getElementById("nombre").value="";
                    
                    document.getElementById("botonfooterModal").innerHTML="Registrar";
                    document.getElementById("tituloModal").innerHTML="Nuevo Perfil";
                } else if(accion=="Modificar"){
                    document.getElementById("id").value=id;
                    document.getElementById("nombre").value=nombre;
                    document.getElementById("estado").value=estado;
                    
                    document.getElementById("botonfooterModal").innerHTML="Modificar";
                    document.getElementById("tituloModal").innerHTML="Modificar Perfil";
                }

                //document.getElementById("botonCargo").innerText=cambia='I'?"Agregar":"Modificar";
            }
          

        </script>



