<?php 
require "../fonction.php";
require "../header.php";
$check=true;

if (isset($_GET['id']))
{
  $NombreIngredients=$_GET['id'];
  $NombreEtape=$_GET['Etapeid'];
  $id_recette=$_GET['recette_id'];
}
else header("Location: index.php");

for ($o=1;$o<=$NombreEtape;$o++) //verifier qu'il a bien tout remplis
{
  if (empty ($_POST['Etape'.$o])) 
  {
  $check=false; 
  break;
  }
}

if ($check==true)
{
  for ($o=1;$o<=$NombreEtape;$o++)
  {
    $description=$_POST['Etape'.$o]; // ca chope l'id
    $nom='Etape'.$o;
    $numero=$o;
    insererEtapes($nom,$description,$numero,$id_recette);
  }
  header ('Location: http://localhost/Blog/Blog/src/pages/index.php');
}
?>
<form action="" method="post">
  <?php
  for ($i=1;$i<=$NombreEtape;$i++)
  {
  ?>
    <div class="form-group">
      <label for="exampleFormControlInput1">Etape <?=$i?></label>
      <input type="text" class="form-control" id="NomRecette" placeholder="patate" name="Etape<?=$i?>">
    </div>
  <?php 
  }
  ?>
  <input type="submit" value="Suivant">
  <a href='http://localhost/Blog/Blog/annulerQuantites?id=<?=$NombreIngredients?>&Etapeid=<?=$NombreEtape?>&recette_id=<?=$id_recette?>'>
    <button type="button" class="btn btn-outline-secondary">Annuler</button>
  </a>
</form>