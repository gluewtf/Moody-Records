<?php
    
    //Quando o utilizador volta para a pagina inicial remove o filtreo
   unset($_SESSION['filter']);
?>


<!-- ##### Hero Area Start ##### -->
<section class="hero-area">
        <div class="hero-slides owl-carousel">

            <!-- Caroucel de imagens principais-->
            <?php GetImagesPrincipal($con); ?>

        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    
    <!-- ##### Latest Albums Area Start ##### -->
    <section class="latest-albums-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Veja as novidades</p>
                        <h2>Novos Albuns</h2>
                    </div>
            <div class="row">
                <div class="col-12">
                    <div class="albums-slideshow owl-carousel">
                        <!-- Single Album -->
                        <?php
                        // Caroucel de ultimos vinis
                          GetUltimosVinis($con);
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Latest Albums Area End ##### -->

    <section>
    <div class="container">
        <div class="row mb-70">
            <!-- Generos Gerais -->
        <?php 
            $counter = 0; 
            foreach ($_SESSION['genres'] as $genero): 
                if ($counter >= 12) break; //Só podem ser apenas 12 generos gerais
                $counter++; 
            ?>
                <div class="col-12 col-sm-6 col-md-3 col-lg-2">
                    <div class="single-web-icon mb-30">
                        <a class="genre-link" href="./?op=1&page=1">
                            <img src="img/icons/<?= $genero['nome'] ?>.png" alt="A">
                            <div class="album-info">
                                <h5 value="<?= $genero['nome'] ?>" style="margin-top:10%"><?= $genero['nome'] ?></h5>
                            </div>
                        </a>
                    </div>
                </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>


    

    <!-- ##### Buy Now Area Start ##### -->
    <section class="oneMusic-buy-now-area has-fluid bg-gray section-padding-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading style-2">
                        <p>Veja os mais vendidos</p>
                        <h2>Mais Vendidos</h2>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Caroucel dos albuns mais vendidos -->
                <?php
                    GetMaisVendidos($con);
                ?>

           
        </div>

        <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="./?op=1&page=1" class="btn oneMusic-btn VerMais">Ver Mais<i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
        </div>
    </section>
    <!-- ##### Buy Now Area End ##### -->



    <!-- ##### Miscellaneous Area Start ##### -->
    <section class="miscellaneous-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- ***** Weeks Top ***** -->
                <div class="col-12 col-lg-4">
                    <div class="weeks-top-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>Top da Semana</h2>
                        </div>

                        <!-- Top 5 mais vendidos -->
                        <?php
                            GetMaisVendidosSemanal($con);
                        ?>

                    </div>
                </div>

                <!-- ***** New Hits Songs ***** -->
                <div class="col-12 col-lg-4">
                    <div class="new-hits-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms">
                            <h2>Mais vistos</h2>
                        </div>

                         <!-- Top 5 mais vistos-->

                        <?php
                            GetMaisVistos($con);
                        ?>

                    </div>
                </div>

                <!-- ***** Popular Artists ***** -->
                <div class="col-12 col-lg-4">
                    <div class="popular-artists-area mb-100">
                        <div class="section-heading text-left mb-50 wow fadeInUp" data-wow-delay="50ms" style="width: 40%">
                            <h2>Artistas Populares</h2>
                        </div>

                        <!-- Top 5 artistas populares-->
                       <?php
                            GetArtistasPopulares($con);
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Miscellaneous Area End ##### -->