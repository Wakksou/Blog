<?php
require '../header.php';
require "../fonctions/fonctionUser.php";

if (isset($_GET['id']))
{
?>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Modification du profil enregistré !</h4>
        Les modifications seront effectuées lors de la prochaine connexion
    </div>
<?php
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profil</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets3/img/favicon.png" rel="icon">
  <link href="../assets3/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets3/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets3/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets3/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets3/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets3/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets3/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets3/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div>
          <h2>Votre profil</h2>
          <p>Vous pouvez ici voir et modifier votre profil.</p>
        </div>
        <div class="row">
          <div class="col-lg-4">
            <img src="http://placehold.it/400x400" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>Pseudo</h3>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Pseudo:</strong> <span><?= $_SESSION['Pseudo'] ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Ville:</strong> <span><?= $_SESSION['Ville'] ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Mail:</strong> <span><?= $_SESSION['email'] ?></span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?= $_SESSION['Age'] ?></span></li>
                </ul>
                <a href='http://localhost/Blog/Blog/compte/profilModifier.php'>
                <button>Modifier Profil</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets3/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets3/vendor/aos/aos.js"></script>
    <script src="../assets3/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets3/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets3/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets3/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets3/vendor/typed.js/typed.min.js"></script>
    <script src="../assets3/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets3/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets3/js/main.js"></script>
  </body>
</html>
