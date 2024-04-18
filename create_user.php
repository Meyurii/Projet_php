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
    <title>inscription</title>
  </head>
  <body>
    <header>
      <div class="nav">
        <div class="mini_logo"></div>
      </div>
    </header>
    <main>
      <div class="content">
        <div class="h2"><h2>S'inscrire</h2></div>
        <div class="text">
          <p>Inscrivez vous !</p>
        </div>
        <div class="formulaire">
        <form action="" method="POST">
      <label for="User_name">Indentifiant :</label>
      <input type="text" name="User_name" />
      <br />
      <br />
      <label for="pdw">Mot de passe :</label>
      <input type="password" name="pdw" />
      <br />
      <br />
      <label for="email">Email :</label>
      <input type="email" name="email" />
      <br />
      <br />
      <input type="submit" value="Connexion" />
        </div>
      </div>
    </main>
    <?php
require_once "config.php";

if(isset($_POST['User_name']) && isset($_POST['pdw']) && isset($_POST['email'])){
  //Test utilisateur existant
  $param_username = trim($_POST["User_name"]);
  $query=$connexion->query( "SELECT ID_user FROM utilisateur WHERE pseudo='$param_username'");

    while( $resultat = mysqli_fetch_array($query)){
      echo $resultat["ID_user"]. "<br>";
    }
    if ($resultat["ID_user"]>0){
      echo "Utilisateur existant";
    }
  else{
    $email = $_POST ['email'];
    $nom = $_POST ['User_name'];
    $pdw = password_hash($_POST ['pdw'], PASSWORD_DEFAULT);
    $query="INSERT INTO utilisateur (email, pseudo,	password) VALUE (:email,  :pseudo, :password)";
    $exec = $connexion->prepare($query);
    $exec->execute(['email'=> $email, 'pseudo'=> $nom,'password'=> $pdw]);
    echo "Inscription faites";
    session_start();
    $_SESSION['pseudo'] = $_POST ['User_name'];
  }
}else{
    echo "champs vide";
}
?>
</body>
</html>

