<?php
session_start();
$titre="Connexion";
$titre="Enregistrement";
include("../includes/connexionDB.php");
include_once('../includes/includes.php');

if(isset($_SESSION['prenom'])){
	header('Location: ../index.php');
	exit;
}

if(!empty($_POST)){
	extract($_POST);
	$valid = true;
	
	$Mail = htmlspecialchars(trim($Mail));
	$Password = trim($Password);
		
	if(empty($Mail)){
		$valid = false;
		$_SESSION['flash']['danger'] = "Veuillez renseigner votre mail !";
	}
	
	if(empty($Password)){
		$valid = false;
		$error_password = "Veuillez renseigner un mot de passe !";
	}
	
	
	$req = $DB->query('Select * from user where mail = :mail and password = :password', array('mail' => $Mail, 'password' => crypt($Password, '$2a$10$1qAz2wSx3eDc4rFv5tGb5t')));
	$req = $req->fetch();
		
	if(!$req['mail']){
		$valid = false;
		$_SESSION['flash']['danger'] = "Votre mail ou mot de passe ne correspondent pas";
	}
	
	
	if($valid){
		
		//$_SESSION['id'] = $req['id'];
		$_SESSION['id'] = $req['id'];
		$_SESSION['nom'] = $req['nom'];
		$_SESSION['prenom'] = $req['prenom'];
		$_SESSION['mail'] = $req['mail'];
		$_SESSION['password'] = $req['password'];
		$_SESSION['adresse'] = $req['adresse'];
		$_SESSION['code_postale'] = $req['code_postale'];
		$_SESSION['ville'] = $req['ville'];
		$_SESSION['rang'] = $req['rang'];
		
		$_SESSION['flash']['info'] = "Bonjour " . $_SESSION['prenom'];
		header('Location: ../index.php');
		exit;		
	}

}	

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../index.css">
	<title>Connexion</title>
</head>
<body>
	
	<div class="head"> 
		<h1>CONNEXION</h1> 
	</div>

	<div class="containeuur">

		<form class="con-form" method="post" action="">
	<div class="top_co">
			<label>Email :</label>
<br>
				<input class="input_co" type="email" name="Mail" placeholder="Mail" value="<?php if (isset($Mail)) echo $Mail; ?>" required="required">
	</div>
<br><br>
		<div class="bot_co">
 			<label>Mot de passe : </label>
       			<?php
					if(isset($error_password)){
					echo $error_password."<br/>";
					}	
				?>
<br>
                 <input class="input_co" type="password" name="Password" placeholder="Mot de passe" value="<?php if (isset($Password)) echo $Password; ?>" required="required"></td>
		</div>
<br><br>
	  		<input type="submit" value="Se Connecter" class="submiit">

		</form>	   
<br>
		<a href="../index.php" id="back">Retour à l'accueil</a>
		<a href="inscription.php" id="back">Inscriver-vous</a>
</div>


</body>
</html>