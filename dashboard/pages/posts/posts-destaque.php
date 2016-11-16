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

$posicao1 = mysql_result(mysql_query("SELECT POST_ID FROM ".DB_PREFIX."postagem WHERE POST_POSICAO = 1 "), 0);
$posicao2 = mysql_result(mysql_query("SELECT POST_ID FROM ".DB_PREFIX."postagem WHERE POST_POSICAO = 2 "), 0);
$posicao3 = mysql_result(mysql_query("SELECT POST_ID FROM ".DB_PREFIX."postagem WHERE POST_POSICAO = 3 "), 0);
$posicao4 = mysql_result(mysql_query("SELECT POST_ID FROM ".DB_PREFIX."postagem WHERE POST_POSICAO = 4 "), 0);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Postagens em destaque
      <small><? echo $posicao1 ?></small>
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

            <div class="row">
              <div class="col-md-6">
                
                <div class="form-group">
                  <label for="posicao1">Primeiro quadro</label>
                  <select name="posicao1" id="posicao1" class="form-control chosen-select">
                    <?
                      $sql = mysql_query("SELECT *, DATE_FORMAT(POST_DATA, '%d/%m/%Y') AS DATA FROM ".DB_PREFIX."postagem WHERE D_E_L_E_T = 0 ");
                      while($post = mysql_fetch_array($sql)):
                        $postId = $post['POST_ID'];
                        $postTitulo = utf8_encode($post['POST_TITULO']);
                        $postaData = $post['DATA'];
                    ?>
                      <option <? echo ($postId == $posicao1)?"selected":""; ?> value="<? echo $postId ?>"><? echo "$postTitulo [$postaData]" ?></option>
                    <? endwhile; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="posicao2">Segundo quadro</label>
                  <select name="posicao2" id="posicao2" class="form-control chosen-select">
                    <?
                      $sql = mysql_query("SELECT *, DATE_FORMAT(POST_DATA, '%d/%m/%Y') AS DATA FROM ".DB_PREFIX."postagem WHERE D_E_L_E_T = 0 ");
                      while($post = mysql_fetch_array($sql)):
                        $postId = $post['POST_ID'];
                        $postTitulo = utf8_encode($post['POST_TITULO']);
                        $postaData = $post['DATA'];
                    ?>
                      <option <? echo ($postId == $posicao2)?"selected":""; ?> value="<? echo $postId ?>"><? echo "$postTitulo [$postaData]" ?></option>
                    <? endwhile; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="posicao3">Terceiro quadro</label>
                  <select name="posicao3" id="posicao3" class="form-control chosen-select">
                    <?
                      $sql = mysql_query("SELECT *, DATE_FORMAT(POST_DATA, '%d/%m/%Y') AS DATA FROM ".DB_PREFIX."postagem WHERE D_E_L_E_T = 0 ");
                      while($post = mysql_fetch_array($sql)):
                        $postId = $post['POST_ID'];
                        $postTitulo = utf8_encode($post['POST_TITULO']);
                        $postaData = $post['DATA'];
                    ?>
                      <option <? echo ($postId == $posicao3)?"selected":""; ?> value="<? echo $postId ?>"><? echo "$postTitulo [$postaData]" ?></option>
                    <? endwhile; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="posicao4">Quarto quadro</label>
                  <select name="posicao4" id="posicao4" class="form-control chosen-select">
                    <?
                      $sql = mysql_query("SELECT *, DATE_FORMAT(POST_DATA, '%d/%m/%Y') AS DATA FROM ".DB_PREFIX."postagem WHERE D_E_L_E_T = 0 ");
                      while($post = mysql_fetch_array($sql)):
                        $postId = $post['POST_ID'];
                        $postTitulo = utf8_encode($post['POST_TITULO']);
                        $postaData = $post['DATA'];
                    ?>
                      <option <? echo ($postId == $posicao4)?"selected":""; ?> value="<? echo $postId ?>"><? echo "$postTitulo [$postaData]" ?></option>
                    <? endwhile; ?>
                  </select>
                </div>

              </div>

              <div class="col-md-6">
                <img src="<?dashRoot();?>img/guia.jpg" class="img-responsive" alt="">
              </div>

            </div>


            <button type="submit" class="btn btn-primary">Salvar</button>
          </div><!-- /.box-body -->

        </form>

        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>