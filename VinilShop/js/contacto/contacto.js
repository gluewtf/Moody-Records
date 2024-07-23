//Enviar a mensagem de contacto
$(document).on('submit', '#ContactoForm', function (e) {
    e.preventDefault();

      var formData = new FormData(document.getElementById('ContactoForm'));
      formData.append("contactar", true);

        $.ajax({
            type: "POST",
            url: "./pag/contacto/codecontacto.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
              console.log('AJAX request successful');
              var res = jQuery.parseJSON(response);

            

              if (res.status == 250) {

                  $('#ContactoForm')[0].reset();
                  $('#errorMessageContacto').text(res.message).removeClass('d-none');
              }
            }
        });
});
