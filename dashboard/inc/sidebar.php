<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <!-- <li class="header">NAVEGAÇÃO</li> -->
      <!-- Optionally, you can add icons to the links -->
      <li class=""><a href="<? dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i> <span>Home</span></a></li>


      <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Usuários</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<? dashRoot();?>pages/usuarios/usuarios.php">Todos</a></li>
          <li><a href="<? dashRoot();?>pages/usuarios/usuario.php">Novo</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-car"></i> <span>Carros</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<? dashRoot();?>pages/carros/carros.php">Todos</a></li>
          <li><a href="<? dashRoot();?>pages/carros/carro.php">Novo</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-car"></i> <span>Carros</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">

          <li><a href="<? dashRoot();?>pages/carros/carros.php">Carros cadastrados</a></li>

          <li class="second-level">
            <a href="#">Fabricantes <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<? dashRoot();?>pages/carros-fabricantes/fabricantes.php">Todos</a></li>
              <li><a href="<? dashRoot();?>pages/carros-fabricantes/fabricante.php">Novo</a></li>
            </ul>
          </li>
          <li class="second-level">
            <a href="#">Modelos <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<? dashRoot();?>pages/carros-modelos/modelos.php">Todos</a></li>
              <li><a href="<? dashRoot();?>pages/carros-modelos/modelo.php">Novo</a></li>
            </ul>
          </li>
        </ul>

      </li>

      


    </ul><!-- /.sidebar-menu -->

  </section>
  <!-- /.sidebar -->
</aside>