<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

$edit = false;
if($_GET['c']){
  $usuarioCod = (int) $_GET['c'];
  $edit = true;
    $sql = mysql_query("SELECT USU_LOGIN, USU_NOME, USU_EMAIL, USU_BLOCK FROM ".DB_PREFIX."usuario WHERE USU_ID = $usuarioCod ");
    $usuario = mysql_fetch_array($sql);
      $usuarioNome = utf8_encode($usuario['USU_NOME']);
      $usuarioEmail = utf8_encode($usuario['USU_EMAIL']);
      $usuarioLogin = utf8_encode($usuario['USU_LOGIN']);
      $isBlocked = ($usuario['USU_BLOCK']==1)?true:false;
}


$alert = $_SESSION['ALERT'];
unset($_SESSION['ALERT']);

switch ($alert) {
  case 'erro-senha': echo '<script>'.'swal("Aviso", "A senha informada no campo Senha atual não corresponde à senha de usuário presente na base de dados", "warning")'.'</script>'; break;
  case 'ja-existe': echo '<script>'.'swal("Aviso", "O login e/ou email informado já está sendo usado por outro usuário do sistema", "warning")'.'</script>'; break;
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuário
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<?dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<?dashRoot();?>pages/usuarios/usuarios.php">Usuários</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12 col-md-6">

        <div class="box">

          <div class="box-body">

            <form action="e-usuario.php" method="post" data-toggle="validator" role="form">

            <input type="hidden" name="edit" value="<? echo $edit ?>">
            <input type="hidden" name="usuario" value="<? echo $usuarioCod ?>">
            
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome completo" value="<? echo $usuarioNome ?>" required>
            </div>

            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" name="login" id="login" class="form-control" placeholder="Login" value="<? echo $usuarioLogin ?>" required>
            </div>

            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="email" class="form-control" placeholder="email" value="<? echo $usuarioEmail ?>" required>
            </div>

            <? if(!$edit){ ?>

            <div class="form-group">
              <label for="senha">Senha</label>
              <input type="password" name="senha" id="senha" class="form-control" required>
            </div>

            <div class="form-group">
              <label for="senhaConfirm">Confirmar senha</label>
              <input type="password" name="senhaConfirm" id="senhaConfirm" class="form-control" data-match="#senha" required>
            </div>

            <? } ?>

            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" <? echo (!$isBlocked)?'checked':''; ?> name="ativo" value="1">Usuário ativo
                </label>
              </div>
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-primary">Salvar</button>
            <? if($edit){ ?>
              <button class="btn btn-danger pull-right remover-usuario" data-url="<?dashRoot();?>pages/usuarios/exc-usuario.php?c=<? echo $usuarioCod ?>">Remover este usuário</button>
            <? } ?>
            </div>
          </form>

          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->

      <?if($edit){?>
      <div class="col-xs-12 col-md-6">

        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Alterar senha de acesso</h3>
          </div>

          <div class="box-body">
            <form action="e-senha.php" method="post" data-toggle="validator" role="form">
              <input type="hidden" name="usuario" value="<? echo $usuarioCod ?>">
              <div class="form-group">
                <label for="senhaAtual">Senha atual</label>
                <input type="password" id="senhaAtual" name="senhaAtual" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="senhaNova">Nova senha</label>
                <input type="password" id="senhaNova" name="senhaNova" class="form-control" required>
              </div>

              <div class="form-group">
                <label for="senhaRepita">Repita a nova senha</label>
                <input type="password" id="senhaRepita" name="senhaRepita" data-match="#senhaNova" class="form-control" required>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>

            </form>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
      <?}?>
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>
<script>
  $(document).ready(function(){
    $('button.remover-usuario').on('click', function(){
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