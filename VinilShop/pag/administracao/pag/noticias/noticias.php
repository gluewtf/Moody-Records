
<div class="pagetitle">
  <h1>Noticias</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Configuracões</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">

<div class="modal fade" id="noticiaViewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Noticia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="vernoticiaForm" method="POST">
          <div class="modal-body">
           
                <div class="row mb-3">
                            <div id="carouselExampleControls" style="display: flex; justify-content: center; align-items: center;" class="carousel slide" data-ride="carousel">

                              <div class="carousel-inner" >

                                  <div id="carousel-noticias">

                                  </div>
                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only"></span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only"></span>
                                        </a>
                                  </div>
                            </div>

                          

                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Autor</label>
                  <input  class="form-control" rows="5" id="inputName1" name="autor" readonly>
                </div>

                <div class="row mb-3">
                  <div class="col-md-9">
                    <label for="inputNome" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="inputName1" name="titulo" readonly></input>
                  </div>

                  <div class="col-md-3">
                    <label for="inputNome" class="form-label">Tipo</label>
                    <select name="tipo" class="form-select" disabled>
                      <option value="Musica">Musica</option>
                      <option value="Moody Records">Records</option>
                      <option value="Festivais">Festivais</option>
                    </select>
                  </div>
                 

                </div>

              

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Texto</label>
                  <textarea  class="form-control" rows="5" id="inputName1" name="texto" readonly></textarea>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Link</label>
                  <input  class="form-control" rows="5" id="inputName1" name="link" readonly>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                      <label for="inputNome" class="form-label">Data Inicial</label>
                      <input type="text" class="form-control" id="inputName1" name="data-inicio" readonly></input>
                    </div>

                    <div class="col-md-3">
                      <label for="inputNome" class="form-label">Data Final</label>
                      <input type="text" class="form-control" id="inputName1" name="data-fim" readonly></input>
                    </div>

                    <div class="col-md-3">
                    <label for="inputNome" class="form-label">Visualizações</label>
                    <input  class="form-control" rows="5" id="inputName1" name="views" readonly>
                    </div>

                    <div class="col-md-3">
                    <input type="hidden" value="unchecked" name="status">
                    <label class="form-check-label" for="flexCheckChecked">Ativo</label>
                    <input class="form-check-input" type="checkbox" name="status" disabled>
                    </div>
                </div>

                
                

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Noticia Modal-->

<div class="modal fade" id="noticiaAddModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Noticia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addnoticiaForm" method="POST">
          <div class="modal-body">
           
                          <div class="row mb-3">
                            <div id="carousel-add" class="carousel slide" data-ride="carousel" style="display: flex; justify-content: center; align-items: center;">
                                <div class="carousel-inner" id="carousel-Addnoticias">
                                    <!-- Carousel items should be added here. Example: -->
                                
                                </div>
                                <a class="carousel-control-prev" href="#carousel-add" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-add" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </a>
                            </div>
                        </div>


                
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Imagens</label>
                  <input class="form-control mt-3 mb-3" name="noticiasImagens[]" type="file" id="ImagensNoticiasUpload" multiple required>
                </div>

                <div class="row mb-3">
                  <div class="col-md-9">
                    <label for="inputNome" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="inputName1" name="titulo" required></input>
                  </div>

                  <div class="col-md-3">
                    <label for="inputNome" class="form-label">Tipo</label>
                    <select name="tipo" class="form-select" required>
                      <option value="Musica">Musica</option>
                      <option value="Moody Records">Moody Records</option>
                      <option value="Festivais">Festivais</option>
                    </select>
                  </div>
                 

                </div>

              

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Texto</label>
                  <textarea  class="form-control" rows="5" id="inputName1" name="texto" required></textarea>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Link</label>
                  <input  class="form-control" rows="5" id="inputName1" name="link" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                      <label for="inputNome" class="form-label">Data Inicial</label>
                      <input type="date" class="form-control" id="inputName1" name="data-inicio" required></input>
                    </div>

                    <div class="col-md-3">
                      <label for="inputNome" class="form-label">Data Final</label>
                      <input type="date" class="form-control" id="inputName1" name="data-fim" required></input>
                    </div>

                    <div class="col-md-3">
                    <label for="inputNome" class="form-label">Visualizações</label>
                    <input  class="form-control" rows="5" id="inputName1" name="views">
                    </div>

                    <div class="col-md-3">
                    <input type="hidden" value="unchecked" name="status">
                    <label class="form-check-label" for="flexCheckChecked">Ativo</label>
                    <input class="form-check-input" type="checkbox" name="status" required> 
                    </div>
                </div>

                
                

          </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar Noticia</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Add Noticia Modal-->

