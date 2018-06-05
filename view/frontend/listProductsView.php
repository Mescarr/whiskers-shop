<?php
  $title = 'Whiskers Shop';
  $banner = 'public/images/banderole.jpg';
  $link = '<link rel="stylesheet" href="public/css/listProductsView.css">';
?>

<?php ob_start(); ?>
<div id="listProductsBlock">
    <div id="searchBlock">

    </div>

    <div id="listProducts">
      <div> <img src="imgproduit" />
        <a href=".....">NomProduit</a>
         Decription produit
         Le Prix
      </div>

      <div> <img src="imgproduit" />
        <a href=".....">NomProduit</a>
         Decription produit
         Le Prix
      </div>

      <div> <img src="imgproduit" />
        <a href=".....">NomProduit</a>
         Decription produit
         Le Prix
      </div>

      <div> <img src="imgproduit" />
        <a href=".....">NomProduit</a>
         Decription produit
         Le Prix
      </div>

    </div>

    <div id="loginBlock">
      <?php
        if(False /*checkSession()*/) {

            echo '<p>' . $_SESSION['username'] . '</p>';
        }
        else{
          ?>
            <a href="?action=login">Se connecter</a>
          <?php
        }
      ?>
    </div>

    <div id="cartBlock">

    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
