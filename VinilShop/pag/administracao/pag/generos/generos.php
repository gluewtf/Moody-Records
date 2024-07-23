<?php
GetGravadoras();
?>

<div class="pagetitle">
  <h1>Generos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Manutenção de Vinis</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

<div class="modal fade" id="generosAddModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Genero</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addgeneroForm" method="POST">
          <div class="modal-body">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Genero</label>
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
</div><!-- End Add Genero Modal-->


<div class="modal fade" id="generosViewModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Genero</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="vergeneroForm" method="POST">
          <div class="modal-body">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Genero</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
              </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Genero Modal-->

<div class="modal fade" id="generosEditModal" tabindex="-1">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Genero</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editgeneroForm" method="POST">
          <div class="modal-body">
              <input type="hidden" name="genero_id">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Genero</label>
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
</div><!-- End Edit Genero Modal-->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Generos<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#generosAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="generosTable" class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetGeneros()) > 0) {
            foreach (GetGeneros() as $genero) {
              ?>
              <tr>
                <td><?= $genero['nome'] ?></td>
                <td>
                  <button type="button" value="<?= $genero['genero_id']; ?>"
                    class="ViewGenreBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $genero['genero_id']; ?>"
                    class="EditGenreBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $genero['genero_id']; ?>"
                    class="DeleteGenreBtn bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('generosAddModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('addgeneroForm').reset();
        });
</script>

<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->