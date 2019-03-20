<?php
include '../controller/init.php';

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../view/error/403");
}

$conn = conectar();

//Escapar de caracteres especiais, como aspas, prevenindo SQL injection
$id = mysqli_real_escape_string($conn, $_POST['id']);
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

//Altera na tabela usuario o usuário que corresponde com os dados digitado no formulário
$sql = "UPDATE usuarios SET usuario='$usuario', senha='$senha', nome='$nome', nacao='$nacao', patente='$patente', status='$status', nivel_acesso='$nivel_acesso', imagem='$imagem',primeiro_login='$primeiro_login' WHERE id=$id";

$resultado = mysqli_query($conn, $sql);
if (!$resultado) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}
gravar_log("usuário ID: $id modificado");
unset($resultado, $sql);


$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' && senha = '$senha' LIMIT 1";
$resultado = mysqli_query($conn, $sql);
if (!$resultado) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}

mysqli_close($conn);

header("Location: ../view/admin/list_users");
?>