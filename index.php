<?php

session_start();

require_once('controller/frontend.php');
require_once('controller/backend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listProducts') {
        listProducts();
    }
    elseif ($_GET['action'] == 'login') {
        if (checkSession()) {
            header('Location: index.php?action=listProducts');
        }
        elseif (isset($_POST['username']) && isset($_POST['password'])) {
            login($_POST['username'], $_POST['password']);
        }
        else {
            loginForm();
        }
    }
    elseif ($_GET['action'] == 'product') {
        if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
            product($_GET['id']);
        }
        else {
            header('Location: index.php?action=listProducts');
        }
    }
    elseif ($_GET['action'] == 'order') {
        if (checkSession()) {
            cart();
        }
        else {
            header('Location: index.php?action=listProducts');
        }
    }
    elseif ($_GET['action'] == 'admin') {
        if (checkSession()) {
            header('Location: index.php?action=adminPanel'); // Faille potentielle en utilisant le checkSession() user pour passer sur Panel Admin
        }
        elseif (isset($_POST['username']) && isset($_POST['password'])) {
            // login() de backend
        }
        else {
            loginAdminForm();
        }
    }
    elseif ($_GET['action'] == 'logout') {
      destroySession();
      header('Location: index.php?action=listProducts');
    }
    else{
        header('Location: index.php?action=listProducts');
    }
}
else {
    header('Location: index.php?action=listProducts');
}
