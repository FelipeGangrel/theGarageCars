<? 
include('../../inc/includes.php');


$edit = (boolean) $_POST['edit'];
$bio = utf8_decode(addslashes($_POST['bio']));

$arteUpdate = $avatarUpdate = false;

if($_POST['arte']){
	$arteThumb = $_POST['arte'];
	$arteThumb = explode(',', $arteThumb);
	$arte = $arteThumb[1];

	$arteImage = base64_decode($arte);
	$arteImageName = 'arte.jpg';
	$artePath = BASE. "perfil/" . $arteImageName;
	file_put_contents($artePath, $arteImage);

	$arteUpdate = true;
}

if($_POST['avatar']){
	$arteThumb = $_POST['avatar'];
	$arteThumb = explode(',', $arteThumb);
	$avatar = $arteThumb[1];

	$avatarImage = base64_decode($avatar);
	$avatarImageName = 'avatar.jpg';
	$avatarPath = BASE. "perfil/" . $avatarImageName;
	file_put_contents($avatarPath, $avatarImage);

	$avatarUpdate = true;
}




if($edit){
	$sql = mysql_query("UPDATE ".DB_PREFIX."perfil SET PER_BIO = '$bio' WHERE PER_ID = 1")or die(mysql_error());	
}else{
	$sql = mysql_query("INSERT INTO ".DB_PREFIX."perfil (PER_BIO) VALUES ('$bio')")or die(mysql_error());
}



if($arteUpdate){
	$sql = mysql_query("UPDATE ".DB_PREFIX."perfil SET PER_ARTE = '$arteImageName' WHERE PER_ID = 1")or die(mysql_error());
}

if($avatarUpdate){
	$sql = mysql_query("UPDATE ".DB_PREFIX."perfil SET PER_AVATAR = '$avatarImageName' WHERE PER_ID = 1")or die(mysql_error());
}




$_SESSION['ALERT'] = 'sucesso';
header("location:perfil.php");


?>