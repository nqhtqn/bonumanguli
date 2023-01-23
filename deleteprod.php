<?php
include "fonction.php";
session_start();
$pdo = connexion();
$idp = $_GET["idp"];
$idu = $_SESSION["idu"];
$stmt = $pdo->prepare("DELETE FROM produit WHERE idp=?");
$stmt->execute([$idp]);
header("refresh:0;url=mesproduits.php");
?>