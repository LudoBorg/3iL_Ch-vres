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
?>
<br />
<br />
<section>
  <div id='success'>
    Votre mail a bien été transmis. Vous allez être redirigé vers la page d'accueil.
  </div>
  <?php
    header('Refresh: 2; index.php');
    ?>
</section>
<?php
include('footer.php');
?>
</body>