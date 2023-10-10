<?php
require "PHPMailer/PHPMailerAutoload.php";
function smtpmailer($to, $to_name, $cc, $cc_name, $subject, $body)
{
        $mail = new PHPMailer();
        $mail->IsSMTP();       // enable SMTP
        $mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'tls'; 
        $mail->Host = 'smtp.WebSiteLive.net';
        $mail->Port = 587;  
        $mail->Username = 'sistema@cpss.com.pe';
        $mail->Password = '@_Pass3000_##@';    
        // $path = 'reseller.pdf';
        // $mail->AddAttachment($path);   
        $mail->IsHTML(true);
        $mail->From = $to; // Establece el EMAIL para el mensaje
        $mail->FromName = $to_name; // Establece el nombre del mensaje
        $mail->Sender = 'sistema@cpss.com.pe';        
        //$mail->AddReplyTo($cc, $cc_name);
        $mail->AddAddress($to, $to_name);
        $mail->AddCC($cc, $cc_name);
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
    
$to   = 'manuel_jvf@hotmail.com';
$to_name = utf8_decode('MANUEL VICUÑA');
$cc = 'manolo1978@gmail.com';
$cc_name = utf8_decode('MANUEL');

$subj = utf8_decode('PHPMailer 5.2 testing from DomainRacer');
$msg = '<strong>This is mail</strong> about testing mailing using PHP.';
$msg = utf8_decode($msg);

$error = smtpmailer($to, $to_name, $cc, $cc_name, $subj, $msg);    
?>