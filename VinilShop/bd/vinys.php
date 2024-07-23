<?php



//Pega os ultimos vinis de a cerca uma semana
function GetUltimosVinis($con)
{
    $query = "SELECT v.*, img.imagem as imagem, a.nome as artista
            FROM vinil v
            LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id 
            LEFT JOIN artista a ON v.artista_id = a.Artista_id
            WHERE v.data BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
            AND img.descricao = 'I'
            AND v.status = 'Publico'" //As imagens com a descricao 'I' sao as imagens frontais de cada vinil
    ;
    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $id = $row['vinil_id'];
        $nome = $row['nome'];
        $artista = $row['artista'];
        $imagem = $row['imagem'];

        echo "<div class='single-album'>
                  <a href='index.php?op=7&v=$id'>
                    <img src='$imagem'>
                    <div class='album-info'>

                            <h5> $nome </h5>
                        </a>
                        <p>$artista</p>
                    </div>
                </div>";
    }
}

//Pega os mais vendidos
function GetMaisVendidos($con)
{
    $query = "SELECT v.*, img.imagem AS imagem, a.nome AS artista
                FROM vinil v
                LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
                LEFT JOIN artista a ON v.artista_id = a.Artista_id
                WHERE v.status = 'Publico'
                AND img.descricao = 'I'
                ORDER BY v.Qtd_comprados DESC
                LIMIT 10";

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $id = $row['vinil_id'];
        $nome = $row['nome'];
        $artista = $row['artista'];
        $imagem = $row['imagem'];

        echo "<div class='col-12 col-sm-6 col-md-4 custom-col-lg-2-4'>
            <div class='single-album-area wow fadeInUp' data-wow-delay='100ms'>
                <div class='album-thumb'>
                <a href='index.php?op=7&v=$id'>
                        <img src='$imagem'>
                    </div>
                    <div class='album-info'>

                            <h5> $nome </h5>
                </a>
                    <p>$artista</p>
                </div>
            </div>
        </div>";
    }
}

//pega o top 5 vinis mais vendido semanalmente
function GetMaisVendidosSemanal($con)
{
    $query = "SELECT v.*, img.imagem AS imagem, a.nome AS artista
            FROM vinil v
            LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
            LEFT JOIN artista a ON v.artista_id = a.Artista_id
            WHERE v.data BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()
            AND v.status = 'Publico'
            AND img.descricao = 'I'
            ORDER BY v.Qtd_comprados DESC
            LIMIT 5";

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $id = $row['vinil_id'];
        $nome = $row['nome'];
        $artista = $row['artista'];
        $imagem = $row['imagem'];

        echo "<div class='single-top-item d-flex wow fadeInUp' data-wow-delay='100ms'>
                        <div class='thumbnail'>
                            <img src='$imagem'>
                        </div>
                        <div class='content-'>
                        <a href='index.php?op=7&v=$id'>
                        <h6> $nome </h6>
                        </a>
                            <p>$artista</p>
                        </div>
                    </div>";
    }
}

//pega os mais vistos
function GetMaisVistos($con)
{
    $query = "SELECT v.*, img.imagem AS imagem, a.nome AS artista
            FROM vinil v
            LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
            LEFT JOIN artista a ON v.artista_id = a.Artista_id
            WHERE v.status = 'Publico'
            AND img.descricao = 'I'
            ORDER BY v.Qtd_vistas DESC
            LIMIT 5";

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $id = $row['vinil_id'];
        $nome = $row['nome'];
        $artista = $row['artista'];
        $imagem = $row['imagem'];

        echo "<div class='single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                    <div class='first-part d-flex align-items-center'>
                        <div class='thumbnail'>
                            <img src='$imagem'>
                        </div>
                        <div class='content-'> 
                            <a href='index.php?op=7&v=$id'>
                            <h6> $nome </h6>
                            </a>
                            <p>$artista</p>
                        </div>
                    </div>
                </div>";
    }
}

//Pega os artistas mais populares,de acordo com os vinis mais vistos ex: se o Mickael Jackson tiver o vinil mais visto, ele vai ser o artista mais popular
function GetArtistasPopulares($con)
{
    $query = "WITH artist_views AS 
                 ( SELECT a.artista_id, a.nome AS artista, a.foto AS imagem, SUM(v.Qtd_vistas) AS total_vistas 
                  FROM vinil v LEFT JOIN artista a ON v.artista_id = a.Artista_id 
                  GROUP BY a.artista_id, a.nome, a.foto ) 
                  SELECT artista_id, artista, imagem, total_vistas 
                  FROM artist_views ORDER BY total_vistas DESC 
                  LIMIT 5";

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $id = $row['artista_id'];
        $artista = $row['artista'];
        $imagem = $row['imagem'];

        echo " <div class='single-artists d-flex align-items-center wow fadeInUp' data-wow-delay='100ms'>
                        <div class='thumbnail'>
                            <img width='100' height='100' src='$imagem'>
                        </div>
                        <div class='content-'>
                            <p>$artista</p>
                        </div>
                    </div>";
    }
}

