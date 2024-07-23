
<div class="pagetitle">
  <h1>Utilizadores</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Administração</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">



<div class="modal fade" id="utilizadorViewModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Utilizador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="verutilizadorForm" method="POST">       
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="inputNome" class="form-label">Email</label>
                <input type="text" class="form-control" id="inputName1" name="email" readonly></input>
              </div>

              <div class="col-md-6">
                <label for="inputNome" class="form-label">Login</label>
                <input type="text" class="form-control" id="inputName1" name="login" readonly></input>
              </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Password</label>
                  <input type="text" class="form-control" id="inputName1" name="password" readonly></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Tipo</label>
                  <select name="tipo" class="form-select" disabled>
                      <option value="A">Administrador</option>
                      <option value="O">Dono</option>
                      <option value="U">Utilizador</option>
                      <option value="G">Gestor</option>
                      <option value="N">Autor</option>
                    </select>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Telemovel</label>
                  <input type="text" class="form-control" id="inputName1" name="telemovel" readonly></input>
                 </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Apelido</label>
                  <input type="text" class="form-control" id="inputName1" name="apelido" readonly></input>
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
                    <label for="inputNome" class="form-label">Metodo de Envio</label>
                    <select name="envio" class="form-select" disabled>
                        <?php require "../..//pag\User\atualizarComboTransportadora.php"; 
                               ?>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                    <select name="pagamento" class="form-select" disabled>
                        <?php require "../..//pag\User\atualizarComboPagamento.php"; 
                               ?>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Status</label>
                    <input type="text" class="form-control" id="inputName1" name="status" readonly></input>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
    </form>
</div><!-- End View Utilizador Modal-->

<div class="modal fade" id="utilizadorAddModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Utilizador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" required></button>
        </div>
        <form id="addutilizadorForm" method="POST">       
          <div class="modal-body">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="inputNome" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputName1" name="email" required></input>
              </div>

              <div class="col-md-6">
                <label for="inputNome" class="form-label">Login</label>
                <input type="text" class="form-control" id="inputName1" name="login" required></input>
              </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Password</label>
                  <input type="text" class="form-control" id="inputName1" name="password" required></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Tipo</label>
                  <select name="tipo" class="form-select">
                      <option value="A">Administrador</option>
                      <option value="U">Utilizador</option>
                      <option value="G">Gestor</option>
                      <option value="N">Autor</option>
                    </select>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Telemovel</label>
                  <input type="tel" pattern="[0-9]*" class="form-control" id="inputName1" name="telemovel" required></input>
                 </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Apelido</label>
                  <input type="text" class="form-control" id="inputName1" name="apelido" required></input>
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
                    <select name="pais" id="select-pais" class="form-select" required>
                        <option value="" hidden selected> Selecione um país</option>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Distrito</label>
                    <input type="text" class="form-control" id="inputName1" name="distrito" required></input>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="inputName1" name="codigoPostal" pattern="[0-9]{4}-[0-9]{3}" placeholder="___-___" required></input>
                  </div>
              </div>

              <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Cidade</label>
                  <input type="text" class="form-control" id="inputName1" name="cidade" required></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Rua</label>
                  <input type="text" class="form-control" id="inputName1" name="rua" required></input>
                 </div>
            </div>

            <div class="mb-2">
                <hr class="dotted">
            </div>

            <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Metodo de Envio</label>
                    <select name="envio" class="form-select">
                        <option value=""></option>
                        <?php require "../..//pag\User\atualizarComboTransportadora.php"; 
                               ?>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                    <select name="pagamento" class="form-select">
                        <option value=""></option>
                        <?php require "../..//pag\User\atualizarComboPagamento.php"; 
                               ?>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Status</label>
                    <select name="status" class="form-select">
                      <option value="Ativo">Ativo</option>
                      <option value="pendente">Pendente</option>
                      <option value="Bloqueado">Bloqueado</option>
                    </select>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
      </div>
    </div>
    </form>
</div><!-- End View Utilizador Modal-->

