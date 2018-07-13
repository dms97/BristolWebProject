<?php

require_once File::build_path(array('model','Model.php'));

class ModelExam extends Model{
    
    protected static $object = 'produits';
    protected static $primary = 'idProduit';
    
    private $idProduit;
    private $nomProduit;
    private $prixProduit;
    private $type; //0 si produit, 1 si extension
    private $descriptionProduit;
    
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
            $this->idProduit = $data['idProduit'];
            $this->nomProduit = $data['nomProduit'];
            $this->prixProduit = $data['prixProduit'];
            $this->type = $data['type'];
            $this->descriptionProduit = $data['descriptionProduit'];
        }
     }
     
     public function afficher(){
         echo "Produit numero " . $this->idProduit . ", nom : " . $this->nomProduit . " vendu " . $this->prixProduit."euros et c'est un " .  $this->type;
     }
     
     public function attributs() {
        $data = array();
        foreach ($this as $cle => $valeur) {
            $data[$cle] = $valeur;
        }
        return $data;
    }
    
}
?>