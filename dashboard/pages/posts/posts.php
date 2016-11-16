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
  case 'erro': echo '<script>'.'swal("Erro", "Os campos título, conteúdo e categoria são obrigatórios", "warning")'.'</script>'; break;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Postagens
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<? dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">

        <div class="box">

        <form action="e-post-destaque.php" method="post">

          <div class="box-body">
            <table id="dataTable" class="table table-nowrap table-bordered table-striped">
              <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <!-- <th style="width: 10px"><i class="fa fa-star" data-toggle="tooltip" data-placement="right" title="Exibir esta postagem como destaque?"></i></th> -->
                  <th>Título</th>
                  <th>Categoria</th>
                  <th class="no-sort" style="width: 30px"></th>
                </tr>
              </thead>

              <tbody>
                <?  $sql = mysql_query("SELECT p.POST_ID, p.POST_TITULO, p.POST_DESTAQUE, c.CAT_NOME FROM ".DB_PREFIX."postagem AS p JOIN categoria AS c ON (p.POST_CATEGORIA = c.CAT_ID)
                  WHERE p.D_E_L_E_T = 0 ORDER BY p.POST_DATA DESC ")or(die(mysql_error()));

                    while($post = mysql_fetch_array($sql)):
                      $postCod = $post['POST_ID'];
                      $postCategoria = utf8_encode($post['CAT_NOME']);
                      $postTitulo = utf8_encode($post['POST_TITULO']);
                      $postDestaque = ($post['POST_DESTAQUE'])?true:false;
                ?>
                <tr>
                  <td><? echo $postCod ?></td>
                  <!-- <td><input type="checkbox" name="selecionados[]" value="<? echo $postCod ?>" <? echo ($postDestaque)?'checked':''; ?> ></td> -->
                  <td><? echo $postTitulo ?></td>
                  <td><? echo $postCategoria ?></td>
                  <td>
                     <a href="<?dashRoot();?>pages/posts/post.php?c=<? echo $postCod ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
                  </td>
                </tr>
                <? endwhile; ?>
               </tbody>

            </table>
            <!-- <button type="submit" class="btn btn-primary">Exibir como destaque</button> -->
          </div><!-- /.box-body -->

        </form>
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>