<?php
require '../../bd/vinys.php';
session_start();

//remover filtros
if(isset($_GET['label']) && $_GET['func'] == 'remover' ) {
    $filtro = $_GET['label'];

 
    $url2 = $_GET['currentURL'];

    $link = RemoveLabels($filtro, $url2);
    $res = [
        'link'=> $link,
        'deu'=> "sim",
        'status' => 200,
    ];

    echo json_encode($res);
}

//adicionar genero
if(isset($_GET['label']) && $_GET['func'] == 'adicionar_genero'){
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY); 
    parse_str($queryString, $params); //Pega os parametros do link
   $genre = $_GET['label'];
    
   if (!isset($_SESSION['filter'])) {
    $_SESSION['filter'] = ''; 
   }
   $new = $_GET['ItsNew'];
    if($new == 'false')
    {
        if (strpos($_SESSION['filter'], $genre) == false) { //verifica se o genero ja nao esta no filtro
            $_SESSION['filter'] .= $genre .= ",";  //Adiciona ao filtro
        }

        // renicia o parametro filtro para evitar a repeticao e entao adiciona 
        $params['filter'] = '';
        $params['filter'] =  $_SESSION['filter'];
    
    }
    else if($new == 'true')
    {   
        $_SESSION['labels'] = []; //renicia as labels visto ser uma opcao de novos vinis no menu de navegacao
        array_push($_SESSION['labels'], $genre);
        array_push($_SESSION['labels'], 'Novos Vinis');
        $_SESSION['filter'] = $genre;
        $params['filter'] = '';
        $params['filter'] =  $_SESSION['filter'];
        
        
    }

        $params['page'] = '1'; //leva para a primeira pagina
        $newUrl = http_build_query($params); //montagem do novo url
        $res = [
            'link'=> '?'. $newUrl,
            'kk' => $new,
            'status' => 200,
        ];

    echo json_encode($res);
}

//adicionar tipo
if(isset($_GET['label']) && $_GET['func'] == 'adicionar_tipo'){
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
   $tipo = $_GET['label'];
    
   if (!isset($_SESSION['filter'])) {
    $_SESSION['filter'] = ''; 
   }

    
        if (strpos($_SESSION['filter'], $tipo) == false) { 
            $_SESSION['filter'] .= $tipo .= ","; 
        }

    
        $params['filter'] = '';
        $params['filter'] =  $_SESSION['filter'];
    

        
        
    

        $params['page'] = '1';
        $newUrl = http_build_query($params);
        $res = [
            'link'=> '?'. $newUrl,
            'status' => 200,
        ];

    echo json_encode($res);
}

//Adicionar Formato
if(isset($_GET['label']) && $_GET['func'] == 'adicionar_formato'){
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    $formato = $_GET['label'];
    
   if (!isset($_SESSION['filter'])) {
    $_SESSION['filter'] = ''; 
   }

    
        if (strpos($_SESSION['filter'], $formato) === false) { 
            $_SESSION['filter'] .= $formato .= ","; 
        }

    
        $params['filter'] = '';
        $params['filter'] =  $_SESSION['filter'];
    

        
        
    

        $params['page'] = '1';
        $newUrl = http_build_query($params);
        $res = [
            'link'=> '?'. $newUrl,
            'status' => 200,
        ];

    echo json_encode($res);
}

//Adicionar Artista
if(isset($_GET['label']) && $_GET['func'] == 'adicionar_artista'){
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    $artista = $_GET['label'];
    
   if (!isset($_SESSION['filter'])) {
    $_SESSION['filter'] = ''; 
   }

    
        if (strpos($_SESSION['filter'], $artista) === false) { 
            $_SESSION['filter'] .= $artista .= ","; 
        }

    
        $params['filter'] = '';
        $params['filter'] =  $_SESSION['filter'];
    

        
        
    

        $params['page'] = '1';
        $newUrl = http_build_query($params);
        $res = [
            'link'=> '?'. $newUrl,
            'status' => 200,
        ];

    echo json_encode($res);
}



//Adicionar Ano
if(isset($_GET['label']) && $_GET['func'] == 'adicionar_ano'){
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    $year = $_GET['label'];
    
   if (!isset($_SESSION['filter'])) {
    $_SESSION['filter'] = ''; 
   }

    
        if (strpos($_SESSION['filter'], $year) == false) { 
            $_SESSION['filter'] .= $year .= ","; 
        }

    
        $params['filter'] = '';
        $params['filter'] =  $_SESSION['filter'];
    

        
        
    

        $params['page'] = '1';
        $newUrl = http_build_query($params);
        $res = [
            'link'=> '?'. $newUrl,
            'status' => 200,
        ];

    echo json_encode($res);
}

//Adicionar Preco
if($_GET['func'] == 'adicionar_preco'){
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    $precoMin = $_GET['precoMin'];
    $precoMax = $_GET['precoMax'];
    

    $params['PrecoMax'] = $precoMax;
    $params['PrecoMin'] = $precoMin;
    $params['page'] = '1';
    $newUrl = http_build_query($params);
    $res = [
        'link'=> '?'. $newUrl,
        'deu'=> "sim",
        'status' => 200,
    ];

    echo json_encode($res);
}

//adicionar promocao
if (isset($_GET['label']) && $_GET['func'] == 'adicionar_promo') {
    $url = $_GET['currentURL'];
    $queryString = parse_url($url, PHP_URL_QUERY);
    parse_str($queryString, $params);
    $promo = $_GET['label'];

    if (!isset($_SESSION['filter'])) {
        $_SESSION['filter'] = ''; 
    }

    //Caso for selecionado uma promocao sem ser todos os vinis, remove Todos os Vinis em promoção
    //É necessario o uso dos 2 iguais porque pode acontecer da posicao da string ser 0, e 0 significa falso
    if (strpos($_SESSION['filter'], 'Todos os Vinis em promoção') !== false) { 
        $_SESSION['filter'] = str_replace('Todos os Vinis em promoção', '', $_SESSION['filter']);
    }

    
    if (strpos($_SESSION['filter'], $promo) == false) { 
        //Caso a promocao selecionado seja Todos, vai remover as promocoes selecionadas anteriormente
        if ($promo == 'Todos os Vinis em promoção') {
            $_SESSION['filter'] = '';

        }
        $_SESSION['filter'] .= $promo . ","; 
    }

    $count = 0;
    foreach ($_SESSION['promocoes'] as $promocao) {
        if (strpos($_SESSION['filter'], $promocao) !== false) {
            $count++;
        }
    }

    //caso ja esteja as 3 promocoes selecionadas vai selecionar automaticamente Todos os Vinis em promoção
    if ($count == 3) {
        foreach ($_SESSION['promocoes'] as $promocao) {
            if (strpos($_SESSION['filter'], $promocao) !== false) {
                $_SESSION['filter'] = str_replace($promocao, '', $_SESSION['filter']); //Retirar do link
            }
        }
        $_SESSION['filter'] .= "Todos os Vinis em promoção,";
    }

    // Update the URL with the new filter
    
    $params['filter'] = $_SESSION['filter'];
    $params['page'] = '1';
    $newUrl = http_build_query($params);
    $res = [
        'count' => $count,
        'link' => '?' . $newUrl,
        'deu' => "sim",
        'status' => 200,
    ];

    echo json_encode($res);
}



?>