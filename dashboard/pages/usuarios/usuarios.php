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
  case 'erro': echo '<script>'.'swal("Erro", "Não foi possível salvar o registro", "error")'.'</script>'; break;
  case 'ja-existe': echo '<script>'.'swal("Aviso", "O login e/ou email informado já está sendo usado por outro usuário do sistema", "warning")'.'</script>'; break;
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Usuários
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
                  <th class="hidden-xs">E-mail</th>
                  <th class="hidden-xs">Login</th>
                  <th class="no-sort" style="width: 30px"></th>
                </tr>
              </thead>

               <tbody>
                <?  $sql = mysql_query("SELECT USU_ID, USU_NOME, USU_EMAIL, USU_LOGIN, USU_BLOCK FROM ".DB_PREFIX."usuario
                  WHERE D_E_L_E_T = 0 ORDER BY USU_ID DESC ")or(die(mysql_error()));
                    while($usuario = mysql_fetch_array($sql)):
                      $usuarioCod = $usuario['USU_ID'];
                      $usuarioNome = utf8_encode($usuario['USU_NOME']);
                      $usuarioEmail = $usuario['USU_EMAIL'];
                      $usuarioLogin = utf8_encode($usuario['USU_LOGIN']);
                      $isBlocked = ($usuario['USU_BLOCK']==1)?true:false;

                ?>
                <tr>
                  <td><? echo $usuarioCod ?></td>
                  <td><? echo $usuarioNome ?><? if($isBlocked){ ?> <i class="fa fa-lock" title="Usuário bloqueado"></i> <? } ?></td>
                  <td class="hidden-xs"><? echo $usuarioEmail ?></td>
                  <td class="hidden-xs"><? echo $usuarioLogin ?></td>
                  <td>
                     <a href="<?dashRoot();?>pages/usuarios/usuario.php?c=<? echo $usuarioCod ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
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
<script>
  $(document).ready(function (){

    function alerta1(){
      swal("Sucesso", "Registro salvo com sucesso", "success");
    }
    
  });
</script>