<?php
require '../../../../bd/dbcon.php';
require 'Fdashboard.php';
if($_GET['func'] == 'vendas' ) {
    $filtro = $_GET['filtro'];

    $html = GetSells($con,$filtro);
    $res = [
        'html'=> $html,
        'status' => 200
    ];

    echo json_encode($res);
}

if($_GET['func'] == 'ganhos' ) {
    $filtro = $_GET['filtro'];

    $html = GetEarnings($con,$filtro);
    $res = [
        'html'=> $html,
        'status' => 200
    ];

    echo json_encode($res);
}

if($_GET['func'] == 'encomendas' ) {
    $filtro = $_GET['filtro'];

    $html = GetEncomendasDashTable($con,$filtro);
    $res = [
        'html'=> $html,
        'status' => 200
    ];

    echo json_encode($res);
}
?>