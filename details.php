<?php

require("config/commandes.php");
session_start();
$Films=afficher_all();

if(isset($_GET['id'])){
    
    if(!empty($_GET['id']) OR is_numeric($_GET['id']))
    {
        $id = $_GET['id'];

    }
}

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.80.0">
<title>Tetanos · Bootstrap v5.0</title>

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
          <h4 class="text-white">Projet PHP</h4>
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
		  <input type = "submit" name = "recherche1" value = "Films">
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
    <div class="row">
<div class="col-md-2"></div>
<?php foreach($Films as $film){ if($film->id_film == $id){ ?> 
        <div class="col-md-8">
            <div class="card shadow-sm" >
                <h3 align="center"><?= $film->title ?></h3>
                <img src="<?= $film->img ?>" style="width: 50%">
                <iframe width="560" height="315" src="<?= $film->lien_ba ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <div class="card-des">
                <p class="card-text">Synopsis : <?= $film->description ?></p>
                <div class="card-info">
                <p class="card-text">Realisateur : <?= $film->realisateur ?></p>
                <p class="card-text">Durée : <?= $film->durée ?> minutes</p>
                <p class="card-text">Categorie : <?= $film->categorie ?> </p>
                <p class="card-text">Acteurs pricipaux : <?= $film->acteur ?></p>
                <p class="card-text">Date de sortie : <?= $film->date_de_sortie ?></p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <?php if( isset($_SESSION['pseudo'])){
			                echo "<a href='add_film.php?id_film=$film->id_film'><button type='button' class='btn btn-sm btn-success'>Ajouter au panier</button></a>";
                    }}}?>
                    </div>
                    <small class="text" style="font-weight: bold;"><?= $film->price ?> €</small>
                </div>
                </div>
            </div>
            </div>
            


<div class="col-md-2"></div>
    </div>
</div>
</div>

</main>
<br>
<br>
<br>
<br>
</body>
</html>
