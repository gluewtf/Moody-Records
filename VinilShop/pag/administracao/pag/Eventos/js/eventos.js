$(document).on('click', '.ViewEventoBtn', function () {

    var evento_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/Eventos/codeeventos.php?evento_id=" + evento_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                var imageUrl = "../../" + res.data.imagem;
                $('img[name="evento-imagem"]').attr('src', imageUrl);
                $('input[name="nome"]').val(res.data.nome);
                $('input[name="data-inicio"]').val(res.data.data_inicio);
                $('input[name="data-fim"]').val(res.data.data_fim);
                $('input[name="local"]').val(res.data.local);
                $('input[name="link"]').val(res.data.link);
                $('#eventosViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditEventoBtn', function () {

    var evento_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/Eventos/codeeventos.php?evento_id=" + evento_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                var imageUrl = "../../" + res.data.imagem;
                $('img[name="evento-imagem"]').attr('src', imageUrl);
                $('input[name="evento_id"]').val(res.data.evento_id);
                $('input[name="nome"]').val(res.data.nome);
                $('input[name="data-inicio"]').val(res.data.data_inicio);
                $('input[name="data-fim"]').val(res.data.data_fim);
                $('input[name="local"]').val(res.data.local);
                $('input[name="link"]').val(res.data.link);
                $('#eventosEditModal').modal('show');
            }
        }
    });
});

$(document).on('submit', '#eventosAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addeventoForm'));
    formData.append("salvar_evento", true);




    $.ajax({
        type: "POST",
        url: "pag/Eventos/codeeventos.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#eventosAddModal').modal('hide');
                $('#addeventoForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('submit', '#eventosEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editeventoForm'));
    formData.append("editar_evento", true);




    $.ajax({
        type: "POST",
        url: "pag/Eventos/codeeventos.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#eventosEditModal').modal('hide');
                $('#editeventoForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});




$(document).on('change', '#EventoUpload', function () {
    var files = $(this)[0].files;
    $('img[name="evento-imagem"]').attr('src', '');
    InsertImageEvent(files);
});

$(document).on('change', '#EventoEditUpload', function () {
    var files = $(this)[0].files;
    $('img[name="evento-imagem"]').attr('src', '');
    InsertImageEvent(files);
   
    

});

$(document).on('click', '.DeleteEventoBtn', function () {

    var evento_id = $(this).val();
    swal({
        title: "Excluir o Evento?",
        text: "",
        icon: "warning",
        buttons: true,
        closeOnClickOutside: false,
        closeOnEsc: false,
        dangerMode: true,
    }).then((willConfirm) => {
        if (willConfirm) {
            $.ajax({
                type: "POST",
                url: "pag/Eventos/codeeventos.php",
                data: { 'eliminar_evento': true, 'evento_id': evento_id },
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {
                        window.location.href = window.location.href;
                    }
                }
            });
        }
    });

});


function InsertImageEvent(files){
    Array.from(files).forEach((file) => {
        var reader = new FileReader();
        reader.onload = function (e) {
            var imagem = e.target.result;
            $('img[name="evento-imagem"]').attr('src', imagem);
            


        };
        reader.readAsDataURL(file);
    });
}