<?php

require("config/commandes.php");
session_start();


if(isset($_GET['id_film'])){
    
    if(!empty($_GET['id_film']) OR is_numeric($_GET['id_fim']))
    {
        $id_film = $_GET['id_film'];
        $films=afficher_1($id_film);
        if( isset($_SESSION['pseudo']) && isset($_SESSION['cart']) ){
            $title=$films['title'];
            $id=$id_film;
            $price=$films['price'];
            $id_cart=(int)$_SESSION['cart'];
            add_films($id_cart,$id_film,$title,$price);
            total_price($id_cart);
            header('Location: index.php');
        }

    }
}




?>