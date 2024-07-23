<?php
  GetNoticia($con);
  $id = $_SESSION['noticia']['noticia_id'];
  $query = "UPDATE noticia set  Qtd_vistas = Qtd_vistas + 1 WHERE noticia_id = $id";
  $query_run = mysqli_query($con, $query);
?>

<section class="breadcumb-area bg-img bg-overlay d-flex justify-content-center" style="background-image: url(img/bg-img/breadcumb3.jpg);">
</section>

    <section>

    </section>

<div class="container mt-30">
        <div class="text-center noticia-title">
            <?= $_SESSION['noticia']['titulo']?>
        </div>


        <div class="row justify-content-center">
    <!-- Col-8 (Main Content on the Left) -->
    <div class="col-8">
        <div class="noticias-slideshow owl-carousel-noticia">
            <!-- Single Album -->

           <?php
            GetImgs($con);
           ?>

    
        </div>

        <div class="noticia-autor-line">
            <div class="autor-wrapper">
                <h6> <?= $_SESSION['noticia']['autor_nome'] . ' ' . $_SESSION['noticia']['autor_apelido']?></h6>
                <div><?= $_SESSION['noticia']['tipo']?></div>
            </div>
                <div><?=$_SESSION['noticia']['data_inicio']?></div>
        </div>

        <hr class="hr" style="margin-bottom: 50px"/>

        <!-- Percorrer cada paragrafo -->
        <?php foreach ($_SESSION['paragraphs'] as $paragraph): ?>
            <p style="font-size: 20px" class="mb-50">
                <!-- Fazer a formatacao dos paragrafos -->
                <?= nl2br($paragraph) ?> 
            </p>
        <?php endforeach; ?>

    </div>

    <!-- Col-4 (Additional Content on the Right) -->
    <div class="col-4">
        <h4>MAIS LIDAS</h4>
        <div class="new-hits-area mb-100 ">
            
            <?php
                GetNoticiasMaisVistas($con)
            ?>
        </div>
    </div>

    <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center wow fadeInUp" data-wow-delay="300ms">
                        <a href="<?=$_SESSION['noticia']['link']?>" target="_blank" class="btn oneMusic-btn mb-50 ">Ver Mais<i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
    </div>
</div>

</div>

