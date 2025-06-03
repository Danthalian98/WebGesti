<?php
  session_start();
  
  require '../BDD/database.php';

  $url_base="http://localhost/ProyectoWEB1/ProyectoZVEZDA/admin";
  $url_imagen="http://localhost/ProyectoWEB1/ProyectoZVEZDA/IMG/Ceti.webp";
  $url_tope="http://localhost/ProyectoWEB1/ProyectoZVEZDA/index.php";
  
  if (!isset($_SESSION['user_tipo'])) {
    header("Location: ../index.php");
    exit();
  }else{
    $nombreUsuario = $_SESSION['user_nick'];
    $vistaNav=1;
  }

  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
  }

  $consulta1 = "SELECT * FROM tablero ORDER BY id DESC";
  $results1 = mysqli_query($mysqli, $consulta1);
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'PARTS/header.php' ?>
<body id="body">
  <?php require 'PARTS/navbar.php' ?>
  <br/>
  <div class="p-5 mb-4 bg-light rounded-3 ">
    <div class="container-fluid py-5 align-items-cente">
      <h1 class="display-5 fw-bold">Bienvenido</h1>
      <p class="col-md-8 fs-4">El sistema de administración de la página hará posible al administrador realizar algunas acciónes necesarias para cambiar elmentos del template principal</p>
      <!-- <button class="btn btn-primary btn-lg" type="button">Example button</button> -->
    </div>
  </div>
  <br>

  <?php require 'PARTS/footer.php' ?>

</body>
</html>