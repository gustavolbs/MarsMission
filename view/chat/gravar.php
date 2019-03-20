<?php
include_once '../../controller/init.php';

$conn = conectar();

if (trim($_POST['msg']) == ""){
	return;
}else{

	$user = $_SESSION['usuarioId'];
	if (trim($_POST['msg']) != "") {
		$msg = $_POST['msg'];
	}

	$sql = "INSERT INTO chat (user_id, message) VALUES ('$user', '$msg')";
	$query = mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>