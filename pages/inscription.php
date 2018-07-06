<?php 
session_start();
include_once('../includes/includes.php');

if(isset($_SESSION['pseudo']))
{
	header('Location: accueil.php');
	exit;
}

if(!empty($_POST))
{
	extract($_POST);
	$valid = true;
	$Mail = htmlspecialchars(trim($Mail));
	$Nom = htmlspecialchars(ucfirst(trim($Nom)));
	$Prenom = htmlspecialchars(ucfirst(trim($Prenom)));
	$Password = trim($Password);
	$PasswordConfirmation = trim($PasswordConfirmation);
	$Adresse = htmlspecialchars(ucfirst(trim($Adresse)));
	$CodeP = trim($CodeP);
	$Ville = htmlspecialchars(ucfirst(trim($Ville)));
	
	$req = $DB->query('Select mail from user where mail = :mail', array('mail' => $Mail));
	$req = $req->fetch();
	
	if(!empty($Mail) && $req['mail'])
	{
		$valid = false;
		$_SESSION['flash']['danger'] = "Ce mail existe déjà";
		
	}
	if(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $Mail))
	{
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez mettre un mail conforme !";
	}
	
	if(empty($Password))
	{
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez renseigner votre mot de passe !";

	}
	elseif($Password && empty($PasswordConfirmation))
	{
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez confirmer votre mot de passe !";
		
	}
	elseif(!empty($Password) && !empty($PasswordConfirmation))
	{
		if($Password != $PasswordConfirmation)
		{
			$valid = false;
			$_SESSION['flash']['danger'] = "La confirmation est différente !";
		}
		
	}
	
	if($valid)
	{	
		$id_public = uniqid();
		$DB->insert('INSERT INTO user (nom, prenom, mail, password, adresse, code_postale, ville, idpublic) values (:nom, :prenom, :mail, :password, :adresse, :code_postale, :ville, :idpublic)', array('nom' => $Nom, 'prenom' => $Prenom, 'mail' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t'), 'adresse' => $Adresse, 'code_postale' => $CodeP, 'ville' => $Ville, 'idpublic' => $id_public));

		
		header('Location: ../index.php');
		exit;
	}	
}	

?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../index.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inscription</title>
</head>
<body>

	<?php 
	if(isset($_SESSION['flash'])){ 
		foreach($_SESSION['flash'] as $type => $message): ?>
			<div id="alert" class="alert alert-<?= $type; ?> infoMessage"><a class="close">X</span></a>
				<?= $message; 
				?>
			</div>	
			<?php
		endforeach;
		unset($_SESSION['flash']);
	}
	?> 

	<div class="head"> 
		<br>
		<h1>INSCRIPTION</h1> 
	</div>
	<div class="containeur">
		<form method="post" action="inscription.php">
			<fieldset class="infoperso ">
				<legend> INFORMATIONS PERSONNELLES </legend>
				<div class="infox">
					<div class="npm">
						<label>* Nom :</label>
						<?php
						if(isset($error_pseudo)){
							echo $error_pseudo."<br/>";
						}	
						?>
						<input class="input" type="text" name="Nom" placeholder="Nom" value="<?php if (isset($Nom)) echo $Nom; ?>" maxlength="20" required="required">	
						<br>
						<label>* Mail :</label>
						<input class="input" type="email" name="Mail" placeholder="Votre mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">	
						<br>				
						<label>* Prenom :</label>
						<?php
						if(isset($error_pseudo)){
							echo $error_pseudo."<br/>";
						}	
						?>
						<input class="input" type="text" name="Prenom" placeholder="Prenom" value="<?php if (isset($Prenom)) echo $Prenom; ?>" maxlength="20" required="required">	
					</div>
					<div class="mdp">
						<label>* Mot de passe :</label>
						<?php
						if(isset($error_password)){
							echo $error_password."<br/>";
						}	
						?>
						<input class="input" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required">
						<br>
						<label>* Confirmation :</label>
						<?php
						if(isset($error_passwordConf)){
							echo $error_passwordConf."<br/>";
						}	
						?>

						<input class="input" type="password" name="PasswordConfirmation" placeholder="Confirmation du mot de passe" required="required">

					</div>
				</div>
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

			<input type="checkbox" name="v" value="B" class="ckeckins"> Vous acceptez les Conditions Generales d'utilisattion<br>
			<input type="checkbox" name="v" value="B" class="ckeckins" checked> Vous accepter de recevoir des mails de la part de Drone2Dame sur nos nouveaux arrivages <br><br>
			<input type="submit" value="S'inscrire" color="red" class="submit">

		</form>
		<br>
		<a href="../index.php" id="back">Retour à l'accueil</a>
		<br>

		<span id="bck">* Remplir les champs </span>
	</div>
</body>

</html>