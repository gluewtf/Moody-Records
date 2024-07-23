//Ver utilizador 
$(document).on('click', '.ViewUtilizadorBtn', function () {

    var utilizador_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/utilizadores/codeutilizadores.php?utilizador_id=" + utilizador_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="email"]').val(res.data.email);
                $('input[name="login"]').val(res.data.login);
                $('input[name="password"]').val(res.data.password);
                $('select[name="tipo"]').val(res.data.tipo);
                $('input[name="telemovel"]').val(res.data.telemovel);
                $('input[name="nome"]').val(res.data.nome);
                $('input[name="apelido"]').val(res.data.apelido);
                $('input[name="pais"]').val(res.data.pais);
                $('input[name="distrito"]').val(res.data.distrito);
                $('input[name="codigoPostal"]').val(res.data.codigo_postal);
                $('input[name="cidade"]').val(res.data.cidade);
                $('input[name="rua"]').val(res.data.rua);
                $('select[name="envio"]').val(res.data.metodoenvio_id);
                $('select[name="pagamento"]').val(res.data.metodopagamento_id);
                $('input[name="status"]').val(res.data.status);
                $('#utilizadorViewModal').modal('show');
            }
        }
    });
});

//Abrir modal de editar utilizador
$(document).on('click', '.EditUtilizadorBtn', function () {

    var utilizador_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/utilizadores/codeutilizadores.php?utilizador_id=" + utilizador_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="utilizador_id"]').val(res.data.utilizador_id);
                $('input[name="email"]').val(res.data.email);
                $('input[name="login"]').val(res.data.login);
                $('input[name="password"]').val(res.data.password);
                $('select[name="tipo"]').val(res.data.tipo);
                $('input[name="telemovel"]').val(res.data.telemovel);
                $('input[name="nome"]').val(res.data.nome);
                $('input[name="apelido"]').val(res.data.apelido);
                $('select[name="pais"]').val(res.data.pais);
                $('input[name="distrito"]').val(res.data.distrito);
                $('input[name="codigoPostal"]').val(res.data.codigo_postal);
                $('input[name="cidade"]').val(res.data.cidade);
                $('input[name="rua"]').val(res.data.rua);
                $('select[name="envio"]').val(res.data.metodoenvio_id);
                $('select[name="pagamento"]').val(res.data.metodopagamento_id);
                $('select[name="status"]').val(res.data.status);
                $('#utilizadorEditModal').modal('show');
            }
        }
    });
});

//Adicionar utilizador
$(document).on('submit', '#utilizadorAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addutilizadorForm'));
    formData.append("salvar_utilizador", true);




    $.ajax({
        type: "POST",
        url: "pag/utilizadores/codeutilizadores.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#utilizadorAddModal').modal('hide');
                $('#addutilizadorForm')[0].reset();
                window.location.href = window.location.href;
            }

            if(res.status == 300)
            {
                alert("Já existe um utilizador com esse endereço de email");
            }

            if(res.status == 100)
                {
                    alert("Já existe um utilizador com esse Login");
                }
        }
    });
});

//Editar utilizador
$(document).on('submit', '#utilizadorEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editutilizadorForm'));
    formData.append("editar_utilizador", true);
    formData.append("password_changed", $('.InsertPassword').attr('changed'));




    $.ajax({
        type: "POST",
        url: "pag/utilizadores/codeutilizadores.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#utilizadorEditModal').modal('hide');
                $('#editutilizadorForm')[0].reset();
                window.location.href = window.location.href;
            }

            if(res.status == 300)
            {
                alert("Já existe um utilizador com esse endereço de email");
            }

            if(res.status == 100)
                {
                    alert("Já existe um utilizador com esse Login");
                }
        }
    });
});

//Banir/Ativar Utilizador
$(document).on('click', '.DeleteUtilizadorBtn', function () {

    var utilizador_id = $(this).val();
    var status = $(this).attr('status');
    var message = status == 'Bloqueado'? "Ativar o Utilizador?" : "Banir o Utilizador?";
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
                url: "pag/utilizadores/codeutilizadores.php",
                data: { 'banir_utilizador': true, 'utilizador_id': utilizador_id, 'status': status },
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

$(document).on('keyup', '.InsertPassword', function (event) {
    event.preventDefault();

    $(this).attr('changed', 'true');
    //Verificar se a pass foi mudada
    

});

document.addEventListener("DOMContentLoaded", function() {
    var DeleteBtns = document.querySelectorAll('.DeleteUtilizadorBtn');

    DeleteBtns.forEach(function (botao) {
        let status = botao.getAttribute('status');
        if(status == 'Bloqueado')
        {
            botao.classList.remove('bi-slash-circle-fill');
            botao.classList.add('bi-check-circle-fill');
            botao.classList.remove('btn-danger');
            botao.classList.add('btn-success');
        }
    });

     
     const countryData = window.intlTelInputGlobals.getCountryData();
  
     
     const countrySelector = document.getElementById("select-pais");
     const countrySelectorEdit = document.getElementById("select-pais-edit");
   
     
     countryData.forEach(country => {
   
        const option1 = document.createElement("option");
        option1.value = country.name;
        option1.textContent = country.name;
        countrySelector.appendChild(option1);
    
   
        const option2 = document.createElement("option");
        option2.value = country.name;
        option2.textContent = country.name;
        countrySelectorEdit.appendChild(option2);
    });

});


