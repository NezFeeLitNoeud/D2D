<?php 
session_start();

include('../includes/navbar.php');
include('../includes/includes.php');
include('../includes/constant.php');
$lvl=(isset($_SESSION['rang']))?(int) $_SESSION['rang']:1;

if ($lvl !== 2){
	header('Location: ../index.php');
	exit;
}

if(!empty($_POST)) {
	extract($_POST);
	$valid = true;
	$nomDrone = htmlspecialchars(ucfirst(trim($nomDrone)));
	$Prix = htmlspecialchars(ucfirst(trim($Prix)));
	$Desc = htmlspecialchars(ucfirst(trim($Desc)));
	$Autonomie = htmlspecialchars(ucfirst(trim($Autonomie)));
	$Poids = htmlspecialchars(ucfirst(trim($Poids)));
	$Vitesse = htmlspecialchars(ucfirst(trim($Vitesse)));
	$Code = htmlspecialchars(ucfirst(trim($Code)));
	$categorie = (int) htmlentities(trim($categorie));

	if ($valid) {
		$DB->insert('INSERT INTO product (id_cat, nom_drone, prix, description, autonomie, poids, vitesse, code) VALUES(:id_cat, :nom_drone, :prix, :description, :autonomie, :poids, :vitesse, :code)', array('id_cat' => $categorie, 'nom_drone' => $nomDrone, 'prix' => $Prix, 'description' => $Desc, 'autonomie' => $Autonomie, 'poids' => $Poids, 'vitesse' => $Vitesse, 'code' => $Code,));
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
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
</head>
<body>

	<div class="administration">
		<h2>PANNEL D'ADMINISTRATION</h2>
		<h4>BONJOUR <?php echo $_SESSION['nom']; ?></h4>
	</div>

	<div class="add_product">
		<form action="admin.php" method="POST">
			<h4>Ajout Produit</h4>

			<label>* Catégorie :</label>
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
			<label>* nom drone :</label>
				<input  type="text" name="nomDrone" placeholder="Nom Drone" value="<?php if (isset($nomDrone)) echo $nomDrone; ?>" required="required">
			<br>
			<label>* Prix :</label>
				<input  type="number" name="Prix" placeholder="Prix" value="<?php if (isset($Prix)) echo $Prix; ?>" required="required">
			<br>
			<label>* Description :</label>
				<input  type="text" name="Desc" placeholder="Description" value="<?php if (isset($Desc)) echo $Desc; ?>" required="required">
			<br>
			<label>* Autonomie :</label>
				<input  type="number" name="Autonomie" placeholder="Autonomie" value="<?php if (isset($Autonomie)) echo $Autonomie; ?>" required="required">
			<br>
			<label>* Poids :</label>
				<input  type="number" name="Poids" placeholder="Poids" value="<?php if (isset($Poids)) echo $Poids; ?>" required="required">
			<br>
			<label>* Vitesse :</label>
				<input  type="number" name="Vitesse" placeholder="Vitesse" value="<?php if (isset($Vitesse)) echo $Vitesse; ?>" required="required">
			<br>
			<label>* Code :</label>
				<input  type="text" name="Code" placeholder="code" value="<?php if (isset($Code)) echo $Code; ?>" required="required">
			<br>
			<input type="submit" value="Ajouter">

		</form>
		<br>
		<form action="admin.php" method="GET">
			<h4>Ranker un user</h4>
			<label>* Rank :</label>
				<input  type="number" name="Rang" placeholder="Catégorie" value="<?php if (isset($Rang)) echo $Rang; ?>" required="required">	
			<br>
			<label>* Nom User:</label>
				<input  type="text" name="User" placeholder="User" value="<?php if (isset($User)) echo $User; ?>" required="required">
			<br>
			
			<input type="submit" value="Ajouter">

		</form>

	</div>
	


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>