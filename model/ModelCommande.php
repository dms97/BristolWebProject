<?php
/*require_once File::build_path(array('model','Model.php'));

class ModelCommande extends Model{
    
    private $idCommande;
    private $idUtilisateur;
    private $prixCommande;
    private $etat; //0 si envoyée, 1 si reçue
    
    public function get($nom_attribut){
        if (property_exists($this,$nom_attribut)){
            return $this->nom_attribut;
        }
        else {
            return false;
        }
    }
    
    public function set($nom_attribut){
        if (property_exists($this,$nom_attribut)){
            return $this->nom_attribut;
        }
        else {
            return false;
        }
    }
    
     public function __construct($data = array()) {
        if (!empty($data)) {
            $this->idCommande = $data['idCommande'];
            $this->idUtilisateur = $data['login utilisateur'];
            $this->prixCommande = $data['prix commande'];
            $this->etat = $data['etat commande'];
        }
     }
     
     public function readAll($login){
        try{             
            $bdd = new Model();
            $sql = "SELECT idCommande, prixCommande FROM commandes WHERE idUtilisateur=:tag_login GROUP BY idCommande, prixCommande;";
            echo $sql;
            $req_prep = $bdd::$pdo->prepare($sql);
            $values = array(
                'tag_login' => $login
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
            return $oobjet = $req_prep->fetchAll();
        }
        catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } 
            else {
                echo 'Une erreur est survenue, veuillez nous en excuser.';
            }
            die();
        }  
    }
    
} */
?>