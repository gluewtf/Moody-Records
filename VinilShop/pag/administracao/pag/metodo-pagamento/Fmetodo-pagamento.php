<?php
    function GetPagamentosTable()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT * FROM metodo_pagamento";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $pagamentos = [];
            while ($row = $query_run->fetch_assoc()) {
                $pagamentos[] = $row;
            }
        }
    
        return $query_run;
    
    }
    
?>