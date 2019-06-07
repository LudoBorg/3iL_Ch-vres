<?php
session_start();
if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { header('Location: admin.php');
  }
}
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
  <form action="admin.php" method="post">
  <div id="contact">
    <div id="gauche">
      <label id="titre" >Prénom Nom :</label>
        <input type="text" class="form-control" name="login" value="" placeholder="Ex : Jean Dupont" required />
    </div>
    <div id="droite">
      <label id="titre">Mot de passe :</label>
        <input type="password" class="form-control" name="mdp" value="" required /> 
    </div>
    <input type="submit" name="Connexion" value="Connexion" />
  </div>
  <br />
  <br />
  </form>
</section>
<?php
include('footer.php');
?>
</body>

