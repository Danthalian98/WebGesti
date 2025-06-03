<?php 
include("../admin/bd.php");
$url_index = "http://localhost/ProyectoWEB1/principal/index.php";
$url_about = "http://localhost/ProyectoWEB1/principal/about.php";
$url_login = "http://localhost/ProyectoWEB1/principal/login.php";
$url_signup = "http://localhost/ProyectoWEB1/principal/signup.php";
$url_css = "http://localhost/ProyectoWEB1/css/styles.css";
$url_vezda = "http://localhost/ProyectoWEB1/ProyectoZVEZDA/index.php";

//Url´s para las imagenes de los templates
$url_img = "http://localhost/ProyectoWEB1/assets/img";

//seleccionar registros de servicios
$sentencia=$conexion->prepare("SELECT * FROM tbl_servicios;");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar registros de portafolio
$sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio;");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar registros de entradas
$sentencia=$conexion->prepare("SELECT * FROM tbl_entradas;");
$sentencia->execute();
$lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//seleccionar registros de equipo
$sentencia=$conexion->prepare("SELECT * FROM tbl_equipo;");
$sentencia->execute();
$lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Proyecto</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?php echo $url_css?>" rel="stylesheet" />
</head>
<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="../assets/img/CAP4.svg" alt="..." /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_index?>#team">Equipo</a></li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Bienvenido</div>
            <div class="masthead-heading text-uppercase">Un gusto conocerte</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $url_vezda?>">Regresar</a>
        </div>
    </header>