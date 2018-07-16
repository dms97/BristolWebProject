<?php


require_once File::build_path(array('model', 'ModelUser.php'));
require_once File::build_path(array('lib', 'Security.php'));

class ControllerUser {

    public static function readAll() {
        Model::isConnected();
        Model::isAdmin();

        $tab_user = ModelUser::getAllUser();     //appel au modèle pour gerer la BD
        $view = "list";
        $controller = 'User';
        $pagetitle='Liste des utilisateurs';
        require File::build_path(array('view','view.php'));
    }
    /*}
    else{
        $view='notAdmin';
        $controller ='User';
        $pagetitle = 'Accès non autorisé';
        require File::build_path(array('view','view.php'));
    }

}*/

    public static function read() {
        Model::isConnected();
        Model::isAdmin();
        $p = ModelUser::getUserByLogin($_GET['login']);

        if ($p != false) { // Si l'utilisateur existe
            $view = "detail";
            $controller = 'User';
            $pagetitle = "Information de l'utilisateur";
            require File::build_path(array('view','view.php'));
        }

    }
    /*}
    else{
        $view='notAdmin';
        $controller ='User';
        $pagetitle = 'Accès non autorisé';
        require File::build_path(array('view','view.php'));
    }
}*/

    public static function login() {
        $view = "login";
        $controller = "User";
        $pagetitle="Connexion";
        require File::build_path(array('view','view.php'));
    }

    public static function verifUse(){
        $exist= ModelUser::verifUser($_POST['login'],$_POST['mdp']);
        $admin= ModelUser::isAdmin($_POST['login']);
        $view = "logged";
        $controller = "User";
        $pagetitle="Connexion";
        require File::build_path(array('view','view.php'));
    }

    public static function register() {
        $view = "register";
        $controller = "User";
        $pagetitle = "Inscription";
        require File::build_path(array('view', 'view.php'));
    }

    public static function delog() {
        $view ="delog";
        $controller = "User";
        $pagetitle = "Déconnexion";
        require File::build_path(array('view', 'view.php'));
    }


    public static function verifDate($date){ //vérifie la date en créant une variable
        $d = DateTime::createFromFormat('d-m-Y', $date);
        return $d && $d->format('d-m-Y') === $date;
    }

