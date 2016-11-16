<? 
include('../../inc/includes.php');

$cod = $_GET['c'];

$sql1 = mysql_query("DELETE FROM ".DB_PREFIX."categoria WHERE CAT_ID = $cod ")or(die(mysql_error()));
$sql2 = mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_CATEGORIA = 0 WHERE POST_CATEGORIA = $cod ")or(die(mysql_error()));

if($sql1 && $sql2){$sucesso='delete';}

$_SESSION['ALERT'] = $sucesso;
header("location:categorias.php");

?>