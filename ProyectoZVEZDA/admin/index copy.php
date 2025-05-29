<?php
  session_start();
  
  require '../BDD/database.php';
  
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
  <div id="conten">
    <?php
    //while ($publicacion = mysqli_fetch_array($resultadosPaginados)) {
    ?>
        <div class="container p-2 my-3 border text-center">
        <?php echo '<h2 class="mb-3">' . $publicacion['titulo'] . '</h2>'; ?>
          <div class="p-0 my-3 border-0 d-flex align-items-center">
            <?php
            echo '<img src="IMG/' . $publicacion['idImagen'] . '" class="rounded" width="200" height="200">';
            echo '<p class="ml-3 mb-0 contenido-texto">' . $publicacion['contenido'] .'<br>';
            ?>
        </div></div>
    <?php    //}    ?>
  </div>
  <br>

  <?php require 'PARTS/footer.php' ?>

</body>
</html>