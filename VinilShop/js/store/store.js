$(document).ready(function() {

    //Barra de pesquisa
    //Se clicar na lupa
    $(document).on('click', '.SearchBtn', function () {
  
            executeSearch() //executar a pesquisa
      })
      
      //caso o utilizador clique no enter depois de escrever na barra de pesquisa
      $('#searchInput').keypress(function (e) {
        if (e.which == 13) {
            executeSearch();
        }
    });
      
    function executeSearch(){
        var searchValue = document.getElementById('searchInput').value; //Pegar o que esta escrito na barra
        const baseUrl = "./?op=1&page=1"
        const newUrl = `${baseUrl}&search=${encodeURIComponent(searchValue)}`; //adicionar a variavel search com a pesquisa guardada ao link

        window.location.href = newUrl;
    }

        //Generos Gerais da pagina inicial
        $(".genre-link").click(function(event){

            event.preventDefault();

            var genreValue = $(this).find("h5").attr("value"); //Pega o valor do value do H5, que e o nome do genero
            var currentURL = "./?op=1&page=1";
            Addgenre_filter(genreValue, currentURL, false); //Adiciona o genero ao filtro
            

        });

        //opcao saldos no menu de navegacao
        $(".SalesBtn").click(function(event){

            event.preventDefault();
            var currentURL = "./?op=1&page=1";
           AddPromo_filter('Todos os Vinis em promoção', currentURL, true);
            

        });

         //opcao novos vinis no menu de navegacao
        $(".genre-link-nav-new").click(function(event){

            event.preventDefault();
            var genreValue = $(this).text().trim();

            var currentURL = "./?op=1&page=1&new=true";
            Addgenre_filter(genreValue, currentURL, true);
            

        });

        
         //Botao ver mais nos albuns mais vendidos
        $(".VerMais").click(function(event){

           
            
            event.preventDefault();

            const baseUrl = this.getAttribute('href');
            const newUrl = `${baseUrl}&OrderBy=Mais+Vendido`;
            
            window.location.href = newUrl;
        });

        //Filtro de ordenar
        $(".btnOrderBy").click(function(event){

            event.preventDefault();
            const orderBy = $(this).attr("value");

            const url = new URL(window.location.href);

            url.searchParams.set('OrderBy', orderBy); //Atualiza o parametro OrderBy para a ordem clicada

  
            window.location.href = url.toString();
                    
            


            
        });

        //Botao de remover a label
        $(".RemoveLabelBtn").click(function(event){

            event.preventDefault();

            var currentURL = window.location.href;
            var label = $(this).parent();
            var labeltext = label.text().trim(); 
            labeltext = labeltext.substring(0, labeltext.length - 1).trim(); // E removido o X presente em cada label
           
            RemoveLabel(labeltext, currentURL) //Remocao da label
            
            


            
        });

        //Adicao do artista presente na visualizacao do vinil ao filtro
        $(".ArtistBtn").click(function(event){

            event.preventDefault();
            var artistValue = $(this).text().trim();

            var currentURL = "./?op=1&page=1";
            Addartista_filter(artistValue, currentURL); //Adiciona ao filtro
            

        });

        //Adicao do genero presente na visualizacao do vinil ao filtro
        $(".GenreBtn").click(function(event){

            event.preventDefault();
            var genreValue = $(this).text().trim();

            var currentURL = "./?op=1&page=1";
            Addgenre_filter(genreValue, currentURL, false);
            

        });

        //Adicao do genero ao filtro
        $(".GenreItem").click(function(event){
            event.preventDefault();
            var currentURL = window.location.href;
            var labeltext = $(this).attr("value");
            Addgenre_filter(labeltext, currentURL, false);
        
            
            
        });





        function Addgenre_filter(genre, currentURL, Itsnew){//Genero a ser adicionado, url exato que o utilizador se encontra, e novo?
            
                $.ajax({
                    type: "GET",
                    url: "pag/Vinyl/filtro.php",
                    data: { label: genre, currentURL: currentURL, func: 'adicionar_genero', ItsNew: Itsnew },
                    success: function (response) {
                    
                        var res = jQuery.parseJSON(response);
                        if(res.status == 200) {
                            window.location.href = res.link; //E movido entao para o novo link
                        }
                        
                    }                                                             
                });
                
            

            


        }

        function Addtipo_filter(tipo, currentURL){
            
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/filtro.php",
                data: { label: tipo, currentURL: currentURL, func: 'adicionar_tipo' },
                success: function (response) {
                
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200) {
                        window.location.href = res.link;
                    }
                    
                }                                                             
            });
    
    }

    function Addformato_filter(formato, currentURL){
        
        $.ajax({
            type: "GET",
            url: "pag/Vinyl/filtro.php",
            data: { label: formato, currentURL: currentURL, func: 'adicionar_formato' },
            success: function (response) {
            
                var res = jQuery.parseJSON(response);
                if(res.status == 200) {
                    window.location.href = res.link;
                }
                
            }                                                             
        });
    }

    function Addartista_filter(artista, currentURL){
        
        $.ajax({
            type: "GET",
            url: "pag/Vinyl/filtro.php",
            data: { label: artista, currentURL: currentURL, func: 'adicionar_artista' },
            success: function (response) {
            
                var res = jQuery.parseJSON(response);
                if(res.status == 200) {
                    window.location.href = res.link;
                }
                
            }                                                             
        });
    }

    function AddYear_filter(year, currentURL){
        
        $.ajax({
            type: "GET",
            url: "pag/Vinyl/filtro.php",
            data: { label: year, currentURL: currentURL, func: 'adicionar_ano' },
            success: function (response) {
            
                var res = jQuery.parseJSON(response);
                if(res.status == 200) {
                    window.location.href = res.link;
                }
                
            }                                                             
        });
    }

    function AddPreco_filter(precoMin, precoMax, currentURL){
        
        $.ajax({
            type: "GET",
            url: "pag/Vinyl/filtro.php",
            data: { precoMin: precoMin, precoMax: precoMax, currentURL: currentURL, func: 'adicionar_preco' },
            success: function (response) {
            
                var res = jQuery.parseJSON(response);
                if(res.status == 200) {
                    window.location.href = res.link;
                }
                
            }                                                             
        });
    }

    function AddPromo_filter(promo, currentURL, Sale){
        
        $.ajax({
            type: "GET",
            url: "pag/Vinyl/filtro.php",
            data: { label: promo, currentURL: currentURL, func: 'adicionar_promo', Sale: Sale },
            success: function (response) {
            
                var res = jQuery.parseJSON(response);
                if(res.status == 200) {
                    window.location.href = res.link;
                }
                
            }                                                             
        });
    }

        function RemoveLabel(labeltext, currentURL){
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/filtro.php",
                data: { label: labeltext, currentURL: currentURL, func: 'remover' },
                success: function (response) {
                
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200) {
                        window.location.href = res.link;
                    }
                    
                }                                                             
            });
        }

        $(".TipoItem").click(function(event){
            event.preventDefault();
            var currentURL = window.location.href;
            var labeltext = $(this).attr("value");
            Addtipo_filter(labeltext, currentURL);
        
            
            
        });

        $(".FormatoItem").click(function(event){
            event.preventDefault();
            var currentURL = window.location.href;
            var labeltext = $(this).attr("value");
            labeltext += '"'
            Addformato_filter(labeltext, currentURL);
        
            
            
        });

        $(".ArtistaItem").click(function(event){
            event.preventDefault();
            var currentURL = window.location.href;
            var labeltext = $(this).attr("value");
            Addartista_filter(labeltext, currentURL);
        
            
            
        });

        $(".YearItem").click(function(event){
            event.preventDefault();
            var currentURL = window.location.href;
            var labeltext = $(this).attr("value");
            AddYear_filter(labeltext, currentURL);
        
            
            
        });

        //Mudanca de precos
        $(".pMaxR").on('input', function(_event) {
            var price = document.getElementById('pMax'); 
            price.innerText = $(this).val(); 
        });

        $(".pMinR").on('input', function(_event) {
            var price = document.getElementById('pMin'); 
            price.innerText = $(this).val(); 
        });

        $(".BtnPreco").click(function(event) {
            event.preventDefault();
            var currentURL = window.location.href;
            var priceMin = parseFloat(document.getElementById('pMinR').value); 
            var priceMax = parseFloat(document.getElementById('pMaxR').value); 
            
            if (priceMin > priceMax) { //Verifica se os precos sao validos
                alert("Introduza valores válidos para o filtrar por preço!!");
            }
            else
            {
                AddPreco_filter(priceMin, priceMax, currentURL);
            }
        });

        $(".PromoItem").click(function(event){
            event.preventDefault();
            var currentURL = window.location.href;
            var labeltext = $(this).attr("value");
            AddPromo_filter(labeltext, currentURL, false);
        
            
            
        });
        
        //Adicionar ou Remover da lista de desejos
        $(".AddWishlistBtn").click(function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            var icon = $('#icon_' + vinil).attr('class');
            var func = icon == 'bi bi-heart'? 'adicionar' : 'remover' //Verificar se a funcao e para adicionar ou remvoer atraves do icon
            if(func == 'adicionar')
            {
                AddWish(vinil); //Adiciona a lista de desejos
                $('#icon_' + vinil).removeClass('bi-heart').addClass('bi-heart-fill'); 
                $('#adicionado').removeClass('d-none');
                $('#adicionado').html('Adicionado a Lista de Desejos!') //Mensagem
                

                //Apos 5 segundos a mensagem desaparece
                setTimeout(() => {
                    $('#adicionado').addClass('d-none');
                }, 5000);
            }
            else
            {
                RemoveWish(vinil); //Remove o vinil da lista de desejos
                $('#icon_' + vinil).removeClass('bi-heart-fill').addClass('bi-heart');
                $('#adicionado').removeClass('d-none');
                $('#adicionado').html('Removido da Lista de Desejos!')
  
                setTimeout(() => {
                    $('#adicionado').addClass('d-none');
                }, 5000);
            }
           
        });

        //Abrir a lista de desejos
        $(".BtnWishList").click(function(event) {
            event.preventDefault();
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/wishlist.php",
                data: { func: 'GetVinys' },
                success: function (response) {
                
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200) {
                        $('#lista').html(res.html);  
                        var buttons = document.getElementById("fBtns");
                        if(res.html != null) //Se a lista estiver vazia entao os botoes do rodape nao irao aparecer
                        {
                            buttons.style.display = '';
                        }
                        else
                        {
                            buttons.style.display = 'none';
                        }
                            

                       
                        $('#WishList').modal('show');     
                     
                    }
                    
                }                                                             
            });  
  
           
        });

        //Adicionar ou remover da lista de desejos atraves do carrinho
        $(".CartWishListAdd").click(function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            var text =  $(this).text().trim();
            var func = text == 'Adicionar à lista de desejos'? 'adicionar' : 'remover' //Verifica se a funcao e adicionar ou remover atreaves do texto
            if(func == 'adicionar')
            {
                AddWish(vinil);
                $(this).text('Adicionado a Lista de Desejos');
                $('#adicionado_cart').html('Adicionado a Lista de Desejos!')
                $('#adicionado_cart').removeClass('d-none');
  
                setTimeout(() => {
                    $('#adicionado_cart').addClass('d-none');
                }, 5000);
            }
            if(func == 'remover')
            {
                RemoveWish(vinil);
                $('#icon_' + vinil).removeClass('bi-heart-fill').addClass('bi-heart');
                $('#wish_' + vinil).text('Adicionar à lista de desejos')
                $('#adicionado_cart').html('Removido da Lista de Desejos!')
                $('#adicionado_cart').removeClass('d-none');
  
                setTimeout(() => {
                    $('#adicionado_cart').addClass('d-none');
                }, 5000);
            }
           
        });


        //Remover dp carrinho 
        $(document).on('click', '.CartRemove', function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/cart.php",
                data: { vinil: vinil, func: 'remover' },
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200) {
                       window.location.href = window.location.href;
                                                               
                    }
                }
            });

        });

       //Remover da lista de desejos
        function RemoveWish(vinil){
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/wishlist.php",
                data: { vinil: vinil, func: 'remover' },
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200) {
                        $('#lista').html(res.html);
                        var buttons = document.getElementById("fBtns");
                        if(res.html != null)
                        {
                            buttons.style.display = '';
                        }
                        else
                        {
                            buttons.style.display = 'none';
                        }
                    }
                }
            });
        }

        //Adicionar a lista de desejos
         function AddWish(vinil){
                $.ajax({
                    type: "GET",
                    url: "pag/Vinyl/wishlist.php",
                    data: { vinil: vinil, func: 'adicionar' },
                    success: function (response) {
                    
                        var res = jQuery.parseJSON(response);
                        if(res.status == 200) {
                            $('#lista').html(res.html);   
                            var buttons = document.getElementById("fBtns");
                            if(res.html != null)
                            {
                                buttons.style.display = '';
                            }
                            else
                            {
                                buttons.style.display = 'none';
                            }
                        }
                        
                    }                                                             
                });
        }

        //Botao de remover tudo da lista de desejos
        $(document).on('click', '.RemoveAll', function(event) {
            event.preventDefault();
            RemoveAll();
            
        });

        //Remover tudo da lista de desejos
        function RemoveAll(){
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/wishlist.php",
                data: { func: 'removerTUDO' },
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if(res.status == 200) {
                        $('#lista').html(res.html);
                        var buttons = document.getElementById("fBtns");
                            buttons.style.display = 'none';
                        var hearts = document.querySelectorAll('.bi-heart-fill');
                        var addwishcartext = document.querySelectorAll('.CartWishListAdd');

                        hearts.forEach(function(heart) { //Colocar os coracoes dos vinis que estao na lista de desejos vazios
                            heart.classList.remove('bi-heart-fill');
                            heart.classList.add('bi-heart');
                        });

                        addwishcartext.forEach(function(texto) { //Colocar o texto para adicionar a lista de desejos, no carrinho
                           texto.textContent = 'Adicionar à lista de desejos';
                        });

                    }
                }
            });
        }

        //Adicionar tudo ao carrinho
        function AddAll(){
            $.ajax({
                type: "GET",
                url: "pag/Vinyl/cart.php",
                data: { func: 'adicionarTUDO' },
                success: function (response) {
                    var res = jQuery.parseJSON(response);
                    if (res.status == 200) {
                        res.ids.forEach(element => {
                        $('#iconCart_' + element).removeClass('bi-cart-plus').addClass('bi-cart-x-fill'); //Colocar os simbolos do carrinho preenchido dos vinis adicionados
                        });
                        RemoveAll();
                        $('#carrinho').html(res.html);   
                        let Count = document.getElementById("cartCount");                 
                        Count.textContent = res.quantidade; //Atuailizar a quantidade dos vinis adicionados
                    }
                },
            });
        }

        //Adicao do vinil a lista de desejos atraves da visualizacao de um vinil
        $(document).on('click', '.AddWishBtn', function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            var icon = $('#icon_view' + vinil).attr('class');
            var func = icon == 'bi bi-heart'? 'adicionar' : 'remover'
            if(func == 'adicionar')
            {
                AddWish(vinil);
                $('#icon_view' + vinil).removeClass('bi-heart').addClass('bi-heart-fill');
                $('#adicionado_view').removeClass('d-none');
                $('#adicionado_view').html('Adicionado a Lista de Desejos!');
                setTimeout(() => {
                    $('#adicionado_view').addClass('d-none');
                }, 5000);
  
            }
            else
            {
                RemoveWish(vinil);
                $('#icon_view' + vinil).removeClass('bi-heart-fill').addClass('bi-heart');
                $('#adicionado_view').removeClass('d-none');
                $('#adicionado_view').html('Removido da Lista de Desejos!');
                setTimeout(() => {
                    $('#adicionado_view').addClass('d-none');
                }, 5000);
  
            }
            
        });

        //Alteracao da quantidade um vinil no carrinho de compras
        $(document).on('change', '.QtdVinil', function(event) {
            event.preventDefault();
            var element = $(this);
            var qtdAntiga = $(this).attr("value"); //quantidade antiga
            var qtd = $(this).val(); //quantidade nova
            var vinil = $(this).attr("data-vinyl"); //Vinil
            if(qtd > qtdAntiga){ //Caso a qtd nova seja maior que a quantidade antiga entao...
                AddCart(vinil); //Aumenta a quantidade
                $(this).attr("value", qtd); //Coloca a quantidade nova no valor do elemento
            }
            else{
                $.ajax({
                    type: "GET",
                    url: "pag/Vinyl/cart.php",
                    data: { vinil: vinil, func: 'remover', qtd: true },
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if(res.status == 200) {
                            //Atuailizar o preco total e subtotal do checkout
                            $('#subtotal').html(res.subtotal);  
                            $('#total').html(res.total);  
                            element.attr("value", qtd);
                            $('#conteudoTOTAL').text(res.conteudo);  

                        }
                    }
                });
            }
                  
        });

        //Adicionar ao carrinho atraves da visualizacao de um vinil
        $(document).on('click', '.AddCartViewBtn', function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            var qtd = $(this).attr("data-count");
            var func = qtd <= 10 ? 'adicionar' : 'remover'
            if(func == 'adicionar')
            {
                AddCart(vinil).then((added) => {
                    if(added){
                        $('#adicionado_view').removeClass('d-none');
                        $('#adicionado_view').html('Adicionado ao Carrinho!');
                        setTimeout(() => {
                            $('#adicionado_view').addClass('d-none');
                        }, 5000);
                    }
                  
                });
                
               
            }
            
        });

        
        //Adicionar tudo ao carrinho
        $(document).on('click', '.AddAll', function(event) {
            event.preventDefault();
            AddAll(); //Adicionar tudo ao carrinho
            RemoveAll(); //Remover todos os vinis da lista de desejos
            var location = window.location.href;
            if(location == "http://localhost/VinylShop/VinilShop/index.php?op=8") //Se o utilizador estiver na pagina do carrinho entao renicia
            {
                window.location.href = location;
            }
            
        });

        window.AddAll = AddAll; //Exporta a funcao
        


        //Botao de adicionar ao carrinho presente em cada vinil
        $(".AddCartBtn").click(function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            var icon = $('#iconCart_' + vinil).attr('class');
            var qtd = $(this).attr("data-count");
            var func = icon == 'bi bi-cart-plus' || qtd <= 10 ? 'adicionar' : 'remover'
            if(func == 'adicionar')
            {
                AddCart(vinil).then((added) => {
                    if(added){
                        $('#iconCart_' + vinil).removeClass('bi-cart-plus').addClass('bi-cart-x-fill');
                        $('#adicionado').removeClass('d-none');
                        $('#adicionado').html('Adicionado ao Carrinho!');
                        setTimeout(() => {
                            $('#adicionado').addClass('d-none');
                        }, 5000);
                    }
                  
                });
                
               
            }
           
        });

        //Remover da lista de desejos
        $(document).on('click', '.RemoveWishBtn', function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            RemoveWish(vinil);
            $('#icon_' + vinil).removeClass('bi-heart-fill').addClass('bi-heart');
        })

        //Adicionar ao carrinho atraves da lista de desejos
        $(document).on('click', '.AddWishlistCartBtn', function(event) {
            event.preventDefault();
            var vinil = $(this).attr("value");
            var icon = $('#iconCartWish_' + vinil).attr('class');
            var qtd = $(this).attr("data-count");
            var func = icon == 'bi bi-cart-plus' || qtd <= 10 ? 'adicionar' : 'remover'
            if(func == 'adicionar')
            {
                AddCart(vinil).then((added) => {
                    if(added){
                        $('#iconCart_' + vinil).removeClass('bi-cart-plus').addClass('bi-cart-x-fill');
                        $('#iconCartWish_' + vinil).removeClass('bi-cart-plus').addClass('bi-cart-x-fill');
                        $('#adicionado_wishlist').removeClass('d-none');
                        $('#adicionado_wishlist').html('Adicionado ao Carrinho!');
                        var location = window.location.href;
                        if(location == "http://localhost/VinylShop/VinilShop/index.php?op=8")
                            {
                                window.location.href = location;
                            }
                        setTimeout(() => {
                            $('#adicionado_wishlist').addClass('d-none');
                        }, 5000);
                    }
                  
                });
                
               
            }
        })

        //Adicionar ao carrinho
        function AddCart(vinil) {
            return new Promise((resolve) => {
                $.ajax({
                    type: "GET",
                    url: "pag/Vinyl/cart.php",
                    data: { vinil: vinil, func: 'adicionar' },
                    success: function (response) {
                        var res = jQuery.parseJSON(response);
                        if (res.status == 200) {
                           
                            $('#carrinho').html(res.html); 
                            let Count = document.getElementById("cartCount");
                            let countLabel = parseInt(Count.textContent);
                            countLabel++;
                            Count.textContent = countLabel;
                            $('#subtotal').html(res.subtotal);  
                            $('#total').html(res.total);  
                            $('#conteudoTOTAL').text(res.conteudo); 
                            resolve(true); 
                        } else if (res.status == 400) {   
                            alert('Atingiu o limite maximo desse vinil');
                            resolve(false);  
                        }
                    },
                });
            });
        }

        window.AddCart = AddCart;







});

