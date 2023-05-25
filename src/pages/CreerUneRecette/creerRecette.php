
<?php
require "../../../fonctions/fonctionRecette.php";
require "../../../header.php";
require "../../../fonction.php";

if (empty ($_SESSION['email']))
{
  header ('Location: http://localhost/Blog/Blog/src/pages/index.php?get=1');
}

if (!empty ($_POST['NomRecette']) && !empty ( $_POST['DescriptionRecette']) && !empty ( $_POST['temps']) && !empty ($_POST['NombreIngredients'])
  && !empty ($_POST['NombreEtape'])) 
  {
      $NomRecette=$_POST['NomRecette'];
      $DescriptionRecette=$_POST['DescriptionRecette'];
      $image=$_POST['image'];
      $auteur=$_SESSION['Pseudo'];
      $temps=$_POST['temps'];
      $NombreIngredients=$_POST['NombreIngredients'];
      $NombreEtape=$_POST['NombreEtape'];
      try 
      {
        creerRecette($NomRecette,$DescriptionRecette,$image,$auteur,$temps);
        $id_recette=getIdRecette($NomRecette,$auteur);
        header ('Location: http://localhost/Blog/Blog/src/pages/CreerUneRecette/CreerIngredients.php?id='.$NombreIngredients.'&Etapeid='.$NombreEtape.'&recette_id='.$id_recette);
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
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
          <h2>Créer votre recette</h2>
          <p>créer votre recette pour que d'autres puissent en profiter !</p>
        </div>
        <div class="form">
          <form action="creerRecette.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="NomRecette" class="form-control" id="name" placeholder="Nom de la recette" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                  <input type="text" class="form-control" name="image" id="email" placeholder="Image de présentation sous forme de lien goopics " required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="temps" id="subject" placeholder="Temps nécessaire pour la confectionner en min" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="DescriptionRecette" rows="5" placeholder="Description de la recette" required></textarea>
            </div>
            <div class="row">
                
              <div class="form-group col-md-6" >Nombre d'ingrédients
                <select class="form-control" id="NombreIngredient" name="NombreIngredients">
                  <?php 
                  for ($i=1;$i<=12;$i++)
                  { ?>
                    <option value=<?=$i?>><?=$i?></option>
                  <?php 
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-6 mt-5 mt-md-0">Nombre d'étapes
                <label for="exampleFormControlSelect1">Nombre d'étape dans la préparation</label>
                <select class="form-control" id="NombreEtape" name="NombreEtape">
                  <?php 
                  for ($n=1;$n<=10;$n++)
                  { ?>
                    <option value=<?=$n?>><?=$n?></option>
                  <?php 
                  }
                  ?>
                </select>
              </div>
            </div>
            <div class="my-3">
              <div class="loading">Chargement</div>
              <div class="error-message"></div>
              <div class="sent-message">Votre Recette a bien été envoyé. Merci!</div>
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
<html>
