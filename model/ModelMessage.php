<?php
require_once File::build_path(array('model','Model.php'));

class ModelMessage extends Model{
    
    protected static $object = 'messages';
    protected static $primary = 'idMessage';
    
    private $idMessage;
    private $nomUtilisateur;
    private $mail;
    private $objet;
    private $message;
    
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
            $this->idMessage = NULL;
            $this->nomUtilisateur = $data['nomUtilisateur'];
            $this->mail =$data ['mail'];
            $this->objet = $data ['objet'];
            $this->message = $data['message'];
        }
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