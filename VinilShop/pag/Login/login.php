<?php 
if(isset($_GET['codigo']))
{
    $codigo = $_GET['codigo'];
    $query = "SELECT * FROM utilizador where  md5(CONCAT(email, login)) = '$codigo'"; //Verifica o utilizador
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        if(mysqli_num_rows($query_run) == 1) 
        {
          $query_verify = "UPDATE utilizador set status = 'Ativo' where  md5(CONCAT(email, login)) = '$codigo'";
          $query_run_verify = mysqli_query($con, $query_verify);
            $_SESSION['login_error'] = "Email verificado com sucesso!";
        }
    }

    echo "<script>window.location.href = './?op=5'</script>";
    exit();
}?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
              <h2>Login<h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">

        <?php
if(isset($_SESSION['login_error'])) {
?>
     <div class="alert alert-warning" role="alert">
        <?= $_SESSION['login_error'] ?>
    </div>
<?php
  unset($_SESSION['login_error']);
}  
?>

            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
           <div class="login-content">
                <h3>Bem-vindo de Volta</h3>
                <div class="login-form">
                    <form action="./bd/processa-login.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email ou Login</label>
                            <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="E-mail ou Login">
                            <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>Nos nao iremos partilhar o seu email com mais ninguem</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="Password" placeholder="Password">
                            <a onclick="showPass('Password')" href="#" class="bi bi-eye"></a> <label for="">Mostrar Password</label>
                            <a href="#" data-toggle="modal" data-target="#ForgotPasswordModal">
                                <small id="passwordHelp" class="form-text" style="color: #1c6fb8; font-weight: normal">Esqueci a minha Password</small>
                            </a>
                        </div>
                        <button type="submit" class="btn oneMusic-btn mt-30 mr-45">Login</button>
                        <a href="./?op=11" class="btn oneMusic-btn mt-30">Criar conta</a>
                    </form>
                </div>
          </div>
                </div>
            </div>
        </div>
    </section>

<section>
<div class="modal fade" id="ForgotPasswordModal" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Recuperação de Password</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
                                  </div>

                                  <form id="ForgotPasswordForm" method="POST">
                                  <div class="modal-body">
                                    <div id="errorMessage" class="alert alert-danger d-none"></div>
                                      <div  id="forgotBody">
                                        <div id="emailInput" class="mb-3">
                                          <label for="inputNome" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputName1" name="email" required></input>
                                          </div>
                                      </div>


                                   

                                    
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" id="ForgotButton" class="btn btn-dark">Enviar</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                </div>
                              </div>
                            </form>

                        </div>
</section>
   


