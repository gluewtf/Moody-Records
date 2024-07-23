<?php


//Pega as noticias
function GetNoticias($con, $currentPage, $noticiasPerPage)
{
    $mes = $_GET['date'] != null ? $_GET['date'] : '';
    $tipo = $_GET['tipo'] != null ? $_GET['tipo'] : '';
    $offset = ($currentPage - 1) * $noticiasPerPage;

    if (!empty($mes)) {
        try {
            $dateTime = new DateTime($mes);
            $date = $dateTime->format("Y-m");
        } catch (Exception $e) {
            $date = '';
        }
    } else {
        $date = '';
    }
    //Esta query vai so pegar as noticias que estao entre data inicio e a data de fim
    $query = "SELECT n.*, u.nome AS autor_nome, u.apelido AS autor_apelido, img.imagem
          FROM noticia n
          LEFT JOIN imagem_noticia img ON n.noticia_id = img.noticia_id 
          LEFT JOIN utilizador u ON n.autor_id = u.utilizador_id";

    if ($date == '') { 
        $query .= " WHERE n.data_inicio <= CURRENT_DATE AND n.data_fim > CURRENT_DATE";
    } else { //Caso o filtro da data esteja ativado
        $query .= " WHERE n.data_inicio LIKE CONCAT('%', '$date', '%')";
    }
    //Caso o filtro do tipo esteja ativado
    $query .= " AND ('$tipo' = '' OR n.tipo = '$tipo')
                    AND img.local = 'F'
                    LIMIT $noticiasPerPage OFFSET $offset;";

  

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $id = $row['noticia_id'];
        $titulo = $row['titulo'];
        $data = date_create($row['data_inicio']);
        $AutorNome = $row['autor_nome'];
        $AutorApelido = $row['autor_apelido'];
        $dia = date_format($data, "d");
        $mesAno = date_format($data, "F, Y");
        $imagem = $row['imagem'];
        $tipo = $row['tipo'];
        $texto = $row['texto'];
        $textoPreview = substr($texto, 0, 250) . (strlen($texto) > 250 ? '...' : ''); //Limita o texto a 250 caracteres, depois sera adicionado '...'

        echo "
            <!-- Single Post Start -->
            <div class='single-blog-post mb-100 wow fadeInUp' data-wow-delay='100ms'>
                <!-- Post Thumb -->
                <div class='blog-post-thumb mt-30'>
                    <a href='index.php?op=12&n=$id'><img width='1200' heigth='635' src='$imagem'></a>
                    <!-- Post Date -->  
                    <div class='post-date'>
                        <span>$dia</span>
                        <span>$mesAno</span>
                    </div>
                </div>

                <!-- Blog Content -->
                <div class='blog-content'>
                    <!-- Post Title -->
                    <a href='index.php?op=12&n=$id' class='post-title'>$titulo</a>
                    <!-- Post Meta -->
                    <div class='post-meta d-flex mb-30'>
                        <p class='post-author'>By<a href='#'> $AutorNome $AutorApelido</a></p>
                        <p class='tags'>Em<a href='#'> $tipo </a></p>
                    </div>
                    <!-- Post Excerpt -->
                    <p>$textoPreview</p>
                </div>
            </div>";
    }
}


// Pega noticia clicada pelo utilizador
function GetNoticia($con)
{
    $id = $_GET['n'];
    $query = "SELECT n.*, u.nome AS autor_nome, u.apelido AS autor_apelido
                    FROM  noticia n
                    LEFT JOIN utilizador u ON n.autor_id = u.utilizador_id 
                    WHERE n.noticia_id = '$id'";

    $result = mysqli_query($con, $query);


    $row = mysqli_fetch_assoc($result);


    $data = date_create($row['data_inicio']);
    $data_formatada = date_format($data, "M d, Y");
    $texto = $row['texto'];

    $row['data_inicio'] = $data_formatada;
    $paragraphs = explode("\n\n", $texto); //Guarda o texto formatado em um array,  cada elemento e um paragrafo
    $_SESSION['noticia'] = $row;
    $_SESSION['paragraphs'] = $paragraphs;
}

//Pega as noticias mais vistas
function GetNoticiasMaisVistas($con)
{
    $query = "SELECT * from noticia
                 Order BY Qtd_vistas DESC
                 limit 10";

    $result = mysqli_query($con, $query);



    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }

    $count = 0;

    foreach ($data as $row) {
        $id = $row['noticia_id'];
        $titulo = $row['titulo'];
        $link = "index.php?op=12&n=$id";

        $count++;

        //echo"$row";
        echo "

              <div class='single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                    <div class='first-part d-flex align-items-center'>
                    <a href='$link'>
                        <div class='content-'>
                        
                            $count $titulo
                        </div>
                        </a>
                    </div>
                </div>
           
                ";
    }
}

//Pega as imagens da noticia
function GetImgs($con)
{
    $id = $_GET['n'];
    $query = "SELECT * from imagem_noticia  where noticia_id = $id and local = 'N'";

    $result = mysqli_query($con, $query);


    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }

    $count = 0;

    foreach ($data as $row) {
        $imagem = $row['imagem'];
        $descricao = $row['descricao'];

        echo "

            <div>
            <img src='$imagem'>
            <div class='card-footer' style='background-color: #E0E0E0;'>
                $descricao
            </div>
        </div>
           
                ";
    }

}

//Pega o numero de paginas totais das noticias
function getTotalPagesNoticias($con, $noticiasPerPage, $tipo, $mes)
{
    if (!empty($mes)) {
        try {
            $dateTime = new DateTime($mes);
            $date = $dateTime->format("Y-m");
        } catch (Exception $e) {
            $date = '';
        }
    } else {
        $date = '';
    }

    $query = "SELECT COUNT(*) as total 
                    FROM noticia
                    WHERE ('$tipo' = '' OR tipo = '$tipo') AND
                    data_inicio LIKE CASE WHEN '$date' = '' THEN '%%' ELSE CONCAT('%', '$date', '%') END
                    ";
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    $totalNoticias = $row['total'];
    return ceil($totalNoticias / $noticiasPerPage);
}

?>