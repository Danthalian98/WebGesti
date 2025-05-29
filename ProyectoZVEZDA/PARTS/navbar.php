<?php
$url_index = "http://localhost/ProyectoWEB1/principal/index.php";
?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
  <a class="navbar-brand" href="index.php">
    <img src="IMG/Ceti.webp" alt="logo" style="width:40px;">
  </a>
  <div class="collapse navbar-collapse" id="navb">
    <ul class="navbar-nav ml-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="infoMateria.php">Información de Carreras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="comentarios.php">Comentarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="becas.php">Recursos Financieros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $url_index?>">Nosotros</a>
      </li>
    </ul>

    <?php
    if ($vistaNav===0) {
      echo '<button type="button" class="btn ml-0 text-secondary contenido-texto p-0" data-toggle="modal" data-target="#Aviso">Pruebas de Orientación</button>';
       echo ' <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="login.php?action=login">Iniciar sesión</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php?action=register">Registrarme</a>
                </li>
              </ul>';
    }
    if ($vistaNav===1){
      echo '<ul class="navbar-nav">
              <li class="nav-item ">
                <a class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLSegNNTIaXWU50vo5_zQwSLkrdD9E6fucFF7xa9OjVNelcGrgA/viewform?usp=sf_link">Pruebas de Orientación</a>
              </li>
            </ul>';
      echo '<div class="dropdown ml-auto">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                '.$nombreUsuario.'
              </button>
              <div class="dropdown-menu p-0 align-items-center" style="min-width: 0;">
                <form method="post">
                    <button type="submit" name="logout" class="btn btn-primary">Cerrar&nbsp;Sesión</button>
                </form>
              </div>
            </div>';
    }
    
    ?>

    <form class="form-inline my-2 my-lg-0 ml-2" action="busqueda.php" method="GET">
      <input class="form-control mr-sm-2" type="text" name="buscar" placeholder="">
      <button class="btn btn-success" type="submit">Buscar</button>
    </form>
  </div>
</nav>
<div class="modal" id="Aviso">
    <div class="modal-dialog">
      <div class="modal-content">      
        <div class="modal-header">
          <h4 class="modal-title">Requisitos de uso:</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <p>Necesita estar logeado para poder acceder a las pruebas de orientación</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
        </div>
    </div>
</div>