<?php
function getIP() {

    if (isset($_SERVER)) {

      if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
         return $_SERVER['HTTP_X_FORWARDED_FOR'];
      } else {
         return $_SERVER['REMOTE_ADDR'];
      }

    }else {

      if (isset($GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDER_FOR'])) {
        return $GLOBALS['HTTP_SERVER_VARS']['HTTP_X_FORWARDED_FOR'];
      } else {
        return $GLOBALS['HTTP_SERVER_VARS']['REMOTE_ADDR'];
      }

    }

}

function my_browser(){

   $u_agent = $_SERVER['HTTP_USER_AGENT'];
   $ub = '';
   if(preg_match('/MSIE/i',$u_agent)){ $ub = "Internet Explorer";  }
   elseif(preg_match('/Firefox/i',$u_agent)){ $ub = "Mozilla Firefox"; }
   elseif(preg_match('/Chrome/i',$u_agent)){ $ub = "Google Chrome"; }
   elseif(preg_match('/Safari/i',$u_agent)){ $ub = "Apple Safari"; }
   elseif(preg_match('/Flock/i',$u_agent)){ $ub = "Flock"; }
   elseif(preg_match('/OPR/i',$u_agent)){ $ub = "Opera"; }
   elseif(preg_match('/Netscape/i',$u_agent)){ $ub = "Netscape"; }
   return $ub;

}


function my_system_pc(){

    $osList = array(
    'Windows 10' => 'windows nt 10.0',
    'Windows 8.1' => 'windows nt 6.3',
    'Windows 8' => 'windows nt 6.2',
    'Windows 7' => 'windows nt 6.1',
    'Windows Vista' => 'windows nt 6.0',
    'Windows Server 2003' => 'windows nt 5.2',
    'Windows XP' => 'windows nt 5.1',
    'Windows 2000 sp1' => 'windows nt 5.01',
    'Windows 2000' => 'windows nt 5.0',
    'Windows NT 4.0' => 'windows nt 4.0',
    'Windows Me' => 'win 9x 4.9',
    'Windows 98' => 'windows 98',
    'Windows 95' => 'windows 95',
    'Windows CE' => 'windows ce',
    'Windows (version desconocida)' => 'windows',
    'OpenBSD' => 'openbsd',
    'SunOS' => 'sunos',
    'Ubuntu' => 'ubuntu',
    'Linux' => '(linux)|(x11)',
    'Android' => 'android',
    'iPhone' => 'iPhone',
    'iPad' => 'iPad',
    'Mac OSX Beta (Kodiak)' => 'mac os x beta',
    'Mac OSX Cheetah' => 'mac os x 10.0',
    'Mac OSX Puma' => 'mac os x 10.1',
    'Mac OSX Jaguar' => 'mac os x 10.2',
    'Mac OSX Panther' => 'mac os x 10.3',
    'Mac OSX Tiger' => 'mac os x 10.4',
    'Mac OSX Leopard' => 'mac os x 10.5',
    'Mac OSX Snow Leopard' => 'mac os x 10.6',
    'Mac OSX Lion' => 'mac os x 10.7',
    'Mac OSX (version desconocida)' => 'mac os x',
    'Mac OS (classic)' => '(mac_powerpc)|(macintosh)',
    'QNX' => 'QNX',
    'BeOS' => 'beos',
    'OS2' => 'os/2',
    'SearchBot'=>'(nuhk)|(googlebot)|(yammybot)|(openbot)|(slurp)|(msnbot)|(ask jeeves/teoma)|(ia_archiver)'
    );

    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $useragent = strtolower($useragent);

    foreach($osList as $os=>$match) {
      if (preg_match('/' . $match . '/i', $useragent)) { break; }
      else{ $os = "desconocido"; }
    }

    return $os;

}

