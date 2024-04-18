<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'projet_php_alicia_foune');
 
/* Attempt to connect to MySQL database */
$connexion = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connexion === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>