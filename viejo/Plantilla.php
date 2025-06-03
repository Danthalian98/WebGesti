<?php
  session_start();
  
  require 'BDD/database.php';

  if (!isset($_SESSION['user_nick'])) {
    $vistaNav=0;
  }else{
    $nombreUsuario = $_SESSION['user_nick'];
    $vistaNav=1;
  }

  if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
  }

  $busqueda = $_GET['buscar'];
  $consulta = "SELECT * FROM tablero WHERE contenido LIKE '%$busqueda%' OR titulo LIKE '%$busqueda%'";
  $result = mysqli_query($conn, $consulta);
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'PARTS/header.php' ?>
<body id="body">
  <?php require 'PARTS/navbar.php' ?>
      
    <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
    ?>
      <div class="container p-2 my-3 border text-center">
        <?php echo '<h2 class="mb-3">' . $row['titulo'] . '</h2>'; ?>
        <div class="p-0 my-3 border-0 d-flex align-items-center">
      <?php
        echo '<img src="IMG/'.$row['idImagen'].'" class="rounded" width="200" height="200">';        
        echo '<p class="ml-3 mb-0 contenido-texto">'.$row['contenido'].'<br>';
      ?>
      </div></div>
      <?php
        }
    } else {
        ?>
      <div class="container p-3 my-3 border d-flex align-items-center">
      <?php
        echo '<img src="IMG/BusquedaF.png" class="rounded" width="200" height="200">';        
        echo '<p class="ml-3 mb-0 contenido-texto">No se encontraron resultados.<br>';
      ?>
      </div>
    <?php  }    ?>

    <br>
    <?php require 'PARTS/icono.php' ?>
    <?php require 'PARTS/footer.php' ?>
    <?php require 'PARTS/scripts.php' ?>
    
</body>
</html>