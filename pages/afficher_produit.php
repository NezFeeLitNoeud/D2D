<?php
session_start();
include('../includes/navbar.php');
include('../includes/includes.php');

// $id = mysqli_real_escape_string($DB, $_GET["id"]);

$id = $_GET['id'];

$afficherDrone = $DB->query("SELECT * FROM product  WHERE id_drone ='" . $_GET["id"] . "'");
$afficherDrone = $afficherDrone->fetchAll();

foreach ($afficherDrone as $ad) {

}

if(!empty($_GET["action"])) {
  // On récupere le action= de l'URL, si il est = à add, alors on effectue le switch correspondant.
  switch($_GET["action"]) {
    case "add":
    // Si le panier n'est pas vide ->
    if(!empty($_POST["quantite"])) {
      // Créer un requete pour récuperer tout ce qu'il y a dans la table product ou le code = le code qui se trouve dans l'URL ->
      $productByCode = $DB->query("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
      $productByCode = $productByCode->fetchAll();
      // on crée un array $productByCode[0]["code"] -> Ce que l'on va stocker et pouvoir récuperer de la variable $item. Possibilité de rajouter des choses dedans. 
      $itemArray = array($productByCode[0]["code"]=>array('nom_drone'=>$productByCode[0]["nom_drone"], 'code'=>$productByCode[0]["code"], 'quantite'=>$_POST["quantite"],'id_drone'=>$productByCode[0]["id_drone"], 'prix'=>$productByCode[0]["prix"]));
      
      if(!empty($_SESSION["panier_item"])) {
        // On verifie alors que l'on a bien $productByCode[0]["code"] et $_SESSION["panier_item"] dans notre array ->
        if(in_array($productByCode[0]["code"],$_SESSION["panier_item"])) {
          // Si c'est bien le cas on fait une boucle pour ajouter un produit en fonction de la quantité définis (1 par defaut)
          foreach($_SESSION["panier_item"] as $k) {
            if($productByCode[0]["code"] == $k)
              $_SESSION["panier_item"][$k]["quantite"] = $_POST["quantite"];
          }
          // Permet de pouvoir ajouter plusieur produit dans le panier, sans le else, on ne peut mettre qu'un seul produit dedans.
        } else {
          $_SESSION["panier_item"] = array_merge($_SESSION["panier_item"],$itemArray);
        }
        // Permet de pouvoir ajouter 1 produit dans le panier, sans le else, on ne peut rien mettre dedans.
      } else {
        $_SESSION["panier_item"] = $itemArray;
      }
    }
    break;
  }
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../index.css">
	<title>Description</title>
</head>
<body>
	<img src="../images/logo.png" id="logo" alt="">


<?php

if (isset($ip)){ 
  $session_items = 0;
  if(!empty($_SESSION["panier_item"])){
    // Compte le nombre de produit présent dans le panier.
    $session_items = count($_SESSION["panier_item"]);
  } 
  }
  
  ?>

  <div class="card cardf">
    <form method="post" action="afficher_catgories.php?id=<?php echo $id?>&action=add&code=<?= $ad['code'] ?>" id="form_pa">
    <div class="card-body cb">
      <div class="tinypictures">
        <div class="tiny"><img id="tinyu" src="<?= $ad['image'] ?>" alt="drone"></div>
        <div class="tiny"><img id="tinyd" src="<?= $ad['image2'] ?>" alt="drone"></div>
        <div class="tiny"><img id="tinyt" src="<?= $ad['image3'] ?>" alt="drone"></div>
        <div class="tiny"><img id="tinyq" src="<?= $ad['image4'] ?>" alt="drone"></div>
    <?php if($ad['id_drone']== 11) {
      echo '<div class="tiny"><img id="tinyc"src="'.$ad['image5'].'"/></div>';
    }
    else {
      echo '';
    }
    ?>
      </div>
      <div class="bigpicture">
        <img  id="bigpicture"  src="<?= $ad['image'] ?>"   alt="drone">
      </div>
    <div class="comment">
    <img class="dronelogo" src="<?= $ad['logo'] ?>" alt="logo_drone"></br></br>
    <h4 class="card-title nom"><?= $ad['nom_drone'] ?></h4></br>
      
          Prix : <?= $ad['prix'] ?> € </br>
          </br><input type="text" name="quantite" value="1" size="2" />
          <input type="submit" value="Ajouter" class="btn" />
          </form>
    </br></br>
    <p><?= $ad['description'] ?></p>

    </div>
   </div>

  </div>

  <div class="carac"><br>  <strong>Caractéristiques:</strong> <br></br><?php  echo $ad['caracteristiques']?></div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <script src='../index.js'></script>
  <script type="text/javascript" >

   $("#tinyu").hover(
      function () {
        $('#bigpicture').attr('src', '<?= $ad['image'] ?>');//change la source de l'image
      }
   );
  $("#tinyd").hover(
     function () {
       $('#bigpicture').attr('src', '<?= $ad['image2'] ?>');
     }
  );
  $("#tinyt").hover(
     function () {
       $('#bigpicture').attr('src', '<?= $ad['image3'] ?>');
     }
  );
  $("#tinyq").hover(
     function () {
       $('#bigpicture').attr('src', '<?= $ad['image4'] ?>');
     }
  );
  $("#tinyc").hover(
     function () {
       $('#bigpicture').attr('src', '<?= $ad['image5'] ?>');
     }
  );
  function colorOne() {
    $('#bigpicture').attr('src', '<?= $ad['image'] ?>');
  }
  function colorTwo() {
    $('#bigpicture').attr('src', '<?= $ad['image2'] ?>');
  }
  function colorThree() {
    $('#bigpicture').attr('src', '<?= $ad['image3'] ?>');
  }
  function colorFour() {
    $('#bigpicture').attr('src', '<?= $ad['image4'] ?>');
  }
  function colorFive() {
    $('#bigpicture').attr('src', '<?= $ad['image5'] ?>');
  }
</script>
</body>
</html>
