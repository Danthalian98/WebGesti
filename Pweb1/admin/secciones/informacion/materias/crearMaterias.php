<?php 
include("../../../bd.php");

if (isset($_GET['txtID'])){
    $id_info = (isset($_GET['txtID']))?$_GET['txtID']:"";
}

if($_POST){
    $nombre = (isset($_POST['nombre']))?$_POST['nombre']:"";
    $semester = (isset($_POST['semester']))?$_POST['semester']:"";
    $pdf = (isset($_FILES["pdf"]["name"]))?$_FILES["pdf"]["name"]:"";

    //en esta parte se esta validando que si existe una pdf le asignamos un nuevo nombre
    $fecha_pdf = new DateTime();
    $nombre_archivo_pdf = ($pdf!="")? $fecha_pdf->getTimestamp()."_".$pdf:"";
    
    //esta sentecia sirve para mover la pdf a otra carpeta
    $tmp_pdf=$_FILES["pdf"]["tmp_name"];
    if($tmp_pdf!=""){
        //porfolio en lugar de portafolio
        move_uploaded_file($tmp_pdf,"../../../../assets/documents/".$nombre_archivo_pdf);
    }

    // Definir
    $sentencia=$conexion->prepare("INSERT INTO tbl_materias
    (ID, id_info, nombre, plan, semester) VALUES 
    (NULL, :id_info, :nombre, :plan, :semester);");

    //donde encuentres id_info pon la varible $id_info en la sentencia de arriba
    $sentencia->bindParam(":id_info",$id_info);
    //donde encuentres nombre pon Hla varible $nombre en la sentencia de arriba
    $sentencia->bindParam(":nombre",$nombre);
    //donde encuentres plan pon la varible $nombre_archivo_pdf en la sentencia de arriba
    $sentencia->bindParam(":plan",$nombre_archivo_pdf);
    //donde encuentres plan pon la varible $semester en la sentencia de arriba
    $sentencia->bindParam(":semester",$semester);
    //Ejecutar
    $sentencia->execute();
    
    header("Location:indexMaterias.php?txtID=".$id_info);
}

include("../../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Materias
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="semester" class="form-label">Semester:</label>
                <input type="number"
                    class="form-control" name="semester" id="semester" aria-describedby="helpId" placeholder="Semester">
            </div> 

            <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text"
                class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>

            <div class="mb-3">
              <label for="pdf" class="form-label">Plan de estudios:</label>
              <input type="file" class="form-control" name="pdf" id="pdf" placeholder="Plan" aria-describedby="fileHelpId">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
            <a name="" id="" class="btn btn-primary" href="indexMaterias.php?txtID=<?php echo $id_info ?>" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer text-muted">
    </div>
</div>
<?php include("../../../templates/footer.php"); ?>