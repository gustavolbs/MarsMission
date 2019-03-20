<?php
include_once "../controller/init.php";



echo date('h:i:s');
echo "<br>";
for ($i = 1; $i <= 100; $i++) {
	$conn = conectar();
	
	$sql = "SELECT * FROM chat";
	$query = mysqli_query($conn, $sql);
	mysqli_close($conn);
	
}
echo date('h:i:s');
?>