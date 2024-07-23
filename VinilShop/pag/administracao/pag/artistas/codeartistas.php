<?php
if (isset($_GET['artista_id'])) {
    require '../../../../bd/dbcon.php';

    $artista_id = $_GET['artista_id'];

    $query = "SELECT * FROM artista where Artista_id = $artista_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $artista = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Artista Encontrado',
            'data' => $artista,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Artista nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['salvar_artista'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $upload = '../../../../img/artistas/';

    
    
    $fileName = $_FILES['fotoArtista']['name'][0];
    $tmpName = $_FILES['fotoArtista']['tmp_name'][0];

    $uploadPath = $upload . $fileName;
    if (move_uploaded_file($tmpName, $uploadPath)) {

        $Path = "img/artistas/" . $fileName;

        $query = "INSERT INTO artista VALUES
    (null, '$nome', '$Path')";

    }
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Artista adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_artista'])) {
    require '../../../../bd/dbcon.php';
    $artista_id = mysqli_real_escape_string($con, $_POST['artista_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $upload = '../../../../img/artistas/';

    
    

    if(!empty($_FILES['fotoArtistaEdit']['name'][0])) 
    {  
        $get_images = "SELECT * from artista where Artista_id = $artista_id";
        $get_images_run = mysqli_query($con, $get_images);
        $row = mysqli_fetch_assoc($get_images_run);
        $img = $row['foto'];
        $originalPath = '../../../../';
        unlink($originalPath . $img);
                    
                

                $fileName = $_FILES['fotoArtistaEdit']['name'][0];
                $tmpName = $_FILES['fotoArtistaEdit']['tmp_name'][0];
                $uploadPath = $upload . $fileName;
                if(move_uploaded_file($tmpName, $uploadPath)){
                    $Path = "img/artistas/" . $fileName;
                }

                $query_image = "UPDATE artista set foto = '$Path' where Artista_id = $artista_id";
                $query_image_run = mysqli_query($con, $query_image);

    }

   

        $query = "UPDATE artista set Nome = '$nome' where Artista_id = $artista_id";
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $res = [
                'status' => 200,
                'Message' => 'Artista Ediado com sucesso'
            ];
            echo json_encode($res);
            return;
        }

        

        

    

  
}

if (isset($_POST['eliminar_artista'])) {
    require '../../../../bd/dbcon.php';
    $artista_id = mysqli_real_escape_string($con, $_POST['artista_id']);

            $get_images = "SELECT * from artista where Artista_id = $artista_id";
            $get_images_run = mysqli_query($con, $get_images);
            $row = mysqli_fetch_assoc($get_images_run);
            $img = $row['foto'];
            $originalPath = '../../../../';
            unlink($originalPath . $img);

            $query = "DELETE FROM artista WHERE Artista_id = $artista_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Artista eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}
?>