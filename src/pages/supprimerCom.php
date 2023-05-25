<?php
require '../../fonctions/fonctionsCommentaire/fonctionCommentaire.php';
require "../../fonctions/fonctionUser.php";

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
header('Location: http://localhost/Blog/Blog/src/pages/recette.php?id='.$recette_id);
exit();

?>