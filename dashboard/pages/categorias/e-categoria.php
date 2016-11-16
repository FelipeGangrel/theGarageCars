<? 
include('../../inc/includes.php');

$categoriaCod = (int) $_POST['categoria'];
$edit = (boolean) $_POST['edit'];

$nome = format($_POST['nome']);

$sql = mysql_query("SELECT TAG_NOME FROM ".DB_PREFIX."tag WHERE TAG_NOME = '$nome' ")or(die(mysql_error()));
if(mysql_num_rows($sql)==0){
	$sql = mysql_query("INSERT INTO ".DB_PREFIX."tag (TAG_NOME) VALUES ('$nome') ")or(die(mysql_error()));
}

if($edit){
	$sql = mysql_query("SELECT CAT_NOME FROM ".DB_PREFIX."categoria WHERE CAT_ID <> $categoriaCod AND (CAT_NOME = '$nome')");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe';header("location:categoria.php?c=$categoriaCod");exit;
	}

	$sql = mysql_query("UPDATE ".DB_PREFIX."categoria SET CAT_NOME = '$nome' WHERE CAT_ID = $categoriaCod")or(die(mysql_error()));
	$_SESSION['ALERT'] = 'sucesso';header("location:categorias.php");exit;
}else{

	$sql = mysql_query("SELECT CAT_NOME FROM ".DB_PREFIX."categoria WHERE CAT_NOME = '$nome'");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe';header("location:categoria.php");exit;
	}

	$sql = mysql_query("INSERT INTO ".DB_PREFIX."categoria (CAT_NOME) VALUES ('$nome')")or(die(mysql_error()));
	$_SESSION['ALERT'] = 'sucesso';header("location:categorias.php");exit;
}



?>
