<?php
if (isset($_GET['envio_id'])) {
    require '../../../../bd/dbcon.php';

    $envio_id = $_GET['envio_id'];

    $query = "SELECT * FROM metodo_envio where MetodoEnvio_id = $envio_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $envio = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Metodo de Envio Encontrado',
            'data' => $envio,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Metodo de Envio nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['salvar_envio'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $preco = mysqli_real_escape_string($con, $_POST['preco']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);

    
    
   
     $query = "INSERT INTO metodo_envio VALUES
    (null, '$nome', '$descricao', '$preco')";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Metodo de Envio adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_envio'])) {
    require '../../../../bd/dbcon.php';
    $envio_id = mysqli_real_escape_string($con, $_POST['envio_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $preco = mysqli_real_escape_string($con, $_POST['preco']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);


    
    
   
     $query = "UPDATE metodo_envio set nome = '$nome', descricao = '$descricao', preco = '$preco' where MetodoEnvio_id = $envio_id";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Metodo de Envio editado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['eliminar_envio'])) {
    require '../../../../bd/dbcon.php';
    $envio_id = mysqli_real_escape_string($con, $_POST['envio_id']);

            $query = "DELETE FROM metodo_envio WHERE MetodoEnvio_id = $envio_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Metodo de Envio eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
}

?>