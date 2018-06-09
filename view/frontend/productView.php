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
<div id="listProductsBlock">

    <?php require_once('includes/headerInclude.php'); ?>

    <div id="bodyBlock">

      <div id="listProducts">

        <?php require_once('includes/searchInclude.php'); ?>

        <div id="productBody">
          <div class="product">

            <div class="productImageBlock">
              <img class="productImage" src="public/images/croquettes/carniloveChat.jpg" alt="" />
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
                    <input type="number" min="1" max="999" step="1" value="1" />
                    <input type="submit" value="Ajouter au panier" id="addCartButton" />
                  </form>
                </p>
              </div>

              <div class="descriptionBlock">
                <p class="descriptionTitle">Description</p>
                <p class="description">Carnilove Adult Cat au saumon Sensitive & Long hair est une alimentation pour chats adultes formulée dans le respect de la composition naturelle de l’alimentation féline. 
                La viande et le gras du saumon sont des sources idéales d’acides gras oméga-3 non saturés qui ont des propriétés anti-infl ammatoires et améliorent la qualité du pelage et de la peau. 
                De plus, les protéines de saumon sont non allergènes et constituent donc une source d’alimentation idéale pour les chats avec une digestion sensible.<br />
                <br />
                Contenant des baies forestières, des légumes et des herbes, cette formule fournit chaque jour les nutriments, les vitamines, les minéraux et les antioxydants essentiels au maintien d’une excellente condition physique et d’une bonne immunité naturelle</p>
              </div>

              <div class="informationsBlock">
                <p class="informationsTitle">Informations</p>
                <p class="informations">
                  Saumon déshydraté moulu (30%), pois jaunes (17%), saumon désossé (16%), hareng déshydraté moulu (14%), graisse de poulet (préservée avec de la Vitamine E, 9%), foie de poulet (3%), huile de saumon (3%), amidons de tapioca (2%), pommes (2%), carottes (1%), graines de lin (1%), pois chiches (1%), coquilles de crustacées (source de glucides 0,026%), extrait de cartilage (source de chondroïtine 0,016%), levure de bière (source de Mannane-oligosasccharide 0,016%), racine de chicorée (source de Fructo-oligosaccharide 0,012%), yucca schidigera (0,01%), algues (0,01%), psyllum (0,01%), thym (0,01%), romarin (0,01%), origan (0,01%), canneberges (0,0008%), myrtilles (0,0008%), framboises (0,0008%) - Oméga 3 : 1,05% - Oméga 6 : 2,42%. Sans céréales et sans pommes de terre.
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