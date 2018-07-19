<?php

require_once File::build_path(array('model','Model.php'));

class ModelNote extends Model
{

    protected static $object = 'exammarks';

    private $ModuleId;
	private $Title;
    private $Marks;
    private $ExamType;
	private $Ratio;

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
            return $this->nom_attribut;
        } else {
            return false;
        }
    }

    public function __construct($ModuleId = NULL, $Title = NULL, $Marks = NULL, $ExamType = NULL, $Ratio = NULL)
    {
        if (!is_null($ModuleId) && !is_null($Title) && !is_null($Marks) && !is_null($ExamType) && !is_null($Ratio)) {
            $this->ModuleId = $ModuleId;
			$this->Title = $Title;
            $this->Marks = $Marks;
            $this->ExamType = $ExamType;
            $this->Ratio = $Ratio;
        }
    }

    static public function getAllMarks()
    {
        $sql = "SELECT * from exammarks";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelNote');
        $tab_p = $req_prep->FetchAll();

        return $tab_p;
    }

    static public function getRange($StudentID)
    {
        $bdd = new Model();
        $sql = "SELECT E.ModuleId, M.Title, B.Marks, A.ExamType, A.Ratio FROM `enrolled` E
				INNER JOIN `users` U ON U.Id=E.StudentsID 
				INNER JOIN `modules` M ON M.Id=E.ModuleID 
				INNER JOIN `examcomponents` A ON A.ModuleId=E.ModuleID 
				INNER JOIN `exammarks` B ON B.ModuleID=E.ModuleID AND B.StudentsID=E.StudentsID and B.ExamComponentsID=A.Id 
				WHERE U.id='$StudentID'";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelNote');
        $result = $req_prep->fetchAll();
		return $result;
    }

    public  static function addMark($moduleID,$StudentID,$mark,$ExamCompoId,$Resit){
        $bdd = new Model();
        $sql = "INSERT INTO `exammarks` (`ModuleID`, `StudentsID`, `Marks`, `ExamComponentsID`, `Resit`) VALUES (\''$moduleID'\', \''$StudentID'\', \''$mark'\', \''$ExamCompoId'\', \''$Resit'\')";
    }

    public static function Mean($objet){
        $tmp="";
        $tmp2 =0;
        $mean = array();
        $i =0;
        $cpt=0;
        
        foreach ($objet as $t) {
            if ($tmp != $t->get("Title") && $cpt != 0) {
                $mean[$i]['id'] = $tmp;
                $mean[$i]['mean'] = $tmp2/100;
                $mean[$i]['grade'] = ModelNote::Lettre($tmp2/100);
                $i = $i +1; 
                $tmp = $t->get("Title");
                $tmp2 = $t->get("Marks") * $t->get("Ratio");
                
            }
            else{
			$tmp2 = $tmp2 + ($t->get("Marks") * $t->get("Ratio"));
			$tmp = $t->get("Title");
            $cpt = $cpt +1;
            }
        }
        $mean[$i]['id'] = $tmp;
        $mean[$i]['mean'] = $tmp2/100;
        $mean[$i]['grade'] = ModelNote::Lettre($tmp2/100);
        return $mean;
    }


    public static function Lettre($Range) {
        if ($Range < 40 ) {
            return "F";
        }
        elseif ($Range >= 40 && $Range < 50)
        {
            return "D";
        }
        elseif ($Range >= 50 && $Range < 60)
        {
            return "C";
        }
        elseif ($Range >= 60 && $Range < 70)
        {
            return "B";
        }
        elseif ($Range >= 70 && $Range < 80)
        {
            return "A";
        }
        elseif ($Range >= 80 && $Range < 90)
        {
            return "A+";
        }
        elseif ($Range >= 90)   {
            return "A++";
        }
    }

}   
?>