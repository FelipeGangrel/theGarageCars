<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$alert = $_SESSION['ALERT'];
unset($_SESSION['ALERT']);


switch ($alert) {
  case 'sucesso': echo '<script>'.'swal("Sucesso", "Registro salvo com sucesso", "success")'.'</script>'; break;
  case 'delete': echo '<script>'.'swal("Sucesso", "Registro removido com sucesso", "success")'.'</script>'; break;
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Categorias
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<?dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">
          
          <form action="e-categoria-menu.php" method="post">

            <div class="box-body">

              <table id="dataTable" class="table table-nowrap table-bordered table-striped">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th style="width: 10px"><i class="fa fa-bars" ata-toggle="tooltip" data-placement="right" title="Mostrar esta categoria no menu?"></i></th>
                    <th>Nome</th>
                    <th class="no-sort" style="width: 30px"></th>
                  </tr>
                </thead>

                 <tbody>
                  <?  $sql = mysql_query("SELECT * FROM ".DB_PREFIX."categoria ORDER BY CAT_NOME ASC ")or(die(mysql_error()));
                      while($categoria = mysql_fetch_array($sql)):
                        $categoriaCod = $categoria['CAT_ID'];
                        $categoriaNome = utf8_encode($categoria['CAT_NOME']);
                        $categoriaMenu = ($categoria['CAT_MENU'])?true:false;
                  ?>
                  <tr>
                    <td><? echo $categoriaCod ?></td>
                    <td><input type="checkbox" name="selecionados[]" value="<? echo $categoriaCod ?>" <? echo ($categoriaMenu)?'checked':''; ?> ></td>
                    <td><? echo $categoriaNome ?></td>
                    <td>
                       <a href="<?dashRoot();?>pages/categorias/categoria.php?c=<? echo $categoriaCod ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                    </td>
                  </tr>
                  <? endwhile; ?>
                 </tbody>

              </table>

              <button type="submit" class="btn btn-primary">Mostrar no menu</button>
            </div><!-- /.box-body -->

          </form>
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>