<?
include_once('../../inc/includes.php');
$fabricante = $_GET['fabricante'];

$sql = mysql_query("SELECT MOD_ID, MOD_NOME_COMPLETO FROM ".DBPREF."carro_modelo WHERE FAB_ID = $fabricante ")or die(mysql_error());
$modelos = array();
while($mod = mysql_fetch_array($sql)):

    $modeloId = $mod['MOD_ID'];
    $modeloNome = utf8_encode($mod['MOD_NOME_COMPLETO']);

    $modelo = array('id'=>$modeloId, 'nome'=> $modeloNome);
    array_push($modelos, $modelo);

endwhile;
echo json_encode($modelos);

