<?php
    require File::build_path(array('controller','module.ctrl.php'));

    $controller = "module";
    if (isset($_GET['controller'])) { // prend controller spécifié dans URL
        $controller = $_GET['controller'];
    }

    // $controller_class = "Controller" . ucfirst($controller); // old version
	$controller_class = $controller . ".ctrl";

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
    }
    else { // erreur sinon
        ControllerAccueil::readAll();
    }

?>
