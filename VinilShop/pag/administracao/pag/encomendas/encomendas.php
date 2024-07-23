
<div class="pagetitle">
  <h1>Encomendas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Administração</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">



<div class="modal fade" id="encomendaViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver encomenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="verencomendaForm" method="POST">       
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="inputNome" class="form-label">Id</label>
                <input type="text" class="form-control" id="inputName1" name="id" readonly></input>
              </div>

              <div class="col-md-4">
                <label for="inputNome" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="inputName1" name="cliente" readonly></input>
              </div>

              <div class="col-md-4">
                <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                <select name="pagamento" class="form-select" disabled>
                        <option value=""></option>
                        <?php require "../..//pag\User\atualizarComboPagamento.php"; 
                               ?>
                  </select>
              </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Numero do Cartão</label>
                  <input type="text" class="form-control" id="inputName1" name="cartao" readonly></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Titular</label>
                  <input type="text" class="form-control" id="inputName1" name="titular" readonly></input>
                 </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Codigo</label>
                  <input type="text" class="form-control" id="inputName1" name="codigo" readonly></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Data de Validade</label>
                  <input type="text" class="form-control" id="inputName1" name="data-validade" readonly></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Metodo de Envio</label>
                    <select name="envio" class="form-select" disabled>
                          <?php require "../..//pag\User\atualizarComboTransportadora.php"; 
                                ?>
                      </select>
                 </div>
            </div>

            <div class="mb-2">
                <hr class="dotted">
            </div>
                         <label for="inputNome" class="form-label mb-3" style=" display: flex; justify-content: center; align-items: center;">
                          Morada
                        </label>

              <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">País</label>
                    <input type="text" class="form-control" id="inputName1" name="pais" readonly></input>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Distrito</label>
                    <input type="text" class="form-control" id="inputName1" name="distrito" readonly></input>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="inputName1" name="codigoPostal" readonly></input>
                  </div>
              </div>

              <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Cidade</label>
                  <input type="text" class="form-control" id="inputName1" name="cidade" readonly></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Rua</label>
                  <input type="text" class="form-control" id="inputName1" name="rua" readonly></input>
                 </div>
            </div>

            <div class="mb-2">
                <hr class="dotted">
            </div>

            <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Preço Total</label>
                    <input type="text" class="form-control" id="inputName1" name="preco" readonly></input>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Data</label>
                    <input type="text" class="form-control" id="inputName1" name="data" readonly></input>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Status</label>
                    <input type="text" class="form-control" id="inputName1" name="status" readonly></input>
                  </div>
              </div> 

              <div class="mb-2">
                <hr class="dotted">
              </div>

                      <label for="inputNome" class="form-label mb-3" style=" display: flex; justify-content: center; align-items: center;">
                        Vinis
                      </label>

                      <ul class="list-group" id="vinisOrderView">
                          <!-- <li class='list-group-item'>
                            <div class='row align-items-center'>
                                <div class='col-md-3'>
                                    <img src='../../img/vinis/Around-the-Fur.png' height="140" width="140">
                                </div>
                                <div class='col-md-6'>
                                    <h5>Around the Fur</h5>
                                    <div>Deftones</div>
                                    <div>Rock</div>
                                    <div>LP</div>
                                    <div>Album</div>
                                    <div>Quantidade <input type='number' class='QtdVinil' data-vinyl='' value='1' min='1' max='10' readonly></div>
                                </div>
                                <div class='col-md-3 text-end'>
                                    <div style='font-size: 20px; font-weight: bold;'>
                                        39€
                                    </div>
                                </div>
                            </div>
                        </li> -->

                    </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
    </form>
</div><!-- End View Encomenda Modal-->

