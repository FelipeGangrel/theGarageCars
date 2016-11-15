<? 
if (basename($_SERVER["PHP_SELF"]) == "conn.php") {
        die("Este arquivo não pode ser acessado diretamente.");
} 
if ($_SERVER['SERVER_NAME'] == "server"){
	
	$db_name = "diocesevr";
	$conexao = mysql_connect("server", "foco", "foco");
	
	define ("BASE","\\\\server\\web\\thegarage\\");
	define ("SITE", "http://server/thegarage/");
		
} else {
	
	// $db_name = "diocesevr_bd";
 	// 	$conexao = mysql_connect("robb0407.publiccloud.com.br","dioce_bd","dio@Foco3113");

	define ("BASE","/var/www/vhosts/thegaragecars.com.br/httpdocs/");
	define ("SITE", "http://thegaragecars.com.br/");
}


define ("ESTREIA", "2016-08-01 15:00:00"); // quando o site vai pro ar

// // Permissoes de acesso
// define("P_USUARIO", "USU_PERM_USUARIO");
// define("P_BANNER", "USU_PERM_BANNER");
// define("P_NOTICIA", "USU_PERM_NOTICIA");
// define("P_CLERO", "USU_PERM_CLERO");
// define("P_PAROQUIA", "USU_PERM_PAROQUIA");
// define("P_INSTITUTO_RELIGIOSO", "USU_PERM_INSTITUTO_RELIGIOSO");
// define("P_PASTORAL", "USU_PERM_PASTORAL");
// define("P_SEMINARIO", "USU_PERM_SEMINARIO");
// define("P_SANTO", "USU_PERM_SANTO");
// define("P_GALERIA", "USU_PERM_GALERIA");
// define("P_VIDEO", "USU_PERM_VIDEO");
// define("P_MISSA", "USU_PERM_MISSA");
// define("P_EVENTO", "USU_PERM_EVENTO");
// define("P_EVENTO_BISPO", "USU_PERM_EVENTO_BISPO");
// define("P_LITURGIA", "USU_PERM_LITURGIA");
// define("P_SOCIO", "USU_PERM_SOCIO");
// define("P_PEDIDO", "USU_PERM_PEDIDO");

// // permissoes de publicacao

// define("PUB_EVENTO", "USU_PUBLICAR_EVENTO");
// define("PUB_EVENTO_BISPO", "USU_PUBLICAR_EVENTO_BISPO");


// define("PROMO_BOLETO", "PROMO01");


// define("DBPREF", "");
// define("DB_PREFIX", "");

// if(!$manterFormatoBanco){
// //corrigir acentuacao
// mysql_query("SET character_set_results = 'latin1', character_set_client = 'latin1', character_set_connection = 'latin1', character_set_database = 'latin1', character_set_server = 'latin1'", $conexao);
// }


// $db = mysql_select_db($db_name,$conexao);
// if ($conexao == false) print('Erro ao conectar ao Servidor de Banco de Dados');
// if ($db == false) print('Erro ao selecionar Banco de Dados');

// //Captcha
// $publickey = "6LeD1tQSAAAAAGGigAZ9SC-b20LY2fxl1k9nXMx9";
// $privatekey = "6LeD1tQSAAAAANMMXYCgTwMyHA3tVegtZkRw2Bvj";
?>