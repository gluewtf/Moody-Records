$(document).ready(function() {
  //Alterar o endereco da encomenda
  $(document).on('submit', '#AlterarDadosEncomendaModal', function (e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById('AlterarDadosEncomendaForm'));
        formData.append("alterar_infoEncomenda", true);
        $.ajax({
            type: "POST",
            url: "./pag/Checkout/codecheckout.php",
            processData: false, 
            contentType: false, 
            data: formData,
            success: function (response) {
              var res = jQuery.parseJSON(response);
                  
                        if(res.status == 200){
        
                          
                          $('#nome').text(res.encomenda.nome + " " + res.encomenda.apelido);
                          $('#telemovel').text("Tel: " + res.encomenda.telemovel);
                          $('#pais').text(res.encomenda.pais);
                          $('#cidade_postalcode').text(res.encomenda.codigo_postal + ", " + res.encomenda.cidade);
                          $('#distrito').text(res.encomenda.distrito);
                          $('#rua').text(res.encomenda.rua);

                 
                          $('#AlterarDadosEncomendaModal').modal('hide');  
              }
            }
          });

   
    
    });

    //Abrir  o metodo de editar envio
    $(document).on('click', '.EditMetodoEnvioBtn', function () {
      $.ajax({
        type: "GET",
        url: "./pag/Checkout/codecheckout.php",
        data: { func: 'GetEnvio' },
        success: function (response) {
          var res = jQuery.parseJSON(response);
              
                    if(res.status == 200){
    
    
                      $('select[id="envio"]').val(res.metodoenvio_id);
                      $('#transportadora').text(res.transportadora + " (" + res.preco + "€)");
                      $('#transportadora-descricao').text(res.descricao);
                      $('#AlterarMetodoEnvioModal').modal('show');
          }
        }
      });
    });

     //Alterar o dropdown de metodo de envio
    $(document).on('change', '#envio', function () {
      var transportadora = $(this).val();
      console.log(transportadora);
      $.ajax({
        type: "GET",
        url: "./pag/Checkout/codecheckout.php",
        data: { func: 'AlterarEnvio', transportadora: transportadora },
        success: function (response) {
          var res = jQuery.parseJSON(response);
              
                    if(res.status == 200){
    
    
                      $('select[id="envio"]').val(res.encomenda.metodoenvio_id);
                      $('#transportadora').text(res.encomenda.transportadora + " (" + res.encomenda.transportadora_preco + "€)");
                      $('#transportadora-descricao').text(res.encomenda.transportadora_descricao);
          }
        }
      });
    });

    //Alterar o metodo de envio
    $(document).on('submit', '#AlterarMetodoEnvioModal', function (e) {
      e.preventDefault();
      $.ajax({
        type: "GET",
        url: "./pag/Checkout/codecheckout.php",
        data: { func: 'GetEnvio' },
        success: function (response) {
          var res = jQuery.parseJSON(response);
              
                    if(res.status == 200){
    
    
                      $('#TransportadoraNome').text(res.transportadora + " (" + res.preco + "€)");
                      $('#TransportadoraDescricao').text(res.descricao);
                      $('#AlterarMetodoEnvioModal').modal('hide');
          }
        }
      });
   });

    //Abrir  o metodo de pagamento envio
   $(document).on('click', '.EditMetodoPagamentoBtn', function () {
    $.ajax({
      type: "GET",
      url: "./pag/Checkout/codecheckout.php",
      data: { func: 'GetPagamento' },
      success: function (response) {
        var res = jQuery.parseJSON(response);
            
                  if(res.status == 200){
  
  
                    $('select[id="pagamento"]').val(res.metodopagamento_id);
                        $('#pagamentoNome').html(` ${res.pagamento}`);
                      
                      
      
                    
                    $('#pagamento-descricao').text(res.descricao);
                    $('#AlterarMetodoPagamentoEncomendaModal').modal('show');
        }
      }
    });
  });

   //Alterar o dropwdown de metodo de pagamento 
  $(document).on('change', '#pagamento', function () {
    var pagamento = $(this).val();
    console.log(pagamento);
    $.ajax({
      type: "GET",
      url: "./pag/Checkout/codecheckout.php",
      data: { func: 'AlterarPagamento', pagamento: pagamento },
      success: function (response) {
        var res = jQuery.parseJSON(response);
            
                  if(res.status == 200){
  
  
                    $('select[id="pagamento"]').val(res.encomenda.metodopagamento_id);
                        $('#pagamentoNome').html(`${res.encomenda.pagamento}`);
                      
                    
                    $('#pagamento-descricao').text(res.encomenda.pagamento_descricao);
        }
      }
    });
  });

  //Alterar o metodo de pagamento 
  $(document).on('submit', '#AlterarMetodoPagamentoEncomendaModal', function (e) {
    e.preventDefault();
    $.ajax({
      type: "GET",
      url: "./pag/Checkout/codecheckout.php",
      data: { func: 'GetPagamento' },
      success: function (response) {
        var res = jQuery.parseJSON(response);
            
                  if(res.status == 200){
  
                        $('#encomenda-pagamento-info').html(`
                          <h5>${res.pagamento}
                          <h6>${res.descricao}</h6>
                      `);
                      
                      
  

                      $('#AlterarMetodoPagamentoEncomendaModal').modal('hide');
                  
        }
      }
    });
 });

 //Encomendar
 $(document).on('submit', '#ComprarModal', function (e) {
  e.preventDefault();
  var formData = new FormData(document.getElementById('ComprarForm'));
  formData.append("relizar_encomenda", true);
  $.ajax({
    type: "POST",
    url: "./pag/Checkout/codecheckout.php",
    processData: false, 
    contentType: false,
    data: formData,
    success: function (response) {
      var res = jQuery.parseJSON(response);
          
                if(res.status == 200){

                  $('#ComprarModal').modal('hide');

                  swal({ //Mensagem de confirmacao
                    title: "Encomenda Realizada!",
                    text: "",
                    icon: "success",
                    buttons: {
                      confirm: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true
                      }
                    },
                    closeOnClickOutside: false,
                    closeOnEsc: false
                  }).then(() => {
                    window.location.href = "./?op=10&e=" + res.encomenda_id;
                  });
                  
                  

                
      }
    }
  });
});


  const countryData = window.intlTelInputGlobals.getCountryData();

  
  const countrySelector = document.getElementById("pais-select");


  countryData.forEach(country => {
      const option = document.createElement("option");
      option.value = country.name;
      option.textContent = country.name;
      countrySelector.appendChild(option);
  });




});