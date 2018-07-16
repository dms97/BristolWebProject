<?php

require_once File::build_path(array('model', 'ModelExam.php'));
require_once File::build_path(array('controller', 'ControllerAdministration.php'));

class ControllerExam
{

    protected static $object = 'exam';

    /*
     * Read one of the exam with all its information: list of students, marks, etc.
     */
    public static function read()
    {
        if (ModelExam::select($_GET['id']) != NULL) {
            $objet = ModelExam::select($_GET['id']);
            $controller = "exam";
            $view = "read";
            $pagetitle = $objet['titleExam'];
            require File::build_path(array('view', 'view.php'));
        } else {
            ControllerUser::error();
        }
    }

    /*
     * Read all the exams in a table.
     */
    public static function readAll()
    {
        $controller = "exam";
        $view = "readAllProd";
        $pagetitle = "Exams";
        $objet = ModelExam::selectAll();
        require File::build_path(array('view', 'view.php'));
    }

    /*
     * Show an error.
     */
    public static function error()
    {
        $controller = "administration";
        $view = "error";
        $pagetitle = "Error";
        require File::build_path(array('view', 'view.php'));
    }
}

?>
