<?php

    function GetEncomendasTable()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT e.*, u.nome as utilizador_nome, u.apelido as utilizador_apelido FROM encomenda e
                  LEFT JOIN utilizador u on u.utilizador_id = e.utilizador_id";
        $query_run = mysqli_query($con, $query);
        
        
        if ($query_run) {
            $encomendas = [];
            while ($row = $query_run->fetch_assoc()) {
                $encomendas[] = $row;
            }
    
        }
    
        return $query_run;
    
    }
    
?>