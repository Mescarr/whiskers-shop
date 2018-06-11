<?php
class Product
{
  //Attributs
  private $info_produit;

  //Methode get_id
  public function get_id(){ return $this->info_produit["p_id"]; }

  //Methode get_species
  public function get_species(){ return $this->info_produit["p_fk_species_id"]; }

  //Methode get_category
  public function get_category(){ return $this->info_produit["p_fk_category_id"]; }

  //Methode get_name
  public function get_name(){ return $this->info_produit["p_name"]; }

  //Methode get_price
  public function get_price(){ return $this->info_produit["p_price"]; }

  //Methode get_description
  public function get_description(){ return $this->info_produit["p_description"]; }

  //Methode get_characteristique
  public function get_characteristic(){ return $this->info_produit["p_characteristic"]; }

  //Methode get_added_datetime
  public function get_added_datetime(){ return $this->info_produit["p_added_datetime"]; }

  //Methode get_all
  public function get_all(){ return $this->info_produit; }

  //Constructeur
  function __construct($ligne) {
    $this->info_produit = $ligne;
  }
}