//Pega o vinil que se está a visualizar
function GetVinyl($con)
{
    $id = $_GET['v'];
    $query = "SELECT v.*, a.artista_id as artista_id, a.nome AS artista, g.nome as gravadora, YEAR(v.data_lancamento) AS data_lancamento, gn.nome as genero
                    FROM vinil v
                    LEFT JOIN artista a ON v.artista_id = a.Artista_id
                    LEFT JOIN gravadora g ON v.gravadora_id = g.gravadora_id
                    LEFT JOIN genero gn ON v.genero_id = gn.genero_id
                    WHERE v.vinil_id = '$id'";

    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);
    $preco = $row['preco'];
    $desconto = $row['desconto'];
    //Verifica se o vinil esta em desconto
    if ($desconto > 0 && $desconto != null) {
        $preco = $preco - ($preco * ($desconto / 100));
        $preco = number_format($preco, 2);
    }

    $row['preco'] = $preco;
    $_SESSION['vinil'] = $row;

}

//Pega as musicas do vinil que se esta a visualizar
function GetSongs($con)
{
    $id = $_GET['v'];

    $query = "SELECT musica.* 
                  FROM musica 
                  LEFT JOIN vinil_musica ON musica.musica_id = vinil_musica.musica_id 
                  LEFT JOIN vinil ON vinil_musica.vinil_id = vinil.vinil_id 
                  WHERE vinil.vinil_id = '$id'
                  Order By lado";

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }


    foreach ($data as $row) {
        $nome = $row['nome'];
        $lado = $row['lado'];
        $preview = $row['preview'];

        echo "<div class='single-new-item d-flex align-items-center justify-content-between wow fadeInUp' data-wow-delay='100ms'>
                <div class='first-part d-flex align-items-center'>
                    <div class='content-'>
                        <h6>$lado:  $nome</h6>
                    </div>
                </div>
                <iframe style='border-radius:12px' src='$preview' width='65%' height='82' frameBorder='0' allowfullscreen='' allow='autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture' loading='lazy'></iframe>
            </div>";
    }
}

//Pega as Imagens do vinil que se esta a visualizar
function GetImages($con){
    $id = $_GET['v'];

    $query = "SELECT * 
                  FROM imagem_vinil 
                  WHERE vinil_id = '$id'";

    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }

    $images = '';
    foreach ($data as $row) {
        $imagem = $row['imagem'];
        $lado = $row['descricao'];
            switch ($lado) {
                case 'I':
                    //Imagem Principal
                    $images .= "<div class='carousel-item active'>
                                <img src='$imagem' class='img-thumbnail'>
                            </div>";
                    break;
                case 'F':
                    //Imagem Frontal
                    $images .= "<div class='carousel-item'>
                                <img src='$imagem' class='img-thumbnail'>
                            </div>";
                    break;
                case 'B':
                    //Contracapa
                    $images .= "<div class='carousel-item'>
                                <img src='$imagem' class='img-thumbnail'>
                            </div>";
                    break;
        }
    }

    echo $images;
}

