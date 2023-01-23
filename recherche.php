<?php
include "fonction.php";
session_start();
$pdo = connexion();
headsimple();
$data = $pdo->query("SELECT DISTINCT tag FROM tag")->fetchAll();

$r = $_GET["r"];
$b = $_GET["b"];
$c = $_GET["c"];

if (isset($b) && !empty(trim($r))) {
  $words = explode(" ", trim($r));
  for ($i = 0; $i < count($words); $i++) {
    $mot[$i] = "nomp like '%" . $words[$i] . "%'";
  }
  if ($c == "null") {
    $res = $pdo->prepare("SELECT * FROM produit WHERE " . implode(" OR ", $mot));
    $res->execute();
    $tab = $res->fetchAll();
  } else {
    $res = $pdo->prepare("SELECT * FROM produit, tag WHERE produit.idp = tag.idp AND tag.tag = ? AND " . implode(" OR ", $mot));
    $res->execute([$c]);
    $tab = $res->fetchAll();
  }
} elseif (isset($b) && $c != "null") {
  $res = $pdo->prepare("SELECT * FROM produit, tag WHERE produit.idp = tag.idp AND tag.tag = ?");
  $res->execute([$c]);
  $tab = $res->fetchAll();
} else {
  $tab = $pdo->query("SELECT * FROM produit")->fetchAll();
}

if (isset($_GET["p"]) && $_GET["p"] == "asc") {
  usort($tab, 'prix_asc');
} else {
  usort($tab, 'prix_desc');
} 

if (isset($_GET["v"]) && $_GET["v"] == 'asc') {
  usort($tab, 'vu_asc');
} elseif (isset($_GET["v"]) && $_GET["v"] == 'desc') {
  usort($tab, 'vu_desc');
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
  <title>Bonumanguli - Recherche</title>
</head>

<body id="second">
  <div id="divmid"><br>
    <form class="d-flex" method="get" role="search">
      <div class="container">
        <div class="row">
          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="p" value="asc">
              <label class="form-check-label">
                Prix croissant
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" value="desc" name="p">
              <label class="form-check-label">
                Prix décroissant
              </label>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="v" value="asc">
              <label class="form-check-label">
                Les plus vus
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="v" value="desc">
              <label class="form-check-label">
                Les moins vus
              </label>
            </div>
          </div>
          <div class="col-md-2">
            <select class="form-select" name="c">
              <option value="null">Catégorie</option>
              <?php
              foreach ($data as $tag) {
              ?>
                <option value="<?php echo $tag['tag'] ?>"><?php echo $tag['tag'] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-md-4">
            <input class="form-control me-2" name="r" type="search" value="<?php echo $r ?>" placeholder="Recherchez l'article de vos rêves">
          </div>
          <div class="col-1">
            <button class="btn btn-outline-success" name="b" type="submit">Rechercher</button>
          </div>
        </div>
      </div>
    </form>
    <div class="nbr">
      <h2 id="textprimal">
        <?= count($tab) . " " . (count($tab) > 1 ? "résultats trouvés" : "résultat trouvé") ?></h2>
    </div>
    <div class="container" style="width: 80%;">
      <div class="row">
        <?php foreach ($tab as $prod) { ?>
          <div class="col-4">
            <div id="annonce">
              <div class="card" style="height: 25rem;">
                <div style="width: 100%; height: 100%; overflow: hidden;">
                  <img src="<?php echo $prod["photo1"] ?>" height="50%" class="d-block w-5" style="margin:auto">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $prod["nomp"] ?></h5><br>
                    <h5 class="card-title"><?php echo $prod["prix"] ?>€</h5><br>
                    <a href="detailprod.php?idp=<?php echo $prod["idp"] ?>" class="btn btn-primary">
                      <img src="image/voir.png" width="20">Voir l'annonce</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>