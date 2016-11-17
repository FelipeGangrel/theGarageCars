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
}

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Carros
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
                    <th>Fabricante</th>
                    <th>Modelo</th>
                    <th>Cor</th>
                    <th class="no-sort" style="width: 30px"></th>
                  </tr>
                </thead>

                 <tbody>
                  <?  
                  $sql = mysql_query("SELECT car.CAR_ID, car.CAR_COR, fab.FAB_NOME, model.MOD_NOME FROM ".DBPREF."carro AS car JOIN ".DBPREF."carro_fabricante AS fab ON (car.CAR_FABRICANTE = fab.FAB_ID) JOIN ".DBPREF."carro_modelo AS model ON (car.CAR_MODELO = model.MOD_ID) ")or die(mysql_error());

                  while($carro = mysql_fetch_array($sql)):
                    $carroId = $carro['CAR_ID'];
                    $carroCor = utf8_encode($carro['CAR_COR']);
                    $carroModelo = utf8_encode($carro['MOD_NOME']);
                    $carroFabricante = utf8_encode($carro['FAB_NOME']);
                  ?>
                  <tr>
                    <td><? echo $carroId ?></td>
                    <td><? echo $carroFabricante ?></td>
                    <td><? echo $carroModelo ?></td>
                    <td><? echo $carroCor ?></td>
                    <td>
                       <a href="<?dashRoot();?>pages/carros/carro.php?c=<? echo $carroId ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Editar</a>
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