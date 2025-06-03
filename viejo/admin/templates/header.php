<?php 
  session_start();
  
  $url_base="http://localhost/ProyectoWEB1/ProyectoZVEZDA/admin";
  $url_imagen="http://localhost/ProyectoWEB1/ProyectoZVEZDA/IMG/Ceti.webp";
  $url_tope="http://localhost/ProyectoWEB1/ProyectoZVEZDA/index.php";

  
    $nombreUsuario = $_SESSION['user_nick'];
    $vistaNav=1;
  

  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:".$url_tope);
    exit();
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
  <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <a class="navbar-brand" href="<?php echo $url_tope;?>">
    <img src="<?php echo $url_imagen;?>" alt="logo" style="width:40px;">
  </a>
  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav ml-0">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base;?>">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base;?>/secciones/informacion/">Información de Carreras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base;?>/secciones/comentarios/">Comentarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base;?>/secciones/becas/">Recursos Financieros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_base;?>/secciones/survey/">Encuestas y Formularios</a>
      </li>
    </ul>

    <?php  echo '
      <div class="dropdown ml-auto mr-4">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            '.$nombreUsuario.'
        </button>
        <div class="dropdown-menu p-0 align-items-center" style="min-width: 0;">
          <form method="post">
              <button type="submit" name="logout" class="btn btn-primary">Cerrar&nbsp;Sesión</button>
          </form>
        </div>
      </div>';
    ?>
</nav>   
  </header>
  <main class = "container">
  <br/>