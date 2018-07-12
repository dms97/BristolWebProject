<?php

require_once File::build_path(array('model','ModelMessage.php'));
require_once File::build_path(array('lib','Mail.php'));

class ControllerAccueil {
	
	protected static $object = 'accueil';
	
	public static function readAll() { // affiche page d'accueil
            $controller='accueil';
			if (isset($_SESSION['hello'])) {
				$view = $_SESSION['hello'];
				$view2='readAll';
				unset($_SESSION['hello']);
			}
			else {
				$view='readAll';
			}
            $pagetitle='HomePage - WevDev';
            $barre = Session::retourButton();
            require File::build_path(array('view','view.php'));
	}
	
	public static function error() { // redirige vers une page d'erreur
            $controller='accueil';
            $view='error';
            $pagetitle='Maintenance Error';
            $barre = Session::retourButton();
            require File::build_path(array('view','view.php'));
	}
	
}

?>