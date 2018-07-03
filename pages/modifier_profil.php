<?php 
session_start();
include_once('../includes/includes.php');


if(!empty($_POST))
{
	extract($_POST);
	$valid = true;
	$Adresse = htmlspecialchars(ucfirst(trim($Adresse)));
	$CodeP = trim($CodeP);
	$Ville = htmlspecialchars(ucfirst(trim($Ville)));

	if($valid)
	{	
		$id = $_GET['id'];
		$DB->update('UPDATE user SET adresse ="' . $Adresse . '", ville ="' . $Ville .'", code_postale ="' . $CodeP .'" WHERE id="' . $id . '"');

		header('Location: profil.php');
		exit;
	}	
}	

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../index.css">
	<title>modifier profil</title>
</head>
<body>
 

	<div class="head"> 
		<br>
		<h1>MODIFICATION DU PROFIL</h1> 
	</div>
	<div class="containeur">
		<form method="post" action="">
			</fieldset>
			<fieldset class="infolivraison">
				<legend> INFORMATIONS DE LIVRAISON </legend>
				<div class="rowinscri">
					<div class="npm colu">
						<div>
							<label> * Adresse : </label>
							<input class="input" type="text" name="Adresse" placeholder="Adresse" value="<?php if (isset($Adresse)) echo $Adresse; ?>" maxlength="100" required="required">	
						</div>
						<div>
							<label> * Ville : </label>
							<input class="input" type="text" name="Ville" placeholder="Ville" value="<?php if (isset($Ville)) echo $Ville; ?>" maxlength="20" required="required">	
						</div>
					</div>
					<div class="mdp colu">
						<label> * Code postal : </label>
						<input class="input" type="number" name="CodeP" placeholder="Code Postale" value="<?php if (isset($CodeP)) echo $CodeP; ?>" maxlength="20" required="required">
					</div>
				</div>
			</fieldset>
			<br>
			<br> 
			<input type="submit" value="Modifier" color="red" class="submit">

		</form>
		<br>
		<a href="profil.php" id="back">Retour à l'accueil</a>
		<br>

		<span id="bck">* Remplir les champs </span>
	</div>
</body>

</html>