//Pega todos os vinis publicos para ser mostrado na loja principal
function GetVinys($con, $currentPage, $recordsPerPage, $genres, $tipos, $formatos, $artistas, $anos, $promos) //Os filtros que permitem selecionar  vários vão ser enviados nos parametros
{
    $OrderBy = $_GET['OrderBy'] ? $_GET['OrderBy'] : null;
    $offset = ($currentPage - 1) * $recordsPerPage;
    $searchTerm = $_GET['search'] != null ? $_GET['search'] : '';
    $precoMin = $_GET['PrecoMin'] ? $_GET['PrecoMin'] : '';
    $precoMax = $_GET['PrecoMax'] ? $_GET['PrecoMax'] : '';
    $isNew = $_GET['new'] ? true : false;
    $query = "SELECT v.*, img.imagem AS imagem, a.artista_id AS artista_id, a.nome AS artista, g.nome AS gravadora, YEAR(v.data_lancamento) AS data_lancamento, gn.nome AS genero
                    FROM vinil v
                    LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
                    LEFT JOIN artista a ON v.artista_id = a.Artista_id
                    LEFT JOIN gravadora g ON v.gravadora_id = g.gravadora_id
                    LEFT JOIN genero gn ON v.genero_id = gn.genero_id
                    WHERE (v.nome LIKE CASE WHEN '$searchTerm' = '' THEN '%%' ELSE CONCAT('%', '$searchTerm', '%') END
                    OR a.nome LIKE CASE WHEN '$searchTerm' = '' THEN '%%' ELSE CONCAT('%', '$searchTerm', '%') END)
                    AND v.status = 'Publico'
                    AND img.descricao = 'I'
                ";
    
    if ($isNew) { //Caso seja selecionado Novos Vinis
        array_push($_SESSION['labels'], 'Novos Vinis'); //Adiciona ao array the labels
        $query .= " AND v.data BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";
    }
    $query .= GetGenresFilter($genres);
    $query .= GetTipoFilter($tipos);
    $query .= GetFormatoFilter($formatos);
    $query .= GetArtistaFilter($artistas);
    $query .= GetAnoFilter($anos);
    $query .= GetPrecoFilter($precoMin, $precoMax);
    $query .= GetSalesFilter($promos);

    $query .= GetOrderBy($OrderBy)  != ""? GetOrderBy($OrderBy): "ORDER BY v.data DESC";

    $query .= " LIMIT $recordsPerPage OFFSET $offset;"; //Depois de adicionar todos os filtros, e adicionado  a query 'LIMIT', para limitar os vinis que vao aparecer por pagina

    // echo $query;
    $result = mysqli_query($con, $query);

    if ($result) {






        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $data[] = $row;

            }
        }

        // echo $query;
        $vinil = '';
        foreach ($data as $row) {
            $id = $row['vinil_id'];
            $nome = $row['nome'];
            $lado = $row['lado'];
            $imagem = $row['imagem'];
            $tipo = $row['tipo'];
            $artista = $row['artista'];
            $preco = $row['preco'];
            $desconto = $row['desconto'];

            if ($desconto > 0 && $desconto != null) {
                $preco_com_desconto = $preco - ($preco * ($desconto / 100));
                $preco_com_desconto = number_format($preco_com_desconto, 2);
            }

            $vinil .= "<div class='col-12 col-sm-4 col-md-3 col-lg-2 single-album-item t c p'>
                <div class='single-album'>
                    <a href='index.php?op=7&v=$id'>
                        <div class='single-album-area'>
                            <div class='album-thumb'>
                                <img src='$imagem' alt=''>
                                <div class='record-type'>
                                    <p>$tipo</p>
                                </div>
                            </div>
                            <div class='album-info'>
                                <h5>$nome</h5>
                                <p style='color:black'>$artista</p>
                                <div class='album-price'>";

            if ($desconto > 0 && $desconto != null) { //Verifica se o vinil esta em desconto, para colocar o seu preco verdadeiro
                $vinil .= "<p><s>$preco" . "€</s> <div style='color: red;'>$preco_com_desconto" . "€ </div></p>";
            } else {
                $vinil .= "<p>$preco" . "€</p>";
            }



            $vinil .= "         </div>
                                    </a>
                                   ";
            if (isset($_SESSION['Wishlist'])) { //Aqui vai ser adicionado o botao de adicionar a lista de desejos, caso esse vinil ja esteja na lista entao o icon vai ser diferente
                if (in_array($id, $_SESSION['Wishlist'])) {
                    $vinil .= " <div class='album-wishlist'>
                                            <a href='#' class='AddWishlistBtn'  value='$id'><p><span id='icon_$id'class='bi bi-heart-fill'></span></p></a>
                                    </div>";
                } else {
                    $vinil .= "<div class='album-wishlist'>
                                            <a href='#' class='AddWishlistBtn'  value='$id'><p><span  id='icon_$id' class='bi bi-heart'></span></p></a>
                                    </div>";
                }

            }

            $found = false;
            if (isset($_SESSION['Cart'])) { //Porcura do vinil no carrinho
                foreach ($_SESSION['Cart'] as $item) {
                    if ($item['vinil'] == $id) {
                        $found = true;
                        $Qtd = $item['Qtd'];
                        break;
                    }
                }

                if ($found) { //Aqui vai ser adicionado o botao de adicionar ao carrinho, caso esse vinil ja esteja no carrinho entao o icon vai ser diferente
                    $vinil .= " <div class='album-cart'>
                                            <a href='#' class='AddCartBtn' data-count='$Qtd' value='$id'><p><span id='iconCart_$id'class='bi bi-cart-x-fill'></span></p></a>
                                    </div>";
                } else {
                    $vinil .= "<div class='album-cart'>
                                            <a href='#' class='AddCartBtn' data-count='0' value='$id'><p><span  id='iconCart_$id' class='bi bi-cart-plus'></span></p></a>
                                    </div>";
                }

            }


            $vinil .= " 
                                </div>
                            </div>
                        </div>
                    </div>";




        }
        return $vinil;

    }








}
//Pega a quantia de paginas de acordo com os filtros selecionados
function getTotalPages($con, $recordsPerPage, $search, $orderby, $genres_filter, $tipos_filter, $formatos_filter, $artistas_filter, $years_filter, $precoMin, $precoMax, $promocao_filter)
{
    //Os filtros sao enviados atraves dos parametros
    $searchTerm = $search != null ? $search : '';
    $OrderBy = $orderby != null ? $orderby : '';
    $genres_array = $genres_filter != null ? $genres_filter : '';
    $tipos_array = $tipos_filter != null ? $tipos_filter : '';
    $formatos_array = $formatos_filter != null ? $formatos_filter : '';
    $artistas_array = $artistas_filter != null ? $artistas_filter : '';
    $years_array = $years_filter != null ? $years_filter : '';
    $PrecoMin = $precoMin != null ? $precoMin : '';
    $PrecoMax = $precoMax != null ? $precoMax : '';
    $promo_array = $promocao_filter != null ? $promocao_filter : '';
    $isNew = isset($_GET['new']) ? true : false;
    $query = "SELECT COUNT(*) as total 
                    FROM vinil v
                    LEFT JOIN genero gn ON v.genero_id = gn.genero_id
                    LEFT JOIN artista a ON v.artista_id = a.Artista_id
                    WHERE v.nome LIKE CASE WHEN '$searchTerm' = '' THEN '%%' ELSE CONCAT('%', '$searchTerm', '%') END
                    AND v.status = 'Publico'
                                            ";
  
    $query .= GetGenresFilter($genres_array);
    $query .= GetTipoFilter($tipos_array);
    $query .= GetFormatoFilter($formatos_array);
    $query .= GetArtistaFilter($artistas_array);
    $query .= GetAnoFilter($years_array);
    $query .= GetPrecoFilter($PrecoMin, $PrecoMax);
    $query .= GetSalesFilter($promo_array);
    if ($isNew) {
        array_push($_SESSION['labels'], 'Novos Vinis');
        $query .= " AND v.data BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()";
    }
    $query .= GetOrderBy($OrderBy);
    // echo $query;
    $result = mysqli_query($con, $query);
    $row = $result->fetch_assoc();
    $totalRecords = $row['total'];
    return ceil($totalRecords / $recordsPerPage); //Retorna  o numero total de paginas
}


