<?php
    function GetContactoTable()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT * FROM contacto";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $contacto = [];
            while ($row = $query_run->fetch_assoc()) {
                $contacto[] = $row;
            }
    
        }
    
        return $query_run;
    
    }
    
?>