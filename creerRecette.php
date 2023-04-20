
<?php 
require 'header.php';
require "fonction.php";
?>
</br>
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Nom de la recette</label>
    <input type="text" class="form-control" id="NomRecette" placeholder="patate">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Nombre d'ingrédient</label>
    <select class="form-control" id="NombreIngredient">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
      <option>11</option>
      <option>12</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Nombre d'étape dans la préparation</label>
    <select class="form-control" id="NombreEtape">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
      <option>6</option>
      <option>7</option>
      <option>8</option>
      <option>9</option>
      <option>10</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description de la recette</label>
    <textarea class="form-control" id="description" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Temps nécessaire a la confection</label>
    <textarea class="form-control" id="temps" rows="1"></textarea>
  </div>
</form>