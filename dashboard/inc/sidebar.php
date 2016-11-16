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
        <a href="#"><i class="fa fa-file"></i> <span>Postagens</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<? dashRoot();?>pages/posts/posts-destaque.php">Selecionar destaques</a></li>
          <li><a href="<? dashRoot();?>pages/posts/posts.php">Todos</a></li>
          <li><a href="<? dashRoot();?>pages/posts/post.php">Novo</a></li>
        </ul>
      </li>


      <li class="treeview">
        <a href="#">
          <i class="fa fa-cog"></i> <span>configurações</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>

        <ul class="treeview-menu">
          <li class=""><a href="<? dashRoot();?>pages/perfil/perfil.php"><i class="fa fa-user"></i> <span>Perfil</span></a></li>
          <li class="second-level">
            <a href="#"><i class="fa fa-folder"></i>Categorias <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<? dashRoot();?>pages/categorias/categorias.php">Todos</a></li>
              <li><a href="<? dashRoot();?>pages/categorias/categoria.php">Novo</a></li>
            </ul>
          </li>
          <li class="second-level">
            <a href="#"><i class="fa fa-tag"></i>Tags <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="<? dashRoot();?>pages/tags/tags.php">Todos</a></li>
              <li><a href="<? dashRoot();?>pages/tags/tag.php">Novo</a></li>
            </ul>
          </li>
        </ul>

      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-briefcase"></i> <span>Parceiros</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<? dashRoot();?>pages/parceiros/parceiros.php">Todos</a></li>
          <li><a href="<? dashRoot();?>pages/parceiros/parceiro.php">Novo</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-user"></i> <span>Usuários</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="<? dashRoot();?>pages/usuarios/usuarios.php">Todos</a></li>
          <li><a href="<? dashRoot();?>pages/usuarios/usuario.php">Novo</a></li>
        </ul>
      </li>

      


    </ul><!-- /.sidebar-menu -->

  </section>
  <!-- /.sidebar -->
</aside>