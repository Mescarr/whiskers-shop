<?php

/* Session */

function checkSession() {
	if(isset($_SESSION['id']) && $_SESSION['username']) {
		return True;
	}
	else {
		return False;
	}
}

function destroySession() {
	session_destroy();
}

/* login page */

function loginForm()
{
	require_once('view/frontend/loginFormView.php');
}

function login($username, $password)
{
	require_once('model/connectUser.php');

 	//password_hash($password, PASSWORD_DEFAULT);

	$user = connectUser($username, $password);

	if ($user) {
		$user_id = $user->get_id();
		$user_username = $user->get_username();
	}

	if (isset($user_id) && isset($user_username)) {
		$_SESSION['id'] = $user_id;
		$_SESSION['username'] = $user_username;

		header('Location: index.php?action=listProducts');
	}

	else {
		header('Location: index.php?action=login&auth=error');
	}

}

/* listProducts page */

function getProducts() {

	require_once('model/listProducts.php');

	$id =  0; // Utilisé uniquement pour la sélection d'un produit
	$species = (isset($_POST['species'])) ? $_POST['species'] : 0;
	$category = (isset($_POST['category'])) ? $_POST['category'] : 0;
	$search = (isset($_POST['search'])) ? $_POST['search'] : NULL;
	$price_min = (isset($_POST['price_min'])) ? $_POST['price_min'] : 0;
	$price_max = (isset($_POST['price_max'])) ? $_POST['price_max'] : 0;
	$price_rank = (isset($_POST['price_rank'])) ? $_POST['price_rank'] : NULL;

	$arrayProducts = listProducts($id, $species, $category, $search, $price_min, $price_max, $price_rank);

	if(isset($_POST['idProduct']) && isset($_POST['quantity'])) {

		// Ajouter un produit au panier
		
	}


	require_once('view/frontend/listProductsView.php');
}

/* product page */

function product($id_product) {

	require_once('model/listProducts.php');

	$id =  (isset($_GET['id'])) ? $_GET['id'] : 0; // Utilisé uniquement pour la sélection d'un produit
	$species = 0;
	$category = 0;
	$search = NULL;
	$price_min = 0;
	$price_max = 0;
	$price_rank = NULL;

	$arrayProducts = listProducts($id, $species, $category, $search, $price_min, $price_max, $price_rank);

	require_once('view/frontend/productView.php');
}

/* cart page */

function cart() {
	require_once('view/frontend/cartView.php');
}