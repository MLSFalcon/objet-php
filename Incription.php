<?php
include "Bdd.php";
class Incription
{
private $nom;
private $prenom;
private $tel;
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
    $req = $bdd->getBdd()->prepare('INSERT INTO stagiaire(nom,prenom,tel) VALUES (:nom,:prenom,:tel)');
    $req->execute(array(
        'nom' => $this->nom,
        'prenom' => $this->prenom,
        'tel' => $this->tel
    ));
}
public function connexion(){

}
    public function update(){

    }
    public function delete(){

    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

}