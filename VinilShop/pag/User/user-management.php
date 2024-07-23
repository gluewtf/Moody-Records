<?php
    require 'pag/Login/verifica-login.php'
?>

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <h2>Conta</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

     <!-- ##### Account management Area Start ##### -->
     <section class="events-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a  class="nav-link active btn oneMusic-btn m-2" aria-current="page" href="index.php?op=6&x=1">Informacao Pessoal</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn oneMusic-btn m-2" aria-current="page" href="index.php?op=6&x=2">Seguranca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn oneMusic-btn m-2" aria-current="page" href="index.php?op=6&x=3">Pagamento</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link btn oneMusic-btn m-2" href="index.php?op=6&x=4">Encomendas</a>
                        </li>
                    </ul>
                </div>
            <?php 
                
        //Sidebar
        if(isset($_GET['x'])) {
            $x = $_GET['x'];
            switch ($x) {
                case 1:
                    require "personal-information.php";
                    break;
                case 2:
                    require "security.php";
                    break;
                case 3:
                    require "payment.php";
                    break;
                case 4:
                    require "orders.php";
                    break;
            }
        }
        else
        {
        ?>
                    <div class='col-md-9'>
                        <div id= 'card1' class='card'>
                            <div class='card-body'>
                                <p> <?= $_SESSION['user']['nome']?> <?= $_SESSION['user']['apelido']?> </p>
                                <p><?= $_SESSION['user']['email']?></p>
                                <p><?= $_SESSION['user']['telemovel']?></p>
                                <p><?= $_SESSION['user']['pais']?> , <?= $_SESSION['user']['distrito']?>, <?= $_SESSION['user']['cidade']?></p>
                            </div>
                        </div>
                    </div> 

        <?php
        }
        ?>
        

                

        </div> 
    </div>
</section>


