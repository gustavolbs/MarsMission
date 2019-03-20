<?php
include '../../controller/init.php';

if (esta_logado() && $_SESSION['usuarioNivel'] == 9) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../dashboard");
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
  <script src="../../dist/custom/js/jquery.min.js"></script>
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

    <!-- Google Font 
    <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <script>
      $(document).ready(function(){
        setInterval(function(){ $("#status").load("../../model/status_bases.php"); }, 2000);
        setInterval(function(){ $("#porcentagem").load("../../model/porcentagens.php"); }, 5000);
      });
    </script>
    <script src="../../dist/custom/js/anychart-base.min.js"></script>
    <script src="../../dist/custom/js/anychart-ui.min.js"></script>
    <script src="../../dist/custom/js/anychart-exports.min.js"></script>
    <link rel="stylesheet" href="../../dist/custom/css/anychart-ui.min.css" />
    <link rel="stylesheet" href="../../dist/custom/css/anychart-font.min.css" />
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
  <div class="wrapper" style="background-color: #ecf0f5">

    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Mars Mission
          <small>Operação em andamento</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#">Administrativo</a></li>
          <li class="active">Mars Mission</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------| Your Page Content Here |-------------------------->


        <div class="row" style="height: 100%;">
          <div class="col-md-12 col-sm-12 col-xs-12">

            <!-- Status das bases -->
            <div id="status"><center><img src="../../dist/img/carregando.gif" width="100"></center></div>

            <!-- Porcentagens por clã -->
            <div id="porcentagem"><center><img src="../../dist/img/carregando.gif" width="100"></center></div>

          </div>
          <!-- /.col (RIGHT) -->

          <!-- TimeLine Arduíno -->
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#timeline" data-toggle="tab">Avisos</a></li>
                </ul>
                <div class="tab-content">
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">


                    <?php 
                      //conecta ao bd
                    $conn = conectar();

                      //busca no bd o qr para verificar se o qr ja foi lido
                    $sql = "SELECT * FROM avisosmm ORDER BY data DESC LIMIT 20;";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($query)){;
                      ?>
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          <?php echo date('H:i:s', strtotime($row['data']));?>

                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-warning bg-yellow"></i>

                        <div class="timeline-item">

                          <h3 class="timeline-header no-border"><?php echo (date('d/m/Y', strtotime($row['data'])). " | <strong>" . $row['aviso']) ."</strong>";?></h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                    <?php } mysqli_close($conn);?>


                    <li class="time-label">
                      <span class="bg-green">
                        20:00:00
                      </span>
                    </li>
                    <!-- /.timeline-label -->
                    <li>
                      <i class="fa fa-warning bg-yellow"></i>
                      <div class="timeline-item">
                        <h3 class="timeline-header no-border">30/11/2018 | <strong>Início do Acamp</strong></h3>
                      </div>
                    </li>

                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-green">
                        30/11/2018
                      </span>
                    </li>
                    <!-- /.timeline-label -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->

              </div>
              <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->




        </div>
        <!-- /.row -->

        <!--------------------------| Your Page Content Here |-------------------------->

      </section>
      <!-- /.content -->
      <!-- </div> -->
      <!-- /.content-wrapper -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- ChartJS -->
    <script src="../../bower_components/chart.js/Chart.js"></script>
    
  </body>
  </html>
