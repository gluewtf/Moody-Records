<?php


$query = "SELECT MetodoEnvio_id, nome, preco FROM metodo_envio";
$result = mysqli_query($con, $query);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {

        $data[] = $row;
                
    }
}


foreach ($data as $row) {
    $id = $row['MetodoEnvio_id'];
    $nome = $row['nome'];
    $preco = $row['preco'];
    echo "<option value='$id'>$nome $preco €  </option>";
}

?>

