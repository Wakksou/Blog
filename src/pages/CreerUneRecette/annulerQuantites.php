<?php
require '../../../fonctions/fonctionRecette.php';

if (isset($_GET['id']))
{
    $id_recette=$_GET['recette_id'];
    $NombreIngredients=$_GET['id'];
    $NombreEtape=$_GET['Etapeid'];

    try 
    {
        deleteQuantites($id_recette);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
header('Location: http://localhost/Blog/Blog/CreerUneRecette/CreerIngredients.php?id='.$NombreIngredients.'&Etapeid='.$NombreEtape.'&recette_id='.$id_recette);
exit();
?>