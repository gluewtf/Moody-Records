$(document).ready(function() {
  // Criar conta
  $(document).on('submit', '#criarContaForm', function (e) {
    e.preventDefault();

    var formData = new FormData(document.getElementById('criarContaForm'));
    formData.append("criar_conta", true);

    $.ajax({
      type: "POST",
      url: "./pag/User/code/codeutilizadores.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log('AJAX request successful');
        var res = jQuery.parseJSON(response);

        if (res.status == 200) {
          $('#criarContaForm')[0].reset();
          window.location.href = res.header;
        } else {
          console.log(res.message);
        }

        //Mensagens de erro
        if(res.status == 300)
          {
            $('#email').addClass("is-invalid");
            $('#Password').removeClass("is-invalid");
            $('#passError').hide();
            $('#ConfPass').removeClass("is-invalid");
            $('#ConfPassError').hide()
            $('#emailError').show();
            
          }
        
        if(res.status == 100)
          {
            $('#Password').addClass("is-invalid");
            $('#email').removeClass("is-invalid");
            $('#emailError').hide();
            $('#ConfPass').removeClass("is-invalid");
            $('#ConfPassError').hide()
            $('#passError').show();

          }
        
        if(res.status == 101)
          {
            $('#ConfPass').addClass("is-invalid");
            $('#email').removeClass("is-invalid");
            $('#emailError').hide();
            $('#Password').removeClass("is-invalid");
            $('#passError').hide()
            $('#ConfPassError').show();
          }

      }
    });
  });

 
});

  // Abrir moda lde editar informacao pessoal
$(document).on('click', '.EditInformation', function () {
  
    
  
  $.ajax({
    type: "GET",
    url: "./pag/User/code/codeutilizadores.php?id",
    success: function (response) {
      var res = jQuery.parseJSON(response);
          
                if(res.status == 200){

                  
                  $('input[name="util_id"]').val(res.data.utilizador_id);
                  $('input[name="nome"]').val(res.data.nome);
                  $('input[name="apelido"]').val(res.data.apelido);
                  $('input[name="telemovel"]').val(res.data.telemovel);
                  $('input[name="pais"]').val(res.data.pais);
                  $('input[name="postal_code"]').val(res.data.codigo_postal);
                  $('input[name="distrito"]').val(res.data.distrito);
                  $('input[name="cidade"]').val(res.data.cidade);
                  $('input[name="rua"]').val(res.data.rua);
         
                  $('#AlterarDadosModal').modal('show');
      }
    }
  });
});



$(document).ready(function() {
  //Alteracao da informacao pessoal
  $(document).on('submit', '#AlterarDadosModal', function (e) {
        e.preventDefault();
  
          var formData = new FormData(document.getElementById('AlterarDadosForm'));
          formData.append("alterar_info", true);
  
            $.ajax({
                type: "POST",
                url: "./pag/User/code/codeutilizadores.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                  console.log('AJAX request successful');
                  var res = jQuery.parseJSON(response);
  
                
  
                  if (res.status == 220) {
  
                      $('#AlterarDadosModal').modal('hide');
                      $('#AlterarDadosForm')[0].reset();
                      location.reload();     
                  }
                }
            });
  });


});

//Modal de Edicao de Pagamento
$(document).on('click', '.EditPayment', function () {
  
    
  
  $.ajax({
    type: "GET",
    url: "./pag/User/code/codeutilizadores.php?id",
    success: function (response) {
      var res = jQuery.parseJSON(response);
          
                if(res.status == 200){


                  $('select[name="pagamento"]').val(res.data.metodopagamento_id);
         
                  $('#AlterarMetodoPagamentoModal').modal('show');
      }
    }
  });
});

//Alteracao de Pagamento

  $(document).on('submit', '#AlterarMetodoPagamentoModal', function (e) {
        e.preventDefault();
  
          var formData = new FormData(document.getElementById('AlterarMetodoPagamentoForm'));
          formData.append("alterar_pagamento", true);
  
            $.ajax({
                type: "POST",
                url: "./pag/User/code/codeutilizadores.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                  console.log('AJAX request successful');
                  var res = jQuery.parseJSON(response);
  
                
  
                  if (res.status == 250) {
  
                      $('#AlterarMetodoPagamentoModal').modal('hide');
                      $('#AlterarMetodoPagamentoForm')[0].reset();
                      location.reload();     
                  }
                }
            });
  });



//Modal de edicao de transportadora
$(document).on('click', '.EditShip', function () {
  
    
  
  $.ajax({
    type: "GET",
    url: "./pag/User/code/codeutilizadores.php?id",
    success: function (response) {
      var res = jQuery.parseJSON(response);
          
                if(res.status == 200){


                  $('select[name="transportadora"]').val(res.data.metodoenvio_id);
         
                  $('#AlterarTransportadoraModal').modal('show');
      }
    }
  });
});

//Alterar Transportadora
  $(document).on('submit', '#AlterarTransportadoraModal', function (e) {
        e.preventDefault();
  
          var formData = new FormData(document.getElementById('AlterarTransportadoraForm'));
          formData.append("alterar_transportadora", true);
  
            $.ajax({
                type: "POST",
                url: "./pag/User/code/codeutilizadores.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                  console.log('AJAX request successful');
                  var res = jQuery.parseJSON(response);
  
                
  
                  if (res.status == 250) {
  
                      $('#AlterarTransportadoraModal').modal('hide');
                      $('#AlterarTransportadoraForm')[0].reset();
                      location.reload();     
                  }
                }
            });
  });



