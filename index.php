
<?php
session_start();
$titre="Accueil";
include_once('includes/includes.php');
include_once('includes/navbar.php');

$req = $DB->query('SELECT * FROM user');
$req = $req->fetchAll();

$prod = $DB->query('SELECT * FROM product');
$prod = $prod->fetchAll();

foreach ($prod as $p) {
	# code...
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="index.css">
</head>
<body>

	<img src="images/logo.png" id="logo" alt="logo en forme de drone">

	<div class="carou">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li class="data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li class="data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				<li class="data-target="#carouselExampleIndicators" data-slide-to="3"></li>
				<!-- rectangle en bas du caroussel -->
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block w-100" src="images/drone.jpeg" alt="First image of drone">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="images/drone2.jpeg" alt="Second image of drone">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="images/drone3.jpeg" alt="Third image of drone">
				</div>
				<div class="carousel-item">
					<img class="d-block w-100" src="images/drone4.png" alt="Fourth image of drone">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>

	<div class="contenu_accueil">
		<div class="col G">

			<h5>NOS SERVICES</h5>
			<div class="service">
				<ul>
					<li>Satisfait ou remboursé</li>
					<li>Livraison en 24/48h</li>
					<li>Paiement sécurisé</li>
				</div>
			</ul>
			<h5>SAV</h5>
			<div class="sav">
				<h6>Une question ? Un problème ?</h6><br>
				<h6>Appelez-Nous !</h6><br>
				<h6>01.23.45.67.89</h6><br>
			</div>
		</div>

		<div class="col D">

			<div class="rowp">
				<div class="div">
					<div class="tit">MEILLEURES VENTES</div>
				</div>
				<div class="div">
					<div class="tit">DERNIERS AJOUTS</div>
					<div class="card" id="carte">
						<img class="card-img-top" src="<?= $p['image'] ?>" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title"><?= $p['nom_drone'] ?></h4>
							<p class="card-text">Prix : <?= $p['prix'] ?>€</p>
							<p class="card-text">Autonomie : <?= $p['autonomie'] ?>mn</p>
							<p class="card-text">Poids : <?= $p['poids'] ?>g</p>
							<p class="card-text">Vitesse : <?= $p['vitesse'] ?>km/h</p>
							<a href="#" id="btn_card" class="btn btn-primary">Description</a>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>