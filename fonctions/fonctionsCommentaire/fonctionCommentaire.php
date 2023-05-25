<?php


function posterCom($commentaire,$date,$auteur,$id_recette)
{
    $database = connectiondb ();
    $request = " INSERT INTO commentaires (commentaire,date,auteur,id_recette) VALUES (:commentaire,:date,:auteur,:id_recette) ";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":commentaire",$commentaire,PDO::PARAM_STR);
    $requête ->bindParam(":date",$date,PDO::PARAM_STR);
    $requête ->bindParam(":auteur",$auteur,PDO::PARAM_STR);
    $requête ->bindParam(":id_recette",$id_recette,PDO::PARAM_STR);
    $requête -> execute(); 
}

function getCommentaire($id)
{
    $database = connectiondb();
    $request = "SELECT * FROM commentaires
    WHERE id_recette=:id ORDER BY date DESC";
    $requête = $database ->prepare($request);
    $requête -> execute(['id'=>$id]); 
    $result= $requête ->fetchAll();
    return $result;
}

function deleteCommentaire($id)
{
    $database = connectiondb ();
    $request = "DELETE FROM commentaires
    WHERE id = :id";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id",$id,PDO::PARAM_INT);
    $requête -> execute();
}
?>