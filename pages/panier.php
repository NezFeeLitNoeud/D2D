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
					if(empty($_SESSION["cart_item"]))
                    unset($_SESSION["cart_item"]);				
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

	<title>Panier</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link href="../index.css" type="text/css" rel="stylesheet" />
</head>

<body>

	<div id="shopping-cart">
		<div class="txt-heading">Votre panier </div>
		<?php 
		if(empty($_SESSION['panier_item'])) {
			echo'<span id="empty_cart"> Votre Panier est vide ! </span>';
		} ?>
		<div class="achat">
						<table class="table">
							<thead class="thead-dark">
								<tr>
									<th scope="col">Produit</th>
									<th scope="col">Quantitée</th>
									<th scope="col">Couleur</th>
									<th scope="col">Prix</th>
									<th scope="col"></th>
								</tr>
							</thead>
							<tbody>
								<form action="payment.php" method="post">
									<?php
									if(isset($_SESSION["panier_item"])){
										$item_total = 0;
										?>	

										<?php foreach ($_SESSION["panier_item"] as $item) {  // $item -> Item séléctionner dans le pannier
											$product_info = $DB->query("SELECT * FROM product WHERE code = '" . $item["code"] . "'");
											$product_info = $product_info->fetchAll();
												// var_dump($item);
											$item_total += ($item["prix"]*$item["quantite"]);
											?>


					<tr>
						<th scope="row"><div><strong><?php echo $item["nom_drone"]; ?></strong></div></th>
						<td><div>Quantitée: <?php echo $item["quantite"]; ?></div></td>
						<td><?php if (!empty($_SESSION['panier_item'])) {
						// Verifie que le panier ne sois pas vide puis si le prix du produit est supérieur à 600€, permet de choisir une couleur sinon affiche une couleur par defaut
							if ($item['id_drone'] == 13) {
								echo '
								
								<select name="Couleur" id="">
								<option value="Orange">Orange</option>
								<option value="Rose">Rose</option>
								<option value="Bleu">Bleu</option>
								<option value="Vert">Vert</option>
								</select>';
							} elseif ($item['id_drone'] == 11) {
							echo  '<select name="Couleur" id="">
								<option value="Blanc">Blanc</option>
								<option value="Rouge">Rouge</option>
								<option value="Bleu">Bleu</option>
								<option value="Vert">Vert</option>
								<option value="Jaune">Jaune</option>
								</select>';
								;

							}else {
								echo '
								
								<select name="Couleur" id="">
								<option value="Par Defaut">Par defaut</option>
								</select>';

							}
						} ?>
						
					</td>
					<td><div class="product-price"><?php echo $item["prix"]."€"; ?></div></td>
					<td><div class="btnRemoveAction" id="<?php echo $item["code"]; ?>"><a href="panier.php?action=remove&code=<?php echo $item["code"]; ?>" title="Retirer du pannier">x</a></div></td>
				</tr>

		<?php
		}
		?>

					</tbody>
				</table>
				</div>

				<div class="btn_pan">

				<?php 
				if ($item_total > 0) {
					echo '<div class="total">  <strong>Total:</strong><span>'.$item_total."€ </span> </div>"; 
				}
				?>
	

			<?php 
			}
			 ?>
				 <?php 
			// Si une session['id'] est en cours alors on va permettre d'acheter le panier, sinon on va demander au visiteur de se connecter
			if(!empty($_SESSION['panier_item']))	{ 
				if(!empty($_SESSION['id'])){
					echo '<button id="valider" type="submit"> Valider votre achat </button>';
				}
				else{
					echo '<a id="connecter" href="connexion.php">Connecter vous pour valider votre achat</a>';
				} 
				}
				?>
			</form>
			<?php 
		if(!empty($_SESSION['panier_item'])) { 	
			if(!empty($_SESSION['id'])){ 
				echo' 
			<a href="../index.php" title="Cart"><button id="continuer_shop" type="submit"> Continuer le Shopping </button> </a>';
		}
		}
			?>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>