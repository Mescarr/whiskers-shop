<?php

  //Entrées: ID de la catégorie, Nom du produit, Prix
  function listProduct($categoryName,$name,$price){

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
        $requete = "SELECT DISTINCT P.* FROM ws_product P, ws_category C WHERE (P.p_name REGEXP (:name)) ";

        //Ajout de la condition categorie à la requete si le client la demande
        if ($categoryName){
          //$requete .= " AND ((C.c_id = :categoryName)) AND (C.c_id = P.p_fk_category_id)) ";
        }

        //Ajout de la condition prix de l'article si différent de 0 (par defaut)
        if ($price){
        //  $requete .= " AND (P.p_price <= :price) ";
        }

        //Fin de la requete
        // $requete .= " ORDER BY P.p_price; ";


        //Requete prepare (anti injection)
        $requete_prepare = $bdd->prepare($requete);
        $requete_prepare -> execute(array(
                                    'name' => $name));
                              //      'categoryName' => $categoryName,
                              //      'price' => $price));

        $tableau = $requete_prepare -> fetchAll(PDO::FETCH_ASSOC);

        //Création d'un tableau de produit résultant de la requete SQL
        echo '<br><br> Nombre de produit trouvé: '.count($tableau).'<br>';
        $i = 0;
        require 'Product.class.php';
        while ($i < count($tableau)-1){

          //Test de fonctionnement
          print_r($tableau[$i]);
          $i++;

          $tableau_produit[] = new Product($tableau[$i]);
        }

        //Test de fonctionnement
        echo '<br><br>Tableau des produits: <br>';

        //Fermeture de connexion
        // $bdd->closeCursor();

        //Sortie: Tableau d'objet Produit
        return $tableau_produit;

  }

$tab = listProduct(11,'produit',1000000000000000000000);
print_r($tab);
