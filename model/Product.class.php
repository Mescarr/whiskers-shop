<?php
class Product
{
  //Attributs
  private $info_produit;

  //Methode get_id
  public function get_id(){ return $info_produit[0]}

  //Methode get_fk_category_id
  public function get_fk_category_id(){ return $info_produit[1]}

  //Methode get_nom
  public function get_nom(){ return $info_produit[2]}

  //Constructeur
  public function Product($ligne){
    $info_produit = $ligne;
  }
}
