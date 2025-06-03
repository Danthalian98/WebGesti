<?php 
include("../../bd.php");
// Al presionar el boton editar en index.php se hace esta evaluación
if (isset($_GET['txtID'])){
    // borrar dicho registro con el ID correspondiente
    // echo $_GET['txtID'];
    // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_servicios WHERE id=:id;");
    // donde encuentres txtID pon la varible $txtID en la sentencia de arriba
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    // recuperacion de datos
    // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
    $icono=$registro['icono'];
    $titulo=$registro['titulo'];
    $descripcion=$registro['descripcion'];
}
if($_POST){
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $icono = (isset($_POST['icono']))?$_POST['icono']:"";
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";

    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("UPDATE tbl_servicios SET
    icono = :icono, titulo = :titulo, descripcion = :descripcion WHERE ID =:id;");

    //donde encuentres icono pon la varible $icono en la sentencia de arriba
    $sentencia->bindParam(":icono",$icono);
    //donde encuentres titulo pon la varible $titulo en la sentencia de arriba
    $sentencia->bindParam(":titulo",$titulo);
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
            Editando la informacion de servicios
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
              <label for="icono" class="form-label">Icono:</label>
              <input value= "<?php echo $icono;?>"type="text"
                class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">
            </div>

            <div class="mb-3">
              <label for="titulo" class="form-label">Título:</label>
              <input value= "<?php echo $titulo;?>"type="text"
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Título">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción:</label>
              <input value= "<?php echo $descripcion;?>" type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <button type="submit" class="btn btn-success">Terminar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Regresar</a>

            </form>
        </div>    
    </div>
<?php include("../../templates/footer.php"); ?>