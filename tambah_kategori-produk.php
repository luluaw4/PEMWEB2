<?php 
require_once 'dbkoneksi.php';
?>
<?php 
    // cek apakah terdapat parameter id pada URL, jika ada maka dilakukan edit data
    $_id = isset($_GET['idedit']) ? $_GET['idedit'] : null;
    if(!empty($_id)){
        // ambil data produk berdasarkan id
        $sql = "SELECT * FROM kategori_produk WHERE id=?";
        $st = $dbh->prepare($sql);
        $st->execute([$_id]);
        $row = $st->fetch();
    }else{
        // jika tidak ada parameter id pada URL, maka dianggap input data baru
        // inisialisasi variabel $row sebagai array kosong
        $row = [];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WF</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-baru/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">

  <link rel="icon" href="dist/img/logo.png">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logo.png" alt="WF" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/lulu.jpg" class="icon kelompok" alt="User Image" style="border-radius: 100px;">
        </div>
        <div class="info">
          <a href="index.html" class="d-block">Wijayanti Fashion</a>
          <i class></i>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="kelola-pesanan.php" class="nav-link active">
                  <i class="nav-icon fa-solid fa-gear"></i></i>
                  <p>
                    Kelola Pesanan
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kelola_produk.php" class="nav-link active">
                  <i class="nav-icon fa-regular fa-newspaper"></i>
                  <p>
                    Kelola Produk
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="kategori-produk.php" class="nav-link active">
                  <i class="nav-icon fa-brands fa-wpforms"></i>
                  <p>
                    Kategori Produk
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="tambah-produk.php" class="nav-link active">
                  <i class="nav-icon fa fa-square-plus"></i>
                  <p>
                    Tambah Produk
                  </p>
                </a>
              </li>
              <li class="nav-item">
              <a href="tambah_kategori-produk.php" class="nav-link active">
                  <i class="nav-icon fa fa-square-plus"></i>
                  <p>
                    Tambah kategori Produk
                  </p>
                </a>
              </li> 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Kategori Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Tambah Kategori Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section>
      <div class="container-fluid">
        <div class="row pt-2">
          <div class="col-md-12">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form method="POST" action="proses_kategori-produk.php">
              <div class="form-group row">
                <label for="ide" class="col-4 col-form-label">No</label> 
                <div class="col-8">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-anchor"></i>
                      </div>
                    </div> 
                    <input id="id" name="id" type="text" class="form-control"
                    value="<?php if(isset($row['id'])) echo $row['id']; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-4 col-form-label">Nama</label> 
                <div class="col-8">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fa fa-adjust"></i>
                      </div>
                    </div> 
                    <input id="nama" name="nama" type="text" class="form-control" 
                    value="<?php if(isset($row['nama'])) echo $row['nama']; ?>">
                  </div>
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-4 col-8">
            
                <?php
                    $button = (empty($_id)) ? "Simpan":"Update"; 
                ?>
            
                  <input type="submit" name="proses" type="submit" 
                  class="btn btn-primary" value="<?=$button?>"/>
                  <input type="hidden" name="idedit" value="<?=$_id?>"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">Wijayanti Fashion</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
