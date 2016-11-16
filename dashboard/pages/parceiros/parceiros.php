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
  case 'erro-tamanho': echo '<script>'.'swal("Aviso", "O arquivo enviado é muito grande", "warning")'.'</script>'; break; 
  case 'erro-tipo-arquivo': echo '<script>'.'swal("Aviso", "O formato do arquivo é inválido", "warning")'.'</script>'; break;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Parceiros
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

          <div class="box-header">
            <h3 class="box-title">Todos os parceiros</h3>
          </div>

          <div class="box-body">
            <div class="row">
              <? $sql = mysql_query("SELECT PAR_ID, PAR_IMAGEM FROM ".DB_PREFIX."parceiro WHERE D_E_L_E_T = 0 ORDER BY PAR_ID DESC ")or(die(mysql_error()));
                while($parceiro = mysql_fetch_array($sql)){
                  $parceiroId = $parceiro['PAR_ID'];
                  $parceiroImagem = $parceiro['PAR_IMAGEM'];
              ?>
                <div class="col-md-3 col-xs-6 galeria-item">
                  <a href="<?dashRoot();?>pages/parceiros/parceiro.php?c=<? echo $parceiroId ?>">
                    <img src="<?siteRoot();?>parceiros/<? echo $parceiroImagem ?>" alt="" class="img-responsive img-thumbnail">
                  </a>  
                  <div class="pretty-checkbox">
                    <input type="checkbox" name="selecao[]" value="<? echo $parceiroId ?>">
                  </div>

                </div>
              <? } ?>

            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="form-group">
                  <button class="btn btn-danger remover-banners pull-right">Remover</button>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->

        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>
<script>
$(function () {

  var base = '<?dashRoot();?>';

  //Removendo banners
  $('button.remover-banners').on('click', function(){
    var selecionados = [];
    $.each($("input[name^='selecao']:checked"), function(){
        selecionados.push($(this).val());
    });

    swal({
      title: "Tem certeza?",
      text: "Os banners selecionados serão removidas permanentemente!",
      showCancelButton: true,
      confirmButtonText: "Sim, remova os banners!",
      closeOnConfirm: false 
    }, 
    function(){
      $.post(base+'pages/parceiros/exc-parceiro.php', {imagens: selecionados, acao: 'remove'}).done(function(data){
         swal({
          title: "Pronto!",
          text: "Banners removidos com sucesso!",
          type:'success',
          closeOnCancel: false
        }, function(){
            location.reload();
        });
      });
    });
    return false;
  });

});
</script>