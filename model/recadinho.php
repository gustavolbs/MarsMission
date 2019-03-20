<?php
include_once '../controller/init.php';

$conn = conectar();

if (trim($_POST['para']) == "" || trim($_POST['recado']) == ""){
	return;
}else{
    $para = $_POST['para'];
    $recado = $_POST['recado'];
	$sql = "INSERT INTO recadinhos (para, recado) VALUES ('$para', '$recado')";
    $query = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo '
    <script> alert("Recadinho enviado para: '.$para.'!"); </script>
    <script> location.href="../view/recadinho/recadinho" </script>';
}
mysqli_close($conn);
echo '
<script> alert("Ocorreu algum erro!"); </script>
<script> location.href="../view/recadinho/recadinho" </script>';
?>