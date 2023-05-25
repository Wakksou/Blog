<?php
require "fonctionUser.php";

function deleteQuantites($id_recette)
{
    $database = connectiondb ();
    $request = "DELETE FROM quantites
    WHERE id_recette = :id_recette";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id_recette",$id_recette,PDO::PARAM_INT);
    $requête -> execute();
}

function deleteRecette($id)
{
    $database = connectiondb ();
    $request = "DELETE FROM recette
    WHERE id = :id";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id",$id,PDO::PARAM_INT);
    $requête -> execute();
}

function deleteEtapes($id_recette)
{
    $database = connectiondb ();
    $request = "DELETE FROM etape
    WHERE id_recette = :id_recette";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id_recette",$id_recette,PDO::PARAM_INT);
    $requête -> execute();
}

function insererEtapes($nom,$description,$numero,$id_recette)
{
    $database = connectiondb ();
    $request = " INSERT INTO etape (nom,description,numero,id_recette) VALUES (:nom,:description,:numero,:id_recette) ";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":nom",$nom,PDO::PARAM_STR);
    $requête ->bindParam(":description",$description,PDO::PARAM_STR);
    $requête ->bindParam(":numero",$numero,PDO::PARAM_INT);
    $requête ->bindParam(":id_recette",$id_recette,PDO::PARAM_INT);
    $requête -> execute(); 
}

function insererQuantites($id_recette,$id_ingredient,$quantite)
{
    $database = connectiondb ();
    $request = " INSERT INTO quantites (id_recette,id_ingredient,quantite) VALUES (:id_recette,:id_ingredient,:quantite) ";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":id_recette",$id_recette,PDO::PARAM_INT);
    $requête ->bindParam(":id_ingredient",$id_ingredient,PDO::PARAM_INT);
    $requête ->bindParam(":quantite",$quantite,PDO::PARAM_STR);
    $requête -> execute(); 
}

function getAllIngredients() 
{
    $database = connectiondb ();
    $request = "SELECT * FROM ingredient";
    $requête = $database->prepare($request);
    $requête -> execute();
    $result = $requête -> fetchAll();
    return $result ;
}

function creerRecette($NomRecette,$DescriptionRecette,$image,$auteur,$temps)
{
    $database = connectiondb ();
    $request = " INSERT INTO recette (nom,description,image,auteur,temps) VALUES (:nom,:description,:image,:auteur,:temps) ";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":nom",$NomRecette,PDO::PARAM_STR);
    $requête ->bindParam(":description",$DescriptionRecette,PDO::PARAM_STR);
    $requête ->bindParam(":image",$image,PDO::PARAM_STR);
    $requête ->bindParam(":auteur",$auteur,PDO::PARAM_STR);
    $requête ->bindParam(":temps",$temps,PDO::PARAM_STR);
    $requête -> execute(); 
}

function getIdRecette(string $nom,$auteur) 
{
    $database = connectiondb ();
    $request = "SELECT id FROM recette
    WHERE nom=:nom AND auteur=:auteur"; 
    $requête = $database->prepare($request);
    $requête -> bindParam(":nom",$nom,PDO::PARAM_STR);
    $requête -> bindParam(":auteur",$auteur,PDO::PARAM_STR);
    $requête -> execute();
    $result = $requête -> fetch();
    return $result['id'] ;
}
?>