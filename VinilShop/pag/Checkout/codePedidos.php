<?php
require '../../bd/dbcon.php';
session_start();


if($_GET['func'] == 'ConfirmarEntrega'){

    $order = $_GET['order'];

    $query = "UPDATE encomenda set status = 'Entregue' WHERE encomenda_id = $order";

    $query_run = mysqli_query($con, $query);

    $res = [
        'status'=> 200,
        'order' => $order
    ];

    echo json_encode($res);

}

if($_GET['func'] == 'DeletePedido'){

    $order = $_GET['order'];

    $query = "UPDATE encomenda set status = 'Pedido Excluido' WHERE encomenda_id = $order";

    $query_run = mysqli_query($con, $query);

    $res = [
        'status'=> 200,
        'order' => $order
    ];

    echo json_encode($res);

}


?>