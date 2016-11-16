<?
session_start();
include('../../../conn/conn.php');
include('../../../inc/funcoes.php');


if ($_GET['c']=='logout') {
	//Setamos as variáveis de sessão
	unset($_SESSION['USUARIO']);
	echo "<script>location='".SITE."dashboard/pages/login/login.php'</script>";
	exit();

}

function formatvar($var) {

	$var=htmlspecialchars($var);
	$var=trim($var);
	$var=mysql_escape_string($var);
	$var=strSemAcentos($var);
	
	return $var;
}


$login = formatvar($_POST['login']);
$senha = md5(formatvar($_POST['senha']));

$sql_logon = mysql_query("SELECT * FROM ".DB_PREFIX."usuario WHERE USU_EMAIL='$login' OR USU_LOGIN='$login' AND USU_SENHA='$senha' AND D_E_L_E_T = 0 AND USU_BLOCK = 0 ");

$logon = mysql_num_rows($sql_logon);

if($logon == 0){
	echo "<script>location='".SITE."dashboard/pages/login/login.php'</script>";
	exit();
}

if($logon == 1){
	$result = mysql_fetch_array($sql_logon);

	//Setamos as variáveis de sessão
	$_SESSION['USUARIO'] = $result['USU_ID'];
	$_SESSION['USUARIO_NOME'] = $result['USU_NOME'];

	echo "<script>location='".SITE."dashboard/pages/home/home.php'</script>";
	exit();
}

