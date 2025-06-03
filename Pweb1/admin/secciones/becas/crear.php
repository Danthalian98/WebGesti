<?php
include("../../bd.php");
if($_POST){
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $link = (isset($_POST['link']))?$_POST['link']:"";

    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("INSERT INTO tbl_becas 
    (ID, nombre, descripcion, link) VALUES 
    (NULL, :nombre, :descripcion, :link);");

    //donde encuentres nombre pon la varible $nombre en la sentencia de arriba
    $sentencia->bindParam(":nombre",$nombre);
    //donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
    $sentencia->bindParam(":descripcion",$descripcion);
    //donde encuentres link pon la varible $link en la sentencia de arriba
    $sentencia->bindParam(":link",$link);

    $sentencia->execute();
    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);    
}   
?>
<?php include("../../templates/header.php"); ?>
    <div class="card">
        <div class="card-header">
            BECAS
        </div>
        <div class="card-body">
            <form action="" enctype="multipart/form-data" method="post">
            <!--bs5-form-input-->
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <div class="mb-3">
              <label for="link" class="form-label">Link:</label>
              <input type="text"
                class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Link">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

            </form>
        </div>    
    </div>
<?php include("../../templates/footer.php"); ?>