<?php 
include("../../bd.php");
// Al presionar el boton editar en index.php se hace esta evaluación
if (isset($_GET['txtID'])){
    // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_becas WHERE id=:id;");
    // donde encuentres txtID pon la varible $txtID en la sentencia de arriba
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    // recuperacion de datos
    // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
    $nombre=$registro['nombre'];
    $descripcion=$registro['descripcion'];
    $link=$registro['link'];
}
if($_POST){
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $link = (isset($_POST['link']))?$_POST['link']:"";

    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("UPDATE tbl_becas SET
    nombre = :nombre, descripcion = :descripcion, link = :link WHERE ID =:id;");

    //donde encuentres nombre pon la varible $nombre en la sentencia de arriba
    $sentencia->bindParam(":nombre",$nombre);
    //donde encuentres link pon la varible $link en la sentencia de arriba
    $sentencia->bindParam(":link",$link);
    //donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Registro modificado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}
include("../../templates/header.php"); ?>
<div class="card">
        <div class="card-header">
            Editando la informacion de becas
        </div>
        <div class="card-body">
            <form action="" enctype="multipart/form-data" method="post">
            <!--bs5-form-input-->
            <div class="mb-3">
              <label for="txtID" class="form-label">ID:</label>
              <!-- readonly para que no pueda modificar el id que este ya es autoincrementable -->
              <input readonly value= "<?php echo $txtID;?>" type="text"               
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
            </div>
            <div class="mb-3">
              <label for="nombre" class="form-label">Nombre:</label>
              <input value= "<?php echo $nombre;?>"type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción:</label>
              <input value= "<?php echo $descripcion;?>" type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <div class="mb-3">
              <label for="link" class="form-label">Link:</label>
              <input value= "<?php echo $link;?>"type="text"
                class="form-control" name="link" id="link" aria-describedby="helpId" placeholder="Link">
            </div>

            <button type="submit" class="btn btn-success">Terminar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Regresar</a>

            </form>
        </div>    
    </div>
<?php include("../../templates/footer.php"); ?>