<?php 
require 'header.php';
require "fonction.php";
$recette_id=$_GET['id'];
if (isset($_GET['id']))
{
$recette_id=$_GET['id'];
}
else header("Location: index.php");
?>

<DOCTYPE html>
<html>

<br>
<h4>Ingrédients</h4>
</br>
</br>

<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Nombre de personne
  </button>  
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">1</a>
    <a class="dropdown-item" href="#">2</a>
    <a class="dropdown-item" href="#">3</a>
    <a class="dropdown-item" href="#">4</a>
  </div>
</div>

</br>
</br>

<?php 
$ingrediens_list = ["spaguettis","boeuf haché", "oignons","huile d'olive"];
$picture_list = ["https://i.goopics.net/29qix7.jpg","https://i.goopics.net/r5usil.jpg","https://i.goopics.net/wnmktn.jpg","https://i.goopics.net/o4c5mb.jpg"];
$ingrediens_list2 = ["sel","poivre","Tomates pelées"," Ail"];
$picture_list2 = ["https://i.goopics.net/8ninyx.jpg","https://i.goopics.net/ijossm.jpg","https://i.goopics.net/gtsd99.jpg","https://i.goopics.net/ys2446.jpg"];
$ingredients=getIngredient($recette_id);
$etapes=getEtape($recette_id);
var_dump($ingredients)
?>
<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <?php 
        foreach ($ingredients as $ingredient) 
        {
        ?>
          <div class="card mb-1  float-right" style="width: 20rem;">
            <div class="row g-0 ">
              <div class="col-md-4">
                <img src="<?php echo $ingredient['image'] ?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6><?php echo $ingredient['nom']?>  : <?php echo $ingredient['quantite']?></h6>
                </div>
              </div>
            </div>
          </div>
        <?php 
        }
        ?>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <?php 
        for ($o = 0; $o <= 3; $o++)
        {
        ?>
          <div class="card mb-1  float-left" style="width: 20rem;">
            <div class="row g-0 ">
              <div class="col-md-4">
                <img src="<?= $picture_list2[$o]?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6><?= $ingrediens_list2[$o] . ": 40g"?></h6>
                </div>
              </div>
            </div>
          </div>
        <?php 
        }
        ?>
      </div>
    </div>
  </div>
</div>

</br>
</br>
</br>
<h4>Préparation</h4>
</br>
</br>

<div class="row">
  <div class="col-4">
    <div id="list-example" class="list-group">
        <?php foreach ($etapes as $etape) 
        {?>
      <a class="list-group-item list-group-item-action" href="#list-item-<?= $etape['numero']?>"><?= $etape['nom']?></a>
      <?php
        }
        ?>
      <a class="list-group-item list-group-item-action" href="#list-item-<?= count($etapes)+2?>">Commentaires</a>
    </div>
  </div>
  <div class="col-8">
    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
      <?php foreach ($etapes as $etapebis) 
        {?>
      <h6 id="list-item-<?= $etapebis['numero']?>"><h5><?= $etapebis['nom']?></h5> <?= $etapebis['description']?></h6>
      <p>...</p>
      </br>
      </br>
      <?php
        }
        ?>
    </div>
  </div>
</div>
<br>
<br>


<div class= "card  align-items-center w-100">
  <div class="card body w-75">
<div class="card ">
  <div class="card-header" id="list-item-<?= count($etapes)+2?>">
    Commentaires
  </div>

  <div class="card-body">
    <div class="card">
      <div class="card-header">
        Michou
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><h6>Masterclass t'a pas flop</h5></p>
          <footer class="blockquote-footer">le 10/04/2023</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="card">
      <div class="card-header">
        Inox
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><h6>Incroyable t'es le meilleur</h5></p>
          <footer class="blockquote-footer">le 11/04/2023</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>



    </div>
  </div>
</div>