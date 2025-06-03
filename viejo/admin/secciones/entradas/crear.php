<?php 
include("../../bd.php");

if($_POST){
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $imagen = (isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";

    //en esta parte se esta validando que si existe una imagen le asignamos un nuevo nombre
    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
    
    //esta sentecia sirve para mover la imagen a otra carpeta
    $tmp_imagen=$_FILES["imagen"]["tmp_name"];
    if($tmp_imagen!=""){
        //porfolio en lugar de portafolio
        move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen);
    }

    // Definir 
    $sentencia=$conexion->prepare("INSERT INTO tbl_entradas 
    (ID, titulo, descripcion, imagen) VALUES 
    (NULL, :titulo, :descripcion, :imagen);");

    //donde encuentres titulo pon la varible $titulo en la sentencia de arriba
    $sentencia->bindParam(":titulo",$titulo);
    //donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
    $sentencia->bindParam(":descripcion",$descripcion);
    //donde encuentres imagen pon la varible $nombre_archivo_imagen en la sentencia de arriba
    $sentencia->bindParam(":imagen",$nombre_archivo_imagen);

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
            <label for="titulo" class="form-label">Titulo:</label>
            <input type="text"
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <input type="file"
                class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>