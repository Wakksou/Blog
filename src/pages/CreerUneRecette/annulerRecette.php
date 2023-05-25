<?php
require '../../../fonctions/fonctionRecette.php';

if (isset($_GET['id']))
{
    $id_recette=$_GET['id'];
    try 
    {
        deleteRecette($id_recette);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
header('Location: http://localhost/Blog/Blog/CreerUneRecette/creerRecette.php');
exit();
?>