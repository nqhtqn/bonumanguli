<?php
include "fonction.php";
session_start();
$pdo = connexion();
headermain();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="image/Bonumanguli5.png" />
    <link rel="stylesheet" href="bonum.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Bonumanguli</title>
</head>

<body id="second">
    <div id="divmid">
        <div id="divannonce">

            <div class="container" style="padding: 3%;">
                <div class="row">

                    <div class="col-3">
                        <a class="btn" href="ajoutprod.php" role="button" id="third" style="text-decoration:none">
                            <img src="image/plus.png" width="20">
                            Déposer une annonce</a>
                    </div>

                    <div class="col-6">
                        <h3>Annonces les plus vues</h3>
                    </div>

                    <div class="col-3">

                    </div>
                </div>
            </div>

            <?php
            $stmt = $pdo->prepare("SELECT * FROM produit ORDER BY vu DESC");
            $stmt->execute();
            $prod1 = $stmt->fetch();
            $prod2 = $stmt->fetch();
            $prod3 = $stmt->fetch();
            ?>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div id="annonce">
                            <div class="card" style="height: 25rem;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="<?php echo $prod1["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">

                                    <div class="card-body" style="width: 100%; height: 50%;">
                                        <h5 class="card-title"><?php echo $prod1["nomp"] ?></h5><br>
                                        <h5 class="card-title"><?php echo $prod1["prix"] ?>€</h5><br>
                                        <a href="detailprod.php?idp=<?php echo $prod1["idp"] ?>" style="text-decoration:none" class="btn btn-primary">
                                            <img src="image/voir.png" width="20">
                                            Voir l'annonce
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="annonce">
                            <div class="card" style="height: 25rem;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="<?php echo $prod2["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">

                                    <div class="card-body" style="width: 100%; height: 50%;">
                                        <h5 class="card-title"><?php echo $prod2["nomp"] ?></h5><br>
                                        <h5 class="card-title"><?php echo $prod2["prix"] ?>€</h5><br>
                                        <a href="detailprod.php?idp=<?php echo $prod2["idp"] ?>" style="text-decoration:none" class="btn btn-primary">
                                            <img src="image/voir.png" width="20">
                                            Voir l'annonce
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="annonce">
                            <div class="card" style="height: 25rem;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="<?php echo $prod3["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">

                                    <div class="card-body" style="width: 100%; height: 50%;">
                                        <h5 class="card-title"><?php echo $prod3["nomp"] ?></h5><br>
                                        <h5 class="card-title"><?php echo $prod3["prix"] ?>€</h5><br>
                                        <a href="detailprod.php?idp=<?php echo $prod3["idp"] ?>" style="text-decoration:none" class="btn btn-primary">
                                            <img src="image/voir.png" width="20">
                                            Voir l'annonce
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <hr style="margin: auto 10%">
            <!-- Annonces les plus récentes -->


            <div class="container" style="padding: 3%;">
                <div class="row">

                    <div class="col-3">

                    </div>

                    <div class="col-6">
                        <h3>Annonces récentes</h3>
                    </div>

                    <div class="col-3">

                    </div>
                </div>
            </div>

            <?php
            $stmt = $pdo->prepare("SELECT * FROM produit ORDER BY idp DESC");
            $stmt->execute();
            $prod1 = $stmt->fetch();
            $prod2 = $stmt->fetch();
            $prod3 = $stmt->fetch();
            ?>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div id="annonce">
                            <div class="card" style="height: 25rem;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="<?php echo $prod1["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">

                                    <div class="card-body" style="width: 100%; height: 50%;">
                                        <h5 class="card-title"><?php echo $prod1["nomp"] ?></h5><br>
                                        <h5 class="card-title"><?php echo $prod1["prix"] ?>€</h5><br>
                                        <a href="detailprod.php?idp=<?php echo $prod1["idp"] ?>" style="text-decoration:none" class="btn btn-primary">
                                            <img src="image/voir.png" width="20">
                                            Voir l'annonce
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="annonce">
                            <div class="card" style="height: 25rem;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="<?php echo $prod2["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">

                                    <div class="card-body" style="width: 100%; height: 50%;">
                                        <h5 class="card-title"><?php echo $prod2["nomp"] ?></h5><br>
                                        <h5 class="card-title"><?php echo $prod2["prix"] ?>€</h5><br>
                                        <a href="detailprod.php?idp=<?php echo $prod2["idp"] ?>" style="text-decoration:none" class="btn btn-primary">
                                            <img src="image/voir.png" width="20">
                                            Voir l'annonce
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div id="annonce">
                            <div class="card" style="height: 25rem;">
                                <div style="width: 100%; height: 100%; overflow: hidden;">
                                    <img src="<?php echo $prod3["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">

                                    <div class="card-body" style="width: 100%; height: 50%;">
                                        <h5 class="card-title"><?php echo $prod3["nomp"] ?></h5><br>
                                        <h5 class="card-title"><?php echo $prod3["prix"] ?>€</h5><br>
                                        <a href="detailprod.php?idp=<?php echo $prod3["idp"] ?>" style="text-decoration:none" class="btn btn-primary">
                                            <img src="image/voir.png" width="20">
                                            Voir l'annonce
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>





        </div>
    </div>
    <?php
    foot();
    ?>
</body>

</html>