//Pega os parametros do url PHP existente
function parseQueryString()
{
    $queryString = $_SERVER['QUERY_STRING']; //Pega o link que o utilizador está
    parse_str($queryString, $params); //Converte para um array os parametros
    return $params;
}

$params = parseQueryString(); //Parametros do Link

function buildQueryString($params, $char) //Construcao do novo link, é enviado atraves dos parametros, os parametros do LINK e tambem o seu character '?' ou '&' 
{
    $queryString = http_build_query($params);
    return $queryString ? $char . $queryString : '';
}

//Pega os generos
function GetGenres($con)
{
    $query = "SELECT * FROM genero";
    $result = mysqli_query($con, $query);
    if ($result) {
        $genres = [];
        while ($row = $result->fetch_assoc()) {
            $genres[] = $row;
        }

        $_SESSION['genres'] = $genres;
    }
}

//Pega os artistas
function GetArtists($con)
{
    $query = "SELECT * FROM artista Order by Nome";
    $result = mysqli_query($con, $query);
    if ($result) {
        $artistas = [];
        while ($row = $result->fetch_assoc()) {
            $artistas[] = $row;
        }

        $_SESSION['artistas'] = $artistas;
    }
}
//Atualiza as labels do orderby, para que nao haja repeticao
function updateOrderByLabel(&$labels, $newLabel) //O parametro 'labels' tem mum & antes que permite alterar a variavel global e nao ser apenas uma variavel local da funcao
{

    $orderLabels = [
        "Popularidade",
        "Adicionado ao Stock Recentemente",
        "Preço (crescente)",
        "Preço (decrescente)",
        "Ordem Alfabética (crescente)",
        "Ordem Alfabética (decrescente)",
        "Ano de Lançamento (crescente)",
        "Ano de Lançamento (decrescente)",
        "Mais Vendido"
    ];

    //se existir alguma label de orderby remove
    $labels = array_diff($labels, $orderLabels);

    $labels[] = $newLabel; //E adicionado ao array a nova label do order by
}


//Pega a ordem presente no filtro
function GetOrderBy($OrderBy)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    if ($OrderBy and isset($_SESSION['labels'])) {


        if (!in_array($OrderBy, $_SESSION['labels'])) { //Verifica se esse filtro ja nao existe
            $labels[] = $OrderBy;
        }
    }






    //Verificar se ja nao existe uma label de orderby, caso sim, entao remove e adiciona a nova
    switch ($OrderBy) {
        case "Popularidade":
            updateOrderByLabel($_SESSION['labels'], "Popularidade");
            return "ORDER BY v.Qtd_vistas DESC";
        case "Adicionado ao Stock Recentemente":
            updateOrderByLabel($_SESSION['labels'], "Adicionado ao Stock Recentemente");
            return "ORDER BY v.data DESC";
        case "Preço (crescente)":
            updateOrderByLabel($_SESSION['labels'], "Preço (crescente)");
            return "ORDER BY v.preco";
        case "Preço (decrescente)":
            updateOrderByLabel($_SESSION['labels'], "Preço (decrescente)");
            return "ORDER BY v.preco DESC";
        case "Ordem Alfabética (crescente)":
            updateOrderByLabel($_SESSION['labels'], "Ordem Alfabética (crescente)");
            return "ORDER BY v.nome";
        case "Ordem Alfabética (decrescente)":
            updateOrderByLabel($_SESSION['labels'], "Ordem Alfabética (decrescente)");
            return "ORDER BY v.nome DESC";
        case "Ano de Lançamento (crescente)":
            updateOrderByLabel($_SESSION['labels'], "Ano de Lançamento (crescente)");
            return "ORDER BY v.data_lancamento";
        case "Ano de Lançamento (decrescente)":
            updateOrderByLabel($_SESSION['labels'], "Ano de Lançamento (decrescente)");
            return "ORDER BY v.data_lancamento DESC";
        case "Mais Vendido":
            updateOrderByLabel($_SESSION['labels'], "Mais Vendido");
            return "ORDER BY v.Qtd_Comprados DESC";
    }
}

