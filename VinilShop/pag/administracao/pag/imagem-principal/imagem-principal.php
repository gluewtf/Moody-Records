
<?php
GetGravadoras();
?>

<div class="pagetitle">
  <h1>Imagem Principal</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Configuracões</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

<div class="modal fade" id="imagemprincipalViewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Imagem Principal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="verimagemprincipalForm" method="POST">
          <div class="modal-body">
            <img src="" name="imagem-principal" style="display: block; margin-left: auto; margin-right: auto;" width="800" height="533" alt="">
            <div class="mb-3">
                  <label for="inputNome" class="form-label">Descrição</label>
                  <textarea  class="form-control" id="inputName1" name="descricao" readonly></textarea>
            </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="inputName1" name="titulo" readonly></input>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" id="inputName1" name="subtitulo" readonly></input>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Botão</label>
                        <input type="text" class="form-control" id="inputName1" name="botao" readonly></input>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputNome" class="form-label">Link</label>
                        <input type="text" class="form-control" id="inputName1" name="link" readonly></input>
                    </div>

                


            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Imagem Principal Modal-->

<div class="modal fade" id="imagemprincipalAddModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Imagem Principal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addimagemprincipalForm" method="POST">
          <div class="modal-body">
            <img src="" name="imagem-principal" style="display: block; margin-left: auto; margin-right: auto;" width="800" height="533" alt="">
            <label for="inputNome" class="form-label">Imagem Principal</label>
            <input class="form-control mt-3 mb-3" name="imagemPrincipal[]" type="file" id="ImagemPrincipalUpload" required>
            <div class="mb-3">
                  <label for="inputNome" class="form-label">Descrição</label>
                  <textarea  class="form-control" id="inputName1" name="descricao"></textarea>
            </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="inputName1" name="titulo"></input>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" id="inputName1" name="subtitulo"></input>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Botão</label>
                        <input type="text" class="form-control" id="inputName1" name="botao"></input>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputNome" class="form-label">Link</label>
                        <input type="text" class="form-control" id="inputName1" name="link"></input>
                    </div>

                


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
</div><!-- End Add Imagem Principal Modal-->

<div class="modal fade" id="imagemprincipalEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Imagem Principal</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editimagemprincipalForm" method="POST">
          <div class="modal-body">
            <img src="" name="imagem-principal" style="display: block; margin-left: auto; margin-right: auto;" width="800" height="533" alt="">
            <label for="inputNome" class="form-label">Imagem Principal</label>
            <input class="form-control mt-3 mb-3" name="imagemPrincipalEdit[]" type="file" id="ImagemPrincipalEditUpload">
            <input type="hidden" name="imagem_id">
            <div class="mb-3">
                  <label for="inputNome" class="form-label">Descrição</label>
                  <textarea  class="form-control" id="inputName1" name="descricao"></textarea>
            </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="inputName1" name="titulo"></input>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Subtitulo</label>
                        <input type="text" class="form-control" id="inputName1" name="subtitulo"></input>
                    </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="inputNome" class="form-label">Botão</label>
                        <input type="text" class="form-control" id="inputName1" name="botao"></input>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="inputNome" class="form-label">Link</label>
                        <input type="text" class="form-control" id="inputName1" name="link"></input>
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
</div><!-- End Edit Imagem Principal Modal-->



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Imagens Principais<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#imagemprincipalAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="imagensprincipaisTable" class="table">
        <thead>
          <tr>
            <th scope="col">Descricao</th>
            <th scope="col">Titulo</th>
            <th scope="col">Subtitulo</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetImagemPrincipal()) > 0) {
            foreach (GetImagemPrincipal() as $imagemprincipal) {
              ?>
              <tr>
                <td><?= $imagemprincipal['descricao'] ?></td>
                <td><?= $imagemprincipal['titulo'] ?></td>
                <td><?= $imagemprincipal['subtitulo'] ?></td>
                <td>
                  <button type="button" value="<?= $imagemprincipal['imagem_id']; ?>"
                    class="ViewImagemPrincipalBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $imagemprincipal['imagem_id']; ?>"
                    class="EditImagemPrincipalBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $imagemprincipal['imagem_id']; ?>"
                    class="DeleteImagemPrincipalBtn  bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('imagemprincipalAddModal').addEventListener('show.bs.modal', function (event) {
            $('img[name="imagem-principal"]').attr('src','');
            document.getElementById('addimagemprincipalForm').reset();
        });
</script>>


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->