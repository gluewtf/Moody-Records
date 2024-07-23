<?php
$currentPage = (int) ($_GET['page']);
$noticiasPerPage = 4;
$tipo = (isset($_GET['tipo'])) ? $_GET['tipo'] : null;
$mes = (isset($_GET['date'])) ? $_GET['date'] : null;
$totalPages = getTotalPagesNoticias($con, $noticiasPerPage, $tipo, $mes);

error_reporting(E_ERROR | E_PARSE);
header('Location: index.php?op=3');

?>


<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p>Veja as Novidades</p>
        <h2>Noticias</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">

                <?php
                GetNoticias($con, $currentPage, $noticiasPerPage)
                    ?>


                <!-- Pagination -->
                <div class="oneMusic-pagination-area wow fadeInUp" data-wow-delay="300ms">
                    <nav>
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?php if ($i == $currentPage)
                                    echo 'active'; ?>">
                                    <a class="page-link" href="?op=3&page=<?= $i . buildQueryString(array_diff_key($params, ['page' => '', 'op' => '']), '&') ?>"><?= $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="col-12 col-lg-3">
                <div class="blog-sidebar-area">

                    <!-- Widget Area -->
                    <div class="single-widget-area mb-30">
                        <div class="widget-title">
                            <h5>Categorias</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="./?op=3&page=1" class="btnFiltro">Musica</a></li>
                                <li><a href="./?op=3&page=1" class="btnFiltro">Moody Records</a></li>
                                <li><a href="./?op=3&page=1" class="btnFiltro">Festivais</a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="single-widget-area mb-30">
                        <div class="widget-title">
                            <h5>Arquivo</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <?php
                                for ($j = 0; $j <= 5; $j++) { ?>
                                    <li><a href="./?op=3&page=1"
                                            class="BtnMes"><?= date("F Y", strtotime("-$j month")); ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>





                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->