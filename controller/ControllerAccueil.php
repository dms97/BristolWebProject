<?php

require_once File::build_path(array('model','ModelMessage.php'));
require_once File::build_path(array('lib','Mail.php'));

class ControllerAccueil {
	
	protected static $object = 'home';
	
	public static function readAll() { // affiche page d'accueil
            $controller='home';
			if (isset($_SESSION['hello'])) {
				$view = $_SESSION['hello'];
				$view2='readAll';
				unset($_SESSION['hello']);
			}
			else {
				$view='readAll';
			}
            $pagetitle='HomePage - WevDev';
            require File::build_path(array('view','view.php'));
	}
	
	public static function error() { // redirige vers une page d'erreur
            $controller='home';
            $view='error';
            $pagetitle='Maintenance Error';
            require File::build_path(array('view','view.php'));
	}
	
}

?>