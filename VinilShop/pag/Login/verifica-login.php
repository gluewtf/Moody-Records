<?php

    $path = $_SESSION['backoffice'] == false? ".": "../.." ; //verificar se o utilizador esta no backoffice
    if(empty($_SESSION['user'])){

        echo "<script> window.location.href = '" . $path . "/?op=5';</script>";
        exit();
    }
?>