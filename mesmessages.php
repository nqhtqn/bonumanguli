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
    <title>Vos messages
    </title>
    <link rel="stylesheet" href="bonum.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>

<body id="second">
    <div id="divmid">
        <h1 style="text-align: center;" id="textthird">Vos demandes</h1>

        <?php
        $idu = $_SESSION["idu"];
        $stmt = $pdo->prepare("SELECT DISTINCT idsend FROM messages WHERE idrec=?");
        $stmt->execute([$idu]);
        while ($ligne = $stmt->fetch()) {
            $idsend = $ligne["idsend"];
            if($idsend != $idu){
            $stmt = $pdo->prepare("SELECT * FROM user WHERE idu=?");
            $stmt->execute([$idsend]);
            $ligne2 = $stmt->fetch();
            $nomsend = $ligne2["nom"];
            $pnomsend = $ligne2["prenom"];
            $stmt = $pdo->prepare("SELECT * FROM messages WHERE (idsend = ? AND idrec = ?) OR ( idrec = ? AND  idsend = ?) ORDER BY dates DESC");
            $stmt->execute([$idu, $idsend, $idsend, $idu]);
            $ligne3 = $stmt->fetch();
            $message = $ligne3["mess"];
        ?><a href="chat.php?idp=0&idsend=<?php echo "$idsend" ?>" style="color: black;">
                <div id="prodfav" style="position: relative;">
                    <hr>

                    <span style="font-weight: bold; margin-right: 2%;"><?php echo "$nomsend $pnomsend" ?></span>
                    <span style="margin-right: 10%; word-wrap: break-word;"><?php echo "$message" ?></span>
                    <span style="margin-right: 1%; text-align: left; position: absolute; left: 85%; top: 40%;"><?php echo "coucou" ?></span>

                    <hr>
                </div>
            </a>
        <?php
            }
        } ?> <br>
    </div>

    

</body>
<?php
    foot();
    ?>
</html>