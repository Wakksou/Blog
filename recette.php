<?php 
require 'header.php';
require "fonction.php";

if (isset($_GET['id']))
{
$recette_id=$_GET['id'];
}
else header("Location: index.php");

if (!empty ($_SESSION['email']) && !empty ($_POST['commentaire']))
{ 
      $commentaire=$_POST['commentaire'];
      $date=date('l jS \of F Y h:i:s A');
      $auteur=$_SESSION['Pseudo'];

    try 
    {
    posterCom($commentaire,$date,$auteur,$recette_id);
    }

    catch(PDOException $e)
    {
    echo $e->getMessage();
    }

  }
elseif (!isset($_SESSION['email']) && !empty ($_POST['commentaire']))
    {
      ?>
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <img src="..." class="rounded mr-2" alt="...">
        <strong class="mr-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="toast-body">
        Hello, world! This is a toast message.
      </div>
    </div>
    <?php
    }
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
$ingredients=getIngredient($recette_id);
$etapes=getEtape($recette_id);
?>
<div class="container">
  <div class="row">
    <div class="card ">
      <div class="card-body">
        <?php 
        foreach ($ingredients as $ingredient) 
        {
        ?>
          <div class="card mb-1  float-right item-center" style="width: 20rem;">
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
      <?php
      $commentaires=getCommentaire($recette_id);
      foreach ($commentaires as $commentaire)
      {
      ?>
        <div class="card-body">
          <div class="card">
            <div class="card-header">
            <?=$commentaire['auteur']?>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p><h6><?= $commentaire['commentaire'] ?></h5></p>
                <footer class="blockquote-footer"><?= $commentaire['date'] ?></cite></footer>
              </blockquote>
            </div>
          </div>
        </div>
      <?php 
      }
      ?>
      <form action="" method="post">
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Poster un commentaire</label>
          <textarea class="form-control" name="commentaire" rows="3"></textarea>
        </div>
        <input type="submit" class='btn btn-secondary' value="Poster">
      </form>
    </div>
  </div>
</div>

