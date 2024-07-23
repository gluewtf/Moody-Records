<?php
    function GetGeneros()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT * FROM genero";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $generos = [];
            while ($row = $query_run->fetch_assoc()) {
                $generos[] = $row;
            }
    
            $_SESSION['genres'] = $generos;
        }
    
        return $query_run;
    
    }
    
?>