<?php
require '../controller/init.php';

$conn = conectar();
//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
$sql = "SELECT * FROM usuarios;";
$query = mysqli_query($conn, $sql);

$alliance = 0;
$hunters = 0;
$rushback = 0;

while($row = mysqli_fetch_array($query)){
    if ($row['nacao'] == 3) {
	$rushback += $row['pontuacao'];
    }
    if ($row['nacao'] == 2) {
	$hunters += $row['pontuacao'];
    }
    if ($row['nacao'] == 1) {
	$alliance += $row['pontuacao'];
    }
}


echo "Pontuação de cada equipe<br>";
echo "Alliance: ".$alliance."<br><hr>";
echo "Hunters: ".$hunters."<br><hr>";
echo "Rushback: ".$rushback."<br><hr>";


    mysqli_close($conn);


    ?>
