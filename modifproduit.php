<?php
include "fonction.php";
session_start();
if (connecte() == False) {
    header("location:connexion.php");
}
$pdo = connexion();
$idu = $_SESSION["idu"];
$idp = $_GET["idp"];
$stmt = $pdo->prepare("SELECT * FROM produit WHERE idp=?");
$stmt->execute([$idp]);
$ligne = $stmt->fetch();
    $photo1 = $ligne["photo1"];
    $photo2 = $ligne["photo2"];
    $photo3 = $ligne["photo3"];
    $nomp = $ligne["nomp"];
    $descri = $ligne["descri"];
    $prix = $ligne["prix"];
    $etat = $ligne["etat"];
    $vu = $ligne["vu"];
$stmt->execute([$idp]);
$produit = $stmt->fetch();
$extensions = array('jpg', 'jpeg', 'png');
$data = $pdo->query("SELECT DISTINCT tag FROM tag")->fetchAll();
headsimple();
if (isset($_POST["bouton"])) {
    extract($_POST);
    $ext = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
    if (($_FILES['photo']['size'] < 20971520) && (in_array($ext, $extensions))) {
        $photo1 = 'produit/' . $_SESSION["idu"] . '-' . $nomp . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], $photo1);

        if (($_FILES['photo2']['error'] == 0) && ($_FILES['photo2']['size'] < 20971520) && (in_array($ext, $extensions))) {
            $photo2 = 'produit/' . $_SESSION["idu"] . '-' . $nomp . '2.' . $ext;
            move_uploaded_file($_FILES['photo2']['tmp_name'], $photo2);
        } else {
            $photo2 = "";
        }
        if (($_FILES['photo3']['error'] == 0) && ($_FILES['photo3']['size'] < 20971520) && (in_array($ext, $extensions))) {
            $photo3 = 'produit/' . $_SESSION["idu"] . '-' . $nomp . '3.' . $ext;
            move_uploaded_file($_FILES['photo3']['tmp_name'], $photo3);
        } else {
            $photo3 = "";
        }
        $sql = "UPDATE produit SET nomp=?, descri=?, prix=?, photo1=?, photo2=?, photo3=?, etat=? WHERE idp=?";
        $pdo->prepare($sql)->execute([$nomp, $descri, $prix, $photo1, $photo2, $photo3, $etat, $idp]);
        echo "<h3>Votre annonce a bien été modifier ! <br>Retour à l'accueil...</h3>";
    } else {
        $stmt = $pdo->prepare("SELECT idp FROM produit WHERE nomp=? and idu=?");
        $stmt->execute([$nomp, $_SESSION["idu"]]);
        $prod = $stmt->fetch();
        if (isset($_POST['categ'])) {
            $sql = "DELETE FROM tag WHERE idp=?";
            $pdo->prepare($sql)->execute([$idp]);
            foreach ($_POST['categ'] as $tag) {
                $sql = "INSERT INTO tag VALUES (?,?,?)";
                $pdo->prepare($sql)->execute([null, $idp, $tag]);
            }
        }
        $sql = "UPDATE produit SET nomp=?, descri=?, prix=?, etat=? WHERE idp=?";
        $pdo->prepare($sql)->execute([$nomp, $descri, $prix, $etat, $idp]);

        // echo ($idp . " " . $_SESSION["idu"] . " " . $nomp . " " . $descri . " " . $prix . " " . $photo1 . " " . $photo2 . " " . $photo3 . " " . $etat);
        echo "<h3>Votre annonce a bien été modifiée ! <br>Retour à l'accueil...</h3>";
        header("refresh:2;url=home.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier un article</title>
    <link rel="icon" href="image/Bonumanguli5.png" />
    <link rel="stylesheet" href="bonum.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>


<body id="second">
    <div id="divmid">
        <div id="divannonce">
            <span style="text-align: center; padding: 1em;">
                <h1>modifier une annonce</h1>
            </span><br><br>
            <div style="width: 90%; position: relative; left: 5%;" class="text-center">

                <form action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nomp" id="floatingInput" placeholder="Nom de l'article" value="<?= $produit["nomp"] ?>" required>
                                <label for=" floatingInput" class="form-label">Nom de l'article<span class="etoile"> *</span></label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating">
                                <select class="form-select" name="etat" id="floatingSelect" placeholder="Etat" value="<?= $produit["etat"] ?>" required>
                                    <option value="<?= $produit["etat"] ?>"><?= $produit["etat"] ?> (etat actuel)</option>
                                    <option value="Très bon état">Très bon état</option>
                                    <option value="Bon état">Bon état</option>
                                    <option value="Etat satisfaisant">Etat satisfaisant</option>
                                    <option value="Mauvais état">Mauvais état</option>
                                </select>
                                <label for="floatingSelect">Etat<span class="etoile"> *</span></label>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group">
                                <input type="number" name="prix" min="0" step="0.01" class="form-control" id="prix" placeholder="Prix" value="<?= $produit["prix"] ?>" required>
                                <span class="input-group-text">€</span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-7">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="descri" maxlength="1500" id="floatingTextarea1" placeholder="Description" value="<?= $produit["descri"] ?>" rows=" 3" style="height: 245px" required><?= $produit["descri"] ?></textarea>
                                <label for="floatingTextarea1" class="form-label">Description<span class="etoile"> *</span></label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Photo de l'article<span class="etoile"> *</span></label>
                                <input class="form-control" name="photo" type="file" id="formFile" accept=".png, .jpg, .jpeg"><br>
                            </div>
                            <label for="formFile" class="form-label">Photos supplémentaires</label>
                            <input class="form-control" name="photo2" type="file" id="formFile" accept=".png, .jpg, .jpeg"><br>
                            <input class="form-control" name="photo3" type="file" id="formFile" accept=".png, .jpg, .jpeg">
                        </div>
                    </div>
                    <br>
                    <h5>Catégorie(s)</h5><br>
                    <?php
                    foreach ($data as $row) {
                    ?>
                        <form action="" method="post">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="categ[]" value="<?php echo $row['tag'] ?>">
                                <label class="form-check-label" for="inlineCheckbox1"><?php echo $row['tag'] ?></label>
                            </div>
                        <?php
                    }
                        ?><br>
                        <br><br>
                        <button type="submit" class="btn btn-primary" name="bouton">Modifier l'annonce</button>
                        </form>
            </div>
        </div><br>
    </div><br><br>
</body>
<?php
foot()
?>

</html>