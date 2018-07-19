<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelComponents extends Model
{

    protected static $object = 'components';
    protected static $primary = 'id';

    private $id;
    private $moduleId;
    private $examDate;
    private $examType;
    private $Ratio;

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut)) {
            return $this->nom_attribut;
        } else {
            return false;
        }
    }

    public function set($nom_attribut)
    {
        if (property_exists($this, $nom_attribut)) {
            return $this->nom_attribut;
        } else {
            return false;
        }
    }

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->id = $data['id'];
            $this->moduleId = $data['moduleId'];
            $this->examDate = $data['examDate'];
            $this->examType = $data['examType'];
            $this->Ratio = $data['Ratio'];
        }
    }

    public static function addComponents($modId,$examD,$examT,$rat){
        $sql = "INSERT INTO examcomponents (ModuleId,ExamDate,ExamType,Ratio) VALUES (:modId,:examD,:examT,:rat)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "modId" => $modId,
            "examD" => $examD,
            "examT" => $examT,
            "rat" => $rat
        );
        $req_prep->execute($values);
        return true;
    }


}

?>