//Esquecer Password Modal
$(document).on('submit', '#ForgotPasswordModal', function (e) {
  e.preventDefault();

  var formData = new FormData(document.getElementById('ForgotPasswordForm'));
  formData.append("forgot_password", true);
  var text =  $('#ForgotButton').text();
  if(text == 'Enviar') //Se for a primeira fase de inserir o email
  {
    formData.append("func", text);
    $.ajax({
      type: "POST",
      url: "./pag/User/code/codeutilizadores.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log('AJAX request successful');
        var res = jQuery.parseJSON(response);
  
        if (res.status == 200) {
          $('#ForgotPasswordForm')[0].reset();
          $('#errorMessage').text(res.message).removeClass('d-none');
          $('#ForgotButton').text('Alterar');
          $('#forgotBody').html(''); //Alteracao do Modal para a 2 fase
          $('#forgotBody').html('<input type="hidden" name="email"></input>' +
                                '<div class="mb-3">' +
                                '<label for="inputNome" class="form-label">Código</label>' +
                                '<input type="text" class="form-control" id="codigo" name="codigo" required>' +
                                '</div>' +
                                '<div class="mb-3">' +
                                '<label for="inputNome" class="form-label">Password</label>' +
                                '<input type="password" class="form-control" id="ForgotPass" name="password" required>' +
                                '<a href="#" class="bi bi-eye" onclick="showPass(\'ForgotPass\')"></a> <label for="">Mostrar Password</label>' +
                                '</div>' +
                                '<div class="mb-3">' +
                                '<label for="inputNome" class="form-label">Confirmação da Password</label>' +
                                '<input type="password" class="form-control" id="ForgotPassConfirm" name="Cpassword" required>' +
                                '<a href="#" class="bi bi-eye" onclick="showPass(\'ForgotPassConfirm\')"></a> <label for="">Mostrar Password</label>' +
                                '</div>');
        
            $('input[name="email"]').val(res.email);
  
        }
        else
        {
          $('#errorMessage').text(res.message).removeClass('d-none');
        }
        
      }
    });
  }

  if(text == 'Alterar') //Se for a segunda fase de alteracao da password
    {
      formData.append("func", text);
      $.ajax({
        type: "POST",
        url: "./pag/User/code/codeutilizadores.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log('AJAX request successful');
          var res = jQuery.parseJSON(response);
    
          if (res.status == 200) {
            $('#ForgotPasswordForm')[0].reset();
            $('#ForgotPasswordModal').modal('hide');
            window.location.reload();
          
          } else
          {
            $('#errorMessage').text(res.message).removeClass('d-none');
          }
        }
      });
    }
  
});


document.addEventListener("DOMContentLoaded", function() {
  //Guarda os paises 
  const countryData = window.intlTelInputGlobals.getCountryData();

  
  const countrySelector = document.getElementById("select-country");

  //Vai colocar os paises no dropdown
  countryData.forEach(country => {
      const option = document.createElement("option");
      option.value = country.name;
      option.textContent = country.name;
      countrySelector.appendChild(option);
  });
});

//Alterar a Pass Modal
$(document).on('submit', '#AlterarPassModal', function (e) {
  e.preventDefault();

    var formData = new FormData(document.getElementById('AlterarPassForm'));
    formData.append("alterar_password", true);

      $.ajax({
          type: "POST",
          url: "./pag/User/code/codeutilizadores.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            console.log('AJAX request successful');
            var res = jQuery.parseJSON(response);

          

            if (res.status == 200) {
                alert(res.message);
                $('#AlterarPassModal').modal('hide');
                $('#AlterarPassForm')[0].reset();
                location.reload();     
            }
            else{
              $('#errorMessageChangePass').text(res.message).removeClass('d-none');
            }
          }
      });
});

//Alterar email
$(document).on('submit', '#AlterarEmailModal', function (e) {
  e.preventDefault();

  var formData = new FormData(document.getElementById('AlterarEmailForm'));
  formData.append("alterar_email", true);
  var text =  $('#ChangeEmail').text();
  if(text == 'Enviar') //Verificar se esta na primeira fase
  {
    formData.append("func", text);
    $.ajax({
      type: "POST",
      url: "./pag/User/code/codeutilizadores.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        console.log('AJAX request successful');
        var res = jQuery.parseJSON(response);
  
        if (res.status == 200) {
          $('#AlterarEmailForm')[0].reset();
          $('#errorMessageChangeEmail').text(res.message).removeClass('d-none');
          $('#ChangeEmail').text('Alterar');
          $('#ChangeEmailBody').html('');
          $('#ChangeEmailBody').html('<input type="hidden" name="email"></input>' +
                                '<div class="mb-3">' +
                                '<label for="inputNome" class="form-label">Código</label>' +
                                '<input type="text" class="form-control" id="codigo" name="codigo" required>' +
                                '</div>');
            
        
            $('input[name="email"]').val(res.email);
  
        }
        else
        {
          $('#errorMessageChangeEmail').text(res.message).removeClass('d-none');
        }
        
      }
    });
  }

  if(text == 'Alterar') //Verificar se esta na segunda fase
    {
      formData.append("func", text);
      $.ajax({
        type: "POST",
        url: "./pag/User/code/codeutilizadores.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
          console.log('AJAX request successful');
          var res = jQuery.parseJSON(response);
    
          if (res.status == 200) {
            $('#AlterarEmailForm')[0].reset();
            $('#AlterarEmailModal').modal('hide');
            window.location.reload();
          
          } else
          {
            $('#errorMessageChangeEmail').text(res.message).removeClass('d-none');
          }
        }
      });
    }
  
});

//Mostrar password
function showPass(id) {
  var x = document.getElementById(id);
  if (x.type == "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


