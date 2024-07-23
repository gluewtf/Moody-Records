

<div class="pagetitle">
  <h1>Contacto</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Configuracões</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">



<div class="modal fade" id="contactoViewModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ver Contacto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="vercontactoForm" method="POST">
          <div class="modal-body">
              <iframe width="1110" class="mb-3" height="500" name="mapa" src="" allowfullscreen></iframe>
              <div class="mb-3">
                            <label for="inputNome" class="form-label">Localização</label>
                            <input type="text" class="form-control" id="inputName1" name="localizacao" readonly></input>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="inputNome" class="form-label">Morada</label>
                  <textarea type="text" rows="1" class="form-control" id="inputName1" name="morada" readonly></textarea>
                </div>

                <div class="col-md-2">
                  <label for="inputNome" class="form-label">Telemovel</label>
                  <input type="text" rows="1" class="form-control" id="inputName1" name="telemovel" readonly></input>
                </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Email</label>
                    <input type="text" rows="1" class="form-control" id="inputName1" name="email" readonly></input>
                  </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="inputNome" class="form-label"><i class="fa-brands fa-facebook"></i> Facebook</label>
                  <input type="text" rows="1" class="form-control" id="inputName1" name="facebook" readonly></input>
                </div>

                <div class="col-md-4">
                  <label for="inputNome" class="form-label"><i class="fa-brands fa-x-twitter"></i> Twitter</label>
                  <input type="text" rows="1" class="form-control" id="inputName1" name="twitter" readonly></input>
                </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label"><i class="fa-brands fa-instagram"></i> Instagram</label>
                    <input type="text" rows="1" class="form-control" id="inputName1" name="instagram" readonly></input>
                  </div>
              </div>

          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End View Contacto Modal-->

<div class="modal fade" id="contactoEditModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Contacto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="editcontactoForm" method="POST">
          <div class="modal-body">
              <iframe width="1110" class="mb-3" height="500" name="mapa" src="" allowfullscreen></iframe>
              <div class="mb-3">
                            <label for="inputNome" class="form-label">Localização</label>
                            <input id="inputlocal" type="text" class="form-control" id="inputName1" name="localizacao"></input>
              </div>

              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="inputNome" class="form-label">Morada</label>
                  <textarea type="text" rows="1" class="form-control" id="inputName1" name="morada"></textarea>
                </div>

                <div class="col-md-2">
                  <label for="inputNome" class="form-label">Telemovel</label>
                  <input type="text" rows="1" class="form-control" id="inputName1" name="telemovel"></input>
                </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label">Email</label>
                    <input type="text" rows="1" class="form-control" id="inputName1" name="email"></input>
                  </div>
              </div>

              <div class="row mb-3">
                <div class="col-md-4">
                  <label for="inputNome" class="form-label"><i class="fa-brands fa-facebook"></i> Facebook</label>
                  <input type="text" rows="1" class="form-control" id="inputName1" name="facebook"></input>
                </div>

                <div class="col-md-4">
                  <label for="inputNome" class="form-label"><i class="fa-brands fa-x-twitter"></i> Twitter</label>
                  <input type="text" rows="1" class="form-control" id="inputName1" name="twitter"></input>
                </div>

                  <div class="col-md-4">
                    <label for="inputNome" class="form-label"><i class="fa-brands fa-instagram"></i> Instagram</label>
                    <input type="text" rows="1" class="form-control" id="inputName1" name="instagram"></input>
                  </div>
              </div>

          </div>

          <div class="modal-footer">
            <button type="reset" value="Reset" class="btn btn-danger">Reset</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Editar</button>
          </div>


      </div>
    </div>
    </form>
</div><!-- End Edit Contacto Modal-->



  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Tabela de Contacto</h5>

      <!-- Table with stripped rows -->
      <table id="contactoTable" class="table">
        <thead>
          <tr>
            <th scope="col">Morada</th>
            <th scope="col">Telemovel</th>
            <th scope="col">Email</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php


          if (mysqli_num_rows(GetContactoTable()) > 0) {
            foreach (GetContactoTable() as $contacto) {
              ?>
              <tr>
                <td><?= $contacto['morada'] ?></td>
                <td><?= $contacto['telemovel'] ?></td>
                <td><?= $contacto['email'] ?></td>
                <td>
                  <button type="button"
                    class="ViewContactoBtn bi bi-info-circle btn btn-info btn-sm">
                    </button>
                  <button type="button"
                    class="EditContactoBtn bi bi-pencil-square btn btn-warning btn-sm">
                </button>
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


<!-- <script src="Funcionarios/js/funcionarios.js"></script> -->