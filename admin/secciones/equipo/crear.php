<?php 
    include("../../bd.php");
    if($_POST){
        //Para recepcionar imagenes es un caso especial, esto es diferente a la del $_POST
        $imagen = (isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
        $nombrecompleto = (isset($_POST['nombrecompleto']))?$_POST['nombrecompleto']:"";
        $puesto = (isset($_POST['puesto']))?$_POST['puesto']:"";
        $X = (isset($_POST['X']))?$_POST['X']:"";
        $facebook = (isset($_POST['facebook']))?$_POST['facebook']:"";
        $linkedin = (isset($_POST['linkedin']))?$_POST['linkedin']:"";

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
        $sentencia=$conexion->prepare("INSERT INTO tbl_equipo (ID, imagen, nombrecompleto, puesto, X, facebook, linkedin) 
        VALUES (NULL, :imagen, :nombrecompleto, :puesto, :X, :facebook, :linkedin);");

        //donde encuentres imagen pon la varible $nombre_archivo_imagen en la sentencia de arriba
        $sentencia->bindParam(":imagen",$nombre_archivo_imagen);
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

        //Ejecutar
        $sentencia->execute();
        $mensaje="Registro agregado con éxito.";
        header("Location:index.php?mensaje=".$mensaje);
    }
    include("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Datos de la persona
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <!-- Imagen -->
            <!-- este input debe ser de tipo file ya que es la imagen bs5-form-file -->
            <div class="mb-3">
              <label for="imagen" class="form-label">Imagen:</label>
              <input type="file" class="form-control" name="imagen" id="imagen" placeholder="Imagen" aria-describedby="fileHelpId">
            </div>
            <!-- Nombre Completo -->
            <div class="mb-3">
                <label for="nombrecompleto  " class="form-label">Nombre Completo:</label>
                <input type="text"
                    class="form-control" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <!-- Puesto -->
            <div class="mb-3">
              <label for="puesto" class="form-label">Puesto:</label>
              <input type="text"
                class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="Puesto">              
            </div>
            <!-- X (Twiter) -->
            <div class="mb-3">
              <label for="X" class="form-label">X:</label>
              <input type="text"
                class="form-control" name="X" id="X" aria-describedby="helpId" placeholder="X">              
            </div>
            <!-- Facebook -->
            <div class="mb-3">
              <label for="facebook" class="form-label">Facebook:</label>
                <input type="text"
                class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="Facebook">              
            </div>
            <!-- Linkedin -->
            <div class="mb-3">
              <label for="linkedin" class="form-label">Linkedin:</label>
              <input type="text"
                class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="Linkedin">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>        
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../templates/footer.php"); ?>