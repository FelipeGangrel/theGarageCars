<?

function siteRoot(){
    echo SITE;
}

function dashRoot(){
  echo SITE.'dashboard/';
}

function baseRoot(){
    echo BASE;
}

function enviaremail($para,$assunto,$corpo){
    require_once("class.phpmailer.php");

    $assunto = '=?UTF-8?B?'.base64_encode($assunto).'?=';

    $mail = new PHPMailer();
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP();        // Ativar SMTP
    $mail->SMTPDebug = false;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
    $mail->SMTPAuth = true;     // Autenticação ativada
    $mail->SMTPSecure = 'tls';  // SSL REQUERIDO pelo GMail
    $mail->Host = 'smtp.projetosorigem.com.br'; // SMTP utilizado
    $mail->Port = 587;          // A porta 587 deverá estar aberta em seu servidor
    $mail->Username = 'contato@projetosorigem.com.br';
    $mail->Password = 'pro#Muda789';
    $mail->IsHTML (true);
    $mail->SetFrom('contato@projetosorigem.com.br', 'Diocese VR');
    $mail->Subject = $assunto;
    $mail->Body = $corpo;
    $mail->AddAddress($para);
    $mail->addCC('felipe@fococomunicacao.com','msg@fococomunicacao.com');
    return $mail->Send();
}


function geocode($address){
    $address = urlencode($address);
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
    $resp_json = file_get_contents($url);
    $resp = json_decode($resp_json, true);
    if($resp['status']=='OK'){
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];
        $formatted_address = $resp['results'][0]['formatted_address'];
        if($lati && $longi && $formatted_address){
            $data_arr = array();            
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
            return $data_arr;
        }else{
            return false;
        }
    }else{
        return false;
    }
}


function removePrptocolo($url) {
   $disallowed = array('http://www.', 'https://www.', 'http://', 'https://' );
   foreach($disallowed as $d) {
      if(strpos($url, $d) === 0) {
         return str_replace($d, '', $url);
      }
   }
   return $url;
}


function tipoVideo($url){

    $urlSemProtocolo = removePrptocolo($url);

    if(strpos($urlSemProtocolo, 'youtube')===0){
        return 'youtube';
    }elseif(strpos($urlSemProtocolo, 'vimeo')===0){
        return 'vimeo';
    }else{
        return 'desconecido';
    }
}

function tofloat($nm) { 
    if(empty($nm)){
        $numero = "0";
    } else {    
        //$money = number_format($mn,2,".","");
        $numero = str_replace(",",".",$nm);
    }
    
    return $numero;
}

function format($text,$slashed=true) {
    $text = strip_tags(utf8_decode($text));
    //$text = mysql_real_escape_string($text);
    // $text = str_replace("'","",$text);
    if($slashed) $text = addslashes($text);
    $text = trim($text);
    
    return $text;
}

function todate($dt,$format) {  
    if(empty($dt)) $dt = "00/00/0000";  
    $d = explode("/", $dt); 
    switch($format){
        case "mmaaaa": $date = date("Y-m-d", mktime(0,0,0,$d[0],01,$d[1])); break;
        case "ddmmaaaa": default: $date = date("Y-m-d", mktime(0,0,0,$d[1],$d[0],$d[2])); break;
    }   
    if(empty($dt)) $date = "0000-00-00";    
    return $date;
}


function formatmoney($money){
    $money = number_format($money, 2, ",", ".");   
    return $money;
}

function formatar_valor($valor) {
    if($valor < 1000) {
        $valor = "R$ ".number_format($valor, 0);
    } elseif($valor > 999 && $valor < 1000000) {
        $valor = "R$ ".(round($valor/1000, 1))." mil";
    } elseif($valor > 999999) {
        ($valor < 2000000) ? $tag = " milhão" : $tag = " milhões";
        $valor = "R$ ".(round($valor/1000000, 1)).$tag;
    }
    return $valor;
}
function formatCPFCNPJ ($string)
{
    $output = preg_replace("[' '-./ t]", '', $string);
    $size = (strlen($output) -2);
    if ($size != 9 && $size != 12) return false;
    $mask = ($size == 9) 
        ? '###.###.###-##' 
        : '##.###.###/####-##'; 
    $index = -1;
    for ($i=0; $i < strlen($mask); $i++):
        if ($mask[$i]=='#') $mask[$i] = $output[++$index];
    endfor;
    return $mask;
}

