<? 
	include('../../inc/includes.php');

	/*$posts = $_POST['selecionados'];

	$sql = mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_DESTAQUE = 0 ");

	$posts = implode(",", $posts);

	$sql = mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_DESTAQUE = 1 WHERE POST_ID IN ($posts) ");
	$_SESSION['ALERT'] = 'sucesso';header("location:posts.php");exit;*/



	$posicao1 = $_POST['posicao1'];
	$posicao2 = $_POST['posicao2'];
	$posicao3 = $_POST['posicao3'];
	$posicao4 = $_POST['posicao4'];

	mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_DESTAQUE = 0, POST_POSICAO = 0 ");
	mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_POSICAO = 1, POST_DESTAQUE = 1 WHERE POST_ID = $posicao1 ");
	mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_POSICAO = 2, POST_DESTAQUE = 1 WHERE POST_ID = $posicao2 ");
	mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_POSICAO = 3, POST_DESTAQUE = 1 WHERE POST_ID = $posicao3 ");
	mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_POSICAO = 4, POST_DESTAQUE = 1 WHERE POST_ID = $posicao4 ");


	$_SESSION['ALERT'] = 'sucesso';header("location:posts.php");exit;

	
?>