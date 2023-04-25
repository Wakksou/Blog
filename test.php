<?php 
require 'header.php';
require "fonction.php";
$Users=getAllUtilisateur();
$i=1;
var_dump(getModerateur($_SESSION['email']));
?>
<form action="" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Ajouter un ingrédient</label>
    <input type="text" class="form-control" id="NomRecette" placeholder="patate" name="NomIngredient">
    <input type="submit" value="Ajouter">
  </div>
<form action="" method="post">
<?php
    for ($i=1;$i<=10;$i++)
    {
    ?>
        <div class="row">
            <div class='col'>
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Ingredient</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref">
    <option selected>Choose...</option>
    <?php for ($n=1;$n<=50;$n++)
    { ?>
    <option value="<?=$n?>"><?=$n?></option>
    <?php } ?>
  </select>
            </div>
            <div class='col'>
                <label for="exampleFormControlInput1">Quantités</label>
                <input type="text" class="form-control" id="NomRecette" placeholder="30g" name="Quantites<?=$i?>">
            </div>
            <div class='col'>
                <label for="exampleFormControlInput1">Image</label>
                <input type="text" class="form-control" id="NomRecette" placeholder="https://i.goopics.net/wez33h.jpg" name="Image<?=$i?>">
            </div>
        </div>
    </br>
    <?php
    }
    ?>
    <input type="submit" value="Suivant">
</form>

