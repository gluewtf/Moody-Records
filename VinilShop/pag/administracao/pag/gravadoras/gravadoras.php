
<?php
GetGravadoras();
?>

<div class="pagetitle">
  <h1>Gravadoras</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Manutenção de Vinis</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">


<div class="modal fade" id="gravadorasAddModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Gravadora</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addgravadoraForm" method="POST">
          <div class="modal-body">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Gravadora</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
              </div>
          </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Gravadora Modal-->

<div class="modal fade" id="gravadorasViewModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Gravadora</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="vergravadoraForm" method="POST">
          <div class="modal-body">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Gravadora</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Add Gravadora Modal-->

<div class="modal fade" id="gravadorasEditModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Genero</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editgravadoraForm" method="POST">
          <div class="modal-body">
              <input type="hidden" name="gravadora_id">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Gravadora</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar</button>
          </div>


      </div>
    </div>
    </form>
</div> <!-- End Edit Gravadora Modal-->


  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Gravadoras<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#gravadorasAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="gravadorasTable" class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetGravadorasTable()) > 0) {
            foreach (GetGravadorasTable() as $gravadora) {
              ?>
              <tr>
                <td><?= $gravadora['nome'] ?></td>
                <td>
                  <button type="button" value="<?= $gravadora['gravadora_id']; ?>"
                    class="ViewGravadoraBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $gravadora['gravadora_id']; ?>"
                    class="EditGravadoraBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $gravadora['gravadora_id']; ?>"
                    class="DeleteGravadoraBtn Btn bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('gravadorasAddModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('addgravadoraForm').reset();
        });
</script>


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->