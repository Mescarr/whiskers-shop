<?php
  $title = 'Whiskers Shop';
  $banner = 'public/images/banderole.jpg';
  $link = '<link rel="stylesheet" href="public/css/font.css">
        <link rel="stylesheet" href="public/css/listProductsView.css">
  ';
?>

<?php ob_start(); ?>
<div id="listProductsBlock">

    <?php require_once('includes/headerInclude.php'); ?>

    <div id="bodyBlock">

      <div id="listProducts">

        <?php require_once('includes/searchInclude.php'); ?>

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

    <?php require_once('includes/cartInclude.php'); ?>

  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>
