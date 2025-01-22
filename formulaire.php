<?php
require_once "traitement/Bdd.php";
require_once "traitement/GestionUtilisateur.php";
?>
<h2>Inscription</h2>
<form method="post">
    <label>Nom
        <input type="text" name="nom"></label>
    <label>Email
        <input type="text" name="email"></label>
    <label>Mdp
        <input type="password" name="mdp"></label>
    <input type="submit" name="ajoutUser">
</form>
<?php
if(isset($_POST['ajoutUser'])){
    $user = new GestionUtilisateur($_POST);
    $user->inscription();
}
if (isset($_GET['succes'])){
    echo $_GET['succes'];
}
if (isset($_GET['erreur'])){
    echo $_GET['erreur'];
}
?>
<br>
<h2>Connexion</h2>
<form method="post">
    <label>Email
        <input type="text" name="email"></label>
    <label>mdp
        <input type="password" name="mdp"></label>
    <input type="submit" name="connexion">
</form>
<br>
<?php
if(isset($_POST['connexion'])){
    $user = new GestionUtilisateur($_POST);
    $user->connexion();
    session_start();
    $_SESSION['email'] = $_POST['email'];
}
if (isset($_GET['succesConnexion'])){
    echo $_GET['succesConnexion'];
    session_start();
    var_dump($_SESSION);
}
if (isset($_GET['erreurConnexion'])){
    echo $_GET['erreurConnexion'];
    session_start();
    session_destroy();
}
?>
