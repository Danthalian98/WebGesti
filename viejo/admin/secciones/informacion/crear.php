<?php 
include("../../bd.php");

if($_POST){
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $costos = (isset($_POST['costos']))?$_POST['costos']:"";
    $competencias = (isset($_POST['competencias']))?$_POST['competencias']:"";
    $oportunidades = (isset($_POST['oportunidades']))?$_POST['oportunidades']:"";

    // Definir
    $sentencia=$conexion->prepare("INSERT INTO tbl_informacion 
    (ID, nombre, descripcion, costos, competencias, oportunidades) VALUES 
    (NULL, :nombre, :descripcion, :costos, :competencias, :oportunidades);");

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

    //Ejecutar
    $sentencia->execute();
    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}

include("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Entradas
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
              <label for="costos" class="form-label">Costos:</label>
              <input type="text"
                class="form-control" name="costos" id="costos" aria-describedby="helpId" placeholder="Costos">
            </div>

            <div class="mb-3">
              <label for="competencias" class="form-label">Competencias:</label>
              <input type="text"
                class="form-control" name="competencias" id="competencias" aria-describedby="helpId" placeholder="Competencias">
            </div>

            <div class="mb-3">
              <label for="oportunidades" class="form-label">Oportunidades:</label>
              <input type="text"
                class="form-control" name="oportunidades" id="oportunidades" aria-describedby="helpId" placeholder="Oportunidades">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>