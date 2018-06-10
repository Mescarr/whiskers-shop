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

function listProducts() {
	require_once('view/frontend/listProductsView.php');
}

/* product page */

function product($id_product) {
	require_once('view/frontend/productView.php');
}

/* cart page */

function cart() {
	require_once('view/frontend/cartView.php');
}
