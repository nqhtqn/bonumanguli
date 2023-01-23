<?php
include "fonction.php";
session_start();
$pdo = connexion();
$idp = $_GET["idp"];
$idu = $_SESSION["idu"];
$stmt = $pdo->prepare("DELETE FROM fav WHERE idp=? AND idu=?");
$stmt->execute([$idp,$idu]);
header("refresh:0;url=favoris.php");
?>