function my_screen(){
    echo '<script language="javascript">
    var _anchop_ = screen.width;var _altop_ = screen.height;
    </script>';    
    $_anchop_ = '<script>document.write(_anchop_)</script>';
    $_altop_ = '<script>document.write(_altop_)</script>';
    $_anchop_ = trim($_anchop_);
    $_altop_ = trim($_altop_);
    return $_anchop_.' x '.$_altop_; 
}

/*
function www_url(){
   if (substr($_SERVER["SERVER_NAME"],0,4) != "www."){
       header("HTTP/1.1 301 Moved Permanently");
       header("Location: http://www." . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
   }
}
*/

function comprobar_email($email){
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminación del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return 1;
    else
       return 0;
}

function contar_texto($palabra) {
  $palabra = ereg_replace( "([     ]+)", "", $palabra );
  $num = strlen($palabra);
  return $num;
}

function limpiar($texto){   
   $texto = htmlspecialchars(trim(addslashes(stripslashes($texto))),ENT_QUOTES);
   $texto = str_replace(chr(160),'',$texto);
   return $texto;
}

function not_html_script($text){
   $text = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $text);
   $text = strip_tags($text);
   $ps1 = strpos($text, '>');
   $ps2 = strpos($text, '<');
   if ($ps1 !== false or $ps2 !== false ) { $text = ''; }
   $text = str_replace(">","",$text);
   $text = str_replace("<","",$text);
   //$text = str_replace("=","",$text);
   $text = str_replace("–","-",$text);
   $text = str_replace("alert(document.cookie)","",$text);
   $text = str_replace('alert("document.cookie")','',$text);
   $text = str_replace("document.cookie","",$text);
   return($text);
}

function not_script($text){
   $text = trim($text);
   $text = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $text);
   return($text);
}

function clear_space($text){
   $text = html_entity_decode($text);
   $text = trim($text);
   $text = preg_replace("/\r\n+|\r+|\n+|\t+/i", " ", $text);
   $text = preg_replace('/\s+/', ' ', $text);
   $text = str_replace("\xc2\xa0",' ',$text);
   return $text;
}

function sanatize_var($text) {
    $text = trim($text);
    $text = str_ireplace( 
              array('<',';','|','&','>',"'",')','(','INFORMATION_SCHEMA','mysql','schema_name','SLEEP','SHOW TABLES','SHOW DATABASES','SHOW SCHEMAS','CONCAT','--','OR 1=1','DROP TABLE','.SCHEMATA','.TABLES','.COLUMNS','.TABLE_PRIVILEGES','.COLUMN_PRIVILEGES'), 
              array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x29;','&#x28;','','','','','','','','','','','','','','','',''), $text 
            );
    $text = str_ireplace( '%3Cscript', '', $text );
    return $text;
}


function ver_archivo($Size,$Type){

    $PE = 4194304; // 4Mb a Bytes

    switch ($Type) {
      case 'image/x-jpg': $bool = true; break;
      case 'image/jpeg': $bool = true; break;
      case 'image/pjpeg': $bool = true; break;
      case 'image/jpg':$bool = true; break;
      case 'image/gif':$bool = true; break;
      case 'image/png':$bool = true; break;
      case 'image/x-png':$bool = true; break;
      case 'application/pdf':$bool = true; break;
      case 'application/msword': $bool = true; break;
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': $bool = true; break;
      default:$bool = false; break;
    }

    if( $bool == true && $Size <= $PE ){  $Reporte = '_CORRECTO_'; }
    else{ $Reporte = '_INCORRECTO_'; }

    return $Reporte;

}

