<?php
include_once '../../../controller/init.php';

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
	$_SESSION['loginErro'] = "Tem que tá logado, espertinho...";
	header("Location: ../../login.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mars Mission - QR Code</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
page. However, you can choose any other skin. Make sure you
apply the skin class to the body tag so the changes take effect. -->
<link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
<link rel="icon" type="image/x-icon" href="../../../dist/img/favicon.png">

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

		<!-- Main Header -->
		<header class="main-header">
			<!-- Logo -->
			<a href="../../dashboard.php" class="logo">
				<!-- mini logo for sidebar mini 50x50 pixels -->
				<span class="logo-mini"><img src="../../../dist/img/logo.svg" width="30"></span>
				<!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><img src="../../../dist/img/logo.svg" width="30">  Mars Mission</span>
			</a>

			<!-- INCLUSÃO DA NAVBAR -->
			<?php include 'navbar.php';?>

		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<?php $controle = 14; include 'sidebar.php';?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					QR Code
					<small>Gere um QR Code para facilitar o acesso.</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="../../dashboard/dashboard.php"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="#">Administrativo</a></li>
					<li class="active">QR Code</li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content container-fluid">

				<!--------------------------| Your Page Content Here |-------------------------->
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Insira um texto ou link</h3>
					</div>
					<hr>
					<div class="box-body">
						<form class="form-signin">
							<fieldset>
								<input type="text" id="texto" class="form-control" placeholder="   Digite algo ..." />
								<br />
								<button class="btn btn-lg btn-primary btn-block" id="botao" type="button">Gerar QR Code</button>
							</fieldset>
						</form>

						<?php
						$aux = 'qr_img0.50j/php/qr_img.php?';
						$aux .= 'd=Criando QrCode no PHP&';
						$aux .= 'e=H&';
						$aux .= 's=6&';
						$aux .= 't=P';
						?>
						<div style="display: block;">
							<img id="image" style="margin-top: 10px; display: block; margin-left: auto; margin-right: auto; width: 20%; border: 1px solid #000;" src="<?php echo $aux; ?>" />
						</div>
						<br>
						<center><a href="#" style="background-color: #77b55a;" onclick="VoucherPrint('<?php echo $aux; ?>'); return false;" class="btn btn-lg btn-primary">Imprimir</a></center>
					</div>
				</div>
				<script type="text/javascript" src="../../../dist/custom/js/jquery.min.js"></script>
				<script type="text/javascript">
					$('#botao').click(function(e){
						e.preventDefault();
						var texto = $('#texto').val();
						var nivel = "H";
						var pixels = "8";
						var tipo = "P";

						if(texto.length == 0){
							alert('Informe um texto');
							return(false);
						}
						$('#image').attr('src', 'qr_img0.50j/php/qr_img.php?d='+texto+'&e='+nivel+'&s='+pixels+'&t='+tipo);
					});
				</script>

				<script type="text/javascript">
					function VoucherSourcetoPrint(source) {
						return "<html><head><script>function step1(){\n" +
						"setTimeout('step2()', 10);}\n" +
						"function step2(){window.print();window.close()}\n" +
						"</scri" + "pt></head><body onload='step1()'>\n" +
						"<img src='" + source + "' /></body></html>";
					}
					function VoucherPrint(source) {
						Pagelink = "about:blank";
						var pwa = window.open(Pagelink, "_new");
						pwa.document.open();
						pwa.document.write(VoucherSourcetoPrint(source));
						pwa.document.close();
					}
				</script>

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


		<!-- INCLUSÃO DA CONTROL SIDEBAR -->
		<?php include '../../bars/_control_sidebar.php';?>

      <!-- Add the sidebar's background. This div must be placed
      	immediately after the control sidebar -->
      	<div class="control-sidebar-bg"></div>
      	<!-- /.control-sidebar -->

      </div>

      <!-- REQUIRED JS SCRIPTS -->

      <!-- jQuery 3 -->
      <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
      <!-- Bootstrap 3.3.7 -->
      <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../../../dist/js/adminlte.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. -->
</body>
</html>



