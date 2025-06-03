<?php 
include("../../bd.php");
// Al presionar el boton editar en index.php se hace esta evaluación
if (isset($_GET['txtID'])){
    // recepcionar el txtID que se obtiene de index.php en una variable con el mismo Password 
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id;");
    //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
    $usuario = $registro['usuario'];
    $password = $registro['password'];
    $correo = $registro['correo'];
}
//se verifica si llegan los datos del formulario
if($_POST){  
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $usuario = (isset($_POST['usuario']))?$_POST['usuario']:"";
    $password = (isset($_POST['password']))?$_POST['password']:"";
    $correo = (isset($_POST['correo']))?$_POST['correo']:"";
    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("UPDATE tbl_usuarios SET
    usuario = :usuario, password = :password, correo = :correo WHERE ID =:id;");
    $sentencia->bindParam(":id",$txtID);
    //donde encuentres usuario pon la varible $usuario en la sentencia de arriba
    $sentencia->bindParam(":usuario",$usuario);
    //donde encuentres password pon la varible $password en la sentencia de arriba
    $sentencia->bindParam(":password",$password);
    //donde encuentres correo pon la varible $correo en la sentencia de arriba
    $sentencia->bindParam(":correo",$correo);
    //Ejecutar SQL
    $sentencia->execute();
    $mensaje="Registro modificado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}
include("../../templates/header.php"); ?>
<div class="card">
    <div class="card-header">
        Editar Usuario
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <!-- ID -->
            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input readonly value= "<?php echo $txtID;?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
            </div>
            <!-- Usuario -->
            <div class="mb-3">
              <label for="usuario" class="form-label">Usuario:</label>
              <input value = "<?php echo $usuario;?>" type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" aria-describedby="fileHelpId">
            </div>            
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">Password:</label>
              <input value="<?php echo $password;?>" type="password"
                class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="Password">              
            </div>
            <!-- Correo -->
            <div class="mb-3">
              <label for="correo" class="form-label">Correo:</label>
                <input value="<?php echo $correo;?>" type="email"
                class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo">              
            </div>

            <button type="submit" class="btn btn-success">Actulizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>
<?php include("../../templates/footer.php"); ?>