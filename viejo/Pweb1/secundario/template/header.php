<?php 
    include("../admin/bd.php");
    $url_index = "http://localhost/ProyectoWEB1/secundario/index.php";
    $url_survey = "http://localhost/ProyectoWEB1/secundario/survey.php";
    $url_becas = "http://localhost/ProyectoWEB1/secundario/becas.php";
    $url_testimonio = "http://localhost/ProyectoWEB1/secundario/";
    $url_perfil = "http://localhost/ProyectoWEB1/secundario/";
    $url_css = "http://localhost/ProyectoWEB1/css/styles.css";

    //seleccionar registros de informacion
    $sentencia=$conexion->prepare("SELECT * FROM tbl_informacion;");
    $sentencia->execute();
    $lista_informacion=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //seleccionar registros de materias
    $sentencia=$conexion->prepare("SELECT * FROM tbl_materias;");
    $sentencia->execute();
    $lista_materias=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //seleccionar registros de becas
    $sentencia=$conexion->prepare("SELECT * FROM tbl_becas;");
    $sentencia->execute();
    $lista_becas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

    //seleccionar registros de survey
    $sentencia=$conexion->prepare("SELECT * FROM tbl_survey;");
    $sentencia->execute();
    $lista_survey=$sentencia->fetchAll(PDO::FETCH_ASSOC);    

    // Devolver datos como respuesta JSON esta se usara por medio de un script que sera llamado en el template de footer.php
    $response = array('informacion' => $lista_informacion, 'materias' => $lista_materias);
    // header('Content-Type: application/json');
    // echo json_encode($response);
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
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_index?>#informacion">Informacion</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_survey?>#survey">Encuestas</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_becas?>#becas">Apoyos Economicos</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_about?>">Testimonios</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $url_perfil?>">Perfil</a></li>
                    <form class="my-2 my-lg-0" action="/action_page.php">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-success" type="submit">Buscar</button>
                            </div>
                        </div>
                    </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Masthead-->
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">Bienvenido</div>
            <div class="masthead-heading text-uppercase">Cristopher Emanuel</div>
            <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $url_index?>#services">Conoce más</a>
        </div>
    </header>