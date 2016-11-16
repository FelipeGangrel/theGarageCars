<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$edit = false;
if($_GET['c']){
  $cod = (int) $_GET['c'];
  $sql = mysql_query("SELECT TAG_NOME FROM ".DB_PREFIX."tag WHERE TAG_ID = $cod")or(die(mysql_error()));
    $tag = mysql_fetch_array($sql);
      $tagcod = $cod;
      $tagNome = utf8_encode($tag['TAG_NOME']);
  $edit = true;
}


$alert = $_SESSION['ALERT'];
unset($_SESSION['ALERT']);

switch ($alert) {
  case 'ja-existe': echo '<script>'.'swal("Aviso", "Este registro já se encontra cadastrado no sistema", "warning")'.'</script>'; break;  
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
      <li><a href="<?dashRoot();?>pages/tags/tags.php">Tags</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12 col-md-6">

        <div class="box">

          <div class="box-body">
            <form action="e-tag.php" method="post" data-toggle="validator" role="form">

              <input type="hidden" name="edit" value="<? echo $edit ?>">
              <input type="hidden" name="tag" value="<? echo $tagcod ?>">
              
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome da tag" value="<? echo $tagNome ?>" required>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
              <? if($edit){ ?>
                  <button class="btn btn-danger pull-right remover-tag" data-url="<?dashRoot();?>pages/tags/exc-tag.php?c=<? echo $tagcod ?>">Remover esta tag</button>
              <? } ?>
              </div>

            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>
<script>
  $(document).ready(function(){
    $('button.remover-tag').on('click', function(){
        url = $(this).data('url');
        swal({
          title: "Tem certeza?",
          text: "O registro será removido permanentemente!",
          showCancelButton: true,
          confirmButtonText: "Sim, remova o registro!",
          closeOnConfirm: true 
        },function(){
          location.href = url;
        });

        return false;
      });
  });
</script>