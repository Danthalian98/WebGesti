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
        <a class="nav-link" href="secciones/informacion/index.php">Información de Carreras</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="secciones/comentarios/">Comentarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="secciones/becas/">Recursos Financieros</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="secciones/survey/">Encuestas y Formularios</a>
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
