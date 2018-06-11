<?php

  //Entrées: ID de l'espece, ID de la catégorie, Nom du produit, Prix min et max, ordre ASC ou DESC
  function listProduct($speciesID,$categoryID,$name,$price_min,$price_max,$ordre){

    $name = "^".$name."*";

    //Connection à MySQL
    require 'Manager.class.php';
    $manager = new Manager;
    $bdd = $manager -> connect_bdd();

        //Requete recherche dependant du nom de produit
        $requete = "SELECT DISTINCT * FROM ws_product WHERE (p_name REGEXP :name) ";

        //Ajout de la condition categorie à la requete si le client la demande
        if ($categoryID){
          $requete .= " AND (p_fk_category_id = :categoryID)";
        }

        //Ajout condition de l'espèce
        if ($speciesID){
          $requete .= " AND (p_fk_species_id = :speciesID)";
        }

        //Ajout de la condition prix de l'article
        if ($price_min AND $price_max){
          $requete .= " AND (:price_min <= p_price <= :price_max)";
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
        $requete_prepare -> execute(array(
                                    'name' => $name,
                                    'speciesID' => $speciesID,
                                    'categoryID' => $categoryID,
                                    'price_min' => $price_min,
                                    'price_max' => $price_max));

        $tableau = $requete_prepare -> fetchAll(PDO::FETCH_ASSOC);

        $i = 0;
        require 'Product.class.php';
        while ($i < count($tableau)){

          $tableau_produit[] = new Product($tableau[$i]);
          $i++;
        }

        //Fermeture de connexion
        // $bdd->closeCursor();

        //Sortie: Tableau d'objet Produit
        return $tableau_produit;

  }
