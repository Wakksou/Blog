<?php
require "fonctionUser.php";

function rechercheNom($rechercheNom) 
{
    $database = connectiondb ();
    $request = "SELECT * FROM recette WHERE nom Like '%$rechercheNom%'";
    $requête = $database->prepare($request);
    $requête -> execute();
    $result = $requête -> fetchAll();
    return $result ;
}

function rechercheAuteur($recherche) 
{
    $database = connectiondb ();
    $request = "SELECT * FROM recette WHERE auteur Like '%$recherche%'";
    $requête = $database->prepare($request);
    $requête -> execute();
    $result = $requête -> fetchAll();
    return $result ;
}
?>