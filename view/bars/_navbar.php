<?php
include_once '../../controller/init.php';
if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../error/403.html");
}
?>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="../../dist/img/perfil/<?php echo $_SESSION['usuarioImagem'];?>" class="user-image" alt="User Image">
          <span class="hidden-xs"><?php echo $_SESSION['usuarioNome']; ?></span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="../../dist/img/perfil/<?php echo $_SESSION['usuarioImagem'];?>" class="img-circle" alt="User Image">

            <p>
              <?php echo $_SESSION['usuarioUsuario'].' - '.$_SESSION['usuarioNome']; ?>
              <small>Membro desde Nov. 2018</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="../profile/profile.php" class="btn btn-default btn-flat">Meu perfil</a>
            </div>
            <div class="pull-right">
              <a href="../../controller/sair_session.php" class="btn btn-default btn-flat">Sair</a>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>

</nav>