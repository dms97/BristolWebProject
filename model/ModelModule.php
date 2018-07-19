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
	
	static function addModuleBDD($id, $title) {
		try {
			$sql = 'INSERT INTO bristol.modules VALUES (:id, :title)';
			$verif = Model::$pdo->prepare($sql);
			$values = array(
							'id' => strip_tags($id),
							'title' => strip_tags($title)
						);

			$verif->execute($values);
			echo 'Module ' . $id . ' added.';
		} catch (PDOException $e) {
			echo 'An error has occurred :/';
			die();
		}
	}
	
	static function addEnrolledBDD($moduleId, $studentId) {
		try {
			$sql = 'INSERT INTO bristol.enrolled VALUES (:moduleId, :studentId)';
			$verif = Model::$pdo->prepare($sql);
			$values = array(
							'moduleId' => strip_tags($moduleId),
							'studentId' => strip_tags($studentId)
						);

			$verif->execute($values);
			echo 'Student ' . $studentId . ' added to Module ' . $moduleId . ".";
		} catch (PDOException $e) {
			echo 'An error has occurred :/';
			die();
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