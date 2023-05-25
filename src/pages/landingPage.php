<?php 
require '../../header.php';
require '../../fonction.php';
require '../../fonctions/fonctionIndex.php';
$recettes=getRecettes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Landing page</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../asset/img/favicon.png" rel="icon">
  <link href="../../asset/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../asset/vendor/aos/aos.css" rel="stylesheet">
  <link href="../../asset/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../../asset/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../asset/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
      <div class="row justify-content-between gy-5">
        <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
          <h2 data-aos="fade-up">Bienvenue sur Mille Pâte</h2>
          <p data-aos="fade-up" data-aos-delay="100">Sur ce site vous pouvez découvrir des recettes ou même en créer !</p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#testimonials" class="btn-book-a-table">Voir les recettes</a>
          </div>
        </div>
        <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
          <img src="https://i.goopics.net/z8xyap.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>Découvrez notre blog <span>et nos recettes</span></p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-7 img" style="background-image: url(https://i.goopics.net/22f3c9.jpg) ;" data-aos="fade-up" data-aos-delay="150">

          </div>
          <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
            <div class="content ps-0 ps-lg-5">
              <p class="fst-italic">
                Le but ici est de partager vos connaissances en cuisine ou même d'apprendre des autres afin de faire de meilleurs repas.
              </p>
              <ul>
                <li><i class="bi bi-check2-all"></i> Créez votre compte.</li>
                <li><i class="bi bi-check2-all"></i> Découvrez les recettes des autres pour apprendre et remerciez les en commentaire!</li>
                <li><i class="bi bi-check2-all"></i> Créez vos propres recettes pour apprendre aux autres comment les faires.</li>
              </ul>
              <p>
                Vous devez créer un compte pour créer vos recettes et commenter celles des autres nous vous encourageons donc vivement à le faire
              </p>

              <div class="position-relative mt-4">
                <img src="https://i.goopics.net/paoacj.jpg" class="img-fluid" alt="">
                <a href="https://www.youtube.com/watch?v=SdGmeSr26OA" class="glightbox play-btn"></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <p>Découvrez nos <span><a class="nav-link" href="http://localhost/Blog/Blog/src/pages/index.php">Recettes <span class="sr-only">(current)</span></a></span></p>
        </div>

        <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
                    <?php
                        foreach($recettes as $recette)
                        //$recettes = tableau
                        //recette = ligne de tableau recettes
                        {
                            $ingredients=getIngredient($recette['id']);
                    ?>
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="row gy-4 justify-content-center">
                  <div class="col-lg-6">
                    <div class="testimonial-content">
                    <p>
                        <i class="bi bi-quote quote-icon-left"></i>
                        <?=$recette['description']?>
                        <i class="bi bi-quote quote-icon-right"></i>
                      </p>
                      <h3><?=$recette['auteur']?></h3>
                    </div>
                  </div>
                  <div class="col-lg-2 text-center">
                    <img src="<?=$recette['image']?>" class="img-fluid testimonial-img" alt="">
                  </div>
                </div>
              </div>
            </div><!-- End testimonial item -->
            <?php
                        }
                        ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->
  </main><!-- End #main -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../../asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../asset/vendor/aos/aos.js"></script>
  <script src="../../asset/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../../asset/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../../asset/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../../asset/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../../asset/js/main.js"></script>

</body>

</html>