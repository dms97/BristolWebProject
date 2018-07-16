<?php

require_once File::build_path(array('model','ModelModule.php'));
require_once File::build_path(array('controller','ControllerAdministration.php'));

class ControllerModule {
	
	protected static $object = 'module';
	
		/*
		 * Read one of the module with all its information: list of students, exams, etc.
		 */
        public static function read(){
            if (ModelModule::select($_GET['id']) != NULL) {
                $objet = ModelModule::select($_GET['id']);
                $controller = "module";
                $view = "read";
                $pagetitle = $objet['titleModule'];
                require File::build_path(array('view','view.php'));
            }
            else {
                ControllerAdministration::error();
            }
        }
        
		/*
		 * Read all the modules in a table.
		 */
        public static function readAll(){
            $controller = "module";
            $view="readAll";
            $pagetitle = "Modules";
            $barre=Session::retourButton();
            $objet = ModelModule::selectAll();
            require File::build_path(array('view','view.php'));
        }
        
		/*
		 * Show an error.
		 */
        public static function error() {
            $controller = "administration";
            $view = "error";
            $pagetitle = "Error";
            require File::build_path(array('view','view.php'));
        }
}

?>