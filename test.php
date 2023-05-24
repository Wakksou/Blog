<?php 
require "../fonction.php";
require "../header.php";

if (empty ($_SESSION['email']))
{
  header ('Location: http://localhost/Blog/Blog/src/pages/index.php?get=1');
}

if (!empty ($_POST['NomRecette']) && !empty ( $_POST['DescriptionRecette']) && !empty ( $_POST['temps']) && !empty ($_POST['NombreIngredients'])
  && !empty ($_POST['NombreEtape'])) 
  {
      $NomRecette=$_POST['NomRecette'];
      $DescriptionRecette=$_POST['DescriptionRecette'];
      $image=$_POST['image'];
      $auteur=$_SESSION['Pseudo'];
      $temps=$_POST['temps'];
      $NombreIngredients=$_POST['NombreIngredients'];
      $NombreEtape=$_POST['NombreEtape'];
      try 
      {
        creerRecette($NomRecette,$DescriptionRecette,$image,$auteur,$temps);
        $id_recette=getIdRecette($NomRecette,$auteur);
        header ('Location: http://localhost/Blog/Blog/CreerUneRecette/CreerIngredients.php?id='.$NombreIngredients.'&Etapeid='.$NombreEtape.'&recette_id='.$id_recette);
      }
      catch(PDOException $e)
      {
        echo $e->getMessage();
      }
    }
?>
</br>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom de la recette</label>
    <input type="text" class="form-control" id="NomRecette" placeholder="patate" name="NomRecette">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description de la recette</label>
    <textarea class="form-control" id="description" rows="3" name="DescriptionRecette"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Temps nécessaire à la confection</label>
    <textarea class="form-control" id="temps" rows="1" name="temps"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Image de présentation ( sous forme de lien goopics )</label>
    <textarea class="form-control" id="temps" rows="1" name="image"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Nombre d'ingrédient</label>
    <select class="form-control" id="NombreIngredient" name="NombreIngredients">
      <?php 
      for ($i=1;$i<=12;$i++)
      { ?>
      <option value=<?=$i?>><?=$i?></option>
      <?php }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Nombre d'étape dans la préparation</label>
    <select class="form-control" id="NombreEtape" name="NombreEtape">
    <?php 
      for ($n=1;$n<=10;$n++)
      { ?>
      <option value=<?=$n?>><?=$n?></option>
      <?php }
      ?>
    </select>
  </div>
  <input type="submit" value="Suivant">
</form>




