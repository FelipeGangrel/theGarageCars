$(document).on('ready', function(){

    var site = $("[site-url]").val() || null;
    var urlAtual = window.location.origin + window.location.pathname;
    
    console.log(`Ready to rock em ${site}`);


    // Mascaras

    $('[data-mask="cep"]').mask('99999-999');
    $('[data-mask="hora"]').mask('99:99');
    $('[data-mask="telefone"]').mask('(99) 9999-9999?9');
    $('[data-mask="cpf"]').mask('999.999.999-99');
    $('[data-mask="cnpj"]').mask('99.999.999/9999-99');
    $('[data-mask="data"]').mask('99/99/9999');

    // Comportamento ao clicar em um elemento com o atributo data-scroll

    $('[data-scroll]').on('click', function (event){
        rolarPara = $(this).data('scroll');
        offset = $(this).data('offset') || 105;

        if( $(rolarPara)[0] ){
            $('html, body').animate({
                scrollTop: $(rolarPara).offset().top - offset
            }, 1000);
        }

        event.preventDefault();
    });


    // Comportamento dos carousels usando swipe

    $(".carousel").swipe({
      swipe: function(event, direction, distance, duration, fingerCount, fingerData) {

        if (direction == 'left') {
          $(this).carousel('next');
        }
        if (direction == 'right') {
          $(this).carousel('prev');
        }
      },
      allowPageScroll:"vertical"
    });




    // Mensagens ao usuário

    if( checaLocalStorage() && localStorage.aviso) {

        var aviso = localStorage.getItem("aviso");
        localStorage.removeItem("aviso");

        switch(aviso) {
            case 'erro-recaptcha': swal({
                title:"Atenção",
                text:"Você nao marcou a opção 'Não sou um robô' antes de votar ",
                html:true, type:"error"
            });break;

        }

    }


});

checaLocalStorage = function(){
    if(typeof(Storage) !== "undefined"){ return true }else{ return false }
}