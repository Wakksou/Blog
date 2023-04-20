<?php 
require 'header.php';
require "fonction.php";
$Users=getAllUtilisateur();
$i=1;
?>
</br>
<p>
                <button class="btn btn-outline-secondary" type="button"data-toggle="collapse" data-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">Ajouter</button>
                <div style="min-height: 120px;">
                    <div class="collapse width" id="collapseWidthExample">
                        <div class="card card-body" style="width: 320px;">
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
                    </div>
                </div>
                </p>
