//Ver o Vinil
$(document).on('click', '.ViewVinilBtn', function () {

    var vinil_id = $(this).val();
    console.log(vinil_id);
    $.ajax({
        type: "GET",
        url: "pag/Vinis/codevinis.php?vinil_id=" + vinil_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {

                if (Object.keys(res.imgs).length === 1) {
                    var key = Object.keys(res.imgs)[0];
                    var element = res.imgs; 
                    var imageUrl = "../../" + element[key];
                    $('img[name="Image0"]').attr('src', imageUrl);
                    $('img[name="Image0"]').attr('data-image', key);
                }
                else if (Object.keys(res.imgs).length > 1) { //Percorre o array de imagens
                    var index = 0;
                    for (var key in res.imgs) {
                        var imageUrl = "../../" + res.imgs[key];
                        $('img[name="Image' + index + '"]').attr('src', imageUrl); //Coloca a imagem
                        $('img[name="Image' + index + '"]').attr('data-image', key); //Coloca o id da imagem
                        index++;

                    }

                }
                $('input[name="nome"]').val(res.data.nome);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('input[name="tipo"]').val(res.data.tipo);
                $('input[name="artista"]').val(res.data.artista);
                $('input[name="genero"]').val(res.data.genero);
                $('input[name="gravadora"]').val(res.data.gravadora);
                $('input[name="desconto"]').val(res.data.desconto);
                $('input[name="formato"]').val(res.data.formato);
                $('input[name="catalogo"]').val(res.data.catalogo_numero);
                $('input[name="data-lancamento"]').val(res.data.data_lancamento);
                $('input[name="data"]').val(res.data.data);
                $('input[name="preco"]').val(res.data.preco);
                $('input[name="peso"]').val(res.data.peso);
                $('input[name="qtd_stock"]').val(res.data.Qtd_stock);
                $('input[name="views"]').val(res.data.Qtd_vistas);
                $('input[name="comprados"]').val(res.data.Qtd_comprados);
                if (res.data.status == "Publico")
                    $('input[name="status"]').prop("checked", true);
                else
                    $('input[name="status"]').prop("checked", false);

                $('#musicasViewModal').html(res.lista);
                $('#vinisViewModal').modal('show');
            }
        }
    });
});

//Abre o modal de editar o vinil
$(document).on('click', '.EditVinilBtn', function () {

    var vinil_id = $(this).val();
    console.log(vinil_id);
    $.ajax({
        type: "GET",
        url: "pag/Vinis/codevinis.php?vinil_id=" + vinil_id,
        data: { func: 'edit' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {



                if (Object.keys(res.imgs).length === 1) {
                    var key = Object.keys(res.imgs)[0];
                    var element = res.imgs; // Get the single element
                    var imageUrl = "../../" + element[key];
                    $('img[name="Image0"]').attr('src', imageUrl);
                    $('img[name="Image0"]').attr('data-image', key);
                }
                else if (Object.keys(res.imgs).length > 1) {
                    var index = 0;
                    for (var key in res.imgs) {
                        var imageUrl = "../../" + res.imgs[key];
                        $('img[name="Image' + index + '"]').attr('src', imageUrl);
                        $('img[name="Image' + index + '"]').attr('data-image', key);
                        index++;

                    }

                }
                $('input[name="vinil_id"]').val(res.data.vinil_id);

                $('input[name="nome"]').val(res.data.nome);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('select[name="tipo"]').val(res.data.tipo);
                $('select[name="artista"]').val(res.data.artista_id);
                $('select[name="genero"]').val(res.data.genero_id);
                $('select[name="gravadora"]').val(res.data.gravadora_id);
                $('input[name="desconto"]').val(res.data.desconto);
                $('select[name="formato"]').val(res.data.formato);
                $('input[name="catalogo"]').val(res.data.catalogo_numero);
                $('input[name="data-lancamento"]').val(res.data.data_lancamento);
                $('input[name="data"]').val(res.data.data);
                $('input[name="preco"]').val(res.data.preco);
                $('input[name="peso"]').val(res.data.peso);
                $('input[name="qtd_stock"]').val(res.data.Qtd_stock);
                $('input[name="views"]').val(res.data.Qtd_vistas);
                $('input[name="comprados"]').val(res.data.Qtd_comprados);
                if (res.data.status == "Publico")
                    $('input[name="status"]').prop("checked", true);
                else
                    $('input[name="status"]').prop("checked", false);

                $('#QtdMusicasEdit').val(res.qtd);
                $('#QtdMusicasEdit').attr('value',res.qtd);
                $('#musicasEditModal').html(res.lista);
                $('#vinisEditModal').modal('show');
            }
        }
    });
});

