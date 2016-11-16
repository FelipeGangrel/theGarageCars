<? 
include('../../inc/includes.php');

$tagCod = (int) $_POST['tag'];
$edit = (boolean) $_POST['edit'];
$nome = format($_POST['nome']);

if($edit){
	$sql = mysql_query("SELECT TAG_NOME FROM ".DB_PREFIX."tag WHERE TAG_ID <> $tagCod AND (TAG_NOME = '$nome')");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe'; header("location:tag.php?c=$tagCod"); exit;
	}

	$sql = mysql_query("UPDATE ".DB_PREFIX."tag SET TAG_NOME = '$nome' WHERE TAG_ID = $tagCod")or(die(mysql_error()));
	$_SESSION['ALERT'] = 'sucesso';	header("location:tags.php"); exit;
}else{

	$sql = mysql_query("SELECT TAG_NOME FROM ".DB_PREFIX."tag WHERE TAG_NOME = '$nome'");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe'; header("location:tag.php"); exit;
	}

	$sql = mysql_query("INSERT INTO ".DB_PREFIX."tag (TAG_NOME) VALUES ('$nome')")or(die(mysql_error()));
	$_SESSION['ALERT'] = 'sucesso';	header("location:tags.php"); exit;
}



?>

