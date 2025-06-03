<?php 
    include("../../bd.php");
    // Al presionar el boton editar en index.php se hace esta evaluación
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM tbl_entradas WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
        $titulo = $registro['titulo'];
        $descripcion = $registro['descripcion'];
        $imagen = $registro['imagen'];
    }

    if($_POST){
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $titulo = (isset($_POST['titulo']))?$_POST['titulo']:"";        
        $descripcion = (isset($_POST['descripcion']))?$_POST['descripcion']:"";
    
        //la variable conexion se toma del documento bd.php
        $sentencia=$conexion->prepare("UPDATE tbl_entradas SET
        titulo = :titulo, descripcion = :descripcion WHERE ID =:id;");
        $sentencia->bindParam(":id",$txtID);
        //donde encuentres titulo pon la varible $titulo en la sentencia de arriba
        $sentencia->bindParam(":titulo",$titulo);
        //donde encuentres descripcion pon la varible $descripcion en la sentencia de arriba
        $sentencia->bindParam(":descripcion",$descripcion);
    
        $sentencia->execute();
    
        //Se debe verificar que el archivo de imagen se haya enviado
        if($_FILES["imagen"]["name"] != ""){
          //se obtienen los datos de la imagen
          $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
          //en esta parte se esta validando que si existe una imagen le asignamos un nuevo nombre
          $fecha_imagen=new DateTime();
          $nombre_archivo_imagen = ($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
          //se sube o se mueve la nueva imagen a la ruta de assets, tmp: nombre temporal 
          $tmp_imagen=$_FILES["imagen"]["tmp_name"];
          move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen);
    
          //se debe hacer una consulta a la bdd ya que esta contiene los nombres establecidos por el proceso de nombrado que se hizo en crear.php
          $sentencia=$conexion->prepare("SELECT imagen FROM tbl_entradas WHERE id=:id;");
          //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
          $sentencia->bindParam(":id",$txtID);
          $sentencia->execute();
          $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
          // para eliminar la imagen antigua
          if(isset($registro_imagen["imagen"])){
              if(file_exists("../../../assets/img/team/".$registro_imagen["imagen"]));
              unlink("../../../assets/img/team/".$registro_imagen["imagen"]);
          }
    
          //se hace la actualizacion de la imagen
          $sentencia=$conexion->prepare("UPDATE tbl_entradas SET imagen = :imagen WHERE ID =:id;");      
          $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
          $sentencia->bindParam(":id",$txtID);
          $sentencia->execute();
        }
        $mensaje="Registro modificado con éxito.";
        header("Location:index.php?mensaje=".$mensaje);
    }    

    include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Entradas
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input readonly value= "<?php echo $txtID;?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
              <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
            <label for="titulo" class="form-label">Titulo:</label>
            <input type="text" value="<?php echo $titulo?>"
                class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Titulo">
            </div>

            <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion:</label>
              <input type="text" value="<?php echo $descripcion?>"
                class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripcion">
            </div>

            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <img width="100" src="../../../assets/img/team/<?php echo $imagen;?>"/>
              <input type="file"
                class="form-control" name="imagen" id="imagen" aria-describedby="helpId" placeholder="Imagen">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../templates/footer.php"); ?>