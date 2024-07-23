<?php
if (isset($_GET['imagem_id'])) {
    require '../../../../bd/dbcon.php';

    $imagem_id = $_GET['imagem_id'];

    $query = "SELECT * FROM imagem_principal where imagem_id = $imagem_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $imagem = mysqli_fetch_assoc($query_run);

           $res = [
            'status' => 200,
            'message' => 'Imagem Encontrado',
            'data' => $imagem,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Imagem nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['salvar_imagem'])) {
    require '../../../../bd/dbcon.php';
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $subtitulo = mysqli_real_escape_string($con, $_POST['subtitulo']);
    $botao = mysqli_real_escape_string($con, $_POST['botao']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $upload = '../../../../img/banners/';

    
    
    $fileName = $_FILES['imagemPrincipal']['name'][0];
    $tmpName = $_FILES['imagemPrincipal']['tmp_name'][0];

    $uploadPath = $upload . $fileName;
    if (move_uploaded_file($tmpName, $uploadPath)) {

        $Path = "img/banners/" . $fileName;

        $query = "INSERT INTO imagem_principal VALUES
    (null, '$Path', '$descricao', '$titulo', '$subtitulo', '$botao', '$link' )";

    }
    
  

    $query_run = mysqli_query($con, $query);
    if ($query_run) {


        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Imagem Principal adicionada com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

if (isset($_POST['editar_imagem'])) {
    require '../../../../bd/dbcon.php';
    $imagem_id = mysqli_real_escape_string($con, $_POST['imagem_id']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $subtitulo = mysqli_real_escape_string($con, $_POST['subtitulo']);
    $botao = mysqli_real_escape_string($con, $_POST['botao']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $upload = '../../../../img/banners/';

    
    

    if(!empty($_FILES['imagemPrincipalEdit']['name'][0])) //Se a imagem for alterada
    {  
        $get_images = "SELECT * from imagem_principal where imagem_id = $imagem_id";
        $get_images_run = mysqli_query($con, $get_images);
        $row = mysqli_fetch_assoc($get_images_run);
        $img = $row['imagem'];
        $originalPath = '../../../../';
        unlink($originalPath . $img);
                    
                

                $fileName = $_FILES['imagemPrincipalEdit']['name'][0];
                $tmpName = $_FILES['imagemPrincipalEdit']['tmp_name'][0];
                $uploadPath = $upload . $fileName;
                if(move_uploaded_file($tmpName, $uploadPath)){
                    $Path = "img/banners/" . $fileName;
                }

                $query_image = "UPDATE imagem_principal set imagem = '$Path' where imagem_id = $imagem_id";
                $query_image_run = mysqli_query($con, $query_image);

    }

   

        $query = "UPDATE imagem_principal set descricao = '$descricao', titulo = '$titulo', subtitulo = '$subtitulo', botao = '$botao',
        link = '$link'  where imagem_id = $imagem_id";
        // echo $query;
        $query_run = mysqli_query($con, $query);
        if($query_run){
            $res = [
                'status' => 200,
                'Message' => 'Imagem Principal Ediado com sucesso'
            ];
            echo json_encode($res);
            return;
        }

        
  
}

if (isset($_POST['eliminar_imagem'])) {
    require '../../../../bd/dbcon.php';
    $imagem_id = mysqli_real_escape_string($con, $_POST['imagem_id']);

            $get_images = "SELECT * from imagem_principal where imagem_id = $imagem_id";
            $get_images_run = mysqli_query($con, $get_images);
            $row = mysqli_fetch_assoc($get_images_run);
            $img = $row['imagem'];
            $originalPath = '../../../../';
            unlink($originalPath . $img);

            $query = "DELETE FROM imagem_principal WHERE imagem_id = $imagem_id";

            $query_run = mysqli_query($con, $query);
    
            $res = [
                'status' => 200,
                'message' => 'Artista eliminado com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}

?>