<?php
    require "../../bd/dbcon.php";
    require "../../phpmailer/src/Exception.php";
    require "../../phpmailer/src/PHPMailer.php";
    require "../../phpmailer/src/SMTP.php";

    if(isset($_POST['contactar'])){
        $nome = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $assunto = mysqli_real_escape_string($con, $_POST['subject']);
        $mensagem = mysqli_real_escape_string($con, $_POST['message']);
        require "../../bd/mailercon.php";
        $mail -> setFrom('noreply.moodyrecords@gmail.com');
        $mail -> addAddress($email);
        $mail->addCC('noreply.moodyrecords@gmail.com'); 
        $mail -> isHTML(true);
        $mail -> Subject = $assunto;


        $mail -> Body = '<html>
                        <head>
                            <title>Contacto com o Suporte</title>
                        </head>
                        <body>
                            <p>Esta é uma mensagem automática para confirmar que recebemos a sua mensagem</p>
                            <h3>' . $assunto .'</h3>
                             <h4>' . $nome .'</h4>
                            <p>' .  $mensagem .'</p>
                            
                            
                        </body>
                        </html>';

        $mail -> send();

        $res = [
            'message' => 'Mensagem  enviada com sucesso',
            'status' => 250
        ];
        echo json_encode($res);
        
    }
?>