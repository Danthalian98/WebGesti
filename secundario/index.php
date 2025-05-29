<?php include("template/header.php");?>
<section class="py-5" id = "informacion">
    <div class="container px-5">
        <h2 class="fw-bolder fs-5 mb-4">Carreras y lo que deberías saber</h2>
        <div class="row gx-5">
            <?php foreach($lista_informacion as $registros){?>
                <div class="col-lg-4 mb-5">
                    <div class="card h-100 shadow border-0">                            
                        <div class="card-body p-4">
                            <a class="text-decoration-none link-dark stretched-link" href="materia.php?txtID=<?php echo $registros['ID'];?>"><div class="h5 card-title mb-3"><?php echo $registros['nombre'] ?></div></a>
                            <p class="card-text mb-0"><?php echo $registros['descripcion'] ?></p>                                
                        </div>
                        <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                            <div class="d-flex align-items-end justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="small">
                                        <div class="fw-bold">Costos aproximados durante la carrera (incluyendo inscripciones y pagos):<div class="badge bg-primary bg-gradient rounded-pill mb-2"><?php echo $registros['costos'] ?></div></div>
                                        <div class="text-muted">Competencias: &middot; <?php echo $registros['competencias'] ?></div>
                                        <div class="text-muted">Oportunidades laborales: &middot; <?php echo $registros['oportunidades'] ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            <?php }?>
        </div>
        <div class="text-end mb-5 mb-xl-0">
            <a class="text-decoration-none" href="#!">
                Más carreras
                <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
<!-- Botón de Descarga -->

<?php include("template/footer.php");?>