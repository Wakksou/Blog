<?php 
require 'header.php';
require 'fonction.php';
$recettes=getRecettes();
if (isset($_GET['id'])) //verifier qu'il a bien validé la page d'avant
{
$recherche=$_GET['id'];
$Recherches=Recherche($recherche);
}
else header("Location: index.php");
?>
<DOCTYPE html>
<html>

<div class='row'>
  <?php
  foreach($Recherches as $Recherche)
  //$recettes = tableau
  //recette = ligne de tableau recettes
  {
  $ingredients=getIngredient($Recherche['id']);
  ?>
  <div class="card m-5" style="width: 18rem;">
    <img src="<?= $Recherche['image'] ?>" class="card-img-top" alt="<?=$Recherche["nom"]?>">
    <div class="card-body">
      <h5 class="card-title"><?= $Recherche['nom'] ?></h5>
      <p class="card-text"><?= $Recherche['description'] ?></p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">Temps : <?= $Recherche['temps'] ?></li>
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
      <li class="list-group-item">Auteur : <?= $Recherche['auteur'] ?>
  </li>
    </ul>
    <div class="card-body">
      <a href="recette.php?id=<?=$Recherche['id']?>" class="card-link">Voir cette recette</a>
    </div>
  </div>
  <?php
  }
  ?>
</div>
