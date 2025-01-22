<?php
require_once "Bdd.php";
class GestionUtilisateur
{
    private $nom;
    private $email;
    private $mdp;
    private function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

    public function inscription(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute(array(
            'email' => $this->email
        ));
        $liste = $req->fetchAll();
        if ($liste){
            header("location:register.php?erreur=Le compte existe déjà");
        } else {
            $mdpchiffre = password_hash($this->mdp, PASSWORD_DEFAULT);
            $req = $bdd->getBdd()->prepare('INSERT INTO user(nom,email,mdp) VALUES (:nom,:email,:mdp)');
            $req->execute(array(
                'nom' => $this->nom,
                'email' => $this->email,
                'mdp' => $mdpchiffre
            ));
            header("location: formulaire.php?succes=Le compte a bien été ajouté");
        }
    }
    public function connexion(){
        $bdd = new Bdd();
        $req = $bdd->getBdd()->prepare('SELECT * FROM user WHERE email = :email');
        $req->execute(array(
            'email' => $this->email,
        ));
        $liste = $req->fetch();

        if ($liste && password_verify($this->mdp, $liste['mdp'])){
            header("location: formulaire.php?succesConnexion=Connexion réussi");
        }else{
            header("location: formulaire.php?erreurConnexion=Le compte n'existe pas");
        }
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;
    }

}