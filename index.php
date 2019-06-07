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
<?php
$sql_accueil_id = $db->query("SELECT accueil_id FROM accueil");
$tableau = $sql_accueil_id->fetchAll(); //Stockage dans un tableau
$nb_enregistrements = count($tableau);
// echo $nb_enregistrements;
  if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajouterindex.php" method="post"><button id="ajouter" onclick="this.form.submit();">Ajouter du contenu</button></form>'; }}
for($a = 1; $a <= $nb_enregistrements; $a++){
  // echo $a;
  // ${sql_accueil_titre_.$a} = $db->query("SELECT accueil_titre FROM accueil WHERE accueil_id='".$a."'");
  // ${titre_.$a} = ${sql_accueil_titre_.$a}->fetch();
  $sql_accueil_titre = $db->query("SELECT accueil_titre FROM accueil WHERE accueil_id='".$a."'");
  $titre = $sql_accueil_titre->fetch();
  $sql_accueil_description = $db->query("SELECT accueil_description FROM accueil WHERE accueil_id='".$a."'");
  $description = $sql_accueil_description->fetch();
  echo '<form action="modifierindex.php" method="post">';
  echo '<section>';
  echo '<div class="row">';
   if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<div class="column left" id="accueil">';
 }
} else {
  echo '<div id="accueil2">';
}
  echo '<h2>';
  // echo ${titre_.$a}[0];
  echo '<input type="hidden" name="titre" value="'.$titre[0].'">';
  echo $titre[0];
  echo '</h2>';
  echo '<article>';
  echo '<input type="hidden" name="description" value="'.$description[0].'">';
  echo $description[0];
  echo '</article>';
  echo '</div>';
if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { 
echo '<div class="column right">';
echo '<button id="modifier" name="modifier" value='.$a.' onclick="this.form.submit();">Modifier</button>';
echo '<button id="supprimer" name="supprimer" value='.$a.'>Supprimer</button>';
  echo '</div>';
  echo '</div>';
 }
} else {
}
  echo '</section>';
  echo '</form>';
}
include('footer.php');
?>
</body>

