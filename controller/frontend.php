<?php

//require_once('model.php');

function loginForm()
{
	require_once('view/loginFormView.php');
}

function login($username, $password)
{
	$hash = password_hash($password, PASSWORD_DEFAULT);

	connectUser($username, $hash);

}
