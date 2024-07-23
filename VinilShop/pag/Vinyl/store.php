<?php
$currentPage = (int) ($_GET['page']);
$recordsPerPage = 12;
//Cada filtro será guardado em uma variavel, se esse mesmo  estiver ativo, cada variavel ira aparecer no Link
$search = (isset($_GET['search'])) ? $_GET['search'] : null;
$orderby = (isset($_GET['OrderBy'])) ? $_GET['OrderBy'] : null;
$PrecoMin = (isset($_GET['PrecoMin'])) ? $_GET['PrecoMin'] : null;
$PrecoMax = (isset($_GET['PrecoMax'])) ? $_GET['PrecoMax'] : null;
$filtro = (isset($_GET['filter'])) ? $_GET['filter'] : null;
//Declaração dos arrays que vão guardar os filtros selecionados
$genres_filter = [];
$tipo_filter = [];
$formato_filter = [];
$artista_filter = [];
$year_filter = [];
$promocao_filter = [];



//Montagem dos arrays com todos os filtros possiveis, que serao as categorias que permite selecionar mais que um
$Tipos = array(
    'Album',
    'EP',
    'Single'
);

$_SESSION['tipos'] = $Tipos; //Cada array  será guardado em uma variavel de sessao para a sua utilizacao em outros ficheiros

$Formatos = array(
    'LP',
    '12' . '"',
    '7' . '"',
    '10' . '"'
);

$_SESSION['formatos'] = $Formatos;

$Promomocoes = array(
    'Todos os Vinis em promoção',
    'Desconto até 30%',
    '30-50%',
    'Mais que 50%'
);

$_SESSION['promocoes'] = $Promomocoes;





if ($orderby == null) {
    unset($_SESSION['labels']);
} else {
    GetOrderBy($orderby);
}


if ($PrecoMin == null and $PrecoMax == null) {

    unset($_SESSION['PrecoMin']);
    unset($_SESSION['PrecoMax']);
}



if ($filtro == null) {
    unset($_SESSION['labels']);
    unset($_SESSION['filter']);
} else {
    foreach ($_SESSION['genres'] as $genre) { 

        if (strpos($filtro, $genre['nome']) !== false) { //precorre o array, verifica se algum genero esta presente no filtro
            $genres_filter[$genre['genero_id']] = $genre['nome']; //adiciona ao array do filtro de generos criado a cima em que o index sera o id dos generos e o seu valor será o nome do genero
        }
    }

    foreach ($_SESSION['tipos'] as $tipo) {

        if (strpos($filtro, $tipo) !== false) {
            array_push($tipo_filter, $tipo);
        }
    }

    foreach ($_SESSION['formatos'] as $formato) {

        if (strpos($filtro, $formato) !== false) {
            array_push($formato_filter, $formato);
        }
    }

    foreach ($_SESSION['artistas'] as $artista) {

        if (strpos($filtro, $artista['Nome']) !== false) {
            $artista_filter[$artista['Artista_id']] = $artista['Nome'];
        }
    }

    for ($j = 0; $j <= 90; $j++) { //Guardar os ultimos 90 anos
        $year = date("Y", strtotime("-$j year"));
        if (strpos($filtro, $year) !== false) {
            array_push($year_filter, $year);
        }
    }

    foreach ($_SESSION['promocoes'] as $promocao) {

        if (strpos($filtro, $promocao) !== false) {
            array_push($promocao_filter, $promocao);
        }
    }

}









//funcao que vai buscar o total de paginas que o paginador vai ter consoante os filtros selecionados
$totalPages = getTotalPages($con, $recordsPerPage, $search, $orderby, $genres_filter, $tipo_filter, $formato_filter, $artista_filter, $year_filter, $PrecoMin, $PrecoMax, $promocao_filter);
error_reporting(E_ERROR | E_PARSE);
header('Location: index.php?op=1');
?>


