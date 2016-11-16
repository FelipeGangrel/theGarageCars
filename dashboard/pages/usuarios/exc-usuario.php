<? 
include('../../inc/includes.php');

$usuarioCod = $_GET['c'];

$sql = mysql_query("UPDATE ".DB_PREFIX."usuario SET D_E_L_E_T = 1 WHERE USU_ID = $usuarioCod ")or(die(mysql_error()));

if($sql){$sucesso='delete';}

$_SESSION['ALERT'] = $sucesso;
header("location:usuarios.php");

?>