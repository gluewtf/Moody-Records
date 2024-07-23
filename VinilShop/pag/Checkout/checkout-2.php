
<!-- Metodo Envio Modal-->

<section>
    <div class="modal fade" id="AlterarMetodoEnvioModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Método de Envio</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form id="AlterarMetodoEnvioForm" method="POST">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-danger d-none"></div>
                        <input type="hidden" name="util_id" id="id">
                        <div class="mb-3">
                            <label for="validationCustom01">Método de Envio</label>
                            <select id="envio" class="form-control" required>
                                <?php
                                  require "pag\User\atualizarComboTransportadora.php";               
                                ?>
                               
                            </select>
                        </div>
                            <h5 style="display: inline-block; vertical-align: middle;" id="transportadora"></h5>
                            <h6 id="transportadora-descricao"></h6>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark salvarInfoEnvio">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Metodo Envio Modal-->

<section>
    <div class="modal fade" id="AlterarMetodoPagamentoEncomendaModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Método de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                </div>
                <form id="AlterarMetodoPagamentoForm" method="POST">
                    <div class="modal-body">
                        <div id="errorMessage" class="alert alert-danger d-none"></div>
                        <input type="hidden" name="util_id" id="id">
                        <div class="mb-3">
                            <label for="validationCustom01">Método de Pagamento</label>
                            <select class="form-control" id="pagamento" required>
                            <?php
                                  require "pag\User\atualizarComboPagamento.php";               
                                ?>
                            </select>
                        </div>
                        <h5 id="pagamentoNome" style="display: inline-block; vertical-align: middle;"> 
                    

                    </h5>
                    <h6 id="pagamento-descricao"> </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-dark">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</section>
<!-- Metodo Pagamento Modal-->




<div class="container mt-30">
    <div class="d-flex justify-content-center">
        <div class="progress mt-15 mb-15" style="font-size: 17px; width: 100%; height: 20px;">
            <div class="progress-bar" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"> Método de Envio / Método De Pagamento</div>
        </div>
    </div>

    <!-- Metodo Envio-->

    <div class="row">
        <div class="col-md-12">
            <div class="card mt-30 mb-50">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Método de Envio</h3>
                    <div class="EditBtn EditMetodoEnvioBtn" style="font-size: 15px;"> Mudar Método de Envio <i class="bi bi-pencil"></i></div>
                </div>
                <div class="card-body">
                    <h5 style="display: inline-block; vertical-align: middle;" id="TransportadoraNome"> <?= $_SESSION['encomenda']['transportadora']?> (<?= $_SESSION['encomenda']['transportadora_preco']?>€)</h5>
                    <h6 id="TransportadoraDescricao"><?= $_SESSION['encomenda']['transportadora_descricao']?></h6>
                </div>
            </div>
        </div>

        <!-- Metodo Pagamento-->

        <div class="col-md-12">
            <div class="card mt-1 mb-50">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Método de Pagamento</h3>
                    <div class="EditBtn EditMetodoPagamentoBtn" style="font-size: 15px;"> Mudar Método de Pagamento <i class="bi bi-pencil"></i></div>
                </div>
                <div class="card-body">
                    <div id="encomenda-pagamento-info">
                    <h5 style="display: inline-block; vertical-align: middle;" id="TransportadoraNome"> <?= $_SESSION['encomenda']['pagamento']?></h5>
                    <h6 id="TransportadoraDescricao"><?= $_SESSION['encomenda']['pagamento_descricao']?></h6>
                    </h5>
                </div>
            </div>
        <div class="mb-30" style="display: flex; justify-content: space-between;">
            <a href="index.php?op=9&x=1" class="btn btn-light border border-secondary" style="width: 250px"> Voltar </a>
            <a href="index.php?op=9&x=3" class="btn btn-dark" style="width: 250px"> Continuar </a>
        </div>

        </div>
    </div>
</div>