//Pega os generos presentes no filtro
function GetGenresFilter($genre) //array dos generos presentes no filtro
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';

    if ($genre) {



        foreach ($genre as $key => $value) {
            $newQuery .= "v.genero_id = '$key' OR ";

            if (!in_array($value, $_SESSION['labels'])) {
                $labels[] = $value; //É montado o array das novas labels a adicionar
            }
        }

        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels); //Junta o array the labels original com as novas labels
        $newQuery = substr($newQuery, 0, -4); //Retira o OR no final da query
        $newQuery .= ")";
        return $newQuery;
    }
}

//Pega os tipos presentes no filtro
function GetTipoFilter($tipo)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';



    if ($tipo) {

        //$labels = $labels ?? [];



        foreach ($tipo as $key => $value) {
            $newQuery .= "v.tipo = '$value' OR ";

            if (!in_array($value, $_SESSION['labels'])) {
                $labels[] = $value;
            }
        }

        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels);
        $newQuery = substr($newQuery, 0, -4);
        $newQuery .= ")";
        return $newQuery;
    }






}
//Pega os formatos presentes no filtro
function GetFormatoFilter($formato)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';



    if ($formato) {



        foreach ($formato as $key => $value) {
            $newQuery .= "v.formato = '$value' OR ";

            if (!in_array($value, $_SESSION['labels'])) {
                $labels[] = $value;
            }
        }

        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels);
        $newQuery = substr($newQuery, 0, -4);
        $newQuery .= ")";
        return $newQuery;
    }






}

//Pega os artistas presentes no filtro
function GetArtistaFilter($artista)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';

    if ($artista) {


        foreach ($artista as $key => $value) {
            $newQuery .= "v.artista_id = '$key' OR ";

            if (!in_array($value, $_SESSION['labels'])) {
                $labels[] = $value;
            }
        }

        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels);
        $newQuery = substr($newQuery, 0, -4);
        $newQuery .= ")";
        return $newQuery;
    }






}

//Pega os anos presentes no filtro
function GetAnoFilter($year)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';

    if ($year) {




        foreach ($year as $key => $value) {
            $newQuery .= "YEAR(v.data_lancamento) = '$value' OR ";

            if (!in_array($value, $_SESSION['labels'])) {
                $labels[] = $value;
            }
        }

        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels);
        $newQuery = substr($newQuery, 0, -4);
        $newQuery .= ")";
        return $newQuery;
    }






}

//Pega os precos min e max presentes no filtro
function GetPrecoFilter($precoMin, $precoMax)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';

    if ($precoMin and $precoMax) {


        // Remove os precos existente nas  labels
        foreach ($_SESSION['labels'] as $key => $label) {
            if (preg_match('/^\d+ - \d+$/', $label)) { //Se o formato coincidir com este entao
                unset($_SESSION['labels'][$key]);
            }
        }


        $newQuery .= "v.preco > $precoMin and v.preco < $precoMax";

        $labels[] = "$precoMin - $precoMax";


        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels);
        $newQuery .= ")";
        return $newQuery;
    }
}

