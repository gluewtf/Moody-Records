<?php

session_start();
// $_SESSION['Cart'] = [];


require "./bd/dbcon.php";
require "./bd/vinys.php";
require "./bd/eventos.php";
require "./bd/noticia.php";
require "./bd/encomenda.php";
$_SESSION['backoffice'] = false;

$pag = 0;
if (isset($_GET['op']))
    $pag = $_GET['op'];

// Caso nao esteja numa etapa de uma encomenda entao renicia os passos da encomenda
if (!isset($_GET['x'])) {
    unset($_SESSION['encomenda']);
}

GetGenres($con);
GetVinysCart($con);
GetArtists($con);
// var_dump($_SESSION['user']);
?>

<!-- Modal -->

<!DOCTYPE html>


<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Moody Records</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-Lxgl+M9yeAXJd1ZxAbTqenJ49YBfP61U6dAhzI5Mnme5Y01XmXDmLBb6UNhD96aHgMcI71rqxlkaqMfF8doxJw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.datatables.net/v/bs4/dt-2.0.8/datatables.min.css" rel="stylesheet">



</head>

<body style="overflow-x: none">


    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Modal da Lista de desejos -->
    <div class="modal fade" id="WishList" tabindex="-1" role="dialog" aria-labelledby="WishListitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="WishListitle">Lista de Desejos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success d-none mt-5" id="adicionado_wishlist" role="alert">
                        aaa
                    </div>
                    <ul class="list-group" id="lista">
                        <?php GetVinysWishList($con) ?>
                    </ul>
                </div>

                <div class="modal-footer">
                    <div id="fBtns" style="display: none">
                        <button type="button" class="btn btn-secondary RemoveAll">Remover Tudo</button>
                        <button type="button" class="btn btn-primary AddAll">Adicionar todos ao carrinho</button>
                    </div>

                </div>
            </div>
        </div>
    </div>






    <!-- ##### Header Area Start ##### -->
    <header class="header-area" id="main">

        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="index.php" class="nav-brand mr-2 mb-1"><img src="img/core-img/logo.png" alt="">
                        </a>
                        

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="./">Inicio</a></li>
                                    <li><a href="./?op=1&page=1">Loja</a></li>
                                    <li><a href="#">Novos Vinis</a>
                                        <ul class="dropdown">

                                            <?php foreach ($_SESSION['genres'] as $genero): ?>
                                                <li><a class="genre-link-nav-new" href="./?op=1&page=1">
                                                        <?= $genero['nome'] ?>

                                                    </a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <li><a href='./?op=1&page=1' class="SalesBtn">Saldos</a></li>
                                    <li><a href="./?op=2">Eventos</a></li>
                                    <li><a href="./?op=3&page=1">Noticias</a></li>
                                    <li><a href="./?op=4">Contacto</a></li>

                                </ul>
                                <input class="form-control search-bar me-2 " type="search" id='searchInput'
                                    placeholder="Procurar" aria-label="Search" style="margin-left: 60px">

                                <div class="SearchBtn">
                                    <i class="bi bi-search ml-2"></i>
                                </div>



                                <div class="login-register-cart-button d-flex align-items-center">
                                    <?php
                                    if (empty($_SESSION['user'])) { //se nao estiver utilizador logado então vai aparecer a opçao login no menu
                                        ?>

                                        <div class="login-register-btn" style="margin-right: 30%">
                                            <a href="index.php?op=5" id="loginBtn">Login</a>
                                        </div>
                                        <?php
                                    } else { ?>
                                        <!-- Caso o utilizador esteja logado entao vai aparecer o seu nick -->
                                        <div class="login-register-btn  dropdown-toggle" style="margin-right: 30%"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <a id="loginBtn"><?= $_SESSION['user']['login'] ?></a>
                                        </div>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="index.php?op=6">Conta</a>
                                            <a class="dropdown-item" href="pag/Login/logout.php">Logout</a>
                                            <!-- Caso o utilizador seja algum destes tipos, tem acesso ao backoffice -->
                                            <?php if ($_SESSION['user']['tipo'] == 'A' || $_SESSION['user']['tipo'] == 'O' || $_SESSION['user']['tipo'] == 'G' || $_SESSION['user']['tipo'] == 'N') {
                                                ?>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="./pag/administracao/index.php">Administração</a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                    }
                                    ?>



                                    <!-- WishList Button -->
                                    <div class="btns mr-10 ">
                                        <p><span class="icon-heart BtnWishList"></span></p>
                                    </div>



                                    <!-- Cart Button -->
                                    <div class="btns">
                                        <a href="index.php?op=8">
                                            <p><span class="icon-shopping-cart"></p></span>
                                        </a>
                                        <!-- Calculcar a quantidade total de vinis no carrinho -->
                                        <?php if (isset($_SESSION['Cart'])) {
                                            $count = 0;
                                            foreach ($_SESSION['Cart'] as $value) {
                                                $count += $value['Qtd'];
                                            }
                                        } ?>
                                        <p><span id="cartCount" class="quantity"><?php if ($count > 0) {
                                            echo $count;
                                        } else {
                                            echo 0;
                                        } ?></span>
                                        <p>
                                    </div>


                                </div>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->


    <div id="content">

        <?php

        switch ($pag) {
            case 1:
                require "pag/Vinyl/store.php";
                break;
            case 2:
                require "pag/event.php";
                break;
            case 3:
                require "pag/noticias/noticias.php";
                break;
            case 12:
                require "pag/noticias/view-noticia.php";
                break;
            case 4:
                require "pag/contacto/contact.php";
                break;
            case 5:
                require "pag/Login/login.php";
                break;
            case 11:
                require "pag/Login/sign-up-form.php";
                break;
            case 6:
                require "pag/User/user-management.php";
                break;
            case 7:
                require "pag/Vinyl/view-vinyl.php";
                break;
            case 8:
                require "pag/Checkout/shopping-cart.php";
                break;
            case 9:
                require "pag/Checkout/checkout.php";
                break;
            case 10:
                require "pag/Checkout/order.php";
                break;
            default:
                require "pag/home.php";
        }

        ?>
    </div>

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <a href="#"><img src="img/core-img/logo.png" width="200" height="21"  alt=""></a>
                    <p class="copywrite-text"><a
                            href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            <script>document.write(new Date().getFullYear());</script> Todos os direitos Reservados | Um
                            servico <i class="fa fa-heart-o" aria-hidden="true"></i> de <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="./?op=1&page=1">Loja</a></li>
                            <li><a href="index.php?op=2">Eventos</a></li>
                            <li><a href="./?op=3&page=1">Noticias</a></li>
                            <li><a href="index.php?op=4">Contacto</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->


    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>


 
   <script src="https://cdn.datatables.net/v/bs4/dt-2.0.8/datatables.min.js"></script> 
    <script src="https://kit.fontawesome.com/51b1ed5cf2.js" crossorigin="anonymous"></script>
    <script src="js/utilizadores/utilizadores.js" type="text/javascript"></script>
    <script src="js/vinil/vinil.js" type="text/javascript"></script>
    <script src="js/store/store.js" type="text/javascript"></script>
    <script src="js/noticia/noticia.js" type="text/javascript"></script>
    <script src="js/checkout/checkout.js" type="text/javascript"></script>
    <script src="js/encomenda/encomenda.js" type="text/javascript"></script>
    <script src="js/contacto/contacto.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>






</body>


</html>
