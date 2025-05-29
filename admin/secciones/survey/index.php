<?php
include("../../bd.php");
include("../../templates/header.php");
if (isset($_GET['txtID'])){
    // borrar dicho registro con el ID correspondiente
    echo $_GET['txtID'];
    $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_survey WHERE id=:id;");
    //donde encuentres txtID pon la varible $txtID en la sentencia de arriba
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();     
}

//seleccionar registros
// esta parte se encarga de extraer los datos de la bdd para luego ser mostradas en la tabla
$sentencia=$conexion->prepare("SELECT * FROM tbl_survey;");
$sentencia->execute();
$lista_survey=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="card">
    <div class="card-header">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registros</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Link</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lista_survey as $registros){?>
                    <tr class="">
                        <td><?php echo $registros['ID'];?></td>
                        <td><?php echo $registros['nombre'];?></td>
                        <td><?php echo $registros['link'];?></td>
                        <td>
                            <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']; ?>" role="button">Editar</a>
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>    
    </div>
</div>
<?php include("../../templates/footer.php"); ?>