<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>Veja as novidades</p>
        <h2>Loja</h2>
    </div>
</section>


<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Album Catagory Area Start ##### -->
<section class="album-catagory section-padding-100-0">
    <div class="container">
        <div class="">

            <div class="row">
                <div class="col-12 accordions mb-50" id="filtro" role="tablist" aria-multiselectable="true">
                    <!-- single accordian area -->
                    <div class="single-accordion">
                        <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne"
                                data-toggle="collapse" data-parent="#filtro" href="#collapseOne">Filtros
                                <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                            </a></h6>
                        <div id="collapseOne" class="accordion-content collapse show" style="">
                            <!-- Example single danger button -->
                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15 "
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Géneros
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <?php foreach ($_SESSION['genres'] as $genero): ?>
                                        <a class="dropdown-item GenreItem" value="<?= $genero['nome'] ?>"
                                            style="cursor: pointer;"><?= $genero['nome'] ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Tipo
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <?php foreach ($_SESSION['tipos'] as $tipo): ?>
                                        <a class="dropdown-item TipoItem" value="<?= $tipo ?>"
                                            style="cursor: pointer;"><?= $tipo ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Formato
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <?php foreach ($_SESSION['formatos'] as $formato): ?>
                                        <a class="dropdown-item FormatoItem" value="<?= $formato ?>"
                                            style="cursor: pointer;"><?= $formato ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Artista
                                </button>
                                <div class="dropdown-menu" id="artistDropdown" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <input type="text" placeholder="Search.." id="artistInput" onkeyup="searchArtist()">
                                    <?php foreach ($_SESSION['artistas'] as $index => $artista): ?>
                                        <a class="dropdown-item ArtistaItem" value="<?= $artista['Nome'] ?>"
                                            style="<?= $index >= 10 ? 'display:none;' : '' ?> cursor: pointer;"> <!-- So irao aparecer 10 artistas visualmente-->
                                            <?= $artista['Nome'] ?></a>
                                    <?php endforeach; ?>

                                </div>


                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ano
                                </button>
                                <div class="dropdown-menu" id="yearDropdown" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <input type="text" placeholder="Search.." id="yearInput" id="yearInput"
                                        onkeyup="searchYear()">
                                    <?php
                                    for ($j = 0; $j <= 90; $j++) { ?>
                                        <a class="dropdown-item YearItem" value="<?= date("Y", strtotime("-$j year")); ?>"
                                            style="<?= $j >= 10 ? 'display:none;' : '' ?>"><?= date("Y", strtotime("-$j year")); ?></a> <!-- So irao aparecer 10 anos visualmente-->
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15 "
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Preço
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <div class="dropdown-item">
                                        <label for="pMinR" class="form-label">Preço Mínimo:</label>
                                        <input type="range" style="cursor: pointer;" min="5" max="500" value="5"
                                            class="form-range pMinR" id="pMinR">
                                        <span id="pMin">5</span>
                                    </div>
                                    <div class="dropdown-item">
                                        <label for="pMaxR" class="form-label">Preço Máximo:</label>
                                        <input type="range" style="cursor: pointer;" value="30" min="5" max="500"
                                            class="form-range pMaxR" id="pMaxR">
                                        <span id="pMax">30</span>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <div class="dropdown-item d-flex justify-content-center">
                                        <button type="button" class="btn btn-primary ml-15 BtnPreco">Aplicar</button>
                                    </div>
                                </div>

                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15 "
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Promoções
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <?php foreach ($_SESSION['promocoes'] as $index => $promocao): ?>
                                        <a class="dropdown-item PromoItem" value="<?= $promocao ?>" 
                                            style="cursor: pointer;<?= $index == 0 ? 'display:none;' : '' ?>"><?= $promocao ?></a> 
                                    <?php endforeach; ?> <!-- O filtro 'Todas as promocoes nao ira aparecer visto que ja e possivel aceder a esse filtro pelo menu de navegacao'-->
                                </div>
                            </div>






                            <div class="btn-group">
                                <button type="button" class="btn oneMusic-btn dropdown-toggle mt-15 dropdownOrderBy"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ordenar por
                                </button>
                                <div class="dropdown-menu" x-placement="bottom-start"
                                    style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 64px, 0px);">
                                    <a class="dropdown-item btnOrderBy" value="Popularidade"
                                        href="./?op=1&page=1">Popularidade</a>
                                    <a class="dropdown-item btnOrderBy" value="Adicionado ao Stock Recentemente"
                                        href="./?op=1&page=1">Adicionado ao Stock Recentemente</a>
                                    <a class="dropdown-item btnOrderBy" value="Preço (crescente)"
                                        href="./?op=1&page=1">Preço (crescente)</a>
                                    <a class="dropdown-item btnOrderBy" value="Preço (decrescente)"
                                        href="./?op=1&page=1">Preço (decrescente)</a>
                                    <a class="dropdown-item btnOrderBy" value="Ordem Alfabética (crescente)"
                                        href="./?op=1&page=1">Ordem Alfabética (crescente)</a>
                                    <a class="dropdown-item btnOrderBy" value="Ordem Alfabética (decrescente)"
                                        href="./?op=1&page=1">Ordem Alfabética (decrescente)</a>
                                    <a class="dropdown-item btnOrderBy" value="Ano de Lançamento (crescente)"
                                        href="./?op=1&page=1">Ano de Lançamento (crescente)</a>
                                    <a class="dropdown-item btnOrderBy" value="Ano de Lançamento (decrescente)"
                                        href="./?op=1&page=1">Ano de Lançamento (decrescente)</a>
                                </div>
                            </div>





                        </div>
                    </div>
                    <div class="alert alert-success d-none mt-5" id="adicionado" role="alert">

                    </div>

                    <?php foreach ($_SESSION['labels'] as $label): ?>
                        <label class="Filter-label" for=""><?= $label ?> <button class="RemoveLabelBtn"><a
                                    href="">X</a></button></label>
                    <?php endforeach; ?>
                    <?php if (count($_SESSION['labels']) > 3) { ?> 
                        <label class="Filter-label" for=""> Apagar todos os filtros <button><a
                                    href="./?op=1&page=1">X</a></button></label>
                    <?php } ?>



                </div>
            </div>

        </div>


        <div id="albuns" class="row oneMusic-albums">

            <!-- Single Album -->
            <?=
                GetVinys($con, $currentPage, $recordsPerPage, $genres_filter, $tipo_filter, $formato_filter, $artista_filter, $year_filter, $promocao_filter);
            ?>
        </div>
        <!-- Pagination -->
        <div class="oneMusic-pagination-area wow fadeInUp mb-50" data-wow-delay="300ms">
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?> <!-- Primeiro é colocado os botoes das paginas de acordo com o numero de paginas calculado pela funcao-->
                        <li class="page-item <?php if ($i == $currentPage)
                            echo 'active'; ?>"> <!-- caso o index seja  igual a pagina que nos estamos entao vai adicionar 'active a class'-->
                            <a class="page-link"
                                href="?op=<?= $params['op'] ?>&page=<?= $i . buildQueryString(array_diff_key($params, ['page' => '', 'op' => '']), '&') ?>"><?= $i; ?></a>
                                <!-- Vai ser montado entao link de cada pagina atrataves de uma funcao, a variavel 'op' vai se manter a mesma, o numero da pagina   -->
                                <!-- sera o index e será acrescentado o resto do link existente atraves de uma funcao, é preciso colocar o parametro page e op  para evitar a repeticao  -->
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
    </div>
    </div>

</section>
<!-- ##### Album Catagory Area End ##### -->



<script src="js/store/store.js" type="text/javascript"></script>

<!-- ##### Buy Now Area End ##### -->