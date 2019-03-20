<?php
require '../../controller/init.php';

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  $_SESSION['loginErro'] = "Tem que tá logado, espertinho...";
  header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mars Mission - Perfil</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
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

    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="../dashboard/dashboard.php" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../../dist/img/logo.svg" width="30"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img src="../../dist/img/logo.svg" width="30">  Mars Mission</span>
      </a>

      <!-- INCLUSÃO DA NAVBAR -->
      <?php include '../bars/_navbar.php';?>

    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php $controle = 4; include '../bars/_sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Perfil
          <small>Dados do usuário</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#"> Meus Dados</a></li>
          <li class="active"> Perfil</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <!--------------------------| Your Page Content Here |-------------------------->

        <?php 
        switch ($_SESSION['usuarioNacao']) {
          case 0:
          $nacao = "Sem Clã";
          break;
          case 1:
          $nacao = "Alliance";
          break;
          case 2:
          $nacao = "Hunters";
          break;
          case 3:
          $nacao = "Rushback";
          break;
        }
        ?>

        <div class="row">
        <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <?php
            switch ($nacao) {
              case "Sem Clã":
              $cor = "bg-gray-active";
              break;
              case "Alliance":
              $cor = "bg-aqua-active";
              break;
              case "Hunters":
              $cor = "bg-red-active";
              break;
              case "Rushback":
              $cor = "bg-yellow-active";
              break;
            }

            $conn = conectar();
            $id = $_SESSION['usuarioId'];
            $sql = "SELECT pontuacao FROM usuarios WHERE id = '$id';";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $pontuacao = $row['pontuacao'];
            mysqli_close($conn);
            
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
            <div class="widget-user-header <?php echo $cor;?>">
              <h3 class="widget-user-username"><?php echo utf8_encode($_SESSION['usuarioNome']);?></h3>
              <!--                 <h5 class="widget-user-desc">Founder &amp; CEO</h5> -->
              <h5 class="widget-user-desc"><?php echo $_SESSION['usuarioUsuario'];?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="../../dist/img/perfil/<?php echo $_SESSION['usuarioImagem'];?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $nacao; ?></h5>
                    <span class="description-text">Clã</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><img src='../../dist/img/badges/<?php echo $_SESSION["usuarioPatente"] ?>.svg' width='28'></h5>
                    <span class="description-text">Patente</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <?php
                    $id_user = $_SESSION['usuarioId'];
                    $conn = conectar();
                      //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
                    $sql = "SELECT COUNT(id_user) AS contagem FROM brasoes WHERE id_user = '$id_user';";
                    $query = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($query);
                    $brasoes = $row['contagem'];
                    mysqli_close($conn);
                    ?>
                    <h5 class="description-header"><?php echo $brasoes;?></h5>
                    <span class="description-text">Brasões</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          </div>
          <!-- /.widget-user -->
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#timeline" data-toggle="tab">Linha do tempo</a></li>
                <li><a href="#settings" data-toggle="tab">Alterar perfil</a></li>
              </ul>
              <div class="tab-content">
                <!-- /.tab-pane -->
                <div class="active tab-pane" id="timeline">
                  <!-- The timeline -->
                  <ul class="timeline timeline-inverse">


                    <?php 
                      //conecta ao bd
                    $conn = conectar();
                    $user_id = $_SESSION['usuarioId'];

                      //busca no bd o qr para verificar se o qr ja foi lido
                    $sql = "SELECT * FROM log WHERE id_usuario = '$user_id' ORDER BY data DESC LIMIT 20;";
                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($query)){;
                      ?>
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          <?php echo date('H:i:s', strtotime($row['data']));?>

                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>

                        <div class="timeline-item">

                          <h3 class="timeline-header no-border"><?php echo (date('d/m/Y', strtotime($row['data'])). " | <strong>" . $row['ocorrencia']) ."</strong>";?></h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                    <?php } mysqli_close($conn);?>

                    <!-- timeline time label -->
                    <li class="time-label">
                      <span class="bg-green">
                        30 Nov. 2018
                      </span>
                    </li>
                    <!-- /.timeline-label -->
                    <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal" method="POST" action="../../model/senha_perfil.php" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="inputSenha" class="col-sm-2 control-label">Senha</label>

                      <div class="col-sm-10">
                        <input type="password" class="form-control" name="senha" id="inputSenha">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputFoto" class="col-sm-2 control-label">Foto de perfil</label>

                      <div class="col-sm-10">
                        <input type="file" class="form-control" id="inputFoto" name="arquivo" placeholder="Skills">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Alterar</button>
                      </div>
                    </div>
                  </form>
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
    <?php include '../bars/_control_sidebar.php'?>
    <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
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
