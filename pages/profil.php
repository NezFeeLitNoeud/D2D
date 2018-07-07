<?php 
session_start();
include('../includes/navbar.php');
include('../includes/includes.php');

// Si la personne n'est pas connecter, elle ne peut pas avoir accès a la page.
if (!isset($_SESSION['id'])){
	header('Location: ../index.php');
	exit;
}

$lvl=(isset($_SESSION['rang']))?(int) $_SESSION['rang']:1;

$req = $DB->query('SELECT * FROM user WHERE id='.$_SESSION["id"]);
$req = $req->fetchAll();

$cat = $DB->query('SELECT * FROM categories');
$cat = $cat->fetchAll();

// Jointure entre commande et product pour pouvoir afficher le nom du drone (dans product) par rapport à sont code (dans commandes)
$com = $DB->query('SELECT * FROM commandes INNER JOIN product ON commandes.code_drone = product.code WHERE id_user='.$_SESSION['id']);
$com = $com->fetchAll();

foreach ($req as $r) {
}

// On récupere l'action de L'URL, et si il est egale a delete, on supprime TOUTES les informations présente sur la table a propos de l'user, puis on le redirige vers deconnexion.php pour lui detruire la session, qu'il le redirigera sur l'index.php
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "delete":
		$id = $_SESSION['id'];
		$DB->query('DELETE FROM user WHERE id ='.$id);
		header('Location: ../includes/deconnexion.php');
		break;    
	}
} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
	<title>Drone Racing</title>
</head>
<body>
	<img src="/D2D/images/logo.png" id="logo" alt="">


	<div class="container_profil">
		<div class="row">
			<div class="col-4">
				<div class="list-group" id="list-tab" role="tablist">
					<a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">PROFIL</a>
					<a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">DERNIERS ACHATS</a>
					<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">INFORMATIONS DE FACTURATION</a>
					<a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-panier" role="tab" aria-controls="messages">PANIER EN COURS</a>
				</div>
			</div>
			<div class="col-8">
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
						<?php
						// Requete pour compter le nombre d'achat total que l'utilisateur à fait
						$total_achat = $DB->query('SELECT COUNT(id_com) FROM commandes where id_user ='.$_SESSION['id']);
						$total_achat = $total_achat->fetchAll();
						foreach ($total_achat as $ta) {
						 	# code...
						}
						?>
						<h3><?php echo $r['nom']." ".$r['prenom'];?></h3>
						<br>
						<p>VOTRE MAIL : <?php echo $r['mail']; ?></p>
						<p>VOTRE MOT DE PASSE : ***********</p>
						<p>NOMBRE TOTAL D'ACHAT : <?php echo $ta["COUNT(id_com)"]; ?></p>

						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary" id="supprimer" data-toggle="modal" data-target="#exampleModal">
							SUPPRIMER PROFIL
						</button>

						<!-- Modal -->
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="exampleModalLabel">Supprimer Profil</h4>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<p>Etes vous sur de vouloir supprimer votre profil?</p>
										<p>Attention cette action est irreversible et toutes vos données seront effacées.</p>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
										<a href="profil.php?action=delete"><button type="button" class="btn btn-primary">Supprimer</button></a>
									</div>
								</div>
							</div>
						</div>


					</div>
					
					<!-- AFFICHE LE TABLEAU DES COMMANDES EFFECTUES -->
					<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
						<div class="tablo">
							<table class="table" id="tabtab">
								<thead class="thead-dark">
									<tr>
										<th scope="col" class="try">#</th>
										<th scope="col" class="try">Nom Drone</th>
										<th scope="col" class="try">Prix</th>
										<th scope="col" class="try">Couleur</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									foreach ($com as $c) { 
										?>
										<tr>
											<th scope="row"><?php echo $c['id_com'];?></th>
											<td><?php echo $c['nom_drone'];?></td>
											<td><?php echo $c['prix'];?>€</td>
											<td><?php echo $c['couleur'];?></td>
										</tr>

										<?php 
									} 
									?> 
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
						<p>ADRESSE: <?php echo $r['adresse'];?></p>
						<p>VILLE : <?php echo $r['ville'];?></p>
						<p>CODE POSTALE : <?php echo $r['code_postale'];?></p>

						<a class="data-toggle="list" href="modifier_profil.php?id=<?php echo $_SESSION['id'] ?>" role="tab" aria-controls="messages"> <button class="btn btn-primary" id="modify"> MODIFIER PROFIL</button></a>
					</div>

					<div class="tab-pane fade" id="list-panier" role="tabpanel" aria-labelledby="list-messages-list">

						<?php
						// Affiche le panier en cours. même code que panier.php
						if(isset($_SESSION["panier_item"], $_SESSION['id'])){
							$item_total = 0;
							?>	
			<?php foreach ($_SESSION["panier_item"] as $item) {  // $item -> Item séléctionner dans le pannier
				if($item_total === 0) {  
					echo "Votre <a href='panier.php'>panier </a> en cours";
					$product_info = $DB->query("SELECT * FROM product WHERE code = '" . $item["code"] . "'");
					$product_info = $product_info->fetchAll();
					$item_total += ($item["prix"]*$item["quantite"]);
					
				}
				?>
				<div><strong><?php echo $item["nom_drone"]; ?></strong></div>
				<?php echo $item["prix"]."€"; ?>
				<?php
			}
		}
		?>
		
	</div>
</div>
</div>
</div>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="../index.js"></script>
</body>
</html>