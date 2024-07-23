<?php
    function GetImagemPrincipal()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT * FROM imagem_principal";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $imagensprincipais = [];
            while ($row = $query_run->fetch_assoc()) {
                $imagensprincipais[] = $row;
            }
    
        }
    
        return $query_run;
    
    }
    
?>