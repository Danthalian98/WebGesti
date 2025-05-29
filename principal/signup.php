<?php 
  include("template/header.php");
  session_start();
  if($_POST){
    include("./bd.php"); // archivo de conexion
    $usuario = (isset($_POST['usuario']))?$_POST['usuario']:"";
    $password = (isset($_POST['password']))?$_POST['password']:"";
    $sentencia=$conexion->prepare("SELECT *, count(*) as n_usuario 
    FROM tbl_usuarios WHERE usuario = :usuario AND password = :password");
    //donde encuentres usuario pon la varible $usuario en la sentencia de arriba
    $sentencia->bindParam(":usuario",$usuario);
    //donde encuentres password pon la varible $password en la sentencia de arriba
    $sentencia->bindParam(":password",$password);
    //Ejecutar
    $sentencia->execute();
    $lista_usuarios=$sentencia->fetch(PDO::FETCH_LAZY);
    if($lista_usuarios['n_usuario']>0){
      print_r("el usuario y contraseña existe");
      $_SESSION['usuario'] = $lista_usuarios['usuario'];
      $_SESSION['logueado'] = true;
      header("Location:index.php");
    }else{
      $mensaje = "Error: El usuario o la contraseña No existe";
    }
  }
?>
      <!-- Login -->
      <section class="py-5" id="signup">
          <div class="container px-5">
              <!-- Inicio del form-->
              <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                  <div class="text-center mb-5">
                      <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                      <h1 class="fw-bolder">Ingrese sus datos</h1>
                      <p class="lead fw-normal text-muted mb-0">Cualquier inconveniente pongase en contacto</p>
                  </div>
                  <div class="row gx-5 justify-content-center">
                      <div class="col-lg-8 col-xl-6">
                          <form id="contactForm" action="" method="post">
                              <!-- User-->
                              <div class="form-floating mb-3">
                                  <input class="form-control" id="user" type="text" placeholder="Enter your user..." data-sb-validations="required" />
                                  <label for="user">User:</label>
                                  <div class="invalid-feedback" data-sb-feedback="user:required">El usuario es requerido</div>
                              </div>
                              <!-- Password-->
                              <div class="form-floating mb-3">
                                  <input class="form-control" id="password" type="password" placeholder="user@example.com" data-sb-validations="required,password" />
                                  <label for="password">Contraseña:</label>
                                  <div class="invalid-feedback" data-sb-feedback="password:required">La contraseña es requerida</div>                                  
                              </div>
                              <!-- Submit -->
                              <div class="d-grid"><button class="btn btn-primary" id="submitButton" type="submit">Ingresar</button></div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
<?php include("template/footer.php");?>