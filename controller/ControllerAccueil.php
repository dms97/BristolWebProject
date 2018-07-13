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
            $pagetitle='Accueil - OmniBag';
            $barre = Session::retourButton();
            require File::build_path(array('view','view.php'));
	}
        
        public static function contact() { // affiche page contact
            $controller='contact';
            $view='send';
            $pagetitle='Contact - OmniBag';
            $barre=Session::retourButton();
            require File::build_path(array('view','view.php'));
	} 
	
	public static function faq(){ //affiche page faq
            $controller = 'contact';
            $view = 'faq';
            $pagetitle = 'FAQ - OmniBag';
            $barre=Session::retourButton();
            require File::build_path(array('view','view.php'));
	}	
	
	public static function sended(){ //affiche message "envoyé"        
            $barre=Session::retourButton();         
            $data = array(
                'nomUtilisateur' => $_POST['Nom'],
                'mail' => $_POST['Mail'],
                'objet' => $_POST['Sujet'],
                'message' => $_POST['Message'],
            );  
            $objet = new ModelMessage($data);
            try {
                $objet->save();
                $controller='contact';
                $view='sended';
                $pagetitle='Message Envoyé - OmniBag';

                Mail::envoiMail($_POST['Mail'], "Vous nous avez contacté", "Nous avons bien reçu votre mail, nous répondrons à celui-ci le plus rapidement possible \n");
                Mail::envoiMail('laurent.garcia@etu.umontpellier.fr',$_POST['Sujet'],$_POST['Message']."<br> Envoyé par ". $_POST['Mail']);

                require File::build_path(array('view','view.php'));

            } catch (Exception $ex) {
                ControllerContact::error();
            }      
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