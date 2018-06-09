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
                Min : <input type="number" min="0" max="999999" step="1" value ="0" />€
                Max : <input type="number" min="0" max="999999" step="1" value="999999" />€
              </p>

              <input type="submit" value="Rechercher" id="searchButton" />
            </div>
          </form>
        </div>

        <div id="listProductsBody">
          <div class="product">

            <div class="productImage">
              <img src="public/images/croquettes/carniloveChat.jpg" alt="" />
            </div>

            <div class="productLine">

              <div class="productLine1">
                <p class="productName"><a href="?action=product&amp;id=">Carnilove pour Chat</a></p>
                <p class="productPrice">54€<sup>00</sup></p>
              </div>

              <div class="productLine2">
                <p>
                  <span class="ttcText">Prix TTC,</span><br />
                  <span class="noteShippingCosts">Hors frais d'envoi</span>
                </p>
              </div>

              <div class="productLine3">
                <p class="productLine3Text">
                  <form method="POST" action="?action=listProducts" class="productForm">
                  <a href="?action=product&amp;id=">plus de détails »</a>
                    <input type="number" min="1" max="999" step="1" value="1" />
                    <input type="submit" value="Ajouter au panier" id="addCartButton" />
                  </form>

                </p>
              </div>

            </div>

          </div>

        </div>
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
               <div class="price">999€<sup>99</sup></div>
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
