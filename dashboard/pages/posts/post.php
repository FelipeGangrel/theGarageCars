<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$edit = false;
if($_GET['c']){
  $cod = (int) $_GET['c'];
  $sql = mysql_query("SELECT POST_TITULO, POST_CATEGORIA, POST_CONTEUDO, POST_IMAGEM FROM ".DB_PREFIX."postagem WHERE POST_ID = $cod")or(die(mysql_error()));
  $post = mysql_fetch_array($sql);
    $postCod = $cod;
    $postTitulo = utf8_encode($post['POST_TITULO']);
    $postCategoria = (int) $post['POST_CATEGORIA'];
    $postConteudo = utf8_encode($post['POST_CONTEUDO']);
    $postImagem = $post['POST_IMAGEM'];

  $sql = mysql_query("SELECT postTag.TAG_ID, tag.TAG_NOME FROM ".DB_PREFIX."postagem_tag AS postTag 
    JOIN ".DB_PREFIX."tag AS tag ON (tag.TAG_ID = postTag.TAG_ID)
    WHERE postTag.POST_ID = $cod ORDER BY tag.TAG_NOME ASC ");

  $tagsDoPost = array();
  while($tag = mysql_fetch_array($sql)){
    array_push( $tagsDoPost, utf8_encode($tag['TAG_NOME']) ); 
  }

  $tagsDoPost = implode(",", $tagsDoPost);
  $edit = true;
}


$sql = mysql_query("SELECT TAG_NOME FROM ".DB_PREFIX."tag ORDER BY TAG_NOME ASC");
$tagsDoBanco = array();
while($tag = mysql_fetch_array($sql)){
  array_push( $tagsDoBanco, utf8_encode($tag['TAG_NOME']) );
}
$tagsDoBanco = json_encode($tagsDoBanco);

$alert = $_SESSION['ALERT'];
unset($_SESSION['ALERT']);

switch ($alert) {
  case 'sucesso': echo '<script>'.'swal("Sucesso", "Registro salvo com sucesso", "success")'.'</script>'; break;
}

?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>Postagem<small></small></h1>
    <ol class="breadcrumb">
      <li><a href="<? dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<? dashRoot();?>pages/posts/posts.php">Postagens</a></li>
      <li class="active">Aqui</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-xs-12 col-md-12">
        <div class="box">
              <div class="box-body">

                <form action="e-post.php" method="post" data-toggle="validator" role="form">

                  <div class="row">
                  
                    <div class="col-md-9 col-xs-12">
                      <input type="hidden" name="edit" value="<? echo $edit ?>">
                      <input type="hidden" name="postagem" value="<? echo $postCod ?>">
                      <input type="hidden" name="imagemThumb" style="width: 100%">
                    
                      
                        <label for="titulo">Título</label>

                        <div class="row">
                        
                          <div class="col-md-9 col-xs-12">
                            <div class="form-group">
                              <input type="text" name="titulo" id="titulo" class="form-control" placeholder="Título da postagem" value="<? echo $postTitulo ?>" required>
                            </div>
                          </div>

                          <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                              <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal"><i class="fa fa-image"></i> Imagem destaque</button>
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
                                            <small>A Imagem deve ter no mínimo 960 x 960 pixels e estar em formato jpg, png ou gif</small>
                                          </p>
                                          <div class="cropit-image-preview-container">
                                            <div class="cropit-image-preview noticia"></div>
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
                                      <button type="button" class="btn btn-primary salvar" data-dismiss="modal">Definir como imagem destaque</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- Modal -->
                            </div>
                          </div>

                        </div>

                        


                      <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" id="categoria" name="categoria" class="form-control" required>
                            <option value="">Selecione a categoria</option>
                          <?  $sql = mysql_query("SELECT CAT_ID, CAT_NOME FROM ".DB_PREFIX."categoria ORDER BY CAT_NOME ASC ")or(die(mysql_error())); 
                              
                              while($categoria = mysql_fetch_array($sql)){
                                $categoriaCod = $categoria['CAT_ID'];
                                $categoriaNome = utf8_encode($categoria['CAT_NOME']);
                          ?>
                            <option <? echo ($postCategoria == $categoriaCod)?'selected':''; ?> value="<? echo $categoriaCod ?>"><? echo $categoriaNome ?></option>
                          <? } ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <!-- <label for="titulo">Conteúdo</label> -->
                        <textarea name="conteudo" id="conteudo" class="form-control"><? echo $postConteudo ?></textarea>
                      </div>

                      <div class="form-group">
                        <label for="tags">Tags</label><br />
                        <input type="text" name="tags" id="tags" class="bootstrap-tagsinput form-control" value="<? echo $tagsDoPost ?>"><br />
                        <small>Separe as tags com vírgula</small>
                      </div>
                    </div><!-- col -->

                    <div class="col-md-3 col-xs-12">
                      <? if($postImagem){ ?>
                        <center><img src="<?siteRoot();?>img/posts/featured/<? echo $postImagem ?>" class="img-responsive img-thumbnail imagem-atual" style="margin-bottom: 10px"></center>
                      <? } ?>
                      
                      <center><img src="" class="img-responsive img-thumbnail imagem-temporaria" width="370" height="260" style="margin-bottom: 10px">
                      </center>
                      
                    </div><!-- col -->

                  </div><!-- row -->

                  <div class="row">
                    <div class="col-md-9 col-xs-12">
                      <div class="visible-sm"><br></div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                      <? if($edit){ ?>
                        <button class="btn btn-danger pull-right remover-postagem" data-url="<?dashRoot();?><? echo 'pages/posts/exc-post.php?c='.$postCod ?>">Remover esta postagem</button>
                      <? } ?>
                      </div>
                    </div>
                  </div><!-- row -->

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

    imgAtual = '<?siteRoot();?>'+'img/posts/featured/'+'<?echo $postImagem ?>';

    console.log(imgAtual);

    $('img.imagem-temporaria').hide();

    $('.image-editor').cropit({
      exportZoom: 3,
      smallImage: 'stretch', // 'stretch', 'allow' or 'reject'
      imageBackground: false,
      imageBackgroundBorderWidth: 0,
      imageState: {
        //src: 'http://lorempixel.com/800/600/',
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

  


    $('#tags').tagsinput({
      tagClass: 'label label-primary',
        typeahead: {
          source: <? echo $tagsDoBanco ?>
        }
    });

    $('#tags').on('change', function(){
      setTimeout(limpa, 1);
    });

    function limpa(){
      $("div.bootstrap-tagsinput input[type=text]").val("");
    }

    $('button.remover-postagem').on('click', function(){
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



      tinymce.init({
        selector: "textarea",
        theme: "modern",
        skin:"light",
        language : "pt_BR",
        height: 500,
        plugins: [
             "advlist autolink link image lists charmap print preview hr anchor pagebreak",
             "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
             "table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
       ],
       //toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",

       toolbar1: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
       image_advtab: true ,
       
       external_filemanager_path:"<? echo SITE ?>dashboard/plugins/tinymce/js/tinymce/plugins/filemanager/",
       filemanager_title:"Responsive Filemanager" ,
       external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"}
     });

  });
</script>