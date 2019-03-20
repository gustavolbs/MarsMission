<?php
include '../controller/init.php';

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../view/error/403");
}

$conn = conectar();

//Escapar de caracteres especiais, como aspas, prevenindo SQL injection
$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);
$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$nacao = mysqli_real_escape_string($conn, $_POST['nacao']);
$patente = mysqli_real_escape_string($conn, $_POST['patente']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
$nivel_acesso = mysqli_real_escape_string($conn, $_POST['nivel_acesso']);
$primeiro_login = mysqli_real_escape_string($conn, $_POST['primeiro_login']);
$imagem = mysqli_real_escape_string($conn, $_POST['imagem']);
if ($imagem.trim == "") {
	$imagem = "default.png";
}

if (strlen($senha) >= 30) {

} else {
  $senha = md5($senha);
}

//Insere na tabela usuarios o usuário com os dados digitado no formulário
$sql = "INSERT INTO usuarios (usuario, senha, nome, nacao, patente, status, nivel_acesso, imagem, primeiro_login) 
        VALUES ('$usuario','$senha','$nome','$nacao','$patente','$status','$nivel_acesso','$imagem','$primeiro_login')";

$resultado = mysqli_query($conn, $sql);
if (!$resultado) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}
gravar_log("usuário: $usuario criado");
unset($resultado, $sql);

mysqli_close($conn);

header("Location: ../view/admin/newuser");
?>