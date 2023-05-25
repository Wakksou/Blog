<?php 
require "../../../fonctions/fonctionRecette.php";
require "../../../header.php";
$check=true;

if (isset($_GET['id']))
{
  $NombreIngredients=$_GET['id'];
  $NombreEtape=$_GET['Etapeid'];
  $id_recette=$_GET['recette_id'];
}
else header("Location: http://localhost/Blog/Blog/src/pages/index.php");

for ($o=1;$o<=$NombreEtape;$o++) //verifier qu'il a bien tout remplis
{
  if (empty ($_POST['Etape'.$o])) 
  {
    $check=false; 
    break;
  }
}

if ($check==true)
{
  for ($o=1;$o<=$NombreEtape;$o++)
  {
    $description=$_POST['Etape'.$o]; // ca chope l'id
    $nom='Etape'.$o;
    $numero=$o;
    insererEtapes($nom,$description,$numero,$id_recette);
  }
  header ('Location: http://localhost/Blog/Blog/src/pages/index.php');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Créer vos étapes</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../../assets1/img/favicon.png" rel="icon">
    <link href="../../../assets1/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../../assets1/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../../assets1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets1/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets1/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../assets1/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../../assets1/css/style.css" rel="stylesheet">

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
          <h2>Décrire les étapes de la confection</h2>
        </div>
        <div class="form">
          <form action="CreerEtapes.php?id=<?$NombreIngredients?>&Etapeid=<?=$NombreEtape?>&recette_id=<?=$id_recette?>" method="post" role="form" class="php-email-form">
            <?php
            for ($i=1;$i<=$NombreEtape;$i++)
            {
            ?>
              <div class="form-group mt-3">
                <textarea class="form-control" name="Etape<?=$i?>" rows="5" placeholder="Etape<?=$i?>" required></textarea>
              </div>
            <?php
            }
            ?>
            <div class="my-3">
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Vos étapes ont bien été envoyé merci!</div>
            </div>
            <div class="text-center"><button type="submit">Terminer</button></div>
          </form>
        </div>
      </div>
    </section>
    <!-- Vendor JS Files -->
    <script src="../../../assets1/vendor/aos/aos.js"></script>
    <script src="../../../assets1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets1/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../../assets1/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../../../assets1/js/main.js"></script>
    <a href='http://localhost/Blog/Blog/src/pages/CreerUneRecette/annulerQuantites?id=<?=$NombreIngredients?>&Etapeid=<?=$NombreEtape?>&recette_id=<?=$id_recette?>'>
    <button type="button" class="btn btn-outline-secondary">Annuler</button>
  </body>
<html>