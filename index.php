<?
  include 'conn/conn.php';
  include('inc/funcoes.php');
  include('inc/detecta-mobile.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>The Garage Cars</title>

    <!-- Bootstrap -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="<? echo SITE ?>css/style.css?v=<? echo uniqid() ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <nav id="navbar-principal">

      <div class="linha-principal">
        <div class="container w1170">
          <div class="wrapper">
            <div class="login-area">
              Olá! <a href="#">entre</a> ou <a href="#">cadastre-se</a>
            </div>
            <div class="menu-area">

              <div class="menu-toggle">
                <i class="fa fa-bars"></i>
              </div>

              <div class="menu">
                <ul class="list-unstyled menu">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Leilão</a></li>
                  <li><a href="#">Ofertas de veículos</a></li>
                  <li><a href="#">Vender</a></li>
                  <li><a href="#">Auto peças</a></li>
                  <li><a href="#">Choperia</a></li>
                </ul>
              </div>

            </div>
            <div class="logo-area">
              <img src="<? echo SITE ?>img/logo.png" alt="">
            </div>
          </div>
        </div>
      </div>

      <div class="linha-busca">
        <div class="container w1170">
          <div class="wrapper">

            <form action="#" method="post">

              <input type="hidden" name="busca-filtro" id="busca-filtro">
          
              <div class="row">
                <div class="col-sm-8 campos">
                  <div class="input-group">

                    <input type="text" name="busca" id="busca" placeholder="Pesquisar..." class="form-control">
                    <div class="opcao-texto" data-element="busca-filtro">Opção selecionada</div>
                    
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="caret"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right busca-opcoes">
                        <li><a href="#" data-bind="busca-filtro" data-value="Opção 1">Opção 1</a></li>
                        <li><a href="#" data-bind="busca-filtro" data-value="Opção 2">Opção 2</a></li>
                        <li><a href="#" data-bind="busca-filtro" data-value="Opção 3">Opção 3</a></li>
                      </ul>
                    </div>

                  </div>
                </div>

                <div class="col-md-4 botoes">
                  <ul class="list-unstyled">
                    <li><button type="button" class="btn btn-laranja">Pesquisar</button></li>
                    <li><a href="#">Pesquisa avançada</a></li>
                  </ul>
                  
                  
                </div>

              </div>

            </form>

          </div>
        </div>
      </div>


    </nav>

    <main>
      <div id="carousel-id" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
              <li data-target="#carousel-id" data-slide-to="0" class=""></li>
              <li data-target="#carousel-id" data-slide-to="1" class=""></li>
              <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
          </ol>
          <div class="carousel-inner">
              <div class="item">
                  <img data-src="holder.js/900x500/auto/#777:#7a7a7a/text:First slide" alt="First slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzc3NyI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojN2E3YTdhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+Rmlyc3Qgc2xpZGU8L3RleHQ+PC9zdmc+">
                  <div class="container">
                      <div class="carousel-caption">
                          <h1>Example headline.</h1>
                          <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
                          <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
                      </div>
                  </div>
              </div>
              <div class="item">
                  <img data-src="holder.js/900x500/auto/#666:#6a6a6a/text:Second slide" alt="Second slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzY2NiI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNmE2YTZhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+U2Vjb25kIHNsaWRlPC90ZXh0Pjwvc3ZnPg==">
                  <div class="container">
                      <div class="carousel-caption">
                          <h1>Another example headline.</h1>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                          <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                      </div>
                  </div>
              </div>
              <div class="item active">
                  <img data-src="holder.js/900x500/auto/#555:#5a5a5a/text:Third slide" alt="Third slide" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI5MDAiIGhlaWdodD0iNTAwIj48cmVjdCB3aWR0aD0iOTAwIiBoZWlnaHQ9IjUwMCIgZmlsbD0iIzU1NSI+PC9yZWN0Pjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjQ1MCIgeT0iMjUwIiBzdHlsZT0iZmlsbDojNWE1YTVhO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1zaXplOjU2cHg7Zm9udC1mYW1pbHk6QXJpYWwsSGVsdmV0aWNhLHNhbnMtc2VyaWY7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+VGhpcmQgc2xpZGU8L3RleHQ+PC9zdmc+">
                  <div class="container">
                      <div class="carousel-caption">
                          <h1>One more for good measure.</h1>
                          <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                          <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                      </div>
                  </div>
              </div>
          </div>
          <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </main>

    
    



    <script src="<? echo SITE ?>js/global.js"></script>

</body>


</html>