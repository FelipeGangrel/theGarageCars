<? 
include('../../inc/includes.php');

$postCod = (int) $_POST['postagem'];
$edit = (boolean) $_POST['edit'];

$titulo = format($_POST['titulo']);
$conteudo = utf8_decode(addslashes($_POST['conteudo']));
$categoria = (int) format($_POST['categoria']);



$imageUpdate = false;

if($_POST['imagemThumb']){
	$imagemThumb = $_POST['imagemThumb'];
	$imagemThumb = explode(',', $imagemThumb);
	$img_thumb = $imagemThumb[1];

	// $ext = str_replace("data:image/","",str_replace(";base64", '', $imagemThumb[0]));

	$ext = 'jpg';

	$image = base64_decode($img_thumb);
	$imageName = md5(date('d') . date('m') . date('Y') . date('mm') . date('i') . date('s')   ) . '.' . $ext ;
	$imagePath = BASE. "img/posts/featured/" . $imageName;
	file_put_contents($imagePath, $image);

	$imageUpdate = true;
}





$tags = format($_POST['tags']);
$tagsAr = explode(",", $tags);
	foreach ($tagsAr as $key => $tag) {
		if($tag != ''){

			$sql = mysql_query("SELECT TAG_NOME FROM ".DB_PREFIX."tag WHERE TAG_NOME = '$tag' ");
			if(mysql_num_rows($sql)==0){
				$sql = mysql_query("INSERT INTO ".DB_PREFIX."tag (TAG_NOME) VALUES ('$tag') ");
			}
		}
	}


if(empty($titulo) || empty($conteudo) || empty($categoria)){
	$_SESSION['ALERT'] = 'erro';
	header("location:posts.php");
}

if($edit){
	$sql = mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_TITULO = '$titulo', POST_CONTEUDO = '$conteudo', POST_CATEGORIA = $categoria WHERE POST_ID = $postCod")or(die(mysql_error()));	
}else{
	$sql = mysql_query("INSERT INTO ".DB_PREFIX."postagem (POST_TITULO, POST_CONTEUDO, POST_CATEGORIA, POST_DATA) VALUES ('$titulo', '$conteudo', $categoria, NOW() )")or(die(mysql_error()));
	$postCod = mysql_insert_id();
}

if($imageUpdate){
	$sql = mysql_query("UPDATE ".DB_PREFIX."postagem SET POST_IMAGEM = '$imageName' WHERE POST_ID = $postCod")or(die(mysql_error()));
}


mysql_query("DELETE FROM ".DB_PREFIX."postagem_tag WHERE POST_ID = $postCod")or(die(mysql_error()));

foreach ($tagsAr as $key => $tag) {
	if($tag != ''){
		$tag = utf8_decode($tag);
		$sql = mysql_query("SELECT TAG_ID FROM ".DB_PREFIX."tag WHERE TAG_NOME = '$tag' ")or(die(mysql_error()));
		$tagId = mysql_fetch_array($sql);
			echo $tagId = $tagId['TAG_ID'];
		mysql_query("INSERT INTO ".DB_PREFIX."postagem_tag (POST_ID, TAG_ID) VALUES ($postCod, $tagId) ")or(die(mysql_error()));
	}

}


$_SESSION['ALERT'] = 'sucesso';
header("location:posts.php");


?>