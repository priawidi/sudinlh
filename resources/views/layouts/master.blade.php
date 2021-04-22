<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrasi Tata Usaha</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/toastr/toastr.min.css') }}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-orange navbar-dark">
    


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <span class="d-md-inline text-white"><i class="fas fa-user"></i>&nbsp;&nbsp;{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <!-- Menu Body-->
          <li class="user-body">
            <a href="{{route('logout')}}" class="btn btn-danger float-right">Sign out</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-orange elevation-4">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <img src="{{ URL::asset('adminlte/img/logo sudin.png') }}"
           alt="Logo"
           class="brand-image img-circle"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sudin LH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/home" class="nav-link">
              <img src="{{ URL::asset('adminlte/img/home.png') }}" width="30px" height="30px">
              <p>
                Beranda
              </p>
            </a>
          </li>
          
      
          <li class="nav-item has-treeview">
            <a href="" class="nav-link">
              <img src="{{ URL::asset('adminlte/img/clipboard.png') }}" width="30px" height="30px">
              <p>
                Laporan Mingguan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/masuk" class="nav-link">
                  <img src="{{ URL::asset('adminlte/img/inbox.png') }}" width="30px" height="30px">
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/keluar" class="nav-link">
                  <img src="{{ URL::asset('adminlte/img/outbox.png') }}" width="30px" height="30px">
                  <p>Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li>
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <img src="{{ URL::asset('adminlte/img/user.png') }}" width="30px" height="30px">
              <p>
                Manajemen User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/manjuser" class="nav-link">
                  <img src="{{ URL::asset('adminlte/img/user_list.png') }}" width="30px" height="30px">
                  <p>Data User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/manjuser/create" class="nav-link">
                  <img src="{{ URL::asset('adminlte/img/add-user.png') }}" width="30px" height="30px">
                  <p>Tambah User</p>
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
    
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('adminlte/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('adminlte/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('adminlte/js/demo.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('adminlte/plugins/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ URL::asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ URL::asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ URL::asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ URL::asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"> </script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>

@yield('footer')

</body>
<script>
  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });
</script>
</html>
