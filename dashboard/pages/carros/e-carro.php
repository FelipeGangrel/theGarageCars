<?
include_once('../../inc/includes.php');

$fabricante = (int) $_POST['fabricante'];
$modelo = (int) $_POST['modelo'];
$portas = (int) $_POST['portas'];
$kilometragem = (int) $_POST['kilometragem'];
$cor = $_POST['cor'];

if($cor == "selectAlternativa"){
    $cor = $_POST['cor-alternativa'];
}

$cor = format($cor);

$cambio = (int) $_POST['cambio'];
$combustivel = (int) $_POST['combustivel'];

mysql_query("INSERT INTO ".DBPREF."carro (CAR_FABRICANTE, CAR_MODELO, CAR_COR, CAR_PORTAS, CAR_COMBUSTIVEL, CAR_CAMBIO, CAR_KILOMETRAGEM) VALUES ($fabricante, $modelo, '$cor', $portas, $combustivel, $cambio, $kilometragem) ")or die(mysql_error());

$_SESSION['ALERT'] = 'sucesso';
header("location:carros.php");exit;