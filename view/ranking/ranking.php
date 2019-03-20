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
    <?php $controle = 16; include '../bars/_sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Ranking
          <small>acompanhe o ranking geral</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Ranking</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------| Your Page Content Here |-------------------------->

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Ranking de Pontuação</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Usuário</th>
                  <th style="width: 100px"><center>Foto</center></th>
                  <th style="width: 100px"><center>Pontuação</center></th>
                  <th style="width: 40px"><center>Patente</center></th>
                </tr>
                <tr>

                  <?php 
                  $conn = conectar();
                  $cla = $_SESSION['usuarioNacao'];
                  $sql = "SELECT * FROM usuarios ORDER BY pontuacao DESC;";
                  $query = mysqli_query($conn, $sql);

                  if (!$query) {
                    echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
                      //die ('SQL Error: ' . mysqli_error($conn));
                  }

                  $cont = 0;
                  while ($row = mysqli_fetch_array($query)){
                    if ($row['nivel_acesso'] != 9) {

                      $cont++;
                      $usuario = $row['usuario'];
                      $imagem = $row['imagem'];
                      $pontuacao = $row['pontuacao'];
                      $patente = 0;

                      switch (true) {
                        case ($pontuacao <= 237):
                        $patente = 0;
                        break;
                        case ($pontuacao <= 474):
                        $patente = 1;
                        break;
                        case ($pontuacao <= 711):
                        $patente = 2;
                        break;
                        case ($pontuacao <= 948):
                        $patente = 3;
                        break;
                        case ($pontuacao <= 1185):
                        $patente = 4;
                        break;
                        case ($pontuacao <= 1422):
                        $patente = 5;
                        break;
                        case ($pontuacao <= 1659):
                        $patente = 6;
                        break;
                        case ($pontuacao <= 1896):
                        $patente = 7;
                        break;
                        case ($pontuacao <= 2133):
                        $patente = 8;
                        break;
                        case ($pontuacao <= 2370):
                        $patente = 9;
                        break;
                        case ($pontuacao <= 2607):
                        $patente = 10;
                        break;
                        case ($pontuacao <= 2844):
                        $patente = 11;
                        break;
                        case ($pontuacao <= 3081):
                        $patente = 12;
                        break;
                        case ($pontuacao <= 3318):
                        $patente = 13;
                        break;
                        case ($pontuacao <= 3555):
                        $patente = 14;
                        break;
                        case ($pontuacao <= 3792):
                        $patente = 15;
                        break;
                        case ($pontuacao <= 4029):
                        $patente = 16;
                        break;
                        case ($pontuacao <= 4266):
                        $patente = 17;
                        break;
                        case ($pontuacao <= 4503):
                        $patente = 18;
                        break;
                        case ($pontuacao <= 4740):
                        $patente = 19;
                        break;
                        case ($pontuacao <= 4977):
                        $patente = 20;
                        break;
                        case ($pontuacao >= 5214):
                        $patente = 21;
                        break;                        
                      }
                      ?>

                      <td><strong><?php echo $cont;?>.</strong></td>
                      <td><?php echo $usuario; ?></td>
                      <td><center><?php echo "<img src='../../dist/img/perfil/$imagem' style='border-radius:50%;' width=50>"; ?></center></td>
                      <td><center><?php echo $pontuacao; ?></center></td>
                      <td><center><?php echo "<img src='../../dist/img/badges/$patente.svg' width=40>"; ?></center></td>
                    </tr>

                  <?php }} mysqli_close($conn);?>

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
