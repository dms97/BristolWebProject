<?php

require_once File::build_path(array('model', 'ModelModule.php'));
//require_once File::build_path(array('controller', 'ControllerAdministration.php'));

class ControllerModule
{

    protected static $object = 'module';

    /*
     * Read one of the module with all its information: list of students, exams, etc.
     */
    public static function read()
    {
        if (ModelModule::select($_GET['id']) != NULL) {
            $objet = ModelModule::select($_GET['id']);
            $controller = "module";
            $view = "read";
            $pagetitle = $objet['titleModule'];
            $stylesheet = 'css/module.css';
            require File::build_path(array('view', 'view.php'));
        } else {
            ControllerUser::error();
        }
    }

    /*
     * Read all the modules in a table.
     */
    public static function readAll()
    {
        $controller = "module";
        $view = "readAll";
        $pagetitle = "Modules";
        $objet = ModelModule::getAll();
        $stylesheet = 'css/module.css';
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

    public static function addModule(){
        $controller = "module";
        $view = "addModule";
        $pagetitle="Add New Modules";
        $stylesheet = 'css/addModule.css';
        require File::build_path(array('view','view.php'));
    }
}

?>
