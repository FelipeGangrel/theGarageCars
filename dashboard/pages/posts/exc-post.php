<? 
include('../../inc/includes.php');

$cod = $_GET['c'];

$sql = mysql_query("UPDATE ".DB_PREFIX."postagem SET D_E_L_E_T = 1 WHERE POST_ID = $cod ")or(die(mysql_error()));

if($sql){$sucesso='delete';}

$_SESSION['ALERT'] = $sucesso;
header("location:posts.php");

?>