<?php
include "fonction.php";
session_start();
if (connecte() == False) {
  header("location:connexion.php");
}
$pdo = connexion();
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
    $sql = "INSERT INTO produit VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $pdo->prepare($sql)->execute([null, $_SESSION["idu"], $nomp, $descri, $prix, $photo1, $photo2, $photo3, $etat, 0, date("Y-m-d H:i:s")]);
    echo "<h3>Votre annonce a bien été enregistrée ! <br>Retour à l'accueil...</h3>";

    $stmt = $pdo->prepare("SELECT idp FROM produit WHERE nomp=? and idu=?");
    $stmt->execute([$nomp, $_SESSION["idu"]]); 
    $prod = $stmt->fetch();
    if(isset($_POST['categ']))
    {
      foreach($_POST['categ'] as $tag)
      {
        $sql = "INSERT INTO tag VALUES (?,?,?)";
        $pdo->prepare($sql)->execute([null, $prod["idp"], $tag]);
      }
    }
    header("refresh:2;url=home.php");
  } else {
    echo "<h3><span class='erreur'>Photo non valide</span></h3>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter un article</title>
  <link rel="icon" href="image/Bonumanguli5.png"/>
  <link rel="stylesheet" href="bonum.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>


<body id="second">
  <div id="divmid">
    <div id="divannonce">
      <span style="text-align: center; padding: 1em;">
        <h1>Ajouter une annonce</h1>
      </span><br><br>
      <div style="width: 90%; position: relative; left: 5%;" class="text-center">

        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-6">
            <div class="form-floating mb-3">      
              <input type="text" class="form-control" name="nomp" id="floatingInput" placeholder="Nom de l'article" required>
              <label for="floatingInput" class="form-label">Nom de l'article<span class="etoile"> *</span></label>
            </div>
          </div>
          <div class="col-3">
            <div class="form-floating">
              <select class="form-select" name="etat" id="floatingSelect" placeholder="Etat" required>
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
              <input type="number" name="prix" min="0" step="0.01" class="form-control" id="prix" placeholder="Prix" required>
              <span class="input-group-text">€</span>
            </div>
          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-7">
            <div class="form-floating mb-3">
              <textarea class="form-control" name="descri" maxlength="1500" id="floatingTextarea1" placeholder="Description" rows="3" style="height: 245px" required></textarea>
              <label for="floatingTextarea1" class="form-label">Description<span class="etoile"> *</span></label>
            </div>
          </div>
          <div class="col-5">
            <div class="mb-3">
              <label for="formFile" class="form-label">Photo de l'article<span class="etoile"> *</span></label>
              <input class="form-control" name="photo" type="file" id="formFile"accept=".png, .jpg, .jpeg" required><br>
            </div>
            <label for="formFile" class="form-label">Photos supplémentaires</label>
            <input class="form-control" name="photo2" type="file" id="formFile" accept=".png, .jpg, .jpeg"><br>
            <input class="form-control" name="photo3" type="file" id="formFile" accept=".png, .jpg, .jpeg">
          </div>
        </div>
        <br><h5>Catégorie(s)</h5><br>
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
        <button type="submit" class="btn btn-primary" name="bouton">Poster l'annonce</button>
        </form>
      </div>
    </div><br>
  </div><br><br>
</body>
<?php
foot()
?>
</html>