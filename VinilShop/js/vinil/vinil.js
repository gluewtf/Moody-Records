document.addEventListener("DOMContentLoaded", function() {
    //Verifica se o vinil esta em stock
    var stockLabel = document.getElementById("stock-label");
    var stockQuantity = parseInt(stockLabel.getAttribute("data-stock")); 

    if (stockQuantity > 0) {
        stockLabel.textContent = "Em stock";
        stockLabel.style.color = "green";
    }
    
    //Verifica se o vinil esta em desconto para colocar a label de preco no devido formato
    var priceLabel = document.getElementById("price-label");
    var price = parseFloat(priceLabel.getAttribute("preco"))
    var desconto = parseFloat(priceLabel.getAttribute("desconto"));
    if(!isNaN(desconto) && desconto > 0)
    {
        var Precoriginal = price / (1 - (desconto / 100));
        var precoAntigoLabel = document.getElementById("preco-antigo");
    
        precoAntigoLabel.innerText = Precoriginal.toFixed(2) + "€";
        precoAntigoLabel.style.color = "red";
    
    }

  

    
  
   


});




