<?php
if (isset($_GET['pagamento_id'])) {
    require '../../../../bd/dbcon.php';

    $pagamento_id = $_GET['pagamento_id'];

    $query = "SELECT * FROM metodo_pagamento where MetodoPagamento_id = $pagamento_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $pagamento = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Metodo de Pagamento Encontrado',
            'data' => $pagamento,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Metodo de Pagamento nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['salvar_pagamento'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);

    
    
   
     $query = "INSERT INTO metodo_pagamento VALUES
    (null, '$nome', '$descricao')";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Metodo de Pagamento adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_pagamento'])) {
    require '../../../../bd/dbcon.php';
    $pagamento_id = mysqli_real_escape_string($con, $_POST['pagamento_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);


    
    
   
     $query = "UPDATE metodo_pagamento set Nome = '$nome', descricao = '$descricao' where MetodoPagamento_id = $pagamento_id";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Metodo de Pagamento editado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['eliminar_pagamento'])) {
    require '../../../../bd/dbcon.php';
    $pagamento_id = mysqli_real_escape_string($con, $_POST['pagamento_id']);

            $query = "DELETE FROM metodo_pagamento WHERE MetodoPagamento_id = $pagamento_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Metodo de Pagamento eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
}

?>