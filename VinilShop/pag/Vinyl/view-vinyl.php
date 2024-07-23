<?php
  GetVinyl($con);
  $id = $_SESSION['vinil']['vinil_id'];
  $query = "UPDATE vinil set  Qtd_vistas = Qtd_vistas + 1 WHERE vinil_id = $id";
  $query_run = mysqli_query($con, $query);
?>


    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Album Catagory Area Start ##### -->
    <section class="events-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="margin-left: 120px">
                    <div class="carousel-inner">
                        <?php
                           GetImages($con);
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>

                

                <div class="new-hits-area mb-100 mt-5 ">

                        <!-- Single Top Item -->
                        <?php
                           GetSongs($con);
                        ?>

                       
                    </div>
            </div>


        
            <div class="col-md-6">
            <div class="alert alert-success d-none mt-5" id ="adicionado_view" role="alert">
                    aaa
            </div>
                <div class="card vinyl-card">
                    <div class="card-body">
                     <div class="vinyl-name"><?= $_SESSION['vinil']['nome']?></div>
                     <div class="vinyl-band"><?= $_SESSION['vinil']['artista']?></div>
                        <span class="vinyl-band"><?= $_SESSION['vinil']['gravadora']?> |</span>  <span class="vinyl-band"><?= $_SESSION['vinil']['formato']?></span>
                     <div class="vinyl-band"><?= $_SESSION['vinil']['data_lancamento']?></div>
                     <div class="vinyl-band"><?= $_SESSION['vinil']['tipo']?></div>
                     <div class="vinyl-stock" id="stock-label" data-stock="<?php echo $_SESSION['vinil']['Qtd_stock']; ?>">Fora de stock</div>

                  </div>
                  <div class="card-footer">
                        <div class="row">
                            <div class="vinyl-price" id="price-label" preco="<?= $_SESSION['vinil']['preco']?>" desconto="<?= $_SESSION['vinil']['desconto'] ?>"><?= $_SESSION['vinil']['preco'] . "€"?> <s id="preco-antigo"></s></div>
                            <div class="wishlist-buttons">
                            <button value="<?= $_SESSION['vinil']['vinil_id']?>" class="vinyl-wishlist mr-5 AddWishBtn"><i id="icon_view<?= $_SESSION['vinil']['vinil_id']?>" class="<?php  if(isset($_SESSION['Wishlist'])){ if (in_array($_SESSION['vinil']['vinil_id'],$_SESSION['Wishlist'])) { 
                                ?>bi bi-heart-fill <?php }else{?>bi bi-heart<?php }}?>"></i></button>
                                <?php 
                                    foreach ($_SESSION['Cart'] as $item) {
                                        if ($item['vinil'] == $_SESSION['vinil']['vinil_id']) {
                                            $qtd = $item['Qtd'];
                                            break;
                                        }
                                    }
                                
                                ?>
                            <button class="vinyl-buy AddCartViewBtn" value="<?= $_SESSION['vinil']['vinil_id']?>" data-count="<?=$qtd?>">Adicionar ao Carrinho</button>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-2 accordions mb-50" id="descricao" role="tablist" aria-multiselectable="true">
                            <!-- single accordian area -->
                            <div class="single-accordion">
                                <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#descricao" href="#descricaoTexto">Descrição
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        </a></h6>
                                <div id="descricaoTexto" class="accordion-content collapse" style="">
                                    <!-- Example single danger button -->
                                    <?= $_SESSION['vinil']['descricao']?>
                                </div>
                            </div>
                </div>

                <div class="mt-2 accordions mb-50" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- single accordian area -->
                            <div class="single-accordion">
                                <h6><a role="button" class="" aria-expanded="true" aria-controls="collapseOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Detalhes
                                        <span class="accor-open"><i class="fa fa-plus" aria-hidden="true"></i></span>
                                        <span class="accor-close"><i class="fa fa-minus" aria-hidden="true"></i></span>
                                        </a></h6>
                                <div id="collapseOne" class="accordion-content collapse" style="">
                                <!--  Example single danger button -->
                                    <div class="card">
                                        <div class="card-body" style="font-size: 15px;">
                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Id: <span style="font-weight: normal;"><?= $_SESSION['vinil']['vinil_id']?></span></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;">Artista: <a class="ArtistBtn" href="#" value="<?= $_SESSION['vinil']['artista']?>" style="font-weight: normal; color: #0a9dff; font-size: 15px;"><?= $_SESSION['vinil']['artista']?></a></div>
                                        </span>

                                        <span class="d-block">
                                        <div style="font-weight: bold;" >Titulo: <span style="font-weight: normal;"><?= $_SESSION['vinil']['nome']?></span></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Gravadora: <span style="font-weight: normal;"><?= $_SESSION['vinil']['gravadora']?></a></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Catalogo Nº: <span style="font-weight: normal;"><?= $_SESSION['vinil']['catalogo_numero']?></span></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Formato: <span style="font-weight: normal;"><?= $_SESSION['vinil']['formato']?></span></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Data de Lançamento: <span style="font-weight: normal;"><?= $_SESSION['vinil']['data_lancamento']?></span></div>
                                        </span>

        
                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Tipo: <span style="font-weight: normal;"><?= $_SESSION['vinil']['tipo']?></span></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Genero: <a href="#" class="GenreBtn" value="<?= $_SESSION['vinil']['genero']?>" style="font-weight: normal; color: #0a9dff; font-size: 15px;"><?= $_SESSION['vinil']['genero']?></a></div>
                                        </span>

                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Preço: <span style="font-weight: normal;"><?= $_SESSION['vinil']['preco']?></span></div>
                                        </span>


                                        <span class="d-block">
                                            <div style="font-weight: bold;" >Peso: <span style="font-weight: normal;"><?= $_SESSION['vinil']['peso']?>g</span></div>
                                        </span>


                                    </div>
                                </div>
                            </div>
                </div>

            </div>     
            
        </div>
    </div>
</section>