<div class="modal fade" id="utilizadorEditModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Utilizador</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" required></button>
        </div>
        <form id="editutilizadorForm" method="POST">       
          <div class="modal-body">
           <input type="hidden" name="utilizador_id">
            <div class="row mb-3">
              <div class="col-md-6">
                <label for="inputNome" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputName1" name="email" required></input>
              </div>

              <div class="col-md-6">
                <label for="inputNome" class="form-label">Login</label>
                <input type="text" class="form-control" id="inputName1" name="login" required></input>
              </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Password</label>
                  <input type="text" changed="" class="form-control InsertPassword" id="inputName1" name="password" required></input>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Tipo</label>
                  <select name="tipo" class="form-select">
                      <option value="A">Administrador</option>
                      <option value="U">Utilizador</option>
                      <option value="G">Gestor</option>
                      <option value="N">Autor</option>
                    </select>
                 </div>

                 <div class="col-md-4">
                  <label for="inputNome" class="form-label">Telemovel</label>
                  <input type="tel" pattern="[0-9]*" class="form-control" id="inputName1" name="telemovel" required></input>
                 </div>
            </div>

            <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Apelido</label>
                  <input type="text" class="form-control" id="inputName1" name="apelido" required></input>
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
                    <select name="pais" id="select-pais-edit" class="form-select" required>
                        <option value="" hidden selected> Selecione um país</option>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Distrito</label>
                    <input type="text" class="form-control" id="inputName1" name="distrito" required></input>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Codigo Postal</label>
                    <input type="text" class="form-control" id="inputName1" name="codigoPostal" pattern="[0-9]{4}-[0-9]{3}" placeholder="___-___" required></input>
                  </div>
              </div>

              <div class="row mb-3">
                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Cidade</label>
                  <input type="text" class="form-control" id="inputName1" name="cidade" required></input>
                 </div>


                 <div class="col-md-6">
                  <label for="inputNome" class="form-label">Rua</label>
                  <input type="text" class="form-control" id="inputName1" name="rua" required></input>
                 </div>
            </div>

            <div class="mb-2">
                <hr class="dotted">
            </div>

            <div class="row mb-3">
                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Metodo de Envio</label>
                    <select name="envio" class="form-select">
                        <option value=""></option>
                        <?php require "../..//pag\User\atualizarComboTransportadora.php"; 
                               ?>
                    </select>
                  </div>


                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                    <select name="pagamento" class="form-select">
                        <option value=""></option>
                        <?php require "../..//pag\User\atualizarComboPagamento.php"; 
                               ?>
                    </select>
                  </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Status</label>
                    <select name="status" class="form-select">
                      <option value="Ativo">Ativo</option>
                      <option value="pendente">Pendente</option>
                      <option value="Bloqueado">Bloqueado</option>
                    </select>
                  </div>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar</button>
          </div>
      </div>
    </div>
    </form>
</div><!-- End View Utilizador Modal-->



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Utilizadores<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#utilizadorAddModal">
          Adicionar Utilizador
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="utilizadoresTable" class="table">
        <thead>
          <tr>
            <th scope="col">Email</th>
            <th scope="col">Login</th>
            <th scope="col">Nome</th>
            <th scope="col">Apelido</th>
            <th scope="col">Status</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetUtilizadoresTable()) > 0) {
            foreach (GetUtilizadoresTable() as $utilizador) {
              ?>
              <tr>
                <td><?= $utilizador['email'] ?></td>
                <td><?= $utilizador['login'] ?></td>
                <td><?= $utilizador['nome'] ?></td>
                <td><?= $utilizador['apelido'] ?></td>
                <td><?= $utilizador['status'] ?></td>
                <td>
                  <button type="button" value="<?= $utilizador['utilizador_id']; ?>"
                    class="ViewUtilizadorBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $utilizador['utilizador_id']; ?>"
                    class="EditUtilizadorBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $utilizador['utilizador_id']; ?>"
                    class="DeleteUtilizadorBtn bi bi-slash-circle-fill btn btn-danger btn-sm" status="<?= $utilizador['status']; ?>"></button>
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




<script>
        document.getElementById('utilizadorAddModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('addutilizadorForm').reset();
        });
</script>


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->