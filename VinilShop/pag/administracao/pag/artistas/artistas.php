
<div class="pagetitle">
  <h1>Artistas</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Manutenção de Vinis</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

<div class="modal fade" id="artistasAddModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Artista</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addartistaForm" method="POST">
          <div class="modal-body">

              <img src="" name="artista-foto" style="display: block; margin-left: auto; margin-right: auto;" width="200" height="200" alt="">
              <input class="form-control mt-3 mb-3" name="fotoArtista[]" type="file" id="FotoArtistasUpload" required>
              <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
              </div>

          </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar Artista</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Add Artista Modal-->

<div class="modal fade" id="artistasEditModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Artista</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editartistaForm" method="POST">
          <div class="modal-body">
          <input type="hidden" name="artista_id">
              <img src="" name="artista-foto" style="display: block; margin-left: auto; margin-right: auto;" width="200" height="200" alt="">
              <input class="form-control mt-3 mb-3" name="fotoArtistaEdit[]" type="file" id="FotoArtistasEditUpload">
              <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar Artista</button>
          </div>
      </div>
    </div>
    </form>
</div><!-- End Edit Artista Modal-->


<div class="modal fade" id="artistasViewModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Artista</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="verartistaForm" method="POST">
          <div class="modal-body">

              <img src="" name="artista-foto" style="display: block; margin-left: auto; margin-right: auto;" width="200" height="200" alt="">
              <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Artista Modal-->


  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Artistas<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#artistasAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="artistasTable" class="table">
        <thead>
          <tr>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetArtistas()) > 0) {
            foreach (GetArtistas() as $artista) {
              ?>
              <tr>
                <td><img src="../../<?= $artista['foto'] ?>" style="width: 100px; height: 100px;"></td>
                <td><?= $artista['Nome'] ?></td>
                <td>
                  <button type="button" value="<?= $artista['Artista_id']; ?>"
                    class="ViewArtistaBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $artista['Artista_id']; ?>"
                    class="EditArtistaBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $artista['Artista_id']; ?>"
                    class="DeleteArtistaBtn bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('artistasAddModal').addEventListener('show.bs.modal', function (event) {
            $('img[name="artista-foto"]').attr('src','');
            document.getElementById('addartistaForm').reset();
        });
</script>

<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->