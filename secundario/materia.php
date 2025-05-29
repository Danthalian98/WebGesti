<?php 
    include("template/header.php");
    if (isset($_GET['txtID'])){
        // recepcionar el txtID que se obtiene de index.php en una variable con el mismo nombre 
        $txtID = (isset($_GET['txtID']))?$_GET['txtID']:"";
    }
?>
<section class="py-5" id = "informacion">
    <div class="container px-5">
        <div class="row gx-5">
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Primer semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 1){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Segundo semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 2){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Tercer semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 3){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Cuarto semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 4){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Quinto semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 5){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Sexto semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 6){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Septimo semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 7){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-5">
                <div class="card h-100 shadow border-0">                               
                    <div class="card-body p-4">          
                        <p class="card-text mb-0">Octavo semestre</p>                                
                    </div>
                    <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                        <div class="d-flex align-items-end justify-content-between">
                            <div class="d-flex align-items-center">
                                <div class="small">
                                    <!-- Asignar un identificador único al botón -->
                                    <?php foreach($lista_materias as $registros){
                                    if($txtID == $registros['id_info'] && $registros['semester'] == 8){?>
                                        <a href="descarga.php?txtID=<?php echo $registros['ID']?>"><?php echo $registros['nombre']?></a><br>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("template/footer.php");?>