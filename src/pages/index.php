<?php 
require '../../header.php';
require '../../fonctions/fonctionIndex.php';
$recettes=getRecettes();
if (isset ($_GET['get']))
{
?>
    <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">Attention!</h4>
        Vous devez être connecté pour accéder à cette partie ->
        <a href='http://localhost/Blog/Blog/compte/connexion.php'>
            <button type="button" class="btn btn-link">Se connecter</button>
        </a>
        <hr>
        Si vous n'avez pas de compte ->
        <a href='http://localhost/Blog/Blog/compte/inscription.php'>
            <button type="button" class="btn btn-link">S'inscrire</button>
        </a>
    </div>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>Yummy Bootstrap Template - Index</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="assets2/img/favicon.png" rel="icon">
        <link href="assets2/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="../../assets2/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets2/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="../../assets2/vendor/aos/aos.css" rel="stylesheet">
        <link href="../../assets2/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="../../assets2/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="../../assets2/css/main.css" rel="stylesheet">

        <!-- =======================================================
            * Template Name: Yummy
            * Updated: Mar 10 2023 with Bootstrap v5.2.3
            * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
            * Author: BootstrapMade.com
            * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>
        <!-- ======= Menu Section ======= -->
        <section id="menu" class="menu">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h2>Nos recettes</h2>
                    <p>Confectionner vos futures <span>recettes préférées </span></p>
                </div>
                <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                    <div class="tab-pane fade active show" id="menu-starters">
                        <div class="row gy-5">
                            <?php
                            foreach($recettes as $recette)
                            //$recettes = tableau
                            //recette = ligne de tableau recettes
                            {
                                $ingredients=getIngredient($recette['id']);
                            ?>
                                <div class="col-lg-4 menu-item">
                                    <a href="<?= $recette['image'] ?>" class="glightbox"><img src="<?= $recette['image'] ?>" class="menu-img img-fluid" alt="<?=$recette["nom"]?>"></a>
                                    <h4><?= $recette['nom'] ?></h4>
                                    <p class="ingredients">
                                        <?php
                                        $i=0;
                                        foreach($ingredients as $ingredient) 
                                        {
                                            $i++;
                                            echo count($ingredients)!=$i ? $ingredient['nom'].' , ' : $ingredient['nom'] ;
                                        } 
                                        ?>
                                    </p>
                                    <p class="auteur">
                                        <?= $recette['auteur'] ?>
                                    </p>
                                    <div class="card-body">
                                        <a href="recette.php?id=<?=$recette['id']?>" class="card-link">Voir cette recette</a>
                                    </div>
                                </div><!-- Menu Item -->
                            <?php
                            }
                            ?>
                        </div>
                    </div><!-- End Starter Menu Content -->
                </div>
            </div>
        </section><!-- End Menu Section -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="../../assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../../assets2/vendor/aos/aos.js"></script>
        <script src="../../assets2/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="../../assets2/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="../../assets2/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="../../assets2/vendor/php-email-form/validate.js"></script>

        <!-- Template Main JS File -->
        <script src="../../assets2/js/main.js"></script>

    </body>
</html>