<?php
    require './pag/Login/verifica-login.php';
    GetOrder($con);
?>

 <!-- ##### Breadcumb Area Start ##### -->
 <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    </section>



<div class="container mt-5">
    <div class="card mb-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Encomenda: #<?= $_SESSION['order']['encomenda_id']; ?></h3>
            <h3 id="orderstatusLabel" style="font-weight: bold; color: red;"><?= $_SESSION['order']['status']; ?></h3>
        </div>
        
        <div class="card-body" style="background-color: lightgrey;">

            <div class="row justify-content-between align-items-center">
                <div class="col-md-2 mb-2 ml-2">
                    <button class="btn btn-primary AddAllCart">Adicionar ao carrinho</button>
                </div>

                <div class="col-md-2 mb-2">
                    <button class="btn btn-success d-none" value="<?= $_SESSION['order']['encomenda_id']; ?>" id="confirmEntrega">Confirmar Entrega</button>
                </div>

                <!-- <div class="col-md-2 mb-2">
                    <button class="btn btn-light" style="border: 1px solid black; border-radius: 5px;"> Transferir Fatura <i class="icon-download"></i></button>
                </div> -->
            </div>

                <div class="row mt-5" style="display: flex; justify-content: space-between;">
                                <div class="col-md-5">
                                    <div class="card-header" style="background-color: #E0E0E0">
                                        <i class="bi bi-geo-alt" style="font-size: 25px;"></i>
                                    </div>
                                    <div class="card-body" style="background-color: white;">
                                    <h6><?= $_SESSION['order']['user_nome']; ?> <?= $_SESSION['order']['user_apelido']; ?></h6>
                                    <h6>Tel: <?= $_SESSION['order']['telemovel']; ?></h6>
                                    <h6><?= $_SESSION['order']['cidade']; ?>, <?= $_SESSION['order']['distrito']; ?>, <?= $_SESSION['order']['pais']; ?>, <?= $_SESSION['order']['codigo_postal']; ?></h6>
                                    </div>
                                </div>  
                                
                                <div class="col-md-5">
                                    <div class="card-header" style="background-color: #E0E0E0">
                                        <i class="icon-file-2" style="font-size: 25px;"></i>
                                    </div>
                                    <div class="card-body" style="background-color: white;">
                                    <h6>Pedido feito em: <?= $_SESSION['order']['Data_Criado']; ?></h6>
                                    <h6>Forma de pagamento: <?= $_SESSION['order']['pagamento']; ?></h6>
                                    <h6>Transportadora: <?= $_SESSION['order']['transportadora']; ?></h6>
                                    </div>
                                </div>      
                </div>

                <div class="row mt-5">
                    <div class="col-md-12">
                        <ul class="list-group">
                            <?= GetVinysOrder($con); ?>

                        </ul>
                    </div>
                </div>


                    

        </div>

        <div class="card-footer" style="text-align: right;">
            <h5>Subtotal: <?= $_SESSION['order']['Preco_Total'] - $_SESSION['order']['transportadora_preco']; ?>€</h5>
            <h5>Portes: <?= $_SESSION['order']['transportadora_preco']; ?>€</h5>
            <h4>Total:  <?= $_SESSION['order']['Preco_Total']?>€</h4>
        </div>
       

    </div>

</div>