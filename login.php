<?php
  session_start();
  
  require 'BDD/database.php';

  $vistaNav=0;
  
  if (isset($_GET['error'])) {
    $error_message = $_GET['error'];
    echo '<div class="alert alert-warning alert-dismissible mb-0">
    <button type="button" class="close" data-dismiss="alert">&times;</button><strong>ERROR!</strong> ' . $error_message .'</div>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'PARTS/header.php' ?>
<body id="body">
  <?php require 'PARTS/navbar.php' ?>
      
    <?php
    if (isset($_GET['action'])) {
      $action = $_GET['action'];
    
      if ($action === 'register') {
        include 'PARTS/registrarS.php';
      } elseif ($action === 'login') {
        include 'PARTS/iniciarS.php';
      } 
    } 
    
    ?>

    <br>
    <?php require 'PARTS/icono.php' ?>
    <?php require 'PARTS/footer.php' ?>
    <?php require 'PARTS/scripts.php' ?>
    
</body>
</html>