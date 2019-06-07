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
if(isset($_POST['modifier'])){
$input = $_POST['modifier'];
// echo $input;
$sql_accueil_titre = $db->query("SELECT accueil_titre FROM accueil WHERE accueil_id='".$input."'");
$titre = $sql_accueil_titre->fetch();
$sql_accueil_description = $db->query("SELECT accueil_description FROM accueil WHERE accueil_id='".$input."'");
$description = $sql_accueil_description->fetch();
// echo $titre[0];
// echo $description[0];
// $_SESSION['titre'] = $titre[0];
// $_SESSION['description'] = $description[0];
?>
<br />
<br />
<section>
  <form action="traitementmodifierindex.php" method="post">
    <input type="hidden" name="id" value="<?php echo $input; ?>"> <!-- Pour faire passer l'id dans la page de traitement -->
  <div id="contact">
    <label for="titre" id="titre">Titre :</label> 
      <input type="text" name="titre" value="<?php echo $titre[0];?>" required>
    <label for="description" id="titre">Description :</label> 
      <textarea rows="5" name="description" required><?php echo $description[0];?></textarea>
    <input type="submit" name="modifier" value="Modifier" id="modifierindex">
    </div>
  </form>
</section>
<?php
} else if (isset($_POST['supprimer'])){
  $input = $_POST['supprimer'];
  // echo $input;
$sql_accueil_titre = $db->query("SELECT accueil_titre FROM accueil WHERE accueil_id='".$input."'");
$titre = $sql_accueil_titre->fetch();
$sql_accueil_description = $db->query("SELECT accueil_description FROM accueil WHERE accueil_id='".$input."'");
$description = $sql_accueil_description->fetch();
// echo $titre[0];
// echo $description[0];
// $_SESSION['titre'] = $titre[0];
// $_SESSION['description'] = $description[0];
?>
<script type="text/javascript">
  alert("Vous êtes sur le point de supprimer un enregistrement !");
</script>
<br />
<br />
<section>
  <form action="traitementsupprimerindex.php" method="post">
    <input type="hidden" name="id" value="<?php echo $input; ?>"> <!-- Pour faire passer l'id dans la page de traitement -->
  <div id="contact">
    <label for="titre" id="titre">Titre :</label> 
      <input type="text" name="titre" value="<?php echo $titre[0];?>" disabled>
    <label for="description" id="titre">Description :</label> 
      <textarea rows="5" name="description" disabled><?php echo $description[0];?></textarea>
    <input type="submit" name="supprimer" value="Supprimer" id="supprimerindex">
    </div>
  </form>
</section>
<?php
}
}
include('footer.php');
?>
</body>
<?php
} else {
  echo "<script>alert(\"Veuillez vous authentifier !\")</script>";
  header('Refresh: 0.5; http://localhost/ProjetsWeb/Web/connexion.php');
  exit;
}
?>