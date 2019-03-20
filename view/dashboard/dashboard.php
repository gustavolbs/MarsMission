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
<html lang="pt-br">
<head>
  <script src="../../dist/custom/js/jquery.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mars Mission - Painel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="../../dist/custom/js/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="icon" type="image/x-icon" href="../../dist/img/favicon.png">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<?php
if ($_SESSION['usuarioPrimeiroLogin'] == 1){
  ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#modal').modal('show');
    });
  </script>
<?php } ?>

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
    <?php $controle = 1; include '../bars/_sidebar.php';?>

    <!-- INCLUSÃO PRIMEIRO LOGIN -->
    <div class="modal modal-success fade" id="modal">
      <form class="form-horizontal" method="POST" action="../../model/senha_perfil.php" enctype="multipart/form-data">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Trocar senha e foto de perfil</h4>
              </div>
              <div class="modal-body">

                <div class="form-group">
                  <label for="inputSenha" class="col-sm-2 control-label">Senha</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="senha" id="inputSenha" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputFoto" class="col-sm-2 control-label">Foto de perfil</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="inputFoto" name="arquivo" required>
                  </div>
                </div>

              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-outline">Salvar mudanças</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </form>
      </div>
      <!-- /.modal -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Resumo Geral</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

          <!--------------------------| Your Page Content Here |-------------------------->
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-globe"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Distancia até ao planeta Terra</span>
                  <span class="info-box-number" id="quilometros">55.000,00 Km</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: 0%" id="barra"></div>
                  </div>
                  <span class="progress-description" id="viagem">
                    0% da viagem completa...
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <?php
            $id_user = $_SESSION['usuarioId'];

            $conn = conectar();
          //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
            $sql = "SELECT pontuacao FROM usuarios WHERE id = '$id_user';";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $pontuacao = $row['pontuacao'];

          //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
            $sql = "SELECT COUNT(id_user) AS contagem FROM brasoes WHERE id_user = '$id_user';";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($query);
            $brasoes = $row['contagem'];
            mysqli_close($conn);
            ?>

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-hand-lizard-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Minha Pontuação</span>
                  <span class="info-box-number"><?php echo $pontuacao;?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>


            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-hand-peace-o"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Brasões</span>
                  <span class="info-box-number"><?php echo $brasoes;?> de 50</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>


            
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#timeline" data-toggle="tab">Avisos</a></li>
                  <?php if ($_SESSION['usuarioNivel'] == 9) { ?> 
                    <li><a href="#settings" data-toggle="tab">Adicionar Aviso</a></li>
                  <?php } ?>
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
                      $sql = "SELECT * FROM avisos ORDER BY data DESC LIMIT 20;";
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
                          <h3 class="timeline-header no-border">30/11/3018 | <strong>Início da viagem</strong></h3>
                        </div>
                      </li>

                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          30/11/3018
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
                    <form class="form-horizontal" method="POST" action="../../model/aviso.php">

                      <div class="form-group">
                        <label for="inputAviso" class="col-sm-2 control-label">Aviso</label>

                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="aviso" id="inputAviso">
                        </div>
                      </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Adicionar</button>
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

      <!-- Bootstrap 3.3.7 -->
      <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="../../bower_components/fastclick/lib/fastclick.js"></script>
      <!-- AdminLTE App -->
      <script src="../../dist/js/adminlte.min.js"></script>
      <!-- Sparkline -->
      <script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
      <!-- SlimScroll -->
      <script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
      <!-- ChartJS -->
      <script src="../../bower_components/chart.js/Chart.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="../../dist/js/pages/dashboard2.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../../dist/js/demo.js"></script>

      <script>
      // Set the date we're counting down to
      var countDownDate = new Date("Dec 01, 2018 23:00:00").getTime();
      // Update the count down every 1 second
      var x = setInterval(function() {

        // Get todays date and time
        var inicio = new Date("Dec 01, 2018 00:15:00").getTime();
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distanceFinal = countDownDate - inicio;
        var distancenow = now - inicio;

        // Time calculations for days, hours, minutes and seconds      
        var secondsFinal = Math.floor(distanceFinal / 1000);
        var secondsNow = Math.floor(distancenow / 1000);

        var show = ((secondsNow * 55000000) / secondsFinal);
        var porcento = ((show * 100) / 55000000);
        var meters = 55000000 - show;

        // Display the result in the element with id="demo"
        if (show < 0) {
          document.getElementById("quilometros").innerHTML = "55.000.000 Km"; 
          document.getElementById("barra").style.width = "0%"; 
          document.getElementById("viagem").innerHTML = "Fazendo ajustes para a decolagem: preparando pilotos!"; 

        } else if (show > 55000000) {
          document.getElementById("quilometros").innerHTML = "Você chegou ao seu destino!"; 
          document.getElementById("barra").style.width = "100%"; 
          document.getElementById("viagem").innerHTML = "Aterrisagem bem sucedida!"; 

        } else {
          document.getElementById("quilometros").innerHTML = Math.floor(meters).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " Km"; 
          document.getElementById("barra").style.width = Math.floor(porcento) + "%"; 
          document.getElementById("viagem").innerHTML = Math.floor(porcento) + "% da viagem completa..."; 
        }

      }, 0);


    </script>
  </body>
  </html>
