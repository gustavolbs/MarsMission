<?php
include_once '../../../controller/init.php';
if (esta_logado()) {
  //num faz nada, segue o jogo...
} else {
  header("Location: ../../error/403.html");
}
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" style="height: auto;">
    
    <!-- Sidebar user panel -->
    <div class="user-panel">
      
      <div class="pull-left image">
        <img src="../../../dist/img/perfil/<?php echo $_SESSION['usuarioImagem'];?>" class="img-circle" alt="User Image">
      </div>
      
      <div class="pull-left info">
        <p><?php echo $_SESSION['usuarioUsuario']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i>
          <?php 
          switch ($_SESSION['usuarioStatus']){
            case 0:
            echo "offline";
            break;
            case 1:
            echo "online";
            break;
            case 2:
            echo "foi ali...";
            break;
          }
          ?>
        </a>
      </div>
      
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">NAVEGAÇÃO PRINCIPAL</li>
      
      <li <?php if ($controle == 1) echo 'class="active"'; ?>><a href="../../dashboard/dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

      <?php
      $config = listar_config(1);
      if ($config == 1){
      ?>
      <li <?php if ($controle == 2) echo 'class="active"'; ?>><a href="../../marsmission/marsmission.php"><i class="fa fa-space-shuttle"></i> <span>Mars Mission</span></a></li>
      <?php }?>

      <li <?php if (false) echo 'class="active"'; ?>><a href="../../chat/index.php"><i class="fa fa-comments"></i> <span> Chat</span></a></li>

      <li <?php if ($controle == 16) echo 'class="active"'; ?>><a href="../../ranking/ranking.php"><i class="fa fa-trophy"></i> <span> Ranking</span></a></li>

      <li class="treeview <?php if (4 <= $controle && $controle <= 5) echo 'active'; ?>">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Meus Dados</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($controle == 4) echo 'class="active"'; ?>><a href="../../profile/profile.php"><i class="fa fa-circle-o"></i> Perfil</a></li>
          <li <?php if ($controle == 5) echo 'class="active"'; ?>><a href="../../profile/brasoes.php"><i class="fa fa-circle-o"></i> Brasões</a></li>

        </ul>
      </li>
      
      <li class="treeview <?php if ($controle == 6) echo 'active'; ?>">
        <a href="#">
          <i class="fa fa-flag"></i>
          <span>Meu Clã</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if ($controle == 6) echo 'class="active"'; ?>><a href="../../cla/chat/index.php"><i class="fa fa-circle-o"></i> Chat</a></li>
          <li <?php if (false) 'class="active"'; ?>><a href="../../cla/integrantes.php"><i class="fa fa-circle-o"></i> Integrantes</a></li>
          <li <?php if (false) 'class="active"'; ?>><a href="../../cla/ranking.php"><i class="fa fa-circle-o"></i> Ranking</a></li>
        </ul>
      </li>

      <li class="treeview <?php if (false) 'active'; ?>">
        <a href="#">
          <i class="fa fa-info"></i>
          <span>Help</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php if (false) 'class="active"'; ?>><a href="../../help/historia.php"><i class="fa fa-circle-o"></i> História</a></li>
          <li <?php if (false) 'class="active"'; ?>><a href="../../help/programacao.php"><i class="fa fa-circle-o"></i> Programação</a></li>
        </ul>
      </li>
      
      <?php
      if ($_SESSION["usuarioNivel"] == 9) {
      ?>
      <li class="treeview <?php if (false) 'active'; ?>">
        <a href="#">
          <i class="fa fa-key"></i>
          <span>Administrativo</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li <?php if (false) 'class="active"'; ?>><a href="../../admin/list_users.php"><i class="fa fa-circle-o"></i> Usuários</a></li>
            <li <?php if (false) 'class="active"'; ?>><a href="../../admin/newuser.php"><i class="fa fa-circle-o"></i> Criar Usuários</a></li>
            <li <?php if ($controle == 17) echo 'class="active"'; ?>><a href="../../admin/fullscreen.php"><i class="fa fa-circle-o"></i> Fullscreen</a></li>
            <li <?php if (false) 'class="active"'; ?>><a href="../../admin/controle.php"><i class="fa fa-circle-o"></i> Controle</a></li>
            <li <?php if (false) 'class="active"'; ?>><a href="../../admin/qrcode/index.php"><i class="fa fa-circle-o"></i> QR Code</a></li>
            <li <?php if (false) 'class="active"'; ?>><a href="../../admin/roteadores.php"><i class="fa fa-circle-o"></i> Roteadores</a></li>
        </ul>
      </li>
      <?php
      }
      ?>

    </ul>
  </section>
  <!-- /.sidebar -->
</aside>