<div class="modal fade" id="encomendaEditModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar encomenda</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editencomendaForm" method="POST">       
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-md-4">
                <label for="inputNome" class="form-label">Id</label>
                <input type="text" class="form-control" id="inputName1" name="id" readonly></input>
              </div>

              <div class="col-md-4">
                <label for="inputNome" class="form-label">Cliente</label>
                <input type="text" class="form-control" id="inputName1" name="cliente" readonly></input>
              </div>

              <div class="col-md-4">
                <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                <select name="pagamento" class="form-select" disabled>
                        <option value=""></option>
                        <?php require "../..//pag\User\atualizarComboPagamento.php"; 
                               ?>
                  </select>
              </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Numero do Cartão</label>
                  <input type="text" class="form-control" id="inputName1" name="cartao" readonly></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Titular</label>
                  <input type="text" class="form-control" id="inputName1" name="titular" readonly></input>
                 </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Codigo</label>
                  <input type="text" class="form-control" id="inputName1" name="codigo" readonly></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Data de Validade</label>
                  <input type="text" class="form-control" id="inputName1" name="data-validade" readonly></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Metodo de Envio</label>
                    <select name="envio" class="form-select" disabled>
                          <?php require "../..//pag\User\atualizarComboTransportadora.php"; 
                                ?>
                      </select>
                 </div>
            </div>

            <div class="mb-2">
                <hr class="dotted">
            </div>
                         <label for="inputNome" class="form-label mb-3" style=" display: flex; justify-content: center; align-items: center;">
                          Morada
                        </label>

              <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">País</label>
                    <input type="text" hidden name="pais">
                    <select name="pais" id="select-pais-edit-encomenda" class="form-select" required>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Distrito</label>
                    <input type="text" class="form-control" id="inputName1" name="distrito"></input>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="inputName1" name="codigoPostal"></input>
                  </div>
              </div>

              <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Cidade</label>
                  <input type="text" class="form-control" id="inputName1" name="cidade"></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Rua</label>
                  <input type="text" class="form-control" id="inputName1" name="rua"></input>
                 </div>
            </div>

            <div class="mb-2">
                <hr class="dotted">
            </div>

            <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Preço Total</label>
                    <input type="text" class="form-control" id="inputName1" name="preco" readonly></input>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Data</label>
                    <input type="text" class="form-control" id="inputName1" name="data" readonly></input>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Status</label>
                    <select name="status" class="form-select">
                      <option value="Pedido Recebido">Pedido Recebido</option>
                      <option value="Processamento do Pedido">Processamento do Pedido</option>
                      <option value="Expedição">Expedição</option>
                      <option value="Transporte">Transporte</option>
                      <option value="Entrega Local">Entrega Local</option>
                      <option value="Entrega ao Destinatário">Entrega ao Destinatário</option>
                      <option value="Entregue">Entregue</option>
                      <option value="Cancelado">Cancelado</option>
                    </select>
                  </div>
              </div> 

              <div class="mb-2">
                <hr class="dotted">
              </div>

                      <label for="inputNome" class="form-label mb-3" style=" display: flex; justify-content: center; align-items: center;">
                        Vinis
                      </label>

                      <ul class="list-group" id="vinisOrderEdit">
                      
                    </ul>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Editar</button>
          </div>
      </div>
    </div>
    </form>
</div><!-- End Edit Encomenda Modal-->




  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Encomendas</h5>

      <!-- Table with stripped rows -->
      <table id="utilizadoresTable" class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Cliente</th>
            <th scope="col">Preço Total</th>
            <th scope="col">Data</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetEncomendasTable()) > 0) {
            foreach (GetEncomendasTable() as $encomenda) {
              ?>
              <tr>
                <td><?= $encomenda['encomenda_id'] ?></td>
                <td><?= $encomenda['utilizador_nome'] . " " . $encomenda['utilizador_apelido'] ?></td>
                <td><?= $encomenda['Preco_Total']. "" . "€"?></td>
                <td><?= $encomenda['Data_Criado'] ?></td>
                <td><?= $encomenda['status'] ?></td>
                <td>
                  <button type="button" value="<?= $encomenda['encomenda_id']; ?>"
                    class="ViewEncomendaBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $encomenda['encomenda_id']; ?>"
                    class="EditEncomendaBtn bi bi-pencil-square btn btn-warning btn-sm" status="<?= $encomenda['status']; ?>"></button>
                  <button type="button" value="<?= $encomenda['encomenda_id']; ?>"
                    class="DeleteEncomendaBtn bi bi-slash-circle-fill btn btn-danger btn-sm" status="<?= $encomenda['status']; ?>"></button>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
      <!-- End Table with stripped rows -->

    </div>
  </div>

  </div>
  </div>
</section>




</script>


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->