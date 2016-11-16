<? 
include('../../inc/includes.php');

$cod = $_GET['c'];

$sql1 = mysql_query("DELETE FROM ".DB_PREFIX."tag WHERE TAG_ID = $cod ")or(die(mysql_error()));
$sql2 = mysql_query("DELETE FROM ".DB_PREFIX."postagem_tag WHERE TAG_ID = $cod ")or(die(mysql_error()));

if($sql1 && $sql2){$sucesso='delete';}

$_SESSION['ALERT'] = $sucesso;
header("location:tags.php");

?>