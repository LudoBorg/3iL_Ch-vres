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
$sql_galerie_ameriquenord = $db->query("SELECT image_id, image_nom FROM galerieameriquenord");
$tableau_ameriquenord = $sql_galerie_ameriquenord->fetchAll(); //Stockage dans un tableau
$nb_enregistrements_ameriquenord = count($tableau_ameriquenord);

$sql_galerie_ameriquesud = $db->query("SELECT image_id, image_nom FROM galerieameriquesud");
$tableau_ameriquesud = $sql_galerie_ameriquesud->fetchAll(); //Stockage dans un tableau
$nb_enregistrements_ameriquesud = count($tableau_ameriquesud);

$sql_galerie_europe = $db->query("SELECT image_id, image_nom FROM galerieeurope");
$tableau_europe = $sql_galerie_europe->fetchAll(); //Stockage dans un tableau
$nb_enregistrements_europe = count($tableau_europe);

$sql_galerie_asie = $db->query("SELECT image_id, image_nom FROM galerieasie");
$tableau_asie = $sql_galerie_asie->fetchAll(); //Stockage dans un tableau
$nb_enregistrements_asie = count($tableau_asie);

$sql_galerie_afrique = $db->query("SELECT image_id, image_nom FROM galerieafrique");
$tableau_afrique = $sql_galerie_afrique->fetchAll(); //Stockage dans un tableau
$nb_enregistrements_afrique = count($tableau_afrique);

$sql_galerie_oceanie = $db->query("SELECT image_id, image_nom FROM galerieoceanie");
$tableau_oceanie = $sql_galerie_oceanie->fetchAll(); //Stockage dans un tableau
$nb_enregistrements_oceanie = count($tableau_oceanie);
?>
<br />
<br />
<section>
  <div id="contact">
    <div id="gauche">
      <label id="titre">Amérique du Nord</label>
        <section id="slideshow_amerique_nord">
          <div class="container">
          <?php
          for ($a = 0; $a<$nb_enregistrements_ameriquenord; $a++){
            echo '<div class="slider">';
            echo '<figure>';
            echo '<ul id="liste_photo">';
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_ameriquenord[$a][1];
            echo '" alt="';
            echo $a;
            echo '" id="';
            echo $a;
            echo '">';
            echo '</ul>';
            echo '</figure>';
            echo '</div>';
          }
          ?>
          </div>
          <div id="mini_photo">
          <?php
          for ($a = 0; $a<$nb_enregistrements_ameriquenord; $a++){
            echo '<a href="#';
            echo $a;
            echo '" id="menu_photo"><img src="img/galerie/';
            echo $tableau_ameriquenord[$a][1];
            echo '" id="menu_photo"></a>';
          }
          ?>
          </div>
  </section>
      <?php 
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajoutergalerie.php" method="post"><div id="gauche"><button id="ajoutergalerie" name="galerie" value="galerieameriquenord" onclick="this.form.submit();">Ajouter une photo</button></div></form>'; }}
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="supprimergalerie.php" method="post"><div id="droite"><button id="supprimergalerie" name="galerie" value="galerieameriquenord" onclick="this.form.submit();">Supprimer une photo</button></div></form>'; }}
      ?>
</div>
<div id="droite">
  <label id="titre">Amérique du Sud</label>
    <section id="slideshow_amerique_sud">
      <div class="container">
          <?php
          $b=10;
          for ($a = 0; $a<$nb_enregistrements_ameriquesud; $a++){
            echo '<div class="slider">';
            echo '<figure>';
            echo '<ul id="liste_photo">';
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_ameriquesud[$a][1];
            echo '" alt="';
            echo $b;
            echo '" id="';
            echo $b;
            echo '">';
            echo '</ul>';
            echo '</figure>';
            echo '</div>';
            $b++;
          }
          ?>
          </div>
          <div id="mini_photo">
          <?php
          $b = 10;
          for ($a = 0; $a<$nb_enregistrements_ameriquesud; $a++){
            echo '<a href="#';
            echo $b;
            echo '" id="menu_photo"><img src="img/galerie/';
            echo $tableau_ameriquesud[$a][1];
            echo '" id="menu_photo"></a>';
            $b++;
          }
          ?>
      </div>
      </section>
      <?php 
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajoutergalerie.php" method="post"><div id="gauche"><button id="ajoutergalerie" name="galerie" value="galerieameriquesud" onclick="this.form.submit();">Ajouter une photo</button></div></form>'; }}
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="supprimergalerie.php" method="post"><div id="droite"><button id="supprimergalerie" name="galerie" value="galerieameriquesud" onclick="this.form.submit();">Supprimer une photo</button></div></form>'; }}
      ?>
</div>
<div id="gauche">
      <label id="titre">Europe</label>
        <section id="slideshow_europe">
          <div class="container">
          <?php
          $c=20;
          for ($a = 0; $a<$nb_enregistrements_europe; $a++){
            echo '<div class="slider">';
            echo '<figure>';
            echo '<ul id="liste_photo">';
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_europe[$a][1];
            echo '" alt="';
            echo $c;
            echo '" id="';
            echo $c;
            echo '">';
            echo '</ul>';
            echo '</figure>';
            echo '</div>';
            $c++;
          }
          ?>
          </div>
            <div id="mini_photo">
          <?php
          $c = 20;
          for ($a = 0; $a<$nb_enregistrements_europe; $a++){
            echo '<a href="#';
            echo $c;
            echo '" id="menu_photo"><img src="img/galerie/';
            echo $tableau_europe[$a][1];
            echo '" id="menu_photo"></a>';
            $c++;
          }
          ?>
            </div>
        </section>
      <?php 
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajoutergalerie.php" method="post"><div id="gauche"><button id="ajoutergalerie" name="galerie" value="galerieeurope" onclick="this.form.submit();">Ajouter une photo</button></div></form>'; }}
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="supprimergalerie.php" method="post"><div id="droite"><button id="supprimergalerie" name="galerie" value="galerieeurope" onclick="this.form.submit();">Supprimer une photo</button></div></form>'; }}
      ?>
