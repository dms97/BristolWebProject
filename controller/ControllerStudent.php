<?php

require_once File::build_path(array('controller', 'ControllerAdministration.php'));

class ControllerStudent
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
        $objet = ModelUser::selectStudents();
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
