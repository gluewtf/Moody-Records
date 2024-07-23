<?php
    error_reporting(E_ERROR | E_PARSE);
    header('Location: index.php?op=6');
?>


<section>
    <div class="modal fade" id="AlterarDadosModal" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Informação Pessoal</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                                  </div>
                              <form id="AlterarDadosForm">
                                  <div class="modal-body">
                                    <div id="errorMessage" class="alert alert-danger d-none"></div>

                                    <input type="hidden" name="util_id" id="id">

                                    <div class="mb-3">
                                    <label for="inputNome" class="form-label">Nome</label>
                                      <input type="text" class="form-control" id="inputName1" name="nome" required></input>
                                    </div>

                                    <div class="mb-3">
                                    <label for="inputNome" class="form-label">Apelido</label>
                                      <input type="text" class="form-control" id="inputName1" name="apelido" required></input>
                                    </div>

                                    <div class="mb-3">
                                    <label for="inputNome" class="form-label">Telemovel</label>
                                      <input type="tel" class="form-control" pattern="[0-9]*" maxlength="9" id="inputName1" name="telemovel"></input>
                                    </div>

                                    <div class="mb-4">
                                        <hr class="dotted">
                                    </div>

                                  

                                    
                                    <div class="mb-3">
                                      <label for="">País</label>
                                      <input type="text" class="form-control" id="inputMorada4" name="pais" required></input>
                                    </div>
                                    

                                    <div class="mb-3">
                                      <label for="">Código Postal</label>
                                      <input type="text" name="postal_code" class="form-control" id="maskedInput"  data-mask="0000-000" placeholder="____-___" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="">Distrito</label>
                                      <input type="text" class="form-control" id="inputMorada4" name="distrito" required></input>
                                    </div>

                                    <div class="mb-3">
                                      <label for="">Cidade</label>
                                      <input type="text" class="form-control" id="inputMorada4" name="cidade" required></input>
                                    </div>

                                    
                                    <div class="mb-3">
                                      <label for="">Rua</label>
                                      <input type="text" class="form-control" id="inputMorada4" name="rua" required></input>
                                    </div>


                                    
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>


                                </div>
                              </div>
                            </form>
                        </div>
</section>
<!-- End Informacao pesoal Modal-->

<div class="col-md-9">
    <div class="card">
        <div class="card-body" id="InfoCard">

        <div class="interactions">
                    <div class="EditBtn" data-toggle="modal"><i class="EditInformation bi bi-pencil"></i></div>
        </div>

            <h5 class="col-sm-2 mt-2">Nome</h5> 
            
            <div class="mb-2 row">
                <strong class="col-sm-2 mb-2 text-right ">Nome</strong>
                <label class="col-sm-2 mb-2"> <?= $_SESSION['user']['nome']?> </label>
                <strong class="col-sm-2 mb-2 text-right ">Apelido</strong>
                <label class="col-sm-2 mb-2"> <?= $_SESSION['user']['apelido']?> </label>
            </div>

            <div class="mb-2 row">
              <strong class="col-sm-2 mb-2 text-right">Telemóvel</strong>
              <label class="col-sm-2 mb-2"> <?= $_SESSION['user']['telemovel']?> </label>
            </div>

            


            <h5 class="col-sm-2 mt-2">Endereco</h5>
            <div class="mb-2 row">
                <strong class="col-sm-2 mb-2 text-right ">Pais</strong>
                <label class="col-sm-2 mb-2"> <?= $_SESSION['user']['pais']?> </label>
                <strong class="col-sm-2 mb-2 text-right ">Codigo Postal</strong>
                <label class="col-sm-2 mb-2"> <?= $_SESSION['user']['codigo_postal']?>  </label>
            </div>

            <div class="mb-2 row">
                <strong class="col-sm-2 mb-2 text-right ">Cidade</strong>
                <label class=" col-sm-2 mb-2"> <?= $_SESSION['user']['distrito']?> , <?= $_SESSION['user']['cidade']?> </label>
                <strong class="col-sm-2 mb-2 text-right ">Rua</strong>
                <label class=" col-sm-2 mb-2"><?= $_SESSION['user']['rua']?> </label>
            </div>
            


        

        </div>
    </div>
</div>




