<?php
include_once '../../controller/init.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mars Mission - Chat</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap
    <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="icon" type="image/x-icon" href="../../dist/img/favicon.png">

    <!-- Google Font -->
<!--    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper" style="background-color: rgb(236, 240, 245);">
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

      <!-- INCLUSÃO DA SIDEBAR -->
      <?php $controle = 3; include '../bars/_sidebar.php';?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mars Mission Chat
            <small>Conversem a vontade</small>
          </h1>
          <p><small>O chat poderá ser desativado para manutenção. Fique atento aos anúncios feitos.</small></p>
          <ol class="breadcrumb">
            <li><a href="../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Chat</li>
          </ol>
        </section>

        <!-- Main content -->
        <!-- DIRECT CHAT PRIMARY -->
        <div class="col-md-12">
          <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Chat Geral</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages" style="height: 320px; overflow-x: hidden;">



                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <form class="chat-form" name="message" action="" autocomplete="off">
                  <div class="input-group">
                    <input type="hidden" placeholder="Usuário" id="user" value="<?php echo $_SESSION['usuarioUsuario']; ?>">
                    <input type="text" name="message" placeholder="Digite aqui ..." class="form-control" id="msg">
                    <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary btn-flat" id="submsg"><i class="fa fa-paper-plane"></i></button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.box-footer-->
            </div>
          </div>
          <!-- ----------------------------------------------------------------------------------------- -->
        </div>

      </div>
      <!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0.0
        </div>
        <strong>Copyright &copy; 2018 UMP Catolé.</strong> Todos os direitos reservados
      </footer>

      <!-- INCLUSÃO DA CONTROL SIDEBAR -->
      <?php include '../bars/_control_sidebar.php';?>

      <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->
    <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- Sparkline -->
    <script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- jvectormap  
    <script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>-->
    <!-- SlimScroll -->
    <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS -->
    <script src="../../bower_components/chart.js/Chart.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../../dist/js/pages/dashboard2.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <script type="text/javascript" src="../../dist/js/ajax-jquery.min.js"></script>

    <script>
      function loadLog() {
        var t = $(".direct-chat-messages").attr("scrollHeight") - 20;
        $.ajax({
          url: "mensagem.php",
          cache: !1,
          success: function(a) {
            $(".direct-chat-messages").html(a);
            var l = $(".direct-chat-messages").attr("scrollHeight") - 20;
            t < l && $(".direct-chat-messages").animate({
              scrollTop: l
            }, "normal")
          }
        })
      }
      $("button").click(function() {
        var t = $("#msg").val();
        var u = $("#user").val();
        $('input').filter('[id*=msg]').val('');

        // textarea is empty or contains only white-space
        return $.post("gravar.php", {
          msg: t, user: u,
        }), !1

      }, setInterval('loadLog()', 1000));

      function atualizar(){
        $(".direct-chat-messages").load("index.php");
      };
      function myFunction() {
        //         setInterval('atualizar()', 1000);
      }

      window.onload = function(){
        myFunction();
      }
    </script>
  </body>
</html>
