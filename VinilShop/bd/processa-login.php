<?php
session_start();

if (!empty($_POST)) { //Caso esteja todos os campos preenchedos

    require 'dbcon.php';

    $email = mysqli_real_escape_string($con, $_POST['login']);
    $log = mysqli_real_escape_string($con, $_POST['login']);
    $password = sha1($_POST['password']);

    //esta query procura o utilizador de acordo com os dados introduzidos
    $query = "SELECT u.*, p.Nome AS pagamento, p.descricao as pagamento_descricao, t.nome as transportadora, t.descricao as transportadora_descricao, t.preco as transportadora_preco
            FROM utilizador u
            LEFT JOIN metodo_pagamento p ON u.metodopagamento_id = p.MetodoPagamento_id
            LEFT JOIN metodo_envio t ON u.metodoenvio_id = t.MetodoEnvio_id
            WHERE (u.email = '$email' OR u.login = '$log') AND u.password = '$password'";
    


    $_SESSION['query'] = $query;
    $login = mysqli_query($con, $query);
    
    if ($login && mysqli_num_rows($login) == 1) {
        $row = mysqli_fetch_assoc($login);

        if($row['status']=='Bloqueado')
            $_SESSION['login_error'] = "O conta do utilizador está bloqueada!";
        else if ($row['status']=='pendente')
            $_SESSION['login_error'] = "A conta está pendente de ativação!";
        else
        {

            // Caso exista entao...
            $_SESSION['user'] = $row;
            $id =  $_SESSION['user']['utilizador_id'];
            $query = "SELECT * from lista_desejos where utilizador_id = $id"; //Colocar a lista de desejos do utilizador caso este ja tenha
            $lista = mysqli_query($con, $query);
            if ($lista && mysqli_num_rows($lista) > 0) {
                $_SESSION['Wishlist'] = [];

                while ($rowWish = $lista->fetch_assoc()) {
                
                    $data[] = $rowWish;
                            
                }

                foreach ($data as $row) {
                    $id = $row['vinil_id'];
                    array_push($_SESSION['Wishlist'], $id);
                }
            }
            else
            {   if(isset($_SESSION['Wishlist'])) //Caso o utilizador nao tenha uma lista de desejos, a lista de desejos criada enquanto nao estava com uma conta logada, sera transferida para a conta do utilizador
                {
                    if(!empty($_SESSION['Wishlist']))
                    {
                       foreach ($_SESSION['Wishlist'] as  $vinil_id) {
                        $query = "INSERT INTO lista_desejos  VALUES
                        ($id, $vinil_id)";
                        $query_run = mysqli_query($con, $query);
                       }


                    }
                }
                
            }
            header('Location: ../'); //E movido para o Index
            exit(0);
        }

        
    } else 
        $_SESSION['login_error'] = "Login ou password não existem!";

    header('Location: ../?op=5'); //E movido para o Login
}
?>
