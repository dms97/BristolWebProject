<?php

require_once File::build_path(array('model','Model.php'));
require_once File::build_path(array('model','ModelProduit.php'));
require_once File::build_path(array('controller','ControllerAdminUser.php'));

class ControllerAdminProd {
    
    protected static $object = 'adminProd';
    
    public static function readAll(){
        $controller = "admin";
        $view="listProduits";
        $pagetitle = "ProduitsAdmin - Omnibag";
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='listProduits';
            $pagetitle='Liste Produits- OmniBag';
            $objet = ModelProduit::selectAll();
            require File::build_path(array('view','view.php'));
        }
        else {
            ControllerAdminUser::error();
        }
    }

    public static function read(){
        $controller = "admin";
        $view="readProduit";
        $pagetitle = "ProduitAdmin - Omnibag";
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='readProduit';
            $pagetitle='Produit Admin- OmniBag';
            $objet = ModelProduit::select($_GET['idProduit']);
            require File::build_path(array('view','view.php'));
        }
        else {
            ControllerAdminUser::error();
        }
    }
    
    public static function create(){
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='createProd';
            $pagetitle='Ajouter Produit - OmniBag';
            require File::build_path(array('view','view.php'));
        }
        else {
            ControllerAdminUser::error();
        }
    }
    
    public function created(){
        $barre=Session::retourButton();
        $data = array(
            'idProduit' => $_POST['idProduit'],
            'nomProduit' => $_POST['nomProduit'],
            'type' => $_POST['type'],
            'prixProduit' => $_POST['prix'],
            'descriptionProduit' => $_POST['descriptionProduit']
        );
        try {
            $object = new ModelProduit($data);
            $object->save();
            $controller='admin';
            $view='createdProd';
            $view2='listProduits';
            $objet = ModelProduit::selectAll();
            $pagetitle='Produits - OmniBag';
            require File::build_path(array('view','view.php'));
        } catch (Exception $ex) {
            ControllerAdminUser::error2();
        }
    }
    
    public static function update(){
        $barre=Session::retourButton();
        $data = array(
            'idProduit' => $_POST['idProduit'],
            'nomProduit' => $_POST['nomProduit'],
            'type' => $_POST['type'],
            'prixProduit' => $_POST['prixProduit'],
            'descriptionProduit' => $_POST['descriptionProduit']
        );
        try {
            ModelProduit::update($data);
            $controller='admin';
            $view='updated';
            $view2='readProduit';
            $pagetitle='Produits - OmniBag';
            $objet = ModelProduit::select($_POST['idProduit']);
            require File::build_path(array('view','view.php'));
        } catch (Exception $ex) {
            ControllerAdminUser::error2();
        }
    }
    
    public static function delete(){
        $barre=Session::retourButton();
        if(!empty($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $controller='admin';
            $view='deleteProd';
            $view2='listProduits';
            $pagetitle='Liste Produits- OmniBag';
            try {
                ModelProduit::delete($_GET['idProduit']);
                $objet = ModelProduit::selectAll();
                require File::build_path(array('view','view.php'));
            } catch (Exception $ex) {
                ControllerAdminUser::error2();
            }
        }
        else {
            ControllerAdminUser::error();
        }
    }
    
}

?>