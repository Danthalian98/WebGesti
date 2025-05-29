<?php 
    include("../../bd.php");
    // Al presionar el boton editar en index.php se hace esta evaluación
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM tbl_informacion WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        $nombre = $registro['nombre'];
        $descripcion = $registro['descripcion'];
        $costos = $registro['costos'];
        $competencias = $registro['competencias'];
        $oportunidades = $registro['oportunidades'];
    }

    if($_POST){
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
        $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
        $costos = (isset($_POST['costos']))?$_POST['costos']:"";
        $competencias = (isset($_POST['competencias']))?$_POST['competencias']:"";
        $oportunidades = (isset($_POST['oportunidades']))?$_POST['oportunidades']:"";
    
        //la variable conexion se toma del documento bd.php
        $sentencia=$conexion->prepare("UPDATE tbl_informacion SET
        nombre = :nombre, descripcion = :descripcion, costos = :costos, competencias = :competencias, oportunidades = :oportunidades WHERE ID =:id;");
        $sentencia->bindParam(":id",$txtID);
        //donde encuentres nombre pon la varible $nombre en la sentencia de arriba
        $sentencia->bindParam(":nombre",$nombre);
        //donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
        $sentencia->bindParam(":descripcion",$descripcion);
        //donde encuentres costos pon la varible $costos en la sentencia de arriba
        $sentencia->bindParam(":costos",$costos);
        //donde encuentres competencias pon la varible $competencias en la sentencia de arriba
        $sentencia->bindParam(":competencias",$competencias);
        //donde encuentres oportunidades pon la varible $oportunidades en la sentencia de arriba
        $sentencia->bindParam(":oportunidades",$oportunidades);
    
        $sentencia->execute();
   
        $mensaje="Registro modificado con éxito.";
        header("Location:index.php?mensaje=".$mensaje);
    }    

    include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Informacion de la carrera
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
            <input type="text" value="<?php echo $nombre?>"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="textarea" value="<?php echo $descripcion?>"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
              <label for="costos" class="form-label">Costos:</label>
              <input type="text" value="<?php echo $costos?>"
                class="form-control" name="costos" id="costos" aria-describedby="helpId" placeholder="Costos">
            </div>

            <div class="mb-3">
              <label for="competencias" class="form-label">Competencias:</label>
              <input type="text" value="<?php echo $competencias?>"
                class="form-control" name="competencias" id="competencias" aria-describedby="helpId" placeholder="Competencias">
            </div>

            <div class="mb-3">
              <label for="oportunidades" class="form-label">Oportunidades:</label>
              <input type="text" value="<?php echo $oportunidades?>"
                class="form-control" name="oportunidades" id="oportunidades" aria-describedby="helpId" placeholder="Oportunidades">
            </div>

            <button type="submit" class="btn btn-success">Editar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>    
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>