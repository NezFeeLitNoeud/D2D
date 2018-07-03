<!-- Bootstrap connection -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<nav class="navbar navbar-light navbar-expand-md bg-faded justify-content-center" id="navigation">
	<div class="navbar-collapse" id="collapsingNavbar3">
		<div id="navbar">
			<ul class="nav navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="/D2D/index.php">ACCUEIL</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/D2D/pages/profil.php">|</a>
				</li>
				<li class="nav-item">
					<div class="dropdown">
						<button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							PRODUITS
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							<a class="nav-link" href="/D2D/pages/dr.php">DRONE RACING</a>
							<a class="nav-link" href="/D2D/pages/dp.php">DRONE PRO</a>
							<a class="nav-link" href="/D2D/pages/dc.php">DRONE CAMERA</a>
							<a class="nav-link" href="/D2D/pages/dl.php">DRONE LOISIR</a>
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
</nav>
