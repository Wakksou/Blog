<?php 
require '../header.php';
require '../fonction.php';

if (!empty ($_POST['email']) && !empty ( $_POST['password']) && !empty ( $_POST['pseudo']) && !empty ( $_POST['ville']) 
&& !empty ( $_POST['age']) ) 
{

    $mail=$_POST['email'];
    $password=$_POST['password'];
    $pseudo=$_POST['pseudo'];
    $ville=$_POST['ville'];
    $age=$_POST['age'];

    $options = [
        'cost' => 8,
    ];
    $passwordHashe=password_hash($password, PASSWORD_BCRYPT, $options);

    try 
        {
inscription($mail,$pseudo,$ville,$passwordHashe,$age);
}
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
}
?>

<DOCTYPE html>
<html>
    <body>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Votre adresse mail*</label>
                <input placeholder= 'email@mail.com' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Pseudo*</label>
                <input placeholder= 'Lulustucru' name = "pseudo" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ville</label>
                <input placeholder= 'Lyon' name = "ville" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Age</label>
                <input placeholder= '26 ans' name = "age" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe*</label>
                <input placeholder= 'MoTdEPAssE9!72?' name = "password" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
            </div>
            
            <input type="submit" value="M'inscrire">
        </form>
    </body>
</html>