function ver_adjunto($Size,$Type){

    $PE = 32505856;

    switch ($Type) {
      case 'image/x-jpg': $bool = true; break;
      case 'image/jpeg': $bool = true; break;
      case 'image/pjpeg': $bool = true; break;
      case 'image/jpg':$bool = true; break;
      case 'image/gif':$bool = true; break;
      case 'image/png':$bool = true; break;
      case 'image/x-png':$bool = true; break;
      case 'application/pdf':$bool = true; break;
      case 'application/msword': $bool = true; break;            // Archivo .DOC
      case 'application/vnd.ms-excel': $bool = true; break;      // Archivo .XLS
      case 'application/vnd.ms-powerpoint': $bool = true; break; // Archivo .PPT
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': $bool = true; break;   // Archivo .DOCX
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': $bool = true; break;         // Archivo .XLSX
      case 'application/vnd.openxmlformats-officedocument.presentationml.presentation': $bool = true; break; // Archivo .PPTX
      default:$bool = false; break;
    }

    if( $bool == true && $Size <= $PE ){ $Reporte = '_CORRECTO_'; }
    else{ $Reporte = '_INCORRECTO_'; }

    return $Reporte;
}

function check_file_pdf($size,$type){

    $peso = 4194304; // 4Mb a Bytes

    switch ($type) {
      case 'application/pdf': $bool = true; break;
      default: $bool = false; break;
    }

    if( $bool == true && $size <= $peso ){ return '_CORRECTO_'; }
    else{ return '_INCORRECTO_'; }

}


function check_file_doc($size,$type){

    $peso = 4194304; // 4Mb a Bytes

    switch ($type) {
      case 'application/msword': $bool = true; break;
      case 'application/vnd.openxmlformats-officedocument.wordprocessingml.document': $bool = true; break;
      default:$bool = false; break;
    }

    if( $bool == true && $size <= $peso ){ return '_CORRECTO_'; }
    else{ return '_INCORRECTO_'; }

}


function check_file_xls($size,$type){

    $peso = 4194304; // 4Mb a Bytes

    switch ($type) {
      case 'application/vnd.ms-excel': $bool = true; break;
      case 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet': $bool = true; break;
      default:$bool = false; break;
    }

    if( $bool == true && $size <= $peso ){ return '_CORRECTO_'; }
    else{ return '_INCORRECTO_'; }

}

function check_file_img_zip($size,$type){

    $peso = 4194304; // 4Mb a Bytes

    switch ($type) {
      case 'image/x-jpg': $bool = true; break;
      case 'image/jpeg': $bool = true; break;
      case 'image/pjpeg': $bool = true; break;
      case 'image/jpg': $bool = true; break;
      case 'image/gif': $bool = true; break;
      case 'image/png': $bool = true; break;
      case 'image/x-png': $bool = true; break;
      case 'application/zip': $bool = true; break;
      default:$bool = false; break;
    }

    if( $bool == true && $size <= $peso ){ return '_CORRECTO_'; }
    else{ return '_INCORRECTO_'; }

}

function trim_array($texto){
   if(!empty($texto)){
     $texto = array_map('trim',$texto);
     return $texto;
   }
}


function enlace(){
   $self = $_SERVER['PHP_SELF'];
   $self = explode("/",trim($self));
   $self = end($self);
   return($self);
}

function no_cache() {
    if(!headers_sent()){
        header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
    }
}

function caracteres($cadena){   
   if (preg_match("/^[a-zñA-ZÑ0-9áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ\- ]+$/", $cadena)) {
       return '_CORRECTO_';
   }
   else{
       return '_INCORRECTO_';
   }
}

function caracteres_special($cadena){
   if (preg_match("/^[a-zñA-ZÑ0-9áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ.\-\()\:\¡\!\¿\?*\&\,\×\/ ]+$/", $cadena)) {
       return '_CORRECTO_';
   }
   else{
       return '_INCORRECTO_';
   }
}

function caracteres_area($cadena){

    $cadena = str_replace('"', ' ', $cadena);
    $cadena = str_replace("'", " ", $cadena);
    $cadena = str_replace('“', ' ', $cadena);
    $cadena = str_replace('”', ' ', $cadena);
    $cadena = str_replace('*', '- ', $cadena);
    $cadena = str_replace('•', '- ', $cadena);
   
   if (preg_match("/^[a-zñA-ZÑ0-9áéíóúÁÉÍÓÚäëïöüÄËÏÖÜ;.,\/@\%\()\¡!¿?\/\:\-_\°\+\s\<\> ]+$/", $cadena)) {
       return '_CORRECTO_';
   }
   else{
       return '_INCORRECTO_';
   }

}

