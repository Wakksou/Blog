<?php
require "fonctionUser.php";

function getRecettes()
{
    $database = connectiondb();
    $request = " SELECT * from recette";
    $result = $database->query($request);
    return $result;
}

function getIngredient($id)
{
    $database = connectiondb();
    $request = "SELECT i.nom,i.image,q.quantite FROM recette as r
    INNER JOIN quantites as q ON r.id=q.id_recette
    INNER JOIN ingredient as i ON i.id = q.id_ingredient
    WHERE r.id=:id";
    $requête = $database ->prepare($request);
    $requête -> execute(['id'=>$id]); 
    $result= $requête ->fetchAll();
    return $result;    
}

function getEtape($id)
{
    $database = connectiondb();
    $request = "SELECT nom,description,numero FROM etape as e
    WHERE id_recette=:id ORDER BY numero ASC";
    $requête = $database ->prepare($request);
    $requête -> execute(['id'=>$id]); 
    $result= $requête ->fetchAll();
    return $result;
}

function getRecette($id)
{
    $database = connectiondb();
    $request = "SELECT * FROM recette
    WHERE id=:id";
    $requête = $database ->prepare($request);
    $requête -> execute(['id'=>$id]); 
    $result= $requête ->fetchAll();
    return $result;
}

function getQuantites($id)
{
    $database = connectiondb();
    $request = "SELECT i.nom,i.image FROM recette as r
    INNER JOIN quantites as q ON r.id=q.id_recette
    INNER JOIN ingredient as i ON i.id = q.id_ingredient
    WHERE r.id=:id";
    $requête = $database ->prepare($request);
    $requête -> execute(['id'=>$id]); 
    $result= $requête ->fetchAll();
    return $result;    
}
?>