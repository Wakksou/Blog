<?php

function getAllUtilisateur() 
{
    $database = connectiondb ();
    $request = "SELECT * FROM comptes";
    $requête = $database->prepare($request);
    $requête -> execute();
    $result = $requête -> fetchAll();
    return $result ;
}
?>