<?php
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') {
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
$titre = $_POST['titre'];
$description = $_POST['description'];
$titre = addslashes($titre);
$description = addslashes($description);

$sql_ajouter = $db->query("INSERT INTO accueil (accueil_titre, accueil_description) VALUES ('".$titre."', '".$description."')");
?>
<br />
<br />
<section>
<?php
if($sql_ajouter)
  {
    echo "<div id='success'>";
    echo "Les informations ont été ajoutées";
    echo "</div>" ;
    header('Refresh: 2; index.php');
  }
  else
  {
    echo "<div id='error'>";
    echo "Les informations n'ont pas pu être ajoutées ! Veuillez contacter les développeurs !";
    echo "</div>" ;
    header('Refresh: 2; contact.php');
  }
?>
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
?>