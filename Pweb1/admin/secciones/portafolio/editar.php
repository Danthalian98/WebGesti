<?php 
include("../../bd.php");
// Al presionar el boton editar en index.php se hace esta evaluación
if (isset($_GET['txtID'])){
    // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_portafolio WHERE id=:id;");
    //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
    $titulo = $registro['titulo'];
    $imagen = $registro['imagen'];
    $descripcion = $registro['descripcion'];
    $categoria = $registro['categoria'];

}
//se verifica si llegan los datos del formulario
if($_POST){
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";
    $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $categoria = (isset($_POST['categoria']))?$_POST['categoria']:"";

    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("UPDATE tbl_portafolio SET
    titulo = :titulo, descripcion = :descripcion, categoria = :categoria WHERE ID =:id;");
    $sentencia->bindParam(":id",$txtID);
    //donde encuentres titulo pon la varible $titulo en la sentencia de arriba
    $sentencia->bindParam(":titulo",$titulo);
    //donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
    $sentencia->bindParam(":descripcion",$descripcion);
    //donde encuentres categoria pon la varible $categoria en la sentencia de arriba
    $sentencia->bindParam(":categoria",$categoria);

    $sentencia->execute();

    //Se debe verificar que el archivo se haya enviado
    if($_FILES["imagen"]["name"] != ""){
      //se obtienen los datos de la imagen
      $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
      //en esta parte se esta validando que si existe una imagen le asignamos un nuevo nombre
      $fecha_imagen=new DateTime();
      $nombre_archivo_imagen = ($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
      //se sube o se mueve la nueva imagen a la ruta de assets, tmp: nombre temporal 
      $tmp_imagen=$_FILES["imagen"]["tmp_name"];
      move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/".$nombre_archivo_imagen);

      //se debe hacer una consulta a la bdd ya que esta contiene los nombres establecidos por el proceso de nombrado que se hizo en crear.php
      $sentencia=$conexion->prepare("SELECT imagen FROM tbl_portafolio WHERE id=:id;");
      //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
      $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
      // para eliminar la imagen antigua
      if(isset($registro_imagen["imagen"])){
          if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"]));
          unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
      }

      //se hace la actualizacion de la imagen
      $sentencia=$conexion->prepare("UPDATE tbl_portafolio SET imagen = :imagen WHERE ID =:id;");      
      $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
    }
    $mensaje="Registro modificado con éxito.";
    header("Location:index.php?mensaje=".$mensaje);
}
include("../../templates/header.php"); ?>
<div class="card">
    <div class="card-header">
        Producto del portafolio
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <!-- ID -->
            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input readonly value= "<?php echo $txtID;?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
            </div>
            <!-- Titulo -->
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo:</label>
                <input value="<?php echo $titulo;?>" type="text"
                    class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>
            <!-- Imagen -->
            <!-- este input debe ser de tipo file ya que es la imagen bs5-form-file -->
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <!-- Por cuestiones de seguridad o permisos del usuario el navegador no permitira visualizar el valor de la imagen -->
              <!-- Sentencia anterior solo inserta el nombre: <?php //echo $imagen;?> -->
              <img width="100" src="../../../assets/img/portfolio/<?php echo $imagen;?>"/>
              <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">              
            </div>
            <!-- Despcripcion -->
            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
                <!--se puede tambien manejar como un texarea --> <input value="<?php echo $descripcion;?>" type="text"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">              
            </div>
            <!-- Categoria -->
            <div class="mb-3">
              <label for="categoria" class="form-label">Categoria:</label>
              <input value="<?php echo $categoria;?>" type="text"
                class="form-control" name="categoria" id="categoria" aria-describedby="helpId" placeholder="Categoria">
            </div>

            <button type="submit" class="btn btn-success">Actulizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>
<?php include("../../templates/footer.php"); ?>