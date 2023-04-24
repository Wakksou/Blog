<?php 
require 'header.php';
require "fonction.php";
if (isset($_GET['id']))
{
$NombreIngredients=$_GET['id'];
$NombreEtape=$_GET['Etapeid'];
}
else header("Location: index.php");
$check=true;
for ($o=1;$o<=$NombreIngredients;$o++)
{
    if (empty ($_POST['Ingrédient'.$i.''])) 
    $check=false;
    break;
}
if ($check=true)
{
    $NomRecette=$_POST['NomRecette'];
    $DescriptionRecette=$_POST['DescriptionRecette'];
    $image=$_POST['image'];

    header ('Location: http://localhost/Blog/Blog/CreerEtapes.php?id='.$NombreEtape.'');
}

?>

<form action="" method="post">
<?php
    for ($i=1;$i<=$NombreIngredients;$i++)
    {
    ?>
        <div class="row">
            <div class='col'>
                <label for="exampleFormControlInput1">Ingrédient <?=$i?></label>
                <input type="text" class="form-control" id="NomRecette" placeholder="patate" name="Ingredient<?=$i?>">
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