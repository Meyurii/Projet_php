<?php

require("config/commandes.php");
session_start();

if (isset($_GET["recherche1"]) AND $_GET["recherche1"] == "Films")
{
 $_GET["filmrea"] = htmlspecialchars($_GET["filmrea"]); 
 $critere = $_GET["filmrea"];
 $critere = trim($critere); 
 $critere = strip_tags($critere);
 $Films=afficher_films($critere);
};
if (isset($_GET["recherche2"]) AND $_GET["recherche2"] == "Categories")
{
$_GET["genre"] = htmlspecialchars($_GET["genre"]); 
$critere = $_GET["genre"];
$critere = trim($critere); 
$critere = strip_tags($critere);
$Films=afficher_categorie($critere);
};
if (!isset($_GET["recherche1"]) and !isset($_GET["recherche2"]))
{
		$Films= afficher_all();
};

		


?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>


<style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
</style>

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
        <h4 class="text-white"><a href="index.php">Projet PHP</a></h4>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Menu</h4>
          <ul class="list-unstyled">
			<?php
			if( !isset($_SESSION['pseudo'])){
			echo "<li><a href='inscription.php' class='text-white'>S'inscrire</a></li>";
			};
			?>
			<?php
			if( !isset($_SESSION['pseudo'])){
			echo "<li><a href='login.php' class='text-white'>Se Connecter</a></li>";
			};
			?>
			<?php
			if( isset($_SESSION['pseudo'])){
			echo "<li><a href='show_cart.php' class='text-white'>Voir mon panier</a></li>";
			};
			?>
			<?php
			if( isset($_SESSION['pseudo'])){
			echo "<li><a href='logout.php' class='text-white'>Se déconnecter</a></li>";
			};
			?>
          </ul>
        </div>
		  <form action = "index.php" method = "get">
		  <input type = "search" name = "filmrea">
		  <input type = "submit" name = "recherche1" value = "Films/Réalisateur">
		  </br>
		  </form>
		  <form action = "index.php" method = "get">
		  <input type = "search" name = "genre">
		  <input type = "submit" name = "recherche2" value = "Categories">
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Tetanos</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

      <?php foreach($Films as $film): ?> 
        <div class="col">
          <div class="card shadow-sm">
            <h3><?= $film->title ?></h3>
            <img src="<?= $film->img ?>" style="width: 24%">

            <div class="card-body">
              <p class="card-text"><?= substr($film->realisateur, 0, 160); ?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href="details.php?id=<?= $film->id_film ?>"><button type="button" class="btn btn-sm btn-success">Voir plus</button></a>
                </div>
                <small class="text" style="font-weight: bold;"><?= $film->price ?> €</small>
              </div>
            </div>
          </div>
        </div>
  <?php endforeach; ?>


      </div>
    </div>
  </div>
</main>

  </body>
</html>
