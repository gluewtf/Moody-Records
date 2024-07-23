<?php
require '../../bd/vinys.php';
require '../../bd/dbcon.php';
session_start();

if (isset($_POST['alterar_infoEncomenda'])) {
    $firstName = mysqli_real_escape_string($con, $_POST['nome']);
    $lastName = mysqli_real_escape_string($con, $_POST['apelido']);
    $telemovel = mysqli_real_escape_string($con, $_POST['telemovel']);
    $country = mysqli_real_escape_string($con, $_POST['pais']);
    $postalCode = mysqli_real_escape_string($con, $_POST['postalCode']);
    $district = mysqli_real_escape_string($con, $_POST['distrito']);
    $city = mysqli_real_escape_string($con, $_POST['cidade']);
    $street = mysqli_real_escape_string($con, $_POST['rua']);

    if (isset($_SESSION['encomenda'])) {
    $_SESSION['encomenda']['nome'] = $firstName;
    $_SESSION['encomenda']['apelido'] = $lastName;
    $_SESSION['encomenda']['telemovel'] = $telemovel;
    $_SESSION['encomenda']['rua'] = $street;
    $_SESSION['encomenda']['pais'] = $country;
    $_SESSION['encomenda']['codigo_postal'] = $postalCode;
    $_SESSION['encomenda']['distrito'] = $district;
    $_SESSION['encomenda']['cidade']  = $city;
    
    $encomenda =  $_SESSION['encomenda'];
    $res = [
        'encomenda'=> $encomenda,
        'status' => 200,
    ];

    echo json_encode($res);
    }

  


}

if(isset($_GET['func'])) {

    if($_GET['func'] == 'GetEnvio') {

        $res = [
            'status'=> 200,
            'metodoenvio_id' => $_SESSION['encomenda']['metodoenvio_id'],
            'transportadora' => $_SESSION['encomenda']['transportadora'],
            'descricao' => $_SESSION['encomenda']['transportadora_descricao'],
            'preco' => $_SESSION['encomenda']['transportadora_preco']
        ];

        echo json_encode($res);
    }

    if($_GET['func'] == 'AlterarEnvio') {

        $transportadora = $_GET['transportadora'];

        $query = "SELECT MetodoEnvio_id, nome, descricao, preco from metodo_envio  WHERE MetodoEnvio_id = '$transportadora'";

        $query_run = mysqli_query($con,$query);

        if($query_run)
        {         
            $row =  mysqli_fetch_assoc($query_run);
            $_SESSION['encomenda']['transportadora'] =  $row['nome'];
            $_SESSION['encomenda']['metodoenvio_id'] =  $row['MetodoEnvio_id'];
            $_SESSION['encomenda']['transportadora_descricao'] =  $row['descricao'];
            $_SESSION['encomenda']['transportadora_preco'] =  $row['preco'];

            $encomenda = $_SESSION['encomenda'];

            
            $res = [
                'status'=> 200,
                'encomenda' => $encomenda,
            ];


            echo json_encode($res);
            return;
        }
    }

    if($_GET['func'] == 'GetPagamento') {

        $res = [
            'status'=> 200,
            'metodopagamento_id' => $_SESSION['encomenda']['metodopagamento_id'],
            'pagamento' => $_SESSION['encomenda']['pagamento'],
            'descricao' => $_SESSION['encomenda']['pagamento_descricao']
        ];

        echo json_encode($res);
    }

    if($_GET['func'] == 'AlterarPagamento') {

        $pagamento = $_GET['pagamento'];

        $query = "SELECT MetodoPagamento_id, nome, descricao from metodo_pagamento  WHERE MetodoPagamento_id = '$pagamento'";

        $query_run = mysqli_query($con,$query);

        if($query_run)
        {         
            $row =  mysqli_fetch_assoc($query_run);
            $_SESSION['encomenda']['pagamento'] =  $row['nome'];
            $_SESSION['encomenda']['metodopagamento_id'] =  $row['MetodoPagamento_id'];
            $_SESSION['encomenda']['pagamento_descricao'] =  $row['descricao'];

            $encomenda = $_SESSION['encomenda'];

            
            $res = [
                'status'=> 200,
                'encomenda' => $encomenda,
            ];


            echo json_encode($res);
            return;
        }
    }

    

}

if(isset($_POST['relizar_encomenda'])) {
        
    $id = $_SESSION['user']['utilizador_id'];
    $rua = $_SESSION['encomenda']['rua'];
    $postalCode = $_SESSION['encomenda']['codigo_postal'];
    $cidade = $_SESSION['encomenda']['cidade'];
    $pais = $_SESSION['encomenda']['pais'];
    $distrito = $_SESSION['encomenda']['distrito'];
    $pagamento = $_SESSION['encomenda']['metodopagamento_id'];
    $cartao = sha1(mysqli_real_escape_string($con, $_POST['cartao']));
    $titular = mysqli_real_escape_string($con, $_POST['titular']);
    $dataValidade = mysqli_real_escape_string($con, $_POST['date']);
    $data_validade = $dataValidade;
    $codigo = mysqli_real_escape_string($con, $_POST['ccv']);
    $transportadora = $_SESSION['encomenda']['metodoenvio_id'];
    $portes =  $_SESSION['encomenda']['transportadora_preco'];
    $total = number_format(GetTotal($con) + $_SESSION['encomenda']['transportadora_preco'], 2);
    $data = date("Y-m-d");
    $status = "Pedido Recebido";

    $insert_encomenda = "INSERT INTO encomenda  VALUES
        (null,'$id', '$rua', '$postalCode', '$cidade', '$pais', '$distrito', '$pagamento', '$cartao', '$titular','$data_validade', '$codigo', '$transportadora', '$total', '$data', '$status')";

    $insert_encomenda_run = mysqli_query($con, $insert_encomenda);



    $encomenda_id = mysqli_insert_id($con);

    $insert_encomenda_vinis = "INSERT INTO encomenda_vinil  VALUES";
    foreach ($_SESSION['Cart'] as $item) { 
            $qtd = $item['Qtd'];
            $vinil = $item['vinil'];
            $insert_encomenda_vinis .="
            ($encomenda_id,$vinil,$qtd),";
    }

    $insert_encomenda_vinis = rtrim($insert_encomenda_vinis,","); //retira a virgula final
    $insert_encomenda_vinis_run = mysqli_query($con, $insert_encomenda_vinis);
    
    $select_encomenda = "SELECT * FROM encomenda where encomenda_id = $encomenda_id";

    $select_encomenda_run = mysqli_query($con, $select_encomenda);
    unset($_SESSION['Cart']);
    $row = mysqli_fetch_assoc($select_encomenda_run);
    $res = [
        "status" => 200,
        "encomenda"=> $row,
        "encomenda_id" => $encomenda_id
    ];

    echo json_encode($res);


}

?>