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
$id = $_POST['id'];


$sql_galerie_id = $db->query("SELECT image_id FROM ".$galerie."");
$tableau = $sql_galerie_id->fetchAll(); //Stockage dans un tableau
$nb_enregistrements = count($tableau);
/*Lors de la suppression d'un enregistrement, on modifie tous les ids suivant pour que les ids dans la bdd se suivent*/
$sql_delete = $db->query("DELETE FROM ".$galerie." WHERE image_id='".$id."'");
$b = $id+1;
for ($b; $b<=$nb_enregistrements; $b++){
  $sql_modif_id = $db->query("UPDATE ".$galerie." SET image_id='".$id."' WHERE image_id='".$b."'");
  $id++;
}
$sql_altertable = $db -> query("ALTER TABLE ".$galerie." AUTO_INCREMENT = 1");
?>
<br />
<br />
<section>

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