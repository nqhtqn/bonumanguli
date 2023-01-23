<?php
include "fonction.php";
$pdo = connexion();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bonum.css">
    <link rel="icon" href="image/Bonumanguli5.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <title>Inscription</title>
</head>

<body id="second">
    <!-- position-absolute top-50 start-50 translate-middle -->
    <div class="">
        <div id="divmid">
            <div class="rounded shadow text-left md-2">
                <div class="h1">
                    <H1 class="text-center">Inscription</H1>
                </div>
                <hr><br>
                <div class=text-end>
                    <form action="" method="post">
                        <a href="connexion.php" class="button">SE CONNECTER</a> <br>
                </div>

                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault01" class="form-label">Nom</label> <span class="etoile">*</span>
                    <input type="text" name="nom" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault02" class="form-label">Prénom</label><span class="etoile">*</span>
                    <input type="text" name="prenom" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault02" class="form-label">Pseudo</label><span class="etoile">*</span>
                    <input type="text" name="pseudo" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault02" class="form-label">Genre</label><span class="etoile">*</span><br>
                    <input class="form-check-input" type="radio" name="genre" id="masculin" value="Masculin">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Masculin
                    </label><br>
                    <input class="form-check-input" type="radio" name="genre" id="feminin" value="Féminin">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Féminin
                    </label><br>
                    <input class="form-check-input" type="radio" name="genre" id="autre" checked value="Licorne">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Licorne
                    </label>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault02" class="form-label">Date de naissance</label><span class="etoile">*</span>
                    <input type="date" name="anniv" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefaultUsername" class="form-label">Adresse mail</label><span class="etoile">*</span>
                    <div class="input-group">
                        <span class="input-group-text" id="inputGroupPrepend2">@</span>
                        <input type="text" name="mail" class="form-control" id="" aria-describedby="inputGroupPrepend2" required>
                    </div>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault03" class="form-label">Adresse Postale</label><span class="etoile">*</span>
                    <input type="text" name="adresse" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault03" class="form-label">Adresse Postale Ville</label><span class="etoile">*</span>
                    <input type="text" name="ville" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault04" class="form-label">Code postal</label><span class="etoile">*</span>
                    <input type="text" name="cp" class="form-control" id="" required>
                    </select>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault04" class="form-label">N° Telephone</label><span class="etoile">*</span>
                    <input type="tel" name="tel" class="form-control" id="" required>
                    </select>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault05" class="form-label">Mot de passe</label><span class="etoile">*</span>
                    <input type="password" name="mdp" minlength="10" class="form-control" id="" required>
                </div><br>
                <div class="col-md-4" style="margin-left:5%">
                    <label for="validationDefault06" class="form-label">Confirmer votre mot de passe</label><span class="etoile">*</span>
                    <input type="password" name="mdpverif" minlength="10" class="form-control" id="" required>
                </div><br>

                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">reset</button>
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" aria-label="Close">valider</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-start ">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                        <label class="form-check-label" for="invalidCheck2">
                            J'ai lu et j'accepte les conditions générales d'utilisation
                        </label>
                    </div><br>
                </div>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button class="btn btn-success" type="submit" value='Log In' name="bouton">Valider l'inscription</button>
            </div><br><br>
        </div>
    </div>
    </form>
    </div>
    <?php
    if (isset($_POST["bouton"])) {
        extract($_POST);
        $mdp2 = encode($mdp, $mail);
        if ($mdp == $mdpverif) {
            $stmt = $pdo->prepare("SELECT mail FROM user WHERE mail=?");
            $stmt->execute([$mail]);
            $user = $stmt->fetch();
            if ($user) {
                echo "Cette adresse mail est déjà utilisée";
            } else {
                $sql = "INSERT INTO user VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $pdo->prepare($sql)->execute([null, $prenom, $nom, $mail, $mdp2, $pseudo, $genre, $adresse, $cp, $ville, $tel, $anniv, 0, 0]);
                echo "Inscription réussie ! <br>Chargement de la page d'inscription...";
    ?>
                <meta http-equiv="refresh" content="0;url=connexion.php" />
    <?php
            }
            exit();
        } else echo "Les deux mots de passe sont différents";
    }
    ?>


    <!-- <footer class='text-center text-white ' style='background-color: rgba(0, 0, 0, 0.904);color:white;'>

        <div class='container pt-4'>

            <section class='text-center text-light'>

                <p>
                    Bonumanguli est un site deposée par ECE Bachelor. <br>
                    Tous droits réservés.
                </p>



            </section>
        </div>






        <div class='text-center text-light p-3' style='background-color: rgba(0, 0, 0, 0.2);'>
            © 2022 M.V.S <br>
        </div>


    </footer> -->
    </div>
</body>

</html>