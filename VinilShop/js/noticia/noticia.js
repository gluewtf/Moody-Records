
//Filtrar por tipo de noticia
$(document).ready(function() {
    $(".btnFiltro").click(function(event){

           
            
        event.preventDefault();

        var tipo = $(this).text().trim();;

        const baseUrl = this.getAttribute('href');
        const newUrl = `${baseUrl}&tipo=${encodeURIComponent(tipo)}`;

        window.location.href = newUrl;
    
    });

    //Filtrar por mes
    $(".BtnMes").click(function(event){

           
            
        event.preventDefault();

        var date = $(this).text().trim();;

        const baseUrl = this.getAttribute('href');
        const newUrl = `${baseUrl}&date=${encodeURIComponent(date)}`;

        window.location.href = newUrl;
    
    });
});


   
