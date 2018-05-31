<?php
  function connectUser($username,$hash){
    //Connection à MySQL
    $bdd = new PDO();

    //Verification du nom d'utilisateur et mot de passe
    $requete = "SELECT COUNT(u_id) FROM ws_user WHERE u_username LIKE :username AND u_hash LIKE :hash;";
    $requete_pwd = $bdd->prepare($requete);
    $requete_pwd -> execute(array(
      'username' => $username,
      'hash' => $hash));

    $resultat = $requete_pwd->fetch();

    if ($resultat == 1){
      // Recuperation des informations sur l'utilisateur
      $requete = "SELECT * FROM ws_user WHERE u_username LIKE :username AND u_hash LIKE :hash;";
      $requete_info = $bdd->prepare($requete);
      $requete_info -> execute(array(
        'username' => $username,
        'hash' => $hash));

      $tableau = $requete_info->fetch();

      // Création d'un objet utilisateur
      $utilisateur = new User($tableau);

      return $utilisateur; }

    else {  }

  }
