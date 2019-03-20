<?php
include_once "../controller/init.php";

if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../view/error/403");
}

$conn = conectar();

$sql1 = 'SELECT * FROM a_porcentagem WHERE id = 1';
$query1 = mysqli_query($conn, $sql1);

$sql2 = 'SELECT * FROM a_status ORDER BY id DESC LIMIT 1';
$query2 = mysqli_query($conn, $sql2);

if (!$query1 || !$query2) {
  echo "<h2>Eita caramba, aconteceu alguma coisa errada, foi mals kkkkkk</h2>";
  //die ('SQL Error: ' . mysqli_error($conn));
}else{

  $row1 = mysqli_fetch_array($query1);

  $N1 = $row1['N1']/180;
  $N2 = $row1['N2']/180;
  $N3 = $row1['N3']/180;

  $row2 = mysqli_fetch_array($query2);

  if ($row2['B1'] == 1 || $row2['B2'] == 1 || $row2['B3'] == 1 || $row2['B4'] == 1 || $row2['B5'] == 1 || $row2['B6'] == 1){
    $S1 = 'active';
  }else{
    $S1 = '';
  }
  if ($row2['B1'] == 2 || $row2['B2'] == 2 || $row2['B3'] == 2 || $row2['B4'] == 2 || $row2['B5'] == 2 || $row2['B6'] == 2){
    $S2 = 'active';
  }else{
    $S2 = '';
  }
  if ($row2['B1'] == 3 || $row2['B2'] == 3 || $row2['B3'] == 3 || $row2['B4'] == 3 || $row2['B5'] == 3 || $row2['B6'] == 3){
    $S3 = 'active';
  }else{
    $S3 = '';
  }


  echo '
  <div class="row">
  <div class="col-md-12">
    <div class="box box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Progresso de envio</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">

        <p><strong>1 - Hunters ('.$N1.'%)</strong></p>

        <div class="progress '.$S1.'">
          <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="'.$N1.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$N1.'%">
            <strong>'.$N1.'%</strong>
          </div>
        </div>


        <p><strong>2 - Rushback ('.$N2.'%)</strong></p>

        <div class="progress '.$S2.'">
          <div class="progress-bar progress-bar-striped progress-bar-warning" role="progressbar" aria-valuenow="'.$N2.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$N2.'%">
            <strong>'.$N2.'%</strong>
          </div>
        </div>


        <p><strong>3 - Alliance ('.$N3.'%)</strong></p>

        <div class="progress '.$S3.'">
          <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="'.$N3.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$N3.'%">
            <strong>'.$N3.'%</strong>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div></div>
  ';
}

mysqli_close($conn);
?>
