<?php 
session_start();
include('../includes/includes.php');
include('../includes/navbar.php');
// Redirige automatiquement l'utilisateur sur index.php après 3secondes
header( "refresh:3;url=../index.php" ); 

$commandes = $DB->query('SELECT * FROM product');
foreach ($commandes as $com) {

}


if(isset($_SESSION["panier_item"])){

// On insert dans la base de donnée commandes l'id de l'user, le prix du drone, le code du drone, la couleur selectionner et le status de la commande pour CHAQUE produit dans le panier
	foreach ($_SESSION["panier_item"] as $item) {  // $item -> Item séléctionner dans le pannier
		$id = $_SESSION['id'];
		$Prix = $item['prix'];
		$Code = $item['code'];

		if(!empty($_POST)) {
		extract($_POST);
		$Couleur = htmlentities(trim($Couleur));

		$ajout = $DB->query('INSERT INTO commandes (id_user, code_drone, prix, couleur, status) VALUES (:id_user, :code_drone, :prix, :couleur, :status)', array('id_user' => $id, 'code_drone' => $Code, 'prix' => $Prix, 'couleur' => $Couleur, 'status' => 'Completed'));

// Une fois la requete faite, on vide le pannier
		unset($_SESSION["panier_item"]);
	}
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Paiement</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
</head>
<body>
	<div class="payment">
		<h2>Achat Effectué</h2>
		<br>
		<p>Votre achat à bien etait effectué.</p>
		<p>Vous allez être rediriger vers l'accueil.</p>
		<p>Si la redirection ne marche pas, cliquer <a href="../index.php">ici</a>.</p>
	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="../index.js"></script>
</body>
</html>