    public static function verifMail($mail){ // permet de vérifier le mail via une fonction php
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
            return true;
        } else {
            return false;
        }
    }

    public static function verifMdp($mdp){ // permet de vérif le mdp
        $exist = ModelUser::verifUser($_POST['login'],$_POST['oldMdp']);
        return $exist;
    }

    public static function registered(){
        if (isset($_POST['login'], $_POST['mdp'],$_POST['mdpVerif'], $_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'], $_POST['dateN'] )) { //vérifie qu'aucun champs n'est pas rempli

            if ($_POST['mdp'] == $_POST['mdpVerif']){ // Vérifie les mdps

                $login = $_POST['login'];
                $mdp = Security::chiffrer($_POST['mdp']);
                $mail = $_POST['mail'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $adresse = $_POST['adresse'];
                $dateN = $_POST['dateN'];

                if (!empty($login) && !ctype_space($login)){ //Fais TOUTES LES VERIFS
                    if (!empty($mdp) && !ctype_space($mdp)){
                        if (!empty($mail) && !ctype_space($mail) && self::verifMail($mail)){ // utilise verif mail en plus
                            if (!empty($nom) && !ctype_space($nom)){
                                if (!empty($prenom) && !ctype_space($prenom)){
                                    if (!empty($adresse) && !ctype_space($adresse)){
                                        if(self::verifDate($dateN)){ // Utilise la verif des dates

                                            $user = new ModelUser($login, $mdp, $mail, $nom, $prenom, $adresse, $dateN, 0, ModelUser::generateRandomHex()); // Créer un user pas admin avec once

                                            if($user->PseudoExist()){
                                                echo '<body onLoad="alert(\'Le nom de compte est deja utilise\')">';
                                                echo '<meta http-equiv="refresh" content="0;URL=index.php?controller=user&action=register">';
                                            }
                                            if($user->mailExist()){
                                                echo '<body onLoad="alert(\'Le mail est deja utilise\')">';
                                                echo '<meta http-equiv="refresh" content="0;URL=index.php?controller=user&action=register">';
                                            }
                                            else{
                                                $user->register(); // permet l'ajout à la bd
                                                // Envoyer un mail
                                                $message = '
												Bonjour, merci de valider votre inscription en allant sur ce lien :
												http://infolimon.iutmontp.univ-montp2.fr/~rubit/eCommerce/index.php?controller=user&action=validate&login='.$user->get('login').'&key='.$user->get('nonce').'

												Cordialement, Harambe Store !
											';
                                                mail($user->get('mail'), 'Harambe Store - Merci de valider votre inscription', $message); // envoie le mail à l'adresse passée en para
                                                echo '<body onLoad="alert(\'Vous etes inscrit avec Harambe\')">';  //JS permettant d'afficher le pop up
                                                echo '<meta http-equiv="refresh" content=0 ;"charset=utf-8";URL=index.php">'; // et de retourner sur l'accueil
                                                exit;


                                                /*$pagetitle='Accueil';
                                                require File::build_path(array('view','view.php')); // Affiche l'accueil */
                                            }
                                        } else {$message = "<div class='alert alert-warning'>Date non valide </div>"; }
                                    }else {$message = "<div class='alert alert-warning'>Adresse non valide </div>"; }
                                }else {$message = "<div class='alert alert-warning'>Prénom non valide </div>";}
                            }else {$message = "<div class='alert alert-warning'>Nom non valide </div>";}
                        }else{$message = "<div class='alert alert-warning'>Mail non valide </div>";}
                    }else{$message = "<div class='alert alert-warning'>Mot de passe vide </div>";}
                }else {$message = "<div class='alert alert-warning'>Login vide </div>";}
            }else {$message = "<div class='alert alert-warning'>Mots de passe différents </div>";}
        }
        $view = "register";
        $controller = 'User';
        $pagetitle='Inscription';
        require File::build_path(array('view','view.php')); // Affiche le formulaire inscription
    }

    public static function validate() { //permet la validation par mail

        if(isset($_GET['key'], $_GET['login'])) { //récupère la clé et le login
            $key = htmlspecialchars($_GET['key']);
            $login = htmlspecialchars($_GET['login']);
            $user = ModelUser::getUserByLogin($login); //récupère les infos du user

            if($user != false) {
                if($user->get('nonce') == $key) { //vérifie si le nonce et la clé sont identiques
                    $user->validate(); 			//Validate du modelUser pour la validation
                    $message = '<div class="alert alert-success">Votre compte a bien été validé ! Vous pouvez maintenant vous connecter !</div>';
                } else {
                    $message = '<div class="alert alert-danger">La clé de validation pour ce login n\'est pas correcte</div>';
                }
            }

        } else {
            $message = '<div class="alert alert-danger">Vous devez préciser un login et une clé de validation</div>';
        }

        $view = "activate";
        $controller = 'User';
        $pagetitle='Validation de votre compte';
        require File::build_path(array('view','view.php')); // Affiche le activate
    }

    public static function update(){
        Model::isConnected(); //vérifie la connexion
        if (isset($_POST['login'],$_POST['oldMdp'], $_POST['mail'], $_POST['nom'], $_POST['prenom'], $_POST['adresse'])) {
            // Récupère les valeurs existantes pour faire les tests
            $mail = $_POST['mail'];
            $nom= $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];

            if (self::verifMdp($_POST['oldMdp'])){
                if (!empty($mail) && !ctype_space($mail) && self::verifMail($mail) ){ // Si pas de mail
                    if (!empty($nom) && !ctype_space($nom)){ // Si nom non vide et pas que des espaces
                        if (!empty($prenom) && !ctype_space($prenom)){
                            if (!empty($adresse) && !ctype_space($adresse)){ // Si adresse non vide et si pas que des espaces

                                if (isset($_POST['mdp'], $_POST['mdpVerif']) && !empty($_POST['mdp']) && !empty($_POST['mdpVerif'])){ // si changement mdp
                                    if (self::verifMdp($_POST['oldMdp']) && $_POST['mdp'] == $_POST['mdpVerif']){ // vérification des mdp
                                        $user = ModelUSer::getUserByLogin($_POST['login']); // Récupère les informations d u login
                                        $dateN = $user->get('dateN'); //Récupère la date pour création

                                        $userToUpdate = new ModelUser($_POST['login'],Security::chiffrer($_POST['mdp']),$mail,$nom,$prenom,$adresse,$dateN, 0, NULL);

                                        $userToUpdate->update(); //Fait l'update de l'objet au dessus
                                        $message = "<div class='alert alert-success'>Modification réussie</div>";

                                        $tab_com = ModelCommande::getAllCommande($_SESSION['login']); //Affiche la page perso de la personne
                                        $view = "list";
                                        $controller = 'Commandes';
                                        $pagetitle='Liste Commandes';
                                        require File::build_path(array('view','view.php'));
                                    }
                                }
                                else{
                                    $user = ModelUSer::getUserByLogin($_POST['login']);//Récup les informations de la personne et surtout la date en dessous
                                    $dateN = $user->get('dateN');

                                    $userToUpdate = new ModelUser($_POST['login'],Security::chiffrer($_POST['oldMdp']),$mail,$nom,$prenom,$adresse,$dateN, 0, NULL);
                                    $userToUpdate->update();
                                    $message = "<div class='alert alert-success'>Modification réussie</div>";

                                    $tab_com = ModelCommande::getAllCommande($_SESSION['login']);
                                    $view = "list";
                                    $controller = 'Commandes';
                                    $pagetitle='Liste Commandes';
                                    require File::build_path(array('view','view.php'));
                                    exit();
                                }
                            }else {
                                $message = "<div class='alert alert-warning'>Adresse non valide</div>";
                            }
                        }else {
                            $message = "<div class='alert alert-warning'>Prénom non valide </div>";
                        }
                    }else {
                        $message= "<div class='alert alert-warning'>Nom non valide </div>";
                    }
                } else {
                    $message = "<div class='alert alert-warning'>Mail non valide </div>";
                }
            }else{
                $message="<div class='alert alert-warning'>Mot de passe non valide </div>";
            }
        } else {
            $message = '<div class="aler alert-warning">Les données du formulaire sont incorrectes !</div>';
        }

        $view = "update";
        $controller = 'User';
        $pagetitle='Modification Profil';
        require File::build_path(array('view','view.php')); // Affiche le formulaire de de update
    }


    public static function preupdate(){
        Model::isConnected();
        $user=ModelUser::getUserByLogin($_SESSION['login']); // Récupère les infos du user pour s'en servir dans update
        $view='update';
        $controller='User';
        $pagetitle='Modifier son profil';
        require File::build_path(array('view','view.php'));
    }
}
?>