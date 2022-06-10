<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SoftwareVentas</title>
  
  <link rel="icon" type="image/png" href="imagenes/iconos/favicon.ico"/>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
  



  <!-- ESTILOS GENERALES -->
  <link rel="stylesheet" href="dist/css/cssGenerales.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>

    <!-- SEARCH FORM -->
    <!--<form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>-->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->  
          
     
      
      <!-- Notifications Dropdown Menu -->
      <!--<li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          
          Modificado
          <a href="?c=Login&a=Index" class="dropdown-item">
                    <button type="button" class="btn btn-primary">Salir</button>
          </a>
          
          
          
        </div>
      </li>-->
      
      <!-- Perfil -->
      <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
          <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="imagenes/perfilesUsuarios/<?php echo unserialize($_SESSION['user'])->foto; ?>" alt="Profile image" style="
    width: 35px;"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="rounded-circle" src="imagenes/perfilesUsuarios/<?php echo unserialize($_SESSION['user'])->foto; ?>" alt="Profile image" style="
    width: 100px;">
              <p class="mb-1 mt-3 font-weight-semibold"><?php echo unserialize($_SESSION['user'])->nombre; ?></p>
              <!--<p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>-->
            </div>
            <a href="?c=Usuario&a=ViewPerfileUsuario" class="dropdown-item">Mi Perfil <i class="dropdown-item-icon ti-dashboard"></i></a>
            <!--<a class="dropdown-item">Messages<i class="dropdown-item-icon ti-comment-alt"></i></a>
            <a class="dropdown-item">Activity<i class="dropdown-item-icon ti-location-arrow"></i></a>
            <a class="dropdown-item">FAQ<i class="dropdown-item-icon ti-help-alt"></i></a>-->
            <div style="text-align: end;padding-right: 1rem;">              
                <a class="" href="?c=Login&a=EliminarSeccion" ><button type="button" class="btn btn-primary" style="width: 40%;">  Salir</button> </a>
            </div>
            
          </div>
        </li>
      
      
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?c=Inicio&a=Index" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Logo Abarrotes</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="imagenes/perfilesUsuarios/<?php echo unserialize($_SESSION['user'])->foto; ?>" class="img-circle elevation-2" alt="User Image" width="150px" height="150px">
        </div>
        <div class="info">
          <a href="?c=Usuario&a=ViewPerfileUsuario" class="d-block"><?php echo unserialize($_SESSION['user'])->nombre." ".unserialize($_SESSION['user'])->aPaterno;   ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview  <?php echo ($activar <= 6 && $activar>0) ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($activar <= 6 && $activar>0) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Mantenimiento
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?c=Perfil&a=Index" class="nav-link <?php echo $activar == 1 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Perfiles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?c=Proveedor&a=Index" class="nav-link  <?php echo $activar == 2 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?c=Cliente&a=Index" class="nav-link <?php echo $activar == 3 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?c=Producto&a=Index" class="nav-link <?php echo $activar == 4 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?c=Trabajador&a=Index" class="nav-link <?php echo $activar == 5 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Trabajadores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="?c=Usuario&a=Index" class="nav-link <?php echo $activar == 6 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?php echo ($activar > 6 && $activar <=8) ? 'menu-open' : ''; ?>">
            <a href="#" class="nav-link <?php echo ($activar > 6 && $activar <=8) ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                Trabajador
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="?c=Descuento&a=Index" class="nav-link <?php echo $activar == 7 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Descuentos</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="?c=Pago&a=Index" class="nav-link <?php echo $activar == 8 ? 'active' : ''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pagos</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview <?php echo ($activar > 8 && $activar <= 10) ? 'menu-open' : ''; ?>">
              <a href="#" class="nav-link <?php echo ($activar > 8 && $activar <= 10) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                  Ventas
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=Preventa&a=Index" class="nav-link <?php echo $activar == 9 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Detalle Venta</p>
                  </a>
                </li>


                <li class="nav-item">
                  <a href="?c=Venta&a=Index" class="nav-link <?php echo $activar == 10 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Venta</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item has-treeview <?php echo ($activar > 10 && $activar <= 11) ? 'menu-open' : ''; ?>">
              <a href="#" class="nav-link <?php echo ($activar > 10 && $activar <= 11) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-store"></i>
                <p>
                  Compras
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=Compra&a=Index" class="nav-link <?php echo $activar == 11 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Compras</p>
                  </a>
                </li>
              </ul>
            </li>
            
            
            <li style="display: none;" class="nav-item has-treeview <?php echo ($activar > 11 && $activar <= 13) ? 'menu-open' : ''; ?>">
              <a href="#" class="nav-link <?php echo ($activar > 11 && $activar <= 13) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-donate"></i>
                <p>
                  Crédito(Cliente)
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=Pago_credito_c&a=Index" class="nav-link <?php echo $activar == 12 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Créditos del Cliente</p>
                  </a>
                </li>

                
                <li class="nav-item">
                  <a href="?c=Detalle_pago_credito_c&a=Index" class="nav-link <?php echo $activar == 13 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Amortizaciones</p>
                  </a>
                </li>
                
              </ul>
            </li>
            
            <li style="display: none;" class="nav-item has-treeview <?php echo ($activar > 13 && $activar <= 14) ? 'menu-open' : ''; ?>">
              <a href="#" class="nav-link <?php echo ($activar > 13 && $activar <= 14) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-money-check-alt"></i>
                <p>
                  Crédito(Proveedor)
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=Pago_credito_p&a=Index" class="nav-link <?php echo $activar == 14 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Créditos del Proveedor</p>
                  </a>
                </li>
              </ul>
            </li>
            
            <li class="nav-item has-treeview <?php echo ($activar > 14 && $activar <= 19) ? 'menu-open' : ''; ?>">
              <a href="#" class="nav-link <?php echo ($activar > 14 && $activar <= 19) ? 'active' : ''; ?>">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  REPORTES
                  <i class="fas fa-angle-left right"></i>
                  <span class="badge badge-info right"></span>
                </p>
              </a>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=ReporteK&a=ViewKGeneral" class="nav-link <?php echo $activar == 19 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rep. Kardex </p>
                  </a>
                </li>
              </ul>

              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=ReporteK&a=Index" class="nav-link <?php echo $activar == 15 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rep. Kardex de Cliente</p>
                  </a>
                </li>
              </ul>
              
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?c=ReporteK&a=ViewKProveedor" class="nav-link <?php echo $activar == 18 ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rep. Kardex de Proveedor</p>
                  </a>
                </li>
              </ul>

 

              
            </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
