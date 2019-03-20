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
    <title>Mars Mission - Novo usuário</title>
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

    <!-- Google Font -->
    <!--<link rel="stylesheet"
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
        <a href="dashboard" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="../../dist/img/logo.svg" width="30"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="../../dist/img/logo.svg" width="30">  Mars Mission</span>
        </a>

        <!-- Header Navbar -->
        <?php include '../bars/_navbar.php';?>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <?php $controle = 12; include '../bars/_sidebar.php';?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Novo Usuário
            <small>acesso administrativo</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="#">Administrativo</a></li>
            <li class="active">Novo Usuário</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

          <!--------------------------| Your Page Content Here |-------------------------->
          <section class="content">
            <div class="row">
              <div class="col-xs-12">

                <div class="box">
                  <div class="box-header">
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form class="form-horizontal" action='../../model/criar_usuario.php' method='POST'>
                      <div class="box-body">

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Usuário</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuário" id="usuario">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">Senha</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" name="senha" placeholder="Password" id="senha">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Nome</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" placeholder="Nome" id="nome">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Clã</label>
                          <div class="col-sm-10">
                            <input type="number" min="0" max="3" class="form-control" name="nacao" placeholder="Nação" id="nacao">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Patente</label>
                          <div class="col-sm-10">
                            <input type="number" value="0" min="0" max="21" class="form-control" name="patente" placeholder="Patente" id="patente">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Status</label>
                          <div class="col-sm-10">
                            <input type="text" value="0" min="0" max="9" class="form-control" name="status" placeholder="Status" id="status">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Nível de acesso</label>
                          <div class="col-sm-10">
                            <input type="number" value="1" min="0" max="9" class="form-control" name="nivel_acesso" placeholder="Nível de acesso" id="nivel">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Primeiro login</label>
                          <div class="col-sm-10">
                            <input type="number" value="0" min="0" max="1" class="form-control" name="primeiro_login" placeholder="Primeiro login" id="login">
                          </div>
                        </div>

                        <div class="form-group"> 
                          <label class="col-sm-2 control-label">Imagem</label>
                          <div class="col-sm-10">
                            <input type="text" value="default.png" class="form-control" name="imagem" placeholder="Imagem" id="imagem">
                          </div>
                        </div>

                      </div>
                      <!-- /.box-body -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                      </div>
                      <!-- /.box-footer -->
                    </form>

                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </section>
          <!-- /.content -->
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