function formatTelefone ($string)
{
    $output = preg_replace("@[()_-]@", '', $string);
    $output = str_replace(' ', '', $output);
    $size = strlen($output);
    if ($size != 10 && $size != 11) return false;
    $mask = ($size == 10) 
        ? '(##) ####-####' 
        : '(##) ####-#####'; 
    $index = -1;
    for ($i=0; $i < strlen($mask); $i++):
        if ($mask[$i]=='#') $mask[$i] = $output[++$index];
    endfor;
    return $mask;
}

function grausminutossegundos($coodenada) {

    $deg = null; 
    $min = null;
    $sec = null;
    $sign = 1;

    if( $coodenada < 0 ) {
        $sign = -1; 
    }
    
    $coodenada = substr($coodenada, 1, strlen($coodenada)); 

    $deg = (int) substr($coodenada, 0, -4); 
    $min = (int) substr($coodenada, -4, 2); 
    $sec = (int) substr($coodenada, -2, 2);

    $decood = round
    ( abs( round($deg * 1000000.0) ) +
    ( abs( round($min * 1000000.0) ) / 60 ) +
    ( abs( round($sec * 1000000.0) ) / 3600 )
    );

    $decood = $decood * $sign / 1000000;

    return $decood;

}

//------------------------------------------------------------------------------------------------------//

$meses = array(null, 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
$arsemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');

//------------------------------------------------------------------------------------------------------//


$estados_sigla['AC'] = 'Acre';
$estados_sigla['AL'] = 'Alagoas';
$estados_sigla['AP'] = 'Amapá';
$estados_sigla['AM'] = 'Amazonas';
$estados_sigla['BA'] = 'Bahia';
$estados_sigla['CE'] = 'Ceará';
$estados_sigla['DF'] = 'Distrito Federal';
$estados_sigla['ES'] = 'Espírito Santo';
$estados_sigla['GO'] = 'Goiás';
$estados_sigla['MA'] = 'Maranhão';
$estados_sigla['MT'] = 'Mato Grosso';
$estados_sigla['MS'] = 'Mato Grosso do Sul';
$estados_sigla['MG'] = 'Minas Gerais';
$estados_sigla['PA'] = 'Pará';
$estados_sigla['PB'] = 'Paraíba';
$estados_sigla['PR'] = 'Paraná';
$estados_sigla['PE'] = 'Pernambuco';
$estados_sigla['PI'] = 'Piauí';
$estados_sigla['RJ'] = 'Rio de Janeiro';
$estados_sigla['RN'] = 'Rio Grande do Norte';
$estados_sigla['RS'] = 'Rio Grande do Sul';
$estados_sigla['RO'] = 'Rondônia';
$estados_sigla['RR'] = 'Roraima';
$estados_sigla['SC'] = 'Santa Catarina';
$estados_sigla['SP'] = 'São Paulo';
$estados_sigla['SE'] = 'Sergipe';
$estados_sigla['TO'] = 'Tocantins';

//------------------------------------------------------------------------------------------------------//

function strSemAcentos($string="", $mesma=1) 
{   
    if($string != "")
    {   
        $string = utf8_encode($string);
        
        $com_acento = "à á â ã ä è é ê ë ì í î ï ò ó ô õ ö ù ú û ü À Á Â Ã Ä È É Ê Ë Ì Í Î Ò Ó Ô Õ Ö Ù Ú Û Ü ç Ç ñ Ñ";  
        $sem_acento = "a a a a a e e e e i i i i o o o o o u u u u A A A A A E E E E I I I O O O O O U U U U c C n N";  
        $c = explode(' ',$com_acento);
        $s = explode(' ',$sem_acento);
    
        $i=0;
        foreach($c as $letra)
        {
            if(ereg($letra, $string))
            {
                $pattern[] = $letra;
                $replacement[] = $s[$i];
            }       
            $i=$i+1;        
        }
        
        if(isset($pattern))
        {
            $i=0;
            foreach($pattern as $letra)
            {               
                $string = eregi_replace($letra, $replacement[$i], $string);
                $i=$i+1;        
            }
            return $string; # retorna string alterada
        }   
        if ($mesma != 0) 
        {
            return $string; # retorna a mesma string se nada mudou
        }
    }
return ""; # sem mudança retorna nada
}

?>