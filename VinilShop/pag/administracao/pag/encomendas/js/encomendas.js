$(document).on('click', '.ViewEncomendaBtn', function () {

    var encomenda_id = $(this).val();
    console.log(encomenda_id);
    $.ajax({
        type: "GET",
        url: "pag/encomendas/codeencomendas.php?encomenda_id=" + encomenda_id,
        data: { func: 'View' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="id"]').val(res.data.encomenda_id);
                $('input[name="cliente"]').val(res.data.utilizador_nome + " " + res.data.utilizador_apelido );
                $('select[name="pagamento"]').val(res.data.MetodoPagamento_Id);
                $('input[name="cartao"]').val(res.data.Numero_Cartao);
                $('input[name="titular"]').val(res.data.Titular);
                $('input[name="codigo"]').val(res.data.Codigo);
                $('input[name="data-validade"]').val(res.data.Data_Validade);
                $('select[name="envio"]').val(res.data.MetodoEnvio_Id);
                $('input[name="pais"]').val(res.data.pais);
                $('input[name="distrito"]').val(res.data.distrito);
                $('input[name="codigoPostal"]').val(res.data.codigo_postal);
                $('input[name="cidade"]').val(res.data.cidade);
                $('input[name="rua"]').val(res.data.rua);
                $('input[name="preco"]').val(res.data.Preco_Total);
                $('input[name="data"]').val(res.data.Data_Criado);
                $('input[name="status"]').val(res.data.status);
                $('#vinisOrderView').html(res.lista);
                $('#encomendaViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditEncomendaBtn', function () {

    var encomenda_id = $(this).val();
    console.log(encomenda_id);
    $.ajax({
        type: "GET",
        url: "pag/encomendas/codeencomendas.php?encomenda_id=" + encomenda_id,
        data: { func: 'Edit' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="id"]').val(res.data.encomenda_id);
                $('input[name="cliente"]').val(res.data.utilizador_nome + " " + res.data.utilizador_apelido );
                $('select[name="pagamento"]').val(res.data.MetodoPagamento_Id);
                $('input[name="cartao"]').val(res.data.Numero_Cartao);
                $('input[name="titular"]').val(res.data.Titular);
                $('input[name="codigo"]').val(res.data.Codigo);
                $('input[name="data-validade"]').val(res.data.Data_Validade);
                $('select[name="envio"]').val(res.data.MetodoEnvio_Id);
                $('input[name="pais"]').val(res.data.pais);
                $('select[name="pais"]').val(res.data.pais);
                if(res.data.status == 'Transporte')
                {
                    $('#select-pais-edit-encomenda').prop('disabled', true);
                }
                else
                {
                    $('#select-pais-edit-encomenda').prop('disabled', false);
                }      
                $('input[name="distrito"]').val(res.data.distrito);
                $('input[name="codigoPostal"]').val(res.data.codigo_postal);
                $('input[name="cidade"]').val(res.data.cidade);
                $('input[name="rua"]').val(res.data.rua);
                $('input[name="preco"]').val(res.data.Preco_Total);
                $('input[name="data"]').val(res.data.Data_Criado);
                $('select[name="status"]').val(res.data.status);
                $('#vinisOrderEdit').html(res.lista);
                $('#encomendaEditModal').modal('show');
            }
        }
    });
});



$(document).on('submit', '#encomendaEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editencomendaForm'));
    formData.append("editar_encomenda", true);




    $.ajax({
        type: "POST",
        url: "pag/encomendas/codeencomendas.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#encomendaEditModal').modal('hide');
                $('#editencomendaForm')[0].reset();
                window.location.href = window.location.href;
            }

        }
    });
});

$(document).on('click', '.DeleteEncomendaBtn', function () {

    var encomenda_id = $(this).val();
    swal({
        title: "Excluir a encomenda?",
        text: "O status da encomenda será atualizado para 'Pedido Excluido'",
        icon: "warning",
        buttons: true,
        closeOnClickOutside: false,
        closeOnEsc: false,
        dangerMode: true,
    }).then((willConfirm) => {
        if (willConfirm) {
            $.ajax({
                type: "POST",
                url: "pag/encomendas/codeencomendas.php",
                data: { 'eliminar_encomenda': true, 'encomenda_id': encomenda_id },
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


document.addEventListener("DOMContentLoaded", function() {
    var DeleteBtns = document.querySelectorAll('.DeleteEncomendaBtn');

    //Se o pedido estiver excluido nao dara para excluir nem para editar
    DeleteBtns.forEach(function (botao) {
        let status = botao.getAttribute('status');
        if(status == 'Pedido Excluido' || status == 'Entregue')
        {
            botao.classList.add('d-none');
        }
    });

    var EditBtns = document.querySelectorAll('.EditEncomendaBtn');

    EditBtns.forEach(function (botao) {
        let status = botao.getAttribute('status');

        if(status == 'Pedido Excluido' || status == 'Entregue')
        {
            botao.classList.add('d-none');
        }
    });

});

document.addEventListener("DOMContentLoaded", function() {
    // Get the country data from the intl-tel-input library
    const countryData = window.intlTelInputGlobals.getCountryData();
  
    // Get the dropdown menu element
    const countrySelectorEdit = document.getElementById("select-pais-edit-encomenda");
  
    // Populate the dropdown menu with the country data
    countryData.forEach(country => {
        const option = document.createElement("option");
        option.value = country.name;
        option.textContent = country.name;
        countrySelectorEdit.appendChild(option);
    });
  });

