<?php
include_once '../controller/init.php';

if($_FILES['arquivo']['name'] != null){

  $arquivo = $_FILES['arquivo']['name'];

  //Pasta onde o arquivo vai ser salvo
  $_UP['pasta'] = '../dist/img/perfil/';

  //Tamanho máximo do arquivo em Bytes
  $_UP['tamanho'] = 1024*1024*100; //5mb

  //Array com a extensões permitidas
  $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

  //Renomeiar
  $_UP['renomeia'] = true;

  //Array com os tipos de erros de upload do PHP
  $_UP['erros'][0] = 'Não houve erro';
  $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
  $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
  $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
  $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

  //Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
  if($_FILES['arquivo']['error'] != 0){
    die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; //Para a execução do script
  }

  //Faz a verificação da extensao do arquivo
  $ponto = '.';
  $extensao = strtolower(end(explode($ponto, $arquivo)));
  if(array_search($extensao, $_UP['extensoes']) === false){		
    echo "
					<script type=\"text/javascript\">
						alert(\"A imagem não foi cadastrada extesão inválida.\");
					</script>
          <script language=\"JavaScript\">
              location.href=\"../view/profile/profile\"
            </script>
				";
  }

  //Faz a verificação do tamanho do arquivo
  else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
    echo "
					<script type=\"text/javascript\">
						alert(\"Arquivo muito grande.\");
					</script>
          <script language=\"JavaScript\">
              location.href=\"../view/profile/profile\"
            </script>
				";
  }

  //O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
  else{

    //Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
    $nome_final = time().'.jpg';

    //Verificar se é possivel mover o arquivo para a pasta escolhida
    if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
      $id = $_SESSION['usuarioId'];
      $conn = conectar();
      $sql = "UPDATE usuarios SET imagem = '$nome_final' WHERE id = $id";
      $query = mysqli_query($conn, $sql);
      $_SESSION['usuarioImagem'] = $nome_final;
      
      $sql = "UPDATE usuarios SET primeiro_login = '0' WHERE id = $id";
      $query = mysqli_query($conn, $sql);
      $_SESSION['usuarioPrimeiroLogin'] = 0;
      
      mysqli_close($conn);
      
      //Upload efetuado com sucesso, exibe a mensagem
      echo "
						<script type=\"text/javascript\">
							alert(\"Imagem cadastrada com Sucesso.\");
						</script>
            <script language=\"JavaScript\">
              location.href=\"../view/profile/profile\"
            </script>
					";	
    }else{
      //Upload não efetuado com sucesso, exibe a mensagem
      echo "
						<script type=\"text/javascript\">
							alert(\"Imagem não foi cadastrada com Sucesso.\");
						</script>
            <script language=\"JavaScript\">
              location.href=\"../view/profile/profile\"
            </script>
					";
    }
  }
}

if($_POST['senha'] != null){
  $conn = conectar();
  $senha = mysqli_real_escape_string($conn, $_POST['senha']);
  $senha = md5($senha);
  $id = $_SESSION['usuarioId'];
  $sql = "UPDATE usuarios SET senha = '$senha' WHERE id = $id";
  $query = mysqli_query($conn, $sql);
  mysqli_close($conn);
  echo "
						<script type=\"text/javascript\">
							alert(\"Senha alterada com Sucesso.\");
						</script>
            <script language=\"JavaScript\">
              location.href=\"../view/profile/profile\"
            </script>
					";
}
?>