//Pega os descontos  presentes no filtro
function GetSalesFilter($sale)
{
    $labels = [];

    if (!isset($_SESSION['labels'])) {
        $_SESSION['labels'] = [];
    }

    $newQuery = 'AND (';

    if ($sale) {
        foreach ($sale as $key => $value) {
            switch ($value) {
                case 'Todos os Vinis em promoção':
                    $newQuery .= "(v.desconto IS NOT NULL AND v.desconto > 0)";
                    break;
                case 'Desconto até 30%':
                    $newQuery .= "v.desconto <= 30 AND v.desconto > 0 OR ";
                    break;
                case '30-50%':
                    $newQuery .= "v.desconto > 30 AND v.desconto <= 50 AND v.desconto > 0 OR ";
                    break;
                case 'Mais que 50%':
                    $newQuery .= "v.desconto > 50 AND v.desconto > 0 OR ";
                    break;
            }

            if (!in_array($value, $_SESSION['labels'])) {
                $labels[] = $value;
            }
        }

        $_SESSION['labels'] = array_merge($_SESSION['labels'], $labels);
        $newQuery = rtrim($newQuery, ' AND '); //Remove o 'AND' caso este fique no final da string
        $newQuery = rtrim($newQuery, ' OR '); //Remove o 'OR' caso este fique no final da string
        $newQuery .= ")";
        return $newQuery;
    }






}
//Remove alguma label do filtro
function RemoveLabels($label, $url) //E enviado atraves dos parametros, a label a remover o link que o utilizador esta localizado
{

    $queryString = parse_url($url, PHP_URL_QUERY); //Conversao para um link que permite a sua conversao para um array de parametros
    parse_str($queryString, $params);

    foreach ($params as $key => $value) { 
        if (strpos($value, $label) !== false) { //Encontrar onde a label a remover esta localizada
            if ($key == 'filter') {
                $params['filter'] = str_replace($label, '', $params['filter']); //Retirar a label dos parametreos
                $params['filter'] = trim($params['filter'], ','); //Retirar a virgula que sobra
                $_SESSION['filter'] = str_replace($label, '', $_SESSION['filter']); //Retirar a label do filtro
                $_SESSION['filter'] = trim($_SESSION['filter'], ','); //Retirar a virgula que sobra
                if (empty($params['filter'])) { //Se o filtro ficar vazio entao 
                    unset($params['filter']);
                }
            }

            if ($key == 'OrderBy') { //Caso a label esteja presente no parametro orderby
                unset($params['OrderBy']); 
            }

           



        }


    }



    if (preg_match('/^\d+ - \d+$/', $label)) { //Se a label coincidir com este formato, entao significa que e um preco min-preco max
        unset($_SESSION['labels'][$label]);
        unset($params['PrecoMin']);
        unset($params['PrecoMax']);
    }

    if ($label == 'Novos Vinis') {
        unset($params['new']);
    }




    $newQueryString = buildQueryString($params, '?'); //Montagem do novo link

        //E retirado entao a label do array de labels
        $key = array_search($label, $_SESSION['labels']);
        if ($key !== false) {
            unset($_SESSION['labels'][$key]);
            $_SESSION['labels'] = array_values($_SESSION['labels']);
        }

    return $newQueryString;
}

//Pega os vinis da lista de desejos
function GetVinysWishList($con)
{

    if (!isset($_SESSION['Wishlist'])) {
        $_SESSION['Wishlist'] = [];
    }


    $query = "SELECT v.*, img.imagem AS imagem, a.artista_id AS artista_id, a.nome AS artista
                    FROM vinil v
                    LEFT JOIN artista a ON v.artista_id = a.Artista_id
                    LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
                    WHERE v.status = 'Publico'
                    AND img.descricao = 'I'";

    if (!empty($_SESSION["Wishlist"])) {
        $query .= " AND (";
        foreach ($_SESSION["Wishlist"] as $value) {
            $query .= "v.vinil_id = $value OR ";
        }
        $query = substr($query, 0, -4); //Retira o OR do final da query
        $query .= ")";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $data[] = $row;

                }
            }
            $content = "";
            foreach ($data as $row) {

                $id = $row["vinil_id"];
                $imagem = $row["imagem"];
                $nome = $row["nome"];
                $artista = $row["artista"];
                $preco = $row["preco"];

                $content .= "  <li class='list-group-item'>
                    <div class='row mt-3'>
                        <div class='col-md-4'>
                        <a href='index.php?op=7&v=$id'>
                            <img src='$imagem'>
                        </a>
                        </div>
                        <div class='col-md-8'>
                            <a href='index.php?op=7&v=$id'>
                                <h5 style='word-wrap: break-word;'>$nome</h5>
                                <h5 style='word-wrap: break-word;'>$artista</h5>
                               </a>
                            
                            <div class='d-flex justify-content-between mt-50'>
                                <div style='color: #0a9dff; font-size: 20px;'>
                                    <span>$preco" . "€" . "</span>
                                </div>
                                <div class='wishlist-buttons'>
                                    <button value='$id' class='RemoveWishBtn' style='color: pink; margin-right: 5px;'><i class='bi bi-x-circle'></i></button>";

                $founded = false;
                if (isset($_SESSION['Cart'])) {
                    foreach ($_SESSION['Cart'] as $item) { //Verifica se o vinil que esta na lista de desejos, esta no carrinho
                        if ($item['vinil'] == $id) {
                            $founded = true;
                            $Qtd = $item['Qtd'];
                            break;
                        }
                    }

                    if ($founded) { //Se for encontrado entao, o botao e outro
                        $content .= "<button class='AddWishlistCartBtn' data-count='$Qtd' value='$id' style='color: #0a9dff;'><i id='iconCartWish_$id'class='bi bi-cart-x-fill'></i></button>";
                    } else {
                        $content .= "<button class='AddWishlistCartBtn' data-count='0' value='$id' style='color: #0a9dff;'><i id='iconCartWish_$id'class='bi bi-cart-plus'></i></button>";
                    }

                }

                $content .= "
                                </div>
                            </div>
                        </div>
                    </div>
                </li>";
            }
            return $content;

        }
    }









}

