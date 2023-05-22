<?php 
require "../fonction.php";
require "../header.php";
$ingredients=getAllIngredients();
$i=1;
$check=true;

if (isset($_GET['id'])) //verifier qu'il a bien validé la page d'avant
{
  $NombreIngredients=$_GET['id'];
  $NombreEtape=$_GET['Etapeid'];
  $id_recette=$_GET['recette_id'];
}
else header("Location: index.php");

for ($o=1;$o<=$NombreIngredients;$o++) //verifier qu'il a bien tout remplis
{
  if (empty ($_POST['ingredient'.$o])) 
  {
    $check=false; 
    break;
  }
}

if ($check==true)
{
  for ($o=1;$o<=$NombreIngredients;$o++)
  {
    echo "ingredient=".$id_ingredient=$_POST['ingredient'.$o]; // ca chope l'id
    echo "quantites=".$quantite=$_POST['Quantites'.$o];
    InsererQuantites($id_recette,$id_ingredient,$quantite);
  }

header ('Location: http://localhost/Blog/Blog/CreerUneRecette/CreerEtapes.php?id='.$NombreIngredients.'&Etapeid='.$NombreEtape.'&recette_id='.$id_recette);
}
?>

<form action="" method="post">
<?php
  for ($i=1;$i<=$NombreIngredients;$i++)
  {
  ?>
    <div class="row">
      <div class='col'>
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Ingrédient</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name='ingredient<?=$i?>'>
          <option selected>Choisir ingrédient</option>
          <?php 
          foreach ($ingredients as $ingredient)
          { 
          ?>
            <option value="<?=$ingredient['id']?>"><?=$ingredient['nom']?></option>
          <?php 
          } 
          ?>
        </select>
      </div>
      <div class='col'>
        <label for="exampleFormControlInput1">Quantités</label>
        <input type="text" class="form-control" id="NomRecette" placeholder="30g" name="Quantites<?=$i?>">
      </div>
    </div>
    </br>
  <?php
  }
  ?>
  <input type="submit" value="Suivant">
  <a href='http://localhost/Blog/Blog/annulerRecette.php?id=<?=$id_recette?>'>
    <button type="button" class="btn btn-outline-secondary">Annuler</button>
  </a>
</form>