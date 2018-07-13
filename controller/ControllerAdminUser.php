<?php

require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('model','ModelUtilisateur.php'));

class ControllerAdminUser {
    
    protected static $object = 'adminUser';
    
    public static function readAll() {
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='listUtilisateurs';
            $pagetitle='Liste Utilisateurs- OmniBag';
            $objet = ModelUtilisateur::selectAll();
            require File::build_path(array('view','view.php'));
        }
        else {
            ControllerAdminUser::error();
        }
    }

    public static function read(){
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='readUtilisateur';
            $pagetitle='Détail Utilisateurs- OmniBag';
            $objet = ModelUtilisateur::select($_GET['login']);
            require File::build_path(array('view','view.php'));
        }
        else {
            ControllerAdminUser::error();
        }
    }
    
    public static function delete(){
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='delete';
            $view2='listUtilisateurs';
            $pagetitle='Liste utilisateurs - OmniBag';
            try {
                ModelUtilisateur::delete($_GET['login']);
                $objet = ModelUtilisateur::selectAll();
                require File::build_path(array('view','view.php'));
            } catch (Exception $ex) {
                ControllerAdminUser::error2();
            }
        }
        else {
            ControllerAdminUser::error();
        }
    }
    
    public static function update(){
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='update';
            $pagetitle='Modifier utilisateur - OmniBag';
            $objet = ModelUtilisateur::select($_GET['login']);
            if (ModelUtilisateur::estadmin($_GET['login']) == 0) {
                $chk1="";
                $chk2="checked";
            }
            else {
                $chk1="checked";
                $chk2="";
            }
            require File::build_path(array('view','view.php'));
        }
        else {
            ControllerAdminUser::error();
        }
    }
    
    public static function updated(){
        $barre=Session::retourButton();
        if ($_POST['mot_de_passe'] != $_POST['conf_mdp']) { // si mdp pas ok
            $controller='utilisateur';
            $view='error_mdp';
            //$view2='read';
            $pagetitle='Erreur Modification - OmniBag';
            $objet = ModelUtilisateur::select($_SESSION['login']);
            require File::build_path(array('view','view.php'));
        }
        else {
            $data = array(
                'login' => $_POST['login'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'date_naissance' => $_POST['date_naissance'],
                'mail' => $_POST['mail'],
                'adresse' => $_POST['adresse'],
                'num_tel' => $_POST['num_tel'],
                'type' => $_POST['type'],
                'mot_de_passe' => Security::chiffrer($_POST['mot_de_passe'])
            );
            try {
                ModelUtilisateur::update($data);
                $controller='utilisateur';
                $view='updated';
                $view2='readUtilisateur';
                $pagetitle='Modificer compte - OmniBag';
                $objet = ModelUtilisateur::select($_POST['login']);
                require File::build_path(array('view','view.php'));
            } catch (Exception $ex) {
                ControllerAdminUser::error2();
            }
        }
    } 
        
    public static function error() {
        $barre=Session::retourButton();
        $controller='admin';
        $view='error';
        $pagetitle='Error - OmniBag';
        require File::build_path(array('view','view.php'));
    }
        
    public static function error2() {
        $barre=Session::retourButton();
        $controller='utilisateur';
        $view='error';
        $pagetitle='Error - OmniBag';
        require File::build_path(array('view','view.php'));
    }
}

?>