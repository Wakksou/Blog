<?php
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