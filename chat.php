<?php
include "fonction.php";
session_start();
$pdo = connexion();
if (connecte() == False) {
    header("refresh:0;url=connexion.php");
}
$idp = $_GET["idp"];
if($idp == 0){
    $idrec = $_GET["idsend"];
}else{
    $stmt = $pdo->prepare("SELECT * FROM produit WHERE idp=?");
    $stmt->execute([$idp]);
    $ligne = $stmt->fetch();
    $idrec = $ligne["idu"];    
}
$idu = $_SESSION["idu"];

$stmt = $pdo->prepare("SELECT * FROM user WHERE idu=?");
$stmt->execute([$idrec]);
$ligne3 = $stmt->fetch();
$nomu = $_SESSION["nom"] . " " . $_SESSION["prenom"];
$nomr = $ligne3["nom"] . " " . $ligne3["prenom"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <link rel="stylesheet" href="bonum.css">
    <link rel="icon" href="image/Bonumanguli5.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="bonum.js"></script>

</head>

<body>
    <div class="body">
        <section class="msger">
            <header class="msger-header">
                <div class="msger-header-title">
                    <i class="fas fa-comment-alt"></i>Chat
                </div>
                <div class="msger-header-options">
                    <span><i class="fas fa-cog"></i></span>
                </div>
            </header>

            <main class="msger-chat" id="messageBody">
                <?php
                $stmt = $pdo->prepare("SELECT * FROM messages WHERE (idsend = ? AND idrec = ?) OR (idsend = ? AND idrec = ?) ORDER BY dates ASC");
                $stmt->execute([$idu, $idrec, $idrec, $idu]);
                while ($ligne2 = $stmt->fetch()) {
                    $time = $ligne2["dates"];
                    $message = $ligne2["mess"];
                    if ($ligne2["idrec"] == $idu) { ?>
                        <div class="msg left-msg">

                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name"><?php echo "$nomr" ?></div>
                                    <div class="msg-info-time"><?php echo "$time" ?></div>
                                </div>

                                <div class="msg-text" style="word-wrap: break-word;">
                                    <?php echo "$message" ?>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="msg right-msg">


                            <div class="msg-bubble">
                                <div class="msg-info">
                                    <div class="msg-info-name"><?php echo "$nomu" ?></div>
                                    <div class="msg-info-time"><?php echo "$time" ?></div>
                                </div>

                                <div class="msg-text" style="word-wrap: break-word;">
                                    <?php echo "$message" ?>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
                <script>
                    var messageBody = document.querySelector('#messageBody');
                    messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                </script>


            </main>

            <form method="post" class="msger-inputarea" action="ajoutmess.php?idp=<?php echo "$idp" ?>&idsend=<?php echo"$idrec"?>">
                <input type="text" class="msger-input" name="mess" placeholder="Entre ton message..." required>
                <button type="submit" class="msger-send-btn" name="Bouton">Envoyer</button>
            </form>
        </section>

    </div>
</body>

</html>