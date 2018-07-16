<?php
require File::build_path(array('controller', 'ControllerAccueil.php'));
require File::build_path(array('controller', 'ControllerAdministration.php'));
require File::build_path(array('controller', 'ControllerExam.php'));
require File::build_path(array('controller', 'ControllerModule.php'));
require File::build_path(array('controller', 'ControllerStudent.php'));

$controller = "accueil";
if (isset($_GET['controller'])) { // prend controller spécifié dans URL
    $controller = $_GET['controller'];
}

$controller_class = "Controller" . ucfirst($controller);

$action = "readAll";
if (class_exists($controller_class)) { //vérifie si controller ok
    if (isset($_GET['action'])) { // prend action spécifié dans URL
        $class_methods = get_class_methods($controller_class);
        foreach ($class_methods as $c) {
            if ($_GET['action'] == $c) {
                $action = $_GET['action'];
            }
        }
    }
    $controller_class::$action();
} else { // erreur sinon
    ControllerAccueil::$action;
}

?>
