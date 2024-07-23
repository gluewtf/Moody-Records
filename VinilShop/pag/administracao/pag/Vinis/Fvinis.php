<?php

//Pega os vinis
function GetVinis()
{

    require '../../bd/dbcon.php';

    $query = "SELECT v.*, img.imagem AS imagem, a.artista_id as artista_id, a.nome AS artista, g.nome as gravadora,  gn.nome as genero
    FROM vinil v
    LEFT JOIN imagem_vinil img ON v.vinil_id = img.vinil_id
    LEFT JOIN artista a ON v.artista_id = a.Artista_id
    LEFT JOIN gravadora g ON v.gravadora_id = g.gravadora_id
    LEFT JOIN genero gn ON v.genero_id = gn.genero_id
    WHERE img.descricao = 'I'";
    $query_run = mysqli_query($con, $query);

    return $query_run;

}


//Pega as gravadoras
function GetGravadoras()
{
    require '../../bd/dbcon.php';
    $query = "SELECT * FROM gravadora";
    $result = mysqli_query($con, $query);
    if ($result) {
        $gravadoras = [];
        while ($row = $result->fetch_assoc()) {
            $gravadoras[] = $row;
        }

        $_SESSION['gravadoras'] = $gravadoras;
    }
}


?>