<?php
// Conexao á base de dados
$con = mysqli_connect("localhost","root","","pap_igor");

// Caso erre a conexao mostra o erro 
if(!$con){
    die('Conection Failed'.msqli_connect_error());
}
mysqli_set_charset($con, "utf8");

?>