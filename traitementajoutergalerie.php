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
$nomFichier = $_POST['photo_nom'];
$nomFichier = $nomFichier.".jpg";
$nomOrigine = $_FILES['photo']['name'];

// print_r($_FILES);

if ($_FILES['photo']['error']) {     
  switch ($_FILES['nom_du_fichier']['error']){     
    case 1: // UPLOAD_ERR_INI_SIZE     
      echo"Le fichier dépasse la limite autorisée par le serveur !";     
      break;     
    case 2: // UPLOAD_ERR_FORM_SIZE     
      echo "Le fichier dépasse la limite autorisée dans le formulaire HTML !"; 
      break;     
    case 3: // UPLOAD_ERR_PARTIAL     
      echo "L'envoi du fichier a été interrompu pendant le transfert !";     
      break;     
    case 4: // UPLOAD_ERR_NO_FILE     
      echo "Le fichier que vous avez envoyé a une taille nulle !"; 
      break;     
  }     
}     

if ((isset($_FILES['photo']['tmp_name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) {     
$chemin_destination = 'img/galerie/';     
move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination.$nomFichier);
}  

$galerie = $_POST['galerie'];
// echo $galerie;
$sql_ajouter_image = $db->query("INSERT INTO ".$galerie." (image_nom) VALUES ('".$nomFichier."')");
?>
<br />
<br />
<section>
<?php
if($sql_ajouter_image)
  {
    echo "<div id='success'>";
    echo "La photo a été ajoutée ! Vous allez être redirigé sur la galerie";
    echo "</div>" ;
    header('Refresh: 2; galerie.php');
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