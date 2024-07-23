$(document).on('click', '.ViewNoticiaBtn', function () {

    var noticia_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/noticias/codenoticias.php?noticia_id=" + noticia_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('#carousel-noticias').html('')
                var index = 0;
                for (var key  in res.imagens) {
                var active = index == 0 ? " active" : "";
                  //Adiciona ao caroucel das noticias as imagens, se for o index 1 fica ativo
                $('#carousel-noticias').append(`<div class="carousel-item ${active}">
                                          <img class="d-block w-100" src="../../${res.imagens[key]['imagem']}" data-image="${key}">
                                          <div class="mt-3">
                                            <div class="row"> 
                                                <div class="col-md-10"> 
                                                    <label for="inputNome" class="form-label">Legenda</label>
                                                    <input type="text" value="${res.imagens[key]['descricao']}" class="form-control" id="inputName1" readonly></input>
                                                </div>

                                                 <div class="col-md-2"> 
                                                    <label for="inputNome" class="form-label">Local</label>
                                                    <input type="text" value="${res.imagens[key]['local']}" class="form-control" id="inputName1" readonly></input>
                                                </div>
                                            </div>
                                              
                                          </div>
                                    </div>`)
                index++
                }
                var autor = res.data.autor_nome + " " + res.data.autor_apelido;
                $('input[name="autor"]').val(autor);
                $('input[name="titulo"]').val(res.data.titulo);
                $('select[name="tipo"]').val(res.data.tipo);
                $('textarea[name="texto"]').val(res.data.texto);
                $('input[name="link"]').val(res.data.link);
                $('input[name="data-inicio"]').val(res.data.data_inicio);
                $('input[name="data-fim"]').val(res.data.data_fim);
                $('input[name="views"]').val(res.data.Qtd_vistas);
                if (res.data.status == "Publico")
                    $('input[name="status"]').prop("checked", true);
                else
                    $('input[name="status"]').prop("checked", false);

                $('#noticiaViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditNoticiaBtn', function () {

    var noticia_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/noticias/codenoticias.php?noticia_id=" + noticia_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('#carousel-Editnoticias').html('')
                var index = 0;
                for (var key  in res.imagens) {
                var active = index == 0 ? " active" : "";
                $('#carousel-Editnoticias').append(`<div class="carousel-item ${active}">
                                          <img class="d-block w-100" src="../../${res.imagens[key]['imagem']}" id="caroucel-image-noticia" data-image-noticia="${key}">
                                          <div class="mt-3">
                                            <div class="row"> 
                                                <div class="col-md-10"> 
                                                    <label for="inputNome" class="form-label">Legenda</label>
                                                    <input type="text" value="${res.imagens[key]['descricao']}" id="legendaEdit" class="form-control" id="inputName1"></input>
                                                </div>

                                                 <div class="col-md-2"> 
                                                    <label for="inputNome" class="form-label">Local</label>
                                                    <input type="text" value="${res.imagens[key]['local']}" id="localEdit" class="form-control" id="inputName1"></input>
                                                </div>
                                            </div>
                                              
                                          </div>
                                    </div>`)
                index++
                }
                var autor = res.data.autor_nome + " " + res.data.autor_apelido;
                $('input[name="noticia_id"]').val(res.data.noticia_id);
                $('input[name="autor"]').val(autor);
                $('input[name="titulo"]').val(res.data.titulo);
                $('select[name="tipo"]').val(res.data.tipo);
                $('textarea[name="texto"]').val(res.data.texto);
                $('input[name="link"]').val(res.data.link);
                var dateObject = new Date(res.data.data_inicio);

                var data = dateObject.toISOString().split('T')[0];
                $('input[name="data-inicio"]').val(data);
                $('input[name="data-fim"]').val(res.data.data_fim);
                $('input[name="views"]').val(res.data.Qtd_vistas);
                if (res.data.status == "Publico")
                    $('input[name="status"]').prop("checked", true);
                else
                    $('input[name="status"]').prop("checked", false);

                $('#noticiaEditModal').modal('show');
            }
        }
    });
});




