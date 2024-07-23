$(document).on('click', '.ViewEnvioBtn', function () {

    var envio_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/metodo-envio/codemetodoenvio.php?envio_id=" + envio_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="nome"]').val(res.data.nome);
                $('input[name="preco"]').val(res.data.preco);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('#envioViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditEnvioBtn', function () {

    var envio_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/metodo-envio/codemetodoenvio.php?envio_id=" + envio_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="envio_id"]').val(res.data.MetodoEnvio_id);
                $('input[name="nome"]').val(res.data.nome);
                $('input[name="preco"]').val(res.data.preco);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('#envioEditModal').modal('show');
            }
        }
    });
});


$(document).on('submit', '#envioAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addenvioForm'));
    formData.append("salvar_envio", true);




    $.ajax({
        type: "POST",
        url: "pag/metodo-envio/codemetodoenvio.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#envioAddModal').modal('hide');
                $('#addenvioForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});


$(document).on('submit', '#envioEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editenvioForm'));
    formData.append("editar_envio", true);




    $.ajax({
        type: "POST",
        url: "pag/metodo-envio/codemetodoenvio.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#envioEditModal').modal('hide');
                $('#editenvioForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.DeleteEnvioBtn', function () {

    var envio_id = $(this).val();
    swal({
        title: "Excluir o Metodo de Envio?",
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
                url: "pag/metodo-envio/codemetodoenvio.php",
                data: { 'eliminar_envio': true, 'envio_id': envio_id },
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