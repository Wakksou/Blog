<?php
use App\classes\Mail;
require_once '../../vendor/autoload.php';
require '../../header.php';

if (!empty ($_POST['name']) && !empty ( $_POST['email']) && !empty ( $_POST['subject']) && !empty ( $_POST['message']))
{
  $Name=$_POST['name'];
  $Email=$_POST['email'];
  $Sujet=$_POST['subject'];
  $Message=$_POST['message'];
  $mail= new Mail();

  if($mail->sendContactUs($Email,'MillePateStaff@gmail.com', $Name))
  {
    ?>
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Merci!</h4>
        <p>Votre message a bien été envoyé.</p>
      </div>
      <?php
  }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Contactez-nous</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets11/img/favicon.png" rel="icon">
    <link href="../../assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets1/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets1/css/style.css" rel="stylesheet">

    <!-- =======================================================
    * Template Name: TheEvent
    * Updated: Mar 10 2023 with Bootstrap v5.2.3
    * Template URL: https://bootstrapmade.com/theevent-conference-event-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>
  <body>
    <section id="contact" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Contactez-nous</h2>
          <p>Avez-vous des questions? N’hésitez pas à nous contacter directement. Notre équipe reviendra à vous dans quelques heures pour vous aider.</p>
        </div>
        <div class="row contact-info">
          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Adresse</h3>
              <address>11 rue Jean Pigeon 94220</address>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Numero</h3>
              <p><a href="tel:+155895548855">+06 78 91 01 11</a></p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Mail</h3>
              <p><a href="mailto:info@example.com">MillePateStaff@gmail.com</a></p>
            </div>
          </div>
        </div>

        <div class="form">
          <form action="" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre mail" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Votre message a bien été envoyé. Merci!</div>
            </div>
            <div class="text-center"><button type="submit">Envoyer</button></div>
          </form>
        </div>
      </div>
    </section>
    <!-- Vendor JS Files -->
    <script src="../../assets1/vendor/aos/aos.js"></script>
    <script src="../../assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets1/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../assets1/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../../assets1/js/main.js"></script>
  </body>
<html>




