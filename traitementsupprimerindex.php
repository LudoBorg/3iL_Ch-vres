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
$id = $_POST['id'];
$sql_accueil_id = $db->query("SELECT accueil_id FROM accueil");
$tableau = $sql_accueil_id->fetchAll(); //Stockage dans un tableau
$nb_enregistrements = count($tableau);
/*Lors de la suppression d'un enregistrement, on modifie tous les ids suivant pour que les ids dans la bdd se suivent*/
$sql_delete = $db->query("DELETE FROM accueil WHERE accueil_id='".$id."'");
$b = $id+1;
for ($b; $b<=$nb_enregistrements; $b++){
  $sql_modif_id = $db->query("UPDATE accueil SET accueil_id='".$id."' WHERE accueil_id='".$b."'");
  $id++;
}
$sql_altertable = $db -> query("ALTER TABLE accueil AUTO_INCREMENT = 1");
?>
<br />
<br />
<section>
  <?php
  if($sql_delete)
  {
    echo "<div id='success'>";
    echo "Les modifications ont été effectuées ! Vous allez être redirigé vers l'accueil";
    echo "</div>" ;
    header('Refresh: 2; index.php');
  }
  else
  {
    echo "<div id='error'>";
    echo "Les modifications n'ont pas pu être effectuées ! Veuillez contacter les développeurs ! Vous allez être redirigé vers le formualaire de contact";
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