<?php
    error_reporting(E_ERROR | E_PARSE);
    header('Location: index.php?op=6');
?>

<section>
  <!-- Alterar email modal -->
    <div class="modal fade" id="AlterarEmailModal" tabindex="-1">

                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Alterar Email</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                                  </div>
                              <form id="AlterarEmailForm" method="POST">
                                  <div class="modal-body">
                                    <div id="errorMessageChangeEmail" class="alert alert-warning d-none"></div>

                                    <div id="ChangeEmailBody">

                                        <label class="text-center">Aqui consegues alterar o teu email. Para completar este processo tu vais ter que confirmar o teu email antes</label>

                                        <div class="form-row">
                                            <div class="col-md-6 mb-3">
                                                <label for="inputNovoEmail">Novo email</label>
                                                <input type="text" class="form-control" id="inputNovoEmail" name="NovoEmail" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="inputConfirmarNovoEmail">Confirmar novo email</label>
                                                <input type="text" class="form-control" id="inputConfirmarNovoEmail" name="ConfirmarNovoEmail" required>
                                            </div>
                                        </div>
                                    </div>


                                    
                                    
                                                                    
                                  </div>
                                  <div class="modal-footer" id="ChangeEmailFooter">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="ChangeEmail" class="btn btn-dark">Enviar</button>
                                  </div>


                                </div>
                              </div>
                            </form>
                        </div>

                        <!-- End Alterar Email-->


    <div class="modal fade" id="AlterarPassModal" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Alterar password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
              </div>
              
          <form id="AlterarPassForm" method="POST">
              <div class="modal-body">
                <div id="errorMessageChangePass" class="alert alert-danger d-none"></div>



                <div class="mb-3">
                  <label for="inputNome" class="form-label">Password antiga <a onclick="showPass('inputOldPassword')" href="#" class="bi bi-eye"></a></label>
                  <input type="password" class="form-control" id="inputOldPassword" name="OldPassword"></input>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Password nova <a onclick="showPass('inputNewPassword')" href="#" class="bi bi-eye"></a></label>
                  <input type="password" class="form-control" id="inputNewPassword" name="NewPassword"></input>
                </div>

                <div class="mb-3">
                  <label for="inputNome" class="form-label">Confirmação da password nova <a onclick="showPass('inputConfirmPassword')" href="#" class="bi bi-eye"></a></label>
                  <input type="password" class="form-control" id="inputConfirmPassword" name="ConfirmPassword"></input>
                </div>

                


                
                
                                                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-dark">Alterar</button>
              </div>


            </div>
          </div>
        </form>
    </div>

    <!-- End AlterarPassModal-->
    
</section>


<div class="col-md-9">
    <div class="card">
        <div class="card-body">

            <h5 class="col-sm-10 mt-2 mb-2">Detalhes de Login</h5> 
            <div class="row">
                <strong class="col-sm-2  mb-2 text-right ">Email</strong>
                <label class="col-sm-2.5 mb-2" ><?= $_SESSION['user']['email']?></label><div class="EditBtnSecurity" data-toggle="modal" data-target="#AlterarEmailModal"><i class="bi bi-pencil"></i></div>                                
            </div>

            <div class="row">
                <strong class="col-sm-2  mb-2 text-right ">Password</strong>
                <label class="col-sm-2.5 mb-2" >*****</label><div class="EditBtnSecurity" data-toggle="modal" data-target="#AlterarPassModal"><i class="bi bi-pencil"></i></div>                                
            </div>

        

        </div>
    </div>
</div>
