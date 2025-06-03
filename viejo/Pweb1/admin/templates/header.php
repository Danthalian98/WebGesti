<?php 
  session_start();
  
  $url_base="http://localhost/ProyectoWEB1/admin";
  $url_imagen="http://localhost/ProyectoWEB1/assets/img/Ceti.webp";

  if(!isset($_SESSION['usuario'])){
    header("Location:".$url_base."/login.php");
  }

?><!--Si quieres cambiar de servidor se tiene que cambiar el link-->
<!doctype html>
<html lang="en">
<head>
  <title>Administrador del sitio web</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>    
</head>

<body>
  <header>
    <!-- <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>/secciones/servicios/">Servicios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>/secciones/portafolio/">Portafolio</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>/secciones/entradas/">Entradas</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>/secciones/equipo/">Equipo</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>/secciones/usuarios/">Usuarios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>/cerrar.php">Cerrar sesión</a>
        </div>
    </nav> -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="index.php">
          <img src="<?php echo $url_imagen;?>" alt="logo" style="width:40px;">
        </a>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <div class="dropdown show">
                    <!-- para dar el efecto de la clase nav-link es necesario agregarlo junto a las demas clases eliminando el diseño del boton inicial -->
                    <a class="btn nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Template Principal
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/servicios/">Servicios</a>
                      <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/portafolio/">Carreras</a>
                      <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/entradas/">Entradas</a>
                      <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/equipo/">Equipo</a>
                    </div>
                  </div>
                </li>
                <div class="dropdown show">
                    <!-- para dar el efecto de la clase nav-link es necesario agregarlo junto a las demas clases eliminando el diseño del boton inicial -->
                    <a class="btn nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Template Secundario
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/informacion/">Informacion de carreras</a>
                    <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/survey/">Encuestas y Formularios</a>
                    <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/becas/">Becas y apoyos</a>
                    <a class="dropdown-item" href="<?php echo $url_base;?>/secciones/experiencias/">Experiencias</a>
                  </div>
                </div>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $url_base;?>/cerrar.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
    </nav>    
  </header>
  <main class = "container">
  <br/>