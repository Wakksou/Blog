<?php
require '../../fonctions/fonctionRecette.php';

if (isset($_GET['id']))
{
    $id_recette=$_GET['id'];
    try 
    {
        deleteEtapes($id_recette);
        deleteQuantites($id_recette);
        deleteRecette($id_recette);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
header('Location: http://localhost/Blog/Blog/src/pages/dashboard.php');
exit();
?>