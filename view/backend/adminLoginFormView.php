<?php
  $title = 'Panel Admin';
  $banner = NULL;
  $link = '<link rel="stylesheet" href="public/css/font.css">
        <link rel="stylesheet" href="public/css/loginFormView.css">
  ';
?>

<?php ob_start(); ?>

<?php 
  if (isset($_GET['auth'])) {
    if ($_GET['auth'] == 'error') {
      ?>
        <div class="error_block">
          <p>Les identifiants sont incorrects.</p>
        </div>
      <?php
    }
  }
?>

<div class="connection_block">

    <form method="post" action="?action=admin" id="login_form">

      <h3>Panel Admin</h3>

      <div class="inputForm">
        <label>Nom d'utilisateur</label> <br />
        <input type="text" name="username" id="username" required="required" autofocus />
      </div>

      <div class="inputForm">
        <label>Mot de passe</label> <br />
        <input type="password" name="password" id="password" required="required"/>
      </div>
      <br />
      <input type="submit" value="Se connecter" />
    </form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require_once('template.php'); ?>