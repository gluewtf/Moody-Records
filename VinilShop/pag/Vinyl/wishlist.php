<?php
require '../../bd/vinys.php';
require '../../bd/dbcon.php';
session_start();


if($_GET['func'] == 'GetVinys') {
//Pega os vinis que estão na lista de desejos, vai ser returnado o html da lista
           $res = [
            'deu' => 'sim',
            'html' => GetVinysWishList($con),
            'status'=> 200
           ];
           echo json_encode($res);
        
    

}

if(isset($_GET['vinil']) && $_GET['func'] == 'adicionar') {
    
    $vinil = $_GET['vinil'];
        if(!isset($_SESSION['Wishlist'])) {
            $_SESSION['Wishlist'] = [];
        }

        if (!in_array($vinil, $_SESSION['Wishlist'])) { //Verifica se o vinil ja nao  esta na lista de desejos
           array_push($_SESSION['Wishlist'], $vinil); //Adiciona ao array
           //Caso o utilizador esteja logado, os vinis adicionados a lista desejos serao guardados na base de dados
           if(!empty($_SESSION['user'])) {
              $id = $_SESSION['user']['utilizador_id'];
              $query = "INSERT INTO lista_desejos  VALUES
            ($id, $vinil) ";
             $query_run = mysqli_query($con, $query);
           }

           $res = [
            'vinil'=> $vinil,
            'deu' => 'sim',
            'html' => GetVinysWishList($con),
            'status'=> 200
           ];
           echo json_encode($res);
        }
    

}


if($_GET['func'] == 'remover') {
    $vinil = $_GET['vinil'];

    $key = array_search($vinil, $_SESSION['Wishlist']); //Index do vinil a ser removido
    unset($_SESSION['Wishlist'][$key]);
    //Caso o utilizador esteja logado, os vinis removidos da lista desejos serão removidos tambem  da base de dados
    if(!empty($_SESSION['user'])) {
        $user = 'tem';
        $id = $_SESSION['user']['utilizador_id'];
        $query = "DELETE FROM lista_desejos  WHERE vinil_id = $vinil AND utilizador_id = $id";
        $query_run = mysqli_query($con, $query);
     }

    $res = [
     'deu' => 'sim',
     'html' => GetVinysWishList($con),
     'status'=> 200
    ];
    echo json_encode($res);
 


}

if($_GET['func'] == 'removerTUDO') {
    $_SESSION['Wishlist'] = []; //Reniciar o array
    if(!empty($_SESSION['user'])) {
        $id = $_SESSION['user']['utilizador_id'];
        $query = "DELETE FROM lista_desejos  WHERE utilizador_id = $id";
        $query_run = mysqli_query($con, $query);
     }
    $res = [
     'deu' => 'sim',
     'html' => GetVinysWishList($con),
     'status'=> 200
    ];
    echo json_encode($res);
 


}

?>