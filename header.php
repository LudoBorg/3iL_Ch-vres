<?php
//connection a la bdd
try {
$db = new PDO("mysql:unix_socket=/run/mysqld/mysqld10.sock;dbname=chevres;charset=utf8mb4", 'root', 'Toto123', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (Exception $e) {
die('Erreur : ' . $e->getMessage());
}
?>
  <header>
    <h1>
      Les chèvres <?php if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<a href="deconnexion.php"><img src=img/deconnexion.png href="deconnexion.php" id="déconnexion"></a>'; }} ?>
    </h1>     
    <nav>
      <ul>
        <li><a href="index.php" title="Accueil">Accueil</a></li>
        <li><a href="galerie.php" title="Galerie">Galerie</a></li>
        <li><a href="contact.php" title="Contact">Contact</a></li>
        <li><a href="connexion.php" title="Connexion"  id="border-right">Connexion</a></li>
      </ul>
    </nav>
  </header>