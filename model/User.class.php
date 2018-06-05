<?php
class User
{
  //Attributs
  private $u_id,$u_username,$u_hash,$u_registration_datetime,$u_last_connection_datetime;
  private $panier;

  //Methode get_id
  public function get_id(){ return $this->u_id; }

  //Methode get_username
  public function get_username(){ return $this->u_username; }

  //Methode get_hash
  public function get_hash(){ return $this->u_hash; }

  //Methode get_registration_datetime
  public function get_registration_datetime(){ return $this->u_registration_datetime; }

  //Methode get_last_connection_datetime
  public function get_last_connection_datetime(){ return $this->u_last_connection_datetime; }

  //Constructeur
  function __construct($ligne) {
    $this->u_id = $ligne["u_id"];
    $this->u_username = $ligne["u_username"];
    $this->u_hash = $ligne["u_hash"];
    $this->u_registration_datetime = $ligne["u_registration_datetime"];
    $this->u_last_connection_datetime = $ligne["u_last_connection_datetime"];
  }
}
