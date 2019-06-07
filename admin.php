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
ini_set("display_errors",0);error_reporting(0); /*Désactiver les erreurs php sur cette page*/
if (!isset($login) AND !isset($mdp)) {
	$login = $_POST['login'];
	$login = strtolower($login); /*Transformer le login en minuscule*/
	$mdp = $_POST['mdp'];
	}	
if (isset($login) AND isset($mdp) AND $login == "client" AND $mdp == "Toto123" OR $_SESSION['login'] == "client" AND $_SESSION['mdp'] == "Toto123"){
	$_SESSION['login'] = "client";
	$_SESSION['mdp'] = "Toto123";
include('menu.php');
?>
  <br />
  <br />
<section id="success">
Vous êtes connecté ! Vous pouvez modifier votre site internet !
</section>
<?php
include('footer.php');
?>
</body>
<?php
} else {
	echo "<script>alert(\"Login ou mot de passe incorrect, veuillez vous connecter\")</script>";
  	header('Refresh: 0.5; http://localhost/ProjetsWeb/Web/connexion.php');
  	exit;
}
?>
