<?php
include "fonction.php";
session_start();
$pdo = connexion();
if (connecte() == False) {
   header("refresh:0;url=connexion.php");
}
headsimple();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/Bonumanguli5.png" />
  <title>Favoris</title>
  <link rel="stylesheet" href="bonum.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body id="second">
  <div id="divmid">
    <h1 style="text-align: center;" id="textthird">Vos favoris</h1>

    <?php
        $idu = $_SESSION["idu"];
        $stmt = $pdo->prepare("SELECT * FROM fav WHERE idu=?");
        $stmt->execute([$idu]);
        while($ligne = $stmt->fetch()){
            $idp = $ligne["idp"];
            $stmt2 = $pdo->prepare("SELECT * FROM produit WHERE idp=?");
            $stmt2->execute([$ligne["idp"]]);
            $ligne2 = $stmt2->fetch();
            $link = $ligne2["photo1"]; 
            $nomp = $ligne2["nomp"];
            $desc = $ligne2["descri"];
            if(strlen($desc) > 100){
                $desc = substr($desc,0,100);
                $desc = $desc."...";
            }
            $prix = $ligne2["prix"]."€";
            
            ?><a href="detailprod.php?idp=<?php echo"$idp"?>" style="color: black;">
                <div id="prodfav" style="position: relative;">
                    <hr>
                    
                        <img src="<?php echo"$link"?>" width="80">
                        <span style="font-weight: bold; margin-right: 2%;"><?php echo"$nomp"?></span>
                        <span style="margin-right: 10%;"><?php echo"$desc"?></span>
                        <span style="margin-right: 1%; text-align: left; position: absolute; left: 85%; top: 40%;"><?php echo"$prix"?></span>
                        <a href="delete.php?idp=<?php echo"$idp"?>" style="margin-right: 1%; text-align: left; position: absolute; left: 95%; top: 40%;"><img src="image/delete.png" width="20"></a>
                    <hr>
                </div>
            </a>
            <?php
        }?> <br>
  </div>
  <div style="position: absolute; top: 100%; width: 100%;">
<?php
    foot();
?>
</div>
</body><br>
    
</html>
