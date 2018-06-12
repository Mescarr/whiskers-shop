<div id="searchBlock">
  <form method="POST" action="?action=listProducts">
    <div id="search1">
      <p id="formSpeciesBlock">
        Espèce :
        <select name="species" id="species">
          <option value="0"></option>
          <?php

            require_once('/model/Manager.class.php');
            $manager = new Manager;
            $bdd = $manager -> connect_bdd();

            $requete = "SELECT s_id, s_name FROM ws_species";

            $req = $bdd -> prepare($requete);
            $req -> execute();

            while($species = $req->fetch())
            { ?>
            <option value="<?php echo $species['s_id'];?>"><?php echo $species['s_name']; ?></option>
            <?php }
          ?>
         </select>
      </p>
      <p id="formCategoryBlock">
         Catégorie :
         <select name="category" id="category">
           <option value="0"></option>
           <?php

              require_once('/model/Manager.class.php');
              $manager = new Manager;
              $bdd = $manager -> connect_bdd();

              $requete = "SELECT c_id, c_name FROM ws_category";

              $req = $bdd -> prepare($requete);
              $req -> execute();

              while($category = $req->fetch())
              { ?>
                <option value="<?php echo $category['c_id'];?>"><?php echo $category['c_name']; ?></option>
              <?php }
            ?>
         </select>
      </p>
      <p id="formSearchBlock">
        Recherche :
        <input type="search" name="search" />
      </p>
    </div>

    <div id="search2">
      <p id="formPriceBlock">
       Prix :
        <input type="radio" name="price_rank" value="ASC" id="Croissant" /> <label for="Croissant">Croissant</label>
        <input type="radio" name="price_rank" value="DESC" id="Décroissant" /> <label for="Décroissant">Décroissant</label>
      </p>
      <p id="formRangePriceBlock">
        <?php

          require_once('/model/Manager.class.php');
          $manager = new Manager;
          $bdd = $manager -> connect_bdd();

          $requete = "SELECT max(p_price) AS price FROM ws_product";

          $req = $bdd -> prepare($requete);
          $req -> execute();

          $max_price = $req->fetch();

        ?>
        Min : <input type="number" name="price_min" min="0" max="999999" step="0.01" value ="0" />€
        Max : <input type="number" name="price_max" min="0" max="999999" step="0.01" value="<?php echo $max_price['price']; ?>" />€
      </p>
      <input type="submit" value="Rechercher" id="searchButton" />
    </div>
  </form>
</div>