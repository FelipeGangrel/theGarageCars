<?

if (basename($_SERVER["PHP_SELF"]) == "conn.php") {
        die("Este arquivo não pode ser acessado diretamente.");
} 
if ($_SERVER['SERVER_NAME'] == "server"){
	
	$db_name = "thegarage";
	$conexao = mysql_connect("server", "foco", "foco");
	
	define ("BASE","\\\\server\\web\\thegarage\\");
	define ("SITE", "http://server/thegarage/");

	$ssp = array(
		'user'=> 'foco',
		'password'=> 'foco',
		'db'=> 'thegarage',
		'server'=> 'server'
	);

} elseif ($_SERVER['SERVER_NAME'] == "localhost") {

	$db_name = "thegarage";
	$conexao = mysql_connect("server", "foco", "foco");

	define ("BASE","/var/www/html/thegarage/");
	define ("SITE", "http://localhost/thegarage/");

	$ssp = array(
		'user'=> 'foco',
		'password'=> 'foco',
		'db'=> 'thegarage',
		'server'=> 'server'
	);

		
} else {
	
	// $db_name = "diocesevr_bd";
 	// 	$conexao = mysql_connect("robb0407.publiccloud.com.br","dioce_bd","dio@Foco3113");

	define ("BASE","/var/www/vhosts/thegaragecars.com.br/httpdocs/");
	define ("SITE", "http://thegaragecars.com.br/");
}


define ("ESTREIA", "2016-08-01 15:00:00"); // quando o site vai pro ar



define("DBPREF", "");
define("DB_PREFIX", "");

if(!$manterFormatoBanco){
//corrigir acentuacao
mysql_query("SET character_set_results = 'latin1', character_set_client = 'latin1', character_set_connection = 'latin1', character_set_database = 'latin1', character_set_server = 'latin1'", $conexao);
}


$db = mysql_select_db($db_name,$conexao);
if ($conexao == false) print('Erro ao conectar ao Servidor de Banco de Dados');
if ($db == false) print('Erro ao selecionar Banco de Dados');

//Captcha
$publickey = "6LeD1tQSAAAAAGGigAZ9SC-b20LY2fxl1k9nXMx9";
$privatekey = "6LeD1tQSAAAAANMMXYCgTwMyHA3tVegtZkRw2Bvj";
?>