<?php 
include("../../bd.php");
// Al presionar el boton editar en index.php se hace esta evaluación
if (isset($_GET['txtID'])){
    // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tbl_equipo WHERE id=:id;");
    //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    // $txtID = $registro['ID']; ya no es necesario hacer esto porque el metodo get ya nos da el valor
    $imagen = $registro['imagen'];
    $nombrecompleto = $registro['nombrecompleto'];
    $puesto = $registro['puesto'];
    $X = $registro['X'];
    $facebook = $registro['facebook'];
    $linkedin = $registro['linkedin'];
}
//se verifica si llegan los datos del formulario
if($_POST){
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombrecompleto = (isset($_POST['nombrecompleto']))?$_POST['nombrecompleto']:"";
    $puesto = (isset($_POST['puesto']))?$_POST['puesto']:"";
    $X = (isset($_POST['X']))?$_POST['X']:"";
    $facebook = (isset($_POST['facebook']))?$_POST['facebook']:"";
    $linkedin = (isset($_POST['linkedin']))?$_POST['linkedin']:"";

    //la variable conexion se toma del documento bd.php
    $sentencia=$conexion->prepare("UPDATE tbl_equipo SET
    nombrecompleto = :nombrecompleto, puesto = :puesto, X = :X, facebook = :facebook, linkedin = :linkedin WHERE ID =:id;");
    $sentencia->bindParam(":id",$txtID);
    //donde encuentres nombrecompleto pon la varible $nombrecompleto en la sentencia de arriba
    $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
    //donde encuentres puesto pon la varible $puesto en la sentencia de arriba
    $sentencia->bindParam(":puesto",$puesto);
    //donde encuentres X pon la varible $X en la sentencia de arriba
    $sentencia->bindParam(":X",$X);
    //donde encuentres facebook pon la varible $facebook en la sentencia de arriba
    $sentencia->bindParam(":facebook",$facebook);
    //donde encuentres linkedin pon la varible $linkedin en la sentencia de arriba
    $sentencia->bindParam(":linkedin",$linkedin); 

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
      move_uploaded_file($tmp_imagen,"../../../assets/img/team/".$nombre_archivo_imagen);

      //se debe hacer una consulta a la bdd ya que esta contiene los nombres establecidos por el proceso de nombrado que se hizo en crear.php
      $sentencia=$conexion->prepare("SELECT imagen FROM tbl_equipo WHERE id=:id;");
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
      $sentencia=$conexion->prepare("UPDATE tbl_equipo SET imagen = :imagen WHERE ID =:id;");      
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
        Editar Equipo
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <!-- ID -->
            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input readonly value= "<?php echo $txtID;?>" type="text"
                class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
            </div>
            <!-- Imagen -->
            <!-- este input debe ser de tipo file ya que es la imagen bs5-form-file -->
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <!-- Por cuestiones de seguridad o permisos del usuario el navegador no permitira visualizar el valor de la imagen -->
              <!-- Sentencia anterior solo inserta el nombre: <?php //echo $imagen;?> -->
              <img width="100" src="../../../assets/img/team/<?php echo $imagen;?>"/>
              <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">              
            </div>            
            <!-- Nombre Completo -->
            <div class="mb-3">
              <label for="nombrecompleto" class="form-label">Nombre Completo:</label>
              <input value="<?php echo $nombrecompleto;?>" type="text"
                class="form-control" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre">              
            </div>
            <!-- Puesto -->
            <div class="mb-3">
              <label for="puesto" class="form-label">Puesto:</label>
                <!--se puede tambien manejar como un texarea --> <input value="<?php echo $puesto;?>" type="text"
                class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">              
            </div>
            <!-- X -->
            <div class="mb-3">
              <label for="X" class="form-label">X:</label>
              <input value="<?php echo $X;?>" type="text"
                class="form-control" name="X" id="X" aria-describedby="helpId" placeholder="X">              
            </div>
            <!-- Facebook -->
            <div class="mb-3">
              <label for="facebook" class="form-label">Facebook:</label>
              <input value="<?php echo $facebook;?>" type="text"
                class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook">
            </div>
            <!-- Linkedin -->
            <div class="mb-3">
              <label for="linkedin" class="form-label">Linkedin:</label>
              <input value="<?php echo $linkedin;?>" type="text"
                class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin del proyecto">
            </div>

            <button type="submit" class="btn btn-success">Actulizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>
<?php include("../../templates/footer.php"); ?>