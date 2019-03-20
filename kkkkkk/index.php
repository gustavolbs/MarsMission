<?php
require '../controller/init.php';

$conn = conectar();
//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
$sql = "SELECT para, recado FROM recadinhos;";
$query = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($query)){
    echo "Para: ".$row['para']."<br>";
    echo "Recadinho: ".$row['recado']."<br><hr>";
}
    mysqli_close($conn);
    ?>
