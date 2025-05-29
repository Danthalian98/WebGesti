<?php include("template/header.php");?>
    <!-- Team-->
    <section class="page-section bg-light" id="team">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Conoce a nuestro equipo</h2>
            </div>
            <div class="row">
            <?php foreach ($lista_equipo as $registro) { ?>
                <div class="col-lg-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="<?php echo $url_img ?>/team/<?php echo $registro["imagen"]?>" alt="..." />
                        <h4><?php echo $registro["nombrecompleto"]?></h4>
                        <p class="text-muted"><?php echo $registro["puesto"]?></p>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $registro["X"]?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $registro["facebook"]?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="<?php echo $registro["linkedin"]?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center"><p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p></div>
            </div>
        </div>
    </section> 
<?php include("template/footer.php");?>