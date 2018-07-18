<?php

require_once File::build_path(array('lib', 'Mail.php'));

class ControllerAccueil
{

    protected static $object = 'accueil';

    public static function readAll()
    { // affiche page d'accueil
        $controller = 'accueil';
        $view = 'home';
        $pagetitle = 'Home Page';
        $stylesheet = 'css/home.css';
        require File::build_path(array('view', 'view.php'));
    }

    public static function survey()
    { // affiche page sondage
        // ajouter que si STUDENT
        $controller = 'contact';
        $view = 'send';
        $pagetitle = 'Contact';
        $barre = Session::retourButton();
        $stylesheet = File::build_path(array('css', 'home.css'));
        require File::build_path(array('view', 'view.php'));
    }

    public static function sended()
    { //affiche message "envoyé"
        $barre = Session::retourButton();
        $data = array(
            'nomUtilisateur' => $_POST['Nom'],
            'mail' => $_POST['Mail'],
            'objet' => $_POST['Sujet'],
            'message' => $_POST['Message'],
        );
        $objet = new ModelMessage($data);
        try {
            $objet->save();
            $controller = 'contact';
            $view = 'sended';
            $pagetitle = 'Message Envoyé';

            Mail::envoiMail($_POST['Mail'], "Vous nous avez contacté", "Nous avons bien reçu votre mail, nous répondrons à celui-ci le plus rapidement possible \n");
            Mail::envoiMail('laurent.garcia@etu.umontpellier.fr', $_POST['Sujet'], $_POST['Message'] . "<br> Envoyé par " . $_POST['Mail']);
            $stylesheet = File::build_path(array('css', 'home.css'));
            require File::build_path(array('view', 'view.php'));

        } catch (Exception $ex) {
            ControllerContact::error();
        }
    }

    public static function error()
    { // redirige vers une page d'erreur
        $controller = 'accueil';
        $view = 'error';
        $pagetitle = 'Maintenance Error';
        $barre = Session::retourButton();
        $stylesheet = File::build_path(array('css', 'home.css'));
        require File::build_path(array('view', 'view.php'));
    }
}
?>