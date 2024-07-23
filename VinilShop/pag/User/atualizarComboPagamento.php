<?php


$query = "SELECT MetodoPagamento_id, Nome FROM metodo_pagamento";
$result = mysqli_query($con, $query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $data[] = $row;
                
    }
}


foreach ($data as $row) {
    $id = $row['MetodoPagamento_id'];
    $nome = $row['Nome'];
    echo "<option value='$id'>$nome</option>";
}
?>

