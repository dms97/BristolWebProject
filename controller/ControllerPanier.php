<?php

class ControllerPanier {
    
        protected static $object = 'panier';
        static $adresse = "infolimon.iutmontp.univ-montp2.fr/~lanal/"; // localhost/prog_web/
        static $tp = "eCommerce";
        
        public static function readAll() { // envoie sur page d'affichage du panier
            $controller = "panier";
            $view = "panier";
            $pagetitle = "Panier - Omnibag";
            $barre=Session::retourButton();
            $nombre = ModelPanier::compterArticles();
            $montant = ModelPanier::MontantGlobal();
            if (ModelPanier::compterArticles() > 0) {
                $valide = '<a href="http://' . static::$adresse . static::$tp . '/index.php?controller=panier&action=payer">Valider la commande</a>';
            }
            else {
                $valide = '';
            }
            require File::build_path(array('view','view.php'));
        }
        
        public static function supprimerArticle() {
            try {
                ModelPanier::supprimerArticle($_GET['id']);
                ControllerPanier::readAll();
            } catch (Exception $ex) {
                ControllerPanier::error();
            }
        }
        
        public static function modifierQuantite(){
            try {
                ModelPanier::modifierQTeArticle($_POST['id'],$_POST['qte']);
                ControllerPanier::readAll();
            } catch (Exception $ex) {
                ControllerPanier::error();
            }
        }
        
        public static function payer() { // verif si connecté pour faire payement
            if (empty($_SESSION['login'])) {
                $controller = "panier";
                $view = "unconnected";
                $pagetitle = "Paiement - Omnibag";
                $barre=Session::retourButton();
                require File::build_path(array('view','view.php'));
            }
            else {
                $nombre = ModelPanier::compterArticles();
                $montant = ModelPanier::MontantGlobal();
                $controller = "panier";
                $view = "paiement";
                $pagetitle = "Paiement - Omnibag";
                $barre=Session::retourButton();
                require File::build_path(array('view','view.php'));
            }
        }
        
        /*public static function confirmerCommande() {
            $_SESSION['panierOB']['verrou'] = true;
            // à implémenter si jamais on veut faire un vrai achat
        }*/
        
        public static function confirmed() { // enregistre dans base de donnée + vide panier
            $_SESSION['panierOB']['verrou'] = false;
            /*$data = array(
                'idCommande' => ,
                'idUtilisateur' => ,
                'prixCommande' => ,
                'etat' => 
            );*/
            // à implémenter (enregistrement dans BD)
            unset($_SESSION['panierOB']);
            ModelPanier::creationPanier();
            ControllerPanier::readAll();
        }
        
        public static function error() {
            $controller = "utilisateur";
            $view = "error";
            $pagetitle = "Error - Omnibag";
            $barre=Session::retourButton();
            require File::build_path(array('view','view.php'));
        }
    
}

?>