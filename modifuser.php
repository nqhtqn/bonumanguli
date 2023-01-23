<?php
include "fonction.php";
session_start();
headsimple();
if (connecte() == False) {
  header("location:connexion.php");
}
$pdo = connexion();
$idu = $_SESSION["idu"];
$stmt = $pdo->prepare("SELECT * FROM user WHERE idu=?");
$stmt->execute([$idu]);
$user = $stmt->fetch();

if (isset($_POST["bouton"])) {
  extract($_POST);
  $sql = "UPDATE user SET prenom=?, nom=?, pseudo=?, adresse=?, cp=?, ville=?, tel=? WHERE idu=?";
  $pdo->prepare($sql)->execute([$prenom, $nom, $pseudo, $adresse, $cp, $ville, $tel, $idu]);
  header("location:home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="image/Bonumanguli5.png" />
  <link rel="stylesheet" href="bonum.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <title>Modification de mes données</title>
</head>

<body>
  <div id="second">
    <div class="rounded shadow text-left">
      <div id="divmid"><br>

        <div class="container">
          <div class="row">
            <div class="col-4">
                <!-- <h5><a href="home.php" class="btn btn-primary">Retour</a></h5> -->
                <a class="btn" href="home.php" role="button" id="third" style="text-decoration:none">
                <img src="image/retour.png" width="20">
                Retour</a>
            </div>

            <div class="col-4">
              <div class="h1 text-center">
                <h1>Votre compte</h1>
              </div>
            </div>

            <div class="col-4">
              <!-- <h5><a href="deco.php">Deconnexion</a></h5> -->
              <a class="btn" href="deco.php" role="button" id="third" style="margin-left: 50%; text-decoration:none">Deconnexion
              <img src="image/deco.png" width="20">
              </a>

            </div>

          </div>
        </div><br>

        <div class=text-end>
          <form action="" method="post">
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>

              <div class="modal-footer">
                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">reset</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">valider</button>
              </div>
            </div>
          </div>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault01" class="form-label">Nom</label><span class="etoile">*</span>
          <input type="text" name="nom" class="form-control" id="second" value="<?= $user["nom"] ?>" required>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault02" class="form-label">Prénom</label><span class="etoile">*</span>
          <input type="text" name="prenom" class="form-control" id="second" value="<?= $user["prenom"] ?>" required>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault02" class="form-label">Pseudo</label><span class="etoile">*</span>
          <input type="text" name="pseudo" class="form-control" id="second" value="<?= $user["pseudo"] ?>" required>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault02" class="form-label">Date de naissance</label>
          <input type="text" name="anniv" class="form-control" id="second" value="<?= $user["anniv"] ?>" disabled required>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefaultUsername" class="form-label">Adresse mail</label>
          <div class="input-group">
            <span class="input-group-text" id="inputGroupPrepend2">@</span>
            <input type="text" name="mail" class="form-control" id="second" aria-describedby="inputGroupPrepend2" value="<?= $user["mail"] ?>" disabled required>
          </div>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault04" class="form-label">Adresse Postale</label><span class="etoile">*</span>
          <input type="text" name="adresse" class="form-control" id="second" value="<?= $user["adresse"] ?>" required>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="6" class="form-label">Ville</label><span class="etoile">*</span>
          <input type="text" name="ville" class="form-control" id="second" value="<?= $user["ville"] ?>" required>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault04" class="form-label">Code postal</label><span class="etoile">*</span>
          <input type="text" name="cp" class="form-control" id="second" value="<?= $user["cp"] ?>" required>
          </select>
        </div><br>
        <div class="col-md-4" style="margin-left:5%">
          <label for="validationDefault05" class="form-label">Numero de telephone</label><span class="etoile">*</span>
          <input type="text" name="tel" class="form-control" id="second" value="<?= $user["tel"] ?>" required>
        </div><br>
        <button type="button" class="btn btn-warning" name="bouton2" style="margin-left:5%"><a href="modifmdp.php" style="text-decoration:none" name="bouton2">Modifier mon mot de passe</a></button><br><br>

        <div class="d-grid gap-2 col-6 mx-auto">
          <input class="btn btn-success text-center" type="submit" value="Modifier" name="bouton"><br><br>
        </div>
      </div>
    </div>
  </div><br><br>
  <?php
  foot();
  ?>

  <body>

</html>