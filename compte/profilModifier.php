<?php
require "../fonction.php";
require "../header.php";
if (isset($_GET['id']))
{
$user_id=$_GET['id'];
}
else header("Location: index.php");

if (!empty ( $_POST['password'])) 
{
    if (password_verify($_POST['password'],getmdp($_POST['email'])) )
    {

        $newmail=$_POST['email'];
        $pseudo=$_POST['pseudo'];
        $ville=$_POST['ville'];
        $age=$_POST['age'];
        $mail=$_SESSION['email'];

        try 
            {
        modifierProfil($newmail,$pseudo,$ville,$age,$mail);
    }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
    }
    else 
    {
        echo 'mot de passe erroné';
    }
}

if (!empty ( $_POST['oldpassword'])&& !empty ( $_POST['newpassword'])) 
{
    $options = [
        'cost' => 8,
    ];
    password_hash($_POST['oldpassword'], PASSWORD_BCRYPT, $options);

    if (password_verify($_POST['oldpassword'],getmdp($_SESSION['email'])) )
    {

        $newmdp=$_POST['newpassword'];
        $mail=$_SESSION['email'];

        $options = [
            'cost' => 8,
        ];
        $NewpasswordHashe=password_hash($newmdp, PASSWORD_BCRYPT, $options);

        try 
            {
        modifierMdp($NewpasswordHashe,$mail);
    }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
    }
    else 
    {
        echo 'Ancien mot de passe erroné';
    }
}
?>

<DOCTYPE html>
    <html>
    <body>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Votre adresse mail</label>
                <input placeholder= '' name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"type="text" name="nom_champ" id="id_champ" value="<?= $_SESSION['email']?>" onFocus="this.value='';">
                <div id="emailHelp">
            </div>
            <br>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Pseudo</label>
                <input placeholder= '' name = "pseudo" type="text" class="form-control" id="exampleInputPassword1"type="text" name="nom_champ" id="id_champ" value="<?= $_SESSION['Pseudo']?>" onFocus="this.value='';">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Ville</label>
                <input placeholder= '<?= $_SESSION['Ville']?>' name = "ville" type="text" class="form-control" id="exampleInputPassword1"type="text" name="nom_champ" id="id_champ" value="<?= $_SESSION['Ville']?>" onFocus="this.value='';">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Age</label>
                <input placeholder= '<?= $_SESSION['Age']?>' name = "age" type="text" class="form-control" id="exampleInputPassword1"type="text" name="nom_champ" id="id_champ" value="<?= $_SESSION['Age']?>" onFocus="this.value='';">
            </div>
            Mot de passe
            <div class="input-group mb-3">
                <label for="exampleInputPassword1" class="form-label"></label>
                <input placeholder= 'MoTdEPAssE9!72?' name = "password" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
                
                <p>
                <button class="btn btn-outline-secondary" type="button"data-toggle="collapse" data-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Modifier mot de passe</button>
                <div style="min-height: 120px;">
                    <div class="collapse width" id="collapseWidthExample">
                        <div class="card card-body" style="width: 320px;">
                        <form action="" method="post">
                        Ancien mot de passe
                        <div class="input-group mb-3">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <input placeholder= 'MoTdEPAssE9!72?' name = "oldpassword" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
                        </div>
                        Nouveau mot de passe
                        <div class="input-group mb-3">
                            <label for="exampleInputPassword1" class="form-label"></label>
                            <input placeholder= 'MoTdEPAssE9!72?' name = "newpassword" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
                        </div>
                        <input type="submit" value="Modifier">
                        </form>
                        </div>
                    </div>
                </div>
                </p>

            </div>
            <?php if (isset($_GET['affiche']))
            {
                ?>
                <div class="input-group mb-3">
                <label for="exampleInputPassword1" class="form-label"></label>
                <input placeholder= 'MoTdEPAssE9!72?' name = "password2" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
            </div>
            <?php
            } 
            ?>           
            <input type="submit" value="Modifier">
        </form>
        </body>
        </html>