//Deletar o vinil
$(document).on('click', '.DeleteVinilBtn', function () {

    var vinil_id = $(this).val();
    console.log(vinil_id);
    var status = $(this).attr('status');
    var message = status == 'Desativado'? "Ativar o Vinil?" : "Desativar o Vinil?"; //Mensagem de confirmacao
    swal({
        title: message,
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
                url: "pag/Vinis/codevinis.php",
                data: { 'eliminar_vinil': true, 'vinil_id': vinil_id, status: status },
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

//Adicionar o vinil
$(document).on('submit', '#vinisAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addvinilForm'));
    formData.append("salvar_vinil", true);

    var musicas = document.querySelectorAll('#musica'); //pega todos os elementos com o id 'musica'
    musicas_array = [];

    musicas.forEach(function (musica) {
        musicas_array.push("https://open.spotify.com/embed/track/" + musica.value); //vai guardar a preview de todas as musicas do modal em um array
    });

    var musicas_nome = document.querySelectorAll('#musica_nome');
    musicas_nome_array = [];

    musicas_nome.forEach(function (musica) {
        musicas_nome_array.push(musica.value);
    });

    var musicas_lados = document.querySelectorAll('#lados');
    musicas_lado_array = [];

    musicas_lados.forEach(function (musica) {
        musicas_lado_array.push(musica.value);
    });



    formData.append("musicas", musicas_array); //adiciona o preview das musicas ao FormData
    formData.append("musicas_nome", musicas_nome_array);
    formData.append("lados", musicas_lado_array);



    $.ajax({
        type: "POST",
        url: "pag/Vinis/codevinis.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#vinisAddModal').modal('hide');
                $('#addvinilForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

//Editar o vinil
$(document).on('submit', '#vinisEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editvinilForm'));
    formData.append("editar_vinil", true);

    var musicas = document.querySelectorAll('#musicaEdit');
    musicas_array = [];

    musicas.forEach(function (musica) {
        musicas_array.push("https://open.spotify.com/embed/track/" + musica.value);
    });

    var musicas_nome = document.querySelectorAll('#musica_nomeEdit');
    musicas_nome_array = [];

    musicas_nome.forEach(function (musica) {
        musicas_nome_array.push(musica.value);
    });

    var musicas_lados = document.querySelectorAll('#ladosEdit');
    musicas_lado_array = [];

    musicas_lados.forEach(function (musica) {
        musicas_lado_array.push(musica.value);
    });

    var imagens_ids = document.querySelectorAll('#caroucel-image');
    imagens_id_array = [];

    imagens_ids.forEach(function (image) {
        imagens_id_array.push(image.getAttribute('data-image'));
    });

    var musica_ids = document.querySelectorAll('#spotify');
    musica_id_array = [];

    musica_ids.forEach(function (image) {
        musica_id_array.push(image.getAttribute('data-music'));
    });



    formData.append("musicas", musicas_array);
    formData.append("musicas_nome", musicas_nome_array);
    formData.append("lados", musicas_lado_array);
    formData.append("imagens_ids", imagens_id_array);
    formData.append("musicas_ids", musica_id_array);



    $.ajax({
        type: "POST",
        url: "pag/Vinis/codevinis.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#vinisEditModal').modal('hide');
                $('#editvinilForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});



//Resetar o modal
$(document).on('click', '.ResetModalVinis', function () {
    $("#carousel-vinis").html("");
    $("#musicasAddModal").html("");
    $("#musicasAddModal").append('<li class="list-group-item">' +
        '<div style="display: flex; flex-direction: column; align-items: flex-start;">' +
        '<div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">' +
        '<span style="margin-right: 10px;">https://open.spotify.com/embed/track/</span>' +
        '<input type="text" class="form-control Insertsong" id="musica" name="" style="flex: 1;" required="">' +
        '</div>' +
        '<div style="display: flex; align-items: center; width: 15%; margin-bottom: 10px;">' +
        '<label for="inputA1" style="margin-right: 10px;">Lado:</label>' +
        '<input type="text" class="form-control"  id="lados" name="" style="flex: 1;" required>' +
        '</div>' +
        '<div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">' +
        '<label for="inputName" style="margin-right: 10px;">Name:</label>' +
        '<textarea type="text" class="form-control" rows="1" id="musica_nome" name="" style="flex: 1;" required></textarea>' +
        '</div>' +
        '<div style="display: flex; width: 100%; align-items: center;">' +
        '<iframe style="border-radius: 12px; flex: 2;"' +
        ' src=""' +
        ' width="100%" height="82" frameBorder="0" allowfullscreen=""' +
        ' allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"' +
        ' loading="lazy"></iframe>' +
        '</div>' +
        '</div>' +
        '</li>');
});

//Inserir imagens no file upload no modal de adicionar
$(document).on('change', '#imagensVinisUpload', function () {
    var files = $(this)[0].files;
    var numFiles = $(this)[0].files.length;
    if (numFiles == 3) { //verifica se sao 3 imagens
        InsertImagesCaroucel(files, "#carousel-vinis", false) //Adicionar ao carousel
    }

});

//Inserir imagens no file upload no modal de editar
$(document).on('change', '#imagensVinisEditUpload', function () {
    var files = $(this)[0].files;
    var numFiles = $(this)[0].files.length;
    if (numFiles == 3) {

        InsertImagesCaroucel(files, '#carousel-edit', true); //adiciona as imagens no caroucel

    }

});

//Adicao de imagens no caroucel
function InsertImagesCaroucel(files, id, edit) {

    if (edit) { //Se for editar pega o ids das imagens existentes e guarda num array
        var imagens_ids = document.querySelectorAll('#caroucel-image');
        imagens_id_array = [];
        imagens_ids.forEach(function (image) {
            imagens_id_array.push(image.getAttribute('data-image'));
        });
        $(id).html('');
    }
    else {
        $(id).html('');
    }

    //Percore o array de files e adiciona ao caroucel
    Array.from(files).forEach((file, index) => {
        var reader = new FileReader();
        reader.onload = function (e) {
            var active = index == 1 ? " active" : ""; //Se o index for 1 entao vai ter a class active
            var imagem = e.target.result; 
            if (edit) {
                $(id).append(`
                    <div class="carousel-item${active}">
                        <img class="d-block w-100" src="${imagem}"  data-image="${imagens_id_array[index]}" id="caroucel-image" name="Image` + `${index}" alt="Slide ${index + 1}">
                    </div>
                `);
            }
            else {

                $(id).append(`
                    <div class="carousel-item${active}">
                        <img class="d-block w-100" src="${imagem}" id="caroucel-image" name="Image` + `${index}" alt="Slide ${index + 1}">
                    </div>
                `);
            }


        };
        reader.readAsDataURL(file); //Le a imagem para conseguir mostrar
    });
}
//Adicao de novas musicas ao modal de adcionar
$(document).on('change', '#QtdMusicas', function (event) { 
    event.preventDefault();
    var element = $(this);
    var qtdAntiga = $(this).attr("value");
    var qtd = $(this).val();
    var func = ''; //A funcao vai vazia porque e para adicionar
    AddSongsModal('#musicasAddModal', element, qtdAntiga, qtd, func); //Adiciona os campos para o utilizador preencher com as musicas
   


});

//Adicao de novas musicas ao modal de editar
$(document).on('change', '#QtdMusicasEdit', function (event) {
    event.preventDefault();
    var element = $(this);
    var qtdAntiga = $(this).attr("value");
    var qtd = $(this).val();
    var func = 'Edit';
    AddSongsModal('#musicasEditModal', element, qtdAntiga, qtd, func);
   


});

//Adicao dos campos de adicao de musicas
function AddSongsModal(id, element, qtdAntiga, qtd, func){
    console.log(id);
    if (AddSong(element, qtdAntiga, qtd)) { //Adiciona
        $(id).append('<li class="list-group-item">' +
            '<div style="display: flex; flex-direction: column; align-items: flex-start;">' +
            '<div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">' +
            '<span style="margin-right: 10px;">https://open.spotify.com/embed/track/</span>' +
            '<input type="text" class="form-control Insertsong" id="musica' + func + '" name="" style="flex: 1;" required>' +
            '</div>' +
            '<div style="display: flex; align-items: center; width: 15%; margin-bottom: 10px;">' +
            '<label for="inputA1" style="margin-right: 10px;">Lado:</label>' +
            '<input type="text" class="form-control" id="lados' + func + '" name="" style="flex: 1;" required>' +
            '</div>' +
            '<div style="display: flex; align-items: center; width: 100%; margin-bottom: 10px;">' +
            '<label for="inputName" style="margin-right: 10px;">Name:</label>' +
            '<textarea type="text" class="form-control" rows="1" id="musica_nome' + func + '" name="" style="flex: 1;" required></textarea>' +
            '</div>' +
            '<div style="display: flex; width: 100%; align-items: center;">' +
            '<iframe style="border-radius: 12px; flex: 2;"' +
            ' src=""' +
            ' width="100%" height="82" frameBorder="0" allowfullscreen=""' +
            ' allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"' +
            ' loading="lazy"></iframe>' +
            '</div>' +
            '</div>' +
            '</li>');
    }
    else {
        //Remove o ultimo list item
        $(id + " li:last-child").remove();
    }
}




//Quando o utilizador inserir o src da musica atribuir o src do iframe
$(document).on('keyup', '.Insertsong', function (event) {
    event.preventDefault();
    var iframeSrc = "https://open.spotify.com/embed/track/" + $(this).val();

    $(this).closest('li.list-group-item').find('iframe').attr("src", iframeSrc);
    

});

//Verificar se e para adicionar ou remover
function AddSong(element, qtdAntiga, qtd) {
    element.attr("value", qtd);

    return (qtd > qtdAntiga);
}


document.addEventListener("DOMContentLoaded", function() {
    var DeleteBtns = document.querySelectorAll('.DeleteVinilBtn');
    //Verificar se para ativar ou desativar o vinil
    DeleteBtns.forEach(function (botao) {
        let status = botao.getAttribute('status');
        if(status == 'Desativado')
        {
            botao.classList.remove('bi-trash');
            botao.classList.add('bi-check-circle-fill');
            botao.classList.remove('btn-danger');
            botao.classList.add('btn-success');
        }
    });



});





