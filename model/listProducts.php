<?php
  function listproduct($categoryName,$name,$price){

    //Connection à MySQL
    $bdd = new PDO();

    //Requete recherche dependant du nom de produit
    $requete = "SELECT * FROM ws_product WHERE p_name LIKE :name";

    //Ajout de la condition categorie à la requete si le client la demande
    if ($categoryName != "default"){
      $requete .= "AND ws_category.c_name LIKE :categoryName
                   AND (ws_category.c_id = ws_product.fk_category_id)";
    }

    //Ajout de la condition prix de l'article si différent de 0 (par defaut)
    if (float($price) != 0){
      $requete .= "AND p_price = :price";
    }

    //Fin de la requete
    $requete .= "ORDER BY p_price;";

    //Requete prepare (anti injection)
    $requete_prepare = $bdd->prepare($requete);
    $requete_prepare->execute(array(
                                'name' => $name,
                                'categoryName' => $categoryName
                                'price' => $price));

    //Création d'un tableau de produit résultant de la requete SQL
    while ($ligne = $requete_prepare->fetch()){
      $tableau_produit[] = new Product($ligne);
    }

    return $tableau_produit
  }
