<?php
     
     use PHPMailer\PHPMailer\PHPMailer;
     use PHPMailer\PHPMailer\SMTP;
     use PHPMailer\PHPMailer\Exception;
 
     //Load Composer's autoloader
     require __DIR__ . "/vendor/autoload.php";
 
     $mail = new PHPMailer(true);                           //Enable verbose debug output
     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                 //Enable verbose debug output
     $mail->isSMTP();                                       //Send using SMTP
     $mail->SMTPAuth   = true;                              //Enable SMTP authentication
     $mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
     $mail->Port = 587;                                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
     $mail->Username   = 'hayaangroup93@gmail.com';         //SMTP username
     $mail->Password   = 'lgwrflcfjwdaknht';                             //SMTP password
     $mail->isHTML(true);                                   //Set email format to HTML

     return $mail;
 ?>