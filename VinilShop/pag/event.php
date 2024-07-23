<?php
    error_reporting(E_ERROR | E_PARSE);
    header('Location: index.php?op=2');
?>



    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Veja as Novidades</p>
            <h2>Eventos</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="row">

                
                <?php
                    GetEventos($con);
                ?>                

               
            </div>

        </div>
    </section>
    <!-- ##### Events Area End ##### -->
