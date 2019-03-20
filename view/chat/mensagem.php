<?php
include_once '../../controller/init.php';

$conn = conectar();

$sql = '
SELECT * FROM (
SELECT usuarios.id, usuarios.imagem, usuarios.usuario, chat.message, chat.date 
FROM chat INNER JOIN usuarios ON chat.user_id = usuarios.id ORDER BY chat.id DESC LIMIT 50
) tmp ORDER BY tmp.date ASC
';
$query = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($query)){
  $user_id = $row['id'];
  $user = $row['usuario'];
  $msg = $row['message'];
  $date = $row['date'];
  $img = "default.png";
  if ($row['imagem'] != ""){
    $img = $row['imagem'];
  }
  
  if ($user_id == $_SESSION['usuarioId']){
    echo "<!-- Message to the right -->
    <div class='direct-chat-msg right'>
    <div class='direct-chat-info clearfix'>
    <span class='direct-chat-name pull-right'>$user</span>
    <span class='direct-chat-timestamp pull-left'>$date</span>
    </div>
    <!-- /.direct-chat-info -->
    <img class='direct-chat-img' src='../../dist/img/perfil/$img' alt='Message User Image'><!-- /.direct-chat-img -->
    <div class='direct-chat-text'>
    ".stripslashes(htmlspecialchars($msg))." 
    </div>
    <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->
    </div>
    <!--/.direct-chat-messages-->";
  }else{
    echo "<!-- Message. Default to the left -->
    <div class='direct-chat-msg'>
    <div class='direct-chat-info clearfix'>
    <span class='direct-chat-name pull-left'>$user</span>
    <span class='direct-chat-timestamp pull-right'>$date</span>
    </div>
    <!-- /.direct-chat-info -->
    <img class='direct-chat-img' src='../../dist/img/perfil/$img' alt='Message User Image'><!-- /.direct-chat-img -->
    <div class='direct-chat-text'>
    ".stripslashes(htmlspecialchars($msg))."
    </div>
    <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->";
  }
}
mysqli_close($conn);
?>