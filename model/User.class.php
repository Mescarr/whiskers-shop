<?php
class User
{

  //Attributs
  private $info_user;

  //Methode get_id
  public function get_id(){ return $this->info_user["u_id"]; }

  //Methode get_username
  public function get_username(){ return $this->info_user["u_username"]; }

  //Methode get_hash
  public function get_hash(){ return $this->info_user["u_hash"]; }

  //Methode get_registration_datetime
  public function get_registration_datetime(){ return $this->info_user["u_registration_datetime"]; }

  //Methode get_last_connection_datetime
  public function get_last_connection_datetime(){ return $this->info_user["u_last_connection_datetime"]; }

  //Methode Ajout d'un produit au panier de l'utilisateur
  public function add_product($produit,$quantity){

    echo '<br><br> add_product<br>';
    //Connection à MySQL
    //require 'Manager.class.php';
    $manager_user = new Manager;
    $bdd = $manager_user -> connect_bdd();

    //Requete qui permet d'ajouter le produit à la table panier
    $requete = "INSERT INTO ws_cart VALUES "."(";

    $requete .= rand(1,5000).',';
    $requete .= $this->info_user["u_id"].",";
    $requete .= $produit -> get_id().",";
    $requete .= $quantity.",";
    $requete .= '2020-08-10';

    $requete .= ");";

    // Test Fonctionnement
    echo $requete;

    //Execution de la requete en prepare
    $requete_prepare = $bdd -> prepare($requete);
    $requete_prepare -> execute();
  }

  //Methode Ajout d'un produit au panier de l'utilisateur
  public function del_product($id_product,$id_user){

    //Connection à MySQL
    //require 'Manager.class.php';
    $manager_user = new Manager;
    $bdd = $manager_user -> connect_bdd();

    //Requete qui permet de suprimer le produit de la table panier
    $requete = "DELETE FROM ws_cart WHERE ";

    $requete .= "(ws_cart.c_fk_user_id = ".$id_user.") AND (ws_cart.c_fk_product_id = ".$id_product.")";

    //Execution de la requete en prepare
    $requete_prepare = $bdd -> prepare($requete);
    $requete_prepare -> execute();
  }

  // Methode Mise à jour du Panier utilisateur
  public function update_cart(){

    //Connection à MySQL
    //require 'Manager.class.php';
    $manager_user = new Manager;
    $bdd = $manager_user -> connect_bdd();

    // Requete qui permet de recuperer le panier de l'utilisateur
    $requete = "SELECT DISTINCT C.c_fk_product_id, C.c_quantity, P.p_price FROM ws_cart C, ws_product P ";
    $requete .= "WHERE (C.c_fk_user_id = ".$this->info_user["u_id"].")"." AND (C.c_fk_product_id = P.p_id)";

    // Test Fonctionnement
    echo $requete;

    //Execution de la requete en prepare
    $requete_prepare = $bdd -> prepare($requete);
    $requete_prepare -> execute();
    $panier = $requete_prepare -> fetchAll(PDO::FETCH_ASSOC);

    // Sortie: Tableau de tous les produits appartenant au panier de l'utilisateur
    return $panier;
  }

  //Constructeur
  function __construct($ligne) {
    $this->info_user["u_id"] = $ligne["u_id"];
    $this->info_user["u_username"] = $ligne["u_username"];
    $this->info_user["u_hash"] = $ligne["u_hash"];
    $this->info_user["u_registration_datetime"] = $ligne["u_registration_datetime"];
    $this->info_user["u_last_connection_datetime"] = $ligne["u_last_connection_datetime"];
  }
}
