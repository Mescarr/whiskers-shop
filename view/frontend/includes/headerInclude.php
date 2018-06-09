<div id="headerBlock">
  <div id="bannerBlock">
    <img src="<?=$banner ?>" alt="" id="banner" />
  </div>

  <div id="loginBlock">
    <?php
      if(checkSession()) {

          echo '<p id="logout"><a href="?action=logout">Déconnexion</a></p>';
          echo '<p id="username">' . $_SESSION['username'] . '</p>';
      }
      else{
        ?>
          <p id="login"><a href="?action=login">Se connecter</a></p>
        <?php
      }
    ?>
  </div>
</div>