<?php 
include("../../bd.php");

if($_POST){
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $comentario = (isset($_POST['comentario']))?$_POST['comentario']:"";

    // Definir 
    $sentencia=$conexion->prepare("INSERT INTO cComentarios 
    (ID, nombre, comentario) VALUES 
    (NULL, :nombre, :comentario);");

    //donde encuentres nombre pon la varible $nombre en la sentencia de arriba
    $sentencia->bindParam(":nombre",$nombre);
    //donde encuentres comentario pon la varible $comentario en la sentencia de arriba
    $sentencia->bindParam(":comentario",$comentario);

    //Ejecutar
    $sentencia->execute();
    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Comentarios
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="comentario" class="form-label">Comentario:</label>
              <textarea class="form-control" name="comentario" id="comentario" type="text" placeholder="Ingresa tu comentario..." style="height: 10rem" data-sb-validations="required"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>