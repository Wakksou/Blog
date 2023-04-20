<?php 
require 'header.php';
require "fonction.php";
$Users=getAllUtilisateur();
$i=1;
?>
</br>
<div class="card" style="width: 55rem;">
  <div class="card-body text-center">
    <h5 class="card-title">Liste des utilisateurs</h5>
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
      <td><?php if ($User['Moderateur'] ==true)
      {echo 'Modérateur';} else echo 'Membre' ?></td>
      <td>16/05/2023</td>
    </tr>
    <?php
    $i++;
        }
        ?>
  </tbody>
</table>
</div>