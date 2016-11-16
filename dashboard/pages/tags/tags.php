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
      Tags
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

          <div class="box-body">
            <table id="dataTable" class="table table-nowrap table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nome</th>
                  <th class="no-sort" style="width: 30px"></th>
                </tr>
              </thead>

               <tbody>
                <?  $sql = mysql_query("SELECT TAG_NOME, TAG_ID FROM ".DB_PREFIX."tag ORDER BY TAG_NOME ASC ")or(die(mysql_error()));
                    while($tag = mysql_fetch_array($sql)):
                      $tagCod = $tag['TAG_ID'];
                      $tagNome = utf8_encode($tag['TAG_NOME']);
                ?>
                <tr>
                  <td><? echo $tagCod ?></td>
                  <td><? echo $tagNome ?></td>
                  <td>
                     <a href="<?dashRoot();?>pages/tags/tag.php?c=<? echo $tagCod ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                  </td>
                </tr>
                <? endwhile; ?>
               </tbody>

            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>
