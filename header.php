<?php session_start(); ?> 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  </head>
  <body>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Bienvenue sur Mille Pâte </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/Blog/Blog/index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="http://localhost/Blog/Blog/creerRecette.php">Créer une recette <span class="sr-only">(current)</span></a>
      </li>
      
          <?php if (!empty ($_SESSION['email']) ){ ?>
            <li class="nav-item ">
            <a class="nav-link" data-toggle="tooltip" data-placement="bottom" title="Vous êtes connecté en tant que <?= $_SESSION['Pseudo'] ?> " href="http://localhost/Blog/Blog/compte/profil.php">Profil<span class="sr-only">(current)</span></a>
            </li>
            <?php
            }
          ?>
          <?php if (!empty ($_SESSION['email']) ){
          if ($_SESSION['email']=="maxime.dingival@hotmail.com") { ?>
            <li class="nav-item ">
            <a class="nav-link" href="http://localhost/Blog/Blog/dashboard.php">Dashboard<span class="sr-only">(current)</span></a>
            </li>
            <?php
            }
            }
          ?>
    </ul> 
    <?php if (empty ($_SESSION['email']) ){ ?>
    <a class="nav-link "href="http://localhost/Blog/Blog/compte/connexion.php">Connexion</a>
    <a class="nav-link "href="http://localhost/Blog/Blog/compte/inscription.php">Inscription</a>
    <?php
    }
    ?>
    <?php if (!empty ($_SESSION['email']) ){ ?>

    <a class="nav-link "href="http://localhost/Blog/Blog/compte/deconnexion.php">Deconnexion</a>
    <?php
    }
    ?>
  </div>
</nav>
</body>
</html>

