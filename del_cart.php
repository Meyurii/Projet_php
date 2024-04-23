<?php

require("config/commandes.php");
session_start();


if(isset($_GET['id_ligne'])){
    
    if(!empty($_GET['id_ligne']) OR is_numeric($_GET['id_ligne'])){
    
        $id_ligne = $_GET['id_ligne'];
        $pseudo=$_SESSION['pseudo'];
        $id_cart=(int)$_SESSION['cart'];

        if( isset($_SESSION['pseudo']) && isset($_SESSION['cart']) && isset($id_ligne)){

            delete_films($id_ligne,$pseudo);
            total_price($id_cart);
            header('Location: show_cart.php');
        }
    }

}
    




?>