function strange($txt){
  if(preg_match("/^[a-zñ0-9A-ZÑäëïöüÄËÏÖÜáéíóúÁÉÍÓÚ\.\()\-\°\'\"\,\:\/ ]+$/", $txt)){ return '_CORRECTO_'; }
  else{ return '_INCORRECTO_'; }
}

function onlynumbers($txt){
  if(preg_match("/^[0-9]+$/", $txt)){ return '_CORRECTO_'; }
  else{ return '_INCORRECTO_'; }
}

function phone($txt){
  if(preg_match("/^[0-9*#\-]+$/", $txt)){ return '_CORRECTO_'; }
  else{ return '_INCORRECTO_'; }
}

function alfanumber($txt){
   if (preg_match("/^[a-z0-9A-Z\-]+$/",$txt)){ return '_CORRECTO_'; }
   else{ return '_INCORRECTO_'; }
}

function alfanumber_code($txt){
   if (preg_match("/^[a-z0-9A-Z\-\.]+$/",$txt)){ return '_CORRECTO_'; }
   else{ return '_INCORRECTO_'; }
}

function pasaporte($cadena){
   if (preg_match("/^[a-z]+[0-9]+$/i", $cadena)) {
       return '_CORRECTO_';
   }
   else{
       return '_INCORRECTO_';
   }
}

function onlydecimal($txt){
   if(!preg_match('/^-?[0-9]+([,\.][0-9]*)?$/', $txt)) {
      return false;
   }else{
      return true;
   }
}

function file_size($file, $setup = null){
    $FZ = ($file && @is_file($file)) ? filesize($file) : NULL;
    $FS = array("B","kB","MB","GB","TB","PB","EB","ZB","YB");
    if(!$setup && $setup !== 0){
       return number_format($FZ/pow(1024, $I=floor(log($FZ, 1024))), ($i >= 1) ? 2 : 0) . ' ' . $FS[$I];
    }elseif ($setup == 'INT') return number_format($FZ);
    else return number_format($FZ/pow(1024, $setup), ($setup >= 1) ? 2 : 0 ). ' ' . $FS[$setup];
}

function no_ataques_xss(){

    $URLclear = strtolower($_SERVER['REQUEST_URI']);

	  $pos1 = strpos($URLclear, 'script');
	  $pos2 = strpos($URLclear, 'onload');
	  $pos3 = strpos($URLclear, 'alert');
	  $pos4 = strpos($URLclear, 'src');
	  $pos5 = strpos($URLclear, 'href');
	  $pos6 = strpos($URLclear, 'prompt');
    $pos7 = strpos($URLclear, 'cookie');
	  $pos8 = strpos($URLclear, 'object');
	  $pos9 = strpos($URLclear, 'applet');
	  $pos10 = strpos($URLclear, 'embed');
    $pos11 = strpos($URLclear, 'form');
    $pos12 = strpos($URLclear, 'window.location');
    $pos13 = strpos($URLclear, 'document.cookie');
    $pos14 = strpos($URLclear, 'onclick');
    $pos15 = strpos($URLclear, 'javascript');

	  if ($pos1 !== false or $pos2 !== false or $pos3 !== false or $pos4 !== false or $pos5 !== false or $pos6 !== false or
        $pos7 !== false or $pos8 !== false or $pos9 !== false or $pos10 !== false or $pos11 !== false or $pos12 !== false or
        $pos13 !== false or $pos14 !== false or $pos15 !== false) {
	 	    header('Location: '.URL_SITE);
        exit();
	  }

}

