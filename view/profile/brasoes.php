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
    <!-- <link rel="stylesheet" href="../../dist/bootstrap-4.1.3/css/bootstrap.min.css"> -->
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
      <?php $controle = 5; include '../bars/_sidebar.php';?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Brasões
            <small>Conquistas</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#"> Meus Dados</a></li>
          <li class="active"> Brasões</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

          <!--------------------------| Your Page Content Here |-------------------------->

          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Conquistados</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                
                <?php 
                  //conecta ao bd
                  $conn = conectar();
                  $user = $_SESSION['usuarioId'];
                  //busca no bd o qr para verificar se o qr ja foi lido
                  $sql = "SELECT * FROM brasoes WHERE id_user = '$user';";
                  $query = mysqli_query($conn, $sql);
                  $count;
                while ($row = mysqli_fetch_array($query)){
                  $count++;
                ?>
                <li>
                  <img src="../../dist/img/brasoes/<?php echo $row['brasao']?>.png" width=100px>
                  <?php
                  $imagem = "../../dist/img/brasoes/".$row['brasao'].".png";
                  $nome = utf8_encode($row['nome']);
                  $obter = utf8_encode($row['obter']);
                  $raridade = utf8_encode($row['raridade']);
                  $funcao = "abrirbrasao($imagem, $nome, $obter, $raridade);";
                  ?>
                  <a class="users-list-name" href="#" onclick="abrirbrasao('<?php echo $imagem;?>', '<?php echo $nome;?>', '<?php echo $obter;?>', '<?php echo $raridade;?>');"><?php echo $nome;?></a>
                </li>
                <?php }?>
                
              </ul>
              <!-- /.users-list -->
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


    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="nomebrasao"></h4>
          </div>
          <div class="modal-body">
            <img id="img" src="" width="100%">
            <hr>
            <h4>Obtenção:</h4><br>
            <p id="obter"></p>
            <hr>
            <h4>Raridade:</h4><br>
            <p id="raridade"></p>
          </div>
        </div>
      </div>
    </div>

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>

    <script>
     function abrirbrasao(a, b, c, d){
        document.getElementById('img').src = a;
        document.getElementById('nomebrasao').innerHTML = b;
        document.getElementById('obter').innerHTML = c;
        document.getElementById('raridade').innerHTML = d;
        $("#Modal").modal();
      }
    </script>


    <!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. -->
  </body>
</html>
