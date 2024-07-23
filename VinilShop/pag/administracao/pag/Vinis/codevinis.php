<?php

session_start();
if (isset($_GET['vinil_id'])) {
    require '../../../../bd/dbcon.php';

    $vinil_id = $_GET['vinil_id'];

    $query = "SELECT v.*, img.imagem AS imagem, a.nome AS artista, g.nome as gravadora, gn.nome as genero
    FROM vinil v
    LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
    LEFT JOIN artista a ON v.artista_id = a.Artista_id
    LEFT JOIN gravadora g ON v.gravadora_id = g.gravadora_id
    LEFT JOIN genero gn ON v.genero_id = gn.genero_id 
    WHERE v.vinil_id ='$vinil_id'
    AND img.descricao= 'I'";
    $query_run = mysqli_query($con, $query);
    $images = [];
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
            $vinil = mysqli_fetch_assoc($query_run);
            $vinil_id = $vinil["vinil_id"];
            $query_images = "SELECT * FROM imagem_vinil where vinil_id = $vinil_id"; //Pega as imagens do vinil aberto
            $query_images_run = mysqli_query($con, $query_images);
            if(mysqli_num_rows($query_images_run) == 1 ) 
            {
                $image = mysqli_fetch_array($query_images_run);
                $images[$image["imagem_id"]] = $image["imagem"];
            }else{
                if ($query_images_run->num_rows > 1) {
                    while ($rowVinil = $query_images_run->fetch_assoc()) {
    
                        $dataVinil[] = $rowVinil;
    
                    }
    
    
                    foreach ($dataVinil as $rowVinil) {
                        $images[$rowVinil["imagem_id"]] = $rowVinil["imagem"]; //Guarda as imagens em um array em que a key e o id da imagem e o value e a imagem
                    }

                    
                }

            }
           

           





        }

        //pega as musicas do vinil aberto
        $query_songs = "SELECT vm.*, m.musica_id as id_musica, m.nome as musica, m.lado as lado, m.preview as preview
        FROM vinil_musica vm
        LEFT JOIN musica m on m.musica_id = vm.musica_id
        WHERE vm.vinil_id = $vinil_id
        ORDER BY m.lado";

        $query_songs_run = mysqli_query($con, $query_songs);

        if ($query_songs_run) {
            if ($query_songs_run->num_rows > 0) {
                while ($row = $query_songs_run->fetch_assoc()) {

                    $data[] = $row;

                }
            }

            


        }

        //pega a quantidade de musicas que o vinil tem
        $query_songs_qtd = "SELECT COUNT(*) as total
        FROM vinil_musica 
        WHERE vinil_id = $vinil_id";
        $query_songs_qtd_run = mysqli_query($con, $query_songs_qtd);
        $qtd_row = mysqli_fetch_assoc($query_songs_qtd_run);
        $qtd = $qtd_row['total'];

        $lista = "";
        //Vai ser montada a lista das musicas
        foreach ($data as $row) {
            $id = $row['id_musica'];
            $lado = $row['lado'];
            $musica = $row['musica'];
            $preview = $row['preview'];
            $previewlink = str_replace('https://open.spotify.com/embed/track/', '', $preview); //Retirar o inicio do link para so ficar o resto
            if($_GET['func'] == 'view') {
            $lista .= "<li class='list-group-item'>
                            <div style='display: flex; align-items: center;'>
                                <span style='flex: 1;'>$lado: $musica</span>
                                <iframe style='border-radius: 12px; flex: 2;' src='$preview' width='100%' height='82' frameBorder='0' allowfullscreen='' allow='autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture' loading='lazy'></iframe>
                            </div>
                        </li>";
            }

            if($_GET['func'] == 'edit') {
                $lista .= " <li class='list-group-item'>
                      <div style='display: flex; flex-direction: column; align-items: flex-start;'>
                        <div style='display: flex; align-items: center; width: 100%; margin-bottom: 10px;'>
                          <span style='margin-right: 10px;'>https://open.spotify.com/embed/track/</span>
                          <input type='text' value='$previewlink' class='form-control Insertsong' id='musicaEdit' name='' style='flex: 1;'
                            required>
                        </div>
                        <div style='display: flex; align-items: center; width: 15%; margin-bottom: 10px;'>
                          <label for='inputA1' style='margin-right: 10px;'>Lado:</label>
                          <input type='text' class='form-control' value='$lado' id='ladosEdit'  name='' style='flex: 1;' required>
                        </div>
                        <div style='display: flex; align-items: center; width: 100%; margin-bottom: 10px;'>
                          <label for='inputName' style='margin-right: 10px;'>Name:</label>
                          <textarea type='text' class='form-control' id='musica_nomeEdit' ' rows='1'  name=''
                            style='flex: 1;' required>$musica</textarea>
                        </div>

                        <div style='display: flex; width: 100%; align-items: center;'>
                          <iframe style='border-radius: 12px;' id='spotify' data-music='$id' flex: 2;' src='$preview' width='100%' height='82' frameBorder='0'
                            allowfullscreen=''
                            allow='autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture'
                            loading='lazy'></iframe>
                        </div>
                      </div>
                    </li>";
                }
        }




        $res = [
            'status' => 200,
            'message' => 'Vinil Encontrado',
            'data' => $vinil,
            'lista' => $lista,
            'qtd' => $qtd,
            'imgs' => $images

        ];
        echo json_encode($res);
        return;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Vinil nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}

