<?php

require_once File::build_path(array('model', 'Model.php'));

class ModelExam extends Model{
    
    protected static $object = 'examcomponents';
    protected static $primary = 'id';

    private $id;
    private $moduleId;
    private $examDate;
    private $examType; // exam title
    private $ratio;

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
            $this->ratio = $data['ratio'];
        }
    }

    public function afficher()
    {
        echo "Exam n° " . $this->id . ", model : " . $this->moduleId . ", exam date : " . $this->examDate . ", examType : " . $this->type . ", ratio :" . $this->ratio;
    }

    public function attributs()
    {
        $data = array();
        foreach ($this as $cle => $valeur) {
            $data[$cle] = $valeur;
        }
        return $data;
    }
	
	static function addExamBDD($id, $moduleId, $examDate, $examType, $ratio) {
		try {
			$sql = 'INSERT INTO bristol.examcomponents VALUES (:id, :moduleId, :examDate, :examType, :ratio)';
			$verif = Model::$pdo->prepare($sql);
			$values = array(
							'id' => strip_tags($id),
							'moduleId' => strip_tags($moduleId),
							'examDate' => strip_tags($examDate),
							'examType' => strip_tags($examType),
							'ratio' => strip_tags($ratio)
						);
			$verif->execute($values);
			echo 'Exam ' . $id . ' added.';
		} catch (PDOException $e) {
			echo 'An error has occurred :/';
			die();
		}
	}
	
	static function addMarkBDD($moduleId, $studentId, $mark, $examId, $resit) {
		try {
			$sql = 'INSERT INTO bristol.exammarks VALUES (:moduleId, :studentId, :mark, :examId, :resit)';
			$verif = Model::$pdo->prepare($sql);
			$values = array(
							'moduleId' => strip_tags($moduleId),
							'studentId' => strip_tags($studentId),
							'mark' => strip_tags($mark),
							'examId' => strip_tags($examId),
							'resit' => strip_tags($resit)
						);
			$verif->execute($values);
			echo 'Mark ' . $mark . ' added to student ' . $studentId . ' in module ' . $moduleId . '.';
		} catch (PDOException $e) {
			echo 'An error has occurred :/';
			die();
		}
	}

}

?>