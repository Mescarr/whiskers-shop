<?php
	try {
      // $bdd = new PDO('mysql:host=sql164.main-hosting.eu;dbname=u685539930_ws;charset=utf8', 'u685539930_admin', 'Whiskers657c876ca9Shop');
      // $bdd = new PDO('mysql:host=localhost;dbname=db_mlassalle003;charset=utf8', 'u_mlassalle003', 'YtaWQT6P');
      $bdd = new PDO('mysql:host=localhost;dbname=whiskers_shop;charset=utf8', 'root', '');
    }

    catch (Exception $e){ die('Erreur : ' . $e->getMessage()); }


    if(isset($_POST['speciesName'])) {
    	$req = $bdd->prepare('INSERT INTO ws_species(s_name) VALUES(:name)');
		$req->execute(array(
			'name' => $_POST['speciesName']
			));
    }
    if(isset($_POST['speciesId'])) {
    	$req = $bdd->prepare('DELETE FROM ws_species WHERE s_id = :id');
		$req->execute(array(
			'id' => $_POST['speciesId']
			));
    }


    if(isset($_POST['categoryName'])){
    	$req = $bdd->prepare('INSERT INTO ws_category(c_name) VALUES(:name)');
		$req->execute(array(
			'name' => $_POST['categoryName']
			));
    }
    if(isset($_POST['categoryId'])) {
    	$req = $bdd->prepare('DELETE FROM ws_category WHERE c_id = :id');
		$req->execute(array(
			'id' => $_POST['categoryId']
			));
    }

    if(isset($_POST['productName']) && isset($_POST['productSpecies']) && isset($_POST['productCategory']) && isset($_POST['productPrice']) && isset($_POST['productDescription']) && isset($_POST['productCharacteristic'])){
    	$req = $bdd->prepare('INSERT INTO ws_product(p_fk_species_id, p_fk_category_id, p_name, p_price, p_description, p_characteristic, p_added_datime) VALUES(:species, :category, :name, :price, :description, :characteristic, NOW())');
		$req->execute(array(
			'species' => $_POST['productSpecies'],
			'category' => $_POST['productCategory'],
			'name' => $_POST['productName'],
			'price' => $_POST['productPrice'],
			'description' => $_POST['productDescription'],
			'characteristic' => $_POST['productCharacteristic']
			));
    }
    if(isset($_POST['productId'])) {
    	$req = $bdd->prepare('DELETE FROM ws_product WHERE p_id = :id');
		$req->execute(array(
			'id' => $_POST['productId']
			));
    }

 ?>

<div id="gestionBlock">
	<form method="POST" action="?action=gestion">
		<p><strong>Ajouter une espèce</strong></p>
		Nom : <input type="text" name="speciesName" />
		<input type="submit" value="Ajouter" />
	</form>
	<form method="POST" action="?action=gestion">
		<p><strong>Supprimer une espèce</strong></p>
		ID : <input type="text" name="speciesId" />
		<input type="submit" value="Supprimer" />
	</form>
	<br />
	<form method="POST" action="?action=gestion">
		<p><strong>Ajouter une catégorie</strong></p>
		Nom : <input type="text" name="categoryName" />
		<input type="submit" value="Ajouter" />
	</form>
	<form method="POST" action="?action=gestion">
		<p><strong>Supprimer une catégorie</strong></p>
		ID : <input type="text" name="categoryId" />
		<input type="submit" value="Supprimer" />
	</form>
	<br />
	<form method="POST" action="?action=gestion">
		<p><strong>Ajouter un produit</strong></p>
		Nom : <input type="text" name="productName" />
		FK Espèce ID : <input type="number" name="productSpecies" />
		FK Catégorie ID : <input type="number" name="productCategory" />
		Prix : <input type="number" min="0" max="999999" step="0.01" name="productPrice" />
		<textarea placeholder="Description..." name="productDescription"></textarea>
		<textarea placeholder="Informations..." name="productCharacteristic"></textarea>
		<input type="submit" value="Ajouter" />
	</form>
	<form method="POST" action="?action=gestion">
		<p><strong>Supprimer un produit</strong></p>
		ID : <input type="text" name="productId" />
		<input type="submit" value="Supprimer" />
	</form>
	<br />
	<form method="POST" action="?action=gestion">
		<p><strong>Ajouter un utilisateur</strong></p>
		Nom d'utilisateur : <input type="text" name="userName" />
		Mot de passe : <input type="text" name="userPassword" />
		Admin : <select name="userAdmin">
           <option value="yes">Oui</option>
           <option value="no" selected>Non</option>
       </select>
		<input type="submit" value="Ajouter" />
	</form>
	<form method="POST" action="?action=gestion">
		<p><strong>Supprimer un utilisateur</strong></p>
		ID : <input type="text" name="userId" />
		<input type="submit" value="Supprimer" />
	</form>
</div>