<?php

function GetArtistas()
{

    require '../../bd/dbcon.php';

    $query = "SELECT * FROM artista Order By Nome";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $artistas = [];
        while ($row = $query_run->fetch_assoc()) {
            $artistas[] = $row;
        }

        $_SESSION['artistas'] = $artistas;
    }

    return $query_run;

}



?>