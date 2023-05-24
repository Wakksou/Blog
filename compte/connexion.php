<?php
require "../fonction.php";
require "../header.php";

if (isset($_GET['id'])&& isset($_GET['Get']))
{
    $recette_id=$_GET['id'];
    $Get=$_GET['Get'];
}

if (!empty ($_POST['email']) && !empty ( $_POST['password']) ) 
{
    $options = [
        'cost' => 8,
    ];
    password_hash($_POST['password'], PASSWORD_BCRYPT, $options);

    if (password_verify($_POST['password'],getmdp($_POST['email'])) )
    {
        
        $_SESSION['email']= $_POST['email'];
        $_SESSION['Pseudo']= getpseudo($_POST['email']);
        $_SESSION['Ville']= getville($_SESSION['email']);
        $mail = $_SESSION['email'];
        $_SESSION['Age']= getage($mail);
        $date=date("Y-m-d H:i:s");
        $_SESSION['Moderateur']=getModerateur($_SESSION['email']);
        lastConnexion($date,$mail);
        if (isset($_GET['id']))
        {
            header('Location: http://localhost/Blog/Blog/recette.php?id='.$recette_id.'&Get='.$Get);
        }
        else 
        {
            header('Location: http://localhost/Blog/Blog/src/pages/index.php');
        }
    }
    else 
    {
        echo 'email ou mot de passe erroné';
    }
}

?>
<DOCTYPE html>
<html> 
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Votre adresse mail</label>
            <input placeholder= 'email@mail.com' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input placeholder= '1234' name = "password" type="password" class="form-control" id="exampleInputPassword1">
        </div>      
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<html> 