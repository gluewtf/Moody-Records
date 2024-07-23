

    //Adicionar ao carrinho atraves da encomenda
    $(".CartOrderAdd").click(function(event) {
        event.preventDefault();
        var vinil = $(this).attr("value");
        var qtd = $(this).attr("data-count");
        var func = qtd <= 10 ? 'adicionar' : 'remover';


        if (func == 'adicionar') {
            window.AddCart(vinil).then((added) => {
                if (added) { //Se a funcao foi corretamente adicionado
                    swal("Vinil adicionado ao carrinho!", "", "success");
                }
            });
        }
    });

    //Apagar a encomenda
    $("#DeleteOrderBtn").click(function(event) {
        event.preventDefault();
        var order = $(this).attr("value");
        //Mensagem de confirmacao
        swal({
            title: "Excluir o pedido?",
            text: "Ao clicar neste botão o pedido será classificado como pedidos excluídos!!!",
            icon: "warning",
            buttons: true,
            closeOnClickOutside: false,
            closeOnEsc: false,
            dangerMode: true,
          }).then((willConfirm) => {
            if(willConfirm){
                $.ajax({
                    type: "GET",
                    url: "pag/Checkout/codePedidos.php",
                    data: { func: 'DeletePedido', order: order },
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            $('#encomendasTable').load(location.href + " #encomendasTable"); //Atualiza a tabela
                        }
                    },
                });
            }
          });
       
    });



    //Adicionar toda a encomenda ao carrinho
    $(document).on('click', '.AddAllCart', function(event) {
        event.preventDefault();
        
        $.ajax({
            type: "GET",
            url: "pag/Vinyl/cart.php",
            data: { func: 'AddAllFromOrder' },
            success: function (response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    swal("Todos os vinis foram adicionados ao carrinho!", "", "success");
                    let Count = document.getElementById("cartCount");                 
                    Count.textContent = res.quantidade;
                }
            },
        });
        
    });

    //Botao de confirmar a entrega
    $(document).on('click', '#confirmEntrega', function(event) {
        event.preventDefault();
        var order = $(this).attr('value');

        swal({
            title: "Confirmar Entrega?",
            text: "Ao clicar neste botão vai confirmar que recebeu a sua encomenda!!!",
            icon: "warning",
            buttons: true,
            closeOnClickOutside: false,
            closeOnEsc: false,
            dangerMode: true,
          }).then((willConfirm) => {
            if(willConfirm){
                $.ajax({
                    type: "GET",
                    url: "pag/Checkout/codePedidos.php",
                    data: { func: 'ConfirmarEntrega', order: order },
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                            window.location.href = window.location.href;
                        }
                    },
                });
            }
          });

       
        
    });






    


document.addEventListener("DOMContentLoaded", function() {
    var orderLabel = document.getElementById("orderstatusLabel");

    if (orderLabel) {
        switch (orderLabel.textContent.trim()) { 
            case 'Pedido Recebido':
                orderLabel.style.color = "darkblue";
                break;
            case 'Processamento do Pedido':
                orderLabel.style.color = "orange";
                break;
            case 'Expedição':
                orderLabel.style.color = "yellow";
                break;
            case 'Transporte':
                orderLabel.style.color = "green";
                break;
            case 'Entrega Local':
                orderLabel.style.color = "purple";
                $('#confirmEntrega').removeClass('d-none');
                break;
            case 'Entrega ao Destinatário':
                orderLabel.style.color = "lightgreen";
                break;
            case 'Entregue':
                $('#confirmEntrega').addClass('d-none');
                orderLabel.style.color = "grey";
                break;
            case 'Cancelado':
                orderLabel.style.color = "red";
                break;
        }
    }

    $('#encomendasTable').DataTable({         
        "language": {
            "sProcessing":    "Procesando...",
            "sLengthMenu":    "Mostrar _MENU_ registros por página",
            "sZeroRecords":   "Nenhum resultado encontrado",
            "sEmptyTable":    "Nenhum resultado encontrado",
            "sInfo":          "Mostrando do _START_ até _END_ de um total de _TOTAL_ registros",
            "sInfoEmpty":     "Mostrando do 0 até 0 de um total de 0 registros",
            "sInfoFiltered":  "(Filtrado de um total de _MAX_ registros)",
            "sInfoPostFix":   "",
            "sSearch":        "Pesquisar:",
            "sUrl":           "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Carregando...",
            "oPaginate": {
                "sFirst":    "<<",
                "sLast":    ">>",
                "sNext":    ">",
                "sPrevious": "<"
            },
            "oAria": {
                "sSortAscending":  ": Ativar para ordenar a columna de maneira ascendente",
                "sSortDescending": ": Ativar para ordenar a columna de maneira descendente"
            }
        }    
    });
});