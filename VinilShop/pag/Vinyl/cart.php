<?php
require '../../bd/vinys.php';
require '../../bd/dbcon.php';
session_start();

if(isset($_GET['vinil']) && $_GET['func'] == 'adicionar') {
    $vinil = $_GET['vinil'];
        if(!isset($_SESSION['Cart'])) {
            $_SESSION['Cart'] = [];
        }

        $found = false;
        foreach ($_SESSION['Cart'] as $item) {
            if ($item['vinil'] == $vinil) { //verificar se o vinil ja nao esta no array
                $found = true;
                break;
            }
        }

        if (!$found) {
            $item = [
                'vinil' => $vinil,
                'Qtd' => 1
            ];
        
        
            $_SESSION['Cart'][] = $item;

            
            //sera devolvido o HTML do carrinho atraves de uma funcao
            $res = [
                'vinil'=> $vinil,
                'deu' => 'sim',
                'html' =>  GetVinysCart($con),
                'status'=> 200
               ];
               echo json_encode($res);
        }
        else
        {   

            foreach ($_SESSION['Cart'] as $item) {
                if ($item['vinil'] == $vinil) {
                    $qtd = $item['Qtd']; //pegar a quantidade do vinil existente
                    break;
                }
            }

          

            if($qtd < 10)
            {
                $item = [
                    'vinil' => $vinil,
                    'Qtd' => $qtd
                ];

                $key = array_search($item, $_SESSION['Cart']); //Procura o item
                $qtd++; //Aumenta quantidade
                $_SESSION['Cart'][$key]['Qtd'] = $qtd; //Coloca a quantidade
                $shipping = isset($_SESSION['user']['transportadora_preco'])? $_SESSION['user']['transportadora_preco']: 0.00;
                $count = 0;
                foreach ($_SESSION['Cart'] as $value){
                    $count += $value['Qtd'];
                }

                $res = [
                    'status'=> 200,
                    'subtotal'=> number_format(GetTotal($con), 2),
                    'total'=> number_format(GetTotal($con) + $shipping, 2),
                    'vinil'=> $vinil,
                    'deu' => 'sim',
                    'conteudo' => $count,
                    'html' => GetVinysCart($con),
                   ];
                   echo json_encode($res);
            }
            else{
                $res = [
                    'vinil'=> $vinil,
                    'deu' => 'nao',
                    'status'=> 400
                   ];
                   echo json_encode($res);
            }
            
        }

        
        

          
        
    

}

if($_GET['func'] == "adicionarTUDO") //Adicionar tudo ao carrinho aparti da lista de desejos
{
    if(!isset($_SESSION['Cart'])) {
        $_SESSION['Cart'] = [];
    }


    foreach ($_SESSION['Wishlist'] as $key =>  $item) {
        $found = false;
        foreach ($_SESSION['Cart'] as $itemCart) {
            if ($itemCart['vinil'] == $item) { //Verificar se o vinil ja esta no carrinho
                $found = true;
                $qtd = $itemCart['Qtd'];
                break;
            }
        }

        if(!$found) {

            $vinil= [
                'vinil' => $item,
                'Qtd' => 1
            ];
        
        
            $_SESSION['Cart'][] = $vinil;
        }
        else {
            if($qtd < 10)
            {
                $vinil = [
                    'vinil' => $item,
                    'Qtd' => $qtd
                ];

                $keyCart = array_search($vinil, $_SESSION['Cart']); //Procura o vinil
                $qtd++;
                $_SESSION['Cart'][$keyCart]['Qtd'] = $qtd;
            }

        }
    }

    $count = 0;
    foreach ($_SESSION['Cart'] as $value){
        $count += $value['Qtd'];
    }
    
    $ids = array_values($_SESSION['Wishlist']);

        $res = [
            'ids'=> $ids,
            'quantidade' => $count,
            'deu' => 'sim',
            'html' =>  GetVinysCart($con),
            'status'=> 200
        ];
        echo json_encode($res);



}

if($_GET['func'] == "remover"){
    
    $vinil = $_GET['vinil'];

        foreach ($_SESSION['Cart'] as $item => $itemCart) {
            if ($itemCart['vinil'] == $vinil) {
                if(!isset($_GET['qtd'])){ //se o vinil foi completamente removido
                unset($_SESSION['Cart'][$item]);
                }else // se foi mudado apenas a quantidade do vinil
                {
                    $_SESSION['Cart'][$item]['Qtd']--;
                }
                $shipping = isset($_SESSION['user']['transportadora_preco'])? $_SESSION['user']['transportadora_preco']: 0.00;

                $count = 0;

                foreach ($_SESSION['Cart'] as $value){
                    $count += $value['Qtd'];
                }

                $res = [
                    'status'=> 200,
                    'subtotal'=> number_format(GetTotal($con), 2),
                    'total'=> number_format(GetTotal($con) + $shipping, 2),
                    'vinil'=> $vinil,
                    'conteudo'=> $count,
                    'deu' => 'sim',
                    'html' => GetVinysCart($con),
                   ];
                echo json_encode($res);
                break;
            }
        }
    
  

}

if($_GET['func'] == "AddAllFromOrder")
{
    if(!isset($_SESSION['Cart'])) {
        $_SESSION['Cart'] = [];
    }


    foreach ($_SESSION['vinis_order'] as $key =>  $item) {
        $found = false;
        foreach ($_SESSION['Cart'] as $itemCart) { //Verificar se o vinil ja nao esta no carriho
            if ($itemCart['vinil'] == $item) {
                $found = true;
                $qtd = $itemCart['Qtd'];
                break;
            }
        }

        if(!$found) {

            $vinil= [
                'vinil' => $item,
                'Qtd' => 1
            ];
        
        
            $_SESSION['Cart'][] = $vinil;
        }
        else {
            if($qtd < 10)
            {
                $vinil = [
                    'vinil' => $item,
                    'Qtd' => $qtd
                ];

                $keyCart = array_search($vinil, $_SESSION['Cart']);
                $qtd++;
                $_SESSION['Cart'][$keyCart]['Qtd'] = $qtd;
            }

        }
    }

    $count = 0;
    foreach ($_SESSION['Cart'] as $value){
        $count += $value['Qtd'];
    }
    
    $ids = array_values($_SESSION['vinis_order']);

        $res = [
            'ids'=> $ids,
            'quantidade' => $count,
            'deu' => 'sim',
            'html' =>  GetVinysCart($con),
            'status'=> 200
        ];
        echo json_encode($res);



}


?>