
<?php
session_start();
$titre="Accueil";
include_once('includes/includes.php');
include_once('includes/navbar.php');



	$max_com = $DB->query('SELECT *, count(id_drones) FROM commandes INNER JOIN product ON commandes.code_drone = product.code GROUP BY code_drone HAVING count(id_drones) >= ALL (SELECT count(id_drones) FROM commandes INNER JOIN product ON commandes.code_drone = product.code GROUP BY code_drone) LIMIT 1');
$max_com = $max_com->fetchAll();
foreach ($max_com as $mc) {
}


$cat = $DB->query('SELECT * FROM categories');
$cat = $cat->fetchAll();

$req = $DB->query('SELECT * FROM user');
$req = $req->fetchAll();

$prod = $DB->query('SELECT * FROM product');
$prod = $prod->fetchAll();

foreach ($prod as $p) {
	# code...
}
$lvl=(isset($_SESSION['rang']))?(int) $_SESSION['rang']:0;


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="pragma" content="no-cache" />
	<title>Index</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="index.css">
</head>
<body>

	<!-- si le $lvl vaut 1, alors on va afficher l'image pour rejoindre le panel d'administration. Sinon on affiche rien. -->
	<?php if($lvl === 1) {
	echo '<a id="admin" href="pages/admin.php"><img src="images/admin.svg" alt="Image avec un bonhomme pour le panel d\'administration" id="panel_image" width="50px"></a>';
} 
	?>


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
				<img src="images/customer-service.svg" alt="logo d'un homme avec un un casque telephonique" width="70px">
				<br>
			</div>
		</div>

		<div class="col D">

			<div class="rowp">
				<div class="div">
					<div class="tit">DRONE LE PLUS VENDU</div>
					<div class="card" id="carte">
						<img class="card-img-top" id="img_index" src="<?= $mc['image'] ?>" alt="Card image cap">
						<div class="card-body" id='card_index'>
							<h4 class="card-title"><?= $mc['nom_drone'] ?></h4>
							<p class="card-text">Prix : <?= $mc['prix'] ?>€</p>
							<p class="card-text">Autonomie : <?= $mc['autonomie'] ?>mn</p>
							<p class="card-text">Poids : <?= $mc['poids'] ?>g</p>
							<p class="card-text">Vitesse : <?= $mc['vitesse'] ?>km/h</p>
							<a href="pages/afficher_produit.php?id=<?php echo $mc['id_drone']; ?>" id="btn_card" class="btn btn-primary">Description</a>
						</div>
					</div>
				</div>
				<div class="div">
					<div class="tit">DERNIERS AJOUTS</div>
					<div class="card" id="carte">
						<img class="card-img-top" id="img_index" src="<?= $p['image'] ?>" alt="Card image cap">
						<div class="card-body" id='card_index'>
							<h4 class="card-title"><?= $p['nom_drone'] ?></h4>
							<p class="card-text">Prix : <?= $p['prix'] ?>€</p>
							<p class="card-text">Autonomie : <?= $p['autonomie'] ?>mn</p>
							<p class="card-text">Poids : <?= $p['poids'] ?>g</p>
							<p class="card-text">Vitesse : <?= $p['vitesse'] ?>km/h</p>
							<a href="pages/afficher_produit.php?id=<?php echo $p['id_drone']; ?>" id="btn_card" class="btn btn-primary">Description</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src="index.js"></script>
</body>
</html>