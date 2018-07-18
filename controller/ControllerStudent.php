<?php

require_once File::build_path(array('model', 'ModelUser.php'));

class ControllerStudent
{

    protected static $object = 'students';

    /*
     * Read all the exams in a table.
     */
    public static function readAll()
    {
        $controller = "student";
        $view = "readAll";
        $pagetitle = "Students";
		$stylesheet = "css/students.css";
        $objet = ModelUser::getAllStudents();
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
