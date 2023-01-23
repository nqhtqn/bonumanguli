<?php
session_start();
echo "Vous êtes deconnecté, redirection.....";
session_destroy();
header("refresh:0;url=home.php");
?>
