<?php 
require '../../header.php';
require "../../fonctions/fonctionDashboard.php";
require "../../fonctions/fonctionIndex.php";
$recettes=getRecettes();
$Users=getAllUtilisateur();
$i=1;

if ($_SESSION['Moderateur']==0)
{
  header("Location: http://localhost/Blog/Blog/src/pages/index.php");
  exit();
}

if (!empty ($_POST['email']) && !empty ( $_POST['password']) && !empty ( $_POST['pseudo'])) 
{
  $mail=$_POST['email'];
  $password=$_POST['password'];
  $pseudo=$_POST['pseudo'];
  $ville=NULL;
  $age=NULL;
  $options = 
  [
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
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
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
    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">
        <center>
          <div class="card" style="width: 60rem;">
            <div class="card-body text-center">
              <h5 class="card-title">Liste des utilisateurs</h5>
              <p>
                <button class="btn btn-outline-secondary" type="button"data-toggle="collapse" data-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Ajouter</button>
                <div class="collapse width" id="collapseWidthExample">
                  <form action="" method="post">
                    Pseudo
                    <div class="input-group mb-3">
                      <label for="exampleInputPassword1" class="form-label"></label>
                      <input placeholder= 'Lulustucru' name = "pseudo" type="text" class="form-control" id="exampleInputPassword1" class="form-text">
                    </div>
                    Mail
                    <div class="input-group mb-3">
                      <label for="exampleInputPassword1" class="form-label"></label>
                      <input placeholder= 'email@mail.com' name = "email" type="email" class="form-control" id="exampleInputPassword1" class="form-text">
                    </div>
                    Mot de passe
                    <div class="input-group mb-3">
                      <label for="exampleInputPassword1" class="form-label"></label>
                      <input placeholder= 'MoTdEPAssE9!72?' name = "password" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
                    </div>
                    <input type="submit" value="Ajouter">
                  </form>
                </div>
              </p>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Pseudo</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Statut</th>
                  <th scope="col">Connexion</th>
                  <th scope="col">Configuration</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($Users as $User) 
              {
              ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $User['Pseudo']?></td>
                  <td><?= $User['Mail'] ?></td>
                  <td>
                    <?php if ($User['Moderateur'] ==true)
                    {
                      echo 'Modérateur';
                    } 
                    else echo 'Membre' ?>
                  </td>
                  <td><?= $User['LastConnexion'] ?></td>
                  <td>
                    <a href='http://localhost/Blog/Blog/compte/supprimerProfil.php?id=<?=$User['IDCompte']?>'>
                      <button type="button" class="btn btn-outline-secondary">Supprimer</button>
                    </a>
                  </td>
                </tr>
              <?php
              $i++;
              }
              ?>
              </tbody>
            </table>
          </div>
        </center>
      </div>
      <br>
      <br>
      <br>
      <center>
        <div class="card" style="width: 60rem;">
          <div class="card-body text-center">
            <h5 class="card-title">Liste des recettess</h5>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nom de la recette</th>
                <th scope="col">Auteur</th>
              </tr>
            </thead>
            <?php
            foreach($recettes as $recette)
            //$recettes = tableau
            //recette = ligne de tableau recettes
            {
            ?>
            <tr>
              <th scope="row"><?=$recette['id']?></th>
              <td><?=  $recette['nom']?></td>
              <td><?=  $recette['auteur']?></td>
              <td></td>
              </td>
              <td>
                <a href='http://localhost/Blog/Blog/src/pages/supprimerRecette.php?id=<?=$recette['id']?>'>
                  <button type="button" class="btn btn-outline-secondary">Supprimer</button>
                </a>
              </td>
            </tr>
            <?php
            $i++;
            }
            ?>
          </table>
        </div>
      </center>
    </section><!-- End Book A Table Section -->
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

