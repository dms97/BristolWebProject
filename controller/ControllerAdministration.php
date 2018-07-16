<?php
require_once File::build_path(array('model','ModelAdminisitration.php'));
class ControllerAdministration {
   
        protected static $object = 'administration';
        static $adresse = 'infolimon.iutmontp.univ-montp2.fr/~lanal/'; // localhost/prog_web/
        static $tp = 'eCommerce';
    
        public static function create() { //affiche formulaire de creation de compte
            $controller='utilisateur';
            $view='create';
            $pagetitle='Creating an account';
            $barre = Session::retourButton();
            require File::build_path(array('view','view.php'));
        }
        
        public static function created() { //affiche message de confirmation de creation de compte
            $barre = Session::retourButton();
            if ($_POST['mot_de_passe'] != $_POST['conf_mdp']) { // si mdp pas ok
                $controller='utilisateur';
                $view='error_mdp';
                $view2='create';
                $pagetitle='Creating an account';
                require File::build_path(array('view','view.php'));
            }
            else if (ModelUtilisateur::select($_POST['login']) != false) { // si login déjà pris
                $controller='utilisateur';
                $view='error_login';
                $view2='create';
                $pagetitle='Creating an account';
                require File::build_path(array('view','view.php'));
            }
            else if (filter_var($_POST['mot_de_passe'], FILTER_VALIDATE_EMAIL)){ // si mail invalide
                    $controller='utilisateur';
                    $view='error_mail';
                    $view2='create';
                    $pagetitle='Creating an account';
                    require File::build_path(array('view','view.php'));
                }
                else { // si tout ok
                    $nonce = Security::generateRandomHex();
                    $data = array(
                        'login' => $_POST['login'],
                        'nom' => $_POST['nom'],
                        'prenom' => $_POST['prenom'],
                        'date_naissance' => $_POST['date_naissance'],
                        'mail' => $_POST['mail'],
                        'adresse' => $_POST['adresse'],
                        'num_tel' => $_POST['num_tel'],
                        'type' => 0,
                        'mot_de_passe' => Security::chiffrer($_POST['mot_de_passe']),
                        'nonce' => $nonce
                    );
                    $objet = new ModelUtilisateur ($data); 
                    try {
                        $objet->save();
                        $texte = "<div><p>Merci de vous être inscrit sur OmniBag.</p>"
                                        . "<p>Pour finaliser votre inscription, veuillez cliquer sur le lien suivant</p>"
                                        . '<p><a href="http://infolimon.iutmontp.univ-montp2.fr/~lanal/eCommerce/index.php?controller=utilisateur&action=validate&login=' . $_POST['login'] . '&nonce=' . $nonce . '">Vas-y, clique !</a></p></div>';
                        Mail::envoiMail($_POST['mail'],"Confirmation de votre compte OmniBag", $texte);
                        $controller='utilisateur';
                        $view='created';
                        $pagetitle='Creating an account';
                        require File::build_path(array('view','view.php'));
                    } catch (Exception $ex) {
                        ControllerUtilisateur::error2();
                    }
            }
        }
		
        public static function validate() {
            $login = $_GET['login'];
            $nonce = $_GET['nonce'];
            if (ModelUtilisateur::checkNonce($login) == $nonce) {
                try {
                    ModelUtilisateur::majNonce($login);
                    ControllerUtilisateur::connect();
                } catch (Exception $ex) {
                    ControllerUtilisateur::error2();
                }
            }
        }
        
        public static function connect() {
            $controller='utilisateur';
            $view='connect';
            $pagetitle='Connection';
            $barre = Session::retourButton();
            require File::build_path(array('view','view.php')); 
        }
        
        public static function connected() {
            $test = ModelUtilisateur::checkPassword($_POST['login'],Security::chiffrer($_POST['mot_de_passe']));
            if ($test == true & ModelUtilisateur::checkNonce($_POST['login']) == NULL) {
                $_SESSION['login'] = $_POST['login'];
                if (ModelUtilisateur::estAdmin($_POST['login']) ==  1) {
                    $_SESSION['admin'] = true;
                }
		$_SESSION['hello'] = "hello";
                ControllerAccueil::readAll();
            }
            else {
                $controller='utilisateur';
                $view='error_mdp';
                $view2='connect';
                $pagetitle='Connection';
                $barre = Session::retourButton();
                require File::build_path(array('view','view.php'));
            }
        }
        
        public static function disconnect() {
            $tmp = ModelPanier::exportPanier();
            session_unset();
            session_destroy();
            setcookie(session_name(),'',time()-1);
            session_start();
            ModelPanier::creationPanier();
            $_SESSION['panierOB'] = $tmp; //On remplace le panierOB en session par notre panierOB temporaire à jour
            unset($tmp); //On efface notre panierOB temporaire
            $_SESSION['site']='Omnibag';
            $controller='utilisateur';
            $view='disconnected';
            $pagetitle='Deconnexion - OmniBag';
            $barre = Session::retourButton();
            require File::build_path(array('view','view.php'));
        }
        
        public static function read() {
            $barre = Session::retourButton();
            if (isset($_SESSION['login'])) {
                $controller='utilisateur';
                $view='read';
                $pagetitle='Mon compte - OmniBag';
                $admin='';
                if (!empty($_SESSION['login'])) {
                    if(Session::is_admin()) {
                        $admin = '<div>'
                                . '<p>Outils d\'administration du site :</p>'
                                . '</div>'
                                . '<div>'
                                . '<div><a href="' . '/~lanal/eCommerce/index.php?controller=adminUser&action=readAll">Gestion des utilisateurs</a></div>'
                                . '<div><a href="' . '/~lanal/eCommerce/index.php?controller=adminProd&action=readAll">Gestion des produits</a></div>'
                                . '<div><a href="' . '/~lanal/eCommerce/index.php?controller=adminMail&action=readAll">Gestion des messages</a></div>'
                                . '</div>';
                    }
                }
                $objet = ModelUtilisateur::select($_SESSION['login']);
                require File::build_path(array('view','view.php'));
            }
            else {
                ControllerUtilisateur::error();
            }
        }
        
        public static function update() { //modifs en cours
            $barre = Session::retourButton();
            if ($_POST['mot_de_passe'] != $_POST['conf_mdp']) { // si mdp pas ok
                $controller='utilisateur';
                $view='error_mdp';
                $view2='read';
                $pagetitle='Mon compte - OmniBag';
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
                    'type' => 0,
                    'mot_de_passe' => Security::chiffrer($_POST['mot_de_passe'])
                );
                try {
                    ModelUtilisateur::update($data);
                    $controller='utilisateur';
                    $view='updated';
                    $view2='read';
                    $pagetitle='Mon compte - OmniBag';
                    $objet = ModelUtilisateur::select($_SESSION['login']);
                    require File::build_path(array('view','view.php'));
                } catch (Exception $ex) {
                    ControllerUtilisateur::error2();
                }
            }
        }
        
        public static function readAll() {
            ControllerUtilisateur::read();
        }
        
        public static function error() { // si erreur non connecté
            $barre = Session::retourButton();
            $controller='utilisateur';
            $view='error_connect';
            $pagetitle='Error - OmniBag';
            require File::build_path(array('view','view.php'));
        }
        
        public static function error2() { // si erreur de BD
            $barre = Session::retourButton();
            $controller='utilisateur';
            $view='error';
            $pagetitle='Error - OmniBag';
            require File::build_path(array('view','view.php'));
        }
    
}

?>