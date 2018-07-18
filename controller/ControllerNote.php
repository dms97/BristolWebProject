<?php

require_once File::build_path(array('model','ModelNote.php'));

class ControllerNote {
	
	protected static $object = 'note';

        public static function readAll()
        {
            if (isset($_SESSION['login'])) {
                $objet = ModelNote::getRange($_SESSION['login']);
                $objet2 = ModelNote::Mean($objet);
                $controller = "note";
                $stylesheet = "css/module.css";
                $view = "readAll";
                $pagetitle = "Notes par module";
                require File::build_path(array('view', 'view.php'));
            } else {
                ControllerUser::error();
            }
        }
}

?>