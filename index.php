<?php 
require 'header.php';
require 'fonction.php';
$recettes=getRecettes();
?>
<DOCTYPE html>
<html>
  <br>
  <br>
  <div class='row'>
    <?php
    foreach($recettes as $recette)
    //$recettes = tableau
    //recette = ligne de tableau recettes
    {
      $ingredients=getIngredient($recette['id']);
      ?>
      <div class="card m-5" style="width: 18rem;">
        <img src="<?= $recette['image'] ?>" class="card-img-top" alt="<?=$recette["nom"]?>">
        <div class="card-body">
          <h5 class="card-title"><?= $recette['nom'] ?></h5>
          <p class="card-text"><?= $recette['description'] ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Temps : <?= $recette['temps'] ?></li>
          <li class="list-group-item">Ingrédient :
            <?php
            $i=0;
            foreach($ingredients as $ingredient) 
            {
              $i++;
              echo count($ingredients)!=$i ? $ingredient['nom'].' , ' : $ingredient['nom'] ;
            } 
            ?>
          </li>
          <li class="list-group-item">Auteur : <?= $recette['auteur'] ?></li>
        </ul>
        <div class="card-body">
          <a href="recette.php?id=<?=$recette['id']?>" class="card-link">Voir cette recette</a>
        </div>
      </div>
    <?php
    }
    ?>
  </div>
</html>