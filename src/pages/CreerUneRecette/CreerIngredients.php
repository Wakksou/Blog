<?php 
require "../../../fonctions/fonctionRecette.php";
require "../../../header.php";
require "../../../fonction.php";
$ingredients=getAllIngredients();
$i=1;
$check=true;

if (isset($_GET['id'])) //verifier qu'il a bien validé la page d'avant
{
  $NombreIngredients=$_GET['id'];
  $NombreEtape=$_GET['Etapeid'];
  $id_recette=$_GET['recette_id'];
}
else header("Location: http://localhost/Blog/Blog/src/pages/index.php");

for ($o=1;$o<=$NombreIngredients;$o++) //verifier qu'il a bien tout remplis
{
  if (empty ($_POST['ingredient'.$o])) 
  {
    $check=false; 
    break;
  }
}

if ($check==true)
{
  for ($o=1;$o<=$NombreIngredients;$o++)
  {
    echo "ingredient=".$id_ingredient=$_POST['ingredient'.$o]; // ca chope l'id
    echo "quantites=".$quantite=$_POST['Quantites'.$o];
    insererQuantites($id_recette,$id_ingredient,$quantite);
  }

header ('Location: http://localhost/Blog/Blog/src/pages/CreerUneRecette/CreerEtapes.php?id='.$NombreIngredients.'&Etapeid='.$NombreEtape.'&recette_id='.$id_recette);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Créer votre recette</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../../assets/img/favicon.png" rel="icon">
    <link href="../../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../../assets/css/style.css" rel="stylesheet">

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
          <h2>Sélectionner vos ingrédients et les quantités</h2>
        </div>
        <div class="form">
          <form action="CreerIngredients.php?id=<?=$NombreIngredients?>&Etapeid=<?=$NombreEtape?>&recette_id=<?=$id_recette?>" method="post" role="form" class="php-email-form">
            <?php
            for ($i=1;$i<=$NombreIngredients;$i++)
            {
            ?>
              <div class="row">
                <div class="form-group col-md-6">
                  <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
                  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='ingredient<?=$i?>'>
                    <option selected>Choisir ingrédient</option>
                    <?php 
                    foreach ($ingredients as $ingredient)
                    { 
                    ?>
                      <option value="<?=$ingredient['id']?>"><?=$ingredient['nom']?></option>
                    <?php 
                    } 
                    ?>
                  </select>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-4 ">
                  <input type="text" class="form-control" name="Quantites<?=$i?>" id="email" placeholder="Quantités" required>
                </div>
              </div>
            <?php
            }
            ?>
            <div class="my-3">
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Votre selection a bien été envoyé. Merci!</div>
            </div>
            <div class="text-center"><button type="submit">Suivant</button></div>
          </form>
        </div>
      </div>
    </section>
    <!-- Vendor JS Files -->
    <script src="../../../assets/vendor/aos/aos.js"></script>
    <script src="../../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../../../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="../../../assets/js/main.js"></script>
  </body>
  <a href='http://localhost/Blog/Blog/src/pages/CreerUneRecette/annulerRecette?id=<?=$id_recette?>'>
  <button type="button" class="btn btn-outline-secondary">Annuler</button>
<html>