<!-- Bootstrap connection -->
<?php 
include_once('includes.php');

$cat = $DB->query('SELECT * FROM categories');
$cat = $cat->fetchAll();

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<title>Document</title>
 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
</head>
</head>
 <body>


<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navigation">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

	<div class="collapse navbar-collapse" id="navbarNavDropdown">

		<div id="navbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/D2D/index.php">ACCUEIL</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">|</a>
				</li>
				<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PRODUIT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <?php 
						// Boucle pour afficher tout les noms des catégories présente sur la bdd
							foreach ($cat as $c) {
						 ?>
						 <a class="dropdown-item" id="drop_bouton"href="/D2D/pages/afficher_catgories.php?id=<?php echo $c['id'];?>"><?php echo $c['nom'];?></a>
						 <?php 
						 } ?>
        </div>
      </li>
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							PRODUITS
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

						<?php 
						// Boucle pour afficher tout les noms des catégories présente sur la bdd
							foreach ($cat as $c) {
						 ?>
						 <a class="nav-link" id="drop_bouton"href="/D2D/pages/afficher_catgories.php?id=<?php echo $c['id'];?>"><?php echo $c['nom'];?></a>
						 <?php 
						 } ?>

						</div>
					</div>
				</li>
				

				<li class="nav-item">
					<a class="nav-link" href="../pages/profil.php">| </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/panier.php"> PANIER </a>
				</li>

				<?php
				// Si la personne n'est pas connecter, elle verra INSCRIPTION/CONNEXION dans la barre de navigation, en revanche elle verra PROFIL/DECONNEXION si elle est connecter.
				if(!empty($_SESSION['prenom'])){
					echo '
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">| </a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">PROFIL </a>
					</li>';
				}
				else{
					echo '<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">| </a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/inscription.php">INSCRIPTION</a>
					</li>';
				} 
				?>
				
				<?php
				
				if(!empty($_SESSION['prenom'])){
					echo '<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">| </a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="/D2D/includes/deconnexion.php">DECONNEXION <img id="off" src="/D2D/images/power.svg" alt="deco"></a>	
					</li>';
				}
				else{
					echo '<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">| </a>
					</li> 
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/connexion.php">CONNEXION </a>
					</li>';
				} 
				?>
			</ul>
				</div>
			</div>
</nav> -->

 <nav class="navbar navbar-expand-lg navbar-light" id="navigation">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">

      <li class="nav-item active">
        <a class="nav-link" href="/D2D/index.php">ACCUEIL <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PRODUIT
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        	<?php 
						// Boucle pour afficher tout les noms des catégories présente sur la bdd
							foreach ($cat as $c) {
						 ?>
						 
						
          <a class="dropdown-item" href="/D2D/pages/afficher_catgories.php?id=<?php echo $c['id'];?>"><?php echo $c['nom'];?></a>
           <?php 
						 } ?>

        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/D2D/pages/panier.php">PANIER</a>
      </li>
      <?php
				// Si la personne n'est pas connecter, elle verra INSCRIPTION/CONNEXION dans la barre de navigation, en revanche elle verra PROFIL/DECONNEXION si elle est connecter.
				if(!empty($_SESSION['prenom'])){
					echo '
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">PROFIL </a>
					</li>';
				}
				else{
					echo '
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/inscription.php">INSCRIPTION</a>
					</li>';
				}
				
				if(!empty($_SESSION['prenom'])){
					echo '
					<li class="nav-item">
					<a class="nav-link" href="/D2D/includes/deconnexion.php">DECONNEXION <img id="off" src="/D2D/images/power.svg" alt="deco"></a>	
					</li>';
				}
				else{
					echo '
					<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/connexion.php">CONNEXION </a>
					</li>';
				} 
				?>
			
    </ul>
  </div>
 
</nav> 

</body>
 </html>