function searchArtist() { //Procurar o artista no filtro
    let searchArt = document.getElementById('artistInput'); //pega a barra de pesquisa de artistas
    let filter = searchArt.value.toLowerCase(); //pega o que o utilizador pesquisou
    let artistas = document.getElementsByClassName('ArtistaItem'); //pega todos os artistas presentes no dropdown
    
    let count = 0;
    for (let i = 0; i < artistas.length; i++) {
        let artist = artistas[i];
        let textValue = artist.textContent;
        if (textValue.toLowerCase().indexOf(filter) > -1 && count < 10) { //Verifica se o artista foi encontrado e o count e menor que 10
            artist.style.display = ""; //mostra o artista
            count++;
        } else {
            artist.style.display = "none"; //Caso nao seja encontrado ou exceda o limite fica invisivel
        }
    }
}


function searchYear() {
    let searchYear = document.getElementById('yearInput');
    let filter = searchYear.value.toLowerCase();
    let years = document.getElementsByClassName('YearItem');
    
    let count = 0;
    for (let i = 0; i < years.length; i++) {
        let year = years[i];
        let textValue = year.textContent;
        if (textValue.toLowerCase().indexOf(filter) > -1 && count < 10) {
            year.style.display = "";
            count++;
        } else {
            year.style.display = "none";
        }
    }
}






