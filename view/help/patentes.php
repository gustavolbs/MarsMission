<?php
require_once '../../controller/init.php';

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  $_SESSION['loginErro'] = "Tem que tá logado, espertinho...";
  header("Location: ../login");
}
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mars Mission </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
page. However, you can choose any other skin. Make sure you
apply the skin class to the body tag so the changes take effect. -->
<link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">
<link rel="icon" type="image/x-icon" href="../../dist/img/favicon.png">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
  <!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="../dashboard/dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../../dist/img/logo.svg" width="30"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../../dist/img/logo.svg" width="30">  Mars Mission</span>
      </a>

      <!-- Header Navbar -->
      <?php include '../bars/_navbar.php';?>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $controle = 18; include '../bars/_sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Patentes
          <small>identifique sua patente</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Patentes</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------| Your Page Content Here |-------------------------->

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Lista de patentes</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th>#</th>
                  <th><center>Patente</center></th>
                </tr>
                

                  <?php
                  for ($i = 0; $i <= 21; $i++){
                  ?>
                    <tr>
                      <td><strong><?php echo $i;?>.</strong></td>
                      <td><center><?php echo "<img src='../../dist/img/badges/$i.svg' width='50px'"; ?></center></td>
                    </tr>

                  <?php }?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

          <!--------------------------| Your Page Content Here |-------------------------->

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018 UMP Catolé.</strong> Todos os direitos reservados
      </footer>

      <!-- Control Sidebar -->
      <?php include '../bars/_control_sidebar.php';?>
      <!-- /.control-sidebar -->
      
      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
      
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. -->
</body>
</html>
