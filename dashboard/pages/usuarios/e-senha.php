<? 
include('../../inc/includes.php');

$usuarioCod = (int) $_POST['usuario'];

$senhaAtual = md5($_POST['senhaAtual']);
$senhaNova = md5($_POST['senhaNova']);

  $sql = mysql_query("SELECT USU_SENHA FROM ".DB_PREFIX."usuario WHERE USU_ID = $usuarioCod ")or(die(mysql_error()));
  $senha = mysql_fetch_array($sql);
    $senhaBanco = $senha['USU_SENHA'];

  if($senhaAtual != $senhaBanco){ 
    $_SESSION['ALERT'] = 'erro-senha';header("location:usuario.php?c=$usuarioCod");exit;
  }else{
    $sql = mysql_query("UPDATE ".DB_PREFIX."usuario SET USU_SENHA = '$senhaNova' WHERE USU_ID = $usuarioCod ");
    if($sql){$sucesso='sucesso';}else{$sucesso='erro';}
    $_SESSION['ALERT'] = $sucesso;header("location:usuarios.php");exit;
  }