//Pega os vinis do carrinho
function GetVinysCart($con)
{

    if (!isset($_SESSION['Cart'])) {
        $_SESSION['Cart'] = [];

    }




    $query = "SELECT v.*, img.imagem AS imagem, a.artista_id AS artista_id, a.nome AS artista, g.nome AS gravadora, gn.nome AS genero
                    FROM vinil v
                    LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
                    LEFT JOIN artista a ON v.artista_id = a.Artista_id
                    LEFT JOIN gravadora g ON v.gravadora_id = g.gravadora_id
                    LEFT JOIN genero gn ON v.genero_id = gn.genero_id
                    WHERE v.status = 'Publico'
                    AND img.descricao = 'I'";

    if (!empty($_SESSION["Cart"])) {
        $query .= " AND (";
        foreach ($_SESSION["Cart"] as $value) {
            $vinil = $value['vinil'];
            $query .= "v.vinil_id = $vinil OR ";
        }
        // echo $query;
        $query = substr($query, 0, -4);
        $query .= ")";
        $result = mysqli_query($con, $query);

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $data[] = $row;

                }
            }
            $content = "";
            foreach ($data as $row) {

                $id = $row["vinil_id"];
                $imagem = $row["imagem"];
                $nome = $row["nome"];
                $artista = $row["artista"];
                $preco = $row["preco"];
                $genero = $row["genero"];
                $formato = $row["formato"];

                $tipo = $row["tipo"];
                foreach ($_SESSION['Cart'] as $item) { //Procura a quantidade de cada vinil no carrinho
                    if ($item['vinil'] == $id) {
                        $Qtd = $item['Qtd'];
                        break;
                    }
                }


                $content .= " <li class='list-group-item'>
                                    <div class='row align-items-center'>
                                        <div class='col-md-3'>
                                            <a href='index.php?op=7&v=$id'>
                                            <img src='$imagem' class='vinyl-image-cart'>
                                            </a>
                                        </div>
                                        <div class='col-md-6'>
                                            <h5>$nome</h5>
                                            <div>$artista</div>
                                            <div>$genero</div>
                                            <div>$formato</div>
                                            <div>$tipo</div>
                                            <div>Quantidade <input type='number' class='QtdVinil' data-vinyl='$id' value='$Qtd' min='1' max='10' ></div>
                                        </div>
                                        <div class='col-md-3 text-end'>
                                            <div style='font-size: 20px; font-weight: bold;'>
                                                $preco" . "€" . "
                                            </div>
                                            <div>";
                if (isset($_SESSION['Wishlist'])) {
                    if (in_array($id, $_SESSION['Wishlist'])) {
                        $content .= " <a href='#' value='$id' id='wish_$id'class='CartWishListAdd' style='color: #1c6fb8'>Adicionado à lista de desejos</a><br>";
                    } else {
                        $content .= "<a href='#' value='$id' id='wish_$id' class='CartWishListAdd' style='color: #1c6fb8'>Adicionar à lista de desejos</a><br>";
                    }
                }
                $content .= "
                                                <a href='#' value='$id' class='CartRemove' style='color: #1c6fb8'>Remover</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>";
            }
            return $content;

        }
    }






}

//Calcula o Total do carrinho
function GetTotal($con)
{
    $query = "SELECT * FROM vinil ";

    if (!empty($_SESSION["Cart"])) {
        $query .= "WHERE (";
        foreach ($_SESSION["Cart"] as $value) { 
            $vinil = $value['vinil'];
            $query .= "vinil_id = $vinil OR ";
        }
        $query = substr($query, 0, -4);
        $query .= ")";
        $result = mysqli_query($con, $query); //Pega os vinis presentes no carrinho

        if ($result) {
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $data[] = $row;

                }
            }

            $total = 0;
            foreach ($data as $row) {

                $id = $row["vinil_id"];
                $preco = $row["preco"];
                foreach ($_SESSION['Cart'] as $item) { //Faz a soma de cada vinil que vai ser a quantidade X preco
                    if ($item['vinil'] == $id) {
                        $total += $item['Qtd'] * $preco;
                        break;
                    }
                }




            }
            return $total;
        }

    }
}

