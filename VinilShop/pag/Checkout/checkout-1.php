<?php if(!isset($_SESSION['encomenda'])){
  $_SESSION['encomenda'] = $_SESSION['user'];
  } ?>
<section>
    <div class="modal fade" id="AlterarDadosEncomendaModal" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Endereço</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                                  </div>
                              <form id="AlterarDadosEncomendaForm" method="post">
                                  <div class="modal-body">
                                    <div id="errorMessage" class="alert alert-danger d-none"></div>

                                    <input type="hidden" name="util_id" id="id">

                                    <div class="mb-3 form-group">
                                    <label for="inputNome" class="form-label">Nome</label>
                                      <input type="text" class="form-control" value="<?= $_SESSION['encomenda']['nome'];?>" id="inputName1" name="nome"></input>
                                    </div>

                                    <div class="mb-3 form-group">
                                    <label for="inputNome" class="form-label">Apelido</label>
                                      <input type="text" class="form-control" value="<?= $_SESSION['encomenda']['apelido'];?>" id="inputName1" name="apelido"></input>
                                    </div>

                                    <div class="form-group">
                                      <label for="InputPhone">Telemóvel</label>
                                      <input  type="text"  name="telemovel" value="<?= $_SESSION['encomenda']['telemovel'];?>" pattern="[0-9]*" minLength="9" maxlength="9"  class="form-control" max="999999999">
                                    </div>

                                    <div class="mb-4">
                                        <hr class="dotted">
                                    </div>

                                  

                                    
                                    <div class="mb-3 form-group">
                                      <label for="">País</label>
                                      <select class="form-control"  id="pais-select" name="pais">
                                        <option value="" disabled selected hidden><?= $_SESSION['encomenda']['pais'];?></option>
                                      </select>
                                    </div>
                                    

                                    <div class="mb-3">
                                    <label for="">Código Postal</label>
                                    <input type="text" class="form-control" value="<?= $_SESSION['encomenda']['codigo_postal'];?>" name="postalCode" pattern="[0-9]{4}-[0-9]{3}" placeholder="___-___" required>
                                    </div>

                                    <div class="mb-3">
                                      <label for="">Distrito</label>
                                      <input type="text" class="form-control" id="inputMorada4" value="<?= $_SESSION['encomenda']['distrito'];?>" name="distrito" required></input>
                                    </div>

                                    <div class="mb-3">
                                      <label for="">Cidade</label>
                                      <input type="text" class="form-control" id="inputMorada4" value="<?= $_SESSION['encomenda']['cidade'];?>" name="cidade"></input>
                                    </div>

                                    
                                    <div class="mb-3 form-group">
                                      <label for="">Rua</label>
                                      <input type="text" class="form-control" id="inputMorada4" value="<?= $_SESSION['encomenda']['rua'];?>" name="rua"></input>
                                    </div>


                                    
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-dark salvarInfoEncomenda">Guardar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>


                                </div>
                              </div>
                            </form>
                        </div>
</section>

<div class="container mt-30">


    <div class="d-flex justify-content-center">
            <div class="progress mt-15 mb-15" style="font-size: 17px; width: 100%; height: 20px;">
                <div class="progress-bar" role="progressbar" style="width: 33%;" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">Morada</div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mt-30 mb-50">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h3>Enviar para o Endereço</h3>
                            <div class="EditBtn" style="font-size: 15px;" id="ChangeAdress" data-toggle="modal" data-target="#AlterarDadosEncomendaModal"> Mudar Endereço <i class="bi bi-pencil"></i></div>
                        </div>
                        <div class="card-body" style="display: block; font-size: 20px">
                            <div id="nome"><?= $_SESSION['encomenda']['nome'];?> <?= $_SESSION['encomenda']['apelido'];?></div>
                            <div id="rua"><?= $_SESSION['encomenda']['rua'];?></div>
                            <div id="cidade_postalcode"><?= $_SESSION['encomenda']['codigo_postal'];?>, <?= $_SESSION['encomenda']['cidade'];?></div>
                            <div id="distrito"><?= $_SESSION['encomenda']['distrito'];?></div>
                            <div id="pais"><?= $_SESSION['encomenda']['pais'];?></div>
                            <div id="telemovel">Tel: <?= $_SESSION['encomenda']['telemovel'];?></div>
                        </div>

                    </div>

                    <div class="mb-15" style="display: flex; justify-content: space-between;">
                        <a href="index.php?op=8" class="btn btn-light border border-secondary" style="width: 250px"> Carrinho </a>
                        <a href="index.php?op=9&x=2" class="btn btn-dark" style="width: 250px"> Continuar </a>
                    </div>
                </div>
            </div>
    </div>
</div>