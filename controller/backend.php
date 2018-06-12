<?php

function checkAdminSession() {
	if(isset($_SESSION['id_admin']) && $_SESSION['username_admin']) {
		return True;
	}
	else {
		return False;
	}
}

function loginAdminForm() {
	require_once('view/backend/adminLoginFormView.php');
}

function gestion()
{
	require_once('view/backend/gestion.php');
}