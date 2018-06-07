<?php

session_start();

require_once('controller/frontend.php');

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
