<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Moody Records</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../img/core-img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <!-- <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<?php
session_start();
//Todas as funcoes
require '../../bd/dbcon.php';
require './pag/Vinis/Fvinis.php';
require './pag/artistas/Fartistas.php';
require './pag/generos/Fgeneros.php';
require './pag/gravadoras/Fgravadoras.php';
require './pag/imagem-principal/Fimagem-principal.php';
require './pag/noticias/Fnoticias.php';
require './pag/eventos/Feventos.php';
require './pag/contacto/Fcontacto.php';
require './pag/metodo-envio/Fmetodo-envio.php';
require './pag/metodo-pagamento/Fmetodo-pagamento.php';
require './pag/utilizadores/Futilizadores.php';
require './pag/encomendas/Fencomendas.php';
require './pag/dashboard/Fdashboard.php';
GetArtistas();
$_SESSION['backoffice'] = true; //O utilizador esta no backoffice
require '../Login/verifica-login.php';
$pag = 0;
if (isset($_GET['op']))
  $pag = $_GET['op'];



?>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="../../" class="logo d-flex align-items-center">
        <img src="../../img/core-img/favicon.ico" alt="">
        <span class="d-none d-lg-block">Moody Records</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->


    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

<!--  -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?= $_SESSION["user"]['login']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?= $_SESSION['user']['nome'] ?></h6>
              <span><?= $_SESSION["user"]["login"] ?></span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="../../pag/Login/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->



  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed " href="../../">
          <i class="bi bi-shop"></i><span>Loja</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed " href="./">
          <i class="bi bi-grid"></i><span>Painel de controlo</span>
        </a>
      </li>

      <li class="nav-heading">Tabelas</li>

      <?php if ($_SESSION['user']['tipo'] != 'N') { ?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#manuntencao" data-bs-toggle="collapse" href="#">
          <i class="bi bi-record-circle-fill"></i><span>Manutenção de Vinis</span><i
            class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="manuntencao" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link collapsed " href="index.php?op=1">
              <span>Vinis</span>
            </a>
          </li>

          <li>
            <a class="nav-link collapsed " href="index.php?op=2">
              <span>Artistas</span>
            </a>
          </li>

          <li>
            <a class="nav-link collapsed " href="index.php?op=3">
              <span>Generos</span>
            </a>
          </li>

          <li>
            <a class="nav-link collapsed " href="index.php?op=4">
              <span>Gravadoras</span>
            </a>
          </li>

        </ul>
      </li>
        <?php }?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#configuracoes" data-bs-toggle="collapse" href="#">
          <i class="ri-settings-4-fill"></i><span>Configuracões</span><i
            class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="configuracoes" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <?php if ($_SESSION['user']['tipo'] != 'N') { ?>
          <li>
            <a class="nav-link collapsed " href="index.php?op=5">
              <span>Imagem Principal</span>
            </a>
          </li>
          <?php }?>
          <li>
            <a class="nav-link collapsed " href="index.php?op=6">
              <span>Noticias</span>
            </a>
          </li>
          <?php if ($_SESSION['user']['tipo'] != 'N') { ?>
          <li>
            <a class="nav-link collapsed " href="index.php?op=7">
              <span>Eventos</span>
            </a>
          </li>

          <li>
            <a class="nav-link collapsed" href="index.php?op=8">
              <span>Contacto</span>
            </a>
          </li>

          <li>
            <a class="nav-link collapsed " href="index.php?op=9">
              <span>Metodos de Envio</span>
            </a>
          </li>

          <li>
            <a class="nav-link collapsed " href="index.php?op=10">
              <span>Metodos de Pagamento</span>
            </a>
          </li>

        </ul>
      </li>
      <?php }?>
      <?php if ($_SESSION['user']['tipo'] == 'A' || $_SESSION['user']['tipo'] == 'O') { ?>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#manuntencao-utilizadores" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lock"></i></i><span>Administração</span><i
              class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="manuntencao-utilizadores" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a class="nav-link collapsed " href="index.php?op=11">
                <span>Utilizadores</span>
              </a>
            </li>

            <li>
              <a class="nav-link collapsed " href="index.php?op=12">
                <span>Encomendas</span>
              </a>
            </li>
          </ul>
        </li>
       <?php } ?>
      
      </div>


      </div>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <?php

    switch ($pag) {
      case 1:
        require "./pag/Vinis/vinis.php";
        break;
      case 2:
        require "./pag/artistas/artistas.php";
        break;
      case 3:
        require "./pag/generos/generos.php";
        break;
      case 4:
        require "./pag/gravadoras/gravadoras.php";
        break;
      case 5:
        require "./pag/imagem-principal/imagem-principal.php";
        break;
      case 6:
        require "./pag/noticias/noticias.php";
        break;
      case 7:
        require "./pag/Eventos/eventos.php";
        break;
      case 8:
        require "./pag/contacto/contacto.php";
        break;
      case 9:
        require "./pag/metodo-envio/metodo-envio.php";
        break;
      case 10:
        require "./pag/metodo-pagamento/metodo-pagamento.php";
        break;
      case 11:
        require "./pag/utilizadores/utilizadores.php";
        break;
      case 12:
        require "./pag/encomendas/encomendas.php";
        break;
      default:
        require "./pag/dashboard/dashboard.php";
    }

    ?>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Moody  Records</span></strong>. Todos os Direitos Reservados
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <!-- Dependencias -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://kit.fontawesome.com/51b1ed5cf2.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script src="https://cdn.datatables.net/v/bs5/dt-2.0.8/datatables.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Tabelas -->
  <script src="pag/Vinis/js/vinis.js" type="text/javascript"></script>
  <script src="pag/artistas/js/artistas.js" type="text/javascript"></script>
  <script src="pag/generos/js/generos.js" type="text/javascript"></script>
  <script src="pag/gravadoras/js/gravadoras.js" type="text/javascript"></script>
  <script src="pag/imagem-principal/js/imagem-principal.js" type="text/javascript"></script>
  <script src="pag/noticias/js/noticias.js" type="text/javascript"></script>
  <script src="pag/eventos/js/eventos.js" type="text/javascript"></script>
  <script src="pag/contacto/js/contacto.js" type="text/javascript"></script>
  <script src="pag/metodo-envio/js/metodo-envio.js" type="text/javascript"></script>
  <script src="pag/metodo-pagamento/js/metodo-pagamento.js" type="text/javascript"></script>
  <script src="pag/utilizadores/js/utilizadores.js" type="text/javascript"></script>
  <script src="pag/encomendas/js/encomendas.js" type="text/javascript"></script>
  <script src="pag/dashboard/js/dashboard.js" type="text/javascript"></script>



</body>

</html>