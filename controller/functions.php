<?php
//----------------------------------- Conecta ao banco de dados -------------------------//
function conectar() {

  //Variáveis de conexão
  $servidor = "localhost";
  $usuario = "user";
  $senha = "RaspDB*2018";
  $dbname = "acamp";

  //Criar a conexao
  $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

  if(!$conn){
    return false;
    die("Falha na conexao: " . mysqli_connect_error());
  }else{
    return $conn;
    //echo "Conexao realizada com sucesso";
  }
}


//----------------------------------- Verifica se o usuário está logado -------------------------//
function esta_logado() {
  if (isset($_SESSION['logado']) && $_SESSION['logado'] == true){
    return true;
  }
  return false;
}


//----------------------------------- Grava log no BD -------------------------//
function gravar_log($str) {

  $conn = conectar();
  $id = $_SESSION['usuarioId'];
  $sql = "INSERT INTO log (id_usuario, ocorrencia) VALUES ('$id','$str')";
  $resultado_usuario = mysqli_query($conn, $sql);
  mysqli_close($conn);
}

//----------------------------------- Retorna configuracoes -------------------------//
function listar_config($config_id) {

$conn = conectar();

$sql = "SELECT * FROM config WHERE id = $config_id";
$query = mysqli_query($conn, $sql);

if (!$query) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}else{

  $row = mysqli_fetch_assoc($query);

  mysqli_close($conn);

  return $row['valor'];
}
}

?>
