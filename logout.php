<?php
session_start();
session_unset();
//session_destroy();
echo 'Vous êtes deconnecté';
header("Location: index.php");
?>

