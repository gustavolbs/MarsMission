<?php
include_once '../controller/init.php';

$conn = conectar();
//Verifica se vieram dados nas variáveis
if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
  //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
  $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
  $senha = mysqli_real_escape_string($conn, $_POST['senha']);
  $senha = md5($senha);

  //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
  $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($resultado);


  //Verifica se chegou resultado
  if(isset($row)){
    $_SESSION['usuarioId'] = $row['id'];
    $_SESSION['usuarioUsuario'] = $row['usuario'];
    $_SESSION['usuarioSenha'] = $row['senha'];
    $_SESSION['usuarioNome'] = $row['nome'];
    $_SESSION['usuarioNacao'] = $row['nacao'];
    $_SESSION['usuarioPatente'] = $row['patente'];
    $_SESSION['usuarioStatus'] = $row['status'];
    $_SESSION['usuarioNivel'] = $row['nivel_acesso'];
    $_SESSION['usuarioPrimeiroLogin'] = $row['primeiro_login'];
    $_SESSION['usuarioImagem'] = $row['imagem'];

    $_SESSION['logado'] = true;
    unset($row);

    //Direciona para o painel
    if(isset($_SESSION['usuarioId'])){
      mysqli_close($conn);
      gravar_log("Usuario logou-se");
      header("Location: ../view/dashboard/dashboard");
    }

    /*Se não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
  redireciona o usuario para a página de login*/
  }else{	
    //Váriavel global recebendo a mensagem de erro
    $_SESSION['loginErro'] = "Usuário ou senha Inválido.";
    mysqli_close($conn);
    header("Location: ../view/login");
  }
  //Se as variáveis estiverem vazias, leva para login
}else{
  $_SESSION['loginErro'] = "Digite usuário e senha.";
  mysqli_close($conn);
  header("Location: ../view/login");
}
//fecha a conexao mysqli
mysqli_close($conn);
?>