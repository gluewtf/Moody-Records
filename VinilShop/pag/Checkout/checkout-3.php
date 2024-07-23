<section>
    <div class="modal fade" id="ComprarModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Comprar 
                        <i class="fa-brands fa-cc-visa"></i>
                        <i class="fa-brands fa-cc-mastercard"></i></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form id="ComprarForm" method="post">
                    <div class="modal-body">
                    <input type="hidden" name="util_id" id="id">

                    <div class="form-row">
                        <div class="mb-3 col-md-4">
                            <label for="inputNome" class="form-label">Número do Cartão</label>
                            <input pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}"  placeholder="5123 1234 1234 1234" type="text" class="form-control" name="cartao" required>
                        </div>

                        <div class="col-md-8">
                            <label for="inputNome" class="form-label">Titular</label>
                            <input type="text" class="form-control" id="inputCartao" name="titular"required>
                        </div>
                    </div>
                    <div class="form-row">

                    <div class="col-md-6">
                            <label for="inputNome" class="form-label">Data de Validade</label>
                            <input type="month" class="form-control" id="data-validade" name="date"required>
                    </div>



                        <div class="col-md-6">
                            <label for="inputNome" class="form-label">Código de Segurança(CVV)</label>
                            <input type="text" pattern="[0-9]{3}" class="form-control" id="inputCartao" name="ccv"/>
                        </div>
                    </div>



    
            </div>
            <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Comprar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
    </div>
    <!-- End Comprar Modal -->
</section>






<div class="container mt-30">
    <div class="d-flex justify-content-center">
        <div class="progress mt-15 mb-15" style="font-size: 17px; width: 100%; height: 20px;">
            <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"> Confirmação</div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">
                <div class="card mt-30 mb-50" style="min-height: 325px">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Endereço</h3>
                    </div>
                    <div class="card-body" style="display: flex; flex-direction: column; font-size: 20px;">
                        <div><?= $_SESSION['encomenda']['nome']?> <?= $_SESSION['encomenda']['apelido']?></div>
                        <div><?= $_SESSION['encomenda']['rua']?></div>
                        <div><?= $_SESSION['encomenda']['codigo_postal']?>, <?= $_SESSION['encomenda']['cidade']?></div>
                        <div><?= $_SESSION['encomenda']['distrito']?></div>
                        <div><?= $_SESSION['encomenda']['pais']?></div>
                        <div>Tel: <?= $_SESSION['encomenda']['telemovel']?></div>
                        <div style="margin-top: auto;">
                            <a href="index.php?op=9&x=1" class="EditBtn" style="font-size: 15px;"> Mudar <i class="bi bi-pencil"></i></a>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-4">
                <div class="card mt-30 mb-50" style="min-height: 325px">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Contacto</h3>
                    </div>
                    <div class="card-body" style="display: flex; flex-direction: column; font-size: 20px;">
                       <div style="font-weight: bold;">Email: </div> <div class="mb-2" ><?= $_SESSION['encomenda']['email']?></div>

                        <div style="font-weight: bold;">Telemóvel: </div> <div><?= $_SESSION['encomenda']['telemovel']?></div>

                        <div style="margin-top: auto;">
                            <a href="index.php?op=6&x=1" class="EditBtn" style="font-size: 15px;"> Mudar <i class="bi bi-pencil"></i></a>
                        </div>
                    </div>
                </div>
            </div>

             <div class="col-md-4">
                <div class="card mt-30 mb-50" style="min-height: 325px">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Transportadora/Pagamento</h3>
                    </div>
                    <div class="card-body" style="display: flex; flex-direction: column; font-size: 20px;">

                        <div style="font-weight: bold;">Método de Pagamento: </div> <div class="mb-2" ><?= $_SESSION['encomenda']['pagamento']?></div>

                        <div style="font-weight: bold;">Transportadora: </div> <div><?= $_SESSION['encomenda']['transportadora']?></div>

                        <div style="margin-top: auto;">
                            <a href="index.php?op=9&x=2" class="EditBtn" style="font-size: 15px;"> Mudar <i class="bi bi-pencil"></i></a>
                        </div>
                    </div>
                </div>
            </div>


             

             
    </div>

    <ul class="list-group mb-5">
        <li class="list-group-item position-relative">
            <?= GetCheckout($con);?>
        </li>


    </ul>

        <div class="mb-5" style="text-align: right;">
            <div class="text-end">
                <h5>Subtotal: <?= number_format(GetTotal($con), 2);?>€</h5>
                <h5>Portes: <?= $_SESSION['encomenda']['transportadora_preco']?>€</h5>
                <h4>Total: <?= number_format(GetTotal($con) + $_SESSION['encomenda']['transportadora_preco'], 2);?>€</h4>
                <button class="btn btn-dark" data-toggle="modal" data-target="#ComprarModal" style="width: 300px; font-weight: bold;">Checkout</button>
            </div>
        </div>

</div>



</div>

<script>
       
        const today = new Date();
        const year = today.getFullYear();
        const month = today.getMonth() + 1; 

   
        const mesformatado = month < 10 ? '0' + month : month;

        // Set the min attribute to the current year and month
        document.getElementById('data-validade').setAttribute('min', `${year}-${mesformatado}`);
    </script>