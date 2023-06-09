<?php

function connectiondb () : PDO
{
    try
    {
        $database = new PDO('mysql:host=localhost;dbname=recettes;charset=utf8','root','');
        $database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        return $database;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}

function inscription($mail,$pseudo,$ville,$mdp,$age)
{
    $database = connectiondb ();
    $request = " INSERT INTO comptes (Mail,Pseudo,Age,Ville,Motdepasse) VALUES (:mail,:pseudo,:age,:ville,:mdp) ";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);
    $requête ->bindParam(":pseudo",$pseudo,PDO::PARAM_STR);
    $requête ->bindParam(":age",$age,PDO::PARAM_INT);
    $requête ->bindParam(":ville",$ville,PDO::PARAM_STR);
    $requête ->bindParam(":mdp",$mdp,PDO::PARAM_STR);
    $requête -> execute(); 
}

function lastConnexion($date,$mail)
{
    $database = connectiondb ();
    $request = " UPDATE comptes 
    SET LastConnexion= :LastConnexion 
    WHERE Mail = :mail";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":LastConnexion",$date,PDO::PARAM_STR);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);
    $requête -> execute(); 
}

function deleteUtilisateur($id)
{
    $database = connectiondb ();
    $request = "DELETE FROM comptes
    WHERE IDCompte = :id";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id",$id,PDO::PARAM_INT);
    $requête -> execute();
}

function modifierMdp($mdp,$mail)
{
    $database = connectiondb ();
    $request = " UPDATE comptes
    SET Motdepasse = :mdp
    WHERE Mail = :mail";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mdp",$mdp,PDO::PARAM_STR);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);
    $requête -> execute(); 
}

function modifierProfil($newmail,$pseudo,$ville,$age,$mail)
{
    $database = connectiondb ();
    $request = " UPDATE comptes
    SET Mail = :newmail,
    Pseudo = :pseudo,
    Age = :age,
    Ville = :ville
    WHERE Mail = :mail";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":newmail",$newmail,PDO::PARAM_STR);
    $requête ->bindParam(":pseudo",$pseudo,PDO::PARAM_STR);
    $requête ->bindParam(":age",$age,PDO::PARAM_INT);
    $requête ->bindParam(":ville",$ville,PDO::PARAM_STR);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);
    $requête -> execute(); 
}

function getutilisateur(string $mail) 
{
    $database = connectiondb ();
    $request = "SELECT * FROM comptes
    WHERE Mail=:mail"; // WHERE Colonne=:Valeur
    $requête = $database->prepare($request);
    $requête -> bindParam(":mail",$mail,PDO::PARAM_STR);
    $requête -> execute();
    $result = $requête -> fetch();
    return $result ;
}

function getmdp(string $mail)
{
    $database = connectiondb ();
    $request = ' SELECT Motdepasse FROM comptes 
    WHERE Mail=:mail';
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);;
    $requête -> execute();
    $result = $requête -> fetch(); 
    return $result['Motdepasse'] ;
}

function getpseudo(string $mail) 
{
    $database = connectiondb ();
    $request = ' SELECT Pseudo FROM comptes 
    WHERE Mail=:mail';
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);;
    $requête -> execute();
    $result = $requête -> fetch(); 
    return $result['Pseudo'] ;
}

function getModerateur(string $mail) 
{
    $database = connectiondb ();
    $request = ' SELECT Moderateur FROM comptes 
    WHERE Mail=:mail';
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);;
    $requête -> execute();
    $result = $requête -> fetch(); 
    return $result['Moderateur'] ;
}

function getville(string $mail) 
{
    $database = connectiondb ();
    $request = ' SELECT Ville FROM comptes 
    WHERE Mail=:mail';
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);;
    $requête -> execute();
    $result = $requête -> fetch(); 
    return $result['Ville'] ;
}

function getage(string $mail) 
{
    $database = connectiondb ();
    $request = ' SELECT Age FROM comptes 
    WHERE Mail=:mail';
    $requête = $database ->prepare($request);
    $requête ->bindParam(":mail",$mail,PDO::PARAM_STR);;
    $requête -> execute();
    $result = $requête -> fetch(); 
    return $result["Age"] ;
}
?>