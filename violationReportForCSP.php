<?php
include 'class/class_process.php';
no_cache();
not_attack_xss_1();
//not_attack_xss_2();
$conectdata = new Proceso();
$conectdata::start();
$conectdata->start_default();
$conectdata->content_security_policy();

$requestContent = file_get_contents("php://input");
$data = json_decode($requestContent, true);
$count = count($data['csp-report']);

if($count > 0){
	$to = 'manolo1978@gmail.com';
	$subject = 'Violaciones CSP - Website CPSS.COM.PE';

	$message = "Ocurrieron las siguientes violaciones:<br/><br/>";
	$message.= "<b>Document URI:</b> ".$data['csp-report']['document-uri']."<br/><br/>";
	$message.= "<b>Referrer:</b> ".$data['csp-report']['referrer']."<br/><br/>";
	$message.= "<b>Blocked URI:</b> ".$data['csp-report']['blocked-uri']."<br/><br/>";
	$message.= "<b>Violated Directive:</b> ".$data['csp-report']['violated-directive']."<br/><br/>";
	$message.= "<b>Original Policy:</b> ".$data['csp-report']['original-policy']."<br/><br/>";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: SISTEMA <sistema@cpss.com.pe>' . "\r\n";

	mail($to, $subject, $message, $headers);
}	
?>