function codigo_ascii($text){

    $text = str_replace('&amp;', '&', $text);
    $text = str_replace('&iquest;', '¿', $text);
    $text = str_replace('&iexcl;', '¡', $text);
    $text = str_replace('&lt;', '<', $text);
    $text = str_replace('&gt;', '>', $text);
    $text = str_replace('&quot;', '"', $text);
    $text = str_replace("&apos;", "'", $text);
    $text = str_replace('&aacute;', 'á', $text);
    $text = str_replace('&eacute;', 'é', $text);
    $text = str_replace('&iacute;', 'í', $text);
    $text = str_replace('&oacute;', 'ó', $text);
    $text = str_replace('&uacute;', 'ú', $text);
    $text = str_replace('&ntilde;', 'ñ', $text);
    $text = str_replace('&Aacute;', 'Á', $text);
    $text = str_replace('&Eacute;', 'É', $text);
    $text = str_replace('&Iacute;', 'Í', $text);
    $text = str_replace('&Oacute;', 'Ó', $text);
    $text = str_replace('&Uacute;', 'Ú', $text);
    $text = str_replace('&Ntilde;', 'Ñ', $text);
    $text = str_replace('&auml;', 'ä', $text);
    $text = str_replace('&euml;', 'ë', $text);
    $text = str_replace('&iuml;', 'ï', $text);
    $text = str_replace('&ouml;', 'ö', $text);
    $text = str_replace('&uuml;', 'ü', $text);
    $text = str_replace('&Auml;', 'Ä', $text);
    $text = str_replace('&Euml;', 'Ë', $text);
    $text = str_replace('&Iuml;', 'Ï', $text);
    $text = str_replace('&Ouml;', 'Ö', $text);
    $text = str_replace('&Uuml;', 'Ñ', $text);

    return $text;

}

/*
function generarCodigo($longitud) {
   $key = '';
   $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
   $max = strlen($pattern)-1;
   echo "<script>console.log('Console: " . $longitud . "' );</script>";
   for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
   return mb_strtoupper($key);
}
*/

function fecha_full(){

    $fecha = time();
    $dia = date("d",$fecha);
    $mes = date("m",$fecha);
    $anno = date("Y",$fecha);

    $mes = str_replace("01","enero",$mes);
    $mes = str_replace("02","febrero",$mes);
    $mes = str_replace("03","marzo",$mes);
    $mes = str_replace("04","abril",$mes);
    $mes = str_replace("05","mayo",$mes);
    $mes = str_replace("06","junio",$mes);
    $mes = str_replace("07","julio",$mes);
    $mes = str_replace("08","agosto",$mes);
    $mes = str_replace("09","septiembre",$mes);
    $mes = str_replace("10","octubre",$mes);
    $mes = str_replace("11","noviembre",$mes);
    $mes = str_replace("12","diciembre",$mes);

    //return $Nomdia.' '.$diaMes.' de '.$Mes.' del '.$Anio;
    return $dia.' de '.$mes.' de '.$anno;
}

function date_abrev($fecha){ // ej: 20081229

    $dia = date("d",$fecha);
    $mes = date("m",$fecha);
    $anno = date("Y",$fecha);
    if ($mes=="01") $mes = "Ene.";
    if ($mes=="02") $mes = "Feb.";
    if ($mes=="03") $mes = "Mar.";
    if ($mes=="04") $mes = "Abr.";
    if ($mes=="05") $mes = "May.";
    if ($mes=="06") $mes = "Jun.";
    if ($mes=="07") $mes = "Jul.";
    if ($mes=="08") $mes = "Ago.";
    if ($mes=="09") $mes = "Set.";
    if ($mes=="10") $mes = "Oct.";
    if ($mes=="11") $mes = "Nov.";
    if ($mes=="12") $mes = "Dic.";

    return($mes.' '.$anno);

}

function modulos($p1,$p2){
   $encontrado = 0;
   $ca = explode(",",$p1);
   for($i=0;$i<count($ca);$i++){ if($ca[$i]==$p2){ $encontrado++; }  }
   return $encontrado;
}

