<?php
session_start();
include "config/commandes.php";
//Si session établie sinon message.
$id_panier=$_SESSION['cart'];
$Details = show_cart_details($id_panier);
$Panier=show_cart($id_panier);
?>

<!DOCTYPE html>
<html>
<head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Panier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
		  </br>
		  </form>
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
        <h5 style="color: #545659; opacity: 0.5; display: flex; justify-content: center;">Connecté en tant que: <?= $_SESSION['pseudo'] ?></h5>
</div>
</nav>

<div class="album py-5 bg-light">
    <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <table class="table">
            <thead>
                <tr>
                <th scope="col">Titre</th>
                <th scope="col">Prix</th>
                <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
<?php foreach($Details as $detail ): ?>
                <tr>
                <th scope="row"><?= $detail ->title ?></th>
                <td style="font-weight: bold; color: green;"><?= $detail ->price ?>€</td>
                <td><button class="btn btn-info"><a href="del_cart.php?id_ligne=<?=$detail ->id_lignes?>">Supprimer</button></a></td>

                </tr>      
<?php endforeach; ?>

            </tbody>
            </table>
            <?php foreach($Panier as $panier ): ?>
                <tr>
                <td style="font-weight: bold; color: green;"><?= $panier ->total_amount ?>€</td>
                </tr>      
<?php endforeach; ?>
    </div>
</div>
</div>
<form method="post">
            <input type="submit" name="envoyer" class="btn btn-info" value="Vider le panier">
        </form>
</body>
</html>

<?php

if(isset($_POST['envoyer'])){
    $pseudo=$_SESSION['pseudo'];
    $panier=$_SESSION['cart'];
    delete_cart_details($panier,$pseudo);
    total_price($panier);
}

?>