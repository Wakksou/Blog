<?php 
require 'header.php';
require "fonction.php";
$recettes=getRecettes();

if (isset($_GET['id']))
{
$recette_id=$_GET['id'];
}
else header("Location: index.php");

if (!empty ($_SESSION['email']) && !empty ($_POST['commentaire']))
{ 
      $commentaire=$_POST['commentaire'];
      $date=date("Y-m-d H:i:s");
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
?>
<br>
<div class="container item-center">
  <center>
  <h4>spaguettis bolognaise</h4>
  </center>
  <center>
  <img src='https://i.goopics.net/83r75t.jpg' alt=Image />
  </center>
  <center>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm" viewBox="0 0 16 16">
  <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
  <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
  </svg> 
  =40 min
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-egg" viewBox="0 0 16 16">
  <path d="M8 15a5 5 0 0 1-5-5c0-1.956.69-4.286 1.742-6.12.524-.913 1.112-1.658 1.704-2.164C7.044 1.206 7.572 1 8 1c.428 0 .956.206 1.554.716.592.506 1.18 1.251 1.704 2.164C12.31 5.714 13 8.044 13 10a5 5 0 0 1-5 5zm0 1a6 6 0 0 0 6-6c0-4.314-3-10-6-10S2 5.686 2 10a6 6 0 0 0 6 6z"/>
</svg>
=9 aliments
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
</svg>
=lulustu
</center>
</div>

<DOCTYPE html>
<html>
<head>
<br>
</br>
<br>
</br>
<h4>Ingrédients</h4>



</head>

</br>
</br>
<?php 
$ingredients=getIngredient($recette_id);
$etapes=getEtape($recette_id);
?>

<div class="container">
  <div class="row">

    <div class="card "> 
      <div class="card-body p-3 mb-2 bg-light text-dark">
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
                <?php
                if (!empty ($_SESSION['email']) ){
                if ($_SESSION['email']=='maxime.dingival@hotmail.com'||$_SESSION['Pseudo']==$commentaire['auteur'])
                { 
                }?>
                  <a href='http://localhost/Blog/Blog/supprimerCom.php?id=<?=$commentaire['id']?>&recette_id=<?=$recette_id?>'>
                  <button type="button" class="btn btn-outline-secondary">Supprimer</button>
                  </a>
                <?php
                }
                ?>
                </div>
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
