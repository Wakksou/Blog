<?php 
require 'header.php';
require 'fonction.php';
$recettes=getRecettes();
if (isset($_GET['id'])) //verifier qu'il a bien validé la page d'avant
{
$rechercheNom=$_GET['id'];
$Recherches=RechercheNom($rechercheNom);
}
else header("Location: index.php");
if (!empty ($_POST['recherchee'])&& !empty($_POST['filtre']))
{
if ($_POST['filtre']==1)
{
  $recherches=$_POST['recherchee'];
  $Recherches=RechercheAuteur($recherches);
}
if ($_POST['filtre']==2)
{
  $recherches=$_POST['recherchee'];
  $Recherches=RechercheNom($recherches);
}
}
?>
<DOCTYPE html>
<html>
  <br>

<form action="" method="post" class="form-inline">

    <div class="form-group mx-sm-3 mb-2">
<div class="row">
          <div class='col'>
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref"></label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='filtre'>
              <option selected>Filtre</option>
              <option value='1'>Auteur</option>
              <option value='2'>Nom de la recette</option>
            </select>
          </div>
        </div>
      <label for="inputPassword2" class="sr-only"></label>
      <input type="text" class="form-control" id="inputPassword2" placeholder="Recherche" name='recherchee'>
    </div>
  <button type="submit" class="btn btn-secondary mb-2">Chercher</button>
  </form>

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
