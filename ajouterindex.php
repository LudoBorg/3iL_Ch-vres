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
?>
<br />
<br />
<section>
  <form action="traitementajouterindex.php" method="post">
  <div id="contact">
    <label for="titre" id="titre">Titre :</label> 
      <input type="text" name="titre" required>
    <label for="description" id="titre">Description :</label> 
      <textarea rows="5" name="description" required></textarea>
    <input type="submit" name="ajouter" value="Ajouter">
    </div>
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
?>