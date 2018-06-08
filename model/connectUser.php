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

    //Test de fonctionnement
      echo 'Requete: '.$requete.'<br><br>';
      echo 'Utilisateur et mdp valide: '.$resultat[0][0].'<br><br>';

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

//$tab_prod = array("p_id" => 1255, "p_fk_category_id" => 12,"p_name" => "produit test","p_price" => 10000, "p_description" => "blabla", "p_characteristic" => "carac", "p_added_datetime" => '2008-50-30',0 => 1255, 1 => 12,2 => "produit test",3 => 10000, 4 => "blabla", 5 => "carac", 6 => '2008-50-30');
//$user = connectUser('user1','pass1');
//require 'Product.class.php';
//$product = new Product($tab_prod);
//$user -> add_product($product,10);
//echo '<br><br>Panier<br><br>';
//$panier = $user -> update_cart();
//print_r($panier);
