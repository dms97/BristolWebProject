<?php

require_once File::build_path(array('model', 'ModelStudent.php'));
require_once File::build_path(array('controller', 'ControllerAdministration.php'));

class ControllerExam
{

    protected static $object = 'student';

    /*
     * Read all the exams in a table.
     */
    public static function readAll()
    {
        $controller = "student";
        $view = "readAll";
        $pagetitle = "Students";
        $objet = ModelUser::selectAll();
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