function strange_password($txt){ 
    if(preg_match("/^[a-zñ0-9A-ZÑäëïöüÄËÏÖÜáéíóúÁÉÍÓÚ\-\@#%&\_]+$/", $txt)){ return '_CORRECTO_'; }
    else{ return '_INCORRECTO_'; }
}

function strleft($s1, $s2) {
  return substr($s1, 0, strpos($s1, $s2));
}

/*
function obtener_url() {
  $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
  $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/") . $s;
  $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
  return $protocol . "://" . $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'];
}
*/

function validation_date($date){
  // 2012-12-31
  if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)) {
      return true;
  } else {
      return false;
  }

}

function mayor_date($date1,$date2){

   $fecha_inicio = strtotime($date1);
   $fecha_fin    = strtotime($date2);
   if($fecha_fin >= $fecha_inicio){
     return true;
   }else{
     return false;
   }

}

function validation_var($url_default){

    $url_default = trim($url_default);
    $variables_get = explode('?', mb_strtolower($url_default));
    $valores = explode('&', $variables_get['1']);
    $valor1 = str_replace('v=', '', $valores['0']);
    $valor2 = str_replace('cod=', '', $valores['1']);

    if(!empty($valor1)){
       if($valor1!='editar' && $valor1!='borrar' && $valor1!='print' && $valor1!='ver' && $valor1!='anular' && $valor1!='habil'){
          header('Location: '.URL_SITE);
          exit();
       }

       if(strlen($valor1)>7){
          header('Location: '.URL_SITE);
          exit();
       }
    }

    if(!empty($valor2)){
       if(!preg_match("/^[0-9]+$/", $valor2)){
          header('Location: '.URL_SITE);
          exit();
       }

       if(strlen($valor2)>5){
          header('Location: '.URL_SITE);
          exit();
       }
    }

}


function validation_id($url_default){

    $url_default = trim($url_default);
    $variables_get = explode('?', mb_strtolower($url_default));
    $valores = explode('=', $variables_get['1']);
    $valor1 = $valores['0'];
    $valor2 = $valores['1'];

    if($valor1!='codigo'){
       header('Location: ./index.php');
       exit();
    }

    if(!empty($valor2)){

       if(!preg_match("/^[0-9]+$/", $valor2)){
          header('Location: ./index.php');
          exit();
       }

       if(strlen($valor2)>7){
          header('Location: ./index.php');
          exit();
       }

    }

}

function val_password($val){

    $rpta = '';

    if(strlen($val) < 8){
      $rpta = "(*) El password es demasiado corto";
    }
    else if(!preg_match('/(?=[@#%&]|-|_)/', $val)){
      $rpta = "(*) El password debe contener al menos uno de los siguientes s&iacute;mbolos: @#%&-_";
    }
    else if(!preg_match('/(?=\d)/', $val)){
      $rpta = "(*) El password debe contener al menos un alfabeto";
    }
    else if(!preg_match('/(?=[a-z])/', $val)){
      $rpta = "(*) El password debe contener al menos una min&uacute;scula";
    }
    else if(!preg_match('/(?=[A-Z])/', $val)){
      $rpta = "(*) El password debe contener al menos una may&uacute;scula";
    }

    return $rpta;

}

function clear_string($string){

    $string = trim($string);

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );

    $string = str_replace(
        array('¨', 'º', '-', '~',
             '#', '@', '|', '!', '"',
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             '¿', '[', '^', '<code>', ']',
             '+', '}', '{', '´','.',
             '>', '<', ';', ',', ':'),
        ' ',
        $string
    );

    return $string;
}


