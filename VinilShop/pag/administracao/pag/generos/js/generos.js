$(document).on('click', '.ViewGenreBtn', function () {

    var genero_id = $(this).val();
    console.log(genero_id);
    $.ajax({
        type: "GET",
        url: "pag/generos/codegeneros.php?genero_id=" + genero_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="nome"]').val(res.data.nome);
                $('#generosViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditGenreBtn', function () {

    var genero_id = $(this).val();
    console.log(genero_id);
    $.ajax({
        type: "GET",
        url: "pag/generos/codegeneros.php?genero_id=" + genero_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="genero_id"]').val(res.data.genero_id);
                $('input[name="nome"]').val(res.data.nome);
                $('#generosEditModal').modal('show');
            }
        }
    });
});

$(document).on('submit', '#generosAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addgeneroForm'));
    formData.append("salvar_genero", true);




    $.ajax({
        type: "POST",
        url: "pag/generos/codegeneros.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#generosAddModal').modal('hide');
                $('#addgeneroForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('submit', '#generosEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editgeneroForm'));
    formData.append("editar_genero", true);




    $.ajax({
        type: "POST",
        url: "pag/generos/codegeneros.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#generosEditModal').modal('hide');
                $('#editgeneroForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.DeleteGenreBtn', function () {

    var genero_id = $(this).val();
    swal({
        title: "Excluir o Genero?",
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
                url: "pag/generos/codegeneros.php",
                data: { 'eliminar_genero': true, 'genero_id': genero_id },
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