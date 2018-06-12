<?php
  $title = 'Whiskers Shop';
  $banner = 'public/images/banderole.jpg';
  $link = '<link rel="stylesheet" href="public/css/font.css">
        <link rel="stylesheet" href="public/css/frontend/productView.css">
        <link rel="stylesheet" href="public/css/frontend/includes/headerInclude.css">
        <link rel="stylesheet" href="public/css/frontend/includes/searchInclude.css">
        <link rel="stylesheet" href="public/css/frontend/includes/cartInclude.css">
  ';
?>

<?php ob_start(); ?>

<?php $product = $arrayProducts[0]; ?>

<div id="listProductsBlock">

    <?php require_once('includes/headerInclude.php'); ?>

    <div id="bodyBlock">

      <div id="listProducts">

        <?php require_once('includes/searchInclude.php'); ?>

        <div id="productBody">
          <div class="product">

            <div class="productImageBlock">
              <img class="productImage" src="public/images/<?php echo $product->get_id(); ?>.jpg" alt="" />
            </div>

            <div class="productLine">

              <div class="productLine1">
                <p class="productName"><?php echo $product->get_name(); ?></p>
                <p class="productPrice"><?php echo $product->get_price(); ?>€</p>
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
                    <input type="hidden" name="idProduct" value="<?php echo $product->get_id(); ?>" />
                    <input type="number" name="quantity" min="1" max="999" step="1" value="1" />
                    <input type="submit" value="Ajouter au panier" id="addCartButton" />
                  </form>
                </p>
              </div>

              <div class="descriptionBlock">
                <p class="descriptionTitle">Description</p>
                <p class="description"><?php echo $product->get_description(); ?></p>
              </div>

              <div class="informationsBlock">
                <p class="informationsTitle">Informations</p>
                <p class="informations">
                  <?php echo $product->get_characteristic(); ?>
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