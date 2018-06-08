<?php

  //Entrées: ID de la catégorie, Nom du produit, Prix
  function listproduct($categoryName,$name,$price){

    //Connection à MySQL
    require 'Manager.class.php';
    $manager = new Manager;
    $bdd = $manager -> connect_bdd();

    // Test de fonctionnement
    echo 'Connecté<br><br>';
    echo 'Categorie: '.$categoryName;
    echo '<br>Nom produit: '.$name;
    echo '<br>Prix: '.$price;

        //Requete recherche dependant du nom de produit
        $requete = "SELECT ws_product.* FROM ws_product, ws_category WHERE (p_name LIKE ':name') ";

        //Ajout de la condition categorie à la requete si le client la demande
        if ($categoryName != "default"){
          $requete .= " AND (ws_category.c_name = ':categoryName') AND (ws_category.c_id = ws_product.p_fk_category_id) ";
        }

        //Ajout de la condition prix de l'article si différent de 0 (par defaut)
        if ($price != 0){
          $requete .= " AND (p_price = ':price') ";
        }

        //Fin de la requete
        $requete .= " ORDER BY p_price; ";

        //Test de fonctionnement
        echo '<br><br>'.$requete;

        //Requete prepare (anti injection)
        $requete_prepare = $bdd->prepare($requete);
        $requete_prepare -> execute(array(
                                    'name' => $name,
                                    'categoryName' => $categoryName,
                                    'price' => $price));
        print_r($requete_prepare);
        $tableau = $requete_prepare -> fetchAll();


        //Création d'un tableau de produit résultant de la requete SQL

        $i = 0;
        while ($i != count($tableau)){

          //Test de fonctionnement
          print_r($tableau[$i]);
          $i++;

          require 'Product.class.php';
          $tableau_produit[] = new Product($tableau[$i]);
        }

        //Test de fonctionnement
        echo '<br><br>Tableau des produits: <br>';
        print_r($tableau);

        //Fermeture de connexion
        // $bdd->closeCursor();

        //Sortie: Tableau d'objet Produit
        return $tableau;

  }

$tab = listproduct(11,'produit1',10000.00);
print_r($tab);
