<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
 
    
    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8'; //Tipo de chars
    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com'; //servidor
    $mail -> SMTPAuth = true; //Autenticacao
    $mail -> Username = 'noreply.moodyrecords@gmail.com'; //Email
    $mail -> Password = 'dwqtbdroqphxjevk'; //App name
    $mail -> SMTPSecure = 'ssl'; 
    $mail -> Port = 465;
    
?>