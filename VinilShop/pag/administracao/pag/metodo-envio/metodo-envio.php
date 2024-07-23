
<div class="pagetitle">
  <h1>Metodos de Envio</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Configurações</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">


<div class="modal fade" id="envioViewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Metodo de Envio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="verenvioForm" method="POST">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Metodo de Envio</label>
                            <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Preço</label>
                            <input type="text" class="form-control" id="inputName1" name="preco" readonly></input>
                        </div>
                    </div>
                </div>
             

              <div class="mb-3">
                  <label for="inputNome" class="form-label">Descrição</label>
                  <textarea type="text" rows="3" class="form-control" id="inputName1" name="descricao" readonly></textarea>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Envio Modal-->

<div class="modal fade" id="envioAddModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Metodo de Envio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addenvioForm" method="POST">
          <div class="modal-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Metodo de Envio</label>
                            <input type="text" class="form-control" id="inputName1" name="nome"></input>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Preço</label>
                            <input type="text" class="form-control" id="inputName1" name="preco"></input>
                        </div>
                    </div>
                </div>
             

              <div class="mb-3">
                  <label for="inputNome" class="form-label">Descrição</label>
                  <textarea type="text" rows="3" class="form-control" id="inputName1" name="descricao"></textarea>
              </div>
          </div>

          <div class="modal-footer">
          <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar Metodo de Envio</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Add Envio Modal-->

<div class="modal fade" id="envioEditModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Metodo de Envio</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editenvioForm" method="POST">
          <div class="modal-body">
                <input type="hidden" name="envio_id">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Metodo de Envio</label>
                            <input type="text" class="form-control" id="inputName1" name="nome"></input>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Preço</label>
                            <input type="text" class="form-control" id="inputName1" name="preco"></input>
                        </div>
                    </div>
                </div>
             

              <div class="mb-3">
                  <label for="inputNome" class="form-label">Descrição</label>
                  <textarea type="text" rows="3" class="form-control" id="inputName1" name="descricao"></textarea>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar Metodo de Envio</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Edit Envio Modal-->




  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Metodos de Envio<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#envioAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="enviosTable" class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Preço</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetEnviosTable()) > 0) {
            foreach (GetEnviosTable() as $envio) {
              ?>
              <tr>
                <td><?= $envio['nome'] ?></td>
                <td><?= $envio['preco'] . "€" ?></td>
                <td>
                  <button type="button" value="<?= $envio['MetodoEnvio_id']; ?>"
                    class="ViewEnvioBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $envio['MetodoEnvio_id']; ?>"
                    class="EditEnvioBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $envio['MetodoEnvio_id']; ?>"
                    class="DeleteEnvioBtn Btn bi bi-trash btn btn-danger btn-sm"></button>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
        document.getElementById('envioAddModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('addenvioForm').reset();
        });
</script>


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->