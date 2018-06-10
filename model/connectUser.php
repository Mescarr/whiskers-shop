<?php

  // Entrées: nom d'utilisateur et mot de passe
  function connectUser($username,$hash){

    //Connection à MySQL
    require 'Manager.class.php';
    $manager = new Manager;
    $bdd = $manager -> connect_bdd();

    //Test de fonctionnement

    //Verification du nom d'utilisateur et mot de passe
    $requete = "SELECT COUNT(u_id) FROM ws_user WHERE u_username LIKE :username AND u_hash LIKE :hash";

    $requete_pwd = $bdd -> prepare($requete);
    $requete_pwd -> execute(array(
      'username' => $username,
      'hash' => $hash));

    $resultat = $requete_pwd -> fetch();

    if ($resultat[0][0] == 1){

      // Mise à jour de la date de dernière connexion de l'utilisateur
      $requete = "UPDATE ws_user SET u_last_connection_datetime = NOW() WHERE u_username LIKE :username AND u_hash LIKE :hash";
      $requete_info = $bdd->prepare($requete);
      $requete_info -> execute(array(
        'username' => $username,
        'hash' => $hash));

      // Recuperation des informations sur l'utilisateur
      $requete = "SELECT * FROM ws_user WHERE u_username LIKE :username AND u_hash LIKE :hash";
      $requete_info = $bdd->prepare($requete);
      $requete_info -> execute(array(
        'username' => $username,
        'hash' => $hash));

      $tableau = $requete_info->fetch();

      // Création d'un objet utilisateur comportant ses informations
      require 'User.class.php';
      $utilisateur = new User($tableau);

      //Fermeture de connexion
      //$bdd->closeCursor();

      //Sortie: Objet Utilisateur
      return $utilisateur; }

    else {  }
  }

$user = connectUser('user1','pass1');
