<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelModule extends Model
{

    protected static $object = 'modules';
    protected static $primary = 'id';

    private $id;
    private $title;

    public function get($nom_attribut)
    {
        if (property_exists($this, $nom_attribut)) {
            return $this->$nom_attribut;
        } else {
            return false;
        }
    }

    public function set($nom_attribut)
    {
        if (property_exists($this, $nom_attribut)) {
            return $this->$nom_attribut;
        } else {
            return false;
        }
    }

    public function __construct($data = array())
    {
        if (!empty($data)) {
            $this->id = $data['id'];
            $this->title = $data['title'];
        }
    }

    public function afficher()
    {
        echo "Module n° " . $this->id . ", Title : " . $this->title;
    }

    public function attributs()
    {
        $data = array();
        foreach ($this as $cle => $valeur) {
            $data[$cle] = $valeur;
        }
        return $data;
    }

    public static function getAll(){
        {
            $sql = "SELECT * from modules inner join enrolled on modules.id = enrolled.moduleID where enrolled.studentsID=:login";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "login" => $_SESSION['login'],
            );
            $req_prep->execute($values);
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModules');
            $tab_p = $req_prep->FetchAll();

            return $tab_p;
        }
    }

    public static function getAllProf(){
        $sql = "SELECT * from modules";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelModules');
        $tab_p = $req_prep->FetchAll();

        return $tab_p;
    }

    public static function addModule($title){
        $sql = "INSERT INTO modules(Title) VALUES (:title)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "title" => $title,
        );
        $req_prep->execute($values);
        return true;
    }

    public static function getModule($title){
        $sql = "SELECT * FROM modules where title=:title";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "title" => $title,
        );
        $req_prep->execute($values);
        $req_prep->setFetchMode(PDO::FETCH_CLASS,'ModelModules');
        $tab = $req_prep->FetchAll();

        return $tab;
    }



}

?>