<!doctype html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../dist/bootstrap-4.1.3/css/bootstrap.min.css">
  <title>Mars Mission | QrCode</title>
</head>
<body>
  <div class="container">
    <!-- Content here -->

    <?php
    include_once '../controller/init.php';

    if (esta_logado()) {
        //Captura as variáveis da session e do get
    $codigo = $_GET['codigo'];
    $user = $_SESSION['usuarioId'];
    $usuario = $_SESSION['usuarioUsuario'];

    function adicionar_ponto($user, $valor){
        //conecta ao bd
      $conn = conectar();
      $sql = "UPDATE usuarios SET pontuacao = pontuacao + $valor WHERE id = $user";
      $query = mysqli_query($conn, $sql);
      gravar_log("Adicionou $valor pontos");
      $usuario = $_SESSION['usuarioUsuario'];
      echo "
      <div class='alert alert-success' role='alert'>
      <h4 class='alert-heading'>Parabéns, $usuario!</h4>
      <p>Você acabou de ganhar <strong>$valor pontos</strong>.</p>
      </div>";
      mysqli_close($conn);
    }

    function adicionar_brasao($user, $valor, $codigo, $nome, $obter, $raridade){
        //conecta ao bd
      $conn = conectar();
      $sql = "INSERT INTO brasoes (id_user, brasao, nome, obter, raridade) VALUES ('$user', '$codigo', '$nome', trim('$obter'), '$raridade')";
      $query = mysqli_query($conn, $sql);
      gravar_log("Adicionou um brasao");
      $sql = "UPDATE usuarios SET pontuacao = pontuacao + $valor WHERE id = $user";
      $query = mysqli_query($conn, $sql);
      gravar_log("Adicionou $valor pontos");
      $usuario = $_SESSION['usuarioUsuario'];

      $sql = "SELECT nome FROM qr_codes WHERE codigo = '$codigo';";
      $resultado = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($resultado);
      $nomebrasao = $row['nome'];

      echo "
      <div class='alert alert-success' role='alert'>
      <h4 class='alert-heading'>Parabéns, $usuario!</h4>
      <p>Você acabou de adicionar um Brasão.</p>
      <p><strong>Brasão:</strong> $nomebrasao</p>
      <img src='../dist/img/brasoes/$codigo.png' width='200px'></img>
      <p><strong>+ $valor pontos!</strong></p>
      </div>";
      mysqli_close($conn);
    }

      //conecta ao bd
    $conn = conectar();

      //busca no bd o qr para verificar se o qr ja foi lido
    $sql = "SELECT * FROM cont_qr WHERE id_user = '$user' && codigo_qr = '$codigo';";
    $resultado = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultado);

      //verifica se foi lido
    if (!isset($row)){
      $sql = "SELECT * FROM qr_codes WHERE codigo = '$codigo' LIMIT 1;";
      $resultado = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($resultado);

      $id_qr = $row['id'];
      $funcao = $row['funcao'];
      $valor = $row['valor'];
      $nome = $row['nome'];
      $obter = $row['obter'];
      $raridade = $row['raridade'];
      $ilimitado = $row['ilimitado'];
      $usos = $row['usos'];

      if(($ilimitado == 1) || ($usos > 0)){
        $sql = "INSERT INTO cont_qr (`id_user`, `codigo_qr`) VALUES ('$user', '$codigo');";
        $resultado = mysqli_query($conn, $sql);

        $sql = "UPDATE qr_codes SET usos = usos - '1' WHERE id = '$id_qr';";
        $query = mysqli_query($conn, $sql);
        mysqli_close($conn);
        switch ($funcao){
          case 1:
          adicionar_brasao($user, $valor, $codigo, $nome, $obter, $raridade);
          break;
          case 2:
          adicionar_ponto($user, $valor);
          break;
        }
      }else{
        echo "
        <div class='alert alert-warning' role='alert'>
        <h4 class='alert-heading'>Eita, $usuario!</h4>
        <p>Esse código já venceu...</p>
        </div>";
      }

    }else{
      mysqli_close($conn);
      echo "
      <div class='alert alert-danger' role='alert'>
      <h4 class='alert-heading'>Oxe, $usuario!</h4>
      <p>Tu já leu esse código.</p>
      </div>";
    }
    
    } else {
      header("Location: ../view/login");
    }
    ?>
  </div>
</body>
</html>