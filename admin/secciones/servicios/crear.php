<?php
include("../../bd.php");
if($_POST){
    $icono = (isset($_POST['icono']))?$_POST['icono']:"";
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";

    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("INSERT INTO tbl_servicios 
    (ID, icono, titulo, descripcion) VALUES 
    (NULL, :icono, :titulo, :descripcion);");

//donde encuentres icono pon la varible $icono en la sentencia de arriba
    $sentencia->bindParam(":icono",$icono);
//donde encuentres titulo pon la varible $titulo en la sentencia de arriba
    $sentencia->bindParam(":titulo",$titulo);
//donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
    $sentencia->bindParam(":descripcion",$descripcion);

    $sentencia->execute();
    $mensaje="Registro agregado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);    
}   
?>
<?php include("../../templates/header.php"); ?>
    <div class="card">
        <div class="card-header">
            Crear servicios
        </div>
        <div class="card-body">
            <form action="" enctype="multipart/form-data" method="post">
            <!--bs5-form-input-->
            <div class="mb-3">
              <label for="icono" class="form-label">Icono:</label>
              <input type="text"
                class="form-control" name="icono" id="icono" aria-describedby="helpId" placeholder="Icono">
            </div>

            <div class="mb-3">
              <label for="titulo" class="form-label">Título:</label>
              <input type="text"
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Título">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripción:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

            </form>
        </div>    
    </div>
<?php include("../../templates/footer.php"); ?>