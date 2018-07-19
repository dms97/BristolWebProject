<?php

require_once File::build_path(array('model', 'ModelModule.php'));
require_once File::build_path(array('model', 'ModelComponents.php'));

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

    public static function createModule(){
        $nbComponents = $_POST['componentsNumber'];
        ModelModule::addModule($_POST['Title']);
        $modules=ModelModule::getModule($_POST['Title']);
        for($i = 0; $i < $nbComponents; $i++ ){
            ModelComponents::addComponents($modules[0][0],$_POST['examType'.$i],$_POST['examDate'.$i],$_POST['ratio'.$i]);
        }
        $controller="exam";
        $view="readAll";
        require File::build_path(array('view','view.php'));
    }
}

?>
