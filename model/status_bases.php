<?php
include_once "../controller/init.php";

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../view/error/403");
}

$conn = conectar();

$sql = 'SELECT * FROM a_status ORDER BY id DESC LIMIT 1';
$query1 = mysqli_query($conn, $sql);

$sql = 'SELECT 
TIMESTAMPDIFF(SECOND, B1, CURRENT_TIMESTAMP ) as B1,
TIMESTAMPDIFF(SECOND, B2, CURRENT_TIMESTAMP ) as B2,
TIMESTAMPDIFF(SECOND, B3, CURRENT_TIMESTAMP ) as B3,
TIMESTAMPDIFF(SECOND, B4, CURRENT_TIMESTAMP ) as B4,
TIMESTAMPDIFF(SECOND, B5, CURRENT_TIMESTAMP ) as B5,
TIMESTAMPDIFF(SECOND, B6, CURRENT_TIMESTAMP ) as B6
FROM `a_tempo` WHERE 1';

$query2 = mysqli_query($conn, $sql);

if (!$query1 || !$query2) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}else{

  $row1 = mysqli_fetch_array($query1);
  $row2 = mysqli_fetch_array($query2);

  $base1 = array('B1','B2','B3','B4','B5','B6');
  $base2 = array('B1','B2','B3','B4','B5','B6');

  echo '
    <!-- Info boxes -->
    <div class="row">';

  for ($i=0; $i<6; $i++) {
    switch ($row1[$base1[$i]]) {
      case 0:
        $base1[$i] = "bg-grey";
        break;
      case 1:
        $base1[$i] = "bg-red";
        break;
      case 2:
        $base1[$i] = "bg-yellow";
        break;
      case 3:
        $base1[$i] = "bg-blue";
        break;
      case 4:
        $base1[$i] = "bg-grey";
        break;
      case 5:
        $base1[$i] = "bg-grey";
        break;
      case 6:
        $base1[$i] = "bg-grey";
        break;
    }

    $hora = gmdate("H:i:s", $row2[$base2[$i]])." atrás...";

    echo '
        <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon '.$base1[$i].'"><i class="ion ion-wifi"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text"><strong>Base '.($i + 1).'</strong></span>
                    <span>'.$hora.'</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>';
  }
}

echo '
</div>
<!-- /.row -->';

mysqli_close($conn);
?>