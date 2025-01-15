<h2>Inscription</h2>
<form method="post" action="exC.php">
    <label>Nom
        <input type="text" name="nom"></label>
    <label>Prenom
        <input type="text" name="prenom"></label>
    <label>tel
        <input type="text" name="tel"></label>
    <input type="submit" name="envoyer">
</form>
<br>
<h2>Connexion</h2>
<br>
<h2>Modifier</h2>
<br>
<?php
include "Bdd.php";
$bdd = new Bdd();
$req = $bdd->getBdd()->prepare('SELECT * FROM stagiaire WHERE id_stagiaire = 53');
$req->execute();
$liste = $req->fetchAll();
?>
<form method="post" action="exC.php">
    <label>Nom
        <input type="text" name="nom" value="<?= $liste[0]['nom'] ?>"></label>
    <label>Prenom
        <input type="text" name="prenom" value="<?= $liste[0]['prenom'] ?>"></label>
    <label>tel
        <input type="text" name="tel" value="<?= $liste[0]['tel'] ?>"></label>
    <input type="submit" name="envoyer">
</form>
<h2>Supprimer</h2>
