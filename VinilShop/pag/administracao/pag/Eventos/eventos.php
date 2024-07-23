
<div class="pagetitle">
  <h1>Eventos</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Configuracões</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
<div class="modal fade" id="eventosAddModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addeventoForm" method="POST">
          <div class="modal-body">

              <img src="" name="evento-imagem" class="mb-3" style="display: block; margin-left: auto; margin-right: auto;" width="400" height="548" alt="">
              <input class="form-control mt-3 mb-3" name="eventoImagem[]" type="file" id="EventoUpload">
              <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome"></input>
              </div>

              <div class="row mb-3">
                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Inicio</label>
                    <input type="date" class="form-control" id="inputName1" name="data-inicio"></input>
                    </div>

                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Fim</label>
                    <input type="date" class="form-control" id="inputName1" name="data-fim"></input>
                 </div>

                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Local</label>
                    <input type="text" class="form-control" id="inputName1" name="local"></input>
                 </div>
              </div>

              <div class="mb-3">
                  <label for="inputNome" class="form-label">Link</label>
                  <input type="text" class="form-control" id="inputName1" name="link"></input>
              </div>

          </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar Evento</button>
          </div>

          


      </div>
    </div>
    </form>
</div><!-- End Add Evento Modal-->

<div class="modal fade" id="eventosEditModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editeventoForm" method="POST">
          <div class="modal-body">
          <input type="hidden" name="evento_id">

              <img src="" name="evento-imagem" class="mb-3" style="display: block; margin-left: auto; margin-right: auto;" width="400" height="548" alt="">
              <input class="form-control mt-3 mb-3" name="eventoEditImagem[]" type="file" id="EventoEditUpload">
              <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome"></input>
              </div>

              <div class="row mb-3">
                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Inicio</label>
                    <input type="date" class="form-control" id="inputName1" name="data-inicio"></input>
                    </div>

                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Fim</label>
                    <input type="date" class="form-control" id="inputName1" name="data-fim"></input>
                 </div>

                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Local</label>
                    <input type="text" class="form-control" id="inputName1" name="local"></input>
                 </div>
              </div>

              <div class="mb-3">
                  <label for="inputNome" class="form-label">Link</label>
                  <input type="text" class="form-control" id="inputName1" name="link"></input>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar Evento</button>
          </div>

          


      </div>
    </div>
    </form>
</div><!-- End Edit Evento Modal-->

<div class="modal fade" id="eventosViewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Evento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="vereventoForm" method="POST">
          <div class="modal-body">

              <img src="" name="evento-imagem" class="mb-3" style="display: block; margin-left: auto; margin-right: auto;" width="400" height="548" alt="">
              <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
              </div>

              <div class="row mb-3">
                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Inicio</label>
                    <input type="date" class="form-control" id="inputName1" name="data-inicio" readonly></input>
                    </div>

                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Fim</label>
                    <input type="date" class="form-control" id="inputName1" name="data-fim" readonly></input>
                 </div>

                 <div class="col-md-4">
                    <label for="inputNome" class="form-label">Local</label>
                    <input type="text" class="form-control" id="inputName1" name="local" readonly></input>
                 </div>
              </div>

              <div class="mb-3">
                  <label for="inputNome" class="form-label">Link</label>
                  <input type="text" class="form-control" id="inputName1" name="link" readonly></input>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

          


      </div>
    </div>
    </form>
</div><!-- End View Evento Modal-->


  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Eventos<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#eventosAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="artistasTable" class="table">
        <thead>
          <tr>
            <th scope="col">Nome</th>
            <th scope="col">Inicio</th>
            <th scope="col">Fim</th>
            <th scope="col">Local</th>
            <th scope="col">Acoes</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetEventosTable()) > 0) {
            foreach (GetEventosTable() as $evento) {
              ?>
              <tr>
                <td><?= $evento['nome'] ?></td>
                <td><?= $evento['data_inicio'] ?></td>
                <td><?= $evento['data_fim'] ?></td>
                <td><?= $evento['local'] ?></td>
                <td>
                  <button type="button" value="<?= $evento['evento_id']; ?>"
                    class="ViewEventoBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $evento['evento_id']; ?>"
                    class="EditEventoBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $evento['evento_id']; ?>"
                    class="DeleteEventoBtn bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('eventosAddModal').addEventListener('show.bs.modal', function (event) {
            $('img[name="evento-imagem"]').attr('src','');
            document.getElementById('addeventoForm').reset();
        });
</script>>

<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->