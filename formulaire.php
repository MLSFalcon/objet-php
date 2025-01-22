<?php
require_once "Include/Bdd.php";
require_once "traitement/GestionUtilisateur.php";
?>
<h2>Inscription</h2>
<form method="post">
    <label>Nom
        <input type="text" name="nom"></label>
    <label>Prenom
        <input type="text" name="email"></label>
    <label>tel
        <input type="text" name="mdp"></label>
    <input type="submit" name="ajoutUser">
</form>
<?php
if(isset($_POST['ajoutUser'])){
    $user = new GestionUtilisateur($_POST);
    $user->inscription();
}
?>
<br>
<h2>Connexion</h2>
<form method="post">
    <label>Nom
        <input type="text" name="email"></label>
    <label>Prenom
        <input type="text" name="mdp"></label>
    <input type="submit" name="connexion">
</form>
<br>
<?php
if(isset($_POST['connexion'])){
    $user = new GestionUtilisateur($_POST);
    $user->connexion();
}
?>
