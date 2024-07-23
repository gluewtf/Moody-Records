<?php
session_start();
if (isset($_GET['noticia_id'])) {
    require '../../../../bd/dbcon.php';

    $noticia_id = $_GET['noticia_id'];

    $query = "SELECT n.*, u.nome as autor_nome, u.apelido as autor_apelido
              FROM noticia n
              LEFT JOIN utilizador u on n.autor_id = u.utilizador_id
              where noticia_id = $noticia_id";
    $query_run = mysqli_query($con, $query);
    
    //pega as imagens das noticias
   $imagens_query = "SELECT * FROM imagem_noticia where noticia_id = $noticia_id";
   $imagens_run = mysqli_query($con, $imagens_query);

   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $noticia = mysqli_fetch_assoc($query_run);

                if($imagens_run){                                                           
                    if ($imagens_run->num_rows > 0) {
                        $imagens = [];
                        while ($row = $imagens_run->fetch_assoc()) {
                    
                            $imagens[$row['imagem_id']] = [
                                'imagem' => $row['imagem'],
                                'descricao' => $row['descricao'],
                                'local' => $row['local']
                            ];
                                    
                        }
                    }

                    
                }    

           $res = [
            'status' => 200,
            'message' => 'Noticia Encontrado',
            'data' => $noticia,
            'imagens' => $imagens,
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Noticia nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

//Adicionar noticia
if (isset($_POST['salvar_noticia'])) {
    require '../../../../bd/dbcon.php';
    $autor = $_SESSION['user']['utilizador_id'];
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $texto = mysqli_real_escape_string($con, $_POST['texto']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $data_inicio = mysqli_real_escape_string($con, $_POST['data-inicio']);
    $data_fim = mysqli_real_escape_string($con, $_POST['data-fim']);
    $views = mysqli_real_escape_string($con, $_POST['views']);
    $status = mysqli_real_escape_string($con, $_POST['status']) == 'on' ? 'Publico' : 'Desativado';
    $upload = '../../../../img/noticias/';
    $legendas = mysqli_real_escape_string($con, $_POST['legendas']);
    $legendas = explode(',', $legendas);
    $locais = mysqli_real_escape_string($con, $_POST['locais']);
    $locais = explode(',', $locais);

    $query = "INSERT INTO noticia VALUES
    (null, '$autor', '$titulo', '$tipo', '$texto', '$link', '$views', '$data_inicio', '$data_fim', '$status')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $noticia_id = mysqli_insert_id($con);

        for ($i = 0; $i < count($legendas); $i++) {
            $fileName = $_FILES['noticiasImagens']['name'][$i]; //Localizacao original do ficheiro
            $tmpName = $_FILES['noticiasImagens']['tmp_name'][$i]; //Localizacao temporario do ficheiro

            $uploadPath = $upload . $fileName;
            if (move_uploaded_file($tmpName, $uploadPath)) {

                $Path = "img/noticias/" . $fileName;

                $insertQuery = "INSERT INTO imagem_noticia  VALUES (null,$noticia_id,'$Path', '$legendas[$i]', '$locais[$i]')";
                $insertQuery_Run = mysqli_query($con, $insertQuery);

            }
        }



        // $log = "";

        $res = [
            'status' => 200,
            'Message' => 'Noticia adicionada com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

//Editar noticia
if (isset($_POST['editar_noticia'])) {
    require '../../../../bd/dbcon.php';
    $noticia_id = mysqli_real_escape_string($con, $_POST['noticia_id']);
    $autor = $_SESSION['user']['utilizador_id'];
    $titulo = mysqli_real_escape_string($con, $_POST['titulo']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $texto = mysqli_real_escape_string($con, $_POST['texto']);
    $link = mysqli_real_escape_string($con, $_POST['link']);
    $data_inicio = mysqli_real_escape_string($con, $_POST['data-inicio']);
    $data_fim = mysqli_real_escape_string($con, $_POST['data-fim']);
    $views = mysqli_real_escape_string($con, $_POST['views']);
    $status = mysqli_real_escape_string($con, $_POST['status']) == 'on' ? 'Publico' : 'Desativado';
    $upload = '../../../../img/noticias/';
    $legendas = mysqli_real_escape_string($con, $_POST['legendas']);
    $legendas = explode(',', $legendas);
    $locais = mysqli_real_escape_string($con, $_POST['locais']);
    $locais = explode(',', $locais);
    $imagens_ids = mysqli_real_escape_string($con, $_POST['imagens_ids']);
    $imagens_ids = explode(',', $imagens_ids);

   

    $query = "UPDATE  noticia SET titulo = '$titulo', tipo = '$tipo', texto = '$texto', link = '$link', Qtd_vistas =  '$views', data_inicio = '$data_inicio',
    data_fim = '$data_fim', status = '$status'
    WHERE noticia_id = $noticia_id ";
    // echo $query;
    $query_run = mysqli_query($con, $query);
   
    if ($query_run) {

       
            if(count(($_FILES['noticiasImagensEdit']['name'])) > 1)
            {
                $get_images = "SELECT * from imagem_noticia where noticia_id = $noticia_id";
                $get_images_run = mysqli_query($con, $get_images);
                $data = array();
                    if ($get_images_run) {
                          $numRows = $get_images_run->num_rows;
                            if ($numRows > 0) {
                                while ($row = $get_images_run->fetch_assoc()) {
            
                                    $data[] = $row;
            
                                }
                            }
                           
                            foreach ($data as $row) {
                                $img = $row['imagem'];
                                $originalPath = '../../../../';
                                unlink($originalPath . $img); //remove as imagens antigas
                            }
                        
                            $deleteQuery = "DELETE FROM imagem_noticia
                            WHERE noticia_id  = $noticia_id
                            ";
                            $deleteQuery_run = mysqli_query($con, $deleteQuery);
            
                    for ($i = 0; $i < count($legendas); $i++) { //Adiciona as imagens novas
                        $fileName = $_FILES['noticiasImagensEdit']['name'][$i];
                        $tmpName = $_FILES['noticiasImagensEdit']['tmp_name'][$i];
                       
                        $uploadPath = $upload . $fileName;
                        if (move_uploaded_file($tmpName, $uploadPath)) {
        
                            $Path = "img/noticias/" . $fileName;
        
                            


                            $insertQuery = "INSERT INTO imagem_noticia  VALUES (null,$noticia_id,'$Path', '$legendas[$i]', '$locais[$i]')";
                            $insertQuery_Run = mysqli_query($con, $insertQuery);
                            
        
                            
        
                            
        
                        }
                }
                }
           
            }
            else { //Atualiza apenas as legendas e o local da imagem  se as imagem nao for mudada
                    for ($i = 0; $i < count($imagens_ids); $i++) {
                    
                        $img_id = $imagens_ids[$i];
        
                            $UpdateQuery = "UPDATE imagem_noticia
                                            SET 
                                                descricao = '$legendas[$i]',
                                                local = '$locais[$i]'
                                            WHERE imagem_id  = $img_id
                                            ";
                            $UpdateQuery_Run = mysqli_query($con, $UpdateQuery);                    
                        
                }
            }

            

            $res = [
                'status' => 200,
                'Message' => 'Noticia editada com sucesso',
            ];
            echo json_encode($res);
            return;
    }

}

if (isset($_POST['eliminar_noticia'])) {
    require '../../../../bd/dbcon.php';
    $noticia_id = mysqli_real_escape_string($con, $_POST['noticia_id']);






    $get_images = "SELECT * from imagem_noticia where noticia_id = $noticia_id";
    $get_images_run = mysqli_query($con, $get_images);
    $data = array();
    if ($get_images_run) {
        if ($get_images_run->num_rows > 0) {
            while ($row = $get_images_run->fetch_assoc()) {

                $data[] = $row;

            }
        }

       


            $query = "DELETE FROM noticia WHERE noticia_id = $noticia_id";

            $query_run = mysqli_query($con, $query);
            if($query_run)
            {
                foreach ($data as $row) {
                    $img = $row['imagem'];
                    $path = '../../../../';
                    unlink($path . $img);
                }
                
                $res = [
                    'status' => 200,
                    'message' => 'Noticia eliminada com sucesso',
                ];
        
                echo json_encode($res);
                return;
            }
          
        
     
    }



}
?>