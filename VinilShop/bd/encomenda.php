<?php

//Pega so as encomendas ativas do utilizador
function GetEncomendas($con){
    $util = $_SESSION['user']['utilizador_id'];
    $query = "SELECT * FROM encomenda where utilizador_id = $util and status != 'Pedido Excluido'";
    $query_run = mysqli_query($con, $query);

    return $query_run;
}

//Pega a encomenda que o utilizador esta a visualizar
function GetOrder($con){
    $order = $_GET['e'];
    $query = "SELECT e.*, mp.Nome as pagamento, mt.Nome as transportadora, mt.preco as transportadora_preco, u.nome as user_nome, u.apelido as user_apelido, u.telemovel as telemovel
    FROM encomenda e
    LEFT JOIN metodo_pagamento mp on mp.MetodoPagamento_id = e.MetodoPagamento_Id
    LEFT JOIN metodo_envio mt on mt.MetodoEnvio_id = e.MetodoEnvio_id
    LEFT JOIN utilizador u on u.utilizador_id = e.utilizador_id
    WHERE encomenda_id = $order";

    $result = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($result);

    $date = date_create($row['Data_Criado']);
    $row['Data_Criado'] = date_format($date,"d M, Y");

    $_SESSION['order'] = $row;
    
}

//Pega os vinis da encomenda que o utiizador esta a visualizar
function GetVinysOrder($con){
    $order = $_GET['e'];
    $query = "SELECT ev.*, v.nome as vinil, img.imagem as vinil_imagem, a.Nome as artista, gn.nome as genero, v.formato as vinil_formato, v.tipo as vinil_tipo, v.preco as vinil_preco
    FROM encomenda_vinil ev
    LEFT JOIN vinil v on v.vinil_id = ev.vinil_id
    LEFT JOIN artista a on a.artista_id = v.artista_id
    LEFT JOIN genero gn on gn.genero_id = v.genero_id
    LEFT JOIN imagem_vinil img on img.vinil_id = v.vinil_id
    WHERE ev.encomenda_id = $order
    AND img.descricao = 'I'";

    $result = mysqli_query($con, $query);
    
    if($result){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        
                $data[] = $row;
                        
            }
        }
    
    }    
    
    $content = "";

    $vinis = [];
    foreach ($data as $row) {
                    
        $id = $row["vinil_id"];
        $imagem = $row["vinil_imagem"];
        $nome = $row["vinil"];
        $artista = $row["artista"];
        $preco = $row["vinil_preco"];
        $genero = $row["genero"];
        $formato = $row["vinil_formato"];
        $Qtd = $row['Qtd'];
        $tipo = $row["vinil_tipo"];

        $preco = number_format($preco * $Qtd,2);
        $qtd_cart = 0;
        foreach ($_SESSION['Cart'] as $item) { //Quantidade de cada vinil da encomenda no carrinho
            if ($item['vinil'] == $id) {
                $qtd_cart = $item['Qtd'];
                break;
            }
        }

        array_push($vinis, $id);
    
        $content .= " <li class='list-group-item'>
                    <div class='row align-items-center'>
                        <div class='col-md-3'>
                            <a href='index.php?op=7&v=$id'>
                            <img src='$imagem' class='vinyl-image-cart'>
                            </a>
                        </div>
                        <div class='col-md-6'>
                            <h5>$nome</h5>
                            <div>$artista</div>
                            <div>$genero</div>
                            <div>$formato</div>
                            <div>$tipo</div>
                            <div>Quantidade <input type='number' class='QtdVinil' data-vinyl='$id' value='$Qtd' min='1' max='10' readonly></div>
                        </div>
                        <div class='col-md-3 text-end'>
                            <div style='font-size: 20px; font-weight: bold;'>
                                $preco" ."€" . "
                            </div>
                            <div>
                            <a href='#' value='$id' data-count='$qtd_cart' class='CartOrderAdd' style='color: #1c6fb8'>Adicionar ao carrinho</a><br>";
                $content .= "
                            </div>
                        </div>
                    </div>
                </li>";
        }
    $_SESSION['vinis_order'] = $vinis;
    return $content;
          
    
}


?>