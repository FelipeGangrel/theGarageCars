<? 
include('../../inc/includes.php');

$usuarioCod = (int) $_POST['usuario'];
$edit = (boolean) $_POST['edit'];

$nome = format($_POST['nome']);
$login = format($_POST['login']);
$email = format($_POST['email']);
$senha = md5($_POST['senha']);
$isBlock = ($_POST['ativo']==1)?0:1;


if($edit){
	$sql = mysql_query("SELECT USU_LOGIN, USU_EMAIL FROM ".DB_PREFIX."usuario WHERE USU_ID <> $usuarioCod AND (US_LOGIN = '$login' OR USU_EMAIL = '$email') ");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe';header("location:usuario.php?c=$usuarioCod");exit;
	}

	$sql = mysql_query("UPDATE ".DB_PREFIX."usuario SET USU_LOGIN = '$login', USU_EMAIL = '$email', USU_NOME = '$nome', USU_BLOCK = $isBlock WHERE USU_ID = $usuarioCod")or(die(mysql_error()));
	$_SESSION['ALERT'] = 'sucesso';header("location:usuarios.php");exit;
}else{

	$sql = mysql_query("SELECT USU_LOGIN, USU_EMAIL FROM ".DB_PREFIX."usuario WHERE US_LOGIN = '$login' OR USU_EMAIL = '$email' ");
	if(mysql_num_rows($sql)){
		$_SESSION['ALERT'] = 'ja-existe';header("location:usuario.php");exit;
	}

	$sql = mysql_query("INSERT INTO ".DB_PREFIX."usuario (USU_LOGIN, USU_NOME, USU_EMAIL, USU_SENHA, USU_BLOCK) VALUES ('$login', '$nome', '$email', '$senha', $isBlock)")or(die(mysql_error()));
	$_SESSION['ALERT'] = 'sucesso';header("location:usuarios.php");exit;
}



?>