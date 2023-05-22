<?php
require 'fonction.php';
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    try 
    {
        deleteCommentaire($id);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
$recette_id=$_GET['recette_id'];
header('Location: recette.php?id='.$recette_id);
exit();

?>