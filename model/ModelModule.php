<?php

require_once File::build_path(array('model','Model.php'));

class ModelModule extends Model{
    
    protected static $object = 'modules';
    protected static $primary = 'id';
    
    private $id;
    private $title;
    
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
            $this->id = $data['id'];
            $this->title = $data['title'];
        }
     }
     
     public function afficher(){
         echo "Module n° " . $this->id . ", Title : " . $this->title;
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