<?php 
require "../fonction.php";
require "../header.php";
if (isset($_GET['id']))
{
    $NombreEtape=$_GET['id'];
}
?>
<form action="" method="post">
<?php
    for ($i=1;$i<=$NombreEtape;$i++)
    {
    ?>
    <div class="form-group">
    <label for="exampleFormControlInput1">Etape <?=$i?></label>
    <input type="text" class="form-control" id="NomRecette" placeholder="patate" name="Etape<?=$i?>">
  </div>
  <?php 
    }
    ?>