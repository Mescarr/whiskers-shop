<?php
class User
{
  //Attributs
  private $info_utilisateur, $panier;

  //Methode get_id
  public function get_id(){ return $info_utilisateur[0]}

  //Methode get_fk_category_id
  public function get_fk_category_id(){ return $info_utilisateur[1]}

  //Methode get_nom
  public function get_nom(){ return $info_utilisateur[2]}

  //Constructeur
  public function Product($ligne){
    $info_utilisateur = $ligne;
  }
}
