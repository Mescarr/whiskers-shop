<?php $title = 'Whiskers Shop'; ?>


<?php ob_start(); ?>

<h1>Mon super blog !</h1>

<p>Derniers billets du blog :</p>



<?php

while ($data = $posts->fetch())

{

?>
    <div class="connection_block">
        <h3>
          <u>Connexion</u>
        </h3>

        <form method="post" action="fictif.php">
          <p>
            <label>Pseudo</label>
            <input type="text" name="pseudo" />
            <label for="pass">Mot de passe</label>
            <input type="password" name="pass" />
            <input type="checkbox" name="connection_auto" /> <label for="connection_auto">Connexion Automatique</label>
            <input type="submit" value="Connexion" />
          </p>

        </form>

    </div>

<?php

}

$posts->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
