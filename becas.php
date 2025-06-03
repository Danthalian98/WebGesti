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

  $consulta = "SELECT * FROM tbl_becas;";
  $lista_becas = mysqli_query($mysqli, $consulta);

?>
<!DOCTYPE html>
<html lang="en">
<?php require 'PARTS/header.php' ?>
<body id="body">
  <?php require 'PARTS/navbar.php' ?>
      
  <section class="py-5" id = "becas">
    <div class="container px-5 mb-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline contenido-texto">Becas:</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-8">
                <!-- Becas Card -->
                <?php foreach($lista_becas as $registros){ ?>
                    <div class="card overflow-hidden shadow rounded-4 border-0 mb-5 contenido-texto">
                        <div class="card-body p-0">
                            <div class="d-flex align-items-center">
                                <div class="p-5">
                                    <h2 class="fw-bolder"><?php echo $registros['nombre']?></h2>
                                    <p><?php echo $registros['descripcion']?></p>
                                    <a href="<?php echo $registros['link']?>">Consulte aqui...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>        
            </div>
        </div>
    </div>
</section>

    <br>
    <?php require 'PARTS/icono.php' ?>
    <?php require 'PARTS/footer.php' ?>
    <?php require 'PARTS/scripts.php' ?>
    
</body>
</html>