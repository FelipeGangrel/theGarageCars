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
      Categorias
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

              <table id="modelos" class="table table-nowrap table-bordered table-striped">

                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Fabricante</th>
                    <th>Modelo</th>
                    <th class="no-sort" style="width: 30px"></th>
                  </tr>
                </thead>

                <thead class="hidden-md filter">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><button class="btn limpar-filtro btn-default btn-block" title="limpar filtros"><i class="fa fa-times"></i></button></th>
                </thead>


              </table>

            </div><!-- /.box-body -->


        </div><!-- /.box -->

      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

</div><!-- /.content-wrapper -->

<?  include_once('../../inc/footer.php'); ?>
<script>
  $(function(){

    var table = $('#modelos').DataTable({
      'ajax': {
        'url': 'ssp-modelos.php'
      },
      'order': [[1, 'asc']],
      'pageLength': 25,
      oLanguage: {
         "sEmptyTable": "Nenhum registro encontrado",
         "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
         "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
         "sInfoFiltered": "(Filtrados de _MAX_ registros)",
         "sInfoPostFix": "",
         "sInfoThousands": ".",
         "sLengthMenu": "_MENU_ <span class='hidden-xs'>resultados por página</span>",
         "sLoadingRecords": "Carregando...",
         "sProcessing": "Processando...",
         "sZeroRecords": "Nenhum registro encontrado",
         "sSearch": "Pesquisar",
         "oPaginate": {
             "sNext": "Próximo",
             "sPrevious": "Anterior",
             "sFirst": "Primeiro",
             "sLast": "Último"
         },
         "oAria": {
             "sSortAscending": ": Ordenar colunas de forma ascendente",
             "sSortDescending": ": Ordenar colunas de forma descendente"
         }
      },

      initComplete: function () {

        var colunasFiltro = [1];

        $("#modelos thead.filter th").each( function ( i ) {

          if(colunasFiltro.indexOf(i) != -1){ 

            var select = $('<select class="select-filtro filtro-'+i+'" style="width:100%; padding: 5px; margin-right: -20px" ><option value="">Todos</option></select>')
                .appendTo( $(this).empty() )
                .on( 'change', function () {

                    var val = $(this).val();

                    table.column( i ) 
                        .search( val ? '^'+$(this).val()+'$' : val, true, false )
                        .draw();
                } );

            table.column( i ).data().unique().sort().each( function ( d, j ) {
              select.addClass('form-control btn btn-block btn-default');
                select.append( '<option value="'+d+'">'+d+'</option>' );
            } );

          } 
        });

      }

    });


  });
</script>