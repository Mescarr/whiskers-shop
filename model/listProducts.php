<?php

  //Entrées: ID de l'espece, ID de la catégorie, Nom du produit, Prix min et max, ordre ASC ou DESC
  function listProducts($id,$speciesID,$categoryID,$name,$price_min,$price_max,$ordre){

    if ($name != "NULL"){
    $name = "^".$name;
    $condition['name'] = $name;
    $fin_requete = "(p_name REGEXP :name)";
  }
    else {
      $fin_requete = "(1=1)";
    }

    //Connection à MySQL
    require_once('Manager.class.php');
    $manager = new Manager;
    $bdd = $manager -> connect_bdd();

        //Requete recherche dependant du nom de produit
        $requete = "SELECT DISTINCT * FROM ws_product WHERE ".$fin_requete;

        //Ajout condition de l'ID
        if ($id != 0){
          $requete .= " AND (p_id = :id)";
          $condition['id'] = $id;
        }

        //Ajout condition de l'espèce
        if ($speciesID != 0){
          $requete .= " AND (p_fk_species_id = :speciesID)";
          $condition['speciesID'] = $speciesID;
        }

        //Ajout de la condition categorie à la requete si le client la demande
        if ($categoryID != 0){
          $requete .= " AND (p_fk_category_id = :categoryID)";
          $condition['categoryID'] = $categoryID;
        }

        //Ajout de la condition prix de l'article
        if ($price_min){
          $requete .= " AND (:price_min <= p_price)";
          $condition['price_min'] = $price_min;
        }

        if ($price_max){
          $requete .= " AND (p_price <= :price_max)";
          $condition['price_max'] = $price_max;
        }

        //Ajout de l'ordre ASC
        if ($ordre=="ASC"){
          $requete .= " ORDER BY p_price ASC; ";
        }

        //Ajout de l'ordre DESC
        if ($ordre=="DESC"){
          $requete .= " ORDER BY p_price DESC; ";
        }

        //Requete prepare (anti injection)
        $requete_prepare = $bdd->prepare($requete);
        $requete_prepare -> execute($condition);

        $tableau = $requete_prepare -> fetchAll(PDO::FETCH_ASSOC);

        $i = 0;
        require_once('Product.class.php');
        while ($i < count($tableau)){
          $tableau_produit[] = new Product($tableau[$i]);
          $i++;
        }

        //Fermeture de connexion
        //$bdd->closeCursor();

        //Sortie: Tableau d'objet Produit

        if(isset($tableau_produit)) {
          return $tableau_produit;
        }
        else{
          return NULL;
        }

  }
