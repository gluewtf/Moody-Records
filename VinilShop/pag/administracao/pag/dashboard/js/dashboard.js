$(document).on('click', '.filter-vendas-item', function(event) {
    event.preventDefault();
    var filtro = $(this).text().trim();
    console.log(filtro);
    $.ajax({
        type: "GET",
        url: "pag/dashboard/codedashboard.php",
        data: { filtro: filtro, func: 'vendas'  },
        success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 200) {
                $('#vendas').html(res.html);
                $('#vendas-label').html(filtro);
            }
        },
    });
    
});

$(document).on('click', '.filter-ganhos-item', function(event) {
    event.preventDefault();
    var filtro = $(this).text().trim();
    console.log(filtro);
    $.ajax({
        type: "GET",
        url: "pag/dashboard/codedashboard.php",
        data: { filtro: filtro, func: 'ganhos'  },
        success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 200) {
                $('#ganhos').html(res.html);
                $('#ganhos-label').html(filtro);
            }
        },
    });
    
});

$(document).on('click', '.filter-encomendas-item', function(event) {
    event.preventDefault();
    var filtro = $(this).text().trim();
    console.log(filtro);
    $.ajax({
        type: "GET",
        url: "pag/dashboard/codedashboard.php",
        data: { filtro: filtro, func: 'encomendas'  },
        success: function (response) {
            var res = jQuery.parseJSON(response);
            if (res.status == 200) {
                $('#dashTable').html(res.html);
                ChangeStatusColor();
                $('#encomendas-label').html(filtro);
                initializeDataTable('#encomendas-recentes'); //Inicializa a datatable 
            }
        },
    });
    
});

document.addEventListener("DOMContentLoaded", function() {
    ChangeStatusColor();
});

function ChangeStatusColor() {
    var StatusLabels = document.querySelectorAll('#dashboard-order-status');

    StatusLabels.forEach(function (botao) {
        let status = botao.textContent;
        if(status == 'Cancelado')
        {
            botao.classList.remove('bg-success');
            botao.classList.add('bg-danger');
        }

        if(status == 'Pedido Recebido')
        {
            botao.classList.remove('bg-success');
            botao.classList.add('bg-primary');
        }

    });
}