<div class="modal fade" id="noticiaEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Noticia</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editnoticiaForm" method="POST">
          <div class="modal-body">
              <input type="hidden" name="noticia_id">
           
                          <div class="row mb-3">
                            <div id="carousel-edit" class="carousel slide" data-ride="carousel" style="display: flex; justify-content: center; align-items: center;">
                                <div class="carousel-inner" id="carousel-Editnoticias">
                                    <!-- Carousel items should be added here. Example: -->
                                
                                </div>
                                <a class="carousel-control-prev" href="#carousel-edit" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-edit" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only"></span>
                                </a>
                            </div>
                        </div>


                
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Imagens</label>
                  <input class="form-control mt-3 mb-3" name="noticiasImagensEdit[]" type="file" id="ImagensNoticiasEditUpload" multiple>
                </div>

                <div class="row mb-3">
                  <div class="col-md-9">
                    <label for="inputNome" class="form-label">Titulo</label>
                    <input type="text" class="form-control" id="inputName1" name="titulo" required></input>
                  </div>

                  <div class="col-md-3">
                    <label for="inputNome" class="form-label">Tipo</label>
                    <select name="tipo" class="form-select" required>
                      <option value="Musica">Musica</option>
                      <option value="Moody Records">Moody Records</option>
                      <option value="Festivais">Festivais</option>
                    </select>
                  </div>
                 

                </div>

              

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Texto</label>
                  <textarea  class="form-control" rows="5" id="inputName1" name="texto" required></textarea>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Link</label>
                  <input  class="form-control" rows="5" id="inputName1" name="link" required>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                      <label for="inputNome" class="form-label">Data Inicial</label>
                      <input type="date" class="form-control" id="inputName1" name="data-inicio" required></input>
                    </div>

                    <div class="col-md-3">
                      <label for="inputNome" class="form-label">Data Final</label>
                      <input type="date" class="form-control" id="inputName1" name="data-fim" required></input>
                    </div>

                    <div class="col-md-3">
                    <label for="inputNome" class="form-label">Visualizações</label>
                    <input  class="form-control" rows="5" id="inputName1" name="views">
                    </div>

                    <div class="col-md-3">
                    <input type="hidden" value="unchecked" name="status">
                    <label class="form-check-label" for="flexCheckChecked">Ativo</label>
                    <input class="form-check-input" type="checkbox" name="status" required> 
                    </div>
                </div>

                
                

          </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar Noticia</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Editar Noticia Modal-->

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Noticias<a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#noticiaAddModal">
          Adicionar
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="noticiasTable" class="table">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Tipo</th>
            <th scope="col">Texto</th>
            <th scope="col">Autor</th>
            <th scope="col">Acoes</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetNoticiasTable()) > 0) {
            foreach (GetNoticiasTable() as $noticia) {
              ?>
              <tr>
                <td><?= $noticia['titulo'] ?></td>
                <td><?= $noticia['tipo'] ?></td>
                <td><?= substr($noticia['texto'], 0, 100) ?></td>
                <td><?= $noticia['autor_nome'] . " " . $noticia['autor_apelido'] ?></td>
                <td>
                  <button type="button" value="<?= $noticia['noticia_id']; ?>"
                    class="ViewNoticiaBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $noticia['noticia_id']; ?>"
                    class="EditNoticiaBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $noticia['noticia_id']; ?>"
                    class="DeleteNoticiaBtn  bi bi-trash btn btn-danger btn-sm"></button>
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
        document.getElementById('noticiaAddModal').addEventListener('show.bs.modal', function (event) {
            document.getElementById('addnoticiaForm').reset();
        });
</script>>

<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->