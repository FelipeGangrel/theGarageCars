<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$edit = false;


$sql = mysql_query("SELECT PER_BIO, PER_AVATAR, PER_ARTE FROM ".DB_PREFIX."perfil WHERE PER_ID = 1")or(die(mysql_error()));

if(mysql_num_rows($sql)){
  $edit = true;
  
  $perfil = mysql_fetch_array($sql);
    $perBio = utf8_encode($perfil['PER_BIO']);
    $perAvatar = $perfil['PER_AVATAR'];
    $perArte   = $perfil['PER_ARTE'];
}




$alert = $_SESSION['ALERT'];
unset($_SESSION['ALERT']);

switch ($alert) {
  case 'sucesso': echo '<script>'.'swal("Sucesso", "Registro salvo com sucesso", "success")'.'</script>'; break;
}

?>




<!-- Modal -->
<div class="modal fade" id="arteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Imagem</h4>
      </div>
      <div class="modal-body">
        <div class="splash">
          <div class="image-editor image-editor-arte">
            <span class="btn btn-primary fileinput-button relative">
              <span>Selecionar arquivo</span>
              <input type="file" class="cropit-image-input" accept="image/*">
            </span>
            <p class="text-center">
              <small>A Imagem deve ter no mínimo 768 x 768 pixels e estar em formato jpg, png ou gif</small>
            </p>
            <div class="cropit-image-preview-container">
              <div class="cropit-image-preview arte"></div>
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
        <button type="button" class="btn btn-primary salvar-arte" data-dismiss="modal">Definir como arte do perfil</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Imagem</h4>
      </div>
      <div class="modal-body">
        <div class="splash">
          <div class="image-editor image-editor-avatar">
            <span class="btn btn-primary fileinput-button relative">
              <span>Selecionar arquivo</span>
              <input type="file" class="cropit-image-input" accept="image/*">
            </span>
            <p class="text-center">
              <small>A Imagem deve ter no mínimo 200 x 200 pixels e estar em formato jpg, png ou gif</small>
            </p>
            <div class="cropit-image-preview-container">
              <div class="cropit-image-preview avatar img-circle"></div>
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
        <button type="button" class="btn btn-primary salvar-avatar" data-dismiss="modal">Definir como avatar</button>
      </div>
    </div>
  </div>
</div>






<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Perfil
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

      <div class="col-xs-12 col-md-6">

        <div class="box">

          <div class="box-body">
            <form action="e-perfil.php" method="post" data-toggle="validator" role="form">

            <input type="hidden" name="edit" value="<? echo $edit ?>">
            <input type="hidden" name="avatar" value="">
            <input type="hidden" name="arte" value="">

            

            <? if($perAvatar){ ?>
              <center><img src="<?siteRoot();?>perfil/<? echo $perAvatar ?>" class="img-responsive img-circle img-thumbnail imagem-atual-avatar" style="margin-bottom: 10px"></center>
            <? } ?>
            
            <center><img src="" class="img-responsive img-circle img-thumbnail imagem-temporaria-avatar" width="200" height="200" style="margin-bottom: 10px">
            </center>

            <div class="form-group">
               <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#avatarModal"><i class="fa fa-image"></i> Avatar</button>
            </div>

            <? if($perArte){ ?>
              <center><img src="<?siteRoot();?>perfil/<? echo $perArte ?>" class="img-responsive img-thumbnail imagem-atual-arte" style="margin-bottom: 10px"></center>
            <? } ?>
            
            <center><img src="" class="img-responsive img-thumbnail imagem-temporaria-arte" width="768" height="768" style="margin-bottom: 10px">
            </center>

            <div class="form-group">
               <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#arteModal"><i class="fa fa-image"></i> Arte do perfil</button>
            </div>

            <div class="form-group">
              <label for="bio">Bio</label>
              <textarea name="bio" id="bio" class="form-control" rows="5"><? echo $perBio ?></textarea>
            </div>

            


            <div class="form-group">
              <button type="submit" class="btn btn-primary">Salvar</button>
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


    perArte = '<?siteRoot();?>'+'perfil/'+'<?echo $perArte ?>';

    $('img.imagem-temporaria-arte').hide();

    $('.image-editor-arte').cropit({
      exportZoom: 2,
      smallImage: 'stretch', // 'stretch', 'allow' or 'reject'
      imageBackground: false,
      imageBackgroundBorderWidth: 0,
      imageState: {
        src: perArte
      }
    });

    $('.salvar-arte').click(function(event) {
      var arte = $('.image-editor-arte').cropit('export');
      $('input[name=arte]').val(arte);
      $('img.imagem-temporaria-arte').show().attr('src',arte);
      $('img.imagem-atual-arte').hide();

      event.preventDefault();
    });



    perAvatar = '<?siteRoot();?>'+'perfil/'+'<?echo $perAvatar ?>';

    $('img.imagem-temporaria-avatar').hide();

    $('.image-editor-avatar').cropit({
      exportZoom: 1,
      smallImage: 'stretch', // 'stretch', 'allow' or 'reject'
      imageBackground: false,
      imageBackgroundBorderWidth: 0,
      imageState: {
        src: perAvatar
      }
    });

    $('.salvar-avatar').click(function(event) {
      var avatar = $('.image-editor-avatar').cropit('export');
      $('input[name=avatar]').val(avatar);
      $('img.imagem-temporaria-avatar').show().attr('src',avatar);
      $('img.imagem-atual-avatar').hide();

      event.preventDefault();
    });



  });
</script>