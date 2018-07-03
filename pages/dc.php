<?php 
session_start();
include('../includes/navbar.php');
include('../includes/includes.php');

$req = $DB->query('SELECT * FROM user');
$req = $req->fetchAll();


if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
		if(!empty($_POST["quantite"])) {
			$productByCode = $DB->query("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$productByCode = $productByCode->fetchAll();
			$itemArray = array($productByCode[0]["code"]=>array('nom_drone'=>$productByCode[0]["nom_drone"], 'code'=>$productByCode[0]["code"], 'quantite'=>$_POST["quantite"], 'prix'=>$productByCode[0]["prix"]));
			
			if(!empty($_SESSION["panier_item"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["panier_item"])) {
					foreach($_SESSION["panier_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k)
							$_SESSION["panier_item"][$k]["quantite"] = $_POST["quantite"];
					}
				} else {
					$_SESSION["panier_item"] = array_merge($_SESSION["panier_item"],$itemArray);
				}
			} else {
				$_SESSION["panier_item"] = $itemArray;
			}
		}
		break;
	}
}

	# code...
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
	$session_items = 0;
	if(!empty($_SESSION["panier_item"])){
		$session_items = count($_SESSION["panier_item"]);
	}	
	?>

	<div id="product-grid">
		<div class="top_links">
			<a href="panier.php" title="Cart">Voir le panier</a><br>
			Total produits = <?php echo $session_items; ?>
		</div>
		
		<?php
		$product_array = $DB->query("SELECT * FROM product WHERE id_cat = 3");
		$product_array = $product_array->fetchAll();
		if (!empty($product_array)) { 
			foreach($product_array as $p){
				?>
				<div id="card_dr">
			<form method="post" action="dc.php?action=add&code=<?= $p['code'] ?>">
			<div class="card" style="width: 18rem;">
				<img class="card-img-top" src="<?= $p['image'] ?>" alt="Card image cap">
				<div class="card-body">
					<h4 class="card-title"><?= $p['nom_drone'] ?></h4>
					<p class="card-text">Prix : <?= $p['prix'] ?>€</p>
					<p class="card-text">Autonomie : <?= $p['autonomie'] ?>mn</p>
					<p class="card-text">Poids : <?= $p['poids'] ?>g</p>
					<input type="text" name="quantite" value="1" size="2" /><input type="submit" value="Ajouter" class="btnAddAction" />
					<!-- <a href="#" class="btn btn-primary">Description</a> -->
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
</body>
</html>