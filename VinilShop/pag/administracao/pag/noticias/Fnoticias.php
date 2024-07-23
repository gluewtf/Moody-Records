<?php

    //Pega as noticias
    function GetNoticiasTable()
    {
    
        require '../../bd/dbcon.php';
    
        $query = "SELECT n.*, u.nome as autor_nome, u.apelido as autor_apelido 
                  FROM noticia n
                  LEFT JOIN utilizador u on u.utilizador_id = n.autor_id ";
        $query_run = mysqli_query($con, $query);
    
        if ($query_run) {
            $noticias = [];
            while ($row = $query_run->fetch_assoc()) {
                $noticias[] = $row;
            }
    
        }
    
        return $query_run;
    
    }
    
?>