<?php
include '../../controller/init.php';

if (esta_logado() && $_SESSION['usuarioNivel'] == 9) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../dashboard");
}
?>

<!DOCTYPE html>
<html language="pt-br">

<head>
  <script src="../../dist/custom/js/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mars Mission - Usuários</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
      folder instead of downloading all of them to reduce the load. -->
      <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
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

      <!-- INCLUSÃO DA NAVBAR -->
      <?php include '../bars/_navbar.php';?>

    </header>

    <!-- INCLUSÃO DA SIDEBAR -->
    <?php $controle = 11; include '../bars/_sidebar.php';?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Listagem de usuários
          <small>acesso administrativo</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="#">Administrativo</a></li>
          <li class="active">Usuários</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">

            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Usuários</h3>
                <input style="position:relative; float: right;"type="text" id="myInput" onkeyup="myFunction()" placeholder="   Nome de usuário ..." title="Type in a name">
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="tab_users" class="table table-hover table-bordered table-striped sortable">
                  <thead>
                    <tr>
                      <th><center>ID</center></th>
                      <th><center>Usuário</center></th>
                      <th><center>Nome</center></th>
                      <th><center>Status</center></th>
                      <th><center>Clã</center></th>
                      <th><center>Patente</center></th>
                      <th><center>Nível de acesso</center></th>
                      <th><center>Primeiro acesso</center></th>
                      <th><center>Imagem</center></th>
                      <th><center>Opções</center></th>
                    </tr>
                  </thead> 
                  

                  <?php include_once "../../model/listar_usuarios.php"; ?>
                  
                  <script>
//                     $(document).ready(function(){
//                       function(){ $("#usuariosTabela").DataTable().ajax.reload("../../model/listar_usuarios.php"); }
//                     });
                  </script>
                  <tbody id="usuariosTabela"></tbody> 
                </table>

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
    </div>
    <!-- /.content-wrapper -->



    <!---------------------------------------------------------------------- MODAL EDITAR USUÁRIO -->
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Editar usuário:<br><strong><span id="tituloUser"></span></strong></h4>
            </div>

            <div class="modal-body">
              <!-- form start -->
              <form class="form-horizontal" action='../../model/alterar_usuario.php' method='POST'>
                <div class="box-body">

                  <input type="number" class="hidden" name="id" id="idModal">

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
                      <input type="number" min="0" max="21" class="form-control" name="patente" placeholder="Patente" id="patente">
                    </div>
                  </div>

                  <div class="form-group"> 
                    <label class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" min="0" max="9" name="status" placeholder="Status" id="status">
                    </div>
                  </div>

                  <div class="form-group"> 
                    <label class="col-sm-2 control-label">Nível de acesso</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" max="9" class="form-control" name="nivel_acesso" placeholder="Nível de acesso" id="nivel">
                    </div>
                  </div>

                  <div class="form-group"> 
                    <label class="col-sm-2 control-label">Primeiro login</label>
                    <div class="col-sm-10">
                      <input type="number" min="0" max="1" class="form-control" name="primeiro_login" placeholder="Primeiro login" id="login">
                    </div>
                  </div>

                  <div class="form-group"> 
                    <label class="col-sm-2 control-label">Imagem</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="imagem" placeholder="Imagem" id="imagem">
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!----------------------------------------------------------------------- /.modal -->



      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018 UMP Catolé.</strong> Todos os direitos reservados
      </footer>

      <!-- INCLUSÃO DA CONTROL SIDEBAR -->
      <?php include '../bars/_control_sidebar.php';?>

      <!-- Add the sidebar's background. This div must be placed
        immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->

      <!-- jQuery 3 -->
      <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- DataTables -->
      <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <!-- SlimScroll -->
      <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- FastClick -->
      <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>
      <!-- page script -->
      <script src="../../dist/custom/js/list_users.js"></script>
    </body>

    </html>
