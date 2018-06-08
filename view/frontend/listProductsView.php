<?php
  $title = 'Whiskers Shop';
  $banner = 'public/images/banderole.jpg';
  $link = '<link rel="stylesheet" href="public/css/font.css">
        <link rel="stylesheet" href="public/css/listProductsView.css">
  ';
?>

<?php ob_start(); ?>
<div id="listProductsBlock">

    <div id="headerBlock">
      <div id="bannerBlock">
        <img src="<?=$banner ?>" alt="" id="banner" />
      </div>

      <div id="loginBlock">
        <?php
          if(checkSession()) {

              echo '<p id="logout"><a href="?action=logout">Déconnexion</a></p>';
              echo '<p id="username">' . $_SESSION['username'] . '</p>';
          }
          else{
            ?>
              <p id="login"><a href="?action=login">Se connecter</a></p>
            <?php
          }
        ?>
      </div>
    </div>


    <div id="bodyBlock">

      <div id="listProducts">

        <div id="searchBlock">
          <form method="GET" action="?action=listProducts">
            <div id="search1">
              <p id="formCategoryBlock">
                 Catégorie :
                 <select name="category" id="category">
                   <option value="Tous"></option>
                   <option value="Alimentation">Alimentation</option>
                   <option value="Accessoire">Accessoire</option>
                   <option value="Cage">Cage</option>
                   <option value="Santé">Santé</option>
                   <option value="Jouet">Jouet</option>
                 </select>
              </p>
              <p id="formSearchBlock">
                Recherche :
                <input type="search" name="search" />
              </p>
              <p id="formPriceBlock">
               Prix :
                <input type="radio" name="prix" value="croissant" id="Croissant" /> <label for="Croissant">Croissant</label>
                <input type="radio" name="prix" value="decroissant" id="Décroissant" /> <label for="Décroissant">Décroissant</label>
              </p>
            </div>

            <div id="search2">
              <p id="formRangePriceBlock">
                Min : <input type="number" min="0" max="999999" step="1" value ="0" />€ -
                Max : <input type="number" min="0" max="999999" step="1" value="999999" />€
              </p>

              <input type="submit" value="Rechercher" id="searchButton" />
            </div>
          </form>
        </div>
        <!--
         Croquettes
        <div> <img src="carniloveChat.jpg" />
          <a href=".....">Carnilove pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="carniloveChien.jpg" />
          <a href=".....">Carnilove pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="orijenChat.jpg" />
          <a href=".....">Orijen pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="carniloveChien.jpg" />
          <a href=".....">Orijen pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="trueInstinctChat.jpg" />
          <a href=".....">True Instinct pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="trueInsinctChien.jpg" />
          <a href=".....">True Instinct pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="tasteWildChat.jpg" />
          <a href=".....">Taste of the Wild pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="tasteWildChien.jpg" />
          <a href=".....">Taste of the Wild pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="bunnyReveHamster.jpg" />
          <a href=".....">Bunny Reve pour Hamster</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="cuniLapin.jpg" />
          <a href=".....">Cuni Complete Adulte pour Lapin</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="sssRat.jpg" />
          <a href=".....">Supreme Science Selective pour Rats</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="sssSouris.jpg" />
          <a href=".....">Supreme Science Selective pour Souris</a> <br />
           Decription produit
           Le Prix
        </div>


        Hygiene
        <div> <img src="public/images/hygiene/brosseChat.jpg" />
          <a href=".....">Brosse pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/brosseChien.jpg" />
          <a href=".....">Brosse pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/peigneChat.jpg" />
          <a href=".....">Peigne pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/peigneChien.jpg" />
          <a href=".....">Peigne pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/antipuceChat.jpg" />
          <a href=".....">Anti-Puces pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/antipuceChien.jpg" />
          <a href=".....">Anti-Puces pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/LitiereChat.jpg" />
          <a href=".....">Litiere pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/sacFraicheur.jpg" />
          <a href=".....">Sacs Fraicheur pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/litiereRongeur.jpg" />
          <a href=".....">Cuni Complete Adulte pour Lapin</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/sableBain.jpg" />
          <a href=".....">Sable de Bain pour Hamster</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/brosseRongeur.jpg" />
          <a href=".....">Brosse pour Rongeurs</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/hygiene/coupeGriffe.jpg" />
          <a href=".....">Coupe Griffe pour Rongeurs</a> <br />
           Decription produit
           Le Prix
        </div>


         Accessoires
        <div> <img src="public/images/accessoire/laisse.jpg" />
          <a href=".....">Laisse pour Chat et Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/collierChien.jpg" />
          <a href=".....">Collier pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/harnaisChat.jpg" />
          <a href=".....">Harnais pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/harnaisChien.jpg" />
          <a href=".....">Harnais pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/gamelleChat.jpg" />
          <a href=".....">Gamelle pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/gamelleChien.jpg" />
          <a href=".....">Gamelle pour Chien</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/griffoire.jpg" />
          <a href=".....">Griffoire pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/litiereChat.jpg" />
          <a href=".....">Bac a Litiere pour Chat</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/gamelleRongeur.jpg" />
          <a href=".....">Gamelle pour Rongeurs</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/biberonRongeur.jpg" />
          <a href=".....">Biberon pour Rongeurs</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/litiereRongeur.jpg" />
          <a href=".....">Bac a Litiere pour Rongeurs</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/maisonLapinSourisHamster.jpg" />
          <a href=".....">Maison en bois pour Lapin, Souris et Hamster</a> <br />
           Decription produit
           Le Prix
        </div>

        <div> <img src="public/images/accessoire/maisonRatSouris.jpg" />
          <a href=".....">Maison pour Rats et Souris</a> <br />
           Decription produit
           Le Prix
        </div>
        -->
    </div>

    <div id="cartBlock">
      <div id="cartTitleBlock">
        <hr />
        <p id="cartTitle">Panier</p>
      </div>

      <div id="cartBlockList">

        <div id="cartList">
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière pour chat</div>
               <div class="price">999.99€</div>
           </div>
           <div class="product">
               <div class="quantity">999x</div>
               <div class="name">Litière</div>
               <div class="price">0.63€</div>
           </div>
        </div>
      </div>

    <div id="totalCartPriceBlock">
      <div id="totalCartPrice">
        <p id="totalPriceTitle">Prix total</p>
        <p id="totalPrice">200.00€</p>
      </div>
    </div>

    <div id="orderBlock">
      <p id="order"><a href="?action=order">Commander</a></p>
    </div>
  </div>

  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
