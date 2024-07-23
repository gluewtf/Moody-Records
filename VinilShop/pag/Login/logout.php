<?php
    session_start();
    // session_destroy();
    unset($_SESSION['Wishlist']);
    unset($_SESSION['user']);
    header('Location: ../../');
?>