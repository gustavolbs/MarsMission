<?php
include_once "../../controller/init.php";

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../view/error/403");
}

$conn = conectar();

$sql = 'SELECT * FROM usuarios ORDER BY id';
$query = mysqli_query($conn, $sql);

if (!$query) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}

while ($row = mysqli_fetch_array($query)){
  $id = $row['id'];
  $nome = '"'.$row['nome'].'"';
  $usuario = '"'. $row['usuario']. '"';
  $senha = '"'. $row['senha']. '"';
  $nacao = '"'. $row['nacao']. '"';
  $patente = '"'. $row['patente']. '"';
  $status = '"'. $row['status']. '"';
  $nivel = '"'. $row['nivel_acesso']. '"';
  $login = '"'. $row['primeiro_login']. '"';
  $imagem = '"'. $row['imagem']. '"';
  echo "<tr>
        <td><center>".$id."</center></td>
        <td><center>".$row['usuario']."</center></td>
        <td>".$row['nome']."</td>
        <td><center>".$row['status']."</center></td>
        <td><center><img src='../../dist/img/flag/".$row['nacao'].".svg' width='32'></center></td>
        <td><center><img src='../../dist/img/badges/".$row['patente'].".svg' width='32'></center></td>
        <td><center><img src='../../dist/img/accessLevel/".$row['nivel_acesso'].".svg' width='32'></center></td>
        <td><center><img src='../../dist/img/first_access/".$row['primeiro_login'].".svg' width='32'></center></td>
        <td><center><img src='../../dist/img/perfil/".$row['imagem']."' width='40'></center></td>
        <td><center><button type='button' onclick='mudarId($id,$nome,$usuario,$senha,$nacao,$patente,$status,$nivel,$login,$imagem)' class='btn btn-default' data-toggle='modal' data-target='#modal-default'>
        Editar
        </button></center><td>
        </tr>";
}

// return $query;

mysqli_close($conn);
?>