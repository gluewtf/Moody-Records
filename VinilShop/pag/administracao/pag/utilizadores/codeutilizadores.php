<?php
session_start();
if (isset($_GET['utilizador_id'])) {
    require '../../../../bd/dbcon.php';

    $utilizador_id = $_GET['utilizador_id'];

    $query = "SELECT * FROM utilizador where utilizador_id = $utilizador_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $utilizador = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Utilizador Encontrado',
            'data' => $utilizador
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Utilizador nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

//Adicionar utilizador
if (isset($_POST['salvar_utilizador'])) {
    require '../../../../bd/dbcon.php';
    $login = mysqli_real_escape_string($con, $_POST['login']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $phone = mysqli_real_escape_string($con, $_POST['telemovel']);
    $firstName = mysqli_real_escape_string($con, $_POST['nome']);
    $lastName = mysqli_real_escape_string($con, $_POST['apelido']);
    $country = mysqli_real_escape_string($con, $_POST['pais']);
    $district = mysqli_real_escape_string($con, $_POST['distrito']);
    $postalCode = mysqli_real_escape_string($con, $_POST['codigoPostal']);
    $city = mysqli_real_escape_string($con, $_POST['cidade']);
    $street = mysqli_real_escape_string($con, $_POST['rua']);
    $envio = empty(mysqli_real_escape_string($con, $_POST['envio']))? "null" :  mysqli_real_escape_string($con, $_POST['envio']);
    $pagamento = empty(mysqli_real_escape_string($con, $_POST['pagamento']))? "null" : mysqli_real_escape_string($con, $_POST['pagamento']);
    $status = mysqli_real_escape_string($con, $_POST['status']);



    $query = "INSERT INTO utilizador  VALUES 
   (null,'$email', '$login', SHA1('$pass'), '$tipo', '$firstName', '$lastName', '$phone', '$street', '$postalCode','$city', '$country', '$district', $pagamento, $envio,'$status')";
    
    $checkEmailquery = "SELECT * from utilizador WHERE email = '$email'";

    $checkEmail = mysqli_query($con, $checkEmailquery);

    $checkLoginquery = "SELECT * from utilizador WHERE login = '$login'";

    $checkLogin = mysqli_query($con, $checkLoginquery);
    
    if(mysqli_num_rows($checkEmail) == 0)
    {
        if(mysqli_num_rows($checkLogin) == 0)
        {

                $query_run = mysqli_query($con, $query);
                if($query_run)
                {   
                    $user_id = $_SESSION['user']['utilizador_id'];
                    $escaped_query = mysqli_real_escape_string($con, $query);
                    $log_query_util = "INSERT INTO logfile VALUES
                    (null, CURDATE(), '$user_id', 'Insert', '$escaped_query' )";

                    $log_query_util_run = mysqli_query($con, $log_query_util);
                
                    
                    $res['status'] = 200;
                    $res['message'] = "Utilizador criado com sucesso";
                    echo json_encode($res);
                    return;
                    
                }
            
            
        }else
        {
            $res['status'] = 100;
            echo json_encode($res);
        }
        
    }else
    {
        $res['status'] = 300;
        echo json_encode($res);

    }

    
    
   
   
}

//Editar utilizador
if (isset($_POST['editar_utilizador'])) {
    require '../../../../bd/dbcon.php';
    $utilizador_id = mysqli_real_escape_string($con, $_POST['utilizador_id']);
    $login = mysqli_real_escape_string($con, $_POST['login']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, $_POST['password']);
    $pass_change = mysqli_real_escape_string($con, $_POST['password_changed']); //Verificar se pass foi alterar a pass foi alterada
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $phone = mysqli_real_escape_string($con, $_POST['telemovel']);
    $firstName = mysqli_real_escape_string($con, $_POST['nome']);
    $lastName = mysqli_real_escape_string($con, $_POST['apelido']);
    $country = mysqli_real_escape_string($con, $_POST['pais']);
    $district = mysqli_real_escape_string($con, $_POST['distrito']);
    $postalCode = mysqli_real_escape_string($con, $_POST['codigoPostal']);
    $city = mysqli_real_escape_string($con, $_POST['cidade']);
    $street = mysqli_real_escape_string($con, $_POST['rua']);
    $envio = empty(mysqli_real_escape_string($con, $_POST['envio']))? "null" :  mysqli_real_escape_string($con, $_POST['envio']);
    $pagamento = empty(mysqli_real_escape_string($con, $_POST['pagamento']))? "null" : mysqli_real_escape_string($con, $_POST['pagamento']);
    $status = mysqli_real_escape_string($con, $_POST['status']);



    $query = "UPDATE utilizador  SET
     email = '$email', login =  '$login', tipo = '$tipo', nome = '$firstName', apelido = '$lastName', telemovel = '$phone', 
     rua = '$street', codigo_postal = '$postalCode', cidade = '$city', pais = '$country', distrito = '$district', metodopagamento_id = $pagamento, metodoenvio_id = $envio, status = '$status'";
     if($pass_change == 'true') 
        $query .= ", password = SHA1('$pass')";

    $query .= " WHERE utilizador_id = $utilizador_id";
    
    $checkEmailquery = "SELECT * from utilizador WHERE email = '$email' AND utilizador_id != $utilizador_id";

    $checkEmail = mysqli_query($con, $checkEmailquery);

    $checkLoginquery = "SELECT * from utilizador WHERE login = '$login' AND utilizador_id != $utilizador_id";

    $checkLogin = mysqli_query($con, $checkLoginquery);
    
    if(mysqli_num_rows($checkEmail) == 0)
    {
        if(mysqli_num_rows($checkLogin) == 0)
        {

                $query_run = mysqli_query($con, $query);
                if($query_run)
                {   
                    $user_id = $_SESSION['user']['utilizador_id'];
                    $escaped_query = mysqli_real_escape_string($con, $query);
                    $log_query_util = "INSERT INTO logfile VALUES
                    (null, CURDATE(), '$user_id', 'Update', '$escaped_query' )";

                    $log_query_util_run = mysqli_query($con, $log_query_util);
                    
                    $res['status'] = 200;
                    $res['message'] = "Utilizador editado com sucesso";
                    echo json_encode($res);
                    return;
                    
                }
            
            
        }else
        {
            $res['status'] = 100;
            echo json_encode($res);
        }
        
    }else
    {
        $res['status'] = 300;
        echo json_encode($res);

    }

    
    
   
   
}



//Banir utilizador
if (isset($_POST['banir_utilizador'])) {
    require '../../../../bd/dbcon.php';
    $utilizador_id = mysqli_real_escape_string($con, $_POST['utilizador_id']);
    $status = mysqli_real_escape_string($con, $_POST['status']) == 'Bloqueado'? 'Ativo': 'Bloqueado';

            $query = "UPDATE utilizador set status = '$status' where utilizador_id = $utilizador_id";

            $query_run = mysqli_query($con, $query);
            $user_id = $_SESSION['user']['utilizador_id'];
            $escaped_query = mysqli_real_escape_string($con, $query);
            $log_query_util = "INSERT INTO logfile VALUES
            (null, CURDATE(), '$user_id', 'Update', '$escaped_query' )";

            $log_query_util_run = mysqli_query($con, $log_query_util);
            $res = [
                'status' => 200,
                'message' => 'Utilizador banido com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}

?>