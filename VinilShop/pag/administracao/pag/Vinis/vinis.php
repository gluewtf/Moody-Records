<?php
GetGravadoras();
?>

<div class="pagetitle">
  <h1>Vinis</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Manutenção de Vinis</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">


  <div class="modal fade" id="vinisAddModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Adicionar Vinil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="addvinilForm" method="POST">
          <div class="modal-body">
            <div id="errorMessage" class="alert alert-danger d-none"></div>



            <div class="row">
              <div class="col-md-4">
                <div id="ImagemVinis" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner" id="carousel-vinis">

                  </div>
                  <a class="carousel-control-prev" href="#ImagemVinis" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                  </a>
                  <a class="carousel-control-next" href="#ImagemVinis" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                  </a>
                </div>
                <label for="image1" class="form-label">Imagem</label>
                <input class="form-control mb-5" name="imagens[]" type="file" id="imagensVinisUpload" multiple required>

              </div>



              <div class="col-md-8">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" required></input>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Descricao</label>
                  <textarea type="text" class="form-control" id="inputName1" name="descricao" rows="4"
                    required></textarea>
                </div>

                <div class="row">
                  <div class="col-md-2 mb-3">
                    <label for="inputNome" class="form-label">Tipo</label>
                    <select name="tipo" id="" class="form-select" required>
                      <option value="Album">Album</option>
                      <option value="Single">Single</option>
                      <option value="EP">Ep</option>
                    </select>
                  </div>

                  <div class="col-md-10 mb-3">
                    <label for="inputNome" class="form-label">Artista/Banda</label>
                    <select id="idartistas" name="artista" class="form-select" required>
                      <?php foreach ($_SESSION['artistas'] as $index => $artista): ?>
                        <option value="<?= $artista["Artista_id"] ?>"><?= $artista["Nome"] ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Genero</label>
                      <select id="idgeneros" name="genero" class="form-select" required>
                        <?php foreach ($_SESSION['genres'] as $index => $genero): ?>
                          <option value="<?= $genero["genero_id"] ?>"><?= $genero["nome"] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Gravadora</label>
                      <select id="idgravadoras" name="gravadora" class="form-select" required>
                        <?php foreach ($_SESSION['gravadoras'] as $index => $gravadora): ?>
                          <option value="<?= $gravadora["gravadora_id"] ?>"><?= $gravadora["nome"] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Desconto</label>
                      <input type="text" class="form-control" id="inputName1" name="desconto"></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Formato</label>
                      <select name="formato" id="" class="form-select" required>
                        <option value="LP">LP</option>
                        <option value='12"'>12"</option>
                        <option value='7"'>7"</option>
                        <option value='10"'>10"</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Nº de Catalogo</label>
                      <input type="text" class="form-control" id="inputName1" name="catalogo" required></input>
                    </div>
                  </div>


                  <div class="col-md-3 mb-3">
                    <label for="inputNome" class="form-label">Data de Lançamento</label>
                    <input type="date" class="form-control" name="data-lancamento" required>
                  </div>

                  
                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Data</label>
                      <input type="date" class="form-control" name="data" required>
                    </div>
                  </div>




                 
                </div>

                <div class="row">

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Preço</label>
                      <input type="text" class="form-control" id="inputName1" name="preco" required></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Peso (g)</label>
                      <input type="text" class="form-control" id="inputName1" name="peso" required></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Stock</label>
                      <input type="text" class="form-control" id="inputName1" name="qtd_stock"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Visualizações</label>
                      <input type="text" class="form-control" id="inputName1" name="views"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Comprados</label>
                      <input type="text" class="form-control" id="inputName1" name="comprados"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <input type="hidden" value="unchecked" name="status">
                      <label for="inputNome" class="form-label">Ativo</label>
                      <input type="checkbox" class="form-check" style="text-align: center;" id="inputName1"
                        name="status"></input>

                    </div>
                  </div>

                  <label for="Musicas" class="mb-3" style="display: flex; align-items: center;">Músicas
                    <input type="number" value="1" id="QtdMusicas" class="form-control" min="1"
                      style="width: 10%; margin-left: 10px;">
                  </label>

                  <ul class="list-group" id="musicasAddModal">


                    <li class="list-group-item">
                      <div style="display: flex; flex-direction: column; align-items: flex-start;">
                        <div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">
                          <span style="margin-right: 10px;">https://open.spotify.com/embed/track/</span>
                          <input type="text" class="form-control Insertsong" id="musica" name="" style="flex: 1;"
                            required>
                        </div>
                        <div style="display: flex; align-items: center; width: 15%; margin-bottom: 10px;">
                          <label for="inputA1" style="margin-right: 10px;">Lado:</label>
                          <input type="text" class="form-control" id="lados" name="" style="flex: 1;" required>
                        </div>
                        <div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">
                          <label for="inputName" style="margin-right: 10px;">Name:</label>
                          <textarea type="text" class="form-control" id="musica_nome" rows="1" id="inputName" name=""
                            style="flex: 1;" required></textarea>
                        </div>

                        <div style="display: flex; width: 100%; align-items: center;">
                          <iframe style="border-radius: 12px; flex: 2;" src="" width="100%" height="82" frameBorder="0"
                            allowfullscreen=""
                            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"
                            loading="lazy"></iframe>
                        </div>
                      </div>
                    </li>


                  </ul>

                </div>
              </div>
            </div>



          </div>
          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger ResetModalVinis">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Salvar Vinil</button>
          </div>
        </form>

      </div>
    </div>

  </div><!-- End Add Vinil Modal-->

  <div class="modal fade" id="vinisViewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Vinil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="vervinilForm">
          <div class="modal-body">
            <div id="errorMessage" class="alert alert-danger d-none"></div>


            <div class="row">
              <div class="col-md-4">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

                <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="" name="Image0" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="" name="Image1" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="" name="Image2" alt="Third slide">
                    </div>
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
                <!-- <img src="" name="vImage"> -->
              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome" readonly></input>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Descricao</label>
                  <textarea type="text" class="form-control" id="inputName1" name="descricao" rows="4"
                    readonly></textarea>
                </div>

                <div class="row">
                  <div class="col-md-2 mb-3">
                    <label for="inputNome" class="form-label">Tipo</label>
                    <input type="text" class="form-control" id="inputName1" name="tipo" readonly></input>
                  </div>

                  <div class="col-md-10 mb-3">
                    <label for="inputNome" class="form-label">Artista/Banda</label>
                    <input type="text" class="form-control" id="inputName1" name="artista" readonly></input>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Genero</label>
                      <input type="text" class="form-control" id="inputName1" name="genero" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Gravadora</label>
                      <input type="text" class="form-control" id="inputName1" name="gravadora" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Desconto</label>
                      <input type="text" class="form-control" id="inputName1" name="desconto" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Formato</label>
                      <input type="text" class="form-control" id="inputName1" name="formato" readonly></input>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Nº de Catalogo</label>
                      <input type="text" class="form-control" id="inputName1" name="catalogo" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Data de Lançamento</label>
                      <input type="text" class="form-control" id="inputName1" name="data-lancamento" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Data</label>
                      <input type="text" class="form-control" id="inputName1" name="data" readonly></input>
                    </div>
                  </div>



                  <!-- <div class="col-md-3 mb-3">
                                           <label for="inputNome" class="form-label">Data de Lançamento</label>
                                           <input type="text" class="form-control" id="datepicker" readonly>
                                          </div> -->

                </div>

                <div class="row">

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Preço</label>
                      <input type="text" class="form-control" id="inputName1" name="preco" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Peso (g)</label>
                      <input type="text" class="form-control" id="inputName1" name="peso" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Stock</label>
                      <input type="text" class="form-control" id="inputName1" name="qtd_stock" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Visualizações</label>
                      <input type="text" class="form-control" id="inputName1" name="views" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Comprados</label>
                      <input type="text" class="form-control" id="inputName1" name="comprados" readonly></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Ativo</label>
                      <input type="checkbox" class="form-check" style="text-align: center;" id="inputName1"
                        name="status" disabled></input>
                    </div>
                  </div>

                </div>

                <ul class="list-group mt-5" id="musicasViewModal">

                </ul>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
  </div><!-- End View Vinil Modal-->

  <div class="modal fade" id="vinisEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Vinil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editvinilForm">
          <div class="modal-body">
            <div id="errorMessage" class="alert alert-danger d-none"></div>
              <input type="hidden" name="vinil_id" id="id">

            <div class="row">
              <div class="col-md-4">
                <div id="ImagemVinisEdit" class="carousel slide" data-ride="carousel">

                  <div class="carousel-inner" id="carousel-edit">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="" id="caroucel-image" data-image='' name="Image0" alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="" id="caroucel-image" data-image='' name="Image1" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="" id="caroucel-image" data-image='' name="Image2" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#ImagemVinisEdit" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                  </a>
                  <a class="carousel-control-next" href="#ImagemVinisEdit" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only"></span>
                  </a>
                </div>
                <label for="image1" class="form-label mt-5">Imagem</label>
                <input class="form-control mb-5" name="imagensEdit[]" type="file" id="imagensVinisEditUpload" multiple>




              </div>

              <div class="col-md-8">
                <div class="mb-3">
                  <label for="inputNome" class="form-label">Nome</label>
                  <input type="text" class="form-control" id="inputName1" name="nome"></input>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Descricao</label>
                  <textarea type="text" class="form-control" id="inputName1" name="descricao" rows="4"></textarea>
                </div>

                <div class="row">
                  <div class="col-md-2 mb-3">
                    <label for="inputNome" class="form-label">Tipo</label>
                    <select name="tipo" id="" class="form-select">
                      <option value="Album">Album</option>
                      <option value="Single">Single</option>
                      <option value="EP">Ep</option>
                    </select>
                  </div>

                  <div class="col-md-10 mb-3">
                    <label for="inputNome" class="form-label">Artista/Banda</label>
                      <select id="idartistas" name="artista" class="form-select" required>
                        <?php foreach ($_SESSION['artistas'] as $index => $artista): ?>
                          <option value="<?= $artista["Artista_id"] ?>"><?= $artista["Nome"] ?></option>
                        <?php endforeach; ?>
                      </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Genero</label>
                        <select id="idgeneros" name="genero" class="form-select" required>
                          <?php foreach ($_SESSION['genres'] as $index => $genero): ?>
                            <option value="<?= $genero["genero_id"] ?>"><?= $genero["nome"] ?></option>
                          <?php endforeach; ?>
                        </select>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Gravadora</label>
                      <select id="idgravadoras" name="gravadora" class="form-select" required>
                        <?php foreach ($_SESSION['gravadoras'] as $index => $gravadora): ?>
                          <option value="<?= $gravadora["gravadora_id"] ?>"><?= $gravadora["nome"] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Desconto</label>
                      <input type="text" class="form-control" id="inputName1" name="desconto"></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Formato</label>
                      <select name="formato" id="" class="form-select">
                        <option value="LP">LP</option>
                        <option value='12"'>12"</option>
                        <option value='7"'>7"</option>
                        <option value='10"'>10"</option>
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <div class="col-md-6 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Nº de Catalogo</label>
                      <input type="text" class="form-control" id="inputName1" name="catalogo"></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Data de Lançamento</label>
                      <input type="date" class="form-control" id="inputName1" name="data-lancamento"></input>
                    </div>
                  </div>

                  <div class="col-md-3 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Data</label>
                      <input type="date" class="form-control" id="inputName1" name="data"></input>
                    </div>
                  </div>



                  <!-- <div class="col-md-3 mb-3">
                                           <label for="inputNome" class="form-label">Data de Lançamento</label>
                                           <input type="text" class="form-control" id="datepicker" readonly>
                                          </div> -->

                </div>

                <div class="row">

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Preço</label>
                      <input type="text" class="form-control" id="inputName1" name="preco"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Peso (g)</label>
                      <input type="text" class="form-control" id="inputName1" name="peso"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Stock</label>
                      <input type="text" class="form-control" id="inputName1" name="qtd_stock"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Visualizações</label>
                      <input type="text" class="form-control" id="inputName1" name="views"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <label for="inputNome" class="form-label">Comprados</label>
                      <input type="text" class="form-control" id="inputName1" name="comprados"></input>
                    </div>
                  </div>

                  <div class="col-md-2 mb-3">
                    <div class="mb-3">
                      <input type="hidden" value="unchecked" name="status">
                      <label for="inputNome" class="form-label">Ativo</label>
                      <input type="checkbox" class="form-check" style="text-align: center;" id="inputName1"
                        name="status"></input>
                    </div>
                  </div>

                </div>
                        

                <label for="Musicas" class="mb-3" style="display: flex; align-items: center;">Músicas
                    <input type="number" value="" id="QtdMusicasEdit" class="form-control" min="1"
                      style="width: 10%; margin-left: 10px;">
                  </label>
                <ul class="list-group" id="musicasEditModal">

                </ul>
              </div>

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar Vinil</button>
          </div>


      </div>
    </div>
    </form>
  </div><!-- End Edit Modal-->



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Vinis <a type="button" id="exampleModalLabel"
          class="btn btn-outline-success float-end" data-bs-toggle="modal" data-bs-target="#vinisAddModal">
          Adicionar Vinil
        </a></h5>

      <!-- Table with stripped rows -->
      <table id="vinisTable" class="table">
        <thead>
          <tr>
            <th scope="col">Imagem</th>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Artista</th>
            <th scope="col">Genero</th>
            <th scope="col">Preco</th>
            <th scope="col">Data de Lancamento</th>
            <th scope="col">Data</th>
            <th scope="col">Acoes</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetVinis()) > 0) {
            foreach (GetVinis() as $vinil) {
              ?>
              <tr>
                <td><img src="../../<?= $vinil['imagem'] ?>" style="width: 100px; height: 100px;"></td>
                <td><?= $vinil['nome'] ?></td>
                <td><?= $vinil['tipo'] ?></td>
                <td><?= $vinil['artista'] ?></td>
                <td><?= $vinil['genero'] ?></td>
                <td><?= $vinil['preco'] ?></td>
                <td><?= $vinil['data_lancamento'] ?></td>
                <td><?= $vinil['data'] ?></td>
                <td>
                  <button type="button" value="<?= $vinil['vinil_id']; ?>"
                    class="ViewVinilBtn bi bi-info-circle btn btn-info btn-sm"></button>
                  <button type="button" value="<?= $vinil['vinil_id']; ?>"
                    class="EditVinilBtn bi bi-pencil-square btn btn-warning btn-sm"></button>
                  <button type="button" value="<?= $vinil['vinil_id']; ?>"
                    class="DeleteVinilBtn bi bi-trash btn btn-danger btn-sm" status="<?= $vinil['status']; ?>"></button>
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

  $('#idartistas').select2(
    allowClear: true);

  $('#idgeneros').select2(
    allowClear: true);

  $('#idgravadoras').select2(
    allowClear: true);

</script>

<script>
        document.getElementById('vinisAddModal').addEventListener('show.bs.modal', function (event) {
            $('#musicasAddModal').html('<li class="list-group-item">' +
            '<div style="display: flex; flex-direction: column; align-items: flex-start;">' +
            '<div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">' +
            '<span style="margin-right: 10px;">https://open.spotify.com/embed/track/</span>' +
            '<input type="text" class="form-control Insertsong" id="musica" name="" style="flex: 1;" required>' +
            '</div>' +
            '<div style="display: flex; align-items: center; width: 15%; margin-bottom: 10px;">' +
            '<label for="inputA1" style="margin-right: 10px;">Lado:</label>' +
            '<input type="text" class="form-control" id="lados" name="" style="flex: 1;" required>' +
            '</div>' +
            '<div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">' +
            '<label for="inputName" style="margin-right: 10px;">Name:</label>' +
            '<textarea type="text" class="form-control" rows="1" id="musica_nome" name="" style="flex: 1;" required></textarea>' +
            '</div>' +
            '<div style="display: flex; width: 100%; align-items: center;">' +
            '<iframe style="border-radius: 12px; flex: 2;"' +
            ' src=""' +
            ' width="100%" height="82" frameBorder="0" allowfullscreen=""' +
            ' allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"' +
            ' loading="lazy"></iframe>' +
            '</div>' +
            '</div>' +
            '</li>')
            document.getElementById('addvinilForm').reset();
        });
</script>


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->