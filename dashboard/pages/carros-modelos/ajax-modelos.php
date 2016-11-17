<?
include_once('../../inc/includes.php');

$sql = mysql_query("SELECT MOD_NOME FROM ".DBPREF."carro_modelo GROUP BY MOD_NOME ORDER BY MOD_NOME ")or die(mysql_error());
$modelos = array();
while($mod = mysql_fetch_array($sql)):

    $modeloNome = utf8_encode($mod['MOD_NOME']);

    array_push($modelos, $modeloNome);

endwhile;
echo json_encode($modelos);