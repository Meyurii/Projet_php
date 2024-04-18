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
    <link rel="stylesheet" href="accueil.css" />
    <link rel="stylesheet" href="footer.css" />
    <title>MyAline+</title>
  </head>
  <body>
    <header>
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
      <hr />
    </header>
    <main>
      <h1 id="titre1">Box Office Aline+</h1>
      <div class="container">
        <div class="slider-wrapper">
          <button id="prev-slide" class="slide-button material-symbols-rounded">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <div class="image-list">
            <img src="img/image/1.jpg" alt="" class="image-item" />
            <img src="img/image/2.jpg" alt="" class="image-item" />
            <img src="img/image/3.jpg" alt="" class="image-item" />
            <img src="img/image/4.jpg" alt="" class="image-item" />
            <img src="img/image/5.jpg" alt="" class="image-item" />
            <img src="img/image/6.jpg" alt="" class="image-item" />
            <img src="img/image/7.jpg" alt="" class="image-item" />
            <img src="img/image/8.jpg" alt="" class="image-item" />
          </div>
          <button id="next-slide" class="slide-button material-symbols-rounded">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <h1 id="titre2">Des films rien que pour vous</h1>
      <div class="container2">
        <div class="slider-wrapper">
          <button id="prev-slide" class="slide-button material-symbols-rounded">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <div class="image-list">
            <img src="img/image/1.jpg" alt="" class="image-item2" />
            <img src="img/image/2.jpg" alt="" class="image-item2" />
            <img src="img/image/3.jpg" alt="" class="image-item2" />
            <img src="img/image/4.jpg" alt="" class="image-item2" />
            <img src="img/image/5.jpg" alt="" class="image-item2" />
            <img src="img/image/6.jpg" alt="" class="image-item2" />
            <img src="img/image/7.jpg" alt="" class="image-item2" />
            <img src="img/image/8.jpg" alt="" class="image-item2" />
          </div>
          <button id="next-slide" class="slide-button material-symbols-rounded">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
      <h1 id="titre3">En ce moment sur Aline+</h1>
      <div class="container3">
        <div class="slider-wrapper">
          <button id="prev-slide" class="slide-button material-symbols-rounded">
            <i class="fa-solid fa-chevron-left"></i>
          </button>
          <div class="image-list">
            <img src="img/image/1.jpg" alt="" class="image-item3" />
            <img src="img/image/2.jpg" alt="" class="image-item3" />
            <img src="img/image/3.jpg" alt="" class="image-item3" />
            <img src="img/image/4.jpg" alt="" class="image-item3" />
            <img src="img/image/5.jpg" alt="" class="image-item3" />
            <img src="img/image/6.jpg" alt="" class="image-item3" />
            <img src="img/image/7.jpg" alt="" class="image-item3" />
            <img src="img/image/8.jpg" alt="" class="image-item3" />
          </div>
          <button id="next-slide" class="slide-button material-symbols-rounded">
            <i class="fa-solid fa-chevron-right"></i>
          </button>
        </div>
      </div>
    </main>
    <?php require_once "config.php"; ?>
    <footer>
      <div class="footer"></div>
    </footer>
    <script src="caroussel.js"></script>
  </body>
</html>
