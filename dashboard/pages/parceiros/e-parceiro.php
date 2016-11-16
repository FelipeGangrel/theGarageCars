<? 
include('../../inc/includes.php');

$parceiroId = (int) $_POST['parceiro'];
$edit = (boolean) $_POST['edit'];

$nome = format($_POST['nome']);
$link = $_POST['link'];



$imageUpdate = false;

if($_POST['imagemThumb']){
    $imagemThumb = $_POST['imagemThumb'];
    $imagemThumb = explode(',', $imagemThumb);
    $img_thumb = $imagemThumb[1];

    $ext = str_replace("data:image/","",str_replace(";base64", '', $imagemThumb[0]));

    $image = base64_decode($img_thumb);
    $imageName = md5(date('d') . date('m') . date('Y') . date('mm') . date('i') . date('s')   ) . '.' . $ext ;
    $imagePath = BASE. "parceiros/" . $imageName;
    file_put_contents($imagePath, $image);

    $imageUpdate = true;
}



if($edit){
    $sql = mysql_query("UPDATE ".DB_PREFIX."parceiro SET PAR_LINK = '$link', PAR_NOME = '$nome' WHERE PAR_ID = $parceiroId ")or(die(mysql_error()));
}else{
    $sql = mysql_query("INSERT INTO ".DB_PREFIX."parceiro (PAR_LINK, PAR_NOME) VALUES ('$link', '$nome')")or(die(mysql_error()));
    $parceiroId = mysql_insert_id();
}

if($imageUpdate){
    $sql = mysql_query("UPDATE ".DB_PREFIX."parceiro SET PAR_IMAGEM = '$imageName' WHERE PAR_ID = $parceiroId")or(die(mysql_error()));
}



$_SESSION['ALERT'] = 'sucesso';
header("location:parceiros.php");


?>