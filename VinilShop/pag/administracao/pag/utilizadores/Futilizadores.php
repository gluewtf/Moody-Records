<?php
// session_start();
    function GetUtilizadoresTable()
    {
    
        require '../../bd/dbcon.php';
        
        //Pega os utilizadores, se o utilizador for admin, nao consegue ver outros admins nem o dono
        $query = "SELECT * FROM utilizador WHERE tipo != 'O'";
        $query .= $_SESSION['user']['tipo'] == 'A'? " AND tipo != 'A'": '';
        $query_run = mysqli_query($con, $query);
        
        
        if($_SESSION)
        if ($query_run) {
            $utilizadores = [];
            while ($row = $query_run->fetch_assoc()) {
                $utilizadores[] = $row;
            }
    
        }
    
        return $query_run;
    
    }
    
?>