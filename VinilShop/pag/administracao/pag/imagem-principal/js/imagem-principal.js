$(document).on('click', '.ViewImagemPrincipalBtn', function () {

    var imagem_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/imagem-principal/codeimagemprincipal.php?imagem_id=" + imagem_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                var imageUrl = "../../" +res.data.imagem
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('input[name="titulo"]').val(res.data.titulo);
                $('input[name="subtitulo"]').val(res.data.subtitulo);
                $('input[name="botao"]').val(res.data.botao);
                $('input[name="link"]').val(res.data.link);
                $('img[name="imagem-principal"]').attr('src', imageUrl);
                $('#imagemprincipalViewModal').modal('show');
            }
        }
    });

    
});

$(document).on('submit', '#imagemprincipalAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addimagemprincipalForm'));
    formData.append("salvar_imagem", true);




    $.ajax({
        type: "POST",
        url: "pag/imagem-principal/codeimagemprincipal.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#imagemprincipalAddModal').modal('hide');
                $('#addimagemprincipalForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});



$(document).on('click', '.EditImagemPrincipalBtn', function () {

    var imagem_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/imagem-principal/codeimagemprincipal.php?imagem_id=" + imagem_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                var imageUrl = "../../" + res.data.imagem
                $('input[name="imagem_id"]').val(res.data.imagem_id);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('input[name="titulo"]').val(res.data.titulo);
                $('input[name="subtitulo"]').val(res.data.subtitulo);
                $('input[name="botao"]').val(res.data.botao);
                $('input[name="link"]').val(res.data.link);
                $('img[name="imagem-principal"]').attr('src', imageUrl);
                $('#imagemprincipalEditModal').modal('show');
            }
        }
    });
});



$(document).on('click', '.DeleteImagemPrincipalBtn', function () {

    var imagem_id = $(this).val();
    swal({
        title: "Excluir a Imagem Principal?",
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
                url: "pag/imagem-principal/codeimagemprincipal.php",
                data: { 'eliminar_imagem': true, 'imagem_id': imagem_id },
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


$(document).on('submit', '#imagemprincipalEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editimagemprincipalForm'));
    formData.append("editar_imagem", true);




    $.ajax({
        type: "POST",
        url: "pag/imagem-principal/codeimagemprincipal.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#imagemprincipalEditModal').modal('hide');
                $('#editimagemprincipalForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});


$(document).on('change', '#ImagemPrincipalEditUpload', function () {
    var files = $(this)[0].files;
    $('img[name="imagem-principal"]').attr('src', '');
    InsertImage(files);
   
    

});


$(document).on('change', '#ImagemPrincipalUpload', function () {
    var files = $(this)[0].files;
    $('img[name="imagem-principal"]').attr('src', '');
    InsertImage(files);
   
    

});


function InsertImage(files){
    Array.from(files).forEach((file) => {
        var reader = new FileReader();
        reader.onload = function (e) {
            var imagem = e.target.result; 
            $('img[name="imagem-principal"]').attr('src', imagem);
            


        };
        reader.readAsDataURL(file);
    });
}

