<?php 
    include("../../bd.php");
    if($_POST){
        $usuario = (isset($_POST['usuario']))?$_POST['usuario']:"";
        $password = (isset($_POST['password']))?$_POST['password']:"";
        $correo = (isset($_POST['correo']))?$_POST['correo']:"";

        // Definir 
        $sentencia=$conexion->prepare("INSERT INTO tbl_usuarios (ID, usuario, password, correo) 
        VALUES (NULL, :usuario, :password, :correo);");

        //donde encuentres usuario pon la varible $usuario en la sentencia de arriba
        $sentencia->bindParam(":usuario",$usuario);
        //donde encuentres password pon la varible $password en la sentencia de arriba
        $sentencia->bindParam(":password",$password);
        //donde encuentres correo pon la varible $correo en la sentencia de arriba
        $sentencia->bindParam(":correo",$correo);

        //Ejecutar
        $sentencia->execute();
        $mensaje="Registro agregado con éxito.";
        header("Location:index.php?mensaje=".$mensaje);
    }
    include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Usuarios
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <!-- Usuario -->
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario:</label>
                <input type="text"
                    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="Usuario">
            </div>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input type="password"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">              
            </div>
            <!-- Correo -->
            <div class="mb-3">
              <label for="correo" class="form-label">Correo:</label>
                <input type="email"
                class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo">              
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>