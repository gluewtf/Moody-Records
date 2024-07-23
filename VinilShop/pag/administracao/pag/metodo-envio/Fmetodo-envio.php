<?php
    function GetEnviosTable()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT * FROM metodo_envio";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $envios = [];
            while ($row = $query_run->fetch_assoc()) {
                $envios[] = $row;
            }
        }
    
        return $query_run;
    
    }
    
?>