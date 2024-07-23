<?php
    error_reporting(E_ERROR | E_PARSE);
    header('Location: index.php?op=6');
?>




<section>

<div class="modal fade" id="AlterarMetodoPagamentoModal" tabindex="-1">

        <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Alterar Metodo de Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                <form id="AlterarMetodoPagamentoForm">
                    <div class="modal-body">
                    <div id="errorMessage" class="alert alert-danger d-none"></div>

                    <input type="hidden" name="util_id" id="id">
                
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="mb-3">
                            <label class="text-center">Metodos de Pagamento</label>
                            <select class="custom-select custom-select-lg" name="pagamento">
                                <?php
                                  require "atualizarComboPagamento.php";               
                                ?>
                            </select>
                          </div>
                        </div>
                    </div>


                    
                    
                                                    
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-dark">Alterar</button>
                    </div>


                </div>
                </div>
                </form>
</div>

<!-- End Alterar Metodo Pagamento-->

<div class="modal fade" id="AlterarTransportadoraModal" tabindex="-1">

        <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header text-center">
                    <h5 class="modal-title">Alterar Transportadora</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                    </div>
                <form id="AlterarTransportadoraForm">
                    <div class="modal-body">
                    <div id="errorMessage" class="alert alert-danger d-none"></div>

                    <input type="hidden" name="util_id" id="id">
                
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <div class="mb-3">
                            <label class="text-center">Transportadora</label>
                            <select name = "transportadora" class="custom-select custom-select-lg">
                                <?php
                                  require "atualizarComboTransportadora.php";               
                                ?>
                            </select>                

                          </div>
                        </div>
                    </div>         
                                                    
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-dark">Alterar</button>
                    </div>


                </div>
                </div>
                </form>
</div>

<!-- End Alterar Transportadora-->


</section>

<div class="col-md-9">
    <div class="card">
        <div class="card-body">

            <h5 class="col-sm-10 mt-2">Pagamento</h5> 
            <div class="mb-2 row">
                <strong class="col-sm-3  mb-2 text-right ">Metodo de Pagamento</strong>
                <label class="col-sm-2.5" > <?= $_SESSION['user']['pagamento']?> </label> <div class="EditPayment EditBtnSecurity" data-toggle="modal" data-target="#AlterarMetodoPagamentoModal"s><i class="bi bi-pencil"></i></div>                 
            </div>        

            <div class="mb-2 row">
            <strong class="col-sm-3  mb-2  text-right">Transportadora</strong>
            <label class="col-sm-2.5 mb-2 "> <?= $_SESSION['user']['transportadora']?> </label> <div class="EditShip EditBtnSecurity" data-toggle="modal" data-target="#AlterarTransportadoraModal"s><i class="bi bi-pencil"></i></div>                      
            </div>
           

        </div>
    </div>
</div>