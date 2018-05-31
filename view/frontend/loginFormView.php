<?php $title = 'Se Connecter'; ?>

    <?php require('template.php'); ?>

    <div class="connection_block">
        <h3>Connexion</h3>

        <form method="post" action="?action=login">
            <div class="inputForm">
              <label>Pseudo</label> <br />
              <input type="text" name="pseudo" />
            </div>

            <div class="inputForm">
              <label for="pass">Mot de passe</label> <br />
              <input type="password" name="pass" />
            </div>

            <label for="connection_auto"><input type="checkbox" name="connection_auto" id="connection_auto" />Connexion Automatique</label> <br />
            <input type="submit" value="Connexion" />
        </form>

    </div>
