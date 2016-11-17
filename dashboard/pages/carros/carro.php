<?  
    include_once('../../inc/includes.php');
    include_once('../../inc/head.php');
    include_once('../../inc/header.php');
    include_once('../../inc/sidebar.php');

// $edit = false;
// if($_GET['c']){
//   $cod = (int) $_GET['c'];
//   $sql = mysql_query("SELECT CAT_NOME FROM ".DB_PREFIX."categoria WHERE CAT_ID = $cod")or(die(mysql_error()));
//     $categoria = mysql_fetch_array($sql);
//       $categoriacod = $cod;
//       $categoriaNome = utf8_encode($categoria['CAT_NOME']);
//   $edit = true;
// }



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
      Carro
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li><a href="<?dashRoot();?>pages/home/home.php"><i class="fa fa-home"></i>Home</a></li>
      <li><a href="<?dashRoot();?>pages/carros/carros.php">Carros</a></li>
      <li class="active">Aqui</li>
    </ol>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-8">

        <div class="box">

          <div class="box-body">
            <form action="e-carro.php" method="post" data-toggle="validator" role="form">

            <input type="hidden" name="edit" value="<? echo $edit ?>">
            
            
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="fabricante">Fabricante</label>
                    <select name="fabricante" id="fabricante" class="chosen-select form-control">
                        <option value="">Selecione</option>
                        <?
                            $sql = mysql_query("SELECT * FROM ".DBPREF."carro_fabricante AS fab JOIN ".DBPREF."carro_modelo AS model ON (fab.FAB_ID = model.FAB_ID) GROUP BY fab.FAB_ID ");
                            while($fabricante = mysql_fetch_array($sql)):
                                $fabricanteId = $fabricante['FAB_ID'];
                                $fabricanteNome = utf8_encode($fabricante['FAB_NOME']);
                        ?>

                        <option value="<? echo $fabricanteId ?>"><? echo $fabricanteNome ?></option>

                        <? endwhile; ?>
                    </select>
                </div>

                <div class="col-md-6 form-group">
                    <label for="modelo">Modelo</label>
                    <select name="modelo" id="modelo" class="chosen-select form-control"></select>
                </div>
                
            </div>
            

            <div class="row">

                <div class="col-md-2 form-group">
                    <label for="portas">Portas</label>
                    <input type="number" name="portas" id="portas" min="1" class="form-control">
                </div>

                <div class="col-md-4 form-group">
                    <label for="kilometragem">Kilometragem</label>
                    <input type="number" name="kilometragem" id="kilometragem" min="0" class="form-control">
                </div>

                <div class="col-md-6 form-group com-select-alternativa ">
                    <label for="cor">Cor</label>
                    <input type="text" name="cor-alternativa" id="cor-alternativa" class="hidden select-alternativa select-text form-control">
                    <select name="cor" id="cor" class="form-control">
                        <? 
                            $sql = mysql_query("SELECT * FROM ".DBPREF."cor ");
                            while($cor = mysql_fetch_array($sql)):
                                $corNome = utf8_encode($cor['COR_NOME']);
                        ?>

                        <option value="<? echo $corNome ?>"><? echo $corNome ?></option>

                        <? endwhile; ?>

                        <option value="selectAlternativa">Outra</option>

                    </select>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="cambio">Câmbio</label>
                    <select name="cambio" id="cambio" class="form-control">
                        <? 
                            $sql = mysql_query("SELECT * FROM ".DBPREF."cambio ");
                            while($cambio = mysql_fetch_array($sql)):
                                $cambioId = $cambio['CAM_ID'];
                                $cambioNome = utf8_encode($cambio['CAM_NOME']);
                        ?>

                        <option value="<? echo $cambioId ?>"><? echo $cambioNome ?></option>

                        <? endwhile; ?>
                    </select>
                </div>                

                <div class="col-md-6 form-group">
                    <label for="combustivel">Combustível</label>
                    <select name="combustivel" id="combustivel" class="form-control">
                        <? 
                            $sql = mysql_query("SELECT * FROM ".DBPREF."combustivel ");
                            while($combustivel = mysql_fetch_array($sql)):
                                $combustivelId = $combustivel['COM_ID'];
                                $combustivelNome = utf8_encode($combustivel['COM_NOME']);
                        ?>

                        <option value="<? echo $combustivelId ?>"><? echo $combustivelNome ?></option>

                        <? endwhile; ?>
                    </select>
                </div>

            </div>


          <div class="form-group">
            <button type="submit" class="btn btn-primary">Salvar</button>
          <? if($edit){ ?>
              <button class="btn btn-danger pull-right remover-categoria" data-url="<?dashRoot();?>pages/categorias/exc-categoria.php?c=<? echo $categoriacod ?>">Remover esta categoria</button>
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

    var $selectModelo = $('select#modelo');

    $('select#fabricante').on('change', function(){

        var fabId = $(this).val();
        // Limpando Select

        $selectModelo.empty();

        // $('select#modelo option').each(function(){
        //     $(this).remove();
        // });

        // Povoando Select

        if(fabId){
            $.ajax({
                'url': 'ajax-modelos.php?fabricante='+fabId,
                'method': 'GET'
            }).done(function(data){
                dados = JSON.parse(data);
                $.each(dados, function(index, item){
                    option = '<option value='+item.id+'>'+item.nome+'</option>';
                    $selectModelo.append(option);
                    $selectModelo.trigger("chosen:updated");
                });
            });
        }

    });

    // $('button.remover-categoria').on('click', function(){
    //     url = $(this).data('url');
      
    //     swal({
    //       title: "Tem certeza?",
    //       text: "O registro será removido permanentemente!",
    //       showCancelButton: true,
    //       confirmButtonText: "Sim, remova o registro!",
    //       closeOnConfirm: true 
    //     },function(){
    //       location.href = url;
    //     });

    //     return false;
    // });

      
  });
</script>