<?php
include_once '../../../controller/init.php';

$conn = conectar();

if (trim($_POST['msg']) == ""){
	return;
}else{

	$user = $_SESSION['usuarioId'];
	if (trim($_POST['msg']) != "") {
		$msg = $_POST['msg'];
	}

  switch ($_SESSION['usuarioNacao']) {
    case 0:
    $chat = "chatAdmin";
    break;
    case 1:
    $chat = "chatalliance";
    break;
    case 2:
    $chat = "chathunters";
    break;
    case 3:
    $chat = "chatrushback";
    break;
}

$sql = "INSERT INTO $chat (user_id, message) VALUES ('$user', '$msg')";
$query = mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>