//Adicionar o Vinil
if (isset($_POST['salvar_vinil'])) {
    require '../../../../bd/dbcon.php';
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $artista = mysqli_real_escape_string($con, $_POST['artista']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $gravadora = mysqli_real_escape_string($con, $_POST['gravadora']);
    $desconto = mysqli_real_escape_string($con, $_POST['desconto']);
    $formato = mysqli_real_escape_string($con, $_POST['formato']);
    $catalogo = mysqli_real_escape_string($con, $_POST['catalogo']);
    $data = mysqli_real_escape_string($con, $_POST['data']);
    $data_lancamento = mysqli_real_escape_string($con, $_POST['data-lancamento']);
    $preco = mysqli_real_escape_string($con, $_POST['preco']);
    $peso = mysqli_real_escape_string($con, $_POST['peso']);
    $stock = mysqli_real_escape_string($con, $_POST['qtd_stock']);
    $views = mysqli_real_escape_string($con, $_POST['views']);
    $comprados = mysqli_real_escape_string($con, $_POST['comprados']);
    $status = mysqli_real_escape_string($con, $_POST['status']) == 'on' ? 'Publico' : 'Desativado';
    $upload = '../../../../img/vinis/';
    $musicas = mysqli_real_escape_string($con, $_POST['musicas']); //Preview das musicas que vao ser adicionadas
    $musicas = explode(',', $musicas); //Transforma a string em um array separado pelas virgulas


    $musicasNome = mysqli_real_escape_string($con, $_POST['musicas_nome']); //Nome das musicas que vao ser adicionados
    $musicasNome = explode(',', $musicasNome);

    $lados = mysqli_real_escape_string($con, $_POST['lados']); //Nome das musicas que vao ser adicionados
    $lados = explode(',', $lados);

    $query = "INSERT INTO vinil VALUES 
    (null, '$nome', '$descricao', '$tipo', '$artista', '$genero', '$gravadora', '$formato', '$catalogo', '$data_lancamento', '$data', '$preco', 
    '$peso', '$stock','$views','$comprados','$desconto','$status')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $vinil_id = mysqli_insert_id($con); //id do vinl inserido
        $user_id = $_SESSION['user']['utilizador_id'];
        $escaped_query = mysqli_real_escape_string($con, $query);
        //Inserir no Logfile
        $log_query_vinil = "INSERT INTO logfile VALUES
        (null, CURDATE(), '$user_id', 'Insert', '$escaped_query' )";

        $log_query_vinil_run = mysqli_query($con, $log_query_vinil);

        for ($i = 0; $i < 3; $i++) {
            //Pega as imagens inseridas do vinil
            $fileName = $_FILES['imagens']['name'][$i];
            $tmpName = $_FILES['imagens']['tmp_name'][$i]; //Localizacao temporario do ficheiro

            $uploadPath = $upload . $fileName; //Montagem do caminho que os ficheiros vao ser movidos
            if (move_uploaded_file($tmpName, $uploadPath)) { //Move os ficheiros introduzidos 

                $Path = "img/vinis/" . $fileName; //Caminho da imagem

                switch ($i) {
                    case '0':
                        $descricaoImg = 'I'; //Imagem Principal
                        break;
                    case '1':
                        $descricaoImg = 'F'; //Imagem Principal
                        break;
                    case '2':
                        $descricaoImg = 'B';  //Contracapa
                        break;
                }
                $insertQuery = "INSERT INTO imagem_vinil  VALUES (null,$vinil_id,'$Path', '$descricaoImg')"; //Inserir as imagens do vinil na base de dados
                $insertQuery_Run = mysqli_query($con, $insertQuery);

            }
        }

        for ($i = 0; $i < count($musicas); $i++) {
            //Inserir as musicas na base de dados
            $sql = "INSERT INTO musica  VALUES (null,'$musicasNome[$i]','$lados[$i]', '$musicas[$i]')";
            $sql_run = mysqli_query($con, $sql);
            $musica = mysqli_insert_id($con); //id da musica inserida
            //Inserir a ligacao das musicas com os vinis na base de dados
            $sql_vinil_musica = "INSERT into vinil_musica VALUES ($vinil_id, $musica)";
            $sql_vinil_music_run = mysqli_query($con, $sql_vinil_musica);
        }



        $res = [
            'status' => 200,
            'Message' => 'Utilizador adicionado com sucesso'
        ];
        echo json_encode($res);
        return;
    }
}

