<?php


    session_start();

    require "../../../bd/dbcon.php";
    require "../../../phpmailer/src/Exception.php";
    require "../../../phpmailer/src/PHPMailer.php";
    require "../../../phpmailer/src/SMTP.php";


    
    if(isset($_GET['id']))
    {
        $util_id = $_SESSION['user']['utilizador_id'];
    

            $util = $_SESSION['user'];
    
            $res = [
                'status' => 200,
                'message' => 'Utilizador Encontrado',
                'data' => $util
            ];
            echo json_encode($res);
            return;
       
    }
    
    if(isset($_POST['criar_conta']))
    {   
        $firstName = mysqli_real_escape_string($con, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($con, $_POST['lastName']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $login = mysqli_real_escape_string($con, $_POST['login']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass = mysqli_real_escape_string($con, $_POST['password']);
        $Cpass = mysqli_real_escape_string($con, $_POST['confirmPassword']);
        $country = mysqli_real_escape_string($con, $_POST['country']);
        $district = mysqli_real_escape_string($con, $_POST['district']);
        $postalCode = mysqli_real_escape_string($con, $_POST['postalCode']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $street = mysqli_real_escape_string($con, $_POST['street']);
        
        

        $secure = preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $pass) ; //Verificar se a palavra passe e segura
    
    
        $query = "INSERT INTO utilizador  VALUES
            (null,'$email', '$login', SHA1('$pass'), 'U', '$firstName', '$lastName', '$phone', '$street', '$postalCode','$city', '$country', '$district', null, null, 'pendente')";
        
        //Verifica se nao existe nenhum email nem login igual
        $checkEmailquery = "SELECT * from utilizador WHERE email = '$email' OR login = '$login'";

        $checkEmail = mysqli_query($con, $checkEmailquery);
        
        if(mysqli_num_rows($checkEmail) == 0)
        {
            if($secure)
            {
                if($Cpass == $pass) //Verifica se as passes coincidem
                {
                    $query_run = mysqli_query($con, $query);
                    if($query_run)
                    {   
                        
                        require "../../../bd/mailercon.php";
                        
                        $mail -> setFrom('noreply.moodyrecords@gmail.com'); //Email que vai enviar
                        $mail -> addAddress($email); //Destino
                        $mail -> isHTML(true);
                        $mail -> Subject = 'Verificar a Conta';

                        $codigo = md5($email . $login);

                        $mail -> Body = '<html>
                                        <head>
                                            <title>Verificar a conta</title>
                                             <style>
                                                .button {
                                                    display: inline-block;
                                                    padding: 10px 20px;
                                                    font-size: 16px;
                                                    color: #ffffff;
                                                    background-color: #007BFF;
                                                    text-decoration: none;
                                                    border-radius: 5px;
                                                }
                                                .button:hover {
                                                    background-color: #0056b3;
                                                }
                                            </style>
                                        </head>
                                        <body>
                                            <p>Clique no seguinte botão para verificar a conta</p>

                                            <a href="localhost/VinylShop/VinilShop/?op=5&codigo=' . $codigo . '"><button class="button" type="button"> Verificar Conta </button></a>
                                            
                                        </body>
                                        </html>';

                        $mail -> send();


                        
                        $res['status'] = 200;
                        $res['message'] = "Utilizador criado com sucesso";
                        $res['header'] = "./?op=5";
                        $_SESSION['login_error'] = "Foi enviado um email de verificação de conta!";
                        echo json_encode($res);

                        exit(0);
                        
                    }
                    else
                    {
                        $res['status'] = 422;
                        $res['message'] = "Erro ao criar o novo utilizador";
                
                        
                        echo json_encode($res);
                        return;
                    }
                }else
                {
                    $res['status'] = 101;
                    echo json_encode($res);
                }
            }else
            {
                $res['status'] = 100;
                echo json_encode($res);
            }
            
        }else
        {
            $res['status'] = 360;
	    $res['query'] = $checkEmailquery;
            echo json_encode($res);

        }

        
    }


    if(isset($_POST['alterar_info']))
    {   
        $util_id = $_SESSION['user']['utilizador_id'];
        $firstName = mysqli_real_escape_string($con, $_POST['nome']);
        $lastName = mysqli_real_escape_string($con, $_POST['apelido']);
        $telemovel = mysqli_real_escape_string($con, $_POST['telemovel']);
        $country = mysqli_real_escape_string($con, $_POST['pais']);
        $postalCode = mysqli_real_escape_string($con, $_POST['postal_code']);
        $district = mysqli_real_escape_string($con, $_POST['distrito']);
        $city = mysqli_real_escape_string($con, $_POST['cidade']);
        $street = mysqli_real_escape_string($con, $_POST['rua']);


        $query = "UPDATE utilizador SET nome ='$firstName', apelido = '$lastName', telemovel = '$telemovel', pais = '$country', codigo_postal = '$postalCode', distrito = '$district', cidade = '$city', rua = '$street'  WHERE utilizador_id = '$util_id'";

        $query_run = mysqli_query($con,$query);

        if($query_run)
        {
            $updateUserQuery = "SELECT u.*, p.Nome AS pagamento, t.nome as transportadora
            FROM utilizador u
            LEFT JOIN metodo_pagamento p ON u.metodopagamento_id = p.MetodoPagamento_id
            LEFT JOIN metodo_envio t ON u.metodoenvio_id = t.MetodoEnvio_id
            WHERE u.utilizador_id = '$util_id'";
            $updateUser = mysqli_query($con, $updateUserQuery);
            $row = mysqli_fetch_assoc($updateUser);
            $_SESSION['user'] = $row;

            
            $res = [
                'status' => 220,
                'message' => 'Utilizador alterado com sucesso',
            ];



            echo json_encode($res);
            return;
        }
    }

    if(isset($_POST['alterar_pagamento']))
    {   
        $util_id = $_SESSION['user']['utilizador_id'];
        $pagamento = mysqli_real_escape_string($con, $_POST['pagamento']);


        $query = "UPDATE utilizador SET metodopagamento_id = '$pagamento'  WHERE utilizador_id = '$util_id'";
        $query_pay = "SELECT MetodoPagamento_id, Nome, descricao from metodo_pagamento  WHERE MetodoPagamento_id = '$pagamento'";

        $query_run = mysqli_query($con,$query);
        $query_pay_run = mysqli_query($con,$query_pay);

        if($query_run)
        {         
            $row =  mysqli_fetch_assoc($query_pay_run);
            $_SESSION['user']['pagamento'] =  $row['Nome'];
            $_SESSION['user']['metodopagamento_id'] =  $row['MetodoPagamento_id'];
            $_SESSION['user']['pagamento_descricao'] =  $row['descricao'];

            
            $res = [
                'status' => 250,
                'message' => 'Utilizador alterado com sucesso',
                'deu' => $row,
            ];



            echo json_encode($res);
            return;
        }
    }

    if(isset($_POST['alterar_transportadora']))
    {   
        $util_id = $_SESSION['user']['utilizador_id'];
        $transportadora = mysqli_real_escape_string($con, $_POST['transportadora']);


        $query = "UPDATE utilizador SET metodoenvio_id = '$transportadora'  WHERE utilizador_id = '$util_id'";
        $query_pay = "SELECT MetodoEnvio_id, nome, descricao, preco from metodo_envio  WHERE MetodoEnvio_id = '$transportadora'";

        $query_run = mysqli_query($con,$query);
        $query_pay_run = mysqli_query($con,$query_pay);

        if($query_run)
        {         
            $row =  mysqli_fetch_assoc($query_pay_run);
            $_SESSION['user']['transportadora'] =  $row['nome'];
            $_SESSION['user']['metodoenvio_id'] =  $row['MetodoEnvio_id'];
            $_SESSION['user']['transportadora_descricao'] =  $row['descricao'];
            $_SESSION['user']['transportadora_preco'] =  $row['preco'];

            
            $res = [
                'status' => 250,
                'message' => 'Utilizador alterado com sucesso',
                'deu' => $row,
            ];



            echo json_encode($res);
            return;
        }
    }
    if(isset($_POST['forgot_password']))
    {

        $email = mysqli_escape_string($con, $_POST['email']);
        $func = mysqli_escape_string($con, $_POST['func']);
        if($func == 'Enviar')
        {   


            $query = "SELECT * FROM utilizador where email = '$email'"; //Verificar se o email do utilizador existe
            $query_run = mysqli_query($con, $query);

            if(mysqli_num_rows($query_run) > 0)
            {
                
            require "../../../bd/mailercon.php";
            $mail -> setFrom('noreply.moodyrecords@gmail.com');
            $mail -> addAddress($email);
            $mail -> isHTML(true);
            $mail -> Subject = 'Verificar a Conta';
    
            $codigo = rand(100000, 999999);
    
    
            $mail -> Body = '<html>
                            <head>
                                <title>Recuperar a Password</title>
                            </head>
                            <body>
                                <p>Este é o código que precisa de colocar para alterar a password</p>
                                <strong>' .   $codigo . '</strong>
                                
                                
                            </body>
                            </html>';
    
            $mail -> send();
    
            $_SESSION['codigo'] = $codigo;
    
            
            $res['status'] = 200;
            $res['message'] = "Foi enviado um email de verificação";
            $res['email'] = $email;
            echo json_encode($res);
    
            exit(0);
            }
            else
            {
                $res['status'] = 300;
                $res['message'] = "Não existe nenhum utilizador com esse email";
                echo json_encode($res);
            }


            
        }
        else if ($func == 'Alterar'){
            $codigo = mysqli_escape_string($con, $_POST['codigo']);
            $password = mysqli_escape_string($con, $_POST['password']);
            $Cpassword = mysqli_escape_string($con, $_POST['Cpassword']);

            if($codigo == $_SESSION['codigo'])
            {
                $secure = preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $password) ;
                if($secure)
                {
                    if($password == $Cpassword)
                    {
                        $query = "UPDATE utilizador set password = SHA1('$password') where email = '$email'";
                        $query_run = mysqli_query($con, $query);

                        if($query_run)
                        {
                            $res['status'] = 200;
                            $_SESSION['login_error'] = "Password Alterada com sucesso";
                            echo json_encode($res);
                        }
                    }else{
                        $res['status'] = 240;
                        $res['message'] = "As passwords não coincidem!";
                        echo json_encode($res);
                    }
                } else
                {
                    $res['status'] = 150;
                    $res['message'] = "A password tem que cumprir os requisitos: Pelo menos 8 caracteres, 1 caracter especial, e uma letra maiuscula.";
                    echo json_encode($res);
                }
            }
            else
            {
                $res['status'] = 100;
                $res['message'] = "O código está errado!!";
                echo json_encode($res);
            }
        }

        
      
    }

    if(isset($_POST['alterar_password']))
    {   
        $util_id = $_SESSION['user']['utilizador_id'];
        $pass = mysqli_real_escape_string($con, $_POST['OldPassword']);
        $newPass = mysqli_real_escape_string($con, $_POST['NewPassword']);
        $Cpass = mysqli_real_escape_string($con, $_POST['ConfirmPassword']);

        if(sha1($pass) == $_SESSION['user']['password'])
        {
                $secure = preg_match('/^(?=.*[A-Z])(?=.*[\W_]).{8,}$/', $newPass) ;
                if($secure)
                {
                        if($newPass == $Cpass){
                            $query = "UPDATE utilizador SET password = SHA1('$newPass')  WHERE utilizador_id = '$util_id'";
                            $query_run = mysqli_query($con, $query);
                            if($query_run)
                            {         
                                $_SESSION['user']['password'] =  sha1($newPass);
                    
                                
                                $res = [
                                    'status' => 200,
                                    'message' => 'Password alterada com sucesso',
                                ];
                    
                    
                    
                                echo json_encode($res);
                                return;
                            }
                        }
                        else
                        {
                            $res['status'] = 240;
                            $res['message'] = "As passwords não coincidem!";
                            echo json_encode($res);
                        }
                    }

               
            else
            {
                $res['status'] = 150;
                $res['message'] = "A password tem que cumprir os requisitos: Pelo menos 8 caracteres, 1 caracter especial, e uma letra maiuscula.";
                echo json_encode($res);
            }
            
        }else{
            $res['status'] = 100;
            $res['message'] = "A password antiga está errada";
            echo json_encode($res);
            return;
        }

       
    }

    if(isset($_POST['alterar_email']))
    {

      
        $func = mysqli_escape_string($con, $_POST['func']);
        if($func == 'Enviar')
        {   
            $newEmail = mysqli_escape_string($con, $_POST['NovoEmail']);
            $CEmail = mysqli_escape_string($con, $_POST['ConfirmarNovoEmail']);
            if($newEmail == $CEmail)
            {
                $query = "SELECT * FROM utilizador where email = '$newEmail'";
                $query_run = mysqli_query($con, $query);
    
                if(mysqli_num_rows($query_run) == 0)
                {
                    
                require "../../../bd/mailercon.php";
                $mail -> setFrom('noreply.moodyrecords@gmail.com');
                $mail -> addAddress($newEmail);
                $mail -> isHTML(true);
                $mail -> Subject = 'Mudança de Email';
        
                $codigo = rand(100000, 999999);
        
        
                $mail -> Body = '<html>
                                <head>
                                    <title>Verificar o Email</title>
                                </head>
                                <body>
                                    <p>Este é o código que precisa de colocar para alterar o email</p>
                                    <strong>' .   $codigo . '</strong>
                                    
                                    
                                </body>
                                </html>';
        
                $mail -> send();
        
                $_SESSION['codigo_email'] = $codigo;
        
                
                $res['status'] = 200;
                $res['message'] = "Foi enviado um email de verificação";
                $res['email'] = $newEmail;
                echo json_encode($res);
        
                exit(0);
                }
                else
                {
                    $res['status'] = 300;
                    $res['message'] = "Já existe um utilizador com esse email";
                    echo json_encode($res);
                }
            }else
            {
                $res['status'] = 400;
                $res['message'] = "Os emails não coicincidem";
                echo json_encode($res);
            }
           
            


            
        }
        else if ($func == 'Alterar'){
            $codigo = mysqli_escape_string($con, $_POST['codigo']);
            $email = mysqli_escape_string($con, $_POST['email']);
            $util_id = $_SESSION['user']['utilizador_id'];

            if($codigo == $_SESSION['codigo_email'])
            {   


                        $query = "UPDATE utilizador set email =  '$email' where utilizador_id = '$util_id'";
                        $query_run = mysqli_query($con, $query);

                        if($query_run)
                        {   
                            $_SESSION['user']['email'] = $email;
                            $res['status'] = 200;
                            $res['message'] = "Email alterado com sucesso";
                            echo json_encode($res);
                        }
        
            }
            else
            {
                $res['status'] = 100;
                $res['message'] = "O código está errado!!";
                echo json_encode($res);
            }
        }

        
      
    }

    
?>