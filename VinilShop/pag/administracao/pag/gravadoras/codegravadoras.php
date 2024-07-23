<?php
if (isset($_GET['gravadora_id'])) {
    require '../../../../bd/dbcon.php';

    $gravadora_id = $_GET['gravadora_id'];

    $query = "SELECT * FROM gravadora where gravadora_id = $gravadora_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $gravadora = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Gravadora Encontrado',
            'data' => $gravadora,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Gravadora nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['salvar_gravadora'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);

    
    
   
     $query = "INSERT INTO gravadora VALUES
    (null, '$nome')";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Gravadora adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_gravadora'])) {
    require '../../../../bd/dbcon.php';
    $gravadora_id = mysqli_real_escape_string($con, $_POST['gravadora_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);

    
    
   
     $query = "UPDATE gravadora set nome = '$nome' where gravadora_id = $gravadora_id";

    
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Gravadora editado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['eliminar_gravadora'])) {
    require '../../../../bd/dbcon.php';
    $gravadora_id = mysqli_real_escape_string($con, $_POST['gravadora_id']);

            $query = "DELETE FROM gravadora WHERE gravadora_id = $gravadora_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Gravadora eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}
?>