</div>
<div id="droite">
  <label id="titre">Asie</label>
    <section id="slideshow_asie">
      <div class="container">
          <?php
          $d=30;
          for ($a = 0; $a<$nb_enregistrements_asie; $a++){
            echo '<div class="slider">';
            echo '<figure>';
            echo '<ul id="liste_photo">';
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_asie[$a][1];
            echo '" alt="';
            echo $d;
            echo '" id="';
            echo $d;
            echo '">';
            echo '</ul>';
            echo '</figure>';
            echo '</div>';
            $d++;
          }
          ?>
          </div>
          <div id="mini_photo">
          <?php
          $d = 30;
          for ($a = 0; $a<$nb_enregistrements_asie; $a++){
            echo '<a href="#';
            echo $d;
            echo '" id="menu_photo"><img src="img/galerie/';
            echo $tableau_asie[$a][1];
            echo '" id="menu_photo"></a>';
            $d++;
          }
          ?>
      </div>
      </section>
      <?php 
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajoutergalerie.php" method="post"><div id="gauche"><button id="ajoutergalerie" name="galerie" value="galerieasie" onclick="this.form.submit();">Ajouter une photo</button></div></form>'; }}
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="supprimergalerie.php" method="post"><div id="droite"><button id="supprimergalerie" name="galerie" value="galerieasie" onclick="this.form.submit();">Supprimer une photo</button></div></form>'; }}
      ?>
</div>
<div id="gauche">
      <label id="titre">Afrique</label>
        <section id="slideshow_afrique">
          <div class="container">
          <?php
          $e=40;
          for ($a = 0; $a<$nb_enregistrements_afrique; $a++){
            echo '<div class="slider">';
            echo '<figure>';
            echo '<ul id="liste_photo">';
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_afrique[$a][1];
            echo '" alt="';
            echo $e;
            echo '" id="';
            echo $e;
            echo '">';
            echo '</ul>';
            echo '</figure>';
            echo '</div>';
            $e++;
          }
          ?>
          </div>
          <div id="mini_photo">
          <?php
          $e = 40;
          for ($a = 0; $a<$nb_enregistrements_afrique; $a++){
            echo '<a href="#';
            echo $e;
            echo '" id="menu_photo"><img src="img/galerie/';
            echo $tableau_afrique[$a][1];
            echo '" id="menu_photo"></a>';
            $e++;
          }
          ?>
          </div>
  </section>
      <?php 
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajoutergalerie.php" method="post"><div id="gauche"><button id="ajoutergalerie" name="galerie" value="galerieafrique" onclick="this.form.submit();">Ajouter une photo</button></div></form>'; }}
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="supprimergalerie.php" method="post"><div id="droite"><button id="supprimergalerie" name="galerie" value="galeriafrique" onclick="this.form.submit();">Supprimer une photo</button></div></form>'; }}
      ?>
</div>
<div id="droite">
  <label id="titre">Océanie</label>
    <section id="slideshow_oceanie">
      <div class="container">
          <?php
          $f=50;
          for ($a = 0; $a<$nb_enregistrements_oceanie; $a++){
            echo '<div class="slider">';
            echo '<figure>';
            echo '<ul id="liste_photo">';
            echo '<img class="pics" src="img/galerie/';
            echo $tableau_oceanie[$a][1];
            echo '" alt="';
            echo $f;
            echo '" id="';
            echo $f;
            echo '">';
            echo '</ul>';
            echo '</figure>';
            echo '</div>';
            $f++;
          }
          ?>
          </div>
          <div id="mini_photo">
          <?php
          $f = 50;
          for ($a = 0; $a<$nb_enregistrements_oceanie; $a++){
            echo '<a href="#';
            echo $f;
            echo '" id="menu_photo"><img src="img/galerie/';
            echo $tableau_oceanie[$a][1];
            echo '" id="menu_photo"></a>';
            $f++;
          }
          ?>
      </div>
      </section>
      <?php 
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="ajoutergalerie.php" method="post"><div id="gauche"><button id="ajoutergalerie" name="galerie" value="galerieoceanie" onclick="this.form.submit();">Ajouter une photo</button></div></form>'; }}
      if(isset($_SESSION['login']) AND isset($_SESSION['mdp'])){ if ($_SESSION['login'] == 'client' AND $_SESSION['mdp'] == 'Toto123') { echo '<form action="supprimergalerie.php" method="post"><div id="droite"><button id="supprimergalerie" name="galerie" value="galerieoceanie" onclick="this.form.submit();">Supprimer une photo</button></div></form>'; }}
      ?>
</div>
<div>
      <label id="titre">Antarctique</label> <!-- Sans cette ligne la div contact ne se termine pas au bon endroit (il faut quelque chose qui occupe 100 de la div en largeur) -->
      <img  src="img/antarctique.jpg" title="Chèvres d'Antarctique" id="pics2">
      <br />

</section>
<?php
include('footer.php');
?>
</body>