$(document).on('click', '.ViewGravadoraBtn', function () {

    var gravadora_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/gravadoras/codegravadoras.php?gravadora_id=" + gravadora_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="nome"]').val(res.data.nome);
                $('#gravadorasViewModal').modal('show');
            }
        }
    });
});

$(document).on('submit', '#gravadorasAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addgravadoraForm'));
    formData.append("salvar_gravadora", true);




    $.ajax({
        type: "POST",
        url: "pag/gravadoras/codegravadoras.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#gravadorasAddModal').modal('hide');
                $('#addgravadoraForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.EditGravadoraBtn', function () {

    var gravadora_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/gravadoras/codegravadoras.php?gravadora_id=" + gravadora_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="gravadora_id"]').val(res.data.gravadora_id);
                $('input[name="nome"]').val(res.data.nome);
                $('#gravadorasEditModal').modal('show');
            }
        }
    });
});

$(document).on('submit', '#gravadorasEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editgravadoraForm'));
    formData.append("editar_gravadora", true);




    $.ajax({
        type: "POST",
        url: "pag/gravadoras/codegravadoras.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#gravadorasEditModal').modal('hide');
                $('#editgravadoraForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.DeleteGravadoraBtn', function () {

    var gravadora_id = $(this).val();
    swal({
        title: "Excluir o Gravadora?",
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
                url: "pag/gravadoras/codegravadoras.php",
                data: { 'eliminar_gravadora': true, 'gravadora_id': gravadora_id },
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
