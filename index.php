<? 
  include 'conn/conn.php';
  include 'inc/funcoes.php';
  include 'inc/detecta-mobile.php';
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
      <div class="container w1170">
        <div class="wrapper">
          <div class="login-area">
            Olá Entre ou Cadastre-se
          </div>
        </div>
      </div>
    </nav>


    <script src="<? echo SITE ?>js/global.js"></script>

</body>


</html>