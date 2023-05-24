<?php
require '../fonction.php';
if (isset($_GET['id']))
{
    $id=$_GET['id'];
    try 
    {
        deleteUtilisateur($id);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}
header('Location: http://localhost/Blog/Blog/src/pages/dashboard.php');
exit();

?>