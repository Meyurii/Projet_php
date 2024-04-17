<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/563d90e9ab.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="nav.css" />
    <title>Nav</title>
  </head>
  <body>
    <div class="nav">
      <div class="mini_logo"></div>
      <div class="categories">
        <ul>
          <li><a href="accueil.php">Accueil<li>
          <li><a href="Action.php">Action<li>
          <li><a href="Drame.php">Drame<li>
        </ul>
      </div>
      <div class="content">
        <ul>
        <li><a href="nav.php"><i class="fa-solid fa-magnifying-glass"></a></i></li>
          <a href="sign.php"><li id="inscrire">S'inscrire</li></a>
          <li><i class="fa-solid fa-circle-user"></i></li>
        </ul>
      </div>
    </div>
    <div class="Recherche">
    <form action="nav.php" method="POST">
        <label for="Info"></label>
        <input type="text" name="Info" />
        <input type="submit" value="Recherher" />
    </div>
<?php
try{
  $bdd = new PDO('mysql:host=localhost;dbname=projet_php_alicia_foune;charset=utf8', "root",'');
   
}catch (Exception $e) {
  die('Erreur :' . $e->getMessage());
}
$recherche = $_POST['recherche'];

  $query= "SELECT * FROM films WHERE realisateur like $recherche or title like $recherche" ;
  $exec = $bdd->prepare($query);
  $exec->execute(["."=> $nom]);
  $stocks = $exec->fetchAll();
  foreach ($stocks as $stock){
      echo $stock["title"]. "<br>";
      echo $stock["realisateur"]. "<br>";
      echo $stock["img"]." <br>";
  }
?>
  </body>
</html>
