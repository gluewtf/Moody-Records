



    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
              <h2>Registo<h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->


<section class="login-area section-padding-100">
    
    <div class="container">
    <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                <div class="login-content">
                <h3>Bem-vindo</h3>
                <div class="login-form">
                    <form action="" id="criarContaForm" method="post">
                        <div class="form-group">
                            <label for="InputFirstNome">Primeiro Nome</label>
                            <input type="text"  required class="form-control" id="InputFirstNome" name="firstName" placeholder="Primeiro Nome">
                        </div>

                        <div class="form-group">
                            <label for="InputLastName">Apelido</label>
                            <input  type="text" required class="form-control" id="InputLastName" name="lastName" placeholder="Apelido">                          
                        </div>


                        <div class="form-group">
                            <label for="InputPhone">Telemóvel</label>
                            <input  type="tel" id="phone" name="phone" pattern="[0-9]*"  minLength="9" maxlength="9"  class="form-control" max="999999999">
                        </div>

                        <div class="form-group">
                            <label for="InputEmail">Login</label>
                            <input type="text"  name="login"  class="form-control" required>
                        </div>



                        <div class="form-group">
                            <label for="InputEmail">Email</label>
                            <input type="email" name="email"  class="form-control" required id="email">
                            <div class="invalid-feedback" style="display: none" id="emailError">
                                Ja existe uma conta registrada com este email!
                            </div>
                        </div>
                               

                        <div class="form-group">
                            <label for="inputNome" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password"></input>
                            <a onclick="showPass('Password')"  class="bi bi-eye showPass"></a> <label for="">Mostrar Password</label>
                            <div class="invalid-feedback" style="display: none" id="passError">
                                A password não cumpre os requesitos:
                                Pelo menos 8 caracteres, 1 caracter especial, e uma letra maiuscula.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="InputEmail">Confirmação da Password</label>
                            <input type="password" id="ConfPass"  name="confirmPassword" class="form-control" required>
                            <a onclick="showPass('ConfPass')"  class="bi bi-eye showPass"></a> <label for="">Mostrar Password</label>
                            <div class="invalid-feedback" style="display: none" id="ConfPassError">
                                As passwords não coincidem!
                            </div>
                        </div>


                    

                        <label for="InputLastName">Morada</label>


                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">País</label>
                                <select class="form-control" id="select-country" name="country" required>
                                    <option value="" disabled selected hidden>Selecione um país</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom02">Distrito</label>
                                <input type="text" class="form-control" name="district" placeholder="Distrito" required>
                                <div class="invalid-feedback">
                                    Por favor, forneça um estado válido.
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">Código Postal</label>
                                <input type="text" class="form-control" name="postalCode" pattern="[0-9]{4}-[0-9]{3}" placeholder="___-___" required>
                                <div class="invalid-feedback">
                                    Por favor, forneça um código postal válido.
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="InputLastName">Cidade</label>
                            <input type="text"  required class="form-control mb-3" name="city"  placeholder="Cidade">

                            <label for="InputLastName">Rua</label>
                            <textarea class="form-control" name="street" id="" cols="30" rows="10"placeholder="Rua"></textarea>
                        </div>




                        <button type="submit" class="btn oneMusic-btn mt-30">Criar conta</button>
                    </form>
                </div>
            </div>




                </div>
    </div>



    </div>

</section>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/utilizadores/utilizadores.js" type="text/javascript"></script>