//Pega os recomendados no carrinho
function GetRecomendados($con)
{   //Vai pegar os vinis de acordo com os generos e artistas do carrinho
    $query = "SELECT v.*, img.imagem as imagem, a.nome as artista
        FROM vinil v
        LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id 
        LEFT JOIN artista a ON v.artista_id = a.Artista_id 
        WHERE img.descricao = 'I'
        AND v.status = 'Publico'";


    //Pega os vinis existentes no carrinhos para de seguida pegar os generos
    $generos = "SELECT *
        FROM vinil
        WHERE";
    $generos .= " (";
    foreach ($_SESSION["Cart"] as $value) {
        $vinil = $value['vinil'];
        $generos .= "vinil_id = $vinil OR ";
    }

    $generos = substr($generos, 0, -4);
    $generos .= ")";

    $result = mysqli_query($con, $generos);


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }

    //Pega os vinis com o genero existente no carrinho
    $query .= " AND (v.genero_id IN(";
    foreach ($data as $row) {
        $genero = $row['genero_id'];
        $query .= "'$genero',";

    }

    $query = substr($query, 0, -1);
    $query .= ")";

    //Pega os vinis com os artistas existentes no carrinho
    $query .= " OR v.artista_id IN(";
    foreach ($data as $row) {
        $artista = $row['artista_id'];
        $query .= "'$artista',";

    }

    $query = substr($query, 0, -1); //Retira a virgula
    $query .= "))";



    //Pega so os vinis que nao estao no carrinho
    $query .= " AND v.vinil_id NOT IN (";
    foreach ($_SESSION["Cart"] as $value) {
        $vinil = $value['vinil'];
        $query .= "'$vinil',";
    }

    $query = substr($query, 0, -1);
    $query .= ")";


    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }

    foreach ($data as $row) {
        $id = $row['vinil_id'];
        $nome = $row['nome'];
        $artista = $row['artista'];
        $imagem = $row['imagem'];

        echo " <div class='single-album'>
                            <a href='index.php?op=7&v=$id'>
                                <img src='$imagem'>
                                <div class='album-info'>

                                        <h5>$nome</h5>
                                    </a>
                                    <p>$artista</p>
                                </div>
                    </div>";
    }
}

//Pega a lista dos vinis no checkout
function GetCheckout($con)
{


    $query = "SELECT v.*, img.imagem AS imagem, a.artista_id AS artista_id, a.nome AS artista, gn.nome AS genero
                    FROM vinil v
                    LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
                    LEFT JOIN artista a ON v.artista_id = a.Artista_id
                    LEFT JOIN genero gn ON v.genero_id = gn.genero_id
                    WHERE v.status = 'Publico'
                    AND img.descricao = 'I'";

    $query .= " AND (";
    foreach ($_SESSION["Cart"] as $value) {
        $vinil = $value['vinil'];
        $query .= "v.vinil_id = $vinil OR ";
    }
    // echo $query;
    $query = substr($query, 0, -4);
    $query .= ")";
    $result = mysqli_query($con, $query);

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

                $data[] = $row;

            }
        }
        $content = "";
        foreach ($data as $row) {

            $id = $row["vinil_id"];
            $imagem = $row["imagem"];
            $nome = $row["nome"];
            $artista = $row["artista"];
            $preco = $row["preco"];
            $genero = $row["genero"];
            $formato = $row["formato"];

            $tipo = $row["tipo"];
            foreach ($_SESSION['Cart'] as $item) {
                if ($item['vinil'] == $id) {
                    $Qtd = $item['Qtd'];
                    break;
                }
            }

            $preco = number_format($preco * $Qtd, 2);


            $content .= "<li class='list-group-item position-relative'>
                                <div class='row align-items-center'>
                                    <div>
                                      <a href='index.php?op=7&v=$id'>
                                        <img src='$imagem' class='vinyl-image-cart'>
                                      </a>
                                    </div>
                                    <div class='col-md-6'>
                                        <h5>$nome</h5>
                                        <div>$artista</div>
                                        <div>$genero</div>
                                        <div>$formato</div>
                                        <div>Quantidade: $Qtd</div>
                                    </div>
                                    <div class='col-md-3 text-end'>
                                        <div style='font-size: 20px; font-weight: bold; position: absolute; top: 5px; right: 5px;'>
                                            $preco" . "€" . "
                                        </div>
                                    </div>
                                </div>
                            </li>";
        }
        return $content;

    }




    // return $query;





}

//Pega as imagens principais
function GetImagesPrincipal($con)
{
    $query = "SELECT * FROM imagem_principal";
    $result = mysqli_query($con, $query);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $data[] = $row;

        }
    }

    shuffle($data);
    foreach ($data as $row) {
        $imagem = $row['imagem'];
        $titulo = $row['titulo'];
        $subtitulo = $row['subtitulo'];
        $botao = $row['botao'];
        $link = $row['link'];

        echo "<div class='single-hero-slide d-flex align-items-center justify-content-center'>
                <!-- Slide Img -->
                <div class='slide-img bg-img' width='1920px' height='1280px' style='background-image: url($imagem);'></div>
                <!-- Slide Content -->
                <div class='container'>
                    <div class='row'>
                        <div class='col-12'>
                            <div class='hero-slides-content text-center'>
                                <h2 data-animation='fadeInUp' data-delay='300ms'>$titulo</h2>
                                <h6 data-animation='fadeInUp' data-delay='100ms'>$subtitulo</h6>
                                <a data-animation='fadeInUp' data-delay='500ms' href='$link' target='_blank' class='btn oneMusic-btn mt-50'>$botao<i class='fa fa-angle-double-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
    }

}

?>