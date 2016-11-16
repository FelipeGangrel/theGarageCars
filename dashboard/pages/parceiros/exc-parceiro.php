<? 
include('../../inc/includes.php');
include('../../inc/checa-login.php');

$imagens = $_POST['imagens'];
$acao = $_POST['acao'];

if($_GET['c']){
	$parceiroId = (int) $_GET['c'];
	$sql = mysql_query("UPDATE ".DB_PREFIX."parceiro SET D_E_L_E_T = 1 WHERE PAR_ID = $parceiroId");
}



switch ($acao) {
	case 'remove':
		foreach ($imagens as $key => $value) {
			$sql = mysql_query("UPDATE ".DB_PREFIX."parceiro SET D_E_L_E_T = 1 WHERE PAR_ID = $value");
		}
		break;
}


$_SESSION['ALERT'] = 'delete'; header("location:parceiros.php"); exit;
exit;