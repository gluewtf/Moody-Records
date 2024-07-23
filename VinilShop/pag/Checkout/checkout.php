<?php
   require 'pag/Login/verifica-login.php';
   if(!isset($_SESSION['encomenda'])){
    $_SESSION['encomenda'] = $_SESSION['user'];
    } ?>
    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
    </section>



</div>

<?php 
                

        if(isset($_GET['x'])) {
            $x = $_GET['x'];
            switch ($x) {
                case 1:
                    require "checkout-1.php";
                    break;
                case 2:
                    require "checkout-2.php";
                    break;
                case 3:
                    require "checkout-3.php";
                    break;
            }
        }
?>

</div>