<?php
include_once '../controller/init.php';

$conn = conectar();

if (trim($_POST['aviso']) == ""){
	return;
}else{
	$aviso = $_POST['aviso'];
	$sql = "INSERT INTO avisos (aviso) VALUES ('$aviso')";
	$query = mysqli_query($conn, $sql);
}
mysqli_close($conn);

header("location: ../view/dashboard/dashboard");
?>