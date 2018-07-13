<?php

require_once File::build_path(array('model','ModelProduit.php'));
require_once File::build_path(array('controller','ControllerPanier.php'));

class ControllerModule {
	
	protected static $object = 'produit';
	
        public static function read(){
            if (ModelProduit::select($_GET['id']) != NULL) {
                $objet = ModelProduit::select($_GET['id']);
                $controller = "produit";
                $view = "read";
                $pagetitle = "" . $objet['nomProduit'] . " - Omnibag";
                $barre=Session::retourButton();
                require File::build_path(array('view','view.php'));
            }
            else {
                ControllerUtilisateur::error();
            }
        }
        
        public static function readAll(){
            $controller = "produit";
            $view="readAllProd";
            $view2 = "readAllExt";
            $pagetitle = "Produits - Omnibag";
            $barre=Session::retourButton();
            $objet = ModelProduit::selectAll();
            require File::build_path(array('view','view.php'));
        }
        
        public static function readAllProd(){
            $controller = "produit";
            $view="readAllProd";
            $pagetitle = "Produits - Omnibag";
            $barre=Session::retourButton();
            $objet = ModelProduit::selectAll();
            require File::build_path(array('view','view.php'));
        }
        
        public static function readAllExt(){
            $controller = "produit";
            $view = "readAllExt";
            $pagetitle = "Extentions - Omnibag";
            $barre=Session::retourButton();
            $objet = ModelProduit::selectAll();
            require File::build_path(array('view','view.php'));
        }
        
        public static function fastBuy() {
            $id = $_GET['id'];
            $prod = ModelProduit::select($_GET['id']);
            $nom = $prod['nomProduit'];
            $prix = $prod['prixProduit'];
            try {
                ModelPanier::ajouterArticle($id, $nom, 1, $prix);
                ControllerPanier::readAll();
            } catch (Exception $ex) {
                ControllerProduit::error();
            }
        }
        
        public static function buy() { // modifs en cours
            $id = $_GET['id'];
            $objet = ModelProduit::select($_GET['id']);
            $nom = $objet['nomProduit'];
            $prix = $objet['prixProduit'];
            try {
                ModelPanier::ajouterArticle($id, $nom, 1, $prix);
                $barre=Session::retourButton();
                $_GET['id'] = $id;
                $controller = "produit";
                $view = "buy";
                $view2 = "read";
                $pagetitle = "" . $nom . " - Omnibag";
                require File::build_path(array('view','view.php'));
            } catch (Exception $ex) {
                ControllerProduit::error();
            }
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
