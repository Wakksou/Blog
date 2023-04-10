<?php 
require 'header.php';
?>
<DOCTYPE html>
<html>

<br>
<h4>Ingrédients</h4>
</br>
</br>

<div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Nombre de personne
  </button>  
  <div class="dropdown-menu">
    <a class="dropdown-item" href="#">1</a>
    <a class="dropdown-item" href="#">2</a>
    <a class="dropdown-item" href="#">3</a>
    <a class="dropdown-item" href="#">4</a>
  </div>
</div>

</br>
</br>

<?php 
$ingrediens_list = ["spaguettis","boeuf haché", "oignons","huile d'olive"];
$picture_list = ["https://i.goopics.net/29qix7.jpg","https://i.goopics.net/r5usil.jpg","https://i.goopics.net/wnmktn.jpg","https://i.goopics.net/o4c5mb.jpg"];
$ingrediens_list2 = ["sel","poivre","Tomates pelées"," Ail"];
$picture_list2 = ["https://i.goopics.net/8ninyx.jpg","https://i.goopics.net/ijossm.jpg","https://i.goopics.net/gtsd99.jpg","https://i.goopics.net/ys2446.jpg"]
?>

<div class="row">
  <div class="col-sm-6 mb-3 mb-sm-0">
    <div class="card">
      <div class="card-body">
        <?php 
        for ($p = 0; $p <= 3; $p++)
        {
        ?>
          <div class="card mb-1  float-right" style="width: 20rem;">
            <div class="row g-0 ">
              <div class="col-md-4">
                <img src="<?= $picture_list[$p]?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6><?= $ingrediens_list[$p]. ": 40g"?></h6>
                </div>
              </div>
            </div>
          </div>
        <?php 
        }
        ?>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <?php 
        for ($o = 0; $o <= 3; $o++)
        {
        ?>
          <div class="card mb-1  float-left" style="width: 20rem;">
            <div class="row g-0 ">
              <div class="col-md-4">
                <img src="<?= $picture_list2[$o]?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h6><?= $ingrediens_list2[$o] . ": 40g"?></h6>
                </div>
              </div>
            </div>
          </div>
        <?php 
        }
        ?>
      </div>
    </div>
  </div>
</div>

</br>
</br>
</br>
<h4>Préparation</h4>
</br>
</br>

<div class="row">
  <div class="col-4">
    <div id="list-example" class="list-group">
      <a class="list-group-item list-group-item-action" href="#list-item-1">Etape 1</a>
      <a class="list-group-item list-group-item-action" href="#list-item-2">Etape 2</a>
      <a class="list-group-item list-group-item-action" href="#list-item-3">Etape 3</a>
      <a class="list-group-item list-group-item-action" href="#list-item-4">Etape 4</a>
      <a class="list-group-item list-group-item-action" href="#list-item-5">Etape 5</a>
      <a class="list-group-item list-group-item-action" href="#list-item-6">Diététique</a>
      <a class="list-group-item list-group-item-action" href="#list-item-7">Astuces</a>
      <a class="list-group-item list-group-item-action" href="#list-item-8">Commentaires</a>
    </div>
  </div>
  <div class="col-8">
    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

      <h6 id="list-item-1"><h5>Etape 1</h5> Épluchez et émincez finement les oignons et l'ail.</h6>
      <p>...</p>
      </br>
      </br>
      <h6 id="list-item-2"><h5>Etape 2</h5>Faites chauffer l'huile d'olive dans une poêle sur feu vif. Quand l’huile d’olive est bien chaude, déposez les oignons et l’ail émincés dans la poêle et faites-les revenir pendant 3 min, en remuant bien, jusqu'à ce que les oignons soient bien translucides. Ajoutez ensuite la viande de bœuf hachée, puis poursuivez la cuisson pendant 3 à 4 min sans cesser de mélanger, jusqu'à ce qu'elle ne soit plus rosée.</h6>
      <p>...</p>
      </br>
      </br>
      <h6 id="list-item-3"><h5>Etape 3</h5>Incorporez les tomates pelées, les branches de thym et la feuille de laurier. Salez et poivrez selon vos goûts, ajoutez le sucre, puis mélangez. Baissez sur feu doux et laissez mijoter pendant 10 min environ, en remuant régulièrement.
      </h6>
      <p>...</p>
      </br>
      </br>
      <h6 id="list-item-4"><h5>Etape 4</h5>Pendant ce temps, portez à ébullition un grand volume d’eau salée dans une casserole sur feu vif. Dès l’ébullition, plongez les spaghettis dans l’eau bouillante et laissez-les cuire en suivant les instructions du paquet ou jusqu’à ce qu’ils soient al dente. Lorsque les spaghettis sont cuits, égouttez-les dans une passoire et réservez-les au chaud.
      </h6>
      <p>...</p>
      </br>
      </br>
      <h6 id="list-item-5"><h5>Etape 5</h5>Quand la sauce bolognaise est prête, rectifiez l’assaisonnement en sel et en poivre si nécessaire, puis nappez-en les spaghettis déposés dans les assiettes. Dégustez aussitôt.</h6>
      <p>...</p>
      </br>
      </br>
      <h6 id="list-item-6"><h5>Diététique</h5>La sauce bolognaise est la plus répandue et la plus revisitée des sauces italiennes ! Traditionnellement, il s’agit d’un plat d’hiver que l’on réalise avec des tomates pelées en boîte et du lard pour l’enrichir. Cette version plus classique est aussi plus intéressante d’un point de vue nutrition. En effet, elle contient du bœuf haché riche en protéines de qualité et en fer héminique bien absorbé par l’organisme. Pour rendre ce plat complet et sain, on l’accompagnera idéalement d’une salade verte ou de crudités et on évitera aussi d’avoir la main trop lourde sur le fromage râpé !</h6>
      <p>...</p>
      </br>
      </br>
      <h6 id="list-item-7"><h5>Astuces</h5>Si vous aimez les saveurs épicées, ajoutez une pointe de couteau de piment de Cayenne moulu dans la sauce bolognaise au cours de la cuisson. Vous pouvez également incorporer quelques feuilles de basilic hachées, qui s'allient à merveille avec la tomate. Au moment de servir, saupoudrez votre dôme de spaghettis de parmesan ou de gruyère râpé pour plus de gourmandise !</h6>
      <p>...</p>
    </div>
  </div>
</div>
<br>
<br>


<div class= "card  align-items-center w-100">
  <div class="card body w-75">
<div class="card ">
  <div class="card-header" id="list-item-8">
    Commentaires
  </div>

  <div class="card-body">
    <div class="card">
      <div class="card-header">
        Michou
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><h6>Masterclass t'a pas flop</h5></p>
          <footer class="blockquote-footer">le 10/04/2023</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>

  <div class="card-body">
    <div class="card">
      <div class="card-header">
        Inox
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><h6>Incroyable t'es le meilleur</h5></p>
          <footer class="blockquote-footer">le 11/04/2023</cite></footer>
        </blockquote>
      </div>
    </div>
  </div>



    </div>
  </div>
</div>


  