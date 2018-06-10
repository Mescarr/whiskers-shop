<?php
  $title = 'Mon panier';
  $banner = 'public/images/banderole.jpg';
  $link = '<link rel="stylesheet" href="public/css/font.css">
        <link rel="stylesheet" href="public/css/frontend/cartView.css">
        <link rel="stylesheet" href="public/css/frontend/includes/headerInclude.css">
  ';
?>

<?php ob_start(); ?>

<?php require_once('includes/headerInclude.php'); ?>

<div id="cartBlock">
	<p id="cartTitle">Votre panier</p>
	<div class="product">

		<img src="public/images/croquettes/carniloveChat.jpg" alt="" />

		<div class="nameProduct">
			<p><a href="?action=product&amp;id=1">Carnilove pour Chat</a></p>
		</div>

		<div class="quantityProduct">
			<form method="POST" action="?action=order">
				<input type="number" name="quantity" value="3" />
				<input type="submit" value="Modifier" id="quantityButton" />
			</form>
		</div>

		<div class="priceProduct">
			<p class="price">153€<sup>64</sup></p>
		</div>

		<a href="?action=order&amp;delete=1"><p class="delete">X</p></a>
	</div>

	<div id="totalCartPriceBlock">
	    <div id="totalCartPrice">
	     	<p id="totalPriceTitle">Prix total</p>
	    	<p id="totalPrice">200€<sup>00</sup></p>
	    </div>
	    <a id="validCart" href="?action=order&amp;validCart=1"><p>Commander</p></a>
	</div>

	<a id="deleteCart" href="?action=order&amp;delete=all"><p>Vider le panier</p></a>

	
</div>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>