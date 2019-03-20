<?php
include_once '../controller/init.php';

$conn = conectar();

if (trim($_POST['aviso']) == ""){
	return;
}else{
	$aviso = $_POST['aviso'];
	$sql = "INSERT INTO avisosmm (aviso) VALUES ('$aviso')";
	$query = mysqli_query($conn, $sql);
}
mysqli_close($conn);

header("location: ../view/marsmission/marsmission");
?>