<?php
session_start();
if(!isset($_SESSION['admin'])){
  header('Location: login.php');
}
include('includes/db.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">خروج</i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
      <div style="direction: rtl">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="info">
            <a href="#" class="d-block">علی خسروی</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../index.php" target="_blank" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>مشاهده سایت</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?dash" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>داشبورد</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?add_cat" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>اضافه کردن برند</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?cat" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>برندها</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?add_pro" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>اضافه کردن محصول</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?pro" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>محصولات</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?cart" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>سفارشات</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="index.php?user" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>کاربران</p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    <?php
      if(isset($_GET['dash'])){
        include('pages/dash.php');
      }
      elseif(isset($_GET['user'])){
        include('pages/user.php');
      }
      elseif(isset($_GET['user_edit'])){
        include('pages/user_edit.php');
      }
      elseif(isset($_GET['user_del'])){
        include('pages/user_del.php');
      }
      elseif(isset($_GET['add_pro'])){
        include('pages/add_pro.php');
      }
      elseif(isset($_GET['pro'])){
        include('pages/pro.php');
      }
      elseif(isset($_GET['pro_edit'])){
        include('pages/pro_edit.php');
      }
      elseif(isset($_GET['pro_del'])){
        include('pages/pro_del.php');
      }
      elseif(isset($_GET['add_cat'])){
        include('pages/add_cat.php');
      }
      elseif(isset($_GET['cat'])){
        include('pages/cat.php');
      }
      elseif(isset($_GET['cat_edit'])){
        include('pages/cat_edit.php');
      }
      elseif(isset($_GET['cat_del'])){
        include('pages/cat_del.php');
      }
      elseif(isset($_GET['cart'])){
        include('pages/cart.php');
      }
      elseif(isset($_GET['show'])){
        include('pages/show.php');
      }
      else{
        include('pages/dash.php');
      }
    ?>
  <!-- /.content-wrapper -->

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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
