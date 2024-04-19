<?php
session_start();
include "config/commandes.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - MonoShop</title>
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
<br>
<br>
<br>
<br>

<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">

        <form method="post">
            <div class="mb-3">
                <label for="Pseudo" class="form-label">Login</label>
                <input type="name" name="pseudo" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" name="motdepasse" class="form-control" style="width: 350%;">
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="Se connecter">
        </form>

        </div>
    </div>
</div>
    
</body>
</html>

<?php

if(isset($_POST['envoyer']))
{
  if(!empty($_POST['pseudo']) AND !empty($_POST['motdepasse']))
  {
    $login = ($_POST['pseudo']);
    $motdepasse = ($_POST['motdepasse']);
    $user = verifUser($login, $motdepasse);
    if($user)
    {
      $_SESSION['islogged'] = "O";
			$_SESSION['pseudo'] = $user['pseudo'];
      
			//Recherche ancien panier
			  if(return_cart($user['pseudo'])!= 0){
          $lastcart=return_cart($user['pseudo']);
          var_dump ($lastcart);
          $lastcartid=$lastcart['id_cart'];
			    $_SESSION['cart']= $lastcartid;
			  }
			    //Sinon on lui fait un nouveau panier et on lui affecte les variables de sessions manquantes
			  else {
          $panier= create_cart($user['pseudo'],0);
          $lastcart=return_cart($user['pseudo']);
          $lastcartid=$lastcart['id_cart'];
			    $_SESSION['cart']= $lastcartid;
			  }
        header('Location: index.php');
    }else{
        header('Location: inscription.php');
      }  
    };

};

?>