<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$edit = false;
if($_GET['c']){
  $parceiroCod = (int) $_GET['c'];
  $sql = mysql_query("SELECT PAR_NOME, PAR_LINK, PAR_IMAGEM
    FROM ".DB_PREFIX."parceiro WHERE PAR_ID = $parceiroCod ")or(die(mysql_error()));

  $parceiro = mysql_fetch_array($sql);
    $parceiroNome = utf8_encode($parceiro['PAR_NOME']);
    $parceiroLink = $parceiro['PAR_LINK'];
    $parceiroImagem = $parceiro['PAR_IMAGEM'];

  $edit = true;
}

// $alert = $_SESSION['ALERT'];
// unset($_SESSION['ALERT']);

// switch ($alert) {
//   case 'erro-tamanho': echo '<script>'.'swal("Aviso", "O arquivo enviado é muito grande", "warning")'.'</script>'; break;
//   case 'erro-tipo-arquivo': echo '<script>'.'swal("Aviso", "O formato do arquivo é inválido", "warning")'.'</script>'; break;
// }


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Parceiro
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<? dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<? dashRoot();?>pages/parceiros/parceiros.php"></i>Parceiros</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12 col-md-6">
        <div class="box">
        
          <div class="box-body">
            <form action="e-parceiro.php" method="post" data-toggle="validator" role="form" <?if(!$edit){?>onsubmit="return verificaImagem();"<?}?>>

              <input type="hidden" name="edit" value="<? echo $edit ?>">
              <input type="hidden" name="parceiro" value="<? echo $parceiroCod ?>">
              <input type="hidden" name="imagemThumb" id="imagemThumb">

              <div class="form-group">
                <label for="nome">Nome do parceiro</label>
                <input type="text" name="nome" id="nome" class="form-control" required value="<? echo $parceiroNome ?>">
              </div>

              <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control" required value="<? echo $parceiroLink ?>">
              </div>

              <div class="form-group">
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-image"></i> Logo do parceiro</button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Imagem</h4>
                      </div>
                      <div class="modal-body">
                        <div class="splash">
                          <div class="image-editor">
                            <span class="btn btn-primary fileinput-button relative">
                              <span>Selecionar arquivo</span>
                              <input type="file" class="cropit-image-input" accept="image/*">
                            </span>
                            <p class="text-center">
                              <small>A Imagem deve ter no mínimo 275 x 275 pixels e estar em formato jpg, png ou gif</small>
                            </p>
                            <div class="cropit-image-preview-container">
                              <div class="cropit-image-preview parceiro"></div>
                            </div>
                            <div class="range">
                              <div class="icone"><i class="fa fa-image"></i></div>
                              <div class="controle"><input type="range" class="cropit-image-zoom-input"></div>
                              <div class="icone"><i class="fa fa-image fa-2x"></i></div>
                              <div class="clear"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" class="btn btn-primary salvar" data-dismiss="modal">Definir como logo do parceiro</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal -->
              </div>

              <div class="form-group">
                <? if($parceiroImagem){ ?>
                  <center><img src="<?siteRoot();?>parceiros/<? echo $parceiroImagem ?>" class="img-responsive img-thumbnail imagem-atual" style="margin-bottom: 10px"></center>
                <? } ?>
                <center><img src="" class="img-responsive img-thumbnail imagem-temporaria" style="margin-bottom: 10px">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
              <? if($edit){ ?>
                  <button class="btn btn-danger pull-right remover-parceiro" data-url="<?dashRoot()?>pages/banners/exc-parceiro.php?c=<? echo $bannerCod ?>">Remover este banner</button>
              <? } ?>
              </div>

            </form>
          </div><!-- /.box-body -->
    
        </div><!-- /.box -->
      </div><!-- /.col -->

    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->
<script src="<?dashRoot();?>plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<?  include_once('../../inc/footer.php'); ?>
<script>
  $(document).ready(function(){

    imgAtual = '<?siteRoot();?>'+'parceiros/'+'<?echo $parceiroImagem ?>';

    //console.log(imgAtual);

    $('img.imagem-temporaria').hide();

    $('.image-editor').cropit({
      exportZoom: 1, // de 400 x 400 teremos 480 x 480
      smallImage: 'reject', // 'stretch', 'allow' or 'reject'
      imageBackground: false,
      imageBackgroundBorderWidth: 0,
      imageState: {
        src: imgAtual
      }
    });

    $('.salvar').click(function(event) {
      var imageData = $('.image-editor').cropit('export');
      $('input[name=imagemThumb]').val(imageData);
      $('img.imagem-temporaria').show().attr('src',imageData);
      $('img.imagem-atual').hide();

      event.preventDefault();
    });



    $('button.remover-banner').on('click', function(){
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

  function verificaImagem(){
    var campo = $('#imagemThumb').val();
    if(campo==''){
      swal({
        title: "Aviso",
        text: "É preciso selecionaar uma imagem",
        type: "warning",
        closeOnConfirm: true
      });
      return false;
    }
  }

</script>
