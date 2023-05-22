<?php 
require 'header.php';
require "fonction.php";
$Users=getAllUtilisateur();
$i=1;

if ($_SESSION['Moderateur']==0)
{
  header("Location: http://localhost/Blog/Blog/index.php");
  exit();
}

if (!empty ($_POST['email']) && !empty ( $_POST['password']) && !empty ( $_POST['pseudo'])) 
{
  $mail=$_POST['email'];
  $password=$_POST['password'];
  $pseudo=$_POST['pseudo'];
  $ville=NULL;
  $age=NULL;
  $options = 
  [
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
  </br>
  <div class="card" style="width: 60rem;">
    <div class="card-body text-center">
      <h5 class="card-title">Liste des utilisateurs</h5>
      <p>
        <button class="btn btn-outline-secondary" type="button"data-toggle="collapse" data-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Ajouter</button>
        <div class="collapse width" id="collapseWidthExample">
          <form action="" method="post">
            Pseudo
            <div class="input-group mb-3">
              <label for="exampleInputPassword1" class="form-label"></label>
              <input placeholder= 'Lulustucru' name = "pseudo" type="text" class="form-control" id="exampleInputPassword1" class="form-text">
            </div>
            Mail
            <div class="input-group mb-3">
              <label for="exampleInputPassword1" class="form-label"></label>
              <input placeholder= 'email@mail.com' name = "email" type="email" class="form-control" id="exampleInputPassword1" class="form-text">
            </div>
            Mot de passe
            <div class="input-group mb-3">
              <label for="exampleInputPassword1" class="form-label"></label>
              <input placeholder= 'MoTdEPAssE9!72?' name = "password" type="password" class="form-control" id="exampleInputPassword1" class="form-text">
            </div>
            <input type="submit" value="Modifier">
          </form>
        </div>
      </p>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Pseudo</th>
          <th scope="col">Mail</th>
          <th scope="col">Statut</th>
          <th scope="col">Connexion</th>
          <th scope="col">Configuration</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($Users as $User) 
      {
      ?>
        <tr>
          <th scope="row"><?= $i ?></th>
          <td><?= $User['Pseudo']?></td>
          <td><?= $User['Mail'] ?></td>
          <td>
            <?php if ($User['Moderateur'] ==true)
            {
              echo 'Modérateur';
            } 
            else echo 'Membre' ?>
          </td>
          <td><?= $User['LastConnexion'] ?></td>
          <td>
            <a href='http://localhost/Blog/Blog/compte/supprimerProfil.php?id=<?=$User['IDCompte']?>'>
              <button type="button" class="btn btn-outline-secondary">Supprimer</button>
            </a>
          </td>
        </tr>
      <?php
      $i++;
      }
      ?>
      </tbody>
    </table>
  </div>
<html>