function clear_string_ii($string){

    $string = trim(mb_strtolower($string));

    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );

    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );

    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );

    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );

    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );

    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç', '×'),
        array('n', 'N', 'c', 'C', 'x'),
        $string
    );

    $string = str_replace(
        array('¨', 'º', '-', '~',
             '#', '@', '|', '!', '"',
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             '¿', '[', '^', '<code>', ']',
             '+', '}', '{', '´', '.',
             '>', '<', ';', ',', ':'),
        ' ',
        $string
    );
    
    $string = str_replace(" ","-",$string);
    $string = strip_tags($string);

    return $string;
}


function ucwords_accent($string)
{
    if (mb_detect_encoding($string) != 'UTF-8') {
        $string = mb_convert_case(utf8_encode($string), MB_CASE_TITLE, 'UTF-8');
    } else {
        $string = mb_convert_case($string, MB_CASE_TITLE, 'UTF-8');
    }
    return $string;
}


// Capitalizar texto - Mayusculas al inicio
function ucname($string) {
    $string = ucwords_accent(mb_strtolower($string));

    foreach (array('-', '\'') as $delimiter) {
      if (strpos($string, $delimiter)!==false) {
        $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
      }
    }

    $string = str_replace(' De ', ' de ', $string);
    $string = str_replace(' En ', ' en ', $string);
    $string = str_replace(' La ', ' la ', $string);
    $string = str_replace(' Y ', ' y ', $string);
    $string = str_replace(' O ', ' o ', $string);
    $string = str_replace(' Del ', ' del ', $string);
    $string = str_replace(' Un ', ' un ', $string);
    return $string;
}

function smtpmailer($from, $from_name, $to, $to_name, $cc1, $cc1_name, $cc2, $cc2_name, $subject, $body)
{
    $filename = dirname(__FILE__).DIRECTORY_SEPARATOR.'PHPMailer'.DIRECTORY_SEPARATOR.'PHPMailerAutoload.php';
    if (is_readable($filename)) {
        require $filename;

        $mail = new PHPMailer();
        $mail->IsSMTP();       // enable SMTP
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = MAIL_HOST;
        $mail->Port = MAIL_PORT;  
        $mail->Username = MAIL_USERNAME;
        $mail->Password = MAIL_PASSWORD;   
        // $path = 'reseller.pdf';
        // $mail->AddAttachment($path);   
        $mail->IsHTML(true);
        $mail->From = $to;
        $mail->FromName = $to_name;
        $mail->Sender = MAIL_USERNAME;
        $mail->SetFrom($from, $from_name);
        $mail->AddAddress($to, $to_name);
        $mail->AddCC($cc1, $cc1_name);
        $mail->AddCC($cc2, $cc2_name);
        $mail->Subject = $subject;
        $mail->AltBody = "Para ver el mensaje, utilice un visor de correo electrónico compatible con HTML.";
        $mail->Body = $body;        
        if(!$mail->Send())
        {           
            return false; 
        }
        else 
        {            
            return true;
        }

    }
        
}

function var_server(){
    $indicesServer = array('PHP_SELF',
    'argv',
    'argc',
    'GATEWAY_INTERFACE',
    'SERVER_ADDR',
    'SERVER_NAME',
    'SERVER_SOFTWARE',
    'SERVER_PROTOCOL',
    'REQUEST_METHOD',
    'REQUEST_TIME',
    'REQUEST_TIME_FLOAT',
    'QUERY_STRING',
    'DOCUMENT_ROOT',
    'HTTP_ACCEPT',
    'HTTP_ACCEPT_CHARSET',
    'HTTP_ACCEPT_ENCODING',
    'HTTP_ACCEPT_LANGUAGE',
    'HTTP_CONNECTION',
    'HTTP_HOST',
    'HTTP_REFERER',
    'HTTP_USER_AGENT',
    'HTTPS',
    'REMOTE_ADDR',
    'REMOTE_HOST',
    'REMOTE_PORT',
    'REMOTE_USER',
    'REDIRECT_REMOTE_USER',
    'SCRIPT_FILENAME',
    'SERVER_ADMIN',
    'SERVER_PORT',
    'SERVER_SIGNATURE',
    'PATH_TRANSLATED',
    'SCRIPT_NAME',
    'REQUEST_URI',
    'PHP_AUTH_DIGEST',
    'PHP_AUTH_USER',
    'PHP_AUTH_PW',
    'AUTH_TYPE',
    'PATH_INFO',
    'ORIG_PATH_INFO') ;

     $result='<table cellpadding="10">' ;
     foreach ($indicesServer as $arg) {
        if (isset($_SERVER[$arg])) {
            $result.='<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
        }
        else {
            $result.='<tr><td>'.$arg.'</td><td>-</td></tr>' ;
        }
     }
     $result.='</table>' ;

     return($result);

 }


 function validation_time($hora){
    $regexHora = '/^([0-1][0-9]|2[0-3])(:)([0-5][0-9])$/';
    if ( !preg_match($regexHora, $hora, $matchHora) ) { return false; }
    else{ return true; }
 }


