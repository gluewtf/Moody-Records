<?php
if (isset($_GET['genero_id'])) {
    require '../../../../bd/dbcon.php';

    $genero_id = $_GET['genero_id'];

    $query = "SELECT * FROM genero where genero_id = $genero_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $genero = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Genero Encontrado',
            'data' => $genero,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Genero nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['salvar_genero'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);

    
    
   
     $query = "INSERT INTO genero VALUES
    (null, '$nome')";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Genero adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_genero'])) {
    require '../../../../bd/dbcon.php';
    $genero_id = mysqli_real_escape_string($con, $_POST['genero_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);

    
    
   
     $query = "UPDATE genero set nome = '$nome' where genero_id = $genero_id";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Genero editado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['eliminar_genero'])) {
    require '../../../../bd/dbcon.php';
    $genero_id = mysqli_real_escape_string($con, $_POST['genero_id']);

            $query = "DELETE FROM genero WHERE genero_id = $genero_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Genero eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}

?>