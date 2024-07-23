<?php
if (isset($_GET['evento_id'])) {
    require '../../../../bd/dbcon.php';

    $evento_id = $_GET['evento_id'];

    $query = "SELECT * FROM evento where evento_id = $evento_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $evento = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Evento Encontrado',
            'data' => $evento,
    
        ];

        echo json_encode($res);
        return;
        
        }
    }
}

if (isset($_POST['salvar_evento'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $data_inicio = mysqli_real_escape_string($con, $_POST['data-inicio']);
    $data_fim = mysqli_real_escape_string($con, $_POST['data-fim']);
    $local = mysqli_real_escape_string($con, $_POST['local']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $upload = '../../../../img/eventos/';

    
    
    $fileName = $_FILES['eventoImagem']['name'][0];
    $tmpName = $_FILES['eventoImagem']['tmp_name'][0];

    $uploadPath = $upload . $fileName;
    if (move_uploaded_file($tmpName, $uploadPath)) {

        $Path = "img/eventos/" . $fileName;

        $query = "INSERT INTO evento VALUES
    (null,'$Path', '$data_inicio', '$data_fim', '$nome', '$link', '$local')";

    }
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Evento adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_evento'])) {
    require '../../../../bd/dbcon.php';
    $evento_id = mysqli_real_escape_string($con, $_POST['evento_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $data_inicio = mysqli_real_escape_string($con, $_POST['data-inicio']);
    $data_fim = mysqli_real_escape_string($con, $_POST['data-fim']);
    $local = mysqli_real_escape_string($con, $_POST['local']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $upload = '../../../../img/eventos/';

    
    if(!empty($_FILES['eventoEditImagem']['name'][0])) 
    {  
        $get_images = "SELECT * from evento where evento_id = $evento_id";
        $get_images_run = mysqli_query($con, $get_images);
        $row = mysqli_fetch_assoc($get_images_run);
        $img = $row['imagem'];
        $originalPath = '../../../../';
        unlink($originalPath . $img);
                    
                

                $fileName = $_FILES['eventoEditImagem']['name'][0];
                $tmpName = $_FILES['eventoEditImagem']['tmp_name'][0];
                $uploadPath = $upload . $fileName;
                if(move_uploaded_file($tmpName, $uploadPath)){
                    $Path = "img/eventos/" . $fileName;
                }

                $query_image = "UPDATE evento set imagem = '$Path' where evento_id = $evento_id";
                $query_image_run = mysqli_query($con, $query_image);

    }

   

        $query = "UPDATE evento SET data_inicio = '$data_inicio',  data_fim = '$data_fim', nome = '$nome', link = '$link', local = '$local' where evento_id = $evento_id";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $res = [
                'status' => 200,
                'Message' => 'Evento alterado com sucesso'
            ];
            echo json_encode($res);
            return;
        }
}

if (isset($_POST['eliminar_evento'])) {
    require '../../../../bd/dbcon.php';
    $evento_id = mysqli_real_escape_string($con, $_POST['evento_id']);

            $get_images = "SELECT * from evento where evento_id = $evento_id";
            $get_images_run = mysqli_query($con, $get_images);
            $row = mysqli_fetch_assoc($get_images_run);
            $img = $row['imagem'];
            $originalPath = '../../../../';
            unlink($originalPath . $img);

            $query = "DELETE FROM evento WHERE evento_id = $evento_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Evento eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}

?>