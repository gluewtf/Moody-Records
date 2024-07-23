<?php
    error_reporting(E_ERROR | E_PARSE);
    header('Location: index.php?op=8');
    $shipping =  isset($_SESSION['user']['transportadora_preco'])? $_SESSION['user']['transportadora_preco']: 0.00 ;
?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    </section>
    
<div class="container">
            <div class="alert alert-success d-none mt-5" id ="adicionado_cart" role="alert">

            </div>
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-30 mb-15">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Carrinho de Compras</h3>
                    <?php 
                                            $count = 0;
                                            foreach ($_SESSION['Cart'] as $value){
                                                $count += $value['Qtd'];
                                            }
                    ?> 

                    <div style="font-size: 20px; font-weight: bold;">Conteudo: <span id="conteudoTOTAL"><?= $count; ?></span> Itens</div>
                </div>
                <div class="card-body">

                    <ul class="list-group" id="carrinho">
                        <?= GetVinysCart($con); ?>

                    </ul>
                    <?php if (empty($_SESSION['Cart'])){ ?>
                        <h2 id="emptyCart" class="">O seu carrinho está vazio!!</h2>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if (!empty($_SESSION['Cart'])){ ?>
            <div id="checkoutContent" class="col-md-4">
                <div class="card mt-30 mb-15 mr-15">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Total</h3>  
                    </div>
                    <div class="card-body">
                        <h6>Subtotal: <span class="float-right" id="subtotal"><?= number_format(GetTotal($con), 2);?>€</span></h6>
                        <h6>Portes: <span class="float-right"><?= $shipping;?>€</span></h6>
                        <h5>Total: <span class="float-right" id="total"><?= number_format(GetTotal($con) + $shipping, 2);?>€</span></h5>
                    </div>

                    <div class="card-footer">
                        <?php  if(!empty($_SESSION['user'])){
                            $checkout = "index.php?op=9&x=1";
                        }
                        else{
                            $_SESSION['login_error'] = 'É preciso uma conta para realizar encomendas!';
                            $checkout = "index.php?op=5";
                        }?>
                        <a href="<?= $checkout; ?>" class="btn btn-dark d-block mx-auto" style="width: 200px; font-weight: bold;">Checkout</a>
                    </div>
                </div>

                <div class="card mt-15 mb-15 mr-15">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Pagar com:</h4>  
                    </div>
                    <div class="card-body">
                        <div style="font-size: 25px">
                            <i class="fa-brands fa-cc-visa"></i>
                            <i class="fa-brands fa-cc-mastercard"></i>
                        </div>

                    </div>


                </div>
            </div>

        <?php } ?>


    </div>
    <?php if (!empty($_SESSION['Cart'])){ ?>
    <div id="recomendados" class="row mt-30">

                <h6 class="recomendacao-titulo"> Recomendacoes para o teu carrinho</h6>
                    <div class="col-12">
                        <div class="albums-slideshow owl-carousel">
                            <!-- Single Album -->
                            <?php GetRecomendados($con);?>
                        </div>
                    </div>
                </div>
    </div>
    <?php } ?>

