<?php

require_once File::build_path(array('model','Model.php'));

class ModelNote extends Model{

    protected static $object = 'exammarks';
    
    private $ModuleID;
    private $StudentID;
    private $Marks;
    private $ExamComponentsID;
    private $Resit;

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

    public function __construct($ModuleID = NULL, $StudentID = NULL, $Marks = NULL, $ExamComponentsID = NULL, $Resit = NULL)
    {
        if (!is_null($id) && !is_null($password) && !is_null($firstName) && !is_null($lastName) && !is_null($email) && !is_null($role) && !is_null($phoneNumber) && !is_null($address)) {
            $this->ModuleID = $ModuleID;
            $this->StudentID = $StudentID;
            $this->Marks = $Marks;
            $this->ExamComponentsID = $ExamComponentsID;
            $this->Resit = $Resit;
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
    
    public function getRange($StudentID) {
        $bdd = new Model();
        $sql = "SELECT Title ,Marks,ExamType,Ratio FROM `enrolled` INNER JOIN `users` ON users.Id=enrolled.StudentsID INNER JOIN `modules` ON modules.Id=enrolled.ModuleID INNER JOIN `examcomponents` ON examcomponents.ModuleId=enrolled.ModuleID INNER JOIN `exammarks` ON exammarks.ModuleID=enrolled.ModuleID AND exammarks.StudentsID=enrolled.StudentsID and exammarks.ExamComponentsID=examcomponents.Id WHERE users.id='$StudentID'";
        $result = $bdd->query($sql);
        $notes=array();
        $i=0;
        if($result = mysqli_query($bdd, $sql)){
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    $notes[$i] = $row['Title'];
                    $notes[$i+1] = $row['Marks'];
                    $notes[$i+2] = $row['Ratio'];
                    $i = $i +3;
                }
                // Free result set
                mysqli_free_result($result);
            } else{
                echo "No records matching your query were found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($bdd);
        }
        return $notes;
    }

    public function addMark($moduleID,$StudentID,$mark,$ExamCompoId,$resit){
        $bdd = new Model();
        $sql = "INSERT INTO `exammarks` (`ModuleID`, `StudentsID`, `Marks`, `ExamComponentsID`, `Resit`) VALUES (\''$moduleID'\', \''$StudentID'\', \''$mark'\', \''$ExamCompoId'\', \''$resit'\')";
    }
    
?>