<?php 
session_start();
include('../includes/includes.php');
include('../includes/navbar.php');

header( "refresh:3;url=../index.php" ); 

$commandes = $DB->query('SELECT * FROM product');
foreach ($commandes as $com) {

}


if(isset($_SESSION["panier_item"])){

	foreach ($_SESSION["panier_item"] as $item) {  // $item -> Item séléctionner dans le pannier
		$id = $_SESSION['id'];
		$Prix = $item['prix'];
		$Code = $item['code'];

		$ajout = $DB->query('INSERT INTO commandes (id_user, code_drone, prix, status) VALUES (:id_user, :code_drone, :prix, :status)', array('id_user' => $id, 'code_drone' => $Code, 'prix' => $Prix, 'status' => 'Completed'));

		unset($_SESSION["panier_item"]);
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paiement</title>
</head>
<body>
	<h1>Achat Effectué</h1>
	<p>Votre achat à bien etait effectué.</p>
	<p>Vous allez être rediriger vers l'accueil.</p>
	<p>Si la redirection ne marche pas, cliquer <a href="../index.php">ici</a></p>
</body>
</html>