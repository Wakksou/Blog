<?php 
require '../header.php';
require "../fonctions/fonctionUser.php";

if (!empty ($_POST['email']) && !empty ( $_POST['password']) && !empty ( $_POST['pseudo']) && !empty ( $_POST['ville']) 
&& !empty ( $_POST['age']) ) 
{
    $mail=$_POST['email'];
    $password=$_POST['password'];
    $pseudo=$_POST['pseudo'];
    $ville=$_POST['ville'];
    $age=$_POST['age'];

    $options = [
        'cost' => 8,
    ];
    $passwordHashe=password_hash($password, PASSWORD_BCRYPT, $options);

    try 
        {
          inscription($mail,$pseudo,$ville,$passwordHashe,$age);
        }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
    
  header ('Location: http://localhost/Blog/Blog/compte/connexion.php?id=1');
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Connexion</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets1/img/favicon.png" rel="icon">
    <link href="../assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets1/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets1/css/style.css" rel="stylesheet">

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
          <h2>Inscription</h2>
        </div>
        <div class="form">
          <form action="inscription.php" method="post" role="form" class="php-email-form">
            <div class="form-group mt-3">
              <input class="form-control" name="email" rows="5" placeholder="VotreMail@mail.com" required></input>
            </div>
            <div class="form-group mt-3">
              <input class="form-control" name="pseudo" rows="5" placeholder="Neymar10" required></input>
            </div>
            <div class="form-group mt-3">
              <input class="form-control" name="ville" rows="5" placeholder="Paris" required></input>
            </div>
            <div class="form-group mt-3">
              <input class="form-control" name="age" rows="5" placeholder="30" required></input>
            </div>
            <div class="form-group mt-3">
              <input class="form-control" type= "password" name="password" rows="5" placeholder="mot de passe" required></input>
            </div>
            <div class="my-3">
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Vos informations ont bien été envoyé merci!</div>
            </div>
            <div class="text-center"><button type="submit">S'inscrire</button></div>
          </form>
        </div>
      </div>
    </section>
    <!-- Vendor JS Files -->
    <script src="../assets1/vendor/aos/aos.js"></script>
    <script src="../assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets1/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets1/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../assets1/js/main.js"></script>
  </body>
</html>




