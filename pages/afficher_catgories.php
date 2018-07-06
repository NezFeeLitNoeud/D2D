<?php 
session_start();
include('../includes/navbar.php');
include('../includes/includes.php');

// Récupere l'IP du visiteur
$ip = $_SERVER['REMOTE_ADDR'];

//Récupere l'id qui se trouve dans l'URL
$id = $_GET['id'];

// Requete pour tout selectionner depuis la table product ou id_cat vaut l'id qui se trouve dans l'URL
$prod = $DB->query('SELECT * FROM product WHERE id_cat ='.$id);
$prod = $prod->fetchAll();


if(!empty($_GET["action"])) {
	// On récupere le action= de l'URL, si il est = à add, alors on effectue le switch correspondant.
	switch($_GET["action"]) {
		case "add":
		// Si le panier n'est pas vide ->
		if(!empty($_POST["quantite"])) {
			// Créer un requete pour récuperer tout ce qu'il y a dans la table product ou le code = le code qui se trouve dans l'URL ->
			$productByCode = $DB->query("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$productByCode = $productByCode->fetchAll();
			// on crée un array $productByCode[0]["code"] -> Ce que l'on va stocker et pouvoir récuperer de la variable $item. Possibilité de rajouter des choses dedans. 
			$itemArray = array($productByCode[0]["code"]=>array('nom_drone'=>$productByCode[0]["nom_drone"], 'code'=>$productByCode[0]["code"], 'quantite'=>$_POST["quantite"], 'prix'=>$productByCode[0]["prix"]));
			
			if(!empty($_SESSION["panier_item"])) {
				// On verifie alors que l'on a bien $productByCode[0]["code"] et $_SESSION["panier_item"] dans notre array ->
				if(in_array($productByCode[0]["code"],$_SESSION["panier_item"])) {
					// Si c'est bien le cas on fait une boucle pour ajouter un produit en fonction de la quantité définis (1 par defaut)
					foreach($_SESSION["panier_item"] as $k) {
						if($productByCode[0]["code"] == $k)
							$_SESSION["panier_item"][$k]["quantite"] = $_POST["quantite"];
					}
					// Permet de pouvoir ajouter plusieur produit dans le panier, sans le else, on ne peut mettre qu'un seul produit dedans.
				} else {
					$_SESSION["panier_item"] = array_merge($_SESSION["panier_item"],$itemArray);
				}
				// Permet de pouvoir ajouter 1 produit dans le panier, sans le else, on ne peut rien mettre dedans.
			} else {
				$_SESSION["panier_item"] = $itemArray;
			}
		}
		break;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="/D2D/index.css">
	
	<title>Drone Racing</title>
</head>
<body>

<?php

if (isset($ip)){ 
	$session_items = 0;
	if(!empty($_SESSION["panier_item"])){
		// Compte le nombre de produit présent dans le panier.
		$session_items = count($_SESSION["panier_item"]);
	}	
	}
	
	?>

	<div id="product-grid">
		<div class="top_links">
			<a href="panier.php" title="Cart">Voir le panier</a><br>
			Total produits = <?php echo $session_items; ?>
		</div>

		<?php
		$product_array = $DB->query("SELECT * FROM product WHERE id_cat =".$id);
		$product_array = $product_array->fetchAll();
		if (!empty($product_array)) { 
			//Créer une boucle pour afficher les cards avec les infos des drones dedans
			foreach($product_array as $p){
				?>
				<div id="card_dr">
			<form method="post" action="afficher_catgories.php?id=<?php echo $id?>&action=add&code=<?= $p['code'] ?>">
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?= $p['image'] ?>" alt="Card image cap">
				<div class="card-body">
					<h4 class="card-title"><?= $p['nom_drone'] ?></h4>
					<p class="card-text">Prix : <?= $p['prix'] ?>€</p>
					<p class="card-text">Autonomie : <?= $p['autonomie'] ?>mn</p>
					<p class="card-text">Poids : <?= $p['poids'] ?>g</p>
					<div class="infos">
					<input type="text" name="quantite" value="1" size="2" />
					<br>
					<input type="submit" value="Ajouter" id="btn_ajout" />
					<a href="afficher_produit.php?id=<?php echo $p['id_drone']; ?>" target="BLANK_"><input type="button" value="Description" class="btn_descr" /></a>
					</div>
				</div>
			</div>
			</form>
		</div>
				<?php
			}
		}
		?>
	</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="index.js"></script>
 </body>
 </html>