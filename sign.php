<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/563d90e9ab.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="sign.css" />
    <title>connexion</title>
  </head>
  <body>
    <header>
      <div class="nav">
        <div class="mini_logo"></div>
      </div>
    </header>
    <main>
      <div class="content">
        <div class="h2"><h2>Se connecter</h2></div>
        <div class="text">
          <p>Connectez vous !</p>
        </div>
        <div class="formulaire">
        <form action="" method="POST">
        <label for="User_name">Indentifiant :</label>
        <input type="text" name="User_name" />
        <br />
        <br />
        <label for="pdw">Mot de passe :</label>
        <input type="password" name="pdw" />
            <input type="submit" value="S'inscrire" id="sign_up" />
          </form>
        </div>
        <div class="compte">
          <a href="create_user.php"><p>Je n'ai pas de compte.</p></a>
        </div>
      </div>
    </main>
</body>
</html>
<?php
require_once "config.php";

if(isset($_POST['User_name']) && isset($_POST['pdw'])){
    $user = $_POST ['User_name'];
    $pdw = $_POST ['pdw'];
    $query= "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
    $exec = $connexion->prepare($query);
    $exec->execute(["pseudo"->$user]);
    $noms = $exec->fetch();

    if ($noms){
        if (password_verify($pdw, $noms["password"])){
          session_start();
          echo "connexion réussie";
          $_SESSION['pseudo'] = $_POST ['User_name'];
          header("Refresh: 2; URL=accueil.php");
        }
        else{
            echo "mot de passe incorrect";
        }
    }
    else{
        echo "pseudo n'existe pas";
    }

}
?>

