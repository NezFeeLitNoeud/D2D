<?php 
session_start();

include('../includes/navbar.php');
include('../includes/includes.php');

$lvl=(isset($_SESSION['rang']))?(int) $_SESSION['rang']:1;

// Si $lvl n'est pas = à 1 alors la personne est directement renvoyer sur l'index.
if ($lvl !== 1){
	header('Location: ../index.php');
	exit;
}



if(!empty($_POST) && ($_FILES['Image'])) {
	extract($_POST) && ($_FILES['Image']);
	$valid = true;
	$nomDrone = htmlspecialchars(ucfirst(trim($nomDrone)));
	$Prix = htmlspecialchars(ucfirst(trim($Prix)));
	// On récupere le nom de l'image qui est upload avec le chemin avant pour pouvoir bien tout afficher
	$Image = "/D2D/products_pictures/".$_FILES['Image']['name'];
	$Image2 = "/D2D/products_pictures/".$_FILES['Image2']['name'];
	$Image3 = "/D2D/products_pictures/".$_FILES['Image3']['name'];
	$Image4 = "/D2D/products_pictures/".$_FILES['Image4']['name'];
	$Image5 = "/D2D/products_pictures/".$_FILES['Image5']['name'];
	$Logo = "/D2D/products_pictures/".$_FILES['Logo']['name'];
	$Desc = htmlspecialchars(ucfirst(trim($Desc)));
	$Carac = htmlspecialchars(ucfirst(trim($Carac)));
	$Autonomie = htmlspecialchars(ucfirst(trim($Autonomie)));
	$Poids = htmlspecialchars(ucfirst(trim($Poids)));
	$Vitesse = htmlspecialchars(ucfirst(trim($Vitesse)));
	$Code = htmlspecialchars(ucfirst(trim($Code)));
	$categorie = (int) htmlentities(trim($categorie));
	

	if ($valid) {
		$DB->insert('INSERT INTO product (id_cat, nom_drone, prix, image, image2, image3, image4, image5, logo,  description, caracteristiques, autonomie, poids, vitesse, code) VALUES(:id_cat, :nom_drone, :prix, :image, :image2, :image3, :image4, :image5, :logo, :description, :caracteristiques, :autonomie, :poids, :vitesse, :code)', 
			array('id_cat' => $categorie, 
				'nom_drone' => $nomDrone, 
				'image' => $Image, 
				'image2' => $Image2,
				'image3' => $Image3,
				'image4' => $Image4,
				'image5' => $Image5,
				'logo' => $Logo,
				'prix' => $Prix, 
				'description' => $Desc, 
				'caracteristiques' => $Carac,
				'autonomie' => $Autonomie, 
				'poids' => $Poids, 
				'vitesse' => $Vitesse, 
				'code' => $Code,));
	}
}



if(!empty($_GET)) {
	extract($_GET);
	$valid = true;
	$Rang = htmlspecialchars(trim($Rang));
	$User = htmlspecialchars(trim($User));

	if ($valid) {
		$DB->update('UPDATE user SET rang ="' . $Rang .'" WHERE nom= "' . $User . '"');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
</head>
<body>

	<div class="administration">
		<h2>PANNEL D'ADMINISTRATION</h2>
	</div>

<div class="pan_admin">

	<div id="left">
		<div id="show_left">
<h4>Ajout Produit</h4>
</div>
<div id="form_product">
		<form action="admin.php" method="POST" enctype="multipart/form-data">
			<label>Catégorie :</label>
			<select name="categorie">
				<?php
				$req_cat = $DB->query("SELECT * FROM categories");

				$req_cat = $req_cat->fetchALL();

				foreach($req_cat as $rc){
					?>
					<option value="<?= $rc['id'] ?>"><?= $rc['nom'] ?></option>
					<?php
				}   
				?>
			</select>
			
			<br>
			<label>Nom Drone :</label>
				<input  type="text" name="nomDrone" placeholder="Nom Drone" value="<?php if (isset($nomDrone)) echo $nomDrone; ?>" required="required">
			<br>
			<label>Prix :</label>
				<input  type="number" name="Prix" placeholder="Prix" value="<?php if (isset($Prix)) echo $Prix; ?>" required="required">
			<br>
			<label>Image</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="Image" placeholder="Image" value="<?php if (isset($Image)) echo $Image; ?>" required>
			<br>
			<label>Image2</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="Image2" placeholder="Image" value="<?php if (isset($Image2)) echo $Image2; ?>" required>
			<br>
			<label>Image3</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="Image3" placeholder="Image" value="<?php if (isset($Image3)) echo $Image3; ?>" required>
			<br>
			<label>Image4</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="Image4" placeholder="Image" value="<?php if (isset($Image4)) echo $Image4; ?>" required>
			<br>
			<label>Image5</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="Image5" placeholder="Image" value="<?php if (isset($Image5)) echo $Image5; ?>" required>
			<br>
			<label>Logo</label>
			<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
			<input type="file" name="Logo" placeholder="Logo" value="<?php if (isset($Logo)) echo $Logo; ?>" required>
			<br>
			<label>Description :</label>
				<input  type="text" name="Desc" placeholder="Description" value="<?php if (isset($Desc)) echo $Desc; ?>" required="required">
			<br>
			<label>Caracteristiques :</label>
				<input  type="text" name="Carac" placeholder="Description" value="<?php if (isset($Carac)) echo $Carac; ?>" required="required">
			<br>
			<label>Autonomie :</label>
				<input  type="number" name="Autonomie" placeholder="Autonomie" value="<?php if (isset($Autonomie)) echo $Autonomie; ?>" required="required">
			<br>
			<label>Poids :</label>
				<input  type="number" name="Poids" placeholder="Poids" value="<?php if (isset($Poids)) echo $Poids; ?>" required="required">
			<br>
			<label>Vitesse :</label>
				<input  type="number" name="Vitesse" placeholder="Vitesse" value="<?php if (isset($Vitesse)) echo $Vitesse; ?>" required="required">
			<br>
			<label>Code :</label>
				<input  type="text" name="Code" placeholder="code" value="<?php if (isset($Code)) echo $Code; ?>" required="required">
			<br>
			<input type="submit" value="Ajouter">

		</form>
		</div>
		</div>
		
		<br>
<div id="right">
	<div id="show_right">
		<h4>Ranker un user</h4>
		</div>
		<div id="form_rank">	
		<form action="admin.php" method="GET">
			<label>Rank :</label><br>
			<input type="radio" name="Rang" value="0" /> <label for="Rang">Visiteur</label><br>
           <input type="radio" name="Rang" value="1" /> <label for="Rang">Administrateur</label><br>
				<!-- <input  type="number" name="Rang" placeholder="rank" value="<?php if (isset($Rang)) echo $Rang; ?>" required="required"> -->	
			<br>
			<label>Nom d'utilisateur:</label>
				<input  type="text" name="User" placeholder="User" value="<?php if (isset($User)) echo $User; ?>" required="required">
			<br>
			
			<input type="submit" value="Ajouter">

		</form>
		</div>
		</div>
		</div>

	
	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	<script src='../index.js'></script>
</body>
</html>