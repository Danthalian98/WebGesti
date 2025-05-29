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

  $consulta = "SELECT * FROM tbl_informacion;";
  $lista_informacion = mysqli_query($mysqli, $consulta);
  $consulta = "SELECT * FROM tbl_materias;";
  $lista_materias = mysqli_query($mysqli, $consulta);
?>
<!DOCTYPE html>
<html lang="en">
<?php require 'PARTS/header.php' ?>
<body id="body">
  <?php require 'PARTS/navbar.php' ?>
      
  <section class="py-5" id = "informacion">
    <div class="container px-5 contenido-texto">
        <h2 class="fw-bolder fs-5 mb-4 contenido-texto">Carreras y lo que deberías saber</h2>
        <div class="row gx-5">
            <?php foreach($lista_informacion as $registros){?>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">                            
                        <div class="card-body p-4">
                            <a class="text-decoration-none link-dark stretched-link" href="materia.php?txtID=<?php echo $registros['ID'];?>"><div class="h5 card-title mb-3 contenido-texto"><?php echo $registros['nombre'] ?></div></a>
                            <p class="card-text mb-0"><?php echo $registros['descripcion'] ?></p>                                
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small">
                                        <div class="fw-bold">Costos aproximados durante la carrera (incluyendo inscripciones y pagos):<div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo $registros['costos'] ?></div></div>
                                        <div class="text-muted">Competencias: &middot; <?php echo $registros['competencias'] ?></div>
                                        <div class="text-muted">Oportunidades laborales: &middot; <?php echo $registros['oportunidades'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            <?php }?>
        </div>
    </div>
</section>

    <br>
    <?php require 'PARTS/icono.php' ?>
    <?php require 'PARTS/footer.php' ?>
    <?php require 'PARTS/scripts.php' ?>
    
</body>
</html>