<?php
    require File::build_path(array('controller','ControllerPanier.php'));
    require File::build_path(array('controller','ControllerProduit.php'));
    require File::build_path(array('controller','ControllerUtilisateur.php'));
    require File::build_path(array('controller','ControllerAccueil.php'));
    require File::build_path(array('controller','ControllerAdminUser.php'));
    require File::build_path(array('controller','ControllerAdminProd.php'));
    require File::build_path(array('controller','ControllerAdminMail.php'));
    //require File::build_path(array('controller','ControllerCommande.php'));

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
    }
    else { // erreur sinon
        ControllerAccueil::readAll();
    }

?>
