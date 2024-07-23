$(document).on('click', '.ViewArtistaBtn', function () {

    var artista_id = $(this).val();
    console.log(artista_id);
    $.ajax({
        type: "GET",
        url: "pag/artistas/codeartistas.php?artista_id=" + artista_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="nome"]').val(res.data.Nome);
                var imageUrl = "../../" + res.data.foto;
                $('img[name="artista-foto"]').attr('src', imageUrl);
                $('#artistasViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditArtistaBtn', function () {

    var artista_id = $(this).val();
    console.log(artista_id);
    $.ajax({
        type: "GET",
        url: "pag/artistas/codeartistas.php?artista_id=" + artista_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="artista_id"]').val(res.data.Artista_id);
                $('input[name="nome"]').val(res.data.Nome);
                var imageUrl = "../../" + res.data.foto;
                $('img[name="artista-foto"]').attr('src', imageUrl);
                $('#artistasEditModal').modal('show');
            }
        }
    });
});




$(document).on('submit', '#artistasAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addartistaForm'));
    formData.append("salvar_artista", true);




    $.ajax({
        type: "POST",
        url: "pag/artistas/codeartistas.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#artistasAddModal').modal('hide');
                $('#addartistaForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('submit', '#artistasEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editartistaForm'));
    formData.append("editar_artista", true);




    $.ajax({
        type: "POST",
        url: "pag/artistas/codeartistas.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#artistasEditModal').modal('hide');
                $('#editartistaForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.DeleteArtistaBtn', function () {

    var artista_id = $(this).val();
    console.log(artista_id);
    swal({
        title: "Excluir o Artista?",
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
                url: "pag/artistas/codeartistas.php",
                data: { 'eliminar_artista': true, 'artista_id': artista_id },
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


$(document).on('change', '#FotoArtistasUpload', function () {
    var files = $(this)[0].files;
    $('img[name="artista-foto"]').attr('src', '');
    InsertImageArtist(files);
   
    

});

$(document).on('change', '#FotoArtistasEditUpload', function () {
    var files = $(this)[0].files;
    $('img[name="artista-foto"]').attr('src', '');
    InsertImageArtist(files);
   
    

});

function InsertImageArtist(files){
    Array.from(files).forEach((file) => {
        var reader = new FileReader();
        reader.onload = function (e) {
            var imagem = e.target.result; 
            $('img[name="artista-foto"]').attr('src', imagem);
            


        };
        reader.readAsDataURL(file);
    });
}