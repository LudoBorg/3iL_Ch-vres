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
?>
<br />
  <?php
$sql_galerie = $db->query("SELECT image_id, image_nom FROM ".$galerie."");
$tableau_galerie = $sql_galerie->fetchAll(); //Stockage dans un tableau
$nb_enregistrements = count($tableau_galerie);
// echo $nb_enregistrements;
// echo $tableau_galerie[0][1];
      echo '<input type="hidden" name="galerie" value="'.$galerie.'">';
  ?>
  <p id="p_contact">
    Veuillez cliquer sur une image pour la supprimer<br />
  </p>
    <div class="centrer">
      <div class="flex">
          <?php
          $b=1;
          for ($a = 0; $a<$nb_enregistrements; $a++){
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_galerie[$a][1];
            echo '" id="';
            echo $b;
            echo '" onclick="supprimer('.$b.')">';
            $b++;
          }
          ?>
        </div>
    </div>
<?php
include('footer.php');
?>
<script type="text/javascript" src="scripts.js" charset="utf-8"></script>
</body>
<?php
}
} else {
  echo "<script>alert(\"Veuillez vous authentifier !\")</script>";
  header('Refresh: 0.5; http://localhost/ProjetsWeb/Web/connexion.php');
  exit;
}
?>
