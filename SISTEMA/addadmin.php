<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Registro-add Administrador </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
<?php 
     session_start();
     require('../connect.php');
           $dni= $_SESSION['DNI'];
           $pass=$_SESSION['PASS'];
           $tipo= $_SESSION['TIPO'];
    
           $consult="SELECT ID_USER,DNI,PASSWORD,TIPO,NOMBRE,APELLIDO FROM USUARIO WHERE DNI='$dni' AND PASSWORD='$pass' AND TIPO='$tipo'";
           $res=mysqli_query($con,$consult);

           $dato=mysqli_fetch_array($res);

           $nombre=$dato['NOMBRE'];
           $ape=$dato['APELLIDO'];
            $rol='';
           switch($tipo){
                case'alu': $rol='Estudiante'; 
                          break;
                case'profe': $rol='Docente'; 
                          break;
                case'direc': $rol='Director'; 
                          break;
                case'admi': $rol='Administrador'; 
                          break;
                
           }
    ?>
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="inicio.php" class="logo d-flex align-items-center">
    <img src="assets/img/logo1d.png" alt="">
    <span class="d-none d-lg-block">Sistema Academico</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->



<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">


    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have 4 new notifications
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
          <a href="#">Show all notifications</a>
        </li>

      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
        <li class="dropdown-header">
          You have 3 new messages
          <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Profesora de comunicacion</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>4 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
            <div>
              <h4>Auxiliar</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>6 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="message-item">
          <a href="#">
            <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
            <div>
              <h4>director David Muldon</h4>
              <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
              <p>8 hrs. ago</p>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li class="dropdown-footer">
          <a href="#">Show all messages</a>
        </li>

      </ul><!-- End Messages Dropdown Items -->

    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo substr($nombre,0,1).".".$ape; ?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6> <?php echo $nombre." ".$ape; ?></h6>
          <span><?php echo $rol; ?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="perfil.php">
            <i class="bi bi-person"></i>
            <span>Mi perfil</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>


        <li>
          <a class="dropdown-item d-flex align-items-center" href="../index.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Cerrar</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<!-- DASHBOARD-->
  <li class="nav-item">
    <a class="nav-link collapsed" href="inicio.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <?php if($tipo=='admi'){ ?> 
  <!-- REGISTRO-->
  <li class="nav-item">
    <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Registro</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse show " data-bs-parent="#sidebar-nav">
      <li>
        <a href="addalumno.php" >
          <i class="bi bi-circle"></i><span>Registrar Alumno</span>
        </a>
      </li>
      <li>
        <a href="addprofe.php" >
          <i class="bi bi-circle"></i><span>Registrar Docente</span>
        </a>
      </li>
      <li>
        <a href="adddirec.php">
          <i class="bi bi-circle"></i><span>Registrar Director </span>
        </a>
      </li>
      <li>
        <a href="addcurso.php">
          <i class="bi bi-circle"></i><span>Registrar Cursos</span>
        </a>
      </li>
      <li>
        <a href="addsalon.php">
          <i class="bi bi-circle"></i><span>Gestionar Salones</span>
        </a>
      </li>
      <li>
        <a href="addadmin.php" class="active">
          <i class="bi bi-circle"></i><span>Gestionar Administrador</span>
        </a>
      </li>
    </ul>

  </li><!-- End Forms Nav -->

  <!-- TABLAS-->
  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Tablas</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse  " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables.php" >
              <i class="bi bi-circle"></i><span>Alumnos</span>
            </a>
          </li>
          <li>
            <a href="tablesprof.php">
              <i class="bi bi-circle"></i><span>Docentes</span>
            </a>
          </li>
          <li>
            <a href="tablesadmi.php">
              <i class="bi bi-circle"></i><span>Administrativos</span>
            </a>
          </li>

          
        </ul>
      </li><!-- End Tables Nav -->
      
  <?php }
  if($tipo=='alu'){
  ?>
  <!-- CLASE-->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Clase</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="regcurso.php">
          <i class="bi bi-circle"></i><span>Cursos</span>
        </a>
      </li>
      
    </ul>

  </li><!-- End Forms Nav -->

  <!-- NOTAS-->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Notas</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="viewnotas.php">
          <i class="bi bi-circle"></i><span>General</span>
        </a>
      </li>
    
    </ul>
  </li><!-- End Tables Nav -->
<?php } ?>


  <li class="nav-heading">Paginas</li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="perfil.php">
      <i class="bi bi-person"></i>
      <span>Perfil</span>
    </a>
  </li><!-- End Profile Page Nav -->


  <li class="nav-item">
    <a class="nav-link collapsed" href="contacto.php">
      <i class="bi bi-envelope"></i>
      <span>Contacto</span>
    </a>
  </li><!-- End Contact Page Nav -->



</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
  <h1>Registrar Administrador</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
      <li class="breadcrumb-item">Registro</li>
      <li class="breadcrumb-item active">Administrador</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section">
  <div class="row">
   
    <div class="col-lg-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ingresa los datos del Administrador</h5>

          <!-- Floating Labels Form -->
          <form class="row g-3" method="post">
            <div class="col-md-12">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingName" placeholder="Name"  name="nombre"require>
                <label for="floatingName">Nombres</label>
              </div>
             
            </div>
            <div class="col-md-12">
               <div class="form-floating">
                 <input type="text" class="form-control" id="floatingName" placeholder="lastName" name="apellido"require>
                 <label for="floatingName">Apellidos</label>
               </div>             
            </div>
           
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" id="floatingEmail" placeholder="dni" name="dni"require>
                <label for="floatingEmail">DNI</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass" require>
                <label for="floatingPassword">Contraseña</label>
              </div>
            </div>
   
            <div class="text-center">
              <button type="submit" class="btn btn-primary" name="enviar">Registrar</button>
              <button type="reset" class="btn btn-secondary" name="reset">Cancelar</button>
            </div>
          </form><!-- End floating Labels Form -->

        </div>
        <?php include('php/addadministrador.php') ?>
      </div>

    </div>
  </div>
</section>

</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Simon corp</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>