$(document).on('submit', '#noticiaAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addnoticiaForm'));
    formData.append("salvar_noticia", true);

    var legendas = document.querySelectorAll('#legenda'); //pega as legendas
    legendas_array = [];

    legendas.forEach(function (legenda) {
        legendas_array.push(legenda.value);
    });

    var locais = document.querySelectorAll('#local');
    locais_array = [];

    locais.forEach(function (local) {
        locais_array.push(local.value);
    });





    formData.append("legendas", legendas_array);
    formData.append("locais", locais_array);



    $.ajax({
        type: "POST",
        url: "pag/noticias/codenoticias.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#noticiaAddModal').modal('hide');
                $('#addnoticiaForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('submit', '#noticiaEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editnoticiaForm'));
    formData.append("editar_noticia", true);

    var legendas = document.querySelectorAll('#legendaEdit');
    legendas_array = [];

    legendas.forEach(function (legenda) {
        legendas_array.push(legenda.value);
    });

    var locais = document.querySelectorAll('#localEdit');
    locais_array = [];

    locais.forEach(function (local) {
        locais_array.push(local.value);
    });

    let countFrontal = locais_array.filter(element => element == 'F').length;
    if(countFrontal > 1)
        {
            alert("Não podem existir 2 imagens frontais")
            return;
        }

    

    var imagens_ids = document.querySelectorAll('#caroucel-image-noticia'); //Ids das imegens a serem alteradas
    imagens_id_array = [];

    imagens_ids.forEach(function (image) {
        imagens_id_array.push(image.getAttribute('data-image-noticia'));
    });





    formData.append("legendas", legendas_array);
    formData.append("locais", locais_array);
    formData.append("imagens_ids", imagens_id_array);




    $.ajax({
        type: "POST",
        url: "pag/noticias/codenoticias.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#noticiaEditModal').modal('hide');
                $('#editnoticiaForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.DeleteNoticiaBtn', function () {

    var noticia_id = $(this).val();
    swal({
        title: "Excluir a Noticia?",
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
                url: "pag/noticias/codenoticias.php",
                data: { 'eliminar_noticia': true, 'noticia_id': noticia_id },
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


$(document).on('change', '#ImagensNoticiasUpload', function () {
    var files = $(this)[0].files;
    InsertImagesCaroucelNoticia(files, "#carousel-Addnoticias", false);
});

$(document).on('change', '#ImagensNoticiasEditUpload', function () {
    var files = $(this)[0].files;
    InsertImagesCaroucelNoticia(files, "#carousel-Editnoticias",true);
});

function InsertImagesCaroucelNoticia(files, id, edit) {

    if (edit) {
        var imagens_ids = document.querySelectorAll('#caroucel-image-noticia');
        imagens_id_array = [];
        imagens_ids.forEach(function (image) {
            imagens_id_array.push(image.getAttribute('data-image-noticia'));
        });
        $(id).html('');
    }
    else {
        $(id).html('');
    }

    Array.from(files).forEach((file, index) => {
        var reader = new FileReader();
        reader.onload = function (e) {
            var active = index == 0 ? " active" : "";
            var imagem = e.target.result;

            if(edit)
                {
                    $(id).append(`<div class="carousel-item ${active}">
                        <img class="d-block w-100" src="${imagem}" id="caroucel-image-noticia" data-image-noticia="${imagens_id_array[index]}">
                        <div class="mt-3">
                          <div class="row"> 
                              <div class="col-md-10"> 
                                  <label for="inputNome" class="form-label">Legenda</label>
                                  <input type="text" class="form-control" id="legendaEdit" required></input>
                              </div>

                               <div class="col-md-2"> 
                                  <label for="inputNome" class="form-label">Local</label>
                                  <input type="text"  class="form-control" id="localEdit" required></input>
                              </div>
                          </div>
                            
                        </div>
                  </div>`);
                }else
                {
                    $(id).append(`<div class="carousel-item ${active}">
                        <img class="d-block w-100" src="${imagem}" id="caroucel-image-noticia" data-image-noticia="">
                        <div class="mt-3">
                          <div class="row"> 
                              <div class="col-md-10"> 
                                  <label for="inputNome" class="form-label">Legenda</label>
                                  <input type="text" class="form-control" id="legenda" required></input>
                              </div>

                               <div class="col-md-2"> 
                                  <label for="inputNome" class="form-label">Local</label>
                                  <input type="text"  class="form-control" id="local" required></input>
                              </div>
                          </div>
                            
                        </div>
                  </div>`);

                }
              


        };
        reader.readAsDataURL(file);
    });
}