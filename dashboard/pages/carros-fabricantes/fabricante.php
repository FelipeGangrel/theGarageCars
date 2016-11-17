<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$edit = false;
if($_GET['c']){
  $cod = (int) $_GET['c'];
  $sql = mysql_query("SELECT FAB_NOME FROM ".DBPREF."carro_fabricante WHERE FAB_ID = $cod LIMIT 1")or die(mysql_error());
    $fabricante = mysql_fetch_array($sql);
      $fabricanteId = $cod;
      $fabricanteNome = utf8_encode($fabricante['FAB_NOME']);
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
      Fabricante
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<?dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<?dashRoot();?>pages/carros-fabricantes/fabricantes.php">Fabricantes</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">

        <div class="box">

          <div class="box-body">
            <form action="e-fabricante.php" method="post" data-toggle="validator" role="form">

            <input type="hidden" name="edit" value="<? echo $edit ?>">
            <input type="hidden" name="fabricante" value="<? echo $fabricanteId ?>">
            

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="<? echo $fabricanteNome ?>">
            </div>

          <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
          <? if($edit){ ?>
              <button class="btn btn-danger pull-right remover-categoria" data-url="<?dashRoot();?>pages/categorias/exc-categoria.php?c=<? echo $categoriacod ?>">Remover esta fabricante</button>
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

      
  });
</script>