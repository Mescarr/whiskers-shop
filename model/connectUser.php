<?php

  // Entrées: nom d'utilisateur et mot de passe
  function connectUser($username,$hash){

    //Connection à MySQL
    require 'Manager.class.php';
    $manager = new Manager;
    $bdd = $manager -> connect_bdd();

    //Test de fonctionnement
      echo "Connecté <br><br>";

    //Verification du nom d'utilisateur et mot de passe
    $requete = "SELECT COUNT(u_id) FROM ws_user WHERE u_username LIKE :username AND u_hash LIKE :hash";

    $requete_pwd = $bdd -> prepare($requete);
    $requete_pwd -> execute(array(
      'username' => $username,
      'hash' => $hash));

    $resultat = $requete_pwd -> fetch();

    //Test de fonctionnement
      echo 'Requete: '.$requete.'<br><br>';
      echo 'Utilisateur et mdp valide: '.$resultat[0][0].'<br><br>';

    if ($resultat[0][0] == 1){

      // Recuperation des informations sur l'utilisateur
      $requete = "SELECT * FROM ws_user WHERE u_username LIKE :username AND u_hash LIKE :hash";
      $requete_info = $bdd->prepare($requete);
      $requete_info -> execute(array(
        'username' => $username,
        'hash' => $hash));

      $tableau = $requete_info->fetch();

      // Création d'un objet utilisateur comportant ses informations et son panier
      require 'User.class.php';
      $utilisateur = new User($tableau);

      // Test de fonctionnement
        echo 'Affichage Objet Utilisateur<br> ';
        echo $utilisateur -> get_id();
        echo $utilisateur -> get_username();
        echo $utilisateur -> get_hash();
        echo $utilisateur -> get_registration_datetime();
        echo $utilisateur -> get_last_connection_datetime();


        echo '<br><br>Affichage du Tableau résultant de la requete<br>';
        var_dump($tableau);
        echo '<br><br>Nb ligne: '.count($tableau)/2;

      //Fermeture de connexion
      //$bdd->closeCursor();

      //Sortie: Tableau d'objet utilisateur
      return $utilisateur; }

    else {  }
  }
