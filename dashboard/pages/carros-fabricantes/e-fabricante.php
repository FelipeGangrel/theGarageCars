<? 
include('../../inc/includes.php');

$fabricante = (int) $_POST['fabricante'];
$edit = $_POST['edit']=='1'?true:false;


$nome = format($_POST['nome']);


if($edit){
	$sql = mysql_query("SELECT FAB_NOME FROM ".DBPREF."carro_fabricante WHERE FAB_ID <> $fabricante AND (FAB_NOME = '$nome')");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe';
        header("location:fabricante.php?c=$fabricante");exit;
	}

	$sql = mysql_query("UPDATE ".DBPREF."carro_fabricante SET FAB_NOME = '$nome' WHERE FAB_ID = $fabricante")or die(mysql_error());
	$_SESSION['ALERT'] = 'sucesso';header("location:fabricantes.php");exit;
}else{

	$sql = mysql_query("SELECT FAB_NOME FROM ".DBPREF."carro_fabricante WHERE FAB_NOME = '$nome'");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe';header("location:fabricante.php");exit;
	}

	$sql = mysql_query("INSERT INTO ".DBPREF."carro_fabricante (FAB_NOME) VALUES ('$nome')")or die(mysql_error());
	$_SESSION['ALERT'] = 'sucesso';header("location:fabricantes.php");exit;
}

include('../../inc/close.php');



?>
