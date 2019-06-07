<?php
session_start();
//connection a la bdd
try {
$db = new PDO("mysql:unix_socket=/run/mysqld/mysqld10.sock;dbname=chevres;charset=utf8mb4", 'root', 'Toto123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php
include('head.php');
?>
</head>
<body>
<?php
include('header.php');
if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') {
$galerie = $_POST['galerie'];
// echo $galerie;
$sql_count_images = $db->query("SELECT COUNT(image_nom) FROM ".$galerie."");
$nb_images = $sql_count_images->fetch();
$nb_images = $nb_images[0];
if ($nb_images >= '6'){
  echo "<script>alert(\"La galerie est limitée à 6 photos ! Veuillez en supprimer avant d'en rajouter\")</script>";
  header('Refresh: 0.5; http://localhost/ProjetsWeb/Web/galerie.php');
  exit;
}
?>
<br />
<br />
<section>
  <form action="traitementajoutergalerie.php" method="post" enctype="multipart/form-data">
    <?php
      echo '<input type="hidden" name="galerie" value="'.$galerie.'">';
    ?>
  <div id="contact">
      <label id="titre">Nom : (Le .jpg sera ajouté automatiquement)</label>
        <input type="text" class="form-control" name="photo_nom" required />
      <label id="titre">Photo : (2Mo JPG)</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
        <input type="file" class="form-control" name="photo" required /> 
    <input type="submit" name="ajouter" value="Ajouter la photo" />
  </div>
  <br />
  <br />
  </form>
</section>
<?php
include('footer.php');
?>
</body>
<?php
}
} else {
  echo "<script>alert(\"Veuillez vous authentifier !\")</script>";
  header('Refresh: 0.5; http://localhost/ProjetsWeb/Web/connexion.php');
  exit;
}