<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="<?siteRoot();?>" target="_blank" class="logo">
    <span class="logo-mini">ADM</span>
    <span class="logo-lg"><img src="<?dashRoot();?>img/logo.png" alt=""></span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">

    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">

        <!-- User Account Menu -->

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?dashRoot();?>img/user.png" class="user-image" alt="User Image">
            <span class="hidden-xs"><? echo utf8_encode($_SESSION['USUARIO_NOME']); ?></span>
          </a>

          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?dashRoot();?>pages/usuarios/usuario.php?c=<? echo $_SESSION['USUARIO'] ?>"><i class="fa fa-user"></i>Meu perfil</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="<?dashRoot();?>pages/login/acessa.php?c=logout"><i class="fa fa-sign-out"></i> Sair</a></li>
          </ul>

          

        </li>




        <!-- Control Sidebar Toggle Button -->
        <!-- <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li> -->

      </ul>
    </div>
  </nav>


</header>