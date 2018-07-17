<?php
//Passage par la BD
require_once File::build_path(array('lib', 'Security.php'));

// on teste si nos variables sont définies
if (!empty($exist)) {

    // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    // dans ce cas, tout est ok, on peut démarrer notre session
    // on la démarre :)
    // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas$ pour enregistrer ces variables)
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['password'] = Security::chiffrer($_POST['password']);
    $_SESSION['Role'] = $admin;
    echo '<body onLoad="alert(\'You are sign in\')">';
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    exit;
}
else {
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Unknown Member\')">';
    // puis on le redirige vers la page d'accueil
    echo '<meta http-equiv="refresh" content="0;URL=index.php?controller=user&action=login">';
}
?>