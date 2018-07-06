<?php
session_start();
include("../includes/connexionDB.php");
include_once('../includes/includes.php');
include("../includes/navbar.php");

$ip = $_SERVER['REMOTE_ADDR'];


if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
		// $_SESSION["panier_item"] => Les produits présent dans le pannier.
		if(!empty($_SESSION["panier_item"])) {
			// Créer une boucle, va supprimer uniquement le produit qui a comme code le code qui se trouve dans l'URL
			foreach($_SESSION["panier_item"] as $k => $v) {
				if($_GET["code"] == $k)
					unset($_SESSION["panier_item"][$k]);				
			}
		}
		break;
		case "empty":
		// ici, Vide tout le panier sans faire de recherche/distinction entre les code
		unset($_SESSION["panier_item"]);
		break;	
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<html lang="en">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Panier</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="../index.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div id="shopping-cart">
		<div class="txt-heading">Panier </div>
		<div class="achats">
		<?php
		if(isset($_SESSION["panier_item"])){
			// Prix total. va augmenter en fonction des ajouts dans le panier
			$item_total = 0;
			?>	
			<?php foreach ($_SESSION["panier_item"] as $item) {  // $item -> Item séléctionner dans le pannier
				// $product_info = $DB->query("SELECT * FROM product WHERE code = '" . $item["code"] . "'");
				// $product_info = $product_info->fetchAll();
				// var_dump($item);
				$item_total += ($item["prix"]*$item["quantite"]);
				?>
				
				<div><strong><?php echo $item["nom_drone"]; ?></strong></div>
				<div class="product-price"><?php echo $item["prix"]."€"; ?></div>
				<div>Quantitée: <?php echo $item["quantite"]; ?></div>
				<div class="btnRemoveAction" id="<?php echo $item["code"]; ?>"><a href="panier.php?action=remove&code=<?php echo $item["code"]; ?>" title="Retirer du pannier">x</a></div>
	
			<?php
		}
		?>	
		<strong>Total:</strong> 
		<?php 
		if ($item_total > 0) {
			echo $item_total."€"; 
		} else {
			echo $item_total."0";
		}
		?>
		</div>

		<?php 
	}
	?>


	<div class="valider">
	<form action="payment.php" method="post">
		<?php if (!empty($_SESSION['panier_item'])) {
			// Verifie que le panier ne sois pas vide puis si le prix du produit est supérieur à 600€, permet de choisir une couleur sinon affiche une couleur par defaut
					if ($item['prix'] > 600) {
			echo '
		<label> Couleur </label>
			<select name="Couleur" id="">
				<option value="Bleu">Bleu</option>
				<option value="Rouge">Rouge</option>
				<option value="Blanc">Blanc</option>
				<option value="Noir">Noir</option>
			</select>';
			} else {
					echo '
		<label> Couleur </label>
			<select name="Couleur" id="">
				<option value="Par Defaut">Par defaut</option>
			</select>';

			}
			} ?>


			<br>
<?php 
// Si une session['id'] est en cours alors on va permettre d'acheter le panier, sinon on va demander au visiteur de se connecter
if(!empty($_SESSION['id'])){
					echo '<button type="submit">Valider votre achat</button>';
				}
				else{
					echo '<a href="connexion.php">Connecter vous pour Acheter</a>';
				} 
				?>
	

	</form>
	</div>



	<div class="cart_footer_link">
		<a href="panier.php?action=empty"> <button type="submit">Vider le panier</button> </a>
	</div>

	<div class="cart_footer_link2">
		<a href="../index.php" title="Cart"> <button type="submit">Continuer le Shopping</button> </a>
	</div>

	</div>


			

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>