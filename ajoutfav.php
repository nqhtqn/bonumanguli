<?php
include "fonction.php";
$pdo = connexion();
$idp = $_GET['idp'];
session_start();
$idu = $_SESSION["idu"];
echo('idp');
$sql = "INSERT INTO fav VALUES (?,?,?)";
$pdo->prepare($sql)->execute([null, $idu, $idp]);
header("refresh:0;url=detailprod.php?idp=$idp?");
?>