function crear_miniaturas( $archivo, $ancho_img , $altura_img, $nombre_img ){

      if (!$info = getimagesize($archivo) ) return false;

      $aspect = $info['0'] / $info['1'];

      if( $altura_img == 0 ){
        $altura_img = round( $ancho_img/$aspect);
      }
      else{
        if ($ancho_img/$altura_img > $aspect) { $ancho_img = $altura_img*$aspect; }
        else { $altura_img = $ancho_img/$aspect; }
      }

      switch ($info['2']){
        case 1:   //   gif -> jpg
          $src = @imagecreatefromgif($archivo);
          break;
        case 2:   //   jpeg -> jpg
          $src = @imagecreatefromjpeg($archivo);
          break;
        case 3:  //   png -> jpg
          $src = @imagecreatefrompng($archivo);
          break;
      }

      if ( !$src ) return false;

      $tmp = @imagecreatetruecolor( $ancho_img, $altura_img );
    
      imagealphablending( $tmp, false );
      imagesavealpha( $tmp, true );
    
      imagecopyresampled( $tmp, $src, 0, 0, 0, 0, $ancho_img, $altura_img, $info[0], $info[1] );

      switch ($info['2']){ 
        case 1: imagegif( $tmp, $nombre_img ); break;
        case 2: imagejpeg( $tmp, $nombre_img, 100 ); break;
        case 3: imagepng( $tmp, $nombre_img, 9 ); break;
      }
    
      imagedestroy($src);
      imagedestroy($tmp);
    
      return true;

}

function dias($date1,$date2){

    $s = strtotime($date1)-strtotime($date2);
    $d = intval($s/86400);
    $s -= $d*86400;
    $h = intval($s/3600);
    $s -= $h*3600;
    $m = intval($s/60);
    $s -= $m*60;

    $df1 = (($d*24)+$h)." hrs"." ".$m." min";
    $df2 = $d." dias"." ".$h." hrs"." ".$m." min";

    return $d;
  
}

function tipo_send($t){
    
    $r = '';
    if($t=='1'){ $r = 'Envio Terrestre'; }
    elseif($t=='2') { $r = 'Envio Marítimo'; }
    elseif($t=='3') { $r = 'Envio Aéreo'; }
    elseif($t=='4') { $r = 'Solo consultar'; }
    return $r;

}

function tipo_usuarios($t){
    
    $r = '';
    if($t=='1'){ $r = 'Ejecutivo de Ventas 1'; }
    elseif($t=='2') { $r = 'Ejecutivo de Ventas 1'; }
    elseif($t=='3') { $r = 'Ejecutivo de Ventas 3'; }    
    return $r;

}

/*
function setEncryptedCookie($cookieName, $data)
{
  setcookie($cookieName, base64_encode($this->encrypt($data)), time()+$this->expire); 
}

function getEncryptedCookie($cookieName)
{
  return $this->decrypt(base64_decode($_COOKIE[$cookieName]));
}
*/
?>