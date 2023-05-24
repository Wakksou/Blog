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

function creerIngredients($ingredient,$Image)
{
    $database = connectiondb ();
    $request = " INSERT INTO ingredient (nom,image) VALUES (:nom,:image) ";
    $requête = $database ->prepare($request);
    $requête ->bindParam(":nom",$ingredient,PDO::PARAM_STR);
    $requête ->bindParam(":image",$Image,PDO::PARAM_STR);
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

function getAllUtilisateur() 
{
    $database = connectiondb ();
    $request = "SELECT * FROM comptes";
    $requête = $database->prepare($request);
    $requête -> execute();
    $result = $requête -> fetchAll();
    return $result ;
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

function deleteCommentaire($id)
{
    $database = connectiondb ();
    $request = "DELETE FROM commentaires
    WHERE id = :id";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id",$id,PDO::PARAM_INT);
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

function deleteQuantites($id_recette)
{
    $database = connectiondb ();
    $request = "DELETE FROM quantites
    WHERE id_recette = :id_recette";
    $requête = $database->prepare($request);
    $requête ->bindParam(":id_recette",$id_recette,PDO::PARAM_INT);
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

function getAllIngredients() 
{
    $database = connectiondb ();
    $request = "SELECT * FROM ingredient";
    $requête = $database->prepare($request);
    $requête -> execute();
    $result = $requête -> fetchAll();
    return $result ;
}

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

