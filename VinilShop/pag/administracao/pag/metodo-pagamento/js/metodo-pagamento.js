$(document).on('click', '.ViewPagamentoBtn', function () {

    var pagamento_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/metodo-pagamento/codemetodopagamento.php?pagamento_id=" + pagamento_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="nome"]').val(res.data.Nome);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('#pagamentoViewModal').modal('show');
            }
        }
    });
});

$(document).on('click', '.EditPagamentoBtn', function () {

    var pagamento_id = $(this).val();
    $.ajax({
        type: "GET",
        url: "pag/metodo-pagamento/codemetodopagamento.php?pagamento_id=" + pagamento_id,
        data: { func: 'view' },
        success: function (response) {

            var res = jQuery.parseJSON(response);
            if (res.status == 404) {

                alert(res.message);
            } else if (res.status == 200) {
                $('input[name="pagamento_id"]').val(res.data.MetodoPagamento_id);
                $('input[name="nome"]').val(res.data.Nome);
                $('textarea[name="descricao"]').val(res.data.descricao);
                $('#pagamentoEditModal').modal('show');
            }
        }
    });
});


$(document).on('submit', '#pagamentoAddModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('addpagamentoForm'));
    formData.append("salvar_pagamento", true);




    $.ajax({
        type: "POST",
        url: "pag/metodo-pagamento/codemetodopagamento.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#pagamentoAddModal').modal('hide');
                $('#addpagamentoForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});


$(document).on('submit', '#pagamentoEditModal', function (event) {
    event.preventDefault();
    var formData = new FormData(document.getElementById('editpagamentoForm'));
    formData.append("editar_pagamento", true);




    $.ajax({
        type: "POST",
        url: "pag/metodo-pagamento/codemetodopagamento.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            var res = jQuery.parseJSON(response);

            if (res.status == 200) {
                $('#pagamentoEditModal').modal('hide');
                $('#editpagamentoForm')[0].reset();
                window.location.href = window.location.href;
            }
        }
    });
});

$(document).on('click', '.DeletePagamentoBtn', function () {

    var pagamento_id = $(this).val();
    swal({
        title: "Excluir o Metodo de Pagamento?",
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
                url: "pag/metodo-pagamento/codemetodopagamento.php",
                data: { 'eliminar_pagamento': true, 'pagamento_id': pagamento_id },
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