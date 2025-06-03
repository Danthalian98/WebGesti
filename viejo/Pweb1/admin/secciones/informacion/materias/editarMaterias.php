<?php 
    include("../../../bd.php");
    // Al presionar el boton editar en index.php se hace esta evaluación
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
        $sentencia=$conexion->prepare("SELECT * FROM tbl_materias WHERE id=:id;");
        //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);

        $id_info = $registro['id_info'];
        $semester = $registro['semester']; 
        $nombre = $registro['nombre'];
        $pdf = $registro['plan'];
    }

    if($_POST){
        $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
        $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
        $semester = (isset($_POST['semester']))?$_POST['semester']:"";
        $pdf = (isset($_FILES["pdf"]["name"]))?$_FILES["pdf"]["name"]:"";

        //la variable conexion se toma del documento bd.php
        $sentencia=$conexion->prepare("UPDATE tbl_materias SET
        semester = :semester, nombre = :nombre WHERE ID =:id;");

        $sentencia->bindParam(":id",$txtID);
        $sentencia->bindParam(":nombre",$nombre);
        $sentencia->bindParam(":semester",$semester);
        $sentencia->execute();

        //Se debe verificar que el archivo se haya enviado
        if($_FILES["pdf"]["name"] != ""){
            //se obtienen los datos de la pdf
            $pdf=(isset($_FILES["pdf"]["name"]))?$_FILES["pdf"]["name"]:"";
            //en esta parte se esta validando que si existe una pdf le asignamos un nuevo nombre
            $fecha_pdf=new DateTime();
            $nombre_archivo_pdf = ($pdf!="")? $fecha_pdf->getTimestamp()."_".$pdf:"";
            //se sube o se mueve la nueva pdf a la ruta de assets, tmp: nombre temporal
            $tmp_pdf=$_FILES["pdf"]["tmp_name"];
            move_uploaded_file($tmp_pdf,"../../../../assets/documents/".$nombre_archivo_pdf);
    
            //se debe hacer una consulta a la bdd ya que esta contiene los nombres establecidos por el proceso de nombrado que se hizo en crear.php
            $sentencia=$conexion->prepare("SELECT plan FROM tbl_materias WHERE id=:id;");
            //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
            $registro_pdf=$sentencia->fetch(PDO::FETCH_LAZY);
            // para eliminar la pdf antigua
            if(isset($registro_pdf["plan"])){
                if(file_exists("../../../../assets/documents/".$registro_pdf["plan"]));
                unlink("../../../../assets/documents/".$registro_pdf["plan"]);
            }
            //se hace la actualizacion de la pdf
            $sentencia=$conexion->prepare("UPDATE tbl_materias SET plan = :plan WHERE ID =:id;");      
            $sentencia->bindParam(":plan",$nombre_archivo_pdf);
            $sentencia->bindParam(":id",$txtID);
            $sentencia->execute();
        }
        // Es necesario tener la variable id_info como referencia al hacer los cambios de pagina
        header("Location:indexMaterias.php?txtID=".$id_info);
    }    

    include("../../../templates/header.php"); 
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
            <label for="semester" class="form-label">Semester:</label>
            <input type="number" value="<?php echo $semester?>"
                class="form-control" name="semester" id="semester" aria-describedby="helpId" placeholder="Semester">
            </div>
                        
            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" value="<?php echo $nombre?>"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <!-- Plan de estudio -->
            <!-- este input debe ser de tipo file ya que es la pdf bs5-form-file -->
            <div class="mb-3">
              <label for="pdf" class="form-label">Plan de estudio: <?php echo $pdf?></label>
              <input type="file"
              class="form-control" name="pdf" id="pdf" placeholder="Plan de estudio" aria-describedby="fileHelpId">              
            </div>  

            <button type="submit" class="btn btn-success">Editar</button>
            <!-- Es necesario tener la variable id_info como referencia al hacer los cambios de pagina -->
            <a name="" id="" class="btn btn-primary" href="indexMaterias.php?txtID=<?php echo $id_info?>" role="button">Cancelar</a>
        </form>
    </div>    
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../../templates/footer.php"); ?>