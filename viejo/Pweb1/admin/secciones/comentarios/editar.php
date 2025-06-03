<?php 
    include("../../bd.php");
    // Al presionar el boton editar en index.php se hace esta evaluación
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM cComentarios WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
        $nombre = $registro['nombre'];
        $comentario = $registro['comentario'];
    }

    if($_POST){
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";        
        $comentario = (isset($_POST['comentario']))?$_POST['comentario']:"";
    
        //la variable conexion se toma del documento bd.php
        $sentencia=$conexion->prepare("UPDATE cComentarios SET
        nombre = :nombre, comentario = :comentario WHERE ID =:id;");
        $sentencia->bindParam(":id",$txtID);
        //donde encuentres nombre pon la varible $nombre en la sentencia de arriba
        $sentencia->bindParam(":nombre",$nombre);
        //donde encuentres comentario pon la varible $comentario en la sentencia de arriba
        $sentencia->bindParam(":comentario",$comentario);
    
        $sentencia->execute();
    
        $mensaje="Registro modificado con éxito.";
        header("Location:index.php?mensaje=".$mensaje);
    }    

    include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Comentario
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input readonly value= "<?php echo $txtID;?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" value = "<?php echo $nombre?>"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="comentario" class="form-label">Comentario:</label>
              <textarea class="form-control" value = "<?php echo $comentario?>"
              name="comentario" id="comentario" type="text" placeholder="Ingresa tu comentario..." style="height: 10rem" data-sb-validations="required"></textarea>
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>