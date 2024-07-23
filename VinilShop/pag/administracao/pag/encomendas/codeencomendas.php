<?php
session_start();
if (isset($_GET['encomenda_id'])) {
    require '../../../../bd/dbcon.php';

    $encomenda_id = $_GET['encomenda_id'];

    $query = "SELECT e.*, u.nome as utilizador_nome, u.apelido as utilizador_apelido FROM encomenda e
                  LEFT JOIN utilizador u on u.utilizador_id = e.utilizador_id where encomenda_id = $encomenda_id";
    $query_run = mysqli_query($con, $query);
    
    
   
    
    if (mysqli_num_rows($query_run) > 0) {
        if ($query_run) {
           $encomenda = mysqli_fetch_assoc($query_run);
          
            //Pega os vinis da encomenda
           $query_vinis = "SELECT ev.*, v.nome as vinil, img.imagem as vinil_imagem, a.Nome as artista, gn.nome as genero, v.formato as vinil_formato, v.tipo as vinil_tipo, v.preco as vinil_preco
            FROM encomenda_vinil ev
            LEFT JOIN vinil v on v.vinil_id = ev.vinil_id
            LEFT JOIN artista a on a.artista_id = v.artista_id
            LEFT JOIN genero gn on gn.genero_id = v.genero_id
            LEFT JOIN imagem_vinil img on img.vinil_id = v.vinil_id
            WHERE ev.encomenda_id = $encomenda_id
            AND img.descricao = 'I'";

    $result = mysqli_query($con, $query_vinis);
    
    if($result){
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
        
                $data[] = $row;
                        
            }
        }
    
    }    
    
    $lista = "";

    //Montagem da lista de vinis da encomenda
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
        


        $lista .= " <li class='list-group-item'>
                    <div class='row align-items-center'>
                        <div class='col-md-3'>
                            <img src='../../$imagem' width='140' heigth='140'>
                        </div>
                        <div class='col-md-6'>
                            <h5>$nome</h5>
                            <div>$artista</div>
                            <div>$genero</div>
                            <div>$formato</div>
                            <div>$tipo</div>
                            <div>Quantidade <input type='number'  value='$Qtd' min='1' max='10' readonly></div>
                        </div>
                        <div class='col-md-3 text-end'>
                            <div style='font-size: 20px; font-weight: bold;'>
                                $preco" ."€" . "
                            </div>";
                $lista .= "
                        </div>
                    </div>
                </li>";
        }

           $res = [
            'status' => 200,
            'message' => 'Encomenda Encontrado',
            'data' => $encomenda,
            'lista' => $lista
    
        ];

        echo json_encode($res);
        return;
        
        }




        
       
    } else {
        $res = [
            'status' => 404,
            'message' => 'Utilizador nao encontrado'
        ];
        echo json_encode($res);
        return;
    }
}


if (isset($_POST['editar_encomenda'])) {
    require '../../../../bd/dbcon.php';
    $encomenda_id = mysqli_real_escape_string($con, $_POST['id']);
    $country = mysqli_real_escape_string($con, $_POST['pais']);
    $district = mysqli_real_escape_string($con, $_POST['distrito']);
    $postalCode = mysqli_real_escape_string($con, $_POST['codigoPostal']);
    $city = mysqli_real_escape_string($con, $_POST['cidade']);
    $street = mysqli_real_escape_string($con, $_POST['rua']);
    $status = mysqli_real_escape_string($con, $_POST['status']);



    $query = "UPDATE encomenda  SET 
     rua = '$street', codigo_postal = '$postalCode', cidade = '$city', pais = '$country', distrito = '$district', status = '$status'
     WHERE encomenda_id = $encomenda_id";

    
 

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {   
        $user_id = $_SESSION['user']['utilizador_id'];
        $escaped_query = mysqli_real_escape_string($con, $query);
        $log_query_order = "INSERT INTO logfile VALUES
        (null, CURDATE(), '$user_id', 'Update', '$escaped_query' )";

        $log_query_order_run = mysqli_query($con, $log_query_order);
        
        $res['status'] = 200;
        $res['message'] = "Encomenda editado com sucesso";
        echo json_encode($res);
        return;
        
    }
            

   
}




if (isset($_POST['eliminar_encomenda'])) {
    require '../../../../bd/dbcon.php';
    $encomenda_id = mysqli_real_escape_string($con, $_POST['encomenda_id']);

            $query = "UPDATE encomenda set status = 'Pedido Excluido' where encomenda_id = $encomenda_id";

            $query_run = mysqli_query($con, $query);

            $user_id = $_SESSION['user']['utilizador_id'];
            $escaped_query = mysqli_real_escape_string($con, $query);
            $log_query_order = "INSERT INTO logfile VALUES
            (null, CURDATE(), '$user_id', 'Update', '$escaped_query' )";
 
            $log_query_order_run = mysqli_query($con, $log_query_order);
    
            $res = [
                'status' => 200,
                'message' => 'Encomenda excluida com sucesso',
            ];
    
            echo json_encode($res);
            return;
        
     
    



}

?>