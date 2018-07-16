<?php
session_name('Bristol'); // Permet de donner un nom à la session

session_start();
//$_SESSION["connected"]=true;


require_once __DIR__ . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'File.php';
if (isset($_GET['controller'])) {
    require_once File::build_path(array('controller', 'routeur.php'));
} else {
    $pagetitle = "Accueil";
    require_once File::build_path(array('view', 'view.php'));
}

?>