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
<section>
  <p id="p_contact">
    Le site a été entièrement développé par BORGAGNI Ludovic et MALET François, étudiant de 3iL.<br />
    Si vous avez besoin de reseignements, vous pouvez les contacter grâce au formulaire.<br />
  </p>
<form  name="contact" action="traitementcontact.php"  onsubmit="return ValidationEmail(document.contact.usermail)" method="post">
  <div id="contact">
    <div id="gauche">
      <label for="usernom" id="titre">Votre nom :</label> 
        <input type="text" name="usernom" placeholder="Exemple : Jean Dupont" required>
    </div>
    <div id="droite">
      <label for=usermail" id="titre">Votre adresse mail :</label> 
        <input type="text" name="usermail"  placeholder="Exemple : jean.dupont@mail.com" required>
    </div>
    <label for="messagemail" id="titre">Votre message :</label>
      <textarea rows="5" name="commentaire" required></textarea> 
    <input type="submit">
  </div>
</form>
</section>
<?php
include('footer.php');
?>
</body>
<script type="text/javascript">
function ValidationEmail(mail) {
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
if(mail.value.match(mailformat))
  {
  return true;
  }
else
  {
  alert("Adresse mail non valide !");
  return false;
  }
}
</script>