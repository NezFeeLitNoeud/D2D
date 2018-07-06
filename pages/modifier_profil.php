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
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../index.css">
	<title>Modifier profil</title>
</head>
<body>
 

	<div class="head_modif"> 
		<br>
		<h1>MODIFICATION DU PROFIL</h1> 
	</div>
	<div class="contain_modif">
		<form method="post" action="">
			</fieldset>
			<fieldset class="modiflivraison">
				<legend> INFORMATIONS DE LIVRAISON </legend>
				
					<div class="modif">
						
							<span class="span_modif">Adresse : </span>
							<input class="info_modif" type="text" name="Adresse" placeholder="Adresse" value="<?php if (isset($Adresse)) echo $Adresse; ?>" maxlength="100" required="required">	
						<br><br>
					
							<span class="span_modif">Ville : </span>
							<input class="info_modif" type="text" name="Ville" placeholder="Ville" value="<?php if (isset($Ville)) echo $Ville; ?>" maxlength="20" required="required">	
						<br><br>
					
				
						<span class="span_modif">Code postal : </span>
						<input class="info_modif" type="number" name="CodeP" placeholder="Code Postale" value="<?php if (isset($CodeP)) echo $CodeP; ?>" maxlength="20" required="required">
					</div>
				
			</fieldset>
			<br>
			<br> 
			<input type="submit" value="Modifier" id="modif">

		</form>
		<br>
		<a href="profil.php">Retour au Profil</a>
		<br>
	</div>
</body>

</html>