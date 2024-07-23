<?php

function GetEventosTable()
{

    require '../../bd/dbcon.php';

    $query = "SELECT * FROM evento Order By data_inicio DESC";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $eventos = [];
        while ($row = $query_run->fetch_assoc()) {
            $eventos[] = $row;
        }
    }

    return $query_run;

}



?>