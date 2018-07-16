<?php

require_once File::build_path(array('model','Model.php'));

class ModelExam extends Model{
    
    protected static $object = 'examcomponents';
    protected static $primary = 'id';
    
    private $id;
	private $moduleId;
    private $examDate;
    private $examType; //0 si produit, 1 si extension
    private $ratio;
    
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
            $this->moduleId = $data['moduleId'];
            $this->examDate = $data['examDate'];
            $this->examType = $data['examType'];
            $this->ratio = $data['ratio'];
        }
     }
     
     public function afficher(){
         echo "Exam n° " . $this->id . ", model : " . $this->moduleId . ", exam date : " . $this->examDate . ", examType : " .  $this->type . ", ratio :" . $this->ratio;
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