//Edicao do vinil 
if (isset($_POST['editar_vinil'])) {
    require '../../../../bd/dbcon.php';
    //colocar cena para adicionar e remover musicas caso haja menos musicas, dar um select nas musicas se o numero das novas for menos que o select entao delete onde o if e diferente dos ids
    $vinil_id = mysqli_real_escape_string($con, $_POST['vinil_id']);
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $tipo = mysqli_real_escape_string($con, $_POST['tipo']);
    $artista = mysqli_real_escape_string($con, $_POST['artista']);
    $genero = mysqli_real_escape_string($con, $_POST['genero']);
    $gravadora = mysqli_real_escape_string($con, $_POST['gravadora']);
    $desconto = mysqli_real_escape_string($con, $_POST['desconto']);
    $formato = mysqli_real_escape_string($con, $_POST['formato']);
    $catalogo = mysqli_real_escape_string($con, $_POST['catalogo']);
    $data = mysqli_real_escape_string($con, $_POST['data']);
    $data_lancamento = mysqli_real_escape_string($con, $_POST['data-lancamento']);
    $preco = mysqli_real_escape_string($con, $_POST['preco']);
    $peso = mysqli_real_escape_string($con, $_POST['peso']);
    $stock = mysqli_real_escape_string($con, $_POST['qtd_stock']);
    $views = mysqli_real_escape_string($con, $_POST['views']);
    $comprados = mysqli_real_escape_string($con, $_POST['comprados']);
    $status = mysqli_real_escape_string($con, $_POST['status']) == 'on' ? 'Publico' : 'Desativado';
    $upload = '../../../../img/vinis/';
    $musicas = mysqli_real_escape_string($con, $_POST['musicas']);
    $musicas = explode(',', $musicas);


    $musicasNome = mysqli_real_escape_string($con, $_POST['musicas_nome']);
    $musicasNome = explode(',', $musicasNome);

    $lados = mysqli_real_escape_string($con, $_POST['lados']);
    $lados = explode(',', $lados);

    
    $imagens_ids = mysqli_real_escape_string($con, $_POST['imagens_ids']);
    $imagens_ids = explode(',', $imagens_ids);

    $musicas_ids = mysqli_real_escape_string($con, $_POST['musicas_ids']);
    $musicas_ids = explode(',', $musicas_ids);
   
   

    $query = "UPDATE  vinil SET nome = '$nome', descricao = '$descricao', tipo = '$tipo', artista_id = '$artista', genero_id = '$genero', gravadora_id = '$gravadora', formato = '$formato',
    catalogo_numero = '$catalogo', data_lancamento = '$data_lancamento', data = '$data', preco = '$preco', peso = '$peso', Qtd_stock = '$stock', Qtd_vistas = '$views', 
    Qtd_comprados = '$comprados', desconto = '$desconto', status = '$status' WHERE vinil_id = $vinil_id ";
    // echo $query;
    $query_run = mysqli_query($con, $query);
   
    if ($query_run) {
            $user_id = $_SESSION['user']['utilizador_id'];
            $escaped_query = mysqli_real_escape_string($con, $query);
            $log_query_vinil = "INSERT INTO logfile VALUES
            (null, CURDATE(), '$user_id', 'Update', '$escaped_query' )";

            $log_query_vinil_run = mysqli_query($con, $log_query_vinil);
       
            if(count(($_FILES['imagensEdit']['name'])) > 1)
            {
                $get_images = "SELECT * from imagem_vinil where vinil_id = $vinil_id";
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
                                unlink($originalPath . $img);
                            }
                        
                    for ($i = 0; $i < $numRows; $i++) {
                        $fileName = $_FILES['imagensEdit']['name'][$i];
                        $tmpName = $_FILES['imagensEdit']['tmp_name'][$i];
                       
                        $img_id = $imagens_ids[$i];
                        $uploadPath = $upload . $fileName;
                        if (move_uploaded_file($tmpName, $uploadPath)) {
        
                            $Path = "img/vinis/" . $fileName;
        
                            switch ($i) {
                                case '0':
                                    $descricaoImg = 'I';
                                    break;
                                case '1':
                                    $descricaoImg = 'F';
                                    break;
                                case '2':
                                    $descricaoImg = 'B';
                                    break;
                            }


                            $insertQuery = "UPDATE imagem_vinil 
                                            SET 
                                                imagem = '$Path', 
                                                descricao = '$descricaoImg' 
                                            WHERE imagem_id  = $img_id
                                            ";
                            $insertQuery_Run = mysqli_query($con, $insertQuery);
                            
        
                            
        
                            
        
                        }
                }
                }
           
            }

            $sql_songs_count = "SELECT COUNT(*) as total FROM vinil_musica where vinil_id = $vinil_id";
            $sql_songs_count_run = mysqli_query($con,$sql_songs_count);
            $row_count = mysqli_fetch_assoc($sql_songs_count_run);
            $total = $row_count['total'];
            if($total > count($musicas_ids)) //Se o total de musicas editadas for menor que o numero de musicas do vinil na bd, significa que houve musicas que foram eliminadas
            {   //Deleta as musicas que pertencem ao vinil e que nao estao nas musicas editadas
                $sql = "DELETE FROM musica where musica_id IN (SELECT musica_id from vinil_musica where vinil_id = $vinil_id) AND musica_id NOT IN (";
                $sql_vinil_musica = "DELETE FROM vinil_musica where vinil_id = $vinil_id AND"; //Apaga as ligacoes
                for ($i = 0; $i < count($musicas_ids); $i++) {
                    $musica_id = $musicas_ids[$i];
                    $sql .= "$musica_id, ";
                    $sql_vinil_musica .= " musica_id != $musica_id AND ";
                }
                $sql = rtrim($sql, ', '); //Retira a virguka final
                $sql .= ")";
                $sql_vinil_musica = rtrim($sql_vinil_musica, ' AND '); //Retira o And no final
                $sql_vinil_musica_run = mysqli_query($con,$sql_vinil_musica);
                $sql_run = mysqli_query($con,$sql);

            }

            for ($i = 0; $i < count($musicas_ids); $i++) { //Atualiza as musicas que ja existem
                $musica_id = $musicas_ids[$i];
                $sql = "UPDATE musica SET nome = '$musicasNome[$i]', lado = '$lados[$i]', preview = '$musicas[$i]' 
               WHERE musica_id = $musica_id";
                $sql_run = mysqli_query($con, $sql);
            }

            if(count($musicasNome) > count($musicas_ids))
            { //Se o numero das musicas editadas for maior que os ids das musicas existente significa que e para adicionar
                for ($i = count($musicas_ids); $i < count($musicas); $i++) {
                    $sql = "INSERT INTO musica  VALUES (null,'$musicasNome[$i]','$lados[$i]', '$musicas[$i]')"; //Inserir as musicas
                    $sql_run = mysqli_query($con, $sql);
                    $musica = mysqli_insert_id($con);
                    $sql_vinil_musica = "INSERT into vinil_musica VALUES ($vinil_id, $musica)"; //Inserir as ligacoes
                    $sql_vinil_music_run = mysqli_query($con, $sql_vinil_musica);
                }
            }
            

            $res = [
                'status' => 200,
                'Message' => 'Vinil editado com sucesso',
                'artista' => $artista
            ];
            echo json_encode($res);
            return;
    }

}

//Eliminar o vinil
if (isset($_POST['eliminar_vinil'])) {
    require '../../../../bd/dbcon.php';
    $vinil_id = mysqli_real_escape_string($con, $_POST['vinil_id']);
    $status = mysqli_real_escape_string($con, $_POST['status'])  == 'Desativado'? 'Publico': 'Desativado';

    $query = "UPDATE vinil set status = '$status' WHERE vinil_id = $vinil_id";
    $query_run = mysqli_query($con, $query);
    $user_id = $_SESSION['user']['utilizador_id'];
    $escaped_query = mysqli_real_escape_string($con, $query);
    $log_query_vinil = "INSERT INTO logfile VALUES
    (null, CURDATE(), '$user_id', 'Update', '$escaped_query' )";

    $log_query_vinil_run = mysqli_query($con, $log_query_vinil);

    $res = [
        'status' => 200,
        'message' => 'Vinil eliminado com sucesso',
    ];

    echo json_encode($res);
    return;
        
     
    



}
?>