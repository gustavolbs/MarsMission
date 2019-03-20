<?php
require '../controller/init.php';
$id = 7;

$conn = conectar();
//Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
$sql = "SELECT codigo, nome FROM qr_codes WHERE id = '$id';";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$codigo = $row['codigo'];
$nome = $row['nome'];
mysqli_close($conn);
?>
<center><h1>MarsMission</h1></cernter>
<iframe src="http://192.168.1.100/view/admin/qrcode/qr_img0.50j/php/qr_img.php?d=192.168.1.100/model/ler_qr?codigo=<?php echo $codigo;?>&e=H&s=8&t=P" style="border:none;" height="500" width="500"></iframe>
<center><h1><?php echo $nome;?></h1></cernter>
