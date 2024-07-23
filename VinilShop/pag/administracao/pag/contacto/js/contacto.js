$(document).on('click', '.ViewContactoBtn', function () {
    $.ajax({
        type: "GET",
        url: "pag/contacto/codecontacto.php?view_contacto=true",
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {;
                $('iframe[name="mapa"]').attr('src', res.data.localizacao);
                $('input[name="localizacao"]').val(res.data.localizacao);
                $('textarea[name="morada"]').val(res.data.morada);
                $('input[name="telemovel"]').val(res.data.telemovel);
                $('input[name="email"]').val(res.data.email);
                $('input[name="facebook"]').val(res.data.facebook);
                $('input[name="twitter"]').val(res.data.twitter);
                $('input[name="instagram"]').val(res.data.instagram);
                $('#contactoViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditContactoBtn', function () {
    $.ajax({
        type: "GET",
        url: "pag/contacto/codecontacto.php?view_contacto=true",
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {;
                $('iframe[name="mapa"]').attr('src', res.data.localizacao);
                $('input[name="localizacao"]').val(res.data.localizacao);
                $('textarea[name="morada"]').val(res.data.morada);
                $('input[name="telemovel"]').val(res.data.telemovel);
                $('input[name="email"]').val(res.data.email);
                $('input[name="facebook"]').val(res.data.facebook);
                $('input[name="twitter"]').val(res.data.twitter);
                $('input[name="instagram"]').val(res.data.instagram);
                $('#contactoEditModal').modal('show');
            }
        }
    });
});

$(document).on('submit', '#contactoEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editcontactoForm'));
    formData.append("editar_contacto", true);




    $.ajax({
        type: "POST",
        url: "pag/contacto/codecontacto.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#contactoEditModal').modal('hide');
                $('#editcontactoForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('keyup', '#inputlocal', function (event) {
    event.preventDefault();
    var iframeSrc = $(this).val();

    $('iframe[name="mapa"]').attr("src", iframeSrc);
    

});
