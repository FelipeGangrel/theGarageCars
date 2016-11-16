<? 
	include('../../inc/includes.php');

	$categorias = $_POST['selecionados'];

	$sql = mysql_query("UPDATE ".DB_PREFIX."categoria SET CAT_MENU = 0 ");

	$categorias = implode(",", $categorias);

	$sql = mysql_query("UPDATE ".DB_PREFIX."categoria SET CAT_MENU = 1 WHERE CAT_ID IN ($categorias) ");
	$_SESSION['ALERT'] = 'sucesso';header("location:categorias.php");exit;
	
?>