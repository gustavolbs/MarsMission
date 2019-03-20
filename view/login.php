<?php
include_once '../controller/init.php';

if (esta_logado()) {
  // Redireciona para dashboard
  header("Location: dashboard/dashboard");
} else {
  // Num faz nada
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="../dist/img/favicon.png">

    <title>Mars Mission - Login</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/bootstrap-4.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../dist/custom/css/login.css" rel="stylesheet">
  </head>

  <body class="text-center" background="../dist/img/wallpaper.jpg" style="color:#ffffff">
    <div class="container">
      <!-- Inicia Form -->
      <form class="form-signin" action="../model/validar_login.php" method="POST">
        <img class="mb-4" src="../dist/img/logo.svg" alt="" width="110">
        <h1 class="h3 mb-3 font-weight-normal">Entre para continuar</h1>
        <!-- Usuario -->
        <label for="inputUsuario" class="sr-only">Usuário</label>
        <input style="background-color:#f9f9f9; border:1px solid #292929" type="text" id="inputUsuario" autocomplete="off" class="form-control" placeholder="Usuário" required autofocus="" name="usuario">

        <!-- Senha -->
        <label for="inputSenha" class="sr-only">Senha</label>
        <input style="background-color:#f9f9f9; border:1px solid #292929; margin-top:5px" type="password" id="inputSenha" class="form-control" placeholder="Senha" required name="senha">

        <!-- Lança erro de autenticação -->
        <?php
        if (isset($_SESSION['loginErro'])) {
          if ($_SESSION['loginErro'] == "Usuário ou senha Inválido."){
        ?>

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Usuário ou senha inválidos!</strong>
          <br>
          <img src="../dist/img/errou.gif">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <?php
          }
        }

        // Lança um erro de Permissão
        if (isset($_SESSION['loginErro'])) {
          if ($_SESSION['loginErro'] == "Tem que tá logado, espertinho..."){
        ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Tem que tá logado, espertinho...</strong>
          <br>
          <img src="../dist/img/facepalm.gif" width="260px">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
          }
        }
        ?>

        <!-- Botão de submissão -->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <p class="mt-5 mb-3 text-muted"><font style="color:white;">UMP Catolé © 2018</font></p>
      </form> 
      <!-- Termina Form -->
      <?php /*Apaga os dados da variável*/$_SESSION['loginErro'] = null;?>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="../dist/bootstrap-4.1.3/jquery-3.3.1.slim.min.js"></script>
      <script src="../dist/bootstrap-4.1.3/popper.min.js"></script>
      <script src="../dist/bootstrap-4.1.3/js/bootstrap.min.js"></script>
      </body>
    </div>
</html>