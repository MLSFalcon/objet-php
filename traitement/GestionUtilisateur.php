<?php
require_once "../Include/Bdd.php";
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
            }else{
                echo $key." - err";
            }
        }
    }
    public function __construct(array $donnee)
    {
        $this->hydrate($donnee);
    }

public function inscription(){
    $bdd = new Bdd();
    $req = $bdd->getBdd()->prepare('INSERT INTO user(nom,email,mdp) VALUES (:nom,:email,:mdp)');
    $req->execute(array(
        'nom' => $this->nom,
        'email' => $this->email,
        'mdp' => $this->mdp
    ));
}
public function connexion(){

}
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setEmail($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setMdp($tel)
    {
        $this->tel = $tel;
    }

}