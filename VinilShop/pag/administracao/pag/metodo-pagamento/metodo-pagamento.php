
<div class="pagetitle">
  <h1>Metodos de Pagamento</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Configurações</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">


<div class="modal fade" id="pagamentoViewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Metodo de Pagamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="verpagamentoForm" method="POST">
          <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                            <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
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
</div><!-- End View Pagamento Modal-->

<div class="modal fade" id="pagamentoAddModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Metodo de Pagamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addpagamentoForm" method="POST">
          <div class="modal-body">

                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                            <input type="text" class="form-control" id="inputName1" name="nome"></input>
                        </div>

             

                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Descrição</label>
                            <textarea type="text" rows="3" class="form-control" id="inputName1" name="descricao"></textarea>
                        </div>
        </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar Metodo de Pagamento</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Add Pagamento Modal-->

<div class="modal fade" id="pagamentoEditModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Metodo de Pagamento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editpagamentoForm" method="POST">
          <div class="modal-body">
                        <input type="hidden" name="pagamento_id">
                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Metodo de Pagamento</label>
                            <input type="text" class="form-control" id="inputName1" name="nome"></input>
                        </div>

             

                        <div class="mb-3">
                            <label for="inputNome" class="form-label">Descrição</label>
                            <textarea type="text" rows="3" class="form-control" id="inputName1" name="descricao"></textarea>
                        </div>
        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar Metodo de Pagamento</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Edit Pagamento Modal-->



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Metodos de Pagamento<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#pagamentoAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="enviosTable" class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetPagamentosTable()) > 0) {
            foreach (GetPagamentosTable() as $pagamento) {
              ?>
              <tr>
                <td><?= $pagamento['Nome'] ?></td>
                <td>
                  <button type="button" value="<?= $pagamento['MetodoPagamento_id']; ?>"
                    class="ViewPagamentoBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $pagamento['MetodoPagamento_id']; ?>"
                    class="EditPagamentoBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $pagamento['MetodoPagamento_id']; ?>"
                    class="DeletePagamentoBtn Btn bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('pagamentoAddModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('addpagamentoForm').reset();
        });
</script>

<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->