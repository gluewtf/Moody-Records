<?php
    function GetGravadorasTable()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT * FROM gravadora";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $gravadoras = [];
            while ($row = $query_run->fetch_assoc()) {
                $gravadoras[] = $row;
            }
    
            $_SESSION['gravadoras'] = $gravadoras;
        }
    
        return $query_run;
    
    }
    
?>