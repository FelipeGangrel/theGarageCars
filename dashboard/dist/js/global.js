$(function () {

  $(".chosen-select").chosen();
  $('.datepicker').datepicker({
    language: 'pt-BR'
  });
  
  //Tradução dos datatables
  $('#dataTable').DataTable({
      responsive: false,
      fixedColumns: true,
      colReorder: false,
      "order": [[ 0, "desc" ]],
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
     }
  });

  $('input[name^=hora]').inputmask("99:99");

  var url = window.location.origin + window.location.pathname;

  //Menu lataral
  $('.sidebar-menu ul li a').each( function (){
    if( $(this).prop('href') === url){
      $(this).closest('li.treeview').addClass('active');
    }
  });

  $('.sidebar-menu li a').each( function (){
    if( $(this).prop('href') === url){
      $(this).closest('li').addClass('active');
    }
  });

  //Adicionando segundo nível ao menu lateral
  $('.sidebar-menu li ul li ul li a').each( function (){
    if( $(this).prop('href') === url){
      $(this).closest('li').addClass('active');
      $(this).closest('li.second-level').addClass('active');
    }
  });

  //CHECKBOX USADOS NAS GALERIAS
  $(".pretty-checkbox").on('click', function(){
    var $myCheckbox = $(this);
    var $input = $(this).find('input');

    if($myCheckbox.hasClass('selected')){
      $myCheckbox.removeClass('selected');
      $input.prop('checked', false);
    }else{
      $myCheckbox.addClass('selected');
      $